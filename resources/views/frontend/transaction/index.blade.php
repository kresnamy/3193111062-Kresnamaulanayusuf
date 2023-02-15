@extends('layouts.frontend.app')
@section('content')
    <!-- Breadcrumb Begin -->
    <div class="breadcrumb-option">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb__links">
                        <a href="{{ url('/') }}"><i class="fa fa-home"></i> Home</a>
                        <span>Transaction</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
 
    <section class="shop-cart spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="table-responsive table-invoice">
                        <table class="table table-striped">
                          <tbody><tr>
                            <th>Invoice ID</th>
                            <th>Products</th>
                            <th>Status</th>
                            <th>Created At</th>
                            <th>Action</th>
                          </tr>
                          @foreach ($data['orders'] as $order)
                          <tr>
                            <td><a href="{{ route('transaction.show',$order->invoice_number) }}">{{ $order->invoice_number }}</a></td>
                            <td class="font-weight-600">{{ $order->one_product }}</td>
                            <td>
                            @php
                                $retur = App\Models\Retur::where('invoice_number', $order->invoice_number)->first();
                            @endphp
                            @if (!empty($retur))
                                @if ($retur->status == 'pending')
                                <div class="badge badge-primary">Pengembalian</div>
                                @elseif($retur->status == 'canceled')
                                <div class="badge badge-danger">Pengembalian Ditolak</div>
                                @else 
                                <div class="badge badge-success">Pengembalian Diterima</div>
                                @endif
                            @else
                                {!! $order->status_name !!}
                            @endif
                            </td>
                            <td>{{ $order->created_at }}</td>
                            <td>
                              <a href="{{ route('transaction.show',$order->invoice_number) }}" class="btn btn-danger">Detail</a>
                            </td>
                          </tr>
                          @endforeach
                        </tbody></table>
                      </div>
                </div>
            </div>
        </div>
    </section>
@endsection