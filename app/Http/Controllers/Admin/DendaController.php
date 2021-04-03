<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Denda;
use Illuminate\Http\Request;

class DendaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $denda = Denda::all();
        return view('administrator.denda.index', compact('denda'));
    }
    public function tambah()
    {
        return view('administrator.denda.create');
    }
    public function store(Request $req)
    {
        $req->validate([
            'nominal' => 'required',
            'keterangan' => 'required',
        ]);
        Denda::create([
            'nominal' => $req->nominal,
            'keterangan' => $req->keterangan,
        ]);
        return redirect(route('admin.denda.index'))
            ->with(['jenis' => 'success', 'pesan' => 'Berhasil menambah Pegawai']);
    }
    public function edit($id_denda)
    {
        $data = Denda::findOrFail($id_denda);
        return view('administrator.denda.edit', compact('data'));
    }
    public function update(Request $req, $id_denda)
    {
        $req->validate([
            'nominal' => 'required',
            'keterangan' => 'required',
        ]);

        Denda::find($id_denda)->update([
            'nominal' => $req->nominal,
            'keterangan' => $req->keterangan,
        ]);

        return redirect(route('admin.denda.index'))
            ->with(['jenis' => 'success', 'pesan' => 'Berhasil Edit Admin']);
    }

    public function delete($id_denda)
    {
        $data = Denda::findOrFail($id_denda);
        $data->delete();
        return redirect(route('admin.denda.index'))
            ->with(['jenis' => 'success', 'pesan' => 'Berhasil Hapus denda']);
    }
}
