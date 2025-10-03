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
        $instrukturs = Instruktur::with('user')->get();
        return view('user.trainer', compact('instrukturs'));
    }

    public function create()
    {
        return view('admin.instruktur.create');
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
        ]);

        $fotoPath = $request->file('foto')->store('instruktur', 'public');

        // ✅ langsung simpan dan ambil id user
        $user = User::create([
            'name'     => $request->name,
            'email'    => $request->email,
            'password' => Hash::make('password'), // lebih aman
            'no_hp'    => $request->no_hp,
            'alamat'   => $request->alamat,
            'role'     => 'instruktur'
        ]);

        Instruktur::create([
            'id_user' => $user->id,
            'biaya'   => $request->biaya,
            'foto'    => $fotoPath
        ]);

        return redirect()->back()->with('success', 'Instruktur berhasil ditambahkan');
    }

    public function edit(string $id)
    {
        $instruktur = Instruktur::with('user')->findOrFail($id);
        return view('admin.instruktur.edit', compact('instruktur'));
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'name'    => 'required',
            'no_hp'   => 'required|string|max:15',
            'alamat'  => 'required|string',
            'biaya'   => 'required|string',
            'foto'    => 'nullable|mimes:jpg,jpeg,png|max:2048'
        ]);

        $instruktur = Instruktur::findOrFail($id);

        // ✅ Update foto jika ada
        if ($request->hasFile('foto')) {
            if ($instruktur->foto && Storage::disk('public')->exists($instruktur->foto)) {
                Storage::disk('public')->delete($instruktur->foto);
            }
            $fotoPath = $request->file('foto')->store('instruktur', 'public');
            $instruktur->update([
                'biaya' => $request->biaya,
                'foto'  => $fotoPath
            ]);
        } else {
            $instruktur->update([
                'biaya' => $request->biaya
            ]);
        }

        // ✅ Update data user terkait
        $user = User::findOrFail($instruktur->id_user);
        $user->update([
            'name'   => $request->name,
            'no_hp'  => $request->no_hp,
            'alamat' => $request->alamat
        ]);

        return redirect()->back()->with('success', 'Instruktur berhasil diupdate');
    }

    public function destroy(string $id)
    {
        $instruktur = Instruktur::findOrFail($id);

        if ($instruktur->foto && Storage::disk('public')->exists($instruktur->foto)) {
            Storage::disk('public')->delete($instruktur->foto);
        }

        $user = User::findOrFail($instruktur->id_user);
        $user->delete();
        $instruktur->delete();

        return redirect()->back()->with('success', 'Instruktur berhasil dihapus');
    }
}
