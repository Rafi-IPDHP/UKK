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
        Schema::create('peminjamans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users');
            $table->foreignId('mobil_id')->constrained('mobils');
            $table->date('tanggal_pinjam');
            $table->time('jam_pinjam');
            $table->date('rencana_tanggal_kembali');
            $table->time('rencana_jam_kembali');
            $table->string('denda_waktu');
            $table->string('denda_kondisi');
            $table->string('status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('peminjamen');
    }
};
