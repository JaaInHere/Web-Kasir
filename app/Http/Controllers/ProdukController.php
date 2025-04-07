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

    public function destroy($id){
        $produks = Produk::findOrFail($id);
        $produks->delete();
        return redirect()->route('itemData')->with('sueccess', 'Produk Berhasil dihapus');
    }

    public function addProduk(Request $request){
        $validate = $request->validate([
            'namaProduk' => 'required|string|max:25',
            'harga' => 'required|integer|max_digits:10',
            'stok' => 'required|integer|max_digits:10'
        ]);

        Produk::create($validate);

        return redirect()->back()->with('success', 'Produk Berhasil Ditambahkan');
    }

    public function edit($id){
        $produk = Produk::find($id);

        if(!$produk){
            return redirect()->route('itemData')->with('error', 'Produk Tidak ditemukan');
        } else {
            return view('editItem', compact('produk'));
        }
    }

    public function update(Request $request, $id){
        $produk = Produk::find($id);

        if($produk){
            $produk->update($request->only(['namaProduk','harga','stok']));
            return redirect()->route('itemData')->with('success', 'Produk Sudah Diperbarui!');
        }
            return redirect()->route('itemData')->with('error', 'Produk Tidak ditemukan');
    }
}
