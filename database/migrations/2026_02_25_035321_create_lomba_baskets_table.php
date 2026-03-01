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
        Schema::create('lomba_baskets', function (Blueprint $table) {
            $table->id();
            $table->string('nama_tim');
            $table->string('pelatih');
            $table->integer('jumlah_pemain');
            $table->integer('skor')->nullable();                       // Bisa kosong
            $table->date('tanggal_pertandingan')->nullable();          // Bisa kosong
            $table->string('asal_sekolah')->nullable();                // Tambahan kolom
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lomba_baskets');
    }
};