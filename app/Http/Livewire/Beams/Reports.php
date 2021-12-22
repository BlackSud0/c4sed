<?php

namespace App\Http\Livewire\Beams;

use Livewire\Component;
use App\Contracts\BeamsCalculations;

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
    public function mount($beam, BeamsCalculations $calculater)
    {
        $this->report = $calculater->calculate($beam);  
    }

    /**
     * Render the component.
     *
     * @return \Illuminate\View\View
     */
    public function render()
    {
        return view('livewire.beams.reports',['data' => $this->report]);
    }
}
