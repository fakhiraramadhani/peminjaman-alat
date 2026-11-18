<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KategoriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       DB::table('kategoris')->insert([
            'nama_kategori' => 'elektronik',
            'deskripsi' => 'alat ada 150',
             'created_at' => now(),
             'updated_at' => now(),
       ]);

    }
}
