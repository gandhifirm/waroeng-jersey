<?php

namespace App\Http\Livewire\Pages;

use App\Models\Product as ModelsProduct;
use Livewire\Component;
use Livewire\WithPagination;

class Product extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $search = '';

    public function render()
    {
        return view('livewire.pages.product', [
            'products' => ModelsProduct::where('name', 'like', '%'.$this->search.'%')->paginate(8),
            'title' => 'Products'
        ])
        ->extends('layouts.app')
        ->section('content');
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }
}
