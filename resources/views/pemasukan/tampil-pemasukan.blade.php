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
            <h5 class="mb-4">Edit Data Pemasukan</h5>
            <form action="/edit-pemasukan/{{ $data->id }}" method="POST" enctype="multipart/form-data">
                {{ csrf_field() }}

                <div class="col-lg-12">
                    <div class="row">
                        <div class="col-lg-6">
                            <label for="tgl">Tanggal</label>
                            <div class="position-relative" style="margin-bottom: 16px;">
                                <input type="date" name="date" id="tgl" value="{{ $data->date }}">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-12">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group has-icon-left">
                                <label for="first-name-icon">Terima Dari</label>
                                <div class="position-relative">
                                    <input type="text" name="name" class="form-control"
                                        placeholder="Masukan Nama Lengkap" id="first-name-icon" value="{{ $data->name }}">
                                    <div class="form-control-icon">
                                        <i class="bi bi-person"></i>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="form-group has-icon-left">
                                <label for="email-id-icon">Keperluan</label>
                                <div class="position-relative">
                                    <input type="text" name="keperluan" class="form-control"
                                        placeholder="Untuk Keperluan" id="email-id-icon" value="{{ $data->keperluan }}">
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
                                    <input type="text" name="terbilang" class="form-control" id="terbilang" value="{{ $data->terbilang }}">
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
                                        id="konfirmasi_password" value="{{ $data->nominal }}">
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

