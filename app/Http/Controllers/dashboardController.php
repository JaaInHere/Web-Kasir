<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use App\Models\Penjualan;
use Illuminate\Http\Request;

class dashboardController extends Controller
{
    public function showDashboard()
    {
        $produks = Produk::all();
        $penjualans = Penjualan::all();

        $jumlahPenjualan = Penjualan::count();
        $jumlahProduk = Produk::count();

        return view('dashboard', compact('produks', 'penjualans', 'jumlahPenjualan', 'jumlahProduk'));
    }
}
