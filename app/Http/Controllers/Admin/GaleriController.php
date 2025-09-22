<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Galeri;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class GaleriController extends Controller
{
    /**
     * Tampilkan semua data galeri
     */
    public function index()
    {
        $galeri = Galeri::latest()->get();
        return view('admin.galeri.index', compact('galeri'));
    }

    /**
     * Form tambah galeri
     */
    public function create()
    {
        return view('admin.galeri.create');
    }

    /**
     * Simpan data galeri baru
     */
    public function store(Request $request)
    {
        $request->validate([
            'judul'     => 'required|string|max:100',
            'deskripsi' => 'required|string',
            'gambar'    => 'required|mimes:jpg,jpeg,png|max:2048'
        ], [
            'judul.required'     => 'Judul wajib diisi',
            'deskripsi.required' => 'Deskripsi wajib diisi',
            'gambar.required'    => 'Gambar wajib diisi',
            'gambar.mimes'       => 'File harus berupa gambar jpg, jpeg, atau png',
            'gambar.max'         => 'Ukuran file maksimal 2MB'
        ]);

        $path = $request->file('gambar')->store('galeri', 'public');

        Galeri::create([
            'judul'     => $request->judul,
            'deskripsi' => $request->deskripsi,
            'gambar'    => $path
        ]);

        return redirect()->route('admin.galeri.index')->with('success', 'Galeri berhasil ditambahkan');
    }

    /**
     * Form edit galeri
     */
    public function edit(string $id)
    {
        $galeri = Galeri::findOrFail($id);
        return view('admin.galeri.edit', compact('galeri'));
    }

    /**
     * Update data galeri
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'judul'     => 'required|string|max:100',
            'deskripsi' => 'required|string',
            'gambar'    => 'nullable|mimes:jpg,jpeg,png|max:2048'
        ], [
            'judul.required'     => 'Judul wajib diisi',
            'deskripsi.required' => 'Deskripsi wajib diisi',
            'gambar.mimes'       => 'File harus berupa gambar jpg, jpeg, atau png',
            'gambar.max'         => 'Ukuran file maksimal 2MB'
        ]);

        $galeri = Galeri::findOrFail($id);

        // Update data tanpa gambar dulu
        $galeri->update([
            'judul'     => $request->judul,
            'deskripsi' => $request->deskripsi,
        ]);

        // Jika ada gambar baru
        if ($request->hasFile('gambar')) {
            if ($galeri->gambar && Storage::disk('public')->exists($galeri->gambar)) {
                Storage::disk('public')->delete($galeri->gambar);
            }
            $path = $request->file('gambar')->store('galeri', 'public');
            $galeri->update(['gambar' => $path]);
        }

        return redirect()->route('admin.galeri.index')->with('success', 'Galeri berhasil diperbarui');
    }

    /**
     * Hapus galeri
     */
    public function destroy(string $id)
    {
        $galeri = Galeri::findOrFail($id);

        if ($galeri->gambar && Storage::disk('public')->exists($galeri->gambar)) {
            Storage::disk('public')->delete($galeri->gambar);
        }

        $galeri->delete();
        return redirect()->route('admin.galeri.index')->with('success', 'Galeri berhasil dihapus');
    }
}
