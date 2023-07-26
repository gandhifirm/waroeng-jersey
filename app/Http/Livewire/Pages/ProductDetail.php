<?php

namespace App\Http\Livewire\Pages;

use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class ProductDetail extends Component
{
    public $product, $order_qty = 1, $nameset, $jersey_nameset, $jersey_number, $total_price;

    public function mount($slug)
    {
        $productDetail = Product::where('slug', $slug)->first();

        if ($productDetail) {
            $this->product = $productDetail;
        }
    }

    public function plus()
    {
        $this->order_qty++;
    }

    public function minus()
    {
        $this->order_qty--;
    }

    public function addToCart()
    {
        $this->validate([
            'order_qty' => 'required|numeric'
        ]);

        // validasi jika belum login
        if (!Auth::user()) {
            return redirect()->route('login');
        }

        // hitung total harga pesanan
        if (!empty($this->jersey_nameset)) {
            $total_price = $this->order_qty * $this->product->price + $this->product->price_nameset;
        } else {
            $total_price = $this->order_qty * $this->product->price;
        }

        // cek apakah user punya data pesanan utama yang statusnya 0
        $orders = Order::where('user_id', Auth::user()->id)->where('status', 0)->first();

        // simpan atau update data pesanan utama
        if (empty($orders)) {
            Order::create([
                'user_id' => Auth::user()->id,
                'total_price' => $total_price,
                'status' => 0,
                'unique_code' => mt_rand(100, 999),
            ]);

            $orders = Order::where('user_id', Auth::user()->id)->where('status', 0)->first();
            $orders->order_number = 'WJ-'.$orders->id.$orders->unique_code;
            $orders->update();
        } else {
            $orders->total_price = $orders->total_price + $total_price;
            $orders->update();
        }

        // menyimpan pesanan detail
        OrderDetail::create([
            'product_id' => $this->product->id,
            'order_id' => $orders->id,
            'order_qty' => $this->order_qty,
            'nameset' => $this->jersey_nameset ? true : false,
            'jersey_nameset' => $this->jersey_nameset,
            'jersey_number' => $this->jersey_number,
            'total_price' => $total_price
        ]);

        // fungsi realtime update cart count
        $this->emit('addCart');

        session()->flash('message', 'Berhasil ditambahkan ke keranjang!');

        return redirect()->back();
    }

    public function render()
    {
        return view('livewire.pages.product-detail', [
            'title' => 'Products'
        ])
        ->extends('layouts.app')
        ->section('content');
    }
}
