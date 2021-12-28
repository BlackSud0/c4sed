<?php

namespace App\Contracts;

interface TasksManagers
{
    /**
     * Validate and create a newly registered task.
     *
     * @param  array  $input
     * @return \App\Models\Task
     */
    public function create($user,array $input);

    /**
     * Validate and update a registered task.
     *
     * @param  array  $input
     * @return \App\Models\Task
     */
    public function update($user, $task, array $input);

    /**
     * Remove the given task from the Tasks.
     * @param $user
     * @param  \App\Models\Task  $task
     * @return true
     */
    public function remove($user, $task);

}
