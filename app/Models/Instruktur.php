<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Instruktur extends Model
{
    protected $fillable = [
        'id',
        'id_user',
        'biaya',
        'foto'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user', 'id');
    }

    public function jadwalKelas()
    {
        return $this->hasMany(JadwalKelas::class, 'id_instruktur', 'id');
    }
}
