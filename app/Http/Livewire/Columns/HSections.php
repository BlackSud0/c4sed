<?php

namespace App\Http\Livewire\Columns;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use App\Contracts\ColumnsCalculations;
use App\Models\Column;

class HSections extends Component
{
    /**
     * The component's state.
     *
     * @var array
     */
    public $state = [
        'designation_id' => null, // default designation value :)
        'grade' => '43',        // default Grade value :D
        'L' => null,
        'DL' => null,
        'LL' => null,
        'WL' => null,
        'column_type' => 'HSection',
        'element_type' => null
    ];
    
    /**
     * Create a newly registered column.
     *
     * @param  \App\Contracts\ColumnsCalculations  $creater
     * @return void
     */
    public function CreateHSection(ColumnsCalculations $creater)
    {
        $this->resetErrorBag();

        $result = $creater->create(Auth::user(), $this->state);
        
        $this->state = [
            'designation_id' => null, // default designation value :)
            'grade' => '43',        // default Grade value :D
            'L' => null,
            'DL' => null,
            'LL' => null,
            'WL' => null,
            'column_type' => 'HSection',
            'element_type' => null,
        ];
        
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
        
        // To refresh column manager table
        $this->emit('refresh-manager');


    }

    public function render()
    {   $sections = Column::all();
        return view('livewire.columns.h-sections', compact('sections'));
    }
}
