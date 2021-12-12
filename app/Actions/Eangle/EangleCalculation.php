<?php

namespace App\Actions\Eangle;

use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

use App\Contracts\EanglesCalculations;
use App\Models\CalculatedEangle;
use App\Models\Eangle;
use App\Models\Grade;
use \stdClass;


class EangleCalculation implements EanglesCalculations
{

    /**
     * Validate and create a newly registered eangle.
     *
     * @param  array  $input
     * @return \App\Models\CalculatedEangle
     */
    public function create($user, array $input)
    {
        Validator::make($input, [
            'eangle_type' => ['required', 'string'],
            'designation_id' => ['required', 'numeric', 'max:255'],
            'grade' => ['required', 'numeric'],
            'L' => ['required', 'numeric'],
            'DL' => ['required', 'numeric'],
            'LL' => ['required', 'numeric'],
            'WL' => ['nullable', 'numeric'],
        ])->validate();

        $rand = md5(Str::random(60).time());
        $newEangle = CalculatedEangle::create([
            'slug' => Str::slug($input['eangle_type'].' '.$rand, '-'),
            'eangle_type' => $input['eangle_type'],
            'designation_id' => $input['designation_id'],
            'user_id' => $user->id,
            'grade' => $input['grade'],
            'L' => $input['L'],
            'LL' => $input['LL'],
            'DL' => $input['DL'],
            'WL' => $input['WL'],
        ]);

        $this->calculate($newEangle);
        return $newEangle->fresh();
    }

    /**
     * Validate and create a newly registered eangle.
     *
     * @param  array  $input
     * @return \App\Models\CalculatedEangle
     */

    public function update($user, $updatedEangle, array $input)
    {
        Validator::make($input, [
            'designation_id' => ['required', 'numeric', 'max:255'],
            'grade' => ['required', 'numeric'],
            'L' => ['required', 'numeric'],
            'DL' => ['required', 'numeric'],
            'LL' => ['required', 'numeric'],
            'WL' => ['nullable', 'numeric'],
            'customer_name' => ['nullable', 'string','max:255'],
            'project_name' => ['nullable', 'string','max:255'],
        ])->validate();

        // Authorize that the user can update the eangle.
        if ($user->id === $updatedEangle->user_id) {
            $updatedEangle->forceFill([
                'designation_id' => $input['designation_id'],
                'user_id' => $user->id,
                'grade' => $input['grade'],
                'L' => $input['L'],
                'LL' => $input['LL'],
                'DL' => $input['DL'],
                'WL' => $input['WL'],
                'customer_name' => $input['customer_name'],
                'project_name' => $input['project_name'],
            ])->save();
        }else {
            throw new AuthorizationException;
        }
        
        $this->calculate($updatedEangle);
        return $updatedEangle->fresh();
    }

    /**
     * Remove the given eangle from the CalculatedEangle.
     * @param $user
     * @param  \App\Models\CalculatedEangle  $eangle
     * @return void
     */
    public function remove($user,$eangle)
    {
        // Authorize that the user can remove the eangle.
        if ($user->id === $eangle->user_id) {
            $eangle->delete();
        }else {
            throw new AuthorizationException;
        }

    }
    
    /**
     * Validate and calculate a newly analyzed eangle.
     *
     * @param  array  $input
     * @return array  $result
     */
    public function calculate($eangle)
    {

        // Find a stored eangle data from the Database
        // $eangle = CalculatedEangle::where('slug',$slug)->firstOrFail();
        
        $L = $eangle->L;      // Span or Length
        $DL = $eangle->DL;    // Dead Load
        $LL = $eangle->LL;    // Live Load
        $WL = $eangle->WL;    // Wind Load
        $eangle_type = $eangle->eangle_type;    // "I Section" Or "H Section"

        /*
        * Load Combinations.
        */
        if(isset($DL,$LL,$WL)){
            $W = 1.2 * ( $DL+ $LL + $WL);
        }elseif (isset($DL,$LL)) {
            $W = (1.4 * $DL) + (1.6 * $LL);
        }else {
            $W = 1.4 * $DL;
        }

        /*
        * Calculate maximum share and moment.
        */
        // if ($eangle_type === "Simple") {
        //     $Mmax = ($W * pow($L,2)) / 8;
        //     $Vmax  = ($W * $L) / 2;
        // }elseif ($eangle_type === "Cantilever") {
        //     $Mmax = ($W * pow($L,2)) / 2;
        //     $Vmax  = $W * $L;
        // }elseif ($eangle_type === "FixedEnd") {
        //     $Mmax = ($W * pow($L,2)) / 12;
        //     $Vmax  = ($W * $L) / 2;
        // }else {
        //     abort(404);
        // }

        /**
         * Section properties from Database.
         */

        $properties = $eangle->designation;
        $mass = $properties->mass;  // mass per metre
        $D = $properties->h;        // Depth of section
        $t = $properties->s;        // Thickness of Web
        $T = $properties->t;        // Thickness of Flange
        $bT = $properties->b2t;     // Ratios for Local Buckling - Flange
        $dt = $properties->ds;      // Ratios for Local Buckling - Web
        $Ix = $properties->Ix;      // Second Moment of Area about X-X axis
        $Zx = $properties->Zx;      // Elastic Modulus about X-X axis
        $Sx = $properties->Sx;      // Plastic Modulus about X-X axis
        $A  = $properties->A;       // Area of section
        /**
         * Steel properties from Database.
         */
        $E = 205;
        /**
         * Calculate Py and Epsilon from the Gradent.
         */
        $grade = $eangle->Grades->where('thickness','>=' ,$T)->first();
        $Py = $grade->Py; // Design strengths
        $Epsilon = sqrt(275/$Py);
        
        /*
        * Shear capacity calculation.
        */
        $Av = $D * $t;          // Shear area for Rolled I,H sections
        $Pv = 0.6 * $Py * $Av * 0.001; // Shear capacity

        // Check for Shear capacity
        if ($Pv > $Vmax) {
            $shear_OK = true;
        }else {
            return $this->failed($eangle); // Please select a new Section, the previos was failed
        }

        if ($shear_OK && $moment_OK && $defliction_OK) {
            
            $results = new stdClass();
            $results->W = $W; // Load Combinations.
            $results->Mmax = $Mmax; // Maximum moment
            $results->Vmax = $Vmax; // Maximum share
            $results->Vmax = $Vmax; // Maximum share
            $results->E = $E; // Steel properties
            $results->Py = $Py; // Design strengths
            $results->Epsilon = $Epsilon;
            $results->Av = $Av; // Shear area
            $results->Pv = $Pv; // Shear capacity
            $results->section_class = $section_class; // Section Classification.
            $results->shear_load = $shear_load; // low or high shear
            $results->Mc = $Mc; // Moment Capacity
            $results->check_Mc = $check_Mc; // Moment check value
            $results->Df = $Df; // Maximum Defliction
            $results->check_Df = $check_Df; // Defliction check value
            
            // ddd($results);

            return $this->succeeded($eangle,$results);
        }

    }

    /**
     * After ensure that the section was succeeded.
     * @return \Closure
     */
    protected function succeeded($eangle,$results)
    {
        $eangle->forceFill([
            'status' => 'succeeded',
        ])->save();

        $results->eangle = $eangle->fresh();

        return $results;
    }

    /**
     * After ensure that the section was failed.
     * @return \Closure
     */
    protected function failed($eangle)
    {
        $eangle->forceFill([
            'status' => 'failed',
        ])->save();

        return false;
    }


}