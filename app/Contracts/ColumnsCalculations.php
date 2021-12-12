<?php

namespace App\Contracts;

interface ColumnsCalculations
{

    /**
     * Validate and create a newly registered column.
     *
     * @param  array  $input
     * @return \App\Models\CalculatedColumn
     */
    public function create($user,array $input);

    /**
     * Validate and update a registered column.
     *
     * @param  array  $input
     * @return \App\Models\CalculatedColumn
     */
    public function update($user, $column, array $input);

    /**
     * Remove the given column from the CalculatedColumn.
     * @param $user
     * @param  \App\Models\CalculatedColumn  $column
     * @return true
     */
    public function remove($user, $column);

    /**
     * Validate and calculate a newly analyzed column.
     *
     * @param  array  $column
     * @return mixed
     */
    public function calculate($column);
}
