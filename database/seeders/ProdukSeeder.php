<?php

namespace Database\Seeders;

use App\Models\Produk;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class produkSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Produk::insert([

            [
            'namaProduk' => 'Pelembab bibir',
            'harga' => '12000',
            'stok' => '20'
            ],

            [
            'namaProduk' => 'Air mineral',
            'harga' => '3000',
            'stok' => '10'
            ],

            [
            'namaProduk' => 'snack',
            'harga' => '3000',
            'stok' => '15'
            ],


        ]);
    }
}
