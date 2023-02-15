@extends('layouts.frontend.app')
@section('content')
    <!-- Breadcrumb Begin -->
    <div class="breadcrumb-option">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb__links">
                        <a href="{{ url('/') }}"><i class="fa fa-home"></i> Home</a>
                        <span>Retur</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Retur Section Begin -->
    <section class="checkout spad">
        <div class="container">
        <div class="col-md-15" style="background-color: rgb(187, 143, 206, .7); padding: 40px; border-radius: 50px;">
                <div class="mb-4 text-center">
            <h5 class="mb-5">Retur Pengembalian</h5>
            <div class="row">
                <div class="col-12">
                    @component('components.backend.card.card-form')
                        @slot('isfile', true)
                        @slot('action', Route('retur'))
                        @slot('method', 'POST')
                        @slot('content')
        
                            <x-forms.input name="invoice_number" id="invoice_number" :label="__('Nomor Invoice')" :isRequired="true" />
        
                            <x-forms.select name="keterangan" id="keterangan"
                                label="{{ __('button.select') }} {{ __('Alasan') }}" :isRequired="true">
                                <option value="" selected disabled>{{ __('button.select') }} {{ __('Alasan') }}</option>
                                <option>Produk Cacat</option>
                                <option>Produk Tidak Sesuai</option>
                            </x-forms.select>
                            
                            <x-forms.input type="file" name="image" id="image" :label="__('Bukti Retur')" :isRequired="true" />
        
        
                            <div class="text-right">
                                <a href="{{ Route('home') }}" class="btn btn-secondary " href="#">{{ __('button.cancel') }}</a>
                                <button type="submit" class="btn btn-primary " href="#">{{ __('button.save') }}</button>
                            </div>
        
                        @endslot
                    @endcomponent
                </div>
            </div>
        </div>
    </section>
    <!-- retur Section End -->
@endsection

