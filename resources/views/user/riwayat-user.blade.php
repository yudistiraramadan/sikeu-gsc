@extends('layouts.main')
@section('content')
    <div class="row">
        <div class="card">
            <div class="card-body">
                <h5 class="mb-8">Riwayat Aktifitas User</h5>
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
                        <table class="table table-hover table-bordered table-responsive" id="dt-activities">
                            <thead>
                                <tr>
                                    <th>Role</th>
                                    <th>Nama</th>
                                    <th>Informasi</th>
                                    <th>Status</th>
                                    <th>Tanggal</th>
                                </tr>
                            </thead>
                            <tbody></tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
    <script>
        $(document).ready(function() {
            $('#dt-activities').DataTable({
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
                    "url": "{{ route('activities') }}",
                    "type": "GET",
                    "datatype": "json"
                },
                "render": $.fn.dataTable.render.text(),
                "columns": [{
                        data: 'role',
                        searchable: true,
                        orderable: false
                    },
                    {
                        data: 'user_name',
                        searchable: true,
                        orderable: false
                    },
                    {
                        data: 'information',
                        searchable: true,
                        orderable: false
                    },
                    {
                        data: 'status_action',
                        searchable: true,
                        orderable: false
                    },
                    {
                        data: 'date_activity',
                        searchable: true,
                        orderable: false
                    }
                ],
                order: [],
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
                    className: 'text-left',
                    targets: [1, 2, 3, 4]
                }],
                // dom: "<'row mb-3'<'col-sm-12 col-md-8 pull-right'f><'toolbar col-sm-12 col-md-4 float-left'B>>" +
                //     "<'row'<'col-sm-12'tr>>" +
                //     "<'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7'p>>",
                // initComplete: function() {
                //     $('div.toolbar').html('<b>Riwayat Aktifitas</b>').appendTo('.float-left');
                // }
            });
        })
    </script>
@endpush
