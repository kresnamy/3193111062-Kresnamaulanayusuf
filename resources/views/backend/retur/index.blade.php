@extends('layouts.backend.app')
@section('content')
    <div class="row">
        <div class="col-md-12">
            @component('components.backend.card.card-table')
                @slot('header')
                    <h4 class="card-title">{{ __('Retur') }}</h4>
                @endslot
                @slot('thead')
                    <tr>
                        <th>{{ __('No') }}</th>
                        <th>{{ __('Nomor Pesanan') }}</th>
                        <th>{{ __('Nama Pemesan') }}</th>
                        <th>{{ __('Alasan Pengembalian') }}</th>
                        <th>{{ __('Bukti') }}</th>
                        <th>{{ __('field.action') }}</th>
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
                            <td>{{ $retur->invoice_number }}</td>
                            <td>{{ $retur->pesanan->customer->name }}</td>
                            <td>{{ $retur->keterangan }}</td>                           
                            <td>
                                <img src="{{ asset('storage/'.$retur->image) }}" alt="" style="width: 100px;">
                            </td>
                            <td>
                                <a class="btn btn-success" href="{{ route('retur.accept',$retur->id) }}"><i class="fa fa-check"></i></a>
                                <a class="btn btn-danger" href="{{ route('retur.deny',$retur->id) }}"><i class="fa fa-ban"></i></a>
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
