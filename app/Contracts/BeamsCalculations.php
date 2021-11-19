<?php

namespace App\Contracts;

interface BeamsCalculations
{

    /**
     * Validate and create a newly registered beam.
     *
     * @param  array  $input
     * @return \App\Models\CalculatedBeam
     */
    public function create($user,array $input);

    /**
     * Validate and update a registered beam.
     *
     * @param  array  $input
     * @return \App\Models\CalculatedBeam
     */
    public function update($user, $beam, array $input);

    /**
     * Remove the given beam from the CalculatedBeam.
     * @param $user
     * @param  \App\Models\CalculatedBeam  $beam
     * @return true
     */
    public function remove($user, $beam);

    /**
     * Validate and calculate a newly analyzed beam.
     *
     * @param  array  $beam
     * @return mixed
     */
    public function calculate($beam);
}
