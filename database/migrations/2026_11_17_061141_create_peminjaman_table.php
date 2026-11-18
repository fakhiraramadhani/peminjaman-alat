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

        Schema::create('peminjaman', function (Blueprint $table) {
            $table->id();

            
            $table->unsignedBigInteger('id_alat');
            $table->unsignedBigInteger('id_peminjam');
            $table->integer('jumlah_pinjam');
            $table->date('tanggal_pinjam');
            $table->date('tanggal_kembali');
            $table->string('status');
            $table->date('tanggal_disetujui')->nullable(); // Disarankan nullable agar tidak error saat data awal masuk
            $table->timestamps();

            $table->foreign('id_alat')->references('id_alat')->on('alat')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('peminjaman', function (Blueprint $table) {
            $table->dropForeign(['id_alat']);
        });
        Schema::dropIfExists('peminjaman');
    }
};
