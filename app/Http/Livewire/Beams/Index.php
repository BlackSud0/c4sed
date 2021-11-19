<?php

namespace App\Http\Livewire\Beams;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use App\Models\CalculatedBeam;

class Index extends Component
{
    /**
     * The component's variables.
     *
     * @var
     */
    public $beamReport;

    /**
     * Prepare the component.
     *
     * @return void
     */

    public function mount($slug = null)
    {
        if(!is_null($slug)){
            $beam = CalculatedBeam::where('slug',$slug)->firstOrFail();
            
            if($beam->status === 'succeeded'){
                $this->beamReport = $beam;
            }else{
                $this->dispatchBrowserEvent('swal', [
                    'icon' => 'error',
                    'title' => 'Failed!',  
                    'message' => 'You can\'t view a report of failed section :D!']);
            }
        }
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

    public function render()
    {
        return view('livewire.beams.index',['beamReport' => $this->beamReport]);
    }
}
