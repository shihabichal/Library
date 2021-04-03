<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Member;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class MemberController extends Controller
{
    public function index()
    {
        $member = Member::all();

        return view('administrator.member.index', compact('member'));
    }

    public function tambah()
    {
        return view('administrator.member.create');
    }

    public function store(Request $req)
    {
        $req->validate([
            'nama' => 'required',
            'alamat' => 'required',
            'gender' => 'required',
            'nope' => 'required',
            'email' => 'required',
            'password' => 'required',
        ]);
        Member::create([
            'nama' => $req->nama,
            'alamat' => $req->alamat,
            'gender' => $req->gender,
            'nope' => $req->nope,
            'email' => $req->email,
            'password' => Hash::make($req->password),
        ]);
        return redirect(route('admin.member.index'))
            ->with(['jenis' => 'success', 'pesan' => 'Berhasil menambah Pegawai']);
    }
    public function edit($id_member)
    {
        $data = Member::findOrFail($id_member);
        return view('administrator.member.edit', compact('data'));
    }
    public function update(Request $req, $id)
    {
        $req->validate([
            'nama' => 'required',
            'alamat' => 'required',
            'gender' => 'required',
            'nope' => 'required',
            'email' => 'required',
            'password' => 'required',
        ]);

        Member::find($id)->update([
            'nama' => $req->nama,
            'alamat' => $req->alamat,
            'gender' => $req->gender,
            'nope' => $req->nope,
            'email' => $req->email,
            'password' => Hash::make($req->password),
        ]);

        return redirect(route('admin.member.index'))
            ->with(['jenis' => 'success', 'pesan' => 'Berhasil Edit Admin']);
    }

    public function delete($id_member)
    {
        $data = Member::findOrFail($id_member);
        $data->delete();
        return redirect(route('admin.member.index'))
            ->with(['jenis' => 'success', 'pesan' => 'Berhasil Hapus Admin']);
    }
}
