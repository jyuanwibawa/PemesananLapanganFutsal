<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    protected $table = 'booking';

    protected $fillable = [
        'id_pengguna',
        'id_lapangan',
        'tanggal_booking',
        'jam_mulai',
        'jam_selesai',
        'status',
    ];

    public function pengguna()
    {
        return $this->belongsTo(Pengguna::class, 'id_pengguna');
    }

    public function lapangan()
    {
        return $this->belongsTo(Lapangan::class, 'id_lapangan');
    }

    public function pembayaran()
    {
        return $this->hasOne(Pembayaran::class, 'id_booking');
    }
}
