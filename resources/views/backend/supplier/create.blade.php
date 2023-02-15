@extends('layouts.backend.app')
@section('content')
    <div class="row">
        <div class="col-12">
            @component('components.backend.card.card-form')
                @slot('isfile', true)
                @slot('action', "")
                @slot('method', 'POST')
                @slot('content')

                    <x-forms.input name="nama_supplier" id="name" :label="__('Nama Supplier')" :isRequired="true" />

                    <x-forms.input type="number" name="no_hp" id="no_hp" :label="__('No HP')" :isRequired="true"/>

                    <x-forms.input type="text" name="alamat" id="alamat" :label="__('Alamat')" :isRequired="true" />


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
