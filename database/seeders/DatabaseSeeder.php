<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Database\Seeders\produkSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        User::factory()->create([
            'name' => 'Operator',
            'email' => 'test@example.com',
            'password' => '12312311'
        ]);

        $this->call([
            Produkseeder::class,
            PenjualanSeeder::class
        ]);

    }
}
