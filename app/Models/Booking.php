<?php

namespace App\Models;

use App\Models\Member;
use App\Models\JadwalKelas;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Booking extends Model
{
    use HasFactory;

    protected $table = 'booking';
    protected $guarded = ['id'];

    // Relasi ke Member (booking ini milik satu member)
    public function member()
    {
        return $this->belongsTo(Member::class);
    }

    // Relasi ke JadwalKelas (booking ini untuk satu jadwal kelas)
    public function jadwalKelas()
    {
        return $this->belongsTo(JadwalKelas::class);
    }
}
