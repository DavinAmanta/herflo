<?php

namespace App\Models;

use App\Models\Member;
use App\Models\Instruktur;
use App\Models\PendaftaranMember;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $guarded = ['id'];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    // Relasi dengan PendaftaranMember (seorang user bisa memiliki banyak permintaan pendaftaran)
    public function pendaftaranMembers()
    {
        return $this->hasMany(PendaftaranMember::class);
    }

    // Relasi dengan Member (seorang user bisa menjadi member)
    public function member()
    {
        return $this->hasOne(Member::class);
    }

    public function instruktur()
{
    return $this->hasOne(Instruktur::class, 'user_id');
    // foreign key di tabel instruktur = user_id
}
}
