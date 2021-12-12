<?php

namespace App\Actions\Beam;

use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

use App\Contracts\BeamsCalculations;
use App\Models\CalculatedBeam;
use App\Models\Beam;
use App\Models\Grade;
use \stdClass;


class BeamCalculation implements BeamsCalculations
{

    /**
     * Validate and create a newly registered beam.
     *
     * @param  array  $input
     * @return \App\Models\CalculatedBeam
     */
    public function create($user, array $input)
    {
        Validator::make($input, [
            'beam_type' => ['required', 'string'],
            'designation_id' => ['required', 'numeric', 'max:255'],
            'grade' => ['required', 'numeric'],
            'L' => ['required', 'numeric'],
            'DL' => ['required', 'numeric'],
            'LL' => ['required', 'numeric'],
            'WL' => ['nullable', 'numeric'],
            'buckling' => ['required', 'boolean'],
        ])->validate();

        $rand = md5(Str::random(60).time());
        $newBeam = CalculatedBeam::create([
            'slug' => Str::slug($input['beam_type'].' '.$rand, '-'),
            'beam_type' => $input['beam_type'],
            'designation_id' => $input['designation_id'],
            'user_id' => $user->id,
            'grade' => $input['grade'],
            'L' => $input['L'],
            'LL' => $input['LL'],
            'DL' => $input['DL'],
            'WL' => $input['WL'],
            'buckling' => $input['buckling'],
        ]);

        $this->calculate($newBeam);
        return $newBeam->fresh();
    }

    /**
     * Validate and create a newly registered beam.
     *
     * @param  array  $input
     * @return \App\Models\CalculatedBeam
     */

    public function update($user, $updatedBeam, array $input)
    {
        Validator::make($input, [
            'designation_id' => ['required', 'numeric', 'max:255'],
            'grade' => ['required', 'numeric'],
            'L' => ['required', 'numeric'],
            'DL' => ['required', 'numeric'],
            'LL' => ['required', 'numeric'],
            'WL' => ['nullable', 'numeric'],
            'buckling' => ['required', 'boolean'],
            'customer_name' => ['nullable', 'string','max:255'],
            'project_name' => ['nullable', 'string','max:255'],
        ])->validate();

        // Authorize that the user can update the beam.
        if ($user->id === $updatedBeam->user_id) {
            $updatedBeam->forceFill([
                'designation_id' => $input['designation_id'],
                'user_id' => $user->id,
                'grade' => $input['grade'],
                'L' => $input['L'],
                'LL' => $input['LL'],
                'DL' => $input['DL'],
                'WL' => $input['WL'],
                'buckling' => $input['buckling'],
                'customer_name' => $input['customer_name'],
                'project_name' => $input['project_name'],
            ])->save();
        }else {
            throw new AuthorizationException;
        }
        
        $this->calculate($updatedBeam);
        return $updatedBeam->fresh();
    }

    /**
     * Remove the given beam from the CalculatedBeam.
     * @param $user
     * @param  \App\Models\CalculatedBeam  $beam
     * @return void
     */
    public function remove($user,$beam)
    {
        // Authorize that the user can remove the beam.
        if ($user->id === $beam->user_id) {
            $beam->delete();
        }else {
            throw new AuthorizationException;
        }

    }
    

    /**
     * Validate and calculate a newly analyzed beam.
     *
     * @param  array  $input
     * @return array  $result
     */
    public function calculate($beam)
    {

        // Find a stored beam data from the Database
        // $beam = CalculatedBeam::where('slug',$slug)->firstOrFail();
        
        $L = $beam->L;      // Span or Length
        $DL = $beam->DL;    // Dead Load
        $LL = $beam->LL;    // Live Load
        $WL = $beam->WL;    // Wind Load
        $beam_type = $beam->beam_type;          // "Simply supported" Or "Cantilever" Or "Fixed at both End"
        $buckling = $beam->buckling;           // "True" or "False"

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
        if ($beam_type === "Simple") {
            $Mmax = ($W * pow($L,2)) / 8;
            $Vmax  = ($W * $L) / 2;
        }elseif ($beam_type === "Cantilever") {
            $Mmax = ($W * pow($L,2)) / 2;
            $Vmax  = $W * $L;
        }elseif ($beam_type === "FixedEnd") {
            $Mmax = ($W * pow($L,2)) / 12;
            $Vmax  = ($W * $L) / 2;
        }else {
            abort(404);
        }

        /**
         * Section properties from Database.
         */
        // This means the user dosn't select any section.
        if (is_null($beam->designation)) { 
            $gr = $beam->Grades->where('thickness','>=' ,16)->first();
            $Py = $gr->Py;
            // From Stuctural Steelwork Second Edition - Macgiley, Page No [90]
            $Sx = (($Mmax * 1000) / $Py) * 1.1; // Plastic section modulus require
            
            $try = Beam::where('Sx','>',$Sx)->orderBy('Sx', 'ASC')->first(); // try this section
            
            if (is_null($try)) {
                return $this->failed($beam); // Please select a new Section, the previos was failed
            }else {

                $beam->forceFill([
                    'designation_id' => $try->id,
                ])->save();

                $beam = $beam->fresh();
            }
        }

        $properties = $beam->designation;
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
        $grade = $beam->Grades->where('thickness','>=' ,$T)->first();
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
            return $this->failed($beam); // Please select a new Section, the previos was failed
        }

