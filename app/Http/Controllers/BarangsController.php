<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use Illuminate\Http\Request;
use PDF;

class BarangsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $list_barang = Barang::all(); //Fungsi untuk mengambil seluruh data pada tabel list_barang

        return view('list_barang.index', compact('list_barang')); //Redirect ke halaman list_barang/index.blade.php dengan membawa data list_barang tadi
    }

    public function create()
    {
        return view('list_barang.create'); //Redirect ke halaman list_barang/create.blade.php
    }

    public function store(Request $request)
    {
        $request->validate([
            'katagori_barang' => 'required', //nama form "katagori_barang" harus diisi (required)
            'nama_barang' => 'required', //nama form "nama_barang" harus diisi (required)
            'jumlah_stok' => 'required', //nama form "jumlah_stok" harus diisi (required)
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]); //Memvalidasi inputan yang kita kirim apakah sudah benar

        $input = $request->all();

        if ($image = $request->file('image')) {
            $destinationPath = 'image/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['image'] = "$profileImage";
        }
  
        Barang::create($input);

        //Barang::create($request->all()); //Fungsi untuk menyimpan data inputan kita

        return redirect()->route('list_barang.index')
            ->with('success', 'Data Berhasil Ditambah.'); //Redirect ke halaman list_barang/index.blade.php dengan pesan success
    }

    public function edit(barang $list_barang)
    {
        return view('list_barang.edit', compact('list_barang')); //Redirect ke halaman list_barang/edit.blade.php dengan membawa data barang sesuai ID yang dipilih
    }

    public function update(Request $request, Barang $list_barang)
    {
        $request->validate([
            'katagori_barang' => 'required', //nama form "katagori_barang" harus diisi (required)
            'nama_barang' => 'required', //nama form "nama_barang" harus diisi (required)
            'jumlah_stok' => 'required', //nama form "jumlah_stok" harus diisi (required)
        ]); //Memvalidasi inputan yang kita kirim apakah sudah benar

        $input = $request->all();

        if ($image = $request->file('image')) {
            $destinationPath = 'image/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['image'] = "$profileImage";
        }else{
            unset($input['image']);
        }
        
        $list_barang->update($input);

        //$list_barang->update($request->all()); //Fungsi untuk mengupdate data inputan kita

        return redirect()->route('list_barang.index')
            ->with('success', 'Data Berhasil Diupdate'); //Redirect ke halaman list_barang/index.blade.php dengan pesan success
    }

    public function destroy(Barang $list_barang)
    {
        $list_barang->delete(); //Fungsi untuk menghapus data sesuai dengan ID yang dipilih

        return redirect()->route('list_barang.index')
            ->with('success', 'Data Berhasil Dihapus'); //Redirect ke halaman list_barang/index.blade.php dengan pesan success
    }

    public function exportpdf(){
        $list_barang = Barang::all();

        view()->share('list_barang', $list_barang);
        $pdf = PDF::loadview('list_barang_pdf');
        return $pdf->download('data.pdf');
    }
}