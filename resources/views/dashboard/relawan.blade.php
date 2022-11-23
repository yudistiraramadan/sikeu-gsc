@extends('layouts.main')
@section('content')
    <h2>Dashboard Relawan</h2>
    {{-- Breadcrumb --}}
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb breadcrumb-right">
            <li class="breadcrumb-item active">
                <a href="dashboard">Dashboard</a>
            </li>
            <li class="breadcrumb-item active" aria-current="page">
                Relawan
            </li>
        </ol>
    </nav>

    {{-- Data Header --}}
    <div class="row">
        <div class="col-6 col-lg-3 col-md-6">
            <div class="card">
                <div class="card-body px-4 py-4-5">
                    <div class="row">
                        <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start">
                            <div class="stats-icon green mb-2">
                                <i class="iconly-boldProfile"></i>
                            </div>
                        </div>
                        <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                            <h6 class="text-muted font-semibold"><b>Total Relawan GSC</b></h6>
                            <h4 class="font-extrabold mb-0">{{ $total_data }} orang</h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-6 col-lg-3 col-md-6">
            <div class="card">
                <div class="card-body px-4 py-4-5">
                    <div class="row">
                        <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start">
                            <div class="stats-icon blue mb-2">
                                <i class="iconly-boldProfile"></i>

                            </div>
                        </div>
                        <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                            <h6 class="text-muted font-semibold"><b>Total Relawan Laki-laki</b></h6>
                            <h4 class="font-extrabold mb-0">{{ $pria }} orang</h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-6 col-lg-3 col-md-6">
            <div class="card">
                <div class="card-body px-4 py-4-5">
                    <div class="row">
                        <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start">
                            <div class="stats-icon red mb-2">
                                <i class="iconly-boldProfile"></i>
                            </div>
                        </div>
                        <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                            <h6 class="text-muted font-semibold"><b>Total Relawan Perempuan</b></h6>
                            <h4 class="font-extrabold mb-0">{{ $wanita }} orang</h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-6 col-lg-3 col-md-6">
            <div class="card">
                <div class="card-body px-4 py-4-5">
                    <div class="d-flex align-items-center">
                        <div class="avatar avatar-xl">
                            <img src="foto-relawan/gsc.png" alt="Face 1">
                        </div>
                        <div class="ms-3 name">
                            <h5 class="font-bold">{{ $data->name }}</h5>
                            <h6 class="text-muted mb-0">{{ $data->email }}</h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Statistik Relawan --}}
    <div class="row">
        <div class="col-lg-8">
            <div class="card">
                <div class="card-header">
                    <h4>Statistik Relawan</h4>
                </div>
                <div class="card-body">
                    <div id="chart"></div>
                </div>
            </div>
        </div>

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
