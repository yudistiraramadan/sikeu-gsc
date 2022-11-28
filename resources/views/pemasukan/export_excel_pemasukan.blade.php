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
                <th style="text-align: center"><strong>Terima Dari</strong></th>
                <th style="text-align: center"><strong>Nominal</strong></th>
                <th style="text-align: center"><strong>Keperluan</strong></th>
                <th style="text-align: center"><strong>Tanggal</strong></th>
                <th style="text-align: center"><strong>Ditambahkan</strong></th>
            </tr>
        </thead>
        @foreach ($pemasukan as $item)
        <tr>
            <td>{{ $item->name }}</td>
            <td>{{ $item->nominal }}</td>
            <td>{{ $item->keperluan }}</td>
            <td>{{ $item->date }}</td>
            <td>{{ $item->created_at }}</td>
        </tr>
        @endforeach
        <tbody>
        </tbody>
    </table>
</body>
</html>