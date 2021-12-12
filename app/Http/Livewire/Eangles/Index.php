<?php

namespace App\Http\Livewire\Eangles;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use App\Models\CalculatedEangle;

class Index extends Component
{
    /**
     * The component's variables.
     *
     * @var
     */
    public $eangleReport;

    /**
     * Prepare the component.
     *
     * @return void
     */
    public function mount($slug = null)
    {
        if(!is_null($slug)){
            $eangle = CalculatedEangle::where('slug',$slug)->where('user_id',$this->user->id)->where('status','succeeded')->firstOrFail();
            $this->eangleReport = $eangle;
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
        return view('livewire.eangles.index',['eangleReport' => $this->eangleReport]);
    }
}
