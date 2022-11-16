@extends('layouts.main')
@section('content')
    <h3>Daftar Pemasukan</h3>
    {{-- Breadcrumb --}}
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb breadcrumb-right">
            <li class="breadcrumb-item active">
                <a href="dashboard">Daftar Pemasukan</a>
            </li>
            <li class="breadcrumb-item active" aria-current="page">
                Tambah
            </li>
        </ol>
    </nav>

    <div class="card">
        <div class="card-body">
            <h5 class="mb-4">Tambah Data Pemasukan</h5>
            <form action="{{ route('insertpemasukan') }}" method="POST" enctype="multipart/form-data">
                {{ csrf_field() }}

                <div class="col-lg-12">
                    <div class="row">
                        <div class="col-lg-6">
                            <label for="tgl">Tanggal</label>
                            <div class="position-relative" style="margin-bottom: 16px;">
                                <input type="date" name="date" id="tgl">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-12">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group has-icon-left">
                                <label for="first-name-icon">Terima Dari</label>
                                <div class="position-relative @error('name') has-error @enderror">
                                    <input type="text" name="name" class="form-control"
                                        placeholder="Masukan Nama Lengkap" id="first-name-icon">
                                    <div class="form-control-icon">
                                        <i class="bi bi-person"></i>
                                    </div>
                                    @error('name')
                                        <div class="text-danger"> {{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="form-group has-icon-left">
                                <label for="email-id-icon">Keperluan</label>
                                <div class="position-relative">
                                    <input type="text" name="keperluan" class="form-control"
                                        placeholder="Untuk Keperluan" id="email-id-icon">
                                    <div class="form-control-icon">
                                        <i class="bi bi-archive"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="col-lg-12">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group has-icon-left">
                                <label for="terbilang">Terbilang</label>
                                <div class="position-relative">
                                    <input type="text" name="terbilang" class="form-control" id="terbilang">
                                    <div class="form-control-icon">
                                        <i class="">Rp.</i>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="form-group has-icon-left">
                                <label for="konfirmasi_password">Nominal</label>
                                <div class="position-relative">
                                    <input type="text" name="nominal" class="form-control" placeholder="Nominal"
                                        id="konfirmasi_password">
                                    <div class="form-control-icon">
                                        <i class="bi bi-cash"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <a href="/daftar-pemasukan">
                    <button type="button" class="btn btn-warning">Kembali</button>
                </a>
                &nbsp;
                <button type="submit" class="btn btn-success">Tambah Pemasukan</button>
            </form>



        </div>
    </div>
    </div>
@endsection
{{-- <script src="https://code.jquery.com/jquery-3.6.1.min.js"></script> --}}
{{-- <script src="jquery.masknumber.js"></script> --}}
