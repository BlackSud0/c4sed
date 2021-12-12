<?php

namespace App\Actions\Column;

use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

use App\Contracts\ColumnsCalculations;
use App\Models\CalculatedColumn;
use App\Models\Column;
use App\Models\Beam;
use App\Models\Grade;
use \stdClass;


class ColumnCalculation implements ColumnsCalculations
{

    /**
     * Validate and create a newly registered column.
     *
     * @param  array  $input
     * @return \App\Models\CalculatedColumn
     */
    public function create($user, array $input)
    {
        Validator::make($input, [
            'column_type' => ['required', 'string'],
            'designation_id' => ['required', 'numeric', 'max:255'],
            'grade' => ['required', 'numeric'],
            'L' => ['required', 'numeric'],
            'DL' => ['required', 'numeric'],
            'LL' => ['required', 'numeric'],
            'WL' => ['nullable', 'numeric'],
        ])->validate();

        $rand = md5(Str::random(60).time());
        $newColumn = CalculatedColumn::create([
            'slug' => Str::slug($input['column_type'].' '.$rand, '-'),
            'column_type' => $input['column_type'],
            'designation_id' => $input['designation_id'],
            'user_id' => $user->id,
            'grade' => $input['grade'],
            'L' => $input['L'],
            'LL' => $input['LL'],
            'DL' => $input['DL'],
            'WL' => $input['WL'],
        ]);

        $this->calculate($newColumn);
        return $newColumn->fresh();
    }

    /**
     * Validate and create a newly registered column.
     *
     * @param  array  $input
     * @return \App\Models\CalculatedColumn
     */

    public function update($user, $updatedColumn, array $input)
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

        // Authorize that the user can update the column.
        if ($user->id === $updatedColumn->user_id) {
            $updatedColumn->forceFill([
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
        
        $this->calculate($updatedColumn);
        return $updatedColumn->fresh();
    }

    /**
     * Remove the given column from the CalculatedColumn.
     * @param $user
     * @param  \App\Models\CalculatedColumn  $column
     * @return void
     */
    public function remove($user,$column)
    {
        // Authorize that the user can remove the column.
        if ($user->id === $column->user_id) {
            $column->delete();
        }else {
            throw new AuthorizationException;
        }

    }
    
    /**
     * Validate and calculate a newly analyzed column.
     *
     * @param  array  $input
     * @return array  $result
     */
    public function calculate($column)
    {

        // Find a stored column data from the Database
        // $column = CalculatedColumn::where('slug',$slug)->firstOrFail();
        
        $L = $column->L;      // Span or Length
        $DL = $column->DL;    // Dead Load
        $LL = $column->LL;    // Live Load
        $WL = $column->WL;    // Wind Load
        $column_type = $column->column_type;    // "I Section" Or "H Section"

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
        // if ($column_type === "Simple") {
        //     $Mmax = ($W * pow($L,2)) / 8;
        //     $Vmax  = ($W * $L) / 2;
        // }elseif ($column_type === "Cantilever") {
        //     $Mmax = ($W * pow($L,2)) / 2;
        //     $Vmax  = $W * $L;
        // }elseif ($column_type === "FixedEnd") {
        //     $Mmax = ($W * pow($L,2)) / 12;
        //     $Vmax  = ($W * $L) / 2;
        // }else {
        //     abort(404);
        // }

        /**
         * Section properties from Database.
         */

        $properties = $column->ISection;
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
        $grade = $column->Grades->where('thickness','>=' ,$T)->first();
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
            return $this->failed($column); // Please select a new Section, the previos was failed
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

            return $this->succeeded($column,$results);
        }

    }

    /**
     * After ensure that the section was succeeded.
     * @return \Closure
     */
    protected function succeeded($column,$results)
    {
        $column->forceFill([
            'status' => 'succeeded',
        ])->save();

        $results->column = $column->fresh();

        return $results;
    }

    /**
     * After ensure that the section was failed.
     * @return \Closure
     */
    protected function failed($column)
    {
        $column->forceFill([
            'status' => 'failed',
        ])->save();

        return false;
    }


}