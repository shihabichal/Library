<?php

namespace App\Http\Controllers\Admin;

use App\Buku;
use App\Http\Controllers\Controller;
use App\kategori;
use Illuminate\Http\Request;
use Illuminate\Http\Testing\File;

class BukuController extends Controller
{
    public function index()
    {
        $buku = Buku::join('kategori', 'kategori.id_kategori', 'buku.kategori_id')->get();
        return view('administrator.buku.index', compact('buku'));
    }
    public function tambah()
    {
        $kategori = Kategori::all();
        return view('administrator.buku.create', compact('kategori'));
    }

    public function store(Request $req)
    {
        $req->validate([
            'judul' => 'required',
            'pengarang' => 'required',
            'penerbit' => 'required',
            'tahun_terbit' => 'required',
            'isbn' => 'required',
            'jumlah' => 'required',
            'lokasi' => 'required',
            'thumbnail' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        $imgname = $req->thumbnail->getClientOriginalName() . '-' . time() . '.' . $req->thumbnail->extension();
        $req->thumbnail->move(public_path('images/uploads'), $imgname);

        Buku::create([
            'kategori_id' => $req->kategori,
            'judul' => $req->judul,
            'pengarang' => $req->pengarang,
            'penerbit' => $req->penerbit,
            'tahun_terbit' => $req->tahun_terbit,
            'isbn' => $req->isbn,
            'jumlah' => $req->jumlah,
            'lokasi' => $req->lokasi,
            'gambar' => $imgname,
            'status' => 'tersedia',
        ]);
        return redirect(route('admin.buku.index'))
            ->with(['jenis' => 'success', 'pesan' => 'Berhasil Tambah Buku']);
    }
    public function edit($id_buku)
    {
        $data = Buku::findOrFail($id_buku);
        $kategori = Kategori::all();
        return view('administrator.buku.edit', compact('data', 'kategori'));
    }

    public function update(Request $req, $id_buku)
    {
        $data = Buku::findOrFail($id_buku);

        $req->validate([
            'judul' => 'required',
            'pengarang' => 'required',
            'penerbit' => 'required',
            'tahun_terbit' => 'required',
            'isbn' => 'required',
            'jumlah' => 'required',
            'lokasi' => 'required',
            'thumbnail' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'status' => 'required',
        ]);

        if ($req->thumbnail) {
            $imgname = $req->thumbnail->getClientOriginalName() . '-' . time() . '.' . $req->thumbnail->extension();
            $req->thumbnail->move(public_path('images/uploads'), $imgname);
        }

        Buku::find($id_buku)->update([
            'kategori_id' => $req->kategori,
            'judul' => $req->judul,
            'pengarang' => $req->pengarang,
            'penerbit' => $req->penerbit,
            'tahun_terbit' => $req->tahun_terbit,
            'isbn' => $req->isbn,
            'jumlah' => $req->jumlah,
            'lokasi' => $req->lokasi,
            'gambar' => $imgname,
            'status' => $req->status,
        ]);

        return redirect(route('admin.buku.index'))
            ->with(['jenis' => 'success', 'pesan' => 'Berhasil Edit Buku']);
    }

    public function delete($id_buku)
    {
        $data = Buku::findOrFail($id_buku);
        $data->delete();
        return redirect(route('admin.buku.index'))
            ->with(['jenis' => 'success', 'pesan' => 'Berhasil Hapus Buku']);
    }
}
