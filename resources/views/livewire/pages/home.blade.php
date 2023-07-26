<div>
    @section('page-title')
        {{ $title }}
    @endsection

    {{-- banner slider --}}
    <section class="wrapper" id="banner-slider">
        <div id="carouselExampleIndicators" class="carousel slide">
            {{-- carousel-indicators --}}
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0"
                    class="active" aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"
                    aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"
                    aria-label="Slide 3"></button>
            </div>
            {{-- carousel-indicators --}}

            {{-- carousel-inner --}}
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="{{ asset('assets/slider/slider1.png') }}" class="d-block w-100" alt="JerseyPedia Banner">
                </div>
                <div class="carousel-item">
                    <img src="{{ asset('assets/slider/slider1.png') }}" class="d-block w-100" alt="JerseyPedia Banner">
                </div>
                <div class="carousel-item">
                    <img src="{{ asset('assets/slider/slider1.png') }}" class="d-block w-100" alt="JerseyPedia Banner">
                </div>
            </div>
            {{-- carousel-inner --}}

            {{-- carousel-control --}}
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators"
                data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>

            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators"
                data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
            {{-- carousel-control --}}
        </div>
    </section>
    {{-- banner slider --}}

    {{-- category liga --}}
    <section class="wrapper mt-5" id="category-liga">
        <h3 class="mb-4 fw-bolder">Liga Categories</h3>

        <div class="row">
            @foreach ($ligas as $liga)
                <div class="col-6 col-lg-3">
                    <div class="card card-liga p-2 py-3">
                        <a href="{{ route('product.league',$liga->slug) }}" class="card-img">
                            <img src="{{ asset('assets/liga/'.$liga->image) }}" class="image-logo" alt="{{ $liga->name }}">
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
    </section>
    {{-- category liga --}}

    {{-- product list --}}
    <section class="wrapper mt-5" id="product-list">
        <div class="d-flex align-items-center justify-content-between mb-4">
            <h3 class="mb-0 fw-bolder">Product List</h3>

            <a href="{{ route('products') }}" class="btn btn-dark btn-sm">
                Lihat Semua <i class="fa-solid fa-arrow-right ms-2"></i>
            </a>
        </div>

        <div class="row">
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
        </div>
    </section>
    {{-- product list --}}
</div>
