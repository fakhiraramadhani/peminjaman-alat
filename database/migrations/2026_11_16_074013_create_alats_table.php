<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('alat', function (Blueprint $table) {
            $table->id('id_alat');
            $table->string('nama_alat');
            $table->unsignedBigInteger('id_kategori');
            $table->text('deskripsi_alat')->nullable();
            $table->integer('total_stok')->default(0);
            $table->integer('stok_yang_tersedia')->default(0);
            $table->timestamps();

            
            $table->foreign('id_kategori')->references('id_kategori')->on('kategori')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('alat');
    }
};
