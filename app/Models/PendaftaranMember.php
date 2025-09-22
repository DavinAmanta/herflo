<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PendaftaranMember extends Model
{
    use HasFactory;

    protected $table = 'pendaftaran_members';
    protected $guarded = ['id'];

    // Relasi ke User (setiap permintaan dimiliki oleh satu user)
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
