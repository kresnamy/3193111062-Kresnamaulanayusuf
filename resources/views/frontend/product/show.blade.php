@extends('layouts.frontend.app')
@section('content')
    <!-- Breadcrumb Begin -->
    <div class="breadcrumb-option">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb__links">
                        <a href="{{ url('/') }}"><i class="fa fa-home"></i> Home</a>
                        <a href="">{{ $data['product']->Category->name }}</a>
                        <span>{{ $data['product']->name }}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb End -->

    <!-- Product Details Section Begin -->
    <section class="product-details spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="product__details__pic">
                        <div class="product__details__slider__content">
                            <div class="product__details__pic__slider owl-carousel">
                                <img data-hash="product-1" class="product__big__img w-75" height="460px" style="box-shadow: rgba(60, 64, 67, 0.3) 0px 1px 2px 0px, rgba(60, 64, 67, 0.15) 0px 2px 6px 2px;" src="{{ asset($data['product']->thumbnails_path) }}" alt="">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="product__details__text">
                        <h3>{{ $data['product']->name }} <span>Kategori: {{ $data['product']->Category->name }}</span></h3>
                        
                        <form action="{{ route('cart.store') }}" method="POST">
                        <div class="product__details__price">Rp {{ $data['product']->price }} <span></div>
                        @csrf
                        <div class="product__details__button">
                            <div class="quantity">
                                <span>Jumlah:</span>
                                <div class="pro-qty">
                                    <input type="text" readonly name="cart_qty" value="1" style="background-color: #E8DAEF">
                                </div>
                                <input type="hidden" name="cart_product_id" value="{{ $data['product']->id }}">
                            </div>
                            <button type="submit" class="cart-btn"><span class="icon_bag_alt"></span> Tambah Ke Keranjang</button>
                        </div>
                        <div class="product__details__widget">
                        </form>
                            <ul>
                                <li>
                                    <span>Berat : </span>
                                    <p>{{ $data['product']->weight }} Gram</p>
                                </li>
                                <li>
                                    <span>Stok : </span>
                                    <p>{{ $data['product']->stock }} Buah</p>
                                </li>
                                <li>
                                    <span>Ukuran : </span>
                                    <p>{{ $data['product']->ukuran }}</p>
                                </li>
                                <li>
                                    <div class="tab-content">
                                        <div class="tab-pane active" id="tabs-1" role="tabpanel">
                                            <h6>Deskripsi Produk</h6>
                                            {!! $data['product']->description !!}
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <br>
            <br>
            <div class="row mt-5">
                <div class="col-lg-12 text-center mb-2">
                    <div class="related__title">
                        <h4>Produk Lainnya</h4>
                    </div>
                    <div class="product__details__widget mt-3"></div>
                </div>
               @foreach ($data['product_related'] as $product_related)
               <div class="col-lg-3 col-md-4 col-sm-6">
                @component('components.frontend.product-card')
                @slot('image', asset('storage/' . $product_related->thumbnails))
                @slot('route', route('product.show', ['categoriSlug' => $product_related->Category->slug, 'productSlug' =>
                    $product_related->slug]))
                    @slot('name', $product_related->name)
                    @slot('price', $product_related->price)
                @endcomponent
                </div>
               @endforeach
            </div>
        </div>
    </section>
    <!-- Product Details Section End -->
@endsection