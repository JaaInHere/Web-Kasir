<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Produk extends Model
{

    use SoftDeletes;

    protected $primaryKey = 'produkID';
    public $incrementing = true;

    protected $fillable = [
        'namaProduk',
        'harga',
        'stok'
    ];



    public function DetailPenjualan()
    {
        return $this->belongsTo(DetailPenjualan::class, 'produkID', 'prd_produkID');
    }
}
