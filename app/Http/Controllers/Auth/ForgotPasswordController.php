<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ForgotPasswordController extends Controller
{
    public function index()
    {
        return view('auth.forgot-password');
    }

    public function reset(Request $request)
    {
        $request->validate([
            'nip' => 'required'
        ]);

        $user = User::where('nip', $request->nip)->first();

        if (!$user) {
            return back()->with('error', 'NIP tidak ditemukan');
        }

        // PASSWORD DEFAULT
        $defaultPassword = 'palawija123';

        $user->update([
            'password' => Hash::make($defaultPassword),
            'is_default_password' => true
        ]);

        return back()->with([
            'success' => 'Password berhasil direset',
            'default_password' => $defaultPassword
        ]);
    }
}
