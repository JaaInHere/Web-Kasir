<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Penjualan extends Model
{
    protected $fillable = [
        'detail_id',
        'tanggalPenjualan',
        'totalHarga',
    ];

    public function DetailPenjualan()
{
    return $this->belongsTo(DetailPenjualan::class, 'detail_id');
}
}
