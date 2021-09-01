<?php

namespace App\Http\Livewire\BasePlates;

use Livewire\Component;

class Index extends Component
{
    public function render()
    {
        return view('livewire.base-plates.index')->extends('layouts.app');
    }
}
