<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DetailPenjualan extends Model
{
    protected $fillable = [
        'userID',
        'penjualanID',
        'prd_produkID',
        'jumlahProduk',
        'subTotalDecimal'
    ];

    public function User(){
        return $this->belongsTo(User::class, 'userID', 'id');
    }

    public function Penjualan()
    {
    return $this->hasMany(Penjualan::class, 'detail_id');
    }

    public function Produk(){
        return $this->hasMany(Produk::class, 'produkID', 'prd_produkID');
    }
}
