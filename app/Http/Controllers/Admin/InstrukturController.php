<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Instruktur;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class InstrukturController extends Controller
{
    public function index()
    {
        $instrukturs = Instruktur::with('user')->get();
        return view('admin.instruktur.index', compact('instrukturs'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'     => 'required',
            'email'    => 'required|email|unique:users,email',
            'password' => 'required',
            'biaya'    => 'required|numeric',
            'foto'     => 'required|mimes:jpg,jpeg,png|max:2048',
        ],[
            'name.required'     => 'Nama wajib diisi.',
            'email.required'    => 'Email wajib diisi.',
            'email.email'       => 'Format email tidak valid.',
            'email.unique'      => 'Email sudah digunakan, silakan pakai email lain.',
            'password.required' => 'Password wajib diisi.',
            'biaya.required'    => 'Biaya wajib diisi.',
            'biaya.numeric'     => 'Biaya harus berupa angka.',
            'foto.required'     => 'Foto wajib diunggah.',
            'foto.mimes'        => 'Format gambar harus jpg, jpeg, atau png.',
            'foto.max'          => 'Ukuran gambar maksimal 2MB.',
        ]);

        $fotoName = time().'.'.$request->foto->extension();
        $request->foto->move(public_path('uploads/instrukturs'), $fotoName);

        $user = User::create([
            'name'     => $request->name,
            'email'    => $request->email,
            'password' => bcrypt($request->password),
            'role'     => 'instruktur',
        ]);

        Instruktur::create([
            'id_user' => $user->id,
            'biaya'   => $request->biaya,
            'foto'    => $fotoName,
        ]);

        return redirect()->route('admin.instruktur.index')->with('success', 'Instruktur berhasil ditambahkan');
    }

    public function update(Request $request, Instruktur $instruktur)
    {
        $request->validate([
            'name'  => 'required|string|max:100',
            'biaya' => 'required|numeric',
            'foto'  => 'nullable|mimes:jpg,jpeg,png|max:2048',
        ],[
            'name.required'  => 'Nama wajib diisi.',
            'biaya.required' => 'Biaya wajib diisi.',
            'biaya.numeric'  => 'Biaya harus berupa angka.',
            'foto.mimes'     => 'Format gambar harus jpg, jpeg, atau png.',
            'foto.max'       => 'Ukuran gambar maksimal 2MB.',
        ]);

        $user = $instruktur->user;
        $user->name = $request->name;
        $user->save();

        $instruktur->biaya = $request->biaya;

        // jika ada foto baru
        if ($request->hasFile('foto')) {
            // hapus foto lama jika ada
            $oldFoto = public_path('uploads/instrukturs/'.$instruktur->foto);
            if ($instruktur->foto && file_exists($oldFoto)) {
                unlink($oldFoto);
            }

            $fotoName = time().'.'.$request->foto->extension();
            $request->foto->move(public_path('uploads/instrukturs'), $fotoName);

            $instruktur->foto = $fotoName;
        }
        $instruktur->save();

        return redirect()->route('admin.instruktur.index')->with('success', 'Instruktur berhasil diperbarui');
    }


    /**
     * Hapus data instruktur
     */
    public function destroy(Instruktur $instruktur)
    {
        $oldFoto = public_path('uploads/instrukturs/'.$instruktur->foto);
        if ($instruktur->foto && file_exists($oldFoto)) {
            unlink($oldFoto);
        }
        $instruktur->delete();
        $instruktur->user->delete();
        return redirect()->route('admin.instruktur.index')->with('success', 'Instruktur berhasil dihapus');
    }
}
