<?php

namespace App\Http\Controllers\Instruktur;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\JadwalKelas;
use App\Models\Booking;

class InstrukturController extends Controller
{
    // Dashboard instruktur
    public function dashboard() {
        $instruktur = auth()->user()->instruktur;

        // Ambil jadwal instruktur login saja
        $jadwals = JadwalKelas::where('instruktur_id', $instruktur->id)
                    ->withCount('bookings')
                    ->get();

        $totalJadwal = $jadwals->count();
        $totalBooking = $jadwals->sum('bookings_count');

        return view('instruktur.dashboard', compact('jadwals','totalJadwal','totalBooking'));
    }

    // Menampilkan jadwal instruktur
    public function jadwal() {
        $instruktur = auth()->user()->instruktur;

        $jadwals = JadwalKelas::where('instruktur_id', $instruktur->id)->get();

        return view('instruktur.jadwal', compact('jadwals'));
    }

    // Lihat booking pada jadwal tertentu
    public function booking($id) {
        $instruktur = auth()->user()->instruktur;

        // Pastikan hanya jadwal instruktur login yang bisa diakses
        $jadwal = JadwalKelas::where('id', $id)
                    ->where('instruktur_id', $instruktur->id)
                    ->firstOrFail();

        $bookings = Booking::where('jadwal_kelas_id', $jadwal->id)
                    ->with('member.user')
                    ->get();

        return view('instruktur.booking', compact('jadwal','bookings'));
    }

    // Update kehadiran member
    public function updateKehadiran(Request $request, $id) {
        $instruktur = auth()->user()->instruktur;

        $jadwal = JadwalKelas::where('id', $id)
                    ->where('instruktur_id', $instruktur->id)
                    ->firstOrFail();

        if ($request->kehadiran && is_array($request->kehadiran)) {
            foreach($request->kehadiran as $bookingId => $status){
                $booking = Booking::where('id', $bookingId)
                            ->where('jadwal_kelas_id', $jadwal->id)
                            ->first();
                if($booking){
                    $booking->update(['status_kehadiran' => $status]);
                }
            }
        }

        return redirect()->route('instruktur.jadwal')
                         ->with('success','Kehadiran berhasil diperbarui');
    }
}
