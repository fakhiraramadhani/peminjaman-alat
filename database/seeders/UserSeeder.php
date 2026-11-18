<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('user')->insert([
            [
                'nama_user'  => 'Administrator Utama',
                'username'   => 'admin',
                'password'   => Hash::make('password123'),
                'nama_role'  => 'admin',
                'no_telp'    => '081234567890',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_user'  => 'Budi Santoso',
                'username'   => 'budi_peminjam',
                'password'   => Hash::make('password123'),
                'nama_role'  => 'peminjam',
                'no_telp'    => '089876543210',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
