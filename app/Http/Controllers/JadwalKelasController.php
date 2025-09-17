<?php

namespace App\Http\Controllers;

use App\Models\Instruktur;
use App\Models\JadwalKelas;
use Illuminate\Http\Request;

class JadwalKelasController extends Controller
{
    public function index()
    {
        $jadwal = JadwalKelas::with('instruktur.user')->get();
        $instruktur = Instruktur::with('user')->get();
        return view('admin.jadwal_kelas',compact('jadwal','instruktur'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_instruktur'   => 'required',
            'nama_kelas'      => 'required',
            'hari'            => 'required',
            'jam_mulai'       => 'required',
            'jam_selesai'     => 'required|afterOrEqual:jam_mulai',
        ],[
            'id_instruktur.required'  => 'Instruktur wajib diisi',
            'nama_kelas.required'     => 'Nama kelas wajib diisi',
            'hari.required'           => 'Hari wajib diisi',
            'jam_mulai.required'      => 'Jam mulai wajib diisi',
            'jam_selesai.required'    => 'Jam selesai wajib diisi',
            'jam_selesai.after_or_equal'   => 'Jam selesai harus sama atau lebih besar dari jam mulai',
        ]);

        JadwalKelas::create([
            'id_instruktur'     => $request->id_instruktur,
            'nama_kelas'        => $request->nama_kelas,
            'hari'              => $request->hari,
            'jam_mulai'         => $request->jam_mulai,
            'jam_selesai'       => $request->jam_selesai,
        ]);

        return redirect()->route('jadwal.index')->with('success','Berhasil Menambah Data Jadwal Kelas');
    }

    public function show(string $id)
    {
        //
    }

    public function edit(string $id)
    {
        //
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'id_instruktur'   => 'required',
            'nama_kelas'      => 'required',
            'hari'            => 'required',
            'jam_mulai'       => 'required',
            'jam_selesai'     => 'required|afterOrEqual:jam_mulai',
        ],[
            'id_instruktur.required'  => 'Instruktur wajib diisi',
            'nama_kelas.required'     => 'Nama kelas wajib diisi',
            'hari.required'           => 'Hari wajib diisi',
            'jam_mulai.required'      => 'Jam mulai wajib diisi',
            'jam_selesai.required'    => 'Jam selesai wajib diisi',
            'jam_selesai.after_or_equal'   => 'Jam selesai harus sama atau lebih besar dari jam mulai',
        ]);

        $jadwal = JadwalKelas::FindOrFail($id);
        $jadwal->update([
            'id_instruktur' => $request->id_instruktur,
            'nama_kelas'    => $request->nama_kelas,
            'hari'          => $request->hari,
            'jam_mulai'     => $request->jam_mulai,
            'jam_selesai'   => $request->jam_selesai,
        ]);
        return redirect()->route('jadwal.index')->with('success','Berhasil Memperbarui data Jadwal Kelas');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $jadwal = JadwalKelas::FindOrFail($id);
        $jadwal->delete();
        return redirect()->route('jadwal.index')->with('success','Berhasil Menghapus Jadwal');
    }
}
