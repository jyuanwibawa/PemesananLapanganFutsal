<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Lapangan extends Model
{
    protected $table = 'lapangan';

    protected $fillable = [
        'nama_lapangan',
        'deskripsi',
        'gambar',
        'harga_per_jam',
        'status_aktif',
    ];

    public function fasilitas()
    {
        return $this->hasMany(Fasilitas::class, 'id_lapangan');
    }

    public function bookings()
    {
        return $this->hasMany(Booking::class, 'id_lapangan');
    }
}
