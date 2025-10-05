<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Member;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;

class MemberController extends Controller
{
    public function index()
    {
        $members = Member::with('user')->get();
        return view('admin.member.index', compact('members'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'      => 'required|string|max:255',
            'email'     => 'required|email|unique:users,email',
            'password'  => 'required',
            'no_hp'     => 'required|string|max:20',
            'alamat'    => 'required|string',
            'nik'       => 'nullable|string|max:20|unique:members,nik',
            'paket'     => 'required|in:1 Bulan,3 Bulan,8 Bulan',
        ], [
            'name.required'      => 'Nama wajib diisi.',
            'email.required'     => 'Email wajib diisi.',
            'email.email'        => 'Format email tidak valid.',
            'email.unique'       => 'Email sudah digunakan.',
            'password.required'  => 'Password wajib diisi.',
            'no_hp.required'     => 'Nomor HP wajib diisi.',
            'alamat.required'    => 'Alamat wajib diisi.',
            'nik.unique'         => 'NIK sudah terdaftar sebagai member.',
            'paket.required'     => 'Pilih salah satu paket member.',
            'paket.in'           => 'Pilihan paket tidak valid (1 Bulan, 3 Bulan, 8 Bulan).',
        ]);

        // Tentukan tanggal daftar dan tanggal berakhir
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
                $tgl_berakhir = $tgl_daftar->copy();
        }

        $user = User::create([
            'name'      => $request->name,
            'email'     => $request->email,
            'password'  => Hash::make($request->password),
            'role'      => 'member',
        ]);

        Member::create([
            'user_id'      => $user->id,
            'nik'          => $request->nik,
            'no_hp'        => $request->no_hp,
            'alamat'       => $request->alamat,
            'paket'        => $request->paket,
            'status_bayar' => 'belum_lunas',
            'tgl_daftar'   => $tgl_daftar->toDateString(),
            'tgl_berakhir' => $tgl_berakhir->toDateString(),
        ]);

        return redirect()->route('admin.member.index')->with('success', 'Berhasil menambahkan data member baru.');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name'      => 'required|string|max:255',
            'no_hp'     => 'required|string|max:20',
            'alamat'    => 'required|string',
            'status'    => 'required|in:aktif,tidak aktif',
            'status_bayar' => 'required|in:lunas,belum_lunas',
        ], [
            'name.required'        => 'Nama wajib diisi.',
            'no_hp.required'       => 'Nomor HP wajib diisi.',
            'alamat.required'      => 'Alamat wajib diisi.',
            'status.required'      => 'Status member wajib dipilih.',
            'status_bayar.required'=> 'Status pembayaran wajib dipilih.',
        ]);

        $member = Member::findOrFail($id);
        $user   = $member->user;

        $user->update([
            'name' => $request->name,
        ]);

        $member->update([
            'no_hp'        => $request->no_hp,
            'alamat'       => $request->alamat,
            'status'       => $request->status,
            'status_bayar' => $request->status_bayar,
        ]);

        return redirect()->route('admin.member.index')
            ->with('success', 'Data member berhasil diperbarui.');
    }

    public function destroy(Member $member)
    {
        $user = $member->user;
        $member->delete();
        $user->delete();

        return redirect()->route('admin.member.index')
            ->with('success', 'Member berhasil dihapus.');
    }
}
