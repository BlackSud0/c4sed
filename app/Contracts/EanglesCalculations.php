<?php

namespace App\Contracts;

interface EanglesCalculations
{

    /**
     * Validate and create a newly registered eangle.
     *
     * @param  array  $input
     * @return \App\Models\CalculatedEangle
     */
    public function create($user,array $input);

    /**
     * Validate and update a registered eangle.
     *
     * @param  array  $input
     * @return \App\Models\CalculatedEangle
     */
    public function update($user, $eangle, array $input);

    /**
     * Remove the given eangle from the CalculatedEangle.
     * @param $user
     * @param  \App\Models\CalculatedEangle  $eangle
     * @return true
     */
    public function remove($user, $eangle);

    /**
     * Validate and calculate a newly analyzed eangle.
     *
     * @param  array  $eangle
     * @return mixed
     */
    public function calculate($eangle);
}
