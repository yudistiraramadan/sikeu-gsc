@extends('layouts.main')
@section('content')
    <div class="row">
        <div class="col-lg-6">
            <h2>Daftar Pengeluaran GSC</h3>
        </div>
        <div class="col-lg-6">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb breadcrumb-right">
                    <li class="breadcrumb-item active">
                        <a href="#">Daftar Pengeluaran/</a>
                    </li>
                </ol>
            </nav>
        </div>
    </div>

    <div class="row">
        <div class="card">
            <div class="card-body">
                <h5 class="mb-6">Tabel Pengeluaran</h6>
                <a href="/tambah-pengeluaran">
                    <button type="button" class="btn btn-success tambah mb-4">Tambah Pengeluaran</button>
                </a>
                &nbsp;
                <a href="#">
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
                        <table class="table table-hover table-bordered table-responsive" id="dt-pengeluaran">
                            <thead>
                                <tr>
                                    <th>Dibayarkan Kepada</th>
                                    <th>Diterima Oleh</th>
                                    {{-- <th>Alamat</th> --}}
                                    <th>Uang Sebanyak</th>
                                    <th>Keterangan</th>
                                    <th>Tanggal</th>
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
        $(document).on('click', '.delete-pengeluaran', function() {
            id = $(this).data('id');
            Swal.fire({
                title: 'Hapus data pengeluaran?',
                text: "Apakah anda yakin akan menghapus data pengeluaran!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        async: true,
                        type: 'POST',
                        url: '/delete-pengeluaran/destroy',
                        data: {
                            id: id
                        },
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        beforeSend: function() {
                            $('#ok_button').text('Hapus Data');
                        },
                        success: function(data) {
                            setTimeout(function() {
                                $('#confirmModal').modal('hide');
                                $('#dt-pengeluaran').DataTable().ajax.reload(null, false);
                            });

                            window.setTimeout(function() {}, 1000);
                            Swal.fire(
                                    'Deleted!',
                                    'Pengeluaran berhasil dihapus.',
                                    'success'
                                )
                        }
                    })
                }
            });
        });
    </script>


    <script>
        $(document).ready(function() {
            var table = $('#dt-pengeluaran').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('pengeluaran') }}",
                columns: [{
                        data: 'name_pengaju',
                    },
                    {
                        data: 'name_penerima',
                    },
                    {
                        data: 'number_format',
                    },
                    {
                        data: 'keterangan',
                    },
                    {
                        data: 'time',
                    },

                    {
                        data: 'action',
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
