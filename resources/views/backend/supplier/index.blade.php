@extends('layouts.backend.app')
@section('content')
    <div class="row">
        <div class="col-md-12">
            @component('components.backend.card.card-table')
                @slot('header')
                <div class="w-100 d-flex justify-content-between">
                    <div>
                        <h4 class="card-title">{{ __('Supplier') }}</h4>
                    </div>
                    <div>
                        <a href="{{ route('supplier.create') }}" class="btn btn-primary">Tambah [+]</a>
                    </div>
                </div>
                @endslot
                @slot('thead')
                    <tr>
                        <th>{{ __('No') }}</th>
                        <th>{{ __('Nama Supplier') }}</th>
                        <th>{{ __('No HP') }}</th>
                        <th>{{ __('Alamat') }}</th>
                        <th>{{ __('field.action') }}</th>
                    </tr>
                @endslot
                @slot('tbody')
                    @if (isset($data))
                    @php
                        $no = 1;
                    @endphp
                    @foreach ($data['supplier'] as $supplier)
                        <tr>
                            <td>{{ $no }}</td>
                            <td>{{ $supplier->nama_supplier }}</td>
                            <td>{{ $supplier->no_hp }}</td>
                            <td>{{ $supplier->alamat }}</td>
                            <td>
                                <a class="btn btn-success" href="{{ route('supplier.order',$supplier->id) }}">Pesan</a>
                            </td>
                        </tr>
                        @php
                            $no++;
                        @endphp
                    @endforeach
                    @endif
                @endslot
            @endcomponent
        </div>
    </div>
@endsection
