<?php

namespace App\Http\Livewire\Eangles;

use Livewire\Component;

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
    public function mount($eangle, EanglesCalculations $calculater)
    {
        $this->report = $calculater->calculate($eangle);  
    }

    /**
     * Render the component.
     *
     * @return \Illuminate\View\View
     */
    public function render()
    {
        return view('livewire.eangles.reports', ['data' => $this->report]);
    }
}
