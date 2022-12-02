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
                <th style="text-align: center"><strong>Role</strong></th>
                <th style="text-align: center"><strong>Nama User</strong></th>
                <th style="text-align: center"><strong>Informasi</strong></th>
                <th style="text-align: center"><strong>Status</strong></th>
                <th style="text-align: center"><strong>Tanggal</strong></th>
            </tr>
        </thead>
        @foreach ($aktifitas as $item)
        <tr>
            <td>{{ $item->role_name }}</td>
            <td>{{ $item->name }}</td>
            <td>{{ $item->activities }}</td>
            <td>{{ $item->type }}</td>
            <td>{{ \Carbon\Carbon::parse($item->date)->isoFormat('D MMMM Y') }}</td>
        </tr>
        @endforeach
        <tbody>
        </tbody>
    </table>
</body>
</html>