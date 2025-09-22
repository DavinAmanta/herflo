<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Testimoni;

class TestimoniController extends Controller
{
    public function index()
    {
        $testimoni = Testimoni::with('member')->latest()->get();
        return view('admin.testimoni.index', compact('testimoni'));
    }

    public function destroy($id)
    {
        $testimoni = Testimoni::findOrFail($id);
        $testimoni->delete();

        return redirect()->route('admin.testimoni.index')->with('success', 'Testimoni berhasil dihapus');
    }
}
