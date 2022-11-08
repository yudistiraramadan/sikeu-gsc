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
                <a href="#">
                    <button type="button" class="btn btn-success tambah mb-4">Tambah User</button>
                </a>

                <div class="responsive">
                    <div class="table-responsive">
                        <table class="table table-hover table-bordered table-responsive" id="dt-user">
                            <thead>
                                <tr>
                                    <th>Nama Relawan</th>
                                    <th>Alamat</th>
                                    <th>Whatsapp/Hp</th>
                                    <th>Status</th>
                                    <th>Ditambahkan</th>
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
@endsection
@push('scripts')
    <script>
        $(document).ready(function() {
            var table = $('#dt-user').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('index') }}",
                columns: [{
                        data: 'name',
                        // name: 'users.name'
                        searcable: true
                    },
                    {
                        data: 'address',
                        // data: 'detail_user.address'
                        searcable: true
                    },
                    {
                        data: 'phone',
                        // data: 'detail_user.phone'
                        searcable: true
                    },
                    {
                        "data": function(data) {
                            if (data.status == 'aktif') {
                                return `<span class="badge bg-light-success align-content-center">Aktif</span>`;
                            } else {
                                return `<span class="badge bg-light-danger align-content-center">Nonaktif</span>`;
                            }
                        }
                    },
                    {
                        data: 'created_at',
                        // data: 'users.address'
                        searcable: true
                    },
                    {
                        data: 'action',
                        // data: 'action'
                        searcable: true
                    }
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
            });
        });
        
    </script>
@endpush
