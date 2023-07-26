<?php

namespace App\Http\Livewire\Pages;

use App\Models\Liga;
use App\Models\Product as ModelsProduct;
use Livewire\Component;
use Livewire\WithPagination;

class ProductLeague extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $search = '';
    public $liga;

    public function mount($slug)
    {
        $ligaDetail = Liga::where('slug', $slug)->first();

        if ($ligaDetail) {
            $this->liga = $ligaDetail;
        }
    }

    public function render()
    {
        return view('livewire.pages.product-league', [
            'products' => ModelsProduct::where('liga_id', $this->liga->id)->where('name', 'like', '%'.$this->search.'%')->paginate(8),
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
