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
                                        placeholder="Masukan Nama Lengkap" id="first-name-icon" value="{{ old('name') }}">
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
                                        id="email-id-icon" value="{{ old('email') }}">
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
                                        placeholder="Masukan Password" id="password" value="{{ old('password') }}">
                                    <div class="form-control-icon">
                                        <i class="bi bi-shield-lock"></i>
                                    </div>
                                    @error('password')
                                        <div class="text-danger"> {{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="form-group has-icon-left">
                                <label for="password_confirmation">Alamat</label>
                                <div class="position-relative">
                                    <input type="text" name="address" class="form-control"
                                        placeholder="Masukan Alamat Lengkap" id="password_confirmation" value="{{ old('address') }}">
                                    <div class="form-control-icon">
                                        <i class="bi bi-house"></i>
                                    </div>
                                    @error('address')
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
                                <label class="mt-2" for="mobile-id-icon">No Hp/Whatsapp</label>
                                <div class="position-relative">
                                    <input type="text" name="phone" class="form-control" placeholder="No Hp"
                                        id="mobile-id-icon" value="{{ old('phone') }}">
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
                                <input class="form-control" type="file" name="photo" id="formFile" value="{{ old('photo') }}">
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
                                        value="1" value="{{ old('role_id') }}">
                                    <label class="form-check-label" for="bendahara">
                                        Bendahara
                                    </label>
                                </div>
                            </div>
                            <div class="col-6 pull-right">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="role_id" id="pengamat"
                                        value="2" value="{{ old('role_id') }}">
                                    <label class="form-check-label" for="pengamat">
                                        Pengamat
                                    </label>
                                </div>
                            </div>
                            <div class="col-6 pull-right">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="role_id" id="relawan"
                                        value="3" value="{{ old('role_id') }}">
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
                                        value="laki-laki" value="{{ old('gender') }}">
                                    <label class="form-check-label" for="laki-laki">
                                        Laki-laki
                                    </label>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="gender" id="perempuan"
                                        value="perempuan" value="{{ old('gender') }}">
                                    <label class="form-check-label" for="perempuan" >
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
                                        value="aktif" value="{{ old('status') }}">
                                    <label class="form-check-label" for="aktif">
                                        Aktif
                                    </label>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="status" id="nonaktif"
                                        value="nonaktif" value="{{ old('status') }}">
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
