<?php

namespace App\Http\Livewire\Eangles;

use Livewire\Component;

class Index extends Component
{
    public function render()
    {
        return view('livewire.eangles.index')->extends('layouts.app');
    }
}
