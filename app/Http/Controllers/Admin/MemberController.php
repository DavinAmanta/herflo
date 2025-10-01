<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Member;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\Hash;

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
            'name'  => 'required',
            'email' => 'required|unique:users,email',
            'password' => 'required',
            'no_hp' => 'required',
            'alamat' => 'required',
        ],[
            'name.required'         => 'Nama wajib di isi',
            'email.required'        => 'Email wajib di isi',
            'password.required'     => 'Password wajib di isi',
            'no_hp.required'        => 'No Hp wajib di isi',
            'alamat.required'       => 'Alamat wajib di isi',
            'email.unique'          => 'Email sudah digunakan',
        ]);

        $user = User::create([
            'name'      => $request->name,
            'email'     => $request->email,
            'password'  => Hash::make($request->password),
            'role'      => 'member'
        ]);

        Member::create([
            'user_id'       => $user->id,
            'no_hp'         => $request->no_hp,
            'alamat'        => $request->alamat,
            'tgl_daftar'    => Date::now(),
        ]);
        return redirect()->route('admin.member.index')->with('success','Berhasil menambah data member');
    }

    // Update member (dari modal edit)
    public function update(Request $request, $id)
    {
        $request->validate([
            'name'       => 'required',
            'no_hp'      => 'required|string',
            'alamat'     => 'required|string',
        ]);
        $member = Member::findOrFail($id);
        $user   = $member->user; 
        $user->update([
            'name'     => $request->name,
        ]);
        $member->update([
            'no_hp'   => $request->no_hp,
            'alamat'  => $request->alamat,
        ]);
        return redirect()->route('admin.member.index')->with('success', 'Member berhasil diperbarui.');
    }

    public function destroy(Member $member)
    {
        $user = $member->user;
        $member->delete();
        $user->delete();
        return redirect()->route('admin.member.index')->with('success', 'Member berhasil dihapus.');
    }
}
