<?php

namespace App\Http\Livewire\Components;

use App\Models\Liga;
use App\Models\Order;
use App\Models\OrderDetail;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Navbar extends Component
{
    public $count = 0;

    protected $listeners = [
        'addCart' => 'updateCart'
    ];

    public function updateCart()
    {
        if (Auth::user()) {
            $orders = Order::where('user_id', Auth::user()->id)->where('status', 0)->first();

            if ($orders) {
                $this->count = OrderDetail::where('order_id', $orders->id)->count();
            } else {
                $this->count = 0;
            }
        }
    }

    public function mount()
    {
        if (Auth::user()) {
            $orders = Order::where('user_id', Auth::user()->id)->where('status', 0)->first();

            if ($orders) {
                $this->count = OrderDetail::where('order_id', $orders->id)->count();
            } else {
                $this->count = 0;
            }
        }
    }

    public function render()
    {
        return view('livewire.components.navbar', [
            'ligas' => Liga::all(),
            'count_orders' => $this->count,
        ]);
    }
}
