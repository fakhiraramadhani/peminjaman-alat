<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $table = 'user';
    protected $primaryKey = 'id_user';

    protected $fillable = [
        'nama_user',
        'username',
        'password',
        'nama_role',
        'no_telp',
    ];

    protected $hidden = [
        'password',
    ];

    // Menggunakan username untuk identitas login
    public function getAuthIdentifierName()
    {
        return 'username';
    }

    // Relasi dengan tabel peminjaman
    public function peminjaman()
    {
        return $this->hasMany(
            Peminjaman::class,
            'id_peminjam',
            'id_user'
        );
    }

    // Relasi dengan tabel log aktivitas
    public function logAktivitas()
    {
        return $this->hasMany(
            LogAktivitas::class,
            'id_user',
            'id_user'
        );
    }
}