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

<h2 style="text-align: center; font-family:Arial, Helvetica, sans-serif; color:#2b8fa6;"><u>DAFTAR PENGELUARAN GSC</u></h2>    
<table id="pemasukan">
  <tr>
    <th style="width: 25%;">Dibayarkan Kepada</th>
    <th style="width: 25%;">Diterima Oleh</th>
    <th style="width: 15%;">Nominal</th>
    <th style="width: 20%;">Keterangan</th>
    <th style="width: 15%;">Tanggal</th>
  </tr>


  @foreach ($data as $pengeluaran)
  <tr>
      <td>{{ $pengeluaran->name_pengaju }}</td>
      <td>{{ $pengeluaran->name_penerima }}</td>
      <td>@php
        echo number_format($pengeluaran->nominal);
      @endphp</td>
      <td>{{ $pengeluaran->keterangan }}</td>
      <td>{{ \Carbon\Carbon::parse($pengeluaran->date)->format('d-m-Y') }}</td>
  </tr>
  @endforeach

</table>

</body>
</html>


