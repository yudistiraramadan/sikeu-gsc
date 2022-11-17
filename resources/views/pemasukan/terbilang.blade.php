@extends('layouts.main')
@section('content')
<input type="number" name="q" onkeyup="terbilang(this, 'lblterbilang')">
<span id="lblterbilang"></span>


@endsection
@push('scripts')
<script>
    function kekata(n){
        var ang = new Array("","satu","dua","tiga","empat","lima","enam","tujuh","delapan","sembilan","sepuluh","sebelas");
        var tbr;

        if(n<12){tbr = " " + ang[n];}else
        if(n<20){tbr = kekata(n-10) + " belas";}else
        if(n<100){tbr = kekata(Math.floor(n/10)) + " puluh" + kekata(n%10);}else
        if(n<200){tbr = " seratus" + kekata(n-100);}else
        if(n<1000){tbr = kekata(Math.floor(n/1000)) + " ratus" + kekata(n%100);}else
        if(n<2000){tbr = " seribu" + kekata(n-1000);}else
        if(n<1000000){tbr = kekata(Math.floor(n/1000)) + " ribu" + kekata(n%1000);}else
        if(n<1000000000){tbr = kekata(Math.floor(n/1000000)) + " juta" + kekata(n%1000000);}else
        if(n<1000000000000){tbr = kekata(Math.floor(n/1000000000)) + " milyar" + kekata(n%1000000000);}else
        if(n<1000000000000000){tbr = kekata(Math.floor(n/1000000000000)) + " triliyun" + kekata(n%1000000000000);}

        return tbr;
    }

    function terbilang(a,b){
        document.getElementById(b).innerHTML = kekata(a.value);
    }
</script>
@endpush