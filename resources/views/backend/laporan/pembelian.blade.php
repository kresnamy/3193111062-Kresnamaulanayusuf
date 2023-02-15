@extends('layouts.backend.app')
@section('content')
    <div class="row">
        <div class="col-md-12">
            @component('components.backend.card.card-table')
                @slot('header')
                <div class="w-100 d-flex justify-content-between">
                    <div>
                        <h4 class="card-title">{{ __('Laporan Pembelian') }}</h4>
                    </div>
                    <div>
                        <a onclick="window.open(`{{ route('laporan.pembelian.cetak') }}`)" class="btn btn-primary text-white">Cetak</a>
                    </div>
                </div>
                @endslot
                @slot('thead')
                    <tr>
                        <th>{{ __('No') }}</th>
                        <th>{{ __('Nama Supplier') }}</th>
                        <th>{{ __('Produk') }}</th>
                        <th>{{ __('Jumlah') }}</th>
                        <th>{{ __('Biaya') }}</th>
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
                            <td>Rp{{ number_format($pembelian->stock * $pembelian->product->price) }}</td>
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
