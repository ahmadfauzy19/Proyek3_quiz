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
        Schema::create('barang', function (Blueprint $table) {
            $table->increments('id_barang'); // Use increments() to create an auto-incrementing primary key
            $table->string('nama_barang');
            $table->string('satuan');
            $table->integer('harga_satuan');
            $table->integer('stok');
            $table->timestamps();
            
            // Set 'id_barang' as the primary key
            $table->primary('id_barang');
        });
    } // <-- Add this closing brace

    //  * Reverse the migrations.
    //  *
    public function down(): void
    {
        Schema::dropIfExists('barang');
    } 
};
