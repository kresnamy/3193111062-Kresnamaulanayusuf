@extends('layouts.backend.app')
@section('content')
    <div class="row">
        <div class="col-md-12">
            @component('components.backend.card.card-table')
                @slot('header')
                <div class="w-100 d-flex justify-content-between">
                    <div>
                        <h4 class="card-title">{{ __('Laporan Retur') }}</h4>
                    </div>
                    <div>
                        <a onclick="window.open(`{{ route('laporan.retur.cetak') }}`)" class="btn btn-primary text-white">Cetak</a>
                    </div>
                </div>
                @endslot
                @slot('thead')
                    <tr>
                        <th>{{ __('No') }}</th>
                        <th>{{ __('Nama Pengaju Retur') }}</th>
                        <th>{{ __('Nomor Pesanaan') }}</th>
                        <th>{{ __('Keterangan Pengembalian') }}</th>
                        <th>{{ __('Foto Produk') }}</th>
                        <th>{{ __('Status') }}</th>
                    </tr>
                @endslot
                @slot('tbody')
                    @if (isset($data))
                    @php
                        $no = 1;
                    @endphp
                    @foreach ($data['retur'] as $retur)
                        <tr>
                            <td>{{ $no }}</td>
                            <td>{{ $retur->pesanan->customer->name }}</td>
                            <td>{{ $retur->invoice_number }}</td>
                            <td>{{ $retur->keterangan }}</td>                           
                            <td>
                                <img src="{{ asset('storage/'.$retur->image) }}" alt="" style="width: 100px;">
                            </td>
                            @if ($retur->status == 'accepted')
                            <td><span class="badge badge-success">Diterima</span></td>          
                            @else                 
                            <td><span class="badge badge-danger">Ditolak</span></td>          
                            @endif
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
