<?php

namespace App\Http\Livewire\Columns;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use App\Models\CalculatedColumn;

class Index extends Component
{
    /**
     * The component's variables.
     *
     * @var
     */
    public $columnReport;

    /**
     * Prepare the component.
     *
     * @return void
     */
    public function mount($slug = null)
    {
        if(!is_null($slug)){
            $column = CalculatedColumn::where('slug',$slug)->where('user_id',$this->user->id)->where('status','succeeded')->firstOrFail();
            $this->columnReport = $column;
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
        return view('livewire.columns.index',['columnReport' => $this->columnReport]);
    }
}
