<?php

namespace App\Models;

use App\Models\User;
use App\Models\Booking;
use App\Models\Testimoni;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Member extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    // Relasi ke User (seorang member adalah seorang user)
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Relasi ke Booking (seorang member bisa membuat banyak booking)
    public function booking()
    {
        return $this->hasMany(Booking::class);
    }

    // Relasi ke Testimoni (seorang member bisa memberikan banyak testimoni)
    public function testimoni()
    {
        return $this->hasMany(Testimoni::class);
    }
}
