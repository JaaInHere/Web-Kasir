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
            $table->foreignId('userID')->constrained('users', 'id');
            $table->foreignId('penjualanID')->constrained('penjualans', 'penjualanID');
            $table->foreignId('prd_produkID')->constrained('produks', 'produkID');
            $table->integer('jumlahProduk');
            $table->integer('subTotalDecimal');
            $table->timestamps();

            $table->foreign('userID')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('penjualanID')->references('penjualanID')->on('penjualans')->onDelete('cascade'); 

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
