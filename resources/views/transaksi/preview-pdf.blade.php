<!DOCTYPE html>
<html>
<head>
    <title>GENERATE PDF</title>
</head>
<body>
<br><br>
<center>
  <h2>Laporan Transaksi</h2>
</center>
<br>
<b>Dari tanggal {{ \Carbon\Carbon::parse(request()->tgl_mulai)->format('d-m-Y') }} - {{ \Carbon\Carbon::parse(request()->tgl_selesai)->format('d-m-Y') }}</b><br><br>
<table style="" border="1" cellspacing="0" cellpadding="10" width="100%">
  <thead>
    <tr>
      <th scope="col">No</th>
      <th scope="col">Nasabah</th>
      <th scope="col">No Rekening</th>
      <th scope="col">Jenis</th>
      <th scope="col">Tanggal</th>
      <th scope="col">Nominal</th>
    </tr>
  </thead>
  <tbody>
    @foreach($transaksi as $tr)
    <tr>
      <th scope="row">{{ $loop->iteration }}</th>
      <td>{{ $tr->nm_nasabah }}</td>
      <td>{{ $tr->no_rekening }}</td>
      <td>{{ $tr->jns_transaksi }}</td>
      <td>
        {{ \Carbon\Carbon::parse($tr->waktu)->format('d-m-Y') }}
      </td>
      <td>{{ "Rp" }} @toRupiah($tr->nominal)</td>
    </tr>
    @endforeach
    <tr>
      <td colspan="5"><b>Total</b></td>
      <td><b>Rp @toRupiah($total)</b></td>
    </tr>
  </tbody>
</table>
</body>
</html>