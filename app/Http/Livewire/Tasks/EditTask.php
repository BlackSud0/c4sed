<?php

namespace App\Http\Livewire\Tasks;

use Livewire\Component;
use App\Models\Task;

class EditTask extends Component
{
    /**
     * The component's variables.
     *
     * @var
     */
    public $task;
    public $description;

    protected $rules = [
        'description' => 'required|max:100|string'
    ];

    protected $listeners = [
        'editingTask'
    ];

    public function mount()
    {
        $this->getTask();
    }

    public function submit()
    {
        $this->validate();

        $this->updateTask();

        $this->task = null;

        $this->emit('taskEdited');
    }

    public function editingTask()
    {
        $this->getTask();
    }

    public function updateTask()
    {
        $this->task->description = $this->description;
        $this->task->editing = false;

        $this->task->save();
    }

    public function getTask()
    {
        $this->task = Task::where('editing', '=', true)
            ->first();

        if($this->task) {
            $this->description = $this->task->description;
        }
    }

    /**
     * Get the current user of the application.
     *
     * @return mixed
     */
    public function render()
    {
        return view('livewire.tasks.edit-task');
    }
}
