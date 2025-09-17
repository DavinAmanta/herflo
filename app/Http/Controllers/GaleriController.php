<?php

namespace App\Http\Controllers;

use App\Models\Galeri;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class GaleriController extends Controller
{
    public function index()
    {
        $galeri = Galeri::all();
        return view('admin.galeri', compact('galeri'));

    }

    public function create()
    {
        
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul'        => 'required',
            'deskripsi'    => 'required',
            'gambar'       => 'required|mimes:jpg,jpeg,png|max:2048'
        ], [
            'judul.required' => 'Judul wajib diisi',
            'deskripsi.required' => 'Deskripsi wajib diisi',
            'gambar.required' => 'Gambar wajib diisi',
            'gambar.mimes' => 'File yang diunggah harus berupa gambar dengan format: jpg, jpeg, png',
            'gambar.max' => 'Ukuran file gambar maksimal 2MB'
        ]);

        $gambarPath = $request->file('gambar')->store('galeri', 'public');
        Galeri::create([
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi,
            'gambar' => $gambarPath
        ]);
        return redirect()->back()->with('success', 'Gambar berhasil ditambahkan');
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
            'judul'        => 'required',
            'deskripsi'    => 'required',
            'gambar'       => 'nullable|mimes:jpg,jpeg,png|max:2048'
        ], [
            'judul.required' => 'Judul wajib diisi',
            'deskripsi.required' => 'Deskripsi wajib diisi',
            'gambar.mimes' => 'File yang diunggah harus berupa gambar dengan format: jpg, jpeg, png',
            'gambar.max' => 'Ukuran file gambar maksimal 2MB'
        ]);

        $galeri = Galeri::findOrFail($id);

        $galeri->update([
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi,
        ]);

        if ($request->hasFile('gambar')) {
            if ($galeri->gambar && Storage::disk('public')->exists($galeri->gambar)) {
                Storage::disk('public')->delete($galeri->gambar);
            }
            $gambarPath = $request->file('gambar')->store('galeri', 'public');
            $galeri->gambar = $gambarPath;
        }

        $galeri->judul = $request->judul;
        $galeri->deskripsi = $request->deskripsi;
        $galeri->save();

        return redirect()->back()->with('success', 'Galeri berhasil diperbarui');
    }

    public function destroy(string $id)
    {
        $galeri = Galeri::findOrFail($id);
        if ($galeri->gambar && Storage::disk('public')->exists($galeri->gambar)) {
            Storage::disk('public')->delete($galeri->gambar);
        }
        $galeri->delete();

        return redirect()->back()->with('success', 'Gambar berhasil dihapus');
    }

}
