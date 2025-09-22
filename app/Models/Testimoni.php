<?php

namespace App\Models;

use App\Models\Member;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Testimoni extends Model
{
    use HasFactory;
     protected $table = 'testimoni'; 
    protected $guarded = ['id'];

    // Relasi ke Member (testimoni ini dibuat oleh satu member)
    public function member()
    {
        return $this->belongsTo(Member::class);
    }
}
