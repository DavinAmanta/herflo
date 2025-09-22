<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Instruktur;
use App\Models\User;

class InstrukturSeeder extends Seeder
{
    public function run(): void
    {
        $user1 = User::where('email', 'instruktur1@example.com')->first();
        $user2 = User::where('email', 'instruktur2@example.com')->first();

        Instruktur::create([
            'user_id' => $user1->id,
            'no_hp' => '08123456789',
            'alamat' => 'Jl. Raya No. 1',
            'biaya' => 150000,
            'foto' => null,
        ]);

        Instruktur::create([
            'user_id' => $user2->id,
            'no_hp' => '08987654321',
            'alamat' => 'Jl. Melati No. 2',
            'biaya' => 200000,
            'foto' => null,
        ]);
    }
}
