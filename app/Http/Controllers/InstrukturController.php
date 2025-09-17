<?php

namespace App\Http\Controllers;

use App\Models\Instruktur;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class InstrukturController extends Controller
{
    public function index()
    {
        $instruktur = Instruktur::with('user')->get();
        return view('admin.instruktur', compact('instruktur'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'    => 'required',
            'email'   => 'required|email|unique:users,email',
            'no_hp'   => 'required|string|max:15',
            'alamat'  => 'required|string',
            'biaya'   => 'required|string',
            'foto'    => 'required|mimes:jpg,jpeg,png|max:2048'
        ], [
            'name.required' => 'Nama wajib diisi',
            'email.required' => 'Email wajib diisi',
            'email.email' => 'Email tidak valid',
            'email.unique' => 'Email sudah terdaftar',
            'no_hp.required' => 'No. HP wajib diisi',
            'alamat.required' => 'Alamat wajib diisi',
            'biaya.required' => 'Biaya wajib diisi',
            'foto.required' => 'Foto wajib diisi',
            'foto.mimes' => 'File yang diunggah harus berupa gambar dengan format: jpg, jpeg, png',
            'foto.max' => 'Ukuran file gambar maksimal 2MB' 
        ]);
        $fotoPath = $request->file('foto')->store('instruktur', 'public');
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => md5('password'),
            'no_hp' => $request->no_hp,
            'alamat' => $request->alamat,
            'role' => 'instruktur'
        ]);
        Instruktur::create([
            'id_user' => User::latest()->first()->id,
            'biaya' => $request->biaya,
            'foto' => $fotoPath
        ]);
        return redirect()->back()->with('success', 'Instruktur berhasil ditambahkan');
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
            'name'    => 'required',
            'no_hp'   => 'required|string|max:15',
            'alamat'  => 'required|string',
            'biaya'   => 'required|string',
            'foto'    => 'nullable|mimes:jpg,jpeg,png|max:2048'
        ], [
            'name.required' => 'Nama wajib diisi',
            'no_hp.required' => 'No. HP wajib diisi',
            'alamat.required' => 'Alamat wajib diisi',
            'biaya.required' => 'Biaya wajib diisi',
            'foto.mimes' => 'File yang diunggah harus berupa gambar dengan format: jpg, jpeg, png',
            'foto.max' => 'Ukuran file gambar maksimal 2MB' 
        ]);
        $instruktur = Instruktur::findOrFail($id);
        if ($request->hasFile('foto')) {
            Storage::delete('public/'.$instruktur->foto);
            $fotoPath = $request->file('foto')->store('instruktur', 'public');
            $instruktur->update([
                'biaya' => $request->biaya,
                'foto' => $fotoPath
            ]);
        } else {
            $instruktur->update([
                'biaya' => $request->biaya
            ]);
        }
        $user = User::findOrFail($instruktur->id_user);
        $user->update([
            'name' => $request->name,
            'no_hp' => $request->no_hp,
            'alamat' => $request->alamat
        ]);
        return redirect()->back()->with('success', 'Instruktur berhasil diupdate');
    }

    public function destroy(string $id)
    {
        $instruktur = Instruktur::findOrFail($id);
        Storage::delete('public/'.$instruktur->foto);
        $user = User::findOrFail($instruktur->id_user);
        $user->delete();
        $instruktur->delete();
        return redirect()->back()->with('success', 'Instruktur berhasil dihapus');
    }
}
