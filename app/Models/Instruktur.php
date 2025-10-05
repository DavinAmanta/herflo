<?php

namespace App\Models;

use App\Models\User;
use App\Models\JadwalKelas;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Instruktur extends Model
{
    use HasFactory;

    protected $table = 'instrukturs';
    protected $guarded = ['id'];
    protected $fillable = [
        'id_user',
        'foto',
        'biaya',
        'no_hp',
        'alamat'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }

    public function jadwals()
    {
        return $this->hasMany(JadwalKelas::class, 'instruktur_id');
    }

    public function bookings()
    {
        return $this->hasMany(Booking::class, 'jadwal_kelas_id');
    }
}
