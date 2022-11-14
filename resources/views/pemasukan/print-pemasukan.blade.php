<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Pemasukan</title>
</head>

<body>
    <table border="0" align="center" width="90%">
        <tr>
            <td width="60px"><img src="{{ public_path('assets/images/gsc/gsc.png') }}" width="50px" /></td>
            <td width="100px">Gerak Sedekah Cilacap</td>
            <td width="20"></td>
            <td style="text-align: center; font-size: 22px">PEMASUKAN</td>
            <td>KWITANSI No. {{ $data->id }}</td>
        </tr>

        <tr>
            <td colspan="5">
                <hr />
            </td>
        </tr>
        <tr>
            <td colspan="2" height="30px">TERIMA DARI</td>
            <td style="text-align: center">:</td>
            <td colspan="2">{{ $data->name }}</td>
        </tr>
        <tr>
            <td colspan="2" height="30px">UANG SEBANYAK</td>
            <td style="text-align: center">:</td>
            <td colspan="2">{{ $data->nominal }}</td>
        </tr>
        <tr>
            <td colspan="2" height="30px">GUNA PEMBAYARAN</td>
            <td style="text-align: center">:</td>
            <td colspan="2">{{ $data->keperluan }}</td>
        </tr>
        <tr>
            <td colspan="5">
                <hr />
            </td>
        </tr>
        <tr>
            <td colspan="5" style="text-align: right" height="30px">
                Cilacap, {{ $data->date }}
            </td>
        </tr>
        <tr>
            <td colspan="5" style="text-align: right">
                <img src="{{ public_path('assets/images/gsc/ttd/bendahara.png') }}" width="130px" />
            </td>
        </tr>
        <tr>
            <td colspan="5">
                <hr />
            </td>
        </tr>
        <tr>
            <td colspan="2">TERBILANG</td>
            <td style="text-align: center">:</td>
            <td colspan="2" style="font-size: 20px">Rp. @php
                echo number_format($data->terbilang,0,',','.');
            @endphp</td>
        </tr>
        <tr>
            <td colspan="5">
                <hr />
            </td>
        </tr>


    </table>
</body>

</html>
