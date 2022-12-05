<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Cetak Pengeluaran</title>
</head>

<body>
    <table border="0" align="center" width="90%">
        <tr>
            <td width="60px"><img src="{{ asset('assets/images/gsc/gsc.png') }}" width="50px" /></td>
            <td width="100px">Gerak Sedekah Cilacap</td>
            <td width="20"></td>
            <td style="text-align: center; font-size: 22px; font-family:Arial, Helvetica, sans-serif; font-weight:700;">PENGELUARAN</td>
            <td>KWITANSI No. {{ $data->id }}</td>
        </tr>

        <tr>
            <td colspan="5">
                <hr />
            </td>
        </tr>
        <tr>
            <td colspan="2" height="30px" style="font-family: Arial, Helvetica, sans-serif">Dibayarkan Kepada</td>
            <td style="text-align: center">:</td>
            <td colspan="2" style="font-family: Arial, Helvetica, sans-serif">{{ $data->name_pengaju }}</td>
        </tr>
        <tr>
            <td colspan="2" height="30px" style="font-family: Arial, Helvetica, sans-serif">Alamat</td>
            <td style="text-align: center">:</td>
            <td colspan="2" style="font-family: Arial, Helvetica, sans-serif">{{ $data->address }}</td>
        </tr>
        <tr>
            <td colspan="2" height="30px" style="font-family: Arial, Helvetica, sans-serif">Uang Sebanyak</td>
            <td style="text-align: center">:</td>
            <td colspan="2" style="font-family: Arial, Helvetica, sans-serif">
                Rp. @php
                    echo number_format($data->nominal,0,',','.');
                @endphp
            </td>
        </tr>
        <tr>
            <td colspan="2" height="30px" style="font-family: Arial, Helvetica, sans-serif">Terbilang</td>
            <td style="text-align: center">:</td>
            <td colspan="2" style="font-family: Arial, Helvetica, sans-serif">{{ $data->terbilang }}</td>
        </tr>
        <tr>
            <td colspan="2" height="30px" style="font-family: Arial, Helvetica, sans-serif">Keterangan</td>
            <td style="text-align: center">:</td>
            <td colspan="2" style="font-family: Arial, Helvetica, sans-serif">{{ $data->keterangan }}</td>
        </tr>
        <tr>
            <td colspan="5">
                <hr />
            </td>
        </tr>
        <tr>
            <td colspan="5" style="text-align: right; font-family: Arial, Helvetica, sans-serif" height="30px">
                Cilacap, {{ \Carbon\Carbon::parse($data->date)->isoFormat('D MMMM Y') }}
            </td>
        </tr>
        <tr>
            <td colspan="5">
                <hr />
            </td>
        </tr>
    </table>
    <table border="0" align="center" width="90%">
        <tr>
            <tr>
                <td style="text-align: center;">Diketahui</td>
                <td style="text-align: center;">Diterima Oleh</td>
                <td style="text-align: center;">Bendahara</td>
            </tr>
            <td style="text-align: center;"><img src="{{ asset('assets/images/gsc/ttd/program.png') }}" width="130px" /></td>
            <td style="text-align: center;"><img src="{{ asset('assets/images/gsc/ttd/yudis.png') }}" width="130px" /></td>
            <td style="text-align: center;"><img src="{{ asset('assets/images/gsc/ttd/bendahara.png') }}" width="130px" /></td>
        </tr>
        <tr>
            <td style="text-align: center;">(Maimunah)</td>
            <td style="text-align: center;">({{ $data->name_penerima }})</td>
            <td style="text-align: center;">(Novia Kintan Hapsari)</td>
        </tr>
        <tr>
            <td colspan="5">
                <hr />
            </td>
        </tr>
    </table>
</body>

</html>
