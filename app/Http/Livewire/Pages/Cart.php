<?php

namespace App\Http\Livewire\Pages;

use App\Models\Order;
use App\Models\OrderDetail;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Cart extends Component
{
    protected $orders;

    protected $order_details = [];

    public function destroy($id)
    {
        $order_details = OrderDetail::find($id);

        if (!empty($order_details)) {
            $orders = Order::where('id', $order_details->order_id)->first();

            $count_order_details = OrderDetail::where('order_id', $orders->id)->count();

            if ($count_order_details == 1) {
                $orders->delete();
            } else {
                $orders->total_price = $orders->total_price - $order_details->total_price;
                $orders->update();
            }

            $order_details->delete();
        }

        $this->emit('addCart');

        session()->flash('message', 'Pesanan sudah dihapus!');
    }

    public function render()
    {
        if (Auth::user()) {
            $this->orders = Order::where('user_id', Auth::user()->id)
            ->where('status', 0)
            ->first();

            if ($this->orders) {
                $this->order_details = OrderDetail::where('order_id', $this->orders->id)->get();
            }
        }

        return view('livewire.pages.cart', [
            'orders' => $this->orders,
            'order_details' => $this->order_details,
        ])
        ->extends('layouts.app')
        ->section('content');
    }
}
