<?php

namespace App\Http\Livewire\Pages;

use App\Models\Liga;
use App\Models\Product;
use Livewire\Component;

class Home extends Component
{
    public function render()
    {
        return view('livewire.pages.home', [
            'ligas' => Liga::all(),
            'products' => Product::take(4)->get(),
            'title' => "Home"
        ])
        ->extends('layouts.app')
        ->section('content');
    }
}
