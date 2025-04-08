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

    protected $primaryKey = 'detailID';
    public $incrementing = true;
    
    public function produk()
    {
        return $this->belongsTo(Produk::class, 'prd_produkID', 'produkID');
    }
    
    public function penjualan()
    {
        return $this->belongsTo(Penjualan::class, 'penjualanID', 'penjualanID');
    }
}
