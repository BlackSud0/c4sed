<?php

namespace App\Http\Livewire\Beams;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use App\Contracts\BeamsCalculations;
use App\Models\Beam;

class SimplySupported extends Component
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
        'beam_type' => 'Simple',
    ];

    /**
     * Create a newly registered beam.
     *
     * @param  \App\Contracts\BeamsCalculations  $creater
     * @return void
     */
    public function CreateSimpleBeam(BeamsCalculations $creater)
    {
        $this->resetErrorBag();

        $result = $creater->create(Auth::user(), $this->state);
        
        // This will give you full access to the error bag.
        $errors = $this->getErrorBag();

        $this->state = [
            'designation_id' => '0', // default designation value :)
            'grade' => '43',        // default Grade value :D
            'L' => null,
            'DL' => null,
            'LL' => null,
            'WL' => null,
            'buckling' => false,
            'beam_type' => 'Simple',
        ];
        
        if($result->status === 'succeeded'){
            $this->dispatchBrowserEvent('swal', [
                'icon' => 'success',
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
        return view('livewire.beams.simply-supported', compact('sections'));
    }
}
