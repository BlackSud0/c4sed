<?php

namespace App\Http\Livewire\Beams;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
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
            $beam = CalculatedBeam::where('slug',$slug)->where('user_id',$this->user->id)->where('status','succeeded')->firstOrFail();
            $this->beamReport = $beam;
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
