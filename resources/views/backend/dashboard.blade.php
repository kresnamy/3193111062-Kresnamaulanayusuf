@extends('layouts.backend.app')
@section('content')
    <div class="row">
        <div class="col-md-4">
            <div class="card card-statistic-2">
                <div class="card-stats">
                    <div class="card-stats-title">STATISTIK PESANAN
                    </div>
                    <div class="card-stats-items">
                        <div class="card-stats-item">
                            <div class="card-stats-item-count">{{ $data['total_pending'] }}</div>
                            <div class="card-stats-item-label">Pending</div>
                        </div>
                        <div class="card-stats-item">
                            <div class="card-stats-item-count">{{ $data['total_shipping'] }}</div>
                            <div class="card-stats-item-label">Dikirim</div>
                        </div>
                        <div class="card-stats-item">
                            <div class="card-stats-item-count">{{ $data['total_completed'] }}</div>
                            <div class="card-stats-item-label">Completed </div>
                        </div>
                    </div>
                </div>
                <div class="card-icon shadow-primary bg-primary">
                    <i class="fas fa-archive"></i>
                </div>
                <div class="card-wrap">
                    <div class="card-header">
                        <h4>Total Orders</h4>
                    </div>
                    <div class="card-body">
                        {{ $data['total_order'] }}
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card card-statistic-2">
                <div class="card-icon shadow-primary bg-primary">
                    <i class="fas fa-shopping-cart"></i>
                </div>
                <div class="card-wrap">
                    <div class="card-header">
                        <h4>{{ __('menu.product') }}</h4>
                    </div>
                    <div class="card-body">
                        {{ $data['total_product'] }}
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card card-statistic-2">
                <div class="card-icon shadow-primary bg-primary">
                    <i class="fas fa-users"></i>
                </div>
                <div class="card-wrap">
                    <div class="card-header">
                        <h4>User</h4>
                    </div>
                    <div class="card-body">
                        {{ $data['total_user'] }}
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
@push('js')
    {{ $data['chart']->script() }}
    {{ $data['chartPie']->script() }}
    <script>
        $("#products-carousel").owlCarousel({
            items: 3,
            margin: 10,
            autoplay: true,
            autoplayTimeout: 5000,
            responsive: {
                0: {
                    items: 2
                },
                768: {
                    items: 2
                },
                1200: {
                    items: 4
                }
            }
        });
    </script>
@endpush
