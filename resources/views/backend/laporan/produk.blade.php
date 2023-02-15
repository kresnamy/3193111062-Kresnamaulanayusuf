@extends('layouts.backend.app')
@section('content')
    <div class="row">
        <div class="col-md-12">
            @component('components.backend.card.card-table')
                @slot('header')
                <div class="w-100 d-flex justify-content-between">
                    <div>
                        <h4 class="card-title">{{ __('Laporan Produk') }}</h4>
                    </div>
                    <div>
                        <a onclick="window.open(`{{ route('laporan.produk.cetak') }}`)" class="btn btn-primary text-white">Cetak</a>
                    </div>
                </div>
                @endslot
                @slot('thead')
                    <tr>
                        <th>{{ __('No') }}</th>
                        <th>{{ __('Nama Produk') }}</th>
                        <th>{{ __('Stok Tersisa') }}</th>
                        <th>{{ __('Total Terjual') }}</th>
                    </tr>
                @endslot
                @slot('tbody')
                    @if (isset($data))
                    @php
                        $no = 1;
                    @endphp
                    @foreach ($data['produk'] as $produk)
                        <tr>
                            <td>{{ $no }}</td>
                            <td>{{ ucfirst($produk->name) }}</td>
                            <td>{{ $produk->stock }}</td>
                            <td>{{ $produk->total_sold }}</td>
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
