@extends('layouts.backend.app')
@section('content')
    <div class="row">
        <div class="col-md-12">
            @component('components.backend.card.card-table')
                @slot('header')
                <h4 class="card-title">{{ __('Pembelian') }}</h4>
                @endslot
                @slot('thead')
                    <tr>
                        <th>{{ __('No') }}</th>
                        <th>{{ __('Nama Supplier') }}</th>
                        <th>{{ __('Nama Produk') }}</th>
                        <th>{{ __('Jumlah') }}</th>
                    </tr>
                @endslot
                @slot('tbody')
                    @if (isset($data))
                    @php
                        $no = 1;
                    @endphp
                    @foreach ($data['pembelian'] as $pembelian)
                        <tr>
                            <td>{{ $no }}</td>
                            <td>{{ $pembelian->supplier->nama_supplier }}</td>
                            <td>{{ $pembelian->product->name }}</td>
                            <td>{{ $pembelian->stock }}</td>
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
