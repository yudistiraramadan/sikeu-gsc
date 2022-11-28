@extends('layouts.main')
@section('content')
    <div class="row">
        <div class="col-lg-6">
            <h2>Daftar Relawan GSC</h3>
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
                <h5 class="mb-8">Tabel Relawan</h5>
                <a href="{{ route('tambahuser') }}">
                    <button type="button" class="btn btn-success tambah mb-4">Tambah User</button>
                </a>
                &nbsp;
                <a href="{{ route('export_excel_user') }}">
                    <button type="button" class="btn btn-primary mb-4">Export Excel</button>
                </a>
                &nbsp;
                <a href="{{ route('export_pdf_user') }}">
                    <button type="button" class="btn btn-danger mb-4">Export PDF
                        <i class="bi bi-printer-fill"></i>
                    </button>
                </a>
                &nbsp;
                <div class="responsive">
                    <div class="table-responsive">
                        <table class="table table-hover table-bordered table-responsive" id="dt-user">
                            <thead>
                                <tr>
                                    <th>Nama Relawan</th>
                                    <th>Alamat</th>
                                    <th>Whatsapp/Hp</th>
                                    <th style="text-align: center;">Status</th>
                                    <th>Ditambahkan</th>
                                    {{-- <th>Foto</th> --}}
                                    <th style="text-align: center;">Aksi</th>
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
            $('#dt-user').DataTable({
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
                        "data": function(data) {
                            if (data.status == 'aktif') {
                                return '<span class="badge bg-light-success">Aktif</span>';
                            } else {
                                return '<span class="badge bg-light-danger">Nonaktif</span>';
                            }
                        }
                    },
                    {
                        data: 'time',
                        searchable: true,
                        orderable: true
                    },
                    {
                        data: 'action',
                        searchable: false,
                        orderable: false
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
    </script>
    {{-- <script>
        @if (Session::has('success'))
        {
            toastr.success("{{ Session::get('success') }}")
        }
        @endif
    </script> --}}
@endpush
