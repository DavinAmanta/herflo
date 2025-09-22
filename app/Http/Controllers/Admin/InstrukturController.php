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
    /**
     * Tampilkan daftar instruktur dan user yang bisa dipilih jadi instruktur
     */
    public function index()
    {
        $instrukturs = Instruktur::with('user')->get();

        // hanya ambil user dengan role "user" dan belum punya relasi instruktur
        $users = User::where('role', 'user')
            ->doesntHave('instruktur')
            ->get();

        return view('admin.instruktur.index', compact('instrukturs', 'users'));
    }

    /**
     * Simpan data instruktur baru
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'user_id' => 'required|exists:users,id',
            'no_hp'   => 'nullable|string|max:20',
            'alamat'  => 'nullable|string|max:255',
            'biaya'   => 'nullable|numeric',
            'foto'    => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if ($validator->fails()) {
            return redirect()->route('admin.instruktur.index')
                ->withErrors($validator)
                ->withInput();
        }

        DB::beginTransaction();
        try {
            // ubah role user ke instruktur
            $user = User::findOrFail($request->user_id);
            $user->role = 'instruktur';
            $user->save();

            // buat instruktur baru
            $instruktur = new Instruktur();
            $instruktur->user_id = $request->user_id;
            $instruktur->no_hp   = $request->no_hp;
            $instruktur->alamat  = $request->alamat;
            $instruktur->biaya   = $request->biaya;

            if ($request->hasFile('foto')) {
                $instruktur->foto = $request->file('foto')->store('instruktur-photos', 'public');
            }

            $instruktur->save();
            DB::commit();

            return redirect()->route('admin.instruktur.index')->with('success', 'Instruktur berhasil ditambahkan.');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->route('admin.instruktur.index')->with('error', 'Gagal menambahkan instruktur: ' . $e->getMessage());
        }
    }

    /**
     * Update data instruktur
     */
    public function update(Request $request, Instruktur $instruktur)
    {
        $validator = Validator::make($request->all(), [
            'no_hp'  => 'nullable|string|max:20',
            'alamat' => 'nullable|string|max:255',
            'biaya'  => 'nullable|numeric',
            'foto'   => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if ($validator->fails()) {
            return redirect()->route('admin.instruktur.index')
                ->withErrors($validator)
                ->withInput();
        }

        try {
            $instruktur->no_hp  = $request->no_hp;
            $instruktur->alamat = $request->alamat;
            $instruktur->biaya  = $request->biaya;

            if ($request->hasFile('foto')) {
                if ($instruktur->foto && Storage::disk('public')->exists($instruktur->foto)) {
                    Storage::disk('public')->delete($instruktur->foto);
                }
                $instruktur->foto = $request->file('foto')->store('instruktur-photos', 'public');
            }

            $instruktur->save();

            return redirect()->route('admin.instruktur.index')->with('success', 'Data instruktur berhasil diperbarui.');
        } catch (\Exception $e) {
            return redirect()->route('admin.instruktur.index')->with('error', 'Gagal update: ' . $e->getMessage());
        }
    }

    /**
     * Hapus data instruktur
     */
    public function destroy(Instruktur $instruktur)
    {
        DB::beginTransaction();
        try {
            if ($instruktur->foto && Storage::disk('public')->exists($instruktur->foto)) {
                Storage::disk('public')->delete($instruktur->foto);
            }

            $userId = $instruktur->user_id;
            $instruktur->delete();

            // kembalikan role user ke "user"
            $user = User::find($userId);
            if ($user) {
                $user->role = 'user';
                $user->save();
            }

            DB::commit();
            return redirect()->route('admin.instruktur.index')->with('success', 'Instruktur berhasil dihapus.');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->route('admin.instruktur.index')->with('error', 'Gagal menghapus: ' . $e->getMessage());
        }
    }
}
