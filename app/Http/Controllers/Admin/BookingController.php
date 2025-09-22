<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\Member;
use App\Models\JadwalKelas;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    public function index()
    {
        $bookings = Booking::with(['member', 'jadwalKelas'])->latest()->get();
        return view('admin.booking.index', compact('bookings'));
    }

    public function create()
    {
        $members = Member::all();
        $jadwalKelas = JadwalKelas::all();
        return view('admin.booking.create', compact('members', 'jadwalKelas'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'member_id' => 'required|exists:members,id',
            'jadwal_kelas_id' => 'required|exists:jadwal_kelas,id',
            'tanggal' => 'required|date',
        ]);

        Booking::create($request->all());

        return redirect()->route('admin.booking.index')->with('success', 'Booking berhasil ditambahkan.');
    }

    public function edit(Booking $booking)
    {
        $members = Member::all();
        $jadwalKelas = JadwalKelas::all();
        return view('admin.booking.edit', compact('booking', 'members', 'jadwalKelas'));
    }

    public function update(Request $request, Booking $booking)
    {
        $request->validate([
            'member_id' => 'required|exists:members,id',
            'jadwal_kelas_id' => 'required|exists:jadwal_kelas,id',
            'tanggal' => 'required|date',
            'status' => 'required|in:pending,approved,rejected',
        ]);

        $booking->update($request->all());

        return redirect()->route('admin.booking.index')->with('success', 'Booking berhasil diperbarui.');
    }

    public function destroy(Booking $booking)
    {
        $booking->delete();
        return redirect()->route('admin.booking.index')->with('success', 'Booking berhasil dihapus.');
    }

    public function approve(Booking $booking)
    {
        $booking->update(['status' => 'approved']);
        return redirect()->route('admin.booking.index')->with('success', 'Booking disetujui.');
    }

    public function reject(Booking $booking)
    {
        $booking->update(['status' => 'rejected']);
        return redirect()->route('admin.booking.index')->with('success', 'Booking ditolak.');
    }
}
