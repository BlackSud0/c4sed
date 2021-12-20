<?php

namespace App\Http\Livewire\Eangles;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use App\Contracts\EanglesCalculations;
use App\Models\Eangle;

class DoubleEangle extends Component
{
    /**
     * The component's state.
     *
     * @var array
     */
    public $state = [
        'designation_id' => null, // default designation value :)
        'grade' => '43',        // default Grade value :D
        'D' => null,
        'DL' => null,
        'LL' => null,
        'WL' => null,
        'eangle_type' => 'Double',
        'connection_type' => null,
        'connected_to_both_sides' => false,
    ];
    
    /**
     * Create a newly registered eangle.
     *
     * @param  \App\Contracts\EanglesCalculations  $creater
     * @return void
     */
    public function CreateDoubleEangle(EanglesCalculations $creater)
    {
        $this->resetErrorBag();

        $result = $creater->create(Auth::user(), $this->state);
        
        $this->state = [
            'designation_id' => null, // default designation value :)
            'grade' => '43',        // default Grade value :D
            'D' => null,
            'DL' => null,
            'LL' => null,
            'WL' => null,
            'eangle_type' => 'Double',
            'connection_type' => null,
            'connected_to_both_sides' => false,
        ];
        
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
        
        // To refresh eangle manager table
        $this->emit('refresh-manager');


    }

    public function render()
    {   $sections = Eangle::all();
        return view('livewire.eangles.double-eangle', compact('sections'));
    }
}
