@extends('list_barang.layout')
  
@section('content')
   
<div class="container mt-5">
   
    <div class="row justify-content-center align-items-center">
        <div class="card" style="width: 24rem;">
            <div class="card-header">
            Edit Barang
            </div>
            <div class="card-body">
                @if ($errors->any())
                <div class="alert alert-danger">
                    <strong>Data Tidak Lengkap!</strong>Mohon Lengkapi Data<br><br>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form method="post" action="{{ route('list_barang.update',$list_barang->id) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
                <div class="form-group">
                    <label for="katagori_barang">Katagori Barang</label>
                    <input type="text" name="katagori_barang" class="form-control" id="katagori_barang" value="{{ $list_barang->katagori_barang }}" aria-describedby="katagori_barang" placeholder="Masukkan Katagori Barang">
                </div>
                <div class="form-group">
                    <label for="nama_barang">Nama Barang</label>
                    <input type="text" name="nama_barang" class="form-control" id="nama_barang" value="{{ $list_barang->nama_barang }}" aria-describedby="nama_barang" placeholder="Masukkan Nama Barang">
                </div>
                <div class="form-group">
                    <label for="jumlah_stok">Jumlah Stok</label>
                    <input type="number" name="jumlah_stok" class="form-control" id="jumlah_stok" value="{{ $list_barang->jumlah_stok }}" aria-describedby="jumlah_stok" placeholder="Masukkan Jumlah Stok">
                </div>
                <div class="form-group">
                    <label>Image</label>
                    <input type="file" name="image" class="form-control" placeholder="image">
                    <img src="/image/{{ $list_barang->image }}" width="300px">
                </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
            <div class="float-right">
                <a class="btn btn-secondary" href="{{ route('list_barang.index') }}"> Kembali</a>
            </div>
            </form>
            </div>
        </div>
    </div>
</div>
@endsection