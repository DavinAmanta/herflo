<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Member;
use App\Models\User;
use Illuminate\Http\Request;

class MemberController extends Controller
{
    // Tampilkan daftar member + daftar user yg bisa dipilih saat tambah member
    public function index()
    {
        $members = Member::with('user')->get();

        // Ambil users dengan role 'user' yang belum terdaftar di tabel members
        $memberUserIds = $members->pluck('user_id')->toArray();
        $users = User::where('role', 'user')
                     ->whereNotIn('id', $memberUserIds)
                     ->get();

        return view('admin.member.index', compact('members', 'users'));
    }

    // Simpan member baru (dari modal)
    public function store(Request $request)
    {
        $request->validate([
            'user_id'    => 'required|exists:users,id',
            'no_hp'      => 'required|string',
            'alamat'     => 'required|string',
            'tgl_daftar' => 'required|date',
        ]);

        $member = Member::create([
            'user_id'    => $request->user_id,
            'no_hp'      => $request->no_hp,
            'alamat'     => $request->alamat,
            'tgl_daftar' => $request->tgl_daftar,
        ]);

        // Ubah role user menjadi 'member' supaya konsisten akses
        $user = User::find($request->user_id);
        if ($user && $user->role !== 'member') {
            $user->update(['role' => 'member']);
        }

        return redirect()->route('admin.member.index')->with('success', 'Member berhasil ditambahkan.');
    }

    // Update member (dari modal edit)
    public function update(Request $request, Member $member)
    {
        $request->validate([
            'no_hp'      => 'required|string',
            'alamat'     => 'required|string',
            'tgl_daftar' => 'required|date',
        ]);

        $member->update($request->only(['no_hp', 'alamat', 'tgl_daftar']));

        return redirect()->route('admin.member.index')->with('success', 'Member berhasil diperbarui.');
    }

    // Hapus member
    public function destroy(Member $member)
    {
        $user = $member->user;
        $member->delete();

        // (opsional) kembalikan role user ke 'user' saat member dihapus
        if ($user) {
            $user->update(['role' => 'user']);
        }

        return redirect()->route('admin.member.index')->with('success', 'Member berhasil dihapus.');
    }
}
