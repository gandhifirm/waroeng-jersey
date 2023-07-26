<div>
    @section('page-title')
        {{ $product->name }}
    @endsection

    <section class="wrapper mt-3" id="product-detail">
        <div class="row">
            <div class="col-12">
                @if (session()->has('message'))
                    <div class="alert alert-success" role="alert">
                        {{ session('message') }}
                    </div>
                @endif
            </div>
        </div>

        <div class="row gy-4">
            <div class="col-l2 col-lg-5">
                <div class="card card-product p-3 h-100">
                    <div class="card-img">
                        <img src="{{ asset('assets/jersey/'.$product->image) }}" class="image-product image-product--large" alt="{{ $product->name }}">
                    </div>
                </div>
            </div>

            <div class="col-12 col-lg-7">
                <div class="ps-0 ps-lg-4">
                    @if ($product->is_ready == 1)
                        <span class="badge bg-success py-2 px-3 fw-normal fs-6">
                            <i class="fa-solid fa-circle-check me-1"></i> Ready Stock
                        </span>
                    @else
                        <span class="badge bg-danger py-2 px-3 fw-normal fs-6">
                            <i class="fa-solid fa-circle-xmark me-1"></i> Out of Stock
                        </span>
                    @endif

                    <h3 class="mt-3">{{ $product->name }}</h3>
                    <h4 class="mt-1">{{ currency_IDR($product->price) }}</h4>

                    <hr class="my-4">

                    @if ($order_qty > 1)
                        <div class="alert alert-danger text-center" style="font-size: 14px" role="alert">
                            <span class="fw-bold">Catatan :</span> Jumlah pembelian lebih dari 1 Pcs tidak dapat memesan Custom Jersey Nameset
                        </div>
                    @endif

                    <form wire:submit.prevent='addToCart'>
                        @csrf
                        <div class="table-responsive">
                            <table class="table table-borderless align-middle">
                                <tbody>
                                    <tr>
                                        <td>Jenis Liga</td>
                                        <td class="text-center">:</td>
                                        <td>
                                            <img src="{{ asset('assets/liga/'.$product->liga->image) }}" class="img-fluid" style="width: 45px" alt="{{ $product->liga->name }}">
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>Jenis Produk</td>
                                        <td class="text-center">:</td>
                                        <td>{{ $product->type }}</td>
                                    </tr>

                                    <tr>
                                        <td>Berat Produk</td>
                                        <td class="text-center">:</td>
                                        <td>{{ $product->weight }} Kg</td>
                                    </tr>

                                    <tr>
                                        <td>Total Order</td>
                                        <td class="text-center">:</td>
                                        <td class="d-flex align-items-center">
                                            @if ($product->is_ready == 1)
                                                <div wire:click='plus' class="btn btn-dark me-2">
                                                    <i class="fa-solid fa-plus"></i>
                                                </div>

                                                <input class="form-control form-control--number text-center" type="number" wire:model="order_qty">

                                                <div wire:click='minus' class="btn {{ $order_qty <= 1 ? 'btn-outline-dark disabled' : 'btn-dark' }} ms-2">
                                                    <i class="fa-solid fa-minus"></i>
                                                </div>
                                            @else
                                                <button class="btn btn-light me-2" disabled>
                                                    <i class="fa-solid fa-plus"></i>
                                                </button>

                                                <input class="form-control form-control--number text-center" type="number" placeholder="0" disabled>

                                                <button class="btn btn-light ms-2" disabled>
                                                    <i class="fa-solid fa-minus"></i>
                                                </button>
                                            @endif

                                            <span class="fw-medium ms-3">/Pcs</span>
                                        </td>
                                    </tr>

                                    @if ($order_qty <= 1)
                                    <tr>
                                        <td colspan="3" class="text-center py-3">
                                            <span class="fw-medium text-uppercase">Order Jersey Name Set</span>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>Harga NameSet</td>
                                        <td class="text-center">:</td>
                                        <td>{{ currency_IDR($product->price_nameset) }}</td>
                                    </tr>

                                    <tr>
                                        <td>Jersey Name</td>
                                        <td class="text-center">:</td>
                                        <td>
                                            <input class="form-control w-75" type="text" wire:model="jersey_nameset" @if ($product->is_ready == 0) disabled @endif>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>Jersey Number</td>
                                        <td class="text-center">:</td>
                                        <td>
                                            <input class="form-control form-control--number text-center" type="number" wire:model="jersey_number" @if ($product->is_ready == 0) disabled @endif>
                                        </td>
                                    </tr>
                                    @endif
                                </tbody>
                            </table>
                        </div>

                        <div class="mt-2">
                            <button type="submit" class="btn btn-dark w-100 py-2" @if ($product->is_ready == 0) disabled @endif>
                                <i class="fa-solid fa-cart-plus me-2"></i> Tambah ke Keranjang
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</div>
