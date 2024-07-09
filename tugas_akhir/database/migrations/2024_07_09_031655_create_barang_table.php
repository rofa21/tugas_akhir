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
        Schema::create('barang', function (Blueprint $table) {
            $table->renameColumn('id', 'id_barang'); // Mengubah nama kolom 'id' menjadi 'id_barang'
            $table->string('nama');
            $table->string('merek');
            $table->string('gambar');
            $table->integer('stok_barang');
            $table->integer('ukuran');
            $table->string('warna');
            $table->decimal('harga', 10, 2);
            $table->text('deskripsi');
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('barang');
        $table->renameColumn('id_barang', 'id'); // Mengembalikan nama kolom 'id_barang' menjadi 'id'
    }
};
