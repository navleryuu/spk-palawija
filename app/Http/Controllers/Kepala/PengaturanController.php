<?php

namespace App\Http\Controllers\Kepala;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class PengaturanController extends Controller
{
    public function index()
    {
        return view('kepala.pengaturan.index');
    }

    public function update(Request $request)
    {
        $request->validate([
            'password' => 'required|min:6|confirmed'
        ]);

        auth()->user()->update([
            'password' => Hash::make($request->password),
            'is_default_password' => false
        ]);

        return back()->with('success', 'Password berhasil diperbarui');
    }
}
