@extends('layouts.main', ['title' => 'Dashboard Pemasukan'])
@section('content')
    <div class="row">
        <div class="col-lg-6">
            <h2>Dashboard Pemasukan</h2>
        </div>
        <div class="col-lg-6">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb breadcrumb-right">
                    <li class="breadcrumb-item active">
                        <a href="dashboard">Dashboard</a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">
                        Pemasukan
                    </li>
                </ol>
            </nav>
        </div>
    </div>


    {{-- Data Header --}}
    <div class="row">
        <div class="col-12 col-lg-6 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-2 col-md-2 col-sm-2 d-flex justify-content-start">
                            <i class="bi bi-graph-up-arrow" style="color:#5ddab4; font-size:36pt;"></i>
                        </div>
                        <div class="col-lg-10 col-md-10 col-sm-10 col-xl-12 col-xxl-7">
                            <h6 style="font-weight: 500;" class="text-muted font-semibold"><b>Total Seluruh Pemasukan
                                    GSC</b></h6>
                            <h4 class="font-extrabold mb-0">Rp.
                                @php
                                    echo number_format($total_pemasukan);
                                @endphp
                            </h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-12 col-lg-6 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-2 col-md-2 col-sm-2 d-flex justify-content-start">
                            <i class="bi bi-graph-up" style="color:#26a0fc; font-size:36pt;"></i>
                        </div>
                        <div class="col-lg-10 col-md-10 col-sm-10 col-xl-12 col-xxl-7">
                            <h6 style="font-weight: 500;" class="text-muted font-semibold"><b>Total Pemasukan Tahun
                                    @php
                                        echo date('Y');
                                    @endphp</b>
                            </h6>
                            <h4 class="font-extrabold mb-0">Rp.
                                @php
                                    echo number_format($total_pemasukan);
                                @endphp
                            </h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-6">
            <div class="card">
                <div class="card-header">
                    <h4>Statistik Total Pemasukan GSC</h4>
                </div>
                <div class="card-body">
                    <div id="chart"></div>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="card">
                <div class="card-header">
                    <h4>Statistik Total Pemasukan GSC</h4>
                </div>
                <div class="card-body">
                    <div id="donat"></div>
                </div>
            </div>
        </div>
        
    </div>
    <div class="row">
        <div class="col-lg-4">
            <div class="card">
                <div class="card-header">
                    <h4>Status Relawan</h4>
                </div>
                <div class="card-body">
                    <div class="" id="donat"></div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
    <script>
        var options = {
            chart: {
                type: 'bar'
            },
            series: [{
                name: 'sales',
                data: [30, 40, 45, 50, 49, 60, 70, 91, 125]
            }],
            xaxis: {
                categories: [1991, 1992, 1993, 1994, 1995, 1996, 1997, 1998, 1999]
            }
        }

        var chart = new ApexCharts(document.querySelector("#chart"), options);

        chart.render();
    </script>

    <script>
        var options = {
            series: [60, 40],
            chart: {
                type: 'pie',
                width: 380,
            },
            labels: ['Aktif', 'Nonaktif'],
            responsive: [{
                breakpoint: 480,
                options: {
                    chart: {
                        width: 400
                    },
                    legend: {
                        position: 'bottom'
                    }
                }
            }]
        };

        var chart = new ApexCharts(document.querySelector("#donat"), options);
        chart.render();
    </script>
@endpush
