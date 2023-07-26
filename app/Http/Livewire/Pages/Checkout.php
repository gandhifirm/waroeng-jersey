<?php

namespace App\Http\Livewire\Pages;

use Livewire\Component;

class Checkout extends Component
{
    public function render()
    {
        return view('livewire.pages.checkout')
        ->extends('layouts.app')
        ->section('content');
    }
}
