<?php

namespace App\Http\Livewire\Beams;

use Livewire\Component;

class Index extends Component
{
    public function render()
    {
        return view('livewire.beams.index')->extends('layouts.app');
    }
}
