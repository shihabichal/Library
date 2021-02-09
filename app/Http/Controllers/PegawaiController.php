<?php

namespace App\Http\Controllers;

use App\Pegawai;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class PegawaiController extends Controller
{
    public function index()
    {
        $pegawai = Pegawai::all();

        return view('pegawai.index', compact('pegawai'));
    }

    public function tambah()
    {
        return view('pegawai.create');
    }

    public function store(Request $req)
    {
        $req->validate([
            'nama'=>'required',
            'alamat'=>'required',
            'nope'=>'required',
            'jabatan'=>'required',
            'gaji'=>'required',
        ]);
        Pegawai::create([
            'nama'=>$req->nama,
            'alamat'=>$req->alamat,
            'nope'=>$req->nope,
            'jabatan'=>$req->jabatan,
            'gaji'=>$req->gaji,
        ]);
        return redirect(route('dashboard.pegawai.index'))
        ->with(['jenis'=>'success', 'pesan' => 'Berhasil menambah Pegawai']);
    }
    public function edit ($id){
        $data=Pegawai::findOrFail($id);
        return view('pegawai.edit', compact('data'));
    }
    public function update (Request $req, $id){
        $req->validate([
            'nama'=>'required',
            'alamat'=>'required',
            'nope'=>'required',
            'jabatan'=>'required',
            'gaji'=>'required',
        ]);
        Pegawai::find($id)->update([
            'nama'=>$req->nama,
            'alamat'=>$req->alamat,
            'nope'=>$req->nope,
            'jabatan'=>$req->jabatan,
            'gaji'=>$req->gaji,
        ]);

        return redirect(route('dashboard.pegawai.index'))
        ->with(['jenis'=>'success', 'pesan' => 'Berhasil Edit Pegawai']);
    }
    public function delete($id)
    {
        $data=Pegawai::findOrFail($id);
        $data->delete;
        return redirect(route('dashboard.pegawai.index'))
        ->with(['jenis'=>'success', 'pesan' => 'Berhasil Hapus Admin']);
    }
}
