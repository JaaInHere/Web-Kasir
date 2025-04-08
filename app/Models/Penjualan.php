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

    protected $primaryKey = 'penjualanID';
    public $incrementing = true;

    public function detailPenjualans()
    {
        return $this->hasMany(DetailPenjualan::class, 'penjualanID', 'penjualanID');
    }
}
