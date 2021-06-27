<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Export PDF</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
  </head>
  <body>
    <table class="table table-bordered">
    <thead>
      <tr class="table-info">
        <th>No</th>
        <th>Katagori Barang</th>
        <th>Nama Barang</th>
        <th>Jumlah Stok</th>
        <th>Image</th>
      </tr>
      </thead>
      <tbody>
        @foreach ($list_barang as $key => $barang)
        <tr>
            <td>{{ $key+1 }}</td>
            <td>{{ $barang->katagori_barang }}</td>
            <td>{{ $barang->nama_barang }}</td>
            <td>{{ $barang->jumlah_stok }}</td>
            <td>{{ $barang->image }}</td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </body>
</html>