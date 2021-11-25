<?php

namespace App\Http\Livewire\Beams;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use App\Contracts\BeamsCalculations;
use App\Models\Beam;

class FixedEnd extends Component
{
    /**
     * The component's state.
     *
     * @var array
     */
    public $state = [
        'designation_id' => '0', // default designation value :)
        'grade' => '43',        // default Grade value :D
        'L' => null,
        'DL' => null,
        'LL' => null,
        'WL' => null,
        'buckling' => false,
        'beam_type' => 'FixedEnd',
    ];

    /**
     * Create a newly registered beam.
     *
     * @param  \App\Contracts\BeamsCalculations  $creater
     * @return void
     */
    public function CreateFixedEndBeam(BeamsCalculations $creater)
    {
        $this->resetErrorBag();

        $result = $creater->create(Auth::user(), $this->state);

        $this->state = [
            'designation_id' => '0', // default designation value :)
            'grade' => '43',        // default Grade value :D
            'L' => null,
            'DL' => null,
            'LL' => null,
            'WL' => null,
            'buckling' => false,
            'beam_type' => 'FixedEnd',
        ];

        if($result->status === 'succeeded'){
            $this->dispatchBrowserEvent('swal', [
                'icon' => 'success',
                'title' => 'Analyed', 
                'message' => 'Congratulations, your section was succeeded :D!',
                'showCancelButton' => true,
                'confirmButtonText' => 'View report!',
                'redirect' => route('beams.reports', $result->slug)]);
        }else{
            $this->dispatchBrowserEvent('swal', [
                'icon' => 'error',
                'title' => 'Analyed',  
                'message' => 'Please select a new section, the previos was failled!']);
        }

        // To refresh beam manager table
        $this->emit('refresh-manager');

    }

    public function render()
    {
        $sections = Beam::all();
        return view('livewire.beams.fixed-end', compact('sections'));
    }
}
