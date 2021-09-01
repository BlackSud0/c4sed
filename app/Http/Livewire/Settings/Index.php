<?php

namespace App\Http\Livewire\Settings;

use Livewire\Component;

class Index extends Component
{
    /**
     * Render the component.
     *
     * @return \Illuminate\View\View
     */
    public function render()
    {
        return view('livewire.settings.index')->extends('layouts.app');
    }
}
