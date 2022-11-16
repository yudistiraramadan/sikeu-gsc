@extends('layouts.main')
@section('content')
    <h3>Daftar Relawan</h3>
    {{-- Breadcrumb --}}
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb breadcrumb-right">
            <li class="breadcrumb-item active">
                <a href="dashboard">Daftar User</a>
            </li>
            <li class="breadcrumb-item active" aria-current="page">
                Tambah
            </li>
        </ol>
    </nav>

    <div class="card">
        <div class="card-body">
            <h5 class="mb-4">Tambah Data Relawan</h5>
            <form action="{{ route('insertuser') }}" method="POST" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="col-lg-12">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group has-icon-left">
                                <label for="first-name-icon">Nama Lengkap</label>
                                <div class="position-relative">
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
                                <label for="email-id-icon">Email</label>
                                <div class="position-relative">
                                    <input type="text" name="email" class="form-control" placeholder="Masukan Email"
                                        id="email-id-icon">
                                    <div class="form-control-icon">
                                        <i class="bi bi-envelope"></i>
                                    </div>
                                    @error('email')
                                        <div class="text-danger"> {{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="col-lg-12">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group has-icon-left">
                                <label for="password">Password</label>
                                <div class="position-relative">
                                    <input type="password" name="password" class="form-control"
                                        placeholder="Masukan Password" id="password">
                                    <div class="form-control-icon">
                                        <i class="bi bi-lock"></i>
                                    </div>
                                    @error('password')
                                        <div class="text-danger"> {{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="form-group has-icon-left">
                                <label for="password_confirmation">Konfirmasi Password</label>
                                <div class="position-relative">
                                    <input type="password" name="password" class="form-control"
                                        placeholder="Ulangi Password" id="password_confirmation">
                                    <div class="form-control-icon">
                                        <i class="bi bi-lock-fill"></i>
                                    </div>
                                    {{-- @error('password_confirmation')
                                        <div class="text-danger"> {{ $message }}</div>
                                    @enderror --}}
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

                <div class="col-lg-12">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group has-icon-left">
                                <label class="mt-2" for="mobile-id-icon">No Hp/Whatsapp</label>
                                <div class="position-relative">
                                    <input type="text" name="phone" class="form-control" placeholder="No Hp"
                                        id="mobile-id-icon">
                                    <div class="form-control-icon">
                                        <i class="bi bi-phone"></i>
                                    </div>
                                    @error('phone')
                                        <div class="text-danger"> {{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label for="formFile" class="form-label">Foto Profil <b>*jika ada</b></label>
                                <input class="form-control" type="file" name="photo" id="formFile">
                            </div>
                        </div>
                    </div>
                </div>



                <div class="row">
                    <div class="col-lg-2 col-md-12 col-sm-12 col-xs-12">
                        <div class="mb-3">
                            <label for="" class="form-label">Tipe Relawan :</label>
                            <div class="col-6">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="role_id" id="bendahara"
                                        value="1">
                                    <label class="form-check-label" for="bendahara">
                                        Bendahara
                                    </label>
                                </div>
                            </div>
                            <div class="col-6 pull-right">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="role_id" id="pengamat"
                                        value="2">
                                    <label class="form-check-label" for="pengamat">
                                        Pengamat
                                    </label>
                                </div>
                            </div>
                            <div class="col-6 pull-right">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="role_id" id="relawan"
                                        value="3">
                                    <label class="form-check-label" for="relawan">
                                        Relawan
                                    </label>
                                </div>
                            </div>
                            @error('role_id')
                                <div class="text-danger"> {{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="col-lg-2 col-md-12 col-sm-12 col-xs-12">
                        <div class="mb-3">
                            <label for="" class="form-label">Jenis Kelamin :</label>
                            <div class="col-12">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="gender" id="laki-laki"
                                        value="laki-laki">
                                    <label class="form-check-label" for="laki-laki">
                                        Laki-laki
                                    </label>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="gender" id="perempuan"
                                        value="perempuan">
                                    <label class="form-check-label" for="perempuan">
                                        Perempuan
                                    </label>
                                </div>
                            </div>
                            @error('gender')
                                <div class="text-danger"> {{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="col-lg-2 col-md-12 col-sm-12 col-xs-12">
                        <div class="mb-3">
                            <label for="" class="form-label">Status :</label>
                            <div class="col-12">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="status" id="aktif"
                                        value="aktif">
                                    <label class="form-check-label" for="aktif">
                                        Aktif
                                    </label>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="status" id="nonaktif"
                                        value="nonaktif">
                                    <label class="form-check-label" for="nonaktif">
                                        Nonaktif
                                    </label>
                                </div>
                            </div>
                            @error('status')
                                <div class="text-danger"> {{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>


                <div class="form-group mb-3">
                    <label for="exampleFormControlTextarea1" class="form-label">Alamat Lengkap</label>
                    <textarea class="form-control" name="address" id="exampleFormControlTextarea1" rows="3"></textarea>
                    @error('address')
                        <div class="text-danger"> {{ $message }}</div>
                    @enderror
                </div>

                <a href="/daftar-user">
                    <button type="button" class="btn btn-warning">Kembali</button>
                </a>
                &nbsp;
                <button type="submit" class="btn btn-success">Tambah User</button>
            </form>



        </div>
    </div>
    </div>
@endsection
