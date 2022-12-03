@extends('layouts.main')
@section('content')
    <h3>Daftar Pengeluaran</h3>
    {{-- Breadcrumb --}}
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb breadcrumb-right">
            <li class="breadcrumb-item active">
                <a href="dashboard">Daftar Pengeluaran</a>
            </li>
            <li class="breadcrumb-item active" aria-current="page">
                Tambah
            </li>
        </ol>
    </nav>

    <div class="card">
        <div class="card-body">
            <h5 class="mb-4">Tambah Data Pengeluaran</h5>
            <form action="{{ route('insertpengeluaran') }}" method="POST" enctype="multipart/form-data">
                {{ csrf_field() }}

                <div class="col-lg-12">
                    <div class="row">
                        <div class="col-lg-6">
                            <label for="tgl">Tanggal</label>
                            <div class="position-relative" style="margin-bottom: 16px;">
                                <input type="date" name="date" id="tgl" value="{{ old('date') }}">
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
                                <label for="first-name-icon">Nama Pengaju</label>
                                <div class="position-relative @error('name_pengaju') has-error @enderror">
                                    <input type="text" name="name_pengaju" class="form-control"
                                        placeholder="Masukan Nama Pengaju" id="first-name-icon" value="{{ old('name_pengaju') }}">
                                    <div class="form-control-icon">
                                        <i class="bi bi-person"></i>
                                    </div>
                                    @error('name_pengaju')
                                        <div class="text-danger"> {{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="form-group has-icon-left">
                                <label for="email-id-icon">Nama Penerima</label>
                                <div class="position-relative">
                                    <input type="text" name="name_penerima" class="form-control"
                                        placeholder="Masukan Nama Penerima" id="email-id-icon" value="{{ old('name_penerima') }}">
                                    <div class="form-control-icon">
                                        <i class="bi bi-person"></i>
                                    </div>
                                    @error('name_penerima')
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
                                <label for="first-name-icon">Alamat</label>
                                <div class="position-relative @error('address') has-error @enderror">
                                    <input type="text" name="address" class="form-control"
                                        placeholder="Masukan Alamat Lengkap" id="first-name-icon" value="{{ old('address') }}">
                                    <div class="form-control-icon">
                                        <i class="bi bi-house"></i>
                                    </div>
                                    @error('address')
                                        <div class="text-danger"> {{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="form-group has-icon-left">
                                <label for="email-id-icon">Keterangan</label>
                                <div class="position-relative">
                                    <input type="text" name="keterangan" class="form-control"
                                        placeholder="Masukan Keterangan Penggunaan" id="email-id-icon" value="{{ old('keterangan') }}">
                                    <div class="form-control-icon">
                                        <i class="bi bi-archive"></i>
                                    </div>
                                    @error('keterangan')
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
                                <label for="terbilang">Nominal</label>
                                <div class="position-relative">
                                    <input type="number" name="nominal" class="form-control" id="nominal" onkeyup="fungsi_terbilang(this, 'lblterbilang')"
                                        value="{{ old('terbilang') }}">
                                    <div class="form-control-icon">
                                        <i class="">Rp.</i>
                                    </div>
                                    <h5 class="mt-2" style="text-transform: uppercase;" id="lblterbilang"></h5>
                                    @error('nominal')
                                        <div class="text-danger"> {{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>


                        <div class="col-lg-6">
                            <div class="form-group has-icon-left">
                                <label for="konfirmasi_password">Terbilang</label>
                                <div class="position-relative">
                                    <input oninput="let p=this.selectionStart;this.value=this.value.toUpperCase();this.setSelectionRange(p, p);" type="text" name="terbilang" class="form-control" placeholder="Nominal"
                                        id="lblterbilang" >
                                    <div class="form-control-icon">
                                        <i class="bi bi-cash"></i>
                                    </div>
                                    @error('terbilang')
                                        <div class="text-danger"> {{ $message }}</div>
                                    @enderror

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <a href="/daftar-pengeluaran">
                    <button type="button" class="btn btn-warning">Kembali</button>
                </a>
                &nbsp;
                <button type="submit" class="btn btn-success">Tambah Pemasukan</button>
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

