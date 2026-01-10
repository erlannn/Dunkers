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
        Schema::create('Detail_Transaksi', function (Blueprint $table) {
            $table->string('id_detail', 7)->primary();
            $table->string('id_transaksi', 7);
            $table->string('id_produk', 7);
            $table->string('nama_produk');
            $table->integer('jumlah');
            $table->decimal('total_harga', 12, 2)->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('Detail_Transaksi');
    }
};
