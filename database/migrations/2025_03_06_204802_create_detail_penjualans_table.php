<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('detail_penjualans', function (Blueprint $table) {
            $table->id('detailID');
            $table->foreignId('userID')->constrained('users', 'id')->onDelete('cascade');
            $table->foreignId('penjualanID')->constrained('penjualans', 'penjualanID')->onDelete('cascade');
            $table->foreignId('prd_produkID')->constrained('produks', 'produkID');
            $table->integer('jumlahProduk');
            $table->integer('subTotalDecimal');
            $table->timestamps();
 
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detail_penjualans');
    }
};
