<?php

namespace App\Http\Controllers;

use App\Login;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Admin;

class LoginController extends Controller
{
    public function index()
    {
        return view('login.index');
    }

    public function login(Request $request)
    {
        //  dd($request->all());
        $data = Admin::where('email', $request->email)->firstOrFail();
        if ($data) {
            if (Hash::check($request->password, $data->password)) {
                return redirect('/member_log');
            }
        } else
            return redirect('/')->with('message', 'GOBLOK!');
    }
}
