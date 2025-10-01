<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DaftarMember extends Model
{
    protected $fillable = [
        'id_user',
        'no_hp',
        'alamat',
        'tgl_daftar',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user', 'id_user');
    }
}
