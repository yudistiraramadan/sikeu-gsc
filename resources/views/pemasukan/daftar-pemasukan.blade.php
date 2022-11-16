@extends('layouts.main')
@section('content')
    <div class="row">
        <div class="col-lg-6">
            <h2>Daftar Pemasukan GSC</h3>
        </div>
        <div class="col-lg-6">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb breadcrumb-right">
                    <li class="breadcrumb-item active">
                        <a href="#">Daftar Relawan/</a>
                    </li>
                </ol>
            </nav>
        </div>
    </div>

    <div class="row">
        <div class="card">
            <div class="card-body">
                <a href="{{ route('tambahpemasukan') }}">
                    <button type="button" class="btn btn-success tambah mb-4">Tambah Pemasukan</button>
                </a>
                &nbsp;
                <a href="{{ route('export_excel_pemasukan') }}">
                    <button type="button" class="btn btn-primary mb-4">Export Excel
                    </button>
                </a>
                &nbsp;
                <a href="#">
                    <button type="button" class="btn btn-danger mb-4">Export PDF
                        <i class="bi bi-printer-fill"></i>
                    </button>
                </a>
                <div class="responsive">
                    <div class="table-responsive">
                        <table class="table table-hover table-bordered table-responsive" id="dt-pemasukan">
                            <thead>
                                <tr>
                                    <th>Terima Dari</th>
                                    <th>Uang Sebanyak</th>
                                    <th>Guna Pembayaran</th>
                                    <th>Tanggal</th>
                                    <th>Terbilang</th>
                                    {{-- <th>Foto</th> --}}
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('sweetalert::alert')
@endsection
@push('scripts')
    <script>
        $(document).ready(function() {
            var table = $('#dt-pemasukan').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('pemasukan') }}",
                columns: [{
                        data: 'name',
                    },
                    {
                        data: 'nominal',
                    },
                    {
                        data: 'keperluan',
                    },
                    {
                        data: 'time',
                    },
                    {
                        data: 'number_format',
                    },

                    {
                        data: 'action',
                    }
                ],
                order: [
                    [3, 'desc']
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
                        // className: 'text-left',
                        // targets: [0]
                    },
                    {
                        className: 'text-center',
                        targets: [5]
                    }
                ]
            });
        });
    </script>
@endpush
