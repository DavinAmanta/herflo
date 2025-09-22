<?php

namespace App\Models;
use App\Models\Booking;
use App\Models\Instruktur;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class JadwalKelas extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    // Relasi ke Instruktur (sebuah kelas dimiliki oleh satu instruktur)
    public function instruktur()
    {
        return $this->belongsTo(Instruktur::class, 'instruktur_id');
    }

    // Relasi ke Booking (sebuah kelas bisa memiliki banyak booking)
     public function bookings()
    {
        return $this->hasMany(Booking::class, 'jadwal_kelas_id');
    }
}
