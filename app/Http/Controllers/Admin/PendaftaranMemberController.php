<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class PendaftaranMemberController extends Controller
{
    public function index()
    {
        $members = User::where('role', 'pending')->get(); // status pending
        return view('pendaftaran.index', compact('members'));
    }

    public function create()
    {
        return view('pendaftaran.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:6|confirmed',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'role' => 'pending', // default status
        ]);

        return redirect()->route('pendaftaran.index')->with('success', 'Member baru berhasil didaftarkan.');
    }

    public function edit($id)
    {
        $member = User::findOrFail($id);
        return view('pendaftaran.edit', compact('member'));
    }

    public function update(Request $request, $id)
    {
        $member = User::findOrFail($id);
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,'.$member->id,
        ]);

        $member->update($request->only('name', 'email'));

        return redirect()->route('pendaftaran.index')->with('success', 'Data member berhasil diupdate.');
    }

    public function destroy($id)
    {
        $member = User::findOrFail($id);
        $member->delete();

        return redirect()->route('pendaftaran.index')->with('success', 'Member berhasil dihapus.');
    }

    public function approve($id)
    {
        $member = User::findOrFail($id);
        $member->role = 'member';
        $member->save();

        return redirect()->route('pendaftaran.index')->with('success', 'Member disetujui.');
    }

    public function reject($id)
    {
        $member = User::findOrFail($id);
        $member->delete();

        return redirect()->route('pendaftaran.index')->with('success', 'Pendaftaran member ditolak.');
    }
}
