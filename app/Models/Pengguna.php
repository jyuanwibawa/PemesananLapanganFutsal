<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Pengguna extends Authenticatable
{
    use Notifiable, HasFactory;

    protected $table = 'pengguna';

    protected $fillable = [
        'nama',
        'email',
        'password',
        'peran',
    ];

    protected $hidden = [
        'password',
        'remember_token', // jika pakai auth default Laravel
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'peran' => 'string',
    ];

    /**
     * Relasi ke tabel bookings.
     */
    public function bookings()
    {
        return $this->hasMany(Booking::class, 'id_pengguna');
    }

    /**
     * Relasi ke tabel pembayaran.
     */
    public function pembayaran()
    {
        return $this->hasMany(Pembayaran::class, 'id_pengguna');
    }
}
