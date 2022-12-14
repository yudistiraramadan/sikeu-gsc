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
                                @error('date')
                                    <div class="text-danger"> {{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-12">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group has-icon-left">
                                <label for="first-name-icon">Terima Dari</label>
                                <div class="position-relative @error('name_pengaju') has-error @enderror">
                                    <input oninput="let p=this.selectionStart;this.value=this.value.toUpperCase();this.setSelectionRange(p, p);" type="text" name="name" class="form-control"
                                        placeholder="Masukan Nama Lengkap" id="first-name-icon" value="{{ $data->name }}">
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
                                    <input oninput="let p=this.selectionStart;this.value=this.value.toUpperCase();this.setSelectionRange(p, p);" type="text" name="keperluan" class="form-control"
                                        placeholder="Untuk Keperluan" id="email-id-icon" value="{{ $data->keperluan }}">
                                    <div class="form-control-icon">
                                        <i class="bi bi-archive"></i>
                                    </div>
                                    @error('keperluan')
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
                                <label for="terbilang">Terbilang</label>
                                <div class="position-relative">
                                    <input type="number" name="terbilang" class="form-control" id="terbilang" onkeyup="fungsi_terbilang(this, 'lblterbilang')" value="{{ $data->terbilang }}">
                                    <div class="form-control-icon">
                                        <i class="">Rp.</i>
                                    </div>
                                    <h5 class="mt-2" style="text-transform: uppercase;" id="lblterbilang"></h5>
                                    @error('terbilang')
                                        <div class="text-danger"> {{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="form-group has-icon-left">
                                <label for="konfirmasi_password">Nominal</label>
                                <div class="position-relative">
                                    <input oninput="let p=this.selectionStart;this.value=this.value.toUpperCase();this.setSelectionRange(p, p);" type="text" name="nominal" class="form-control" placeholder="Nominal"
                                        id="konfirmasi_password" value="{{ $data->nominal }}">
                                    <div class="form-control-icon">
                                        <i class="bi bi-cash"></i>
                                    </div>
                                    @error('nominal')
                                        <div class="text-danger"> {{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <a href="/daftar-pemasukan">
                    <button type="button" class="btn btn-warning">Kembali</button>
                </a>
                &nbsp;
                <button type="submit" class="btn btn-success">Edit Pemasukan</button>
            </form>



        </div>
    </div>
    </div>
@endsection
<script>
    function kekata(n){
        var ang = new Array("","satu","dua","tiga","empat","lima","enam","tujuh","delapan","sembilan","sepuluh","sebelas");
        var tbr;

        if(n<12){tbr = " " + ang[n];}else
        if(n<20){tbr = kekata(n-10) + " belas";}else
        if(n<100){tbr = kekata(Math.floor(n/10)) + " puluh" + kekata(n%10);}else
        if(n<200){tbr = " seratus" + kekata(n-100);}else
        if(n<1000){tbr = kekata(Math.floor(n/100)) + " ratus" + kekata(n%100);}else
        if(n<2000){tbr = " seribu" + kekata(n-1000);}else
        if(n<1000000){tbr = kekata(Math.floor(n/1000)) + " ribu rupiah" + kekata(n%1000);}else
        if(n<1000000000){tbr = kekata(Math.floor(n/1000000)) + " juta rupiah" + kekata(n%1000000);}else
        if(n<1000000000000){tbr = kekata(Math.floor(n/1000000000)) + " milyar rupiah" + kekata(n%1000000000);}else
        if(n<1000000000000000){tbr = kekata(Math.floor(n/1000000000000)) + " triliyun rupiah" + kekata(n%1000000000000);}

        return tbr;
    }

    function fungsi_terbilang(a,b){
        document.getElementById(b).innerHTML = kekata(a.value);
    }
</script>



