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
            'connection_type' => ['required', 'string'],
            'designation_id' => ['required', 'numeric', 'max:255'],
            'grade' => ['required', 'numeric'],
            'D' => $input['connection_type'] === 'bolted' ? ['required', 'numeric'] : ['nullable', 'numeric'],
            'DL' => ['required', 'numeric'],
            'LL' => ['required', 'numeric'],
            'WL' => ['nullable', 'numeric'],
            'connected_to_both_sides' => ['required', 'boolean'],
        ])->validate();

        $rand = md5(Str::random(60).time());
        $newEangle = CalculatedEangle::create([
            'slug' => Str::slug($input['eangle_type'].' '.$rand, '-'),
            'eangle_type' => $input['eangle_type'],
            'connection_type' => $input['connection_type'],
            'designation_id' => $input['designation_id'],
            'user_id' => $user->id,
            'grade' => $input['grade'],
            'D' => $input['D'],
            'LL' => $input['LL'],
            'DL' => $input['DL'],
            'WL' => $input['WL'],
            'connected_to_both_sides' => $input['connected_to_both_sides'],
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
            'connection_type' => ['required', 'string'],
            'designation_id' => ['required', 'numeric', 'max:255'],
            'grade' => ['required', 'numeric'],
            'D' => $input['connection_type'] === 'bolted' ? ['required', 'numeric'] : ['nullable', 'numeric'],
            'DL' => ['required', 'numeric'],
            'LL' => ['required', 'numeric'],
            'WL' => ['nullable', 'numeric'],
            'connected_to_both_sides' => ['required', 'boolean'],
            'customer_name' => ['nullable', 'string','max:255'],
            'project_name' => ['nullable', 'string','max:255'],
        ])->validate();

        // Authorize that the user can update the eangle.
        if ($user->id === $updatedEangle->user_id) {
            $updatedEangle->forceFill([
                'connection_type' => $input['connection_type'],
                'designation_id' => $input['designation_id'],
                'user_id' => $user->id,
                'grade' => $input['grade'],
                'D' => $input['D'],
                'LL' => $input['LL'],
                'DL' => $input['DL'],
                'WL' => $input['WL'],
                'connected_to_both_sides' => $input['connected_to_both_sides'],
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
     * Validate and calculate a new Angle.
     *
     * @param  array  $input
     * @return array  $result
     */
    public function calculate($eangle)
    {
        // Find a stored eangle data from the Database
        $D = $eangle->D;     // Bolt hole
        $DL = $eangle->DL;    // Dead Load
        $LL = $eangle->LL;    // Live Load
        $WL = $eangle->WL;    // Wind Load
        $eangle_type = $eangle->eangle_type;    // "Single" Or "Double"
        $connection_type = $eangle->connection_type;
        
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
        $properties = $eangle->designation;
        $mass = $properties->mass;  // mass per metre
        $H = $properties->H;        // The long leg
        $B = $properties->B;        // The short leg
        $t = $properties->t;        // Thickness of angle
        $r1 = $properties->r1;      // Root radius
        $r2 = $properties->r2;      // Toe radius
        $A  = $properties->A;       // Area of section
        /**
         * Steel properties from Database.
         */
        $E = 205;

        /**
         * Calculate Py and Epsilon from the Gradent.
         */
        $grade = $eangle->Grades->where('thickness','>=' ,$t)->first();
        $Py = $grade->Py; // Design strengths
        
        /*
        * Tension capacity calculation.
        */

        // Effective area of section
        $H = $H - ($t/2);
        $B = $B - ($t/2);
        if ($eangle_type === 'Single') {
            if (isset($D) && $connection_type === 'bolted') {
                $a1 = ($H - $D) * $t;
            }elseif ($connection_type === 'welded') {
                $a1 = $H * $t;
            }else {
                abort(404);
            }
            $a2 = $B * $t;
            $Ae = $a1 + (((3 * $a1)/((3 * $a1) + $a2)) * $a2);
        }elseif ($eangle_type === 'Double') {
            if (isset($D) && $connection_type === 'bolted') {
                    $a1 = ($H - $D) * $t;
                if ($eangle->connected_to_both_sides) {
                    $a2 = ($B - $D) * $t;
                }else {
                    $a2 = $B * $t;
                }
            }elseif ($connection_type === 'welded') {
                $a1 = $H * $t;
                $a2 = $B * $t;
            }else {
                abort(404);
            }
            $Ae = 2 * ($a1 + (((5 * $a1)/((5 * $a1) + $a2)) * $a2));
        }else {
            abort(404);
        }
                  
        $Pt = $Ae * $Py * 0.001; // Tension capacity

        // Check for Tension capacity
        if ($Pt > $W) {
            $Pt_OK = true;
        }else {
            return $this->failed($eangle); // Please select a new Section, the previos was failed
        }

        if ($Pt_OK) {
            
            $results = new stdClass();
            $results->W = $W; // Load Combinations.
            $results->E = $E; // Steel properties
            $results->Py = $Py; // Design strengths
            $results->a1 = $a1;
            $results->a2 = $a2;
            $results->Ae = $Ae; // Effective area
            $results->Pt = $Pt; // Tension capacity

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