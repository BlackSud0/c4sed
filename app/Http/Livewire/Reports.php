<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use App\Models\CalculatedBeam;
use App\Models\CalculatedColumn;

class Reports extends Component
{
    /**
     * The component's variables.
     *
     * @var
     */
    public $beamReport;
    public $columnReport;

    /**
     * Prepare the component.
     *
     * @return void
     */

    public function mount($element, $slug)
    {
        //  ...... till base plates
        if(!is_null($slug)){
            if($element === "beam"){
                $beam = CalculatedBeam::where('slug',$slug)->where('user_id',$this->user->id)->where('status','succeeded')->firstOrFail();
                $this->beamReport = $beam;
            }elseif($element == "column"){
                $column = CalculatedColumn::where('slug',$slug)->where('user_id',$this->user->id)->where('status','succeeded')->firstOrFail();
                $this->columnReport = $column;
            }
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
        return view('livewire.reports',['beamReport' => $this->beamReport,'columnReport' => $this->columnReport])->layout('layouts.reports');;
    }
}
