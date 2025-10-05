<?php

namespace App\Http\Controllers;

use App\Models\Member;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Date;

class DaftarController extends Controller
{
    public function index()
    {
        return view('user.Member');
    }

    public function create()
    {
        return view('user.daftarMember');
    }

    public function store(Request $request)
    {
        $request->validate([
            'no_hp' => 'required',
            'nik'     => 'required|unique:members,nik',
            'alamat'  => 'nullable|string',
            'paket'   => 'required|in:1 Bulan,3 Bulan,8 Bulan',
        ], [
            'no_hp.required' => 'Nomor telepon wajib diisi.',
            'nik.required'     => 'NIK wajib diisi.',
            'nik.unique'       => 'NIK ini sudah terdaftar sebagai member.',
            'alamat.string'    => 'Alamat harus berupa teks yang valid.',
            'paket.required'   => 'Silakan pilih salah satu paket member.',
            'paket.in'         => 'Pilihan paket tidak valid. Pilih antara 1 Bulan, 3 Bulan, atau 8 Bulan.',
        ]);

        $user_id = Auth::id();

        $sudahMember = Member::where('user_id', $user_id)->exists();
        if ($sudahMember) {
            return back()->with('error', 'Kamu sudah terdaftar sebagai member.');
        }
        $tgl_daftar = Carbon::now();
        switch ($request->paket) {
            case '1 Bulan':
                $tgl_berakhir = $tgl_daftar->copy()->addMonth();
                break;
            case '3 Bulan':
                $tgl_berakhir = $tgl_daftar->copy()->addMonths(3);
                break;
            case '8 Bulan':
                $tgl_berakhir = $tgl_daftar->copy()->addMonths(8);
                break;
            default:
                $tgl_berakhir = $tgl_daftar;
        }

        $member = Member::create([
            'user_id'      => $user_id,
            'no_hp'        => $request->no_hp,
            'nik'          => $request->nik,
            'alamat'       => $request->alamat,
            'paket'        => $request->paket,
            'status_bayar' => 'belum_lunas',
            'tgl_daftar'   => $tgl_daftar->toDateString(),
            'tgl_berakhir' => $tgl_berakhir->toDateString(),
        ]);

        User::where('id', $user_id)->update(['role' => 'member']);
        return redirect()->route('daftar.edit', $member->id)->with('success', 'Berhasil daftar menjadi member. Silakan lanjutkan ke pembayaran.');
    }

    public function show(string $id)
    {
        //
    }

    public function edit(string $id)
    {
        $member = Member::findOrFail($id);
        $hargaPaket = match ($member->paket) {
            '1 Bulan' => 250000,
            '3 Bulan' => 600000,
            '8 Bulan' => 850000,
            default => 0,
        };
        return view('user.bayarMember', [
            'member' => $member,
            'paket' => (object) [
            'nama' => $member->paket,
            'harga' => $hargaPaket,
            'durasi' => $member->paket
            ]
        ]);
    }

    public function update(Request $request, string $id)
    {
        $member = Member::FindOrFail($id);
        $member->update([
            'status_bayar'  => 'lunas'
        ]);
        return redirect()->route('home')->with('success','Berhasil Mendaftar Sebagai Member');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
