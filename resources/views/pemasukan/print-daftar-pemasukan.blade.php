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

<h2 style="text-align: center; font-family:Arial;">DAFTAR PEMASUKAN GSC</h2>    
<table id="pemasukan">
  <tr>
    <th>Terima Dari</th>
    <th>Uang Sebanyak</th>
    <th>Guna Pembayaran</th>
    <th>Terbilang</th>
    <th>Tanggal</th>
  </tr>


  @foreach ($data as $pemasukan)
  <tr>
      <td>{{ $pemasukan->name }}</td>
      <td>{{ $pemasukan->nominal }}</td>
      <td>{{ $pemasukan->keperluan }}</td>
      <td>{{ $pemasukan->terbilang }}</td>
      <td>{{ $pemasukan->date }}</td>
  </tr>
  @endforeach

</table>

</body>
</html>


