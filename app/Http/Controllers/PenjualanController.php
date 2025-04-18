<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use App\Models\Penjualan;
use Illuminate\Http\Request;
use App\Models\DetailPenjualan;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;



class PenjualanController extends Controller
{
    public function create()
    {
        $produks = Produk::where('stok', '>', 0)->get();
        return view('sale', compact('produks'));
    }

    public function store(Request $request)
    {

        $produkJumlah = [];
        foreach ($request->produkID as $index => $idProduk) {
            $jumlah = $request->jumlahProduk[$index];
            if (isset($produkJumlah[$idProduk])) {
                $produkJumlah[$idProduk] += $jumlah;
            } else {
                $produkJumlah[$idProduk] = $jumlah;
            }
        }


        foreach ($produkJumlah as $idProduk => $totalJumlah) {
            $produk = Produk::findOrFail($idProduk);
            if ($produk->stok < $totalJumlah) {
                return redirect()->route('penjualan.create')
                ->with('error', 'Stok produk "' . $produk->namaProduk . '" tidak mencukupi untuk jumlah yang diminta.');
            }
        }


        $penjualan = DB::transaction(function () use ($request) {
            $total = 0;

            foreach ($request->produkID as $index => $idProduk) {
                $produk = Produk::findOrFail($idProduk);
                $jumlah = $request->jumlahProduk[$index];
                $total += $produk->harga * $jumlah;
            }

            $penjualan = Penjualan::create([
                'tanggalPenjualan' => now(),
                'totalHarga' => $total,
            ]);

            foreach ($request->produkID as $index => $idProduk) {
                $produk = Produk::findOrFail($idProduk);
                $jumlah = $request->jumlahProduk[$index];
                $subtotal = $produk->harga * $jumlah;

                DetailPenjualan::create([
                    'userID' => Auth::id(),
                    'penjualanID' => $penjualan->penjualanID,
                    'prd_produkID' => $idProduk,
                    'jumlahProduk' => $jumlah,
                    'subTotalDecimal' => $subtotal,
                ]);

                $produk->decrement('stok', $jumlah);
            }

            return $penjualan;
        });

        return redirect()->route('penjualan.struk', $penjualan->penjualanID);
    }

    public function show($id)
    {
        $penjualan = Penjualan::with('detailPenjualans.produk')->findOrFail($id);
        return view('struk', compact('penjualan'));
    }
}

