<?php

namespace App\Http\Controllers;

use App\Buku;
use App\kategori;
use Illuminate\Http\Request;

class BukuController extends Controller
{
    public function index()
    {
        $buku = Buku::all();
//    $buku = Buku::with('kategori')->get();
//    return $buku;
        return view('buku.index', compact('buku'));
    }
    public function tambah()
    {
        $kategori=Kategori::all();
        return view('buku.create', compact('kategori'));
    }

    public function store(Request $req)
    {
        $req->validate([
            'judul'=>'required',
            'pengarang'=>'required',
            'penerbit'=>'required',
            'tahun_terbit'=>'required',
            'isbn'=>'required',
            'jumlah'=>'required',
            'lokasi'=>'required',
            'thumbnail'=>'required|mimes:jpeg,png,jpg,gif,svg,jfif|max:1024',
        ]);
        $imgname= $req->thumbnail->getClientOriginalName() . '-' . time() . '.' . $req->thumbnail->extension();
        $req->thumbnail->move(public_path('images/uploads'),$imgname );

        Buku::create([
            'id_kategori'=>$req->kategori,
            'judul'=>$req->judul,
            'pengarang'=>$req->pengarang,
            'penerbit'=>$req->penerbit,
            'tahun_terbit'=>$req->tahun_terbit,
            'isbn'=>$req->isbn,
            'jumlah'=>$req->jumlah,
            'lokasi'=>$req->lokasi,
            'gambar'=>$imgname,
            'status'=>'tersedia',
        ]);
        return redirect(route('dashboard.buku.index'))
        ->with(['jenis'=>'success', 'pesan' => 'Berhasil menambah Pegawai']);
    }
}
