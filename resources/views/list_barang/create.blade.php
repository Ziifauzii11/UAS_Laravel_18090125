<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8"/>
        <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
        <meta
            name="viewport"
            content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
        <meta name="description" content=""/>
        <meta name="author" content=""/>
        <title>Kelola Data Barang</title>
        <link
            rel="stylesheet"
            href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
        <link href="{{url('assets/css/styles.css')}}" rel="stylesheet"/>
        <link
            href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css"
            rel="stylesheet"
            crossorigin="anonymous"/>
        <script
            src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/js/all.min.js"
            crossorigin="anonymous"></script>
    </head>
    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <a class="navbar-brand" href="#">Data Barang</a>
            <!-- Navbar Search-->
            <form
                class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
                <div class="input-group">
                    <div class="input-group-append">
                        
                    </div>
                </div>
            </form>
            <!-- Navbar-->
            <ul class="navbar-nav ml-auto ml-md-0">
                <li class="nav-item dropdown">
                    <a
                        class="nav-link dropdown-toggle"
                        id="userDropdown"
                        href="#"
                        role="button"
                        data-toggle="dropdown"
                        aria-haspopup="true"
                        aria-expanded="false">
                        <i class="fas fa-user fa-fw"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="{{url('logout')}}">Logout</a>
                    </div>
                </li>
            </ul>
        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid">
                    <br>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Tambah Data</li>
                        </ol>
                        <div class="row justify-content-center">
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
                        </div>
                        <form method="post" action="{{ route('list_barang.store') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="row justify-content-center">
                        <div class="col-xs-7 col-sm-7 col-md-7">
                            <div class="form-group">
                                <label for="katagori_barang">Katagori Barang</label>
                                <input type="text" name="katagori_barang" class="form-control" id="katagori_barang" aria-describedby="katagori_barang" placeholder="Masukkan Katagori Barang">
                            </div>
                        </div>
                        <div class="col-xs-7 col-sm-7 col-md-7">
                            <div class="form-group">
                                <label for="nama_barang">Nama Barang</label>
                                <input type="text" name="nama_barang" class="form-control" id="nama_barang" aria-describedby="nama_barang" placeholder="Masukkan Nama Barang">
                            </div>
                        </div>
                        <div class="col-xs-7 col-sm-7 col-md-7">
                            <div class="form-group">
                                <label for="jumlah_stok">Jumlah Stok</label>
                                <input type="number" name="jumlah_stok" class="form-control" id="jumlah_stok" aria-describedby="jumlah_stok" placeholder="Masukkan Jumlah Stok">
                            </div>
                        </div>
                        <div class="col-xs-7 col-sm-7 col-md-7">
                            <div class="form-group">
                                <label>Image</label>
                                <input type="file" name="image" class="form-control" placeholder="image">
                            </div>
                        </div>
                        <div class="col-xs-7 col-sm-7 col-md-7">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                            <a class="btn btn-warning" href="{{ route('list_barang.index') }}"> Kembali</a>
                        </div>
                        </div>
                        </form>
                </main>
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; Dwi Febi Fauzi</div>
                            <div>
                                <a>Privacy Policy</a>
                                &middot;
                                <a>Terms &amp; Conditions</a>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <script
            src="https://code.jquery.com/jquery-3.4.1.min.js"
            crossorigin="anonymous"></script>
        <script
            src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js"
            crossorigin="anonymous"></script>

    </body>
</html>