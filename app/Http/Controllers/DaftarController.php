<?php

namespace App\Http\Controllers;

use App\Models\Member;
use App\Models\User;
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
            'no_telp'    => 'required',
            'alamat'     => 'nullable|string',
        ]);
        
        $user_id = Auth::id();

        $sudahMember = Member::where('user_id', $user_id)->exists();

        if ($sudahMember) {
            return back()->with('error', 'Kamu sudah terdaftar sebagai member.');
        }

        Member::create([
            'user_id'    => $user_id,
            'no_hp'      => $request->no_telp,
            'alamat'     => $request->alamat,
            'tgl_daftar' => Date::now()->toDateString(),
        ]);

        User::where('id', $user_id)->update([
            'role'   => 'member'
        ]);

        return redirect()->route('daftar.index')->with('success', 'Berhasil daftar menjadi member');
    }

    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
