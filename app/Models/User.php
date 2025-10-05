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

    public function pendaftaranMembers()
    {
        return $this->hasMany(PendaftaranMember::class);
    }
    public function member()
    {
        return $this->hasOne(Member::class);
    }

    public function instruktur()
    {
        return $this->hasOne(\App\Models\Instruktur::class, 'id_user');
    }
}
