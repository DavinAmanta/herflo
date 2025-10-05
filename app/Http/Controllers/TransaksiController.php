<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Instruktur;
use App\Models\JadwalKelas;
use App\Models\Member;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TransaksiController extends Controller
{
    public function dataBooking()
    {
        $member = Auth::user()->member;
        $bookings = Booking::where('member_id', $member->id)
            ->with(['jadwalKelas.instruktur.user'])
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        return view('user.booking_saya', compact('bookings'));
    }
    // 🔹 Menampilkan jadwal berdasarkan instruktur
    public function index($id)
    {
        $instruktur = Instruktur::with('user')->findOrFail($id);
        $jadwalKelas = JadwalKelas::where('instruktur_id', $id)->get();
        return view('user.pilih_jadwal', compact('instruktur', 'jadwalKelas'));
    }

    // 🔹 Proses booking langsung dari jadwal
    public function booking($id)
    {
        // Cek apakah user sudah terdaftar sebagai member
        $member = Member::where('user_id', Auth::id())->first();

        if (!$member) {
            return redirect()->route('member.dashboard')
                ->with('error', 'Anda belum terdaftar sebagai member.');
        }

        // Buat booking baru
        $booking = Booking::create([
            'member_id'       => $member->id,
            'jadwal_kelas_id' => $id,
            'tanggal'         => now()->toDateString(),
            'status'          => 'pending',
        ]);

        // Arahkan ke halaman pembayaran
        return redirect()->route('member.payment.index', $booking->id);
    }


    // 🔹 Simpan booking (kalau dari form manual)
    public function store(Request $request)
    {
        $member = Member::where('user_id', Auth::id())->first();
        if (!$member) {
            return redirect()->back()->with('error', 'Anda belum terdaftar sebagai member.');
        }

        $booking = Booking::create([
            'member_id'       => $member->id,
            'jadwal_kelas_id' => $request->jadwal_kelas_id,
            'tanggal'         => Carbon::today()->toDateString(),
            'status'          => 'pending',
            'status_bayar'    => 'belum_lunas'
        ]);

        return redirect()->route('member.payment.index', $booking->id);
    }

    // 🔹 Halaman pembayaran
    public function payment($id)
    {
        $booking = Booking::with('jadwalKelas.instruktur.user')->findOrFail($id);
        return view('user.payment', compact('booking'));
    }

    // 🔹 Proses pembayaran
    public function process(Request $request)
    {
        $booking = Booking::findOrFail($request->booking_id);
        $booking->update([
            'status_bayar' => 'lunas',
        ]);
        return redirect()->route('member.booking_saya')->with('success', 'Pembayaran berhasil!');
    }
}
