<?php

namespace App\Http\Livewire\Beams;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use App\Contracts\BeamsCalculations;
use App\Models\Beam;

class Cantilever extends Component
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
        'beam_type' => 'Cantilever',
    ];

    /**
     * Create a newly registered beam.
     *
     * @param  \App\Contracts\BeamsCalculations  $creater
     * @return void
     */
    public function CreateCantileverBeam(BeamsCalculations $creater)
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
            'beam_type' => 'Cantilever',
        ];

        if($result->status === 'succeeded'){
            $this->dispatchBrowserEvent('alert', [
                'type' => 'success',
                'icon' => 'fa fa-shield-alt',
                'title' => 'Analyed',  
                'message' => 'your section was succeeded :D!']);
        }else{
            $this->dispatchBrowserEvent('alert', [
                'type' => 'danger',
                'icon' => 'fa fa-shield-alt',
                'title' => 'Analyed',  
                'message' => 'your section was failled!']);
        }

        // To refresh beam manager table
        $this->emit('refresh-manager');

    }

    public function render()
    {
        $sections = Beam::all();
        return view('livewire.beams.cantilever', compact('sections'));
    }
}
