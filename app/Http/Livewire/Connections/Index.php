<?php

namespace App\Http\Livewire\Connections;

use Livewire\Component;

class Index extends Component
{
    public function render()
    {
        return view('livewire.connections.index')->extends('layouts.app');
    }
}
