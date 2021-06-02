<?php

namespace App\Http\Controllers\Member;

use App\Buku;
use App\Http\Controllers\Controller;
use App\kategori;
use Illuminate\Http\Request;
use Illuminate\Http\Testing\File;

class BukuController extends Controller
{
    public function index()
    {
       $buku = Buku::all();

       return view('memberlayout.index', compact('buku'));
    //return view('memberlayout.app');
    }
}
