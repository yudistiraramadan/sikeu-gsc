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

<h2 style="text-align: center; font-family:Arial, Helvetica, sans-serif; color:#2b8fa6;"><u>DAFTAR PEMASUKAN GSC</u></h2>    
<table id="pemasukan">
  <tr>
    <th style="width: 25%;">Terima Dari</th>
    <th style="width: 25%;">Uang Sebanyak</th>
    <th>Guna Pembayaran</th>
    <th>Terbilang</th>
    <th style="width: 15%;">Tanggal</th>
  </tr>


  @foreach ($data as $pemasukan)
  <tr>
      <td>{{ $pemasukan->name }}</td>
      <td>{{ $pemasukan->nominal }}</td>
      <td>{{ $pemasukan->keperluan }}</td>
      {{-- <td>{{ $pemasukan->terbilang }}</td> --}}
      <td>@php
          echo number_format($pemasukan->terbilang);
      @endphp</td>
      <td>{{ \Carbon\Carbon::parse($pemasukan->date)->format('d-m-Y') }}</td>
  </tr>
  @endforeach

</table>

</body>
</html>


