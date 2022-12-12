@extends('layouts.main')
@section('content')
<div class="row">
    <div class="col-lg-6">
        <h2>Dashboard Relawan</h2>
    </div>
    <div class="col-lg-6">
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
    </div>
</div>
    

    {{-- Data Header --}}
    <div class="row">
        <div class="col-6 col-lg-3 col-md-6">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start">
                            <i class="bi bi-people" style="color:#5ddab4; font-size:36pt;"></i>
                        </div>
                        <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                            <h6 style="font-weight: 500;" class="text-muted font-semibold"><b>Total Relawan GSC</b></h6>
                            <h4 class="font-extrabold mb-0">{{ $total_data }} orang</h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-6 col-lg-3 col-md-6">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start">
                            <i class="bi bi-person" style="color:#26a0fc; font-size:36pt;"></i>
                        </div>
                        <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                            <h6 style="font-weight: 500;" class="text-muted font-semibold"><b>Total Relawan Laki-laki</b>
                            </h6>
                            <h4 class="font-extrabold mb-0">{{ $pria }} orang</h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-6 col-lg-3 col-md-6">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start">
                            <i class="bi bi-person" style="color:#FF8DC7; font-size:36pt;"></i>
                        </div>
                        <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                            <h6 style="font-weight: 500;" class="text-muted font-semibold"><b>Total Relawan Perempuan</b>
                            </h6>
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
                            <h6 class="font-bold">{{ $data->name }}</h6>
                            <p class="text-muted mb-0">{{ $data->email }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Tabel Relawan Aktif --}}
    <div class="row">
        <div class="card">
            <div class="card-body">
                <p style="font-size:14pt; font-weight:600; color:#59ceab;">Relawan Aktif</p>
                <p>{{ $total_aktif }} Total Relawan Aktif</p>
                <div class="responsive">
                    <div class="table-responsive">
                        <table class="table table-hover table-bordered table-responsive" id="dt-aktif">
                            <thead>
                                <tr>
                                    <th style="width: 30%;">Nama Relawan</th>
                                    <th style="width: 30%;">Alamat</th>
                                    <th style="width: 15%; text-align: center;">Whatsapp/Hp</th>
                                    <th style="width: 10%; text-align: center;">Status</th>
                                    <th style="width: 15%;">Ditambahkan</th>
                                    {{-- <th>Foto</th> --}}
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($aktif as $user)
                                <tr>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->address }}</td>
                                        <td style="text-align: center;">{{ $user->phone }}</td>
                                        <td style="text-align: center; color:#24b07c; font-weight:500;">{{ $user->status }}</td>
                                        <td>{{ \Carbon\Carbon::parse($user->created_at)->isoFormat('D MMMM Y') }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Tabel Relawan Nonaktif --}}
    <div class="row">
        <div class="card">
            <div class="card-body">
                <p style="font-size:14pt; font-weight:600; color:#FF0063;">Relawan Nonaktif</p>
                <p>{{ $total_nonaktif }} Total Relawan Nonaktif</p>
                <div class="responsive">
                    <div class="table-responsive">
                        <table class="table table-hover table-bordered table-responsive" id="dt-aktif">
                            <thead>
                                <tr>
                                    <th style="width: 30%;">Nama Relawan</th>
                                    <th style="width: 30%;">Alamat</th>
                                    <th style="width: 15%; text-align: center;">Whatsapp/Hp</th>
                                    <th style="width: 10%; text-align: center;">Status</th>
                                    <th style="width: 15%;">Ditambahkan</th>
                                    {{-- <th>Foto</th> --}}
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($nonaktif as $user)
                                <tr>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->address }}</td>
                                        <td style="text-align: center;">{{ $user->phone }}</td>
                                        <td style="text-align: center; color:#FF0063;; font-weight:500;">{{ $user->status }}</td>
                                        <td>{{ \Carbon\Carbon::parse($user->created_at)->isoFormat('D MMMM Y') }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Statistik Relawan --}}
    {{-- <div class="row">
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
        </div> --}}


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

    {{-- <script>
    $(document).ready(function() {
        $('#dt-aktif').DataTable({
            "processing": true,
            "serverSide": true,
            // "lengthChange": false,
            "bDestroy": true,
            "searching": true,
            "paginate": {
                "first": "First",
                "last": "Last",
                "next": "Next",
                "previous": "Previous"
            },
            "ajax": {
                "url": "{{ route('user') }}",
                "type": "GET",
                "datatype": "json"
            },

            "render": $.fn.dataTable.render.text(),
            "columns": [{
                    data: 'name',
                    searchable: true,
                    orderable: false
                },
                {
                    data: 'address',
                    searchable: true,
                    orderable: false
                },
                {
                    data: 'phone',
                    searchable: true,
                    orderable: false
                },
                {
                    data: 'status',
                    searchable: true,
                    orderable: false
                },
                // {
                //     "data": function(data) {
                //         if (data.status == 'aktif') {
                //             return '<span class="badge bg-light-success">Aktif</span>';
                //         } else {
                //             return '<span class="badge bg-light-danger">Nonaktif</span>';
                //         }
                //     }
                // },
                {
                    data: 'time',
                    searchable: true,
                    orderable: true
                },
            ],
            order: [
                [4, 'desc']
            ],
            responsive: true,
            language: {
                search: "Cari Data :",
                searchPlaceholder: "",
                emptyTable: "Tidak ada data pada tabel ini",
                info: "Menampilkan _START_ s/d _END_ dari _TOTAL_ data",
                infoFiltered: "(difilter dari _MAX_ total data)",
                infoEmpty: "Tidak ada data pada tabel ini",
                lengthMenu: "Menampilkan _MENU_ data",
                zeroRecords: "Tidak ada data pada tabel ini"
            },
            columnDefs: [{
                className: 'text-center',
                targets: [2, 3]
            }, {
                //     width: '25%',
                //     targets: [0, 1]
                // }, {
                //     width: '20%',
                //     targets: [2, 3]
            }],
        });
    });
</script> --}}
@endpush
