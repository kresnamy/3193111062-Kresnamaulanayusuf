@extends('layouts.backend.app')
@section('content')
    <div class="row">
        <div class="col-12">
            @component('components.backend.card.card-form')
                @slot('isfile', true)
                @slot('action', "")
                @slot('method', 'POST')
                @slot('content')

                    <x-forms.input type="hidden" value="{{ $data['supplier']->id }}" name="supplier_id" id="supplier_id" :isRequired="true"/>

                    <x-forms.input value="{{ $data['supplier']->nama_supplier }}" id="name" :label="__('Nama Supplier')" :isRequired="true" />

                    <x-forms.select name="product_id" id="product_id"
                        label="{{ __('button.select') }} {{ __('Produk') }}" :isRequired="true">
                        <option value="" selected disabled>{{ __('button.select') }} {{ __('Produk') }}</option>
                        @foreach ($data['produk'] as $product)
                            <option value="{{ $product->id }}">{{ $product->name }}</option>
                        @endforeach
                    </x-forms.select>

                    <x-forms.input type="number" name="stock" id="stock" :label="__('Jumlah')" :isRequired="true"/>


                    <div class="text-right">
                        <a href="{{ Route('master.product.index') }}" class="btn btn-secondary " href="#">{{ __('button.cancel') }}</a>
                        <button type="submit" class="btn btn-primary " href="#">{{ __('button.save') }}</button>
                    </div>

                @endslot
            @endcomponent
        </div>
    </div>
@endsection
@push('js')
    <script>
        $(document).on('keyup', '#name', function() {
            let val = $(this).val();
            let slugformat = val.toLowerCase().replace(/ /g, '-').replace(/[^\w-]+/g, '');
            $('#slug').val(slugformat);
        });
    </script>
@endpush
