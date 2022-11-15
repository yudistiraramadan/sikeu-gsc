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
                <th style="text-align: center"><strong>Nama Relawan</strong></th>
                <th style="text-align: center"><strong>Email</strong></th>
                <th style="text-align: center"><strong>Alamat</strong></th>
                <th style="text-align: center"><strong>Whatsapp</strong></th>
                <th style="text-align: center"><strong>Status</strong></th>
                <th style="text-align: center"><strong>Ditambahkan</strong></th>
            </tr>
        </thead>
        @foreach ($user as $item)
        <tr>
            <td>{{ $item->name }}</td>
            <td>{{ $item->email }}</td>
            <td>{{ $item->address }}</td>
            <td>{{ $item->phone }}</td>
            <td>{{ $item->status }}</td>
            <td>{{ $item->created_at }}</td>
        </tr>
        @endforeach
        <tbody>
        </tbody>
    </table>
</body>
</html>