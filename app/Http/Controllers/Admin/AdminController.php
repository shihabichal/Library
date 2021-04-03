<?php

namespace App\Http\Controllers\Admin;

use App\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function index()
    {
        $admin = Admin::all();

        return view('administrator.admin.index', compact('admin'));
    }

    public function tambah()
    {
        return view('administrator.admin.create');
    }

    public function store(Request $req)
    {
        $req->validate([
            'nama' => 'required',
            'email' => 'required',
            'username' => 'required',
            'nohp' => 'required',
            'password' => 'min:5',
        ]);

        Admin::create([
            'nama_admin' => $req->nama,
            'email' => $req->email,
            'username' => $req->username,
            'nohp' => $req->nohp,
            'password' => Hash::make($req->password),
        ]);

        return redirect(route('admin.admin.index'))
            ->with(['jenis' => 'success', 'pesan' => 'Berhasil menambah Admin']);
    }

    public function edit($id)
    {
        $data = Admin::findOrFail($id);
        return view('administrator.admin.edit', compact('data'));
    }

    public function update(Request $req, $id)
    {
        $req->validate([
            'nama' => 'required',
            'email' => 'required',
            'username' => 'required',
            'nohp' => 'required',
        ]);

        Admin::find($id)->update([
            'nama_admin' => $req->nama,
            'email' => $req->email,
            'username' => $req->username,
            'nohp' => $req->nohp,

        ]);

        if ($req->password) {
            $req->validate([
                'password' => 'min:5',
            ]);

            Admin::find($id)->update([
                'password' => $req->password,
            ]);
        }

        return redirect(route('admin.admin.index'))
            ->with(['jenis' => 'success', 'pesan' => 'Berhasil Edit Admin']);
    }

    public function delete($id)
    {
        $data = Admin::findOrFail($id);
        $data->delete();
        return redirect(route('admin.admin.index'))
            ->with(['jenis' => 'success', 'pesan' => 'Berhasil Hapus Admin']);
    }
}
