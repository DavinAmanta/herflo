<?php

namespace App\Models;

use App\Models\User;
use App\Models\JadwalKelas;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Instruktur extends Model
{
    use HasFactory;

    protected $table = 'instruktur';
    protected $guarded = ['id'];

    public function user()
{
    return $this->belongsTo(User::class, 'user_id');
    // foreign key instruktur.user_id → users.id
}


    // Relasi ke JadwalKelas (seorang instruktur bisa memiliki banyak jadwal kelas)
     public function jadwals()
    {
        // Ambil semua jadwal yang diampu instruktur login
        $jadwals = JadwalKelas::where('instruktur_id', auth()->id())
                    ->orderBy('hari')
                    ->orderBy('waktu')
                    ->get();

        return view('instruktur.jadwal', compact('jadwals'));
    }
}
