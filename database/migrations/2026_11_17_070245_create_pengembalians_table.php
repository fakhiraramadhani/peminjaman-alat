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
        Schema::create('pengembalians', function (Blueprint $table) {
            $table->id();

            // 1. Ubah dari $table->id('id_peminjaman') menjadi unsignedBigInteger
            $table->unsignedBigInteger('id_peminjaman');

            $table->date('tanggal_pinjam');
            $table->date('tanggal_kembali');
            $table->string('kondisi');
            $table->string('denda');
            $table->timestamps();

            // 2. Pastikan references mengarah ke kolom 'id' milik tabel 'peminjaman'
            $table->foreign('id_peminjaman')->references('id')->on('peminjaman')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pengembalians');
    }
};
