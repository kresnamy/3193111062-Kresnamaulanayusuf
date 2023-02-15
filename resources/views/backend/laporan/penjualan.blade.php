@extends('layouts.backend.app')
@section('content')
    <div class="row">
        <div class="col-md-12">
            @component('components.backend.card.card-table')
                @slot('header')
                <div class="w-100 d-flex justify-content-between">
                    <div>
                        <h4 class="card-title">{{ __('Laporan Penjualan') }}</h4>
                    </div>
                    <div>
                        <a onclick="window.open(`{{ route('laporan.penjualan.cetak') }}`)" class="btn btn-primary text-white">Cetak</a>
                    </div>
                </div>
                @endslot
                @slot('thead')
                    <tr>
                        <th>{{ __('No') }}</th>
                        <th>{{ __('Nama Produk') }}</th>
                        <th>{{ __('Jumlah') }}</th>
                        <th>{{ __('Total') }}</th>
                    </tr>
                @endslot
                @slot('tbody')
                    @if (isset($data))
                    @php
                        $no = 1;
                    @endphp
                    @foreach ($data['penjualan'] as $penjualan)
                        <tr>
                            <td>{{ $no }}</td>
                            <td>{{ ucfirst($penjualan->Product->name) }}</td>
                            <td>{{ $penjualan->Product->total_sold }}</td>
                            <td>Rp{{ number_format($penjualan->Product->total_sold * $penjualan->Product->price) }}</td>
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
