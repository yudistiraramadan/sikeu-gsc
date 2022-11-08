@extends('layouts.main')
@section('content')
    <h2>Dashboard Relawan</h2>
    {{-- Breadcrumb --}}
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb breadcrumb-right">
            <li class="breadcrumb-item active">
                <a href="dashboard">Dashboard</a>
            </li>
            <li class="breadcrumb-item active" aria-current="page">
                Relawan
              </li>
        </ol>
    </nav>

    {{-- Data Header --}}
    <div class="row">
        <div class="col-6 col-lg-3 col-md-6">
          <div class="card">
            <div class="card-body px-4 py-4-5">
              <div class="row">
                <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start">
                  <div class="stats-icon green mb-2">
                    <i class="iconly-boldProfile"></i>
                  </div>
                </div>
                <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                  <h6 class="text-muted font-semibold"><b>Total Relawan GSC</b></h6>
                  <h4 class="font-extrabold mb-0">{{ $total_data }} orang</h4>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="col-6 col-lg-3 col-md-6">
          <div class="card">
            <div class="card-body px-4 py-4-5">
              <div class="row">
                <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start">
                  <div class="stats-icon blue mb-2">
                    <i class="iconly-boldProfile"></i>
                  </div>
                </div>
                <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                  <h6 class="text-muted font-semibold"><b>Total Relawan Laki-laki</b></h6>
                  <h4 class="font-extrabold mb-0">{{ $pria }} orang</h4>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="col-6 col-lg-3 col-md-6">
          <div class="card">
            <div class="card-body px-4 py-4-5">
              <div class="row">
                <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start">
                  <div class="stats-icon red mb-2">
                    <i class="iconly-boldProfile"></i>
                  </div>
                </div>
                <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                  <h6 class="text-muted font-semibold"><b>Total Relawan Perempuan</b></h6>
                  <h4 class="font-extrabold mb-0">{{ $wanita }} orang</h4>
                </div>
              </div>
            </div>
          </div>
        </div>
        

      </div>
@endsection
