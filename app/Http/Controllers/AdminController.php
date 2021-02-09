<?php

namespace App\Http\Controllers;

use App\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function index()
    {
        $admin = Admin::all();

        return view('admin.index', compact('admin'));
    }

    public function tambah()
    {
        return view('admin.create');
    }

    public function store(Request $req)
    {
        $req->validate([
            'nama' => 'required',
            'alamat' => 'required',
            'nohp' => 'required',
            'email' => 'required',
            'password' => 'min:5',
        ]);

        Admin::create([
            'nama' => $req->nama,
            'alamat' => $req->alamat,
            'nohp' => $req->nohp,
            'email' => $req->email,
            'password' => Hash::make($req->password),
        ]);

        return redirect(route('dashboard.admin.index'))
        ->with(['jenis'=>'success', 'pesan' => 'Berhasil menambah Admin']);
    }

    public function edit($id)
    {
        $data = Admin::findOrFail($id);
        return view('admin.edit', compact('data'));
    }

    public function update(Request $req, $id)
    {
        $req->validate([
            'nama' => 'required',
            'alamat' => 'required',
            'nohp' => 'required',
            'email' => 'required',
            'password' => 'min:5',
        ]);

        Admin::find($id)->update([
            'nama' => $req->nama,
            'alamat' => $req->alamat,
            'nohp' => $req->nohp,
            'email' => $req->email,
            'password' => Hash::make($req->password),
        ]);

        return redirect(route('dashboard.admin.index'))
        ->with(['jenis'=>'success', 'pesan' => 'Berhasil Edit Admin']);
    }

    public function delete($id)
    {
        $data = Admin::findOrFail($id);
        $data->delete();
        return redirect(route('dashboard.admin.index'))
        ->with(['jenis'=>'success', 'pesan' => 'Berhasil Hapus Admin']);
    }
}
