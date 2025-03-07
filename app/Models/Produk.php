<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    
protected $fillable = [
    'namaProduk',
    'harga',
    'stok'
];

public function DetailPenjualan(){
    return $this->belongsTo(DetailPenjualan::class, 'produkID', 'prd_produkID');
}
}
