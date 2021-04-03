<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        if (Auth::guard('admin')->check()) {
            return redirect()->route('admin.dashboard');
        } else if (Auth::guard('member')->check()) {
            return redirect()->route('member.dashboard');
        } else {
            return view('auth.login');
        }
    }

    public function login(Request $request)
    {
        $this->validate($request, [
            'email'      => 'required',
            'password'  => 'required'
        ]);

        $cekAdmin = Admin::where('username', $request->email)->first();

        if ($cekAdmin) {
            if (Auth::guard('admin')->attempt(['username' => $request->email, 'password' => $request->password])) {
                return redirect(route('admin.dashboard'));
            } else {
                return redirect()->back()->with(['jenis' => 'danger', 'pesan' => 'Username atau Password salah'])
                    ->withInput();
            }
        }

        if (!$cekAdmin) {
            return redirect()->back()->with(['jenis' => 'danger', 'pesan' => 'Data login tidak ditemukan']);
        }
    }
}
