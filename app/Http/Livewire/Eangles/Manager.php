<?php

namespace App\Http\Livewire\Eangles;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use App\Contracts\EanglesCalculations;
use App\Models\CalculatedEangle;
use App\Models\Eangle;
use Livewire\WithPagination;

class Manager extends Component
{
    use WithPagination;
    /**
     * The component's listeners.
     *
     * @var array
     */
    public $HideBoltHole = false;
    protected $listeners = [
        'refresh-manager' => '$refresh',
    ];

    /**
     * The "update Eangle" form state.
     *
     * @var array
     */
    public $updateEangleForm = [];
    public $sections;

    /**
     * Indicates if the application is confirming if a eangle should be updated.
     *
     * @var bool
     */
    public $confirmingEangleUpdate = false;

    /**
     * The ID of the eangle being updated.
     *
     * @var int|null
     */
    public $eangleIdBeingUpdated = null;

    /**
     * Indicates if the application is confirming if a eangle should be removed.
     *
     * @var bool
     */
    public $confirmingEangleRemoval = false;

    /**
     * The ID of the eangle being removed.
     *
     * @var int|null
     */
    public $eangleIdBeingRemoved = null;

    /**
     * Confirm that the given eangle should be updated.
     *
     * @param  int  $eangleId
     * @return void
     */
    public function confirmEangleUpdate($eangleId)
    {
        $this->confirmingEangleUpdate = true;

        $this->eangleIdBeingUpdated = $eangleId;

        $this->updateEangleForm = CalculatedEangle::where('id', $eangleId)->where('user_id',$this->user->id)->firstOrFail()->withoutRelations()->toArray();
        $this->sections = Eangle::all();
    }

    /**
     * Update a eangle informations.
     *
     * @param  \App\Contracts\EanglesCalculations  $updater
     * @return void
     */
    public function updateEangle(EanglesCalculations $updater)
    {
        $CalculatedEangle = CalculatedEangle::where('id', $this->eangleIdBeingUpdated)->where('user_id',$this->user->id)->firstOrFail();
        $result = $updater->update($this->user, $CalculatedEangle, $this->updateEangleForm);
        
        $this->confirmingEangleUpdate = false;

        $this->eangleIdBeingUpdated = null;

        if($result->status === 'succeeded'){
            $this->dispatchBrowserEvent('swal', [
                'icon' => 'success',
                'title' => 'Analyzed', 
                'message' => 'Congratulations, your section was succeeded :D!',
                'showCancelButton' => true,
                'confirmButtonText' => 'View report!',
                'redirect' => route('eangles.reports', $result->slug)]);
        }else{
            $this->dispatchBrowserEvent('swal', [
                'icon' => 'error',
                'title' => 'Analyzed',  
                'message' => 'Please select a new section, the previos was failled!']);
        }
    }

    /**
     * Confirm that the given eangle should be removed.
     *
     * @param  int  $eangleId
     * @return void
     */
    public function confirmEangleRemoval($eangleId)
    {
        $this->confirmingEangleRemoval = true;

        $this->eangleIdBeingRemoved = $eangleId;
    }
    
    /**
     * Remove a eangle from the CalculatedEangle.
     *
     * @param  \App\Contracts\EanglesCalculations  $remover
     * @return void
     */
    public function removeEangle(EanglesCalculations $remover)
    {
        $CalculatedEangle = CalculatedEangle::where('id', $this->eangleIdBeingRemoved)->where('user_id',$this->user->id)->firstOrFail();
        $remover->remove($this->user,$CalculatedEangle);

        $this->confirmingEangleRemoval = false;

        $this->eangleIdBeingRemoved = null;

        $this->dispatchBrowserEvent('swal', [
            'icon' => 'success',
            'title' => 'Removed',  
            'message' => 'Your angle successfully removed!']);
            
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
        $eangles = CalculatedEangle::with('designation','Grades')->where('user_id',$this->user->id)->orderBy('updated_at', 'DESC')->paginate(10);
        return view('livewire.eangles.manager', ['eangles' => $eangles]);
    }
}
