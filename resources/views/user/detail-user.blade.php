@extends('layouts.main', ['title' => 'SIKEU-GSC | Detail Relawan'])
@section('content')
    <div class="row">
        <div class="col-lg-6">
            <h4>Detail Relawan GSC</h3>
        </div>
        <div class="col-lg-6">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb breadcrumb-right">
                    <li class="breadcrumb-item active">
                        <a href="/daftar-user">Daftar Relawan</a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">
                        Detail
                    </li>
                </ol>
            </nav>
        </div>
    </div>

    <div class="row">
        <div class="card">
            <div class="row">
                <div class="col-lg-2">
                    <div class="card-body">
                        <img src="{{ asset('foto-relawan/'.$detail_user->photo.'') }}" class="rounded" alt=""
                            style="width: 150px; height:150px;">
                    </div>
                </div>
                <div class="col-lg-10 mt-10">
                    <h6>{{ $user->name }} <i class="bi bi-check-circle-fill" style="color:#24b07c;"></i></h6>
                        @if ($user->role_id == 1)
                            <p>Bendahara</p>
                        @elseif ($user->role_id == 2)
                            <p>Program</p>
                        @elseif ($user->role_id == 3)
                            <p>Relawan</p>
                        @endif
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="card">
            <div class="container-fluid">
                <h5 class="mt-4 mb-4">Detail Data Relawan</h5>
                <div class="row">
                    <div class="col-lg-2"><h6>Nama Lengkap</h6></div>
                    <div class="col-lg-4">{{ $user->name }}</div>
                </div>

                <div class="row">
                    <div class="col-lg-2"><h6>Email</h6>
                    </div><div class="col-lg-4">{{ $user->email }}</div>
                </div>

                <div class="row">
                    <div class="col-lg-2"><h6>Alamat</h6></div>
                    <div class="col-lg-4">{{ $detail_user->address }}</div>
                </div>

                <div class="row">
                    <div class="col-lg-2"><h6>No Whatsapp/Phone</h6></div>
                    <div class="col-lg-4">{{ $detail_user->phone }}</div>
                </div>

                <div class="row">
                    <div class="col-lg-2"><h6>Jenis Kelamin</h6></div>
                    <div class="col-lg-4">{{ $detail_user->gender }}</div>
                </div>

                <div class="row">
                    <div class="col-lg-2"><h6>Status</h6></div>
                    <div class="col-lg-4">
                        @if ($detail_user->status == 'aktif')
                            <p style="color: #24b07c;">Aktif</p>
                        @else
                            <p style="color: #FF0063;">Non Aktif</p>
                        @endif
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection

