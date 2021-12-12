<?php

namespace App\Http\Livewire\Beams;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use App\Contracts\BeamsCalculations;
use App\Models\CalculatedBeam;
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
     * The "update Beam" form state.
     *
     * @var array
     */
    public $updateBeamForm = [];
    public $sections;

    /**
     * Indicates if the application is confirming if a beam should be updated.
     *
     * @var bool
     */
    public $confirmingBeamUpdate = false;

    /**
     * The ID of the beam being updated.
     *
     * @var int|null
     */
    public $beamIdBeingUpdated = null;

    /**
     * Indicates if the application is confirming if a beam should be removed.
     *
     * @var bool
     */
    public $confirmingBeamRemoval = false;

    /**
     * The ID of the beam being removed.
     *
     * @var int|null
     */
    public $beamIdBeingRemoved = null;

    /**
     * Confirm that the given beam should be updated.
     *
     * @param  int  $beamId
     * @return void
     */
    public function confirmBeamUpdate($beamId)
    {
        $this->confirmingBeamUpdate = true;

        $this->beamIdBeingUpdated = $beamId;

        $this->updateBeamForm = CalculatedBeam::where('id', $beamId)->where('user_id',$this->user->id)->firstOrFail()->withoutRelations()->toArray();
        $this->sections = Beam::all();
    }

    /**
     * Update a beam informations.
     *
     * @param  \App\Contracts\BeamsCalculations  $updater
     * @return void
     */
    public function updateBeam(BeamsCalculations $updater)
    {
        $CalculatedBeam = CalculatedBeam::where('id', $this->beamIdBeingUpdated)->where('user_id',$this->user->id)->firstOrFail();
        $result = $updater->update($this->user, $CalculatedBeam, $this->updateBeamForm);
        
        $this->confirmingBeamUpdate = false;

        $this->beamIdBeingUpdated = null;

        if($result->status === 'succeeded'){
            $this->dispatchBrowserEvent('swal', [
                'icon' => 'success',
                'title' => 'Analyzed', 
                'message' => 'Congratulations, your section was succeeded :D!',
                'showCancelButton' => true,
                'confirmButtonText' => 'View report!',
                'redirect' => route('beams.reports', $result->slug)]);
        }else{
            $this->dispatchBrowserEvent('swal', [
                'icon' => 'error',
                'title' => 'Analyzed',  
                'message' => 'Please select a new section, the previos was failled!']);
        }
    }

    /**
     * Confirm that the given beam should be removed.
     *
     * @param  int  $beamId
     * @return void
     */
    public function confirmBeamRemoval($beamId)
    {
        $this->confirmingBeamRemoval = true;

        $this->beamIdBeingRemoved = $beamId;
    }
    
    /**
     * Remove a beam from the CalculatedBeam.
     *
     * @param  \App\Contracts\BeamsCalculations  $remover
     * @return void
     */
    public function removeBeam(BeamsCalculations $remover)
    {
        $CalculatedBeam = CalculatedBeam::where('id', $this->beamIdBeingRemoved)->where('user_id',$this->user->id)->firstOrFail();
        $remover->remove($this->user,$CalculatedBeam);

        $this->confirmingBeamRemoval = false;

        $this->beamIdBeingRemoved = null;

        $this->dispatchBrowserEvent('swal', [
            'icon' => 'success',
            'title' => 'Removed',  
            'message' => 'Your beam successfully removed!']);
            
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
        $beams = CalculatedBeam::with('designation','Grades')->where('user_id',$this->user->id)->orderBy('updated_at', 'DESC')->paginate(10);
        return view('livewire.beams.manager',['beams' => $beams]);
    }
}
