<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\JadwalKelas;
use App\Models\Instruktur;
use Illuminate\Http\Request;

class JadwalController extends Controller
{
    public function index()
    {
        $jadwals = JadwalKelas::with('instruktur.user')->get();
        $instrukturs = Instruktur::with('user')->get();

        return view('admin.jadwal.index', compact('jadwals', 'instrukturs'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_kelas'    => 'required|string|max:255',
            'hari'          => 'required|string|max:50',
            'waktu'         => 'required',
            'instruktur_id' => 'nullable|exists:instruktur,id',
        ]);

        JadwalKelas::create($request->only(['nama_kelas','hari','waktu','instruktur_id']));

        return redirect()->route('admin.jadwal.index')
            ->with('success', 'Jadwal kelas berhasil ditambahkan.');
    }

    public function update(Request $request, JadwalKelas $jadwal)
    {
        $request->validate([
            'nama_kelas'    => 'required|string|max:255',
            'hari'          => 'required|string|max:50',
            'waktu'         => 'required',
            'instruktur_id' => 'nullable|exists:instruktur,id',
        ]);

        $jadwal->update($request->only(['nama_kelas','hari','waktu','instruktur_id']));

        return redirect()->route('admin.jadwal.index')
            ->with('success', 'Jadwal kelas berhasil diperbarui.');
    }

    public function destroy(JadwalKelas $jadwal)
    {
        $jadwal->delete();
        return redirect()->route('admin.jadwal.index')
            ->with('success', 'Jadwal kelas berhasil dihapus.');
    }
}
