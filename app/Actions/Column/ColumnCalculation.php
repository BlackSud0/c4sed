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
            'element_type' => ['required', 'string'],
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
            'element_type' => $input['element_type'],
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
            'element_type' => ['required', 'string'],
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
                'element_type' => $input['element_type'],
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
        $element_type = $column->element_type;  // "Internal" Or "Internal" element

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

        /**
         * Section properties from Database.
         */
        $properties = $column_type === 'HSection' ? $column->HSection : $column->HSection;
        $mass = $properties->mass;  // mass per metre
        $D = $properties->h;        // Depth of section
        $b = $properties->h;        // Width of section
        $t = $properties->s;        // Thickness of Web
        $T = $properties->t;        // Thickness of Flange
        $bT = $properties->b2t;     // Ratios for Local Buckling - Flange
        $dt = $properties->ds;      // Ratios for Local Buckling - Web
        $ry = $properties->ry;      // Radius of Gyration about Axis y-y
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
        * Section Classification.
        */

        // Flange Classification for Rolled sections
        if ($element_type === "outstand") {
            if ($bT<= (8.5 * $Epsilon)) {
                $flange_class = "plastic";
            }elseif ($bT<= (9.5 * $Epsilon)) {
                $flange_class = "compact";
            }elseif ($bT<= (15 * $Epsilon)) {
                $flange_class = "semi-compact";
            }else {
                $flange_class = "slender";
                $factor = 11 / (($bT/$Epsilon) - 4); // Strength reduction factor for slender
            }
        }elseif ($element_type === "internal") {
            if ($bT<= (26 * $Epsilon)) {
                $flange_class = "plastic";
            }elseif ($bT<= (32 * $Epsilon)) {
                $flange_class = "compact";
            }elseif ($bT<= (39 * $Epsilon)) {
                $flange_class = "semi-compact";
            }else {
                $flange_class = "slender";
                $factor = 21 / (($bT/$Epsilon) - 7); // Strength reduction factor for slender
            }
        }else {
            abort(404);
        }

        // Web Classification for Rolled sections
        if ($dt<= (39 * $Epsilon)) {
            $web_class = $flange_class === "slender" ? "plastic" : $flange_class;
        }else {
            $web_class = "slender";
            $factor = $element_type === "outstand" ? (11 / (($bT/$Epsilon) - 4)) : (21 / (($bT/$Epsilon) - 7)); // Strength reduction factor for slender
        }

        // Select section class / if flange_class != web_class
        $section_class = $flange_class;
        if ($web_class !== $flange_class) {
            $section_class = $web_class;
        }
        if ($section_class === "slender") {
            $Py = $factor * $Py;
        }
        
        /*
        * Compressive strength calculation.
        */

        $Pi = 3.14;  // Symbol π
        $Lambda = ($L * 100)/ $ry;
        $LambdaDot = 0.2 * sqrt((pow($Pi,2)*$E*1000)/$Py); // Limiting slenderness
        
        if ($column_type === 'HSection') {
            if ($T <= 40) {
                $a = 5.5; // Robertson constant
            }else {
                $a = 8; // Robertson constant
            }
        }elseif ($column_type === 'ISection') {
            $a = 3.5; // Robertson constant
        }

        $Eta = 0.001 * $a * ($Lambda - $LambdaDot); // Symbol η , Perry Factor
        
        $PE = (pow($Pi,2)*$E*1000)/pow($Lambda,2);  // Euler load
        $Phi = ($Py + (($Eta+1) * $PE))/2; // Symbol Φ

        $pc = ($PE * $Py) / ($Phi + sqrt(pow($Phi,2)- ($PE*$Py))); // Compressive strength
        
        $Pc = $A * $pc * 0.1; // Compression resistance
        
        // Check for Compression resistance
        if ($Pc > $W) {
            $Pc_OK = true;
        }else {
            return $this->failed($column); // Please select a new Section, the previos was failed
        }
        
        if ($Pc_OK) {
            
            $results = new stdClass();
            $results->W = $W; // Load Combinations.
            $results->E = $E; // Steel properties
            $results->Py = $Py; // Design strengths
            $results->Epsilon = $Epsilon;
            $results->column_type = $column_type;
            $results->section_class = $section_class; // Section Classification.
            $results->Lambda = $Lambda;
            $results->pc = $pc; // // Compressive strength
            $results->Pc = $Pc; // Compression resistance

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