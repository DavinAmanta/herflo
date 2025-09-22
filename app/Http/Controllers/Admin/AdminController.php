<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Member;
use App\Models\Instruktur;
use App\Models\Booking;
use App\Models\PendaftaranMember;

class AdminController extends Controller
{
    public function dashboard()
    {
        return view('admin.dashboard', [
            'totalUser' => User::count(),
            'totalMember' => Member::count(),
            'totalInstruktur' => Instruktur::count(),
            'totalBooking' => Booking::count(),
            'pendingPendaftaran' => PendaftaranMember::where('status_pendaftaran', 'pending')->count(),
        ]);
    }
}
