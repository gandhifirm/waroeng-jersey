<div>
    @section('page-title')
        Cart
    @endsection

    <section class="wrapper mt-3">
        <h3 class="mb-3">Keranjang</h3>

        {{-- master layout --}}
        <div class="row gx-5">
            {{-- side left --}}
            <div class="col-12 col-lg-8">
                @if (!empty($orders))
                    <div class="row justify-content-between">
                        <div class="col-6">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="selectAll">
                                <label class="form-check-label" for="selectAll">
                                    Pilih Semua
                                </label>
                            </div>
                        </div>

                        <div class="col-6 d-flex justify-content-end">
                            <div class="fs-6 fw-medium text-danger">Hapus</div>
                        </div>
                    </div>

                    <hr>
                @endif

                <div class="row gy-4">
                    @forelse ($order_details as $order_detail)
                        <div class="col-12">
                            <div class="d-flex align-items-center border-bottom pb-4">
                                {{-- check --}}
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="selectId">
                                </div>
                                {{-- check --}}

                                {{-- image --}}
                                <div class="me-3">
                                    <img src="{{ asset('assets/jersey/'.$order_detail->product->image) }}" style="width: 100px" alt="">
                                </div>
                                {{-- image --}}

                                {{-- info --}}
                                <div class="d-flex me-auto flex-column">
                                    <p class="mb-1">
                                        {{ $order_detail->product->name }}
                                    </p>
                                    <p class="mb-1">
                                        Name Set :
                                        <span class="fw-medium">
                                            @if ($order_detail->nameset != 0)
                                                {{ $order_detail->jersey_nameset }} - No. {{ $order_detail->jersey_number }}
                                            @else
                                                -
                                            @endif
                                        </span>
                                    </p>

                                    <p class="mb-0 fs-6">
                                        <span class="fw-bolder">{{ currency_IDR($order_detail->product->price) }}</span> x {{ $order_detail->order_qty }} Pcs
                                    </p>
                                </div>
                                {{-- info --}}

                                {{-- destroy --}}
                                <div class="">
                                    <div class="text-danger">
                                        <i class="fa-solid fa-trash-can" wire:click='destroy({{ $order_detail->id }})'></i>
                                    </div>
                                </div>
                                {{-- destroy --}}
                            </div>
                        </div>
                    @empty
                        <div class="text-center pt-5">
                            <h5>Keranjang Belanja Mu Masih Kosong</h5>
                            <h5>Yuk Beli Sekarang!</h5>
                        </div>
                    @endforelse
                </div>
            </div>
            {{-- side left --}}

            {{-- side right --}}
            <div class="col-12 col-lg-4">
                <div class="card p-3">
                    <div class="card-body">
                        <h6 class="fs-5 mb-3">Ringkasan Belanja</h6>

                        <div class="d-flex align-items-center justify-content-between">
                            <p class="fs-6 fw-normal mb-0">Total Harga</p>
                            <p class="fs-6 fw-normal mb-0">
                                @if (!empty($orders))
                                    {{ currency_IDR($orders->total_price) }}
                                @else
                                    -
                                @endif
                            </p>
                        </div>

                        <div class="d-flex align-items-center justify-content-between">
                            <p class="fs-6 fw-normal mb-0">Kode Unik</p>
                            <p class="fs-6 fw-normal mb-0">
                                @if (!empty($orders))
                                    {{ currency_IDR($orders->unique_code) }}
                                @else
                                    -
                                @endif
                            </p>
                        </div>

                        <hr>

                        <div class="d-flex align-items-center justify-content-between">
                            <h6 class="fs-6 fw-bolder mb-0">Total Harga</h6>
                            <h6 class="fs-6 fw-bolder mb-0">
                                @if (!empty($orders))
                                    {{ currency_IDR($orders->total_price + $orders->unique_code) }}
                                @else
                                    -
                                @endif
                            </h6>
                        </div>

                        <div class="d-flex mt-4">
                            <a href="{{ route('checkout') }}" class="btn btn-success py-2 w-100 @if (empty($orders)) disabled @endif">
                                Beli Sekarang
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            {{-- side right --}}
        </div>
        {{-- master layout --}}
    </section>
</div>
