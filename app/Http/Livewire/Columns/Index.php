<?php

namespace App\Http\Livewire\Columns;

use Livewire\Component;

class Index extends Component
{
    public function render()
    {
        return view('livewire.columns.index')->extends('layouts.app');
    }
}
