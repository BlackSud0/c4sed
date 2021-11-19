<?php

namespace App\Http\Livewire\Beams;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use App\Contracts\BeamsCalculations;
use App\Models\CalculatedBeam;

class Reports extends Component
{
    /**
     * The component's variables.
     *
     * @var
     */
    public $manual = false;
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

    
    public function render()
    {
        return view('livewire.beams.reports',['data' => $this->report]);
    }
}
