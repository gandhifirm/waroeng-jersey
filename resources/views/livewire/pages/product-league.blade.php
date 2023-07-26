<div>
    @section('page-title')
        {{ $title }} : {{ $liga->name }}
    @endsection

    <section class="wrapper mt-3" id="product-list">
        <div class="row mb-5">
            <div class="col-12 col-lg-8">
                <h3 class="fw-light">
                    Product List : <span class="fw-bolder">{{ $liga->name }}</span>
                </h3>
            </div>

            <div class="col-12 col-lg-4">
                <div class="input-group mb-3">
                    <input wire:model='search' type="text" class="form-control" placeholder="search">
                    <span class="input-group-text" id="search">
                        <i class="fa-solid fa-magnifying-glass"></i>
                    </span>
                </div>
            </div>
        </div>

        <div class="row gy-4">
            @foreach ($products as $product)
                <div class="col-6 col-lg-3">
                    <div class="card card-product p-3 h-100">
                        <a href="{{ route('product.detail', $product->slug) }}" class="card-img">
                            <img src="{{ asset('assets/jersey/'.$product->image) }}" class="image-product" alt="{{ $product->name }}">
                        </a>

                        <div class="card-body p-0 pt-4">
                            <h5 class="card-title">
                                <a href="{{ route('product.detail', $product->slug) }}" class="text-black">{{ $product->name }}</a>
                            </h5>
                            <p class="card-text fs-5 mb-0">
                                <a href="{{ route('product.detail', $product->slug) }}" class="text-black-50">{{ currency_IDR($product->price) }}</a>
                            </p>
                        </div>
                    </div>
                </div>
            @endforeach

            <div class="col-12">
                <div class="d-flex justify-content-center align-items-center mt-5">
                    {{ $products->links() }}
                </div>
            </div>
        </div>
    </section>
</div>
