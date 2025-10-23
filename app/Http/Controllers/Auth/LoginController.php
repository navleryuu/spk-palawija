<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function showLoginForm(Request $request)
    {
        // Ambil role dari query ?role=admin atau ?role=kepala_dinas
        $role = $request->query('role', 'admin'); // default ke admin
        return view('auth.login', compact('role'));
    }

    public function login(Request $request)
    {
        $request->validate([
            'nip' => 'required|string',
            'password' => 'required|string',
            'role' => 'required|string',
        ]);

        if (Auth::attempt(['nip' => $request->nip, 'password' => $request->password])) {
            $request->session()->regenerate();
            $user = Auth::user();

            // Arahkan sesuai role
            if ($request->role === 'admin' && $user->hasRole('admin')) {
                return redirect()->route('admin.dashboard');
            } elseif ($request->role === 'kepala_dinas' && $user->hasRole('kepala_dinas')) {
                return redirect()->route('kepala.dashboard');
            }

            // Kalau role tidak cocok
            Auth::logout();
            return back()->withErrors(['nip' => 'Anda tidak memiliki akses ke role ini.']);
        }

        return back()->withErrors(['nip' => 'NIP atau password salah.'])->withInput();
    }
}