        /*
        * Section Classification.
        */

        // Flange Classification for Rolled sections
        if ($bT<= (8.5 * $Epsilon)) {
            $flange_class = "plastic";
        }elseif ($bT<= (9.5 * $Epsilon)) {
            $flange_class = "compact";
        }elseif ($bT<= (15 * $Epsilon)) {
            $flange_class = "semi-compact";
        }else {
            $flange_class = "slender";
            $factor = 11 / (($bT/$Epsilon) - 4); // Strength reduction factor for slender
            $Py = $factor * $Py;
        }

        // Web Classification for Rolled sections
        if ($dt<= (79 * $Epsilon)) {
            $web_class = "plastic";
        }elseif ($dt<= (98 * $Epsilon)) {
            $web = "compact";
        }elseif ($dt<= (120 * $Epsilon)) {
            $web_class = "semi-compact";
        }else {
            $web_class = "slender";
        }
        
        // Select section class / if flange_class != web_class
        $section_class = $flange_class;
        if ($web_class !== $flange_class) {
            $section_class = $web_class;
        }
        
        /*
        * Moment Capacity for Rolled sections.
        */
       if ($Vmax <= 0.6 * $Pv) {
           // Moment Capacity is a low shear
           $shear_load = "Low";
           if (in_array($section_class, ["plastic","compact"])) {
            $Mc = $Py * $Sx; // Moment Capacity
           }elseif (in_array($section_class, ["semi-compact","slender"])) {
            $Mc = $Py * $Zx; // Moment Capacity
           }
       }else {
           // Moment Capacity is a high shear
           $shear_load = "High";
           if (in_array($section_class, ["plastic","compact"])) {
            $Pt = ((2.5 * $Vmax) / $Pv) - 1.5;
            // $Sv (i.e. Dt^2/4) ????????????
            $Sv = (($t * pow($D,2)) / 4) * 0.001; // Macgiley Page No [83] , 0.001 from mm^3 to cm^3
            // $Mc = $Py * ( $Sx - $Sv * $Pt);
            $Mc = $Py * ( ($Sx - $Sv) * $Pt);  // Moment Capacity
           }elseif (in_array($section_class, ["semi-compact","slender"])) {
            $Mc = $Py * $Zx; // Moment Capacity
           }
       }

        // Check for Moment Capacity
        $Mc = $Mc * 0.001;
        $check_Mc = 1.2 * $Py * $Zx * 0.001;
        if (($Mc <= $check_Mc) & ($Mc > $Mmax)) {
           $moment_OK = true;
        }else {
            return $this->failed($beam); // Please select a new Section, the previos was failed
        }
        
        /*
        * Calculate Defliction for Live Load.
        * To Do ::: $W_Df = isset($WL) ? ($LL + $WL) * 0.8 : $LL;
        */

        if ($beam_type === "Simple") {
            $Df = (5 * $LL * pow($L,4)) / (384 * $E * $Ix * 0.01); // Df = 0.0048 m from the example
            $Df = $Df * 1000; // from m to mm
            $check_Df = ($L * 1000)/ 360;
            if ($Df <= $check_Df) {
                $defliction_OK = true;
            }else {
                return $this->failed($beam); // Please select a new Section, the previos was failed
            }
        }elseif ($beam_type === "Cantilever") {
            $Df = ($LL * pow($L,4)) / (8 * $E * $Ix * 0.01);
            $Df = $Df * 1000; // from m to mm
            $check_Df = ($L * 1000)/ 180;
            if ($Df <= $check_Df) {
                $defliction_OK = true;
            }else {
                return $this->failed($beam); // Please select a new Section, the previos was failed
            }
        }elseif ($beam_type === "FixedEnd") { 
            $Df = ($LL * pow($L,4)) / (384 * $E * $Ix * 0.01);
            $Df = $Df * 1000; // from m to mm
            $check_Df = ($L * 1000)/ 360;
            if ($Df <= $check_Df) {
                $defliction_OK = true;
            }else {
                return $this->failed($beam); // Please select a new Section, the previos was failed
            }
        }else {
            abort(404);
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

            return $this->succeeded($beam,$results);
        }

    }

    /**
     * After ensure that the section was succeeded.
     * @return \Closure
     */
    protected function succeeded($beam,$results)
    {
        $beam->forceFill([
            'status' => 'succeeded',
        ])->save();

        $results->beam = $beam->fresh();

        return $results;
    }

    /**
     * After ensure that the section was failed.
     * @return \Closure
     */
    protected function failed($beam)
    {
        $beam->forceFill([
            'status' => 'failed',
        ])->save();

        return false;
    }


}
