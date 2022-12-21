<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document Daftar User</title>
</head>
<body>
    <table>
        <thead>
            <tr>
                <th style="text-align: center"><strong>Dibayarkan Kepada</strong></th>
                <th style="text-align: center"><strong>Diterima Oleh</strong></th>
                <th style="text-align: center"><strong>Nominal</strong></th>
                <th style="text-align: center"><strong>Terbilang</strong></th>
                <th style="text-align: center"><strong>Keterangan</strong></th>
                <th style="text-align: center"><strong>Tanggal</strong></th>
            </tr>
        </thead>
        @foreach ($pengeluaran as $item)
        <tr>
            <td>{{ $item->name_pengaju }}</td>
            <td>{{ $item->name_penerima }}</td>
            <td>{{ $item->nominal }}</td>
            <td>{{ $item->terbilang }}</td>
            <td>{{ $item->keterangan }}</td>
            <td>{{ \Carbon\Carbon::parse($item->date)->isoFormat('D MMMM Y') }}</td>
        </tr>
        @endforeach
        <tbody>
        </tbody>
    </table>
</body>
</html>