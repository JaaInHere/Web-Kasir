<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use Illuminate\Http\Request;

class ProdukController extends Controller
{
    public function showProduk(){
        $produks = Produk::all();

        return view('itemData', compact('produks'));
    }
}
