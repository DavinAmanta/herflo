<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class JadwalKelas extends Model
{
    protected $fillable = [
        'id',
        'id_instruktur',
        'nama_kelas',
        'hari',
        'jam_mulai',
        'jam_selesai'
    ];

    public function instruktur()
    {
        return $this->belongsTo(Instruktur::class, 'id_instruktur', 'id');
    }
}
