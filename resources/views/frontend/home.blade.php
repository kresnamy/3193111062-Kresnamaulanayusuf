@extends('layouts.frontend.app')
@section('content')
    <!-- Categories Section Begin -->
    <section class="categories">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-6 p-0">
                    <div class="categories__item categories__large__item set-bg"
                        data-setbg="{{ asset('me') }}/img/bannerz.jpg">
                        <div class="categories__text" style="background-color: rgb(91, 44, 111, .7); padding: 60px; border-radius: 10px;">
                            <p style="color:beige; font-size: 150%; font-family: Trebuchet MS;">
                                Beragam Produk Pakaian Anak Terlengkap Tersedia Di MegumiKidsWear.
                            </p>
                            <a href="{{ route('product.index') }}" style="color:beige; font-family: Trebuchet MS;">
                                Belanja Sekarang
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="row">
                        @foreach ($data['new_categories'] as $category)
                            <div class="col-lg-6 col-md-6 col-sm-6 p-0">
                                <div class="categories__item set-bg"
                                    data-setbg="{{ asset('storage/' . $category->thumbnails) }}">
                                    <div class="categories__text">
                                        <h4>{{ $category->name }}</h4>
                                        <p>{{ $category->Products()->count() }} item</p>
                                        <a href="{{ route('category.show',$category->slug) }}">Jelajahi</a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Categories Section End -->

    <!-- Product Section Begin -->
    <section class="product spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-4">
                    <div class="section-title">
                        <h4>Produk Terbaru</h4>
                    </div>
                </div>
                <div class="col-lg-8 col-md-8">
                    <ul class="filter__controls">
                        <li class="active" data-filter="*">Semua</li>
                        @foreach ($data['new_categories'] as $new_categories)
                            <li data-filter=".{{ $new_categories->slug }}">{{ $new_categories->name }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <div class="row property__gallery">
                @foreach ($data['new_categories'] as $new_categories2)
                    @foreach ($new_categories2->Products()->latest()->limit(2)->get()
        as $product)
                        <div class="col-lg-3 col-md-4 col-sm-6 mix {{ $new_categories2->slug }}">
                            @component('components.frontend.product-card')
                                @slot('image', asset('storage/' . $product->thumbnails))
                                @slot('route', route('product.show', ['categoriSlug' => $new_categories2->slug, 'productSlug' =>
                                    $product->slug]))
                                    @slot('name', $product->name)
                                    @slot('price', $product->price)
                                @endcomponent
                            </div>
                        @endforeach
                    @endforeach
                </div>
            </div>
        </section>
        <!-- Product Section End -->
    @endsection
