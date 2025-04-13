<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use App\Models\Penjualan;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class dashboardController extends Controller
{
    public function showDashboard()
    {
        $produks = Produk::all();
        $penjualans = Penjualan::all();

        $PendapatanSekarang = Penjualan::whereDate('created_at', Carbon::today())->sum('totalHarga');
        $jumlahPenjualan = Penjualan::count();
        $jumlahProduk = Produk::count();

        $kemarin = Carbon::yesterday()->toDateString();
        $pendapatanKemarin = Penjualan::whereDate('created_at', $kemarin)->sum('totalHarga');

        $persentaseKenaikan = 0; 
        if ($pendapatanKemarin > 0) { 
            $persentaseKenaikan = (($PendapatanSekarang - $pendapatanKemarin) / $pendapatanKemarin) * 100;
        }

        return view('dashboard', compact(
            'produks',
            'penjualans',
            'jumlahPenjualan',
            'jumlahProduk',
            'PendapatanSekarang',
            'pendapatanKemarin',
            'persentaseKenaikan',
        ));
    }
}

