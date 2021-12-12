<?php

namespace App\Http\Livewire\Columns;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use App\Contracts\ColumnsCalculations;
use App\Models\CalculatedColumn;
use App\Models\Column;
use App\Models\Beam;
use Livewire\WithPagination;

class Manager extends Component
{
    use WithPagination;
    /**
     * The component's listeners.
     *
     * @var array
     */
    protected $listeners = [
        'refresh-manager' => '$refresh',
    ];

    /**
     * The "update column" form state.
     *
     * @var array
     */
    public $updateColumnForm = [];
    public $sections;

    /**
     * Indicates if the application is confirming if a column should be updated.
     *
     * @var bool
     */
    public $confirmingColumnUpdate = false;

    /**
     * The ID of the column being updated.
     *
     * @var int|null
     */
    public $columnIdBeingUpdated = null;

    /**
     * Indicates if the application is confirming if a column should be removed.
     *
     * @var bool
     */
    public $confirmingColumnRemoval = false;

    /**
     * The ID of the column being removed.
     *
     * @var int|null
     */
    public $columnIdBeingRemoved = null;

    /**
     * Confirm that the given column should be updated.
     *
     * @param  int  $columnId
     * @return void
     */
    public function confirmColumnUpdate($columnId)
    {
        $this->confirmingColumnUpdate = true;

        $this->columnIdBeingUpdated = $columnId;

        $this->updateColumnForm = CalculatedColumn::where('id', $columnId)->where('user_id',$this->user->id)->firstOrFail()->withoutRelations()->toArray();
        $this->updateColumnForm['column_type'] === 'HSection' ? $this->sections = Column::all() : $this->sections = Beam::all();
    }

    /**
     * Update a column informations.
     *
     * @param  \App\Contracts\ColumnsCalculations  $updater
     * @return void
     */
    public function updateColumn(ColumnsCalculations $updater)
    {
        $CalculatedColumn = CalculatedColumn::where('id', $this->columnIdBeingUpdated)->where('user_id',$this->user->id)->firstOrFail();
        $result = $updater->update($this->user, $CalculatedColumn, $this->updateColumnForm);
        
        $this->confirmingColumnUpdate = false;

        $this->columnIdBeingUpdated = null;

        if($result->status === 'succeeded'){
            $this->dispatchBrowserEvent('swal', [
                'icon' => 'success',
                'title' => 'Analyzed', 
                'message' => 'Congratulations, your section was succeeded :D!',
                'showCancelButton' => true,
                'confirmButtonText' => 'View report!',
                'redirect' => route('columns.reports', $result->slug)]);
        }else{
            $this->dispatchBrowserEvent('swal', [
                'icon' => 'error',
                'title' => 'Analyzed',  
                'message' => 'Please select a new section, the previos was failled!']);
        }
    }

    /**
     * Confirm that the given column should be removed.
     *
     * @param  int  $columnId
     * @return void
     */
    public function confirmColumnRemoval($columnId)
    {
        $this->confirmingColumnRemoval = true;

        $this->columnIdBeingRemoved = $columnId;
    }
    
    /**
     * Remove a column from the CalculatedColumn.
     *
     * @param  \App\Contracts\ColumnsCalculations  $remover
     * @return void
     */
    public function removeColumn(ColumnsCalculations $remover)
    {
        $CalculatedColumn = CalculatedColumn::where('id', $this->columnIdBeingRemoved)->where('user_id',$this->user->id)->firstOrFail();
        $remover->remove($this->user,$CalculatedColumn);

        $this->confirmingColumnRemoval = false;

        $this->columnIdBeingRemoved = null;

        $this->dispatchBrowserEvent('swal', [
            'icon' => 'success',
            'title' => 'Removed',  
            'message' => 'Your column successfully removed!']);
            
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
     * Render the component.
     *
     * @return \Illuminate\View\View
     */
    public function render()
    {
        $columns = CalculatedColumn::with('HSection','ISection','Grades')->where('user_id',$this->user->id)->orderBy('updated_at', 'DESC')->paginate(10);
        return view('livewire.columns.manager',['columns' => $columns]);
    }
}
