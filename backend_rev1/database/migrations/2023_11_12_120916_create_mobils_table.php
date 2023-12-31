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
        Schema::create('mobils', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('jenis_mobil');
            $table->integer('harga');
            $table->string('warna');
            $table->string('kondisi');
            $table->integer('stok');
            $table->integer('total_mobil');
            // $table->string('status');
            // $table->string('denda');
            // $table->string('denda_kondisi');
            $table->text('images');
            $table->foreignId('tempat_rental_id')->constrained('tempat_rentals');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mobils');
    }
};
