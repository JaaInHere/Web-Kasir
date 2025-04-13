<?php

namespace Database\Seeders;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Produk;
use App\Models\Penjualan;
use App\Models\DetailPenjualan;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PenjualanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
                // Ambil user pertama
                $user = User::first();

                // Ambil produk berdasarkan nama
                $pelembab = Produk::where('namaProduk', 'Pelembab bibir')->first();
                $airMineral = Produk::where('namaProduk', 'Air mineral')->first();
        
                // Hitung total harga
                $totalHarga = ($pelembab->harga * 2) + ($airMineral->harga * 1);
        
                // Buat penjualan untuk kemarin
                $penjualan = Penjualan::create([
                    'tanggalPenjualan' => Carbon::yesterday(),
                    'totalHarga' => $totalHarga,
                    'created_at' => Carbon::yesterday(),
                    'updated_at' => Carbon::yesterday(),
                ]);
        
                // Tambahkan detail penjualannya
                DetailPenjualan::insert([
                    [
                        'userID' => $user->id,
                        'penjualanID' => $penjualan->penjualanID,
                        'prd_produkID' => $pelembab->produkID,
                        'jumlahProduk' => 2,
                        'subTotalDecimal' => $pelembab->harga * 2,
                        'created_at' => Carbon::yesterday(),
                        'updated_at' => Carbon::yesterday(),
                    ],
                    [
                        'userID' => $user->id,
                        'penjualanID' => $penjualan->penjualanID,
                        'prd_produkID' => $airMineral->produkID,
                        'jumlahProduk' => 1,
                        'subTotalDecimal' => $airMineral->harga * 1,
                        'created_at' => Carbon::yesterday(),
                        'updated_at' => Carbon::yesterday(),
                    ],
                ]);
    }
}
