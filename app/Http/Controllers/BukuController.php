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
//        $buku = Buku::with('kategori')->get();
    //    return $buku;
        return view('buku.index', compact('buku'));
    }
    public function tambah()
    {
        $kategori=Kategori::all();
        return view('buku.create', compact('kategori'));
    }

    // public function store(Request $req)
    // {
    //     $req->validate([
    //         'nama'=>'required',
    //         'alamat'=>'required',
    //         'gender'=>'required',
    //         'nope'=>'required',
    //         'email'=>'required',
    //         'password'=>'required',
    //     ]);
    //     Member::create([
    //         'nama'=>$req->nama,
    //         'alamat'=>$req->alamat,
    //         'gender'=>$req->gender,
    //         'nope'=>$req->nope,
    //         'email'=>$req->email,
    //         'password'=>Hash::make($req->password),
    //     ]);
    //     return redirect(route('dashboard.member.index'))
    //     ->with(['jenis'=>'success', 'pesan' => 'Berhasil menambah Pegawai']);
    // }
}
