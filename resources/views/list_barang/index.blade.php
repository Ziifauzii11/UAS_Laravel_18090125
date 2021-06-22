@extends('list_barang.layout')
<div class="container">
    <div class="col-md-12 mt-5">
        <div class="card">
            <div class="card-header">
                <h3>Kelola Data Barang</h3>
            </div>
            <div class="card-body">
                <h5>Selamat datang di halaman dashboard, <strong>{{ Auth::user()->name }}</strong></h5>
                <a href="{{ route('logout') }}" class="btn btn-danger">Logout</a>
            </div>
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb mt-3 mb-3">
            <div class="text-right">
                <a class="btn btn-success" href="{{ route('list_barang.create') }}">Tambah Barang</a>
                <a href="/exportpdf" class="btn btn-info">Export PDF</a>
            </div>
        </div>
    </div>
    @if ($message = Session::get('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong><p>{{ $message }}</p></strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
    @endif
   
    <table class="table table-striped table-bordered">
        <tr>
            <th>No</th>
            <th>Image</th>
            <th>Katagori Barang</th>
            <th>Nama Barang</th>
            <th>Jumlah Stok</th>
            <th width="280px">Aksi</th>
        </tr>
        @foreach ($list_barang as $key => $barang)
        <tr>
          
            <td>{{ $key+1 }}</td>
            <td><img src="/image/{{ $barang->image }}" width="100px"></td>
            <td>{{ $barang->katagori_barang }}</td>
            <td>{{ $barang->nama_barang }}</td>
            <td>{{ $barang->jumlah_stok }}</td>
            <td>
                <form action="{{ route('list_barang.destroy',$barang->id) }}" method="POST"> 
                    <a class="btn btn-primary btn-sm" href="{{ route('list_barang.edit',$barang->id) }}">Edit</a>
   
                    @csrf
                    @method('DELETE')
      
                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Hapus</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
    </div>
</div>
@endsection