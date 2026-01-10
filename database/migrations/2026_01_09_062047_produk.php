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
        Schema::create('Produk', function (Blueprint $table) {
            $table->string('id_produk', 7)->primary();
            $table->string('nama_produk');
            $table->string('id_kategori', 7);
            $table->decimal('harga', 12, 2)->default(0);
            $table->integer('stok');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('Produk');
    }
};
