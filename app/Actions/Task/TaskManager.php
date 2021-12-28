<?php

namespace App\Actions\Task;

use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Support\Facades\Validator;

use App\Contracts\TasksManagers;
use App\Models\Task;

class TaskManager implements TasksManagers
{

    /**
     * Validate and create a newly registered Task.
     *
     * @param  array  $input
     * @return \App\Models\Task
     */
    public function create($user, array $input)
    {
        Validator::make($input, [
            'name' => ['required', 'string','max:30'],
            'description' => ['required', 'string', 'max:255'],
        ])->validate();

        $newTask = Task::create([
            'user_id' => $user->id,
            'name' => $input['name'],
            'description' => $input['description'],
        ]);

        return $newTask->fresh();
    }

    /**
     * Validate and update a registered task.
     *
     * @param  array  $input
     * @return \App\Models\Task
     */

    public function update($user, $updatedTask, array $input)
    {
        Validator::make($input, [
            'name' => ['required', 'string','max:30'],
            'description' => ['required', 'string', 'max:255'],
        ])->validate();

        // Authorize that the user can update the task.
        if ($user->id === $updatedTask->user_id) {
            $updatedTask->forceFill([
                'name' => $input['name'],
                'description' => $input['description'],
            ])->save();
        }else {
            throw new AuthorizationException;
        }
        
        return $updatedTask->fresh();
    }

    /**
     * Remove the given task from the Tasks.
     * @param $user
     * @param  \App\Models\Task  $task
     * @return void
     */
    public function remove($user,$task)
    {
        // Authorize that the user can remove the task.
        if ($user->id === $task->user_id) {
            $task->delete();
        }else {
            throw new AuthorizationException;
        }

    }


}
