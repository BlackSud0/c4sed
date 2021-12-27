<?php

namespace App\Http\Livewire\Tasks;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use App\Models\Task;

class CreateTask extends Component
{
    /**
     * The component's variables.
     *
     * @var
     */
    public $description;

    protected $rules = [
        'description' => 'required|max:100|string'
    ];

    public function submit()
    {
        $this->validate();

        $this->createTask();

        $this->description = '';

        $this->emit('taskAdded');
    }

    public function createTask()
    {
        Task::create([
            'user_id' => $this->user->id,
            'description' => $this->description
        ]);
    }

    /**
     * Get the current user of the application.
     *
     * @return mixed
     */
    public function getUserProperty()
    {
        return Auth::user();
    }

    /**
     * Get the current user of the application.
     *
     * @return mixed
     */
    public function render()
    {
        return view('livewire.tasks.create-task');
    }
}
