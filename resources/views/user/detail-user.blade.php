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
                        <img src="{{ asset('foto-relawan/yudis.JPG') }}" class="rounded" alt=""
                            style="width: 150px; height:150px;">
                    </div>
                </div>
                <div class="col-lg-10 mt-10">
                    <h6>{{ $user->name }} <i class="bi bi-check-circle-fill" style="color:#24b07c;"></i></h6>
                    <p>{{ $role->role_name }}</p>

                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="card">
            <div class="container-fluid">
                <h5 class="mt-4">Detail Data Relawan</h5>
                <p >Nama Lengkap : {{ $user->name }}</p>
            </div>
        </div>
    </div>
@endsection
