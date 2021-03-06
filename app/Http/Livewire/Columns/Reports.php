<?php

namespace App\Http\Livewire\Columns;

use Livewire\Component;
use App\Contracts\ColumnsCalculations;

class Reports extends Component
{
    /**
     * The component's variables.
     *
     * @var
     */
    protected $report;

    /**
     * Prepare the component.
     *
     * @return void
     */
    public function mount($column, ColumnsCalculations $calculater)
    {
        $this->report = $calculater->calculate($column);  
    }
    
    /**
     * Render the component.
     *
     * @return \Illuminate\View\View
     */
    public function render()
    {
        return view('livewire.columns.reports', ['data' => $this->report]);
    }
}
