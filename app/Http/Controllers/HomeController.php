<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Kategori;
use App\Models\Pembeli;
use App\Models\Transaksi;

// use Auth;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $kategori = Kategori::count();
        $pembeli = Pembeli::count();
        $barang = Barang::count();
        $transaksi = Transaksi::count();
        return view('home', compact('kategori', 'pembeli', 'barang', 'transaksi'));
    }

    // public function index()
    // {
    //     if (Auth::user()->hasRole('admin')) {
    //         return view('home');
    //     } else {
    //         return view('pengguna.index');
    //     }
    // }
}
