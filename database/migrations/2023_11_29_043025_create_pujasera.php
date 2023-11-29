<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        // Tabel Barang
        Schema::create('barang', function (Blueprint $table) {
            $table->id(); // Mengganti increments dan membuat primary key secara otomatis
            $table->string('nama_barang');
            $table->string('satuan');
            $table->integer('harga_satuan');
            $table->integer('stok');
            $table->timestamps();
        });

        // Tabel Kasir
        Schema::create('kasir', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('hp');
            $table->timestamps();
        });

        // Tabel Tenan
        Schema::create('tenan', function (Blueprint $table) {
            $table->id();
            $table->string('nama_tenan');
            $table->string('hp');
            $table->timestamps();
        });

        // Tabel Nota
        Schema::create('nota', function (Blueprint $table) {
            $table->id();
            $table->foreignId('kode_tenan')->constrained('tenan');
            $table->foreignId('kode_kasir')->constrained('kasir');
            $table->date('tgl_nota');
            $table->time('jam_nota');
            $table->integer('jumlah_belanja');
            $table->integer('diskon');
            $table->integer('total');
            $table->timestamps();
        });

        // Tabel BarangNota
        Schema::create('barang_nota', function (Blueprint $table) {
            $table->foreignId('kode_nota')->constrained('nota');
            $table->foreignId('kode_barang')->constrained('barang');
            $table->integer('jumlah_barang');
            $table->integer('harga_satuan');
            $table->integer('jumlah');
            $table->timestamps();
            $table->primary(['kode_nota', 'kode_barang']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::dropIfExists('barang');
        Schema::dropIfExists('kasir');
        Schema::dropIfExists('tenan');
        Schema::dropIfExists('nota');
        Schema::dropIfExists('barang_nota');
    }
};
