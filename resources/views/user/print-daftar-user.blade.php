<!DOCTYPE html>
<html>
<head>
<style>
#pemasukan {
  font-family: Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

#pemasukan td, #pemasukan th {
  border: 1px solid #ddd;
  padding: 8px;
}

#pemasukan tr:nth-child(even){background-color: #f2f2f2;}

#pemasukan tr:hover {background-color: #ddd;}

#pemasukan th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #2b8fa6;
  color: white;
}
</style>
</head>
<body>

<h2 style="text-align: center; font-family:Arial;">DAFTAR RELAWAN GSC</h2>    
<table id="pemasukan">
  <tr>
    <th>Nama Relawan</th>
    <th>Alamat</th>
    <th>Whatsapp/Hp</th>
    <th>Status</th>
    <th>Ditambahkan</th>
  </tr>


  @foreach ($data as $user)
  <tr>
      <td>{{ $user->name }}</td>
      <td>{{ $user->address }}</td>
      <td>{{ $user->phone }}</td>
      <td>{{ $user->status }}</td>
      <td>{{ $user->created_at }}</td>
  </tr>
  @endforeach

</table>

</body>
</html>


