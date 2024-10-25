<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Employee;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function loginForm()
    {
        return view('welcome');
    }

    public function login(Request $request)
    {
        // Validasi input
        $request->validate([
            'name' => 'required',
            'password' => 'required',
        ]);

        // Ambil inputan name dan password
        $credentials = $request->only('name', 'password');

        // Cek kredensial untuk setiap jenis pengguna
        $userTypes = [
            'admin' => User::class,
            'client' => Client::class,
            'employee' => Employee::class,
        ];

        foreach ($userTypes as $type => $model) {
            $user = $model::where('name', $credentials['name'])->first();
            if ($user && Hash::check($credentials['password'], $user->password)) {
                // Admin menggunakan guard 'users'
                if ($type === 'admin') {
                    Auth::guard('users')->login($user); // Guard 'users' untuk admin
                    return redirect()->route('admin.dashboard');
                } else {
                    Auth::guard($type . 's')->login($user);
                    return redirect()->route($type . '.dashboard');
                }
            }
        }

        // Jika semua gagal, kembali ke halaman login dengan pesan error
        return redirect()->back()->with(['loginError' => 'Name atau password salah.']);
    }


    public function logout(Request $request)
    {
        // Tentukan guard yang sedang aktif dan lakukan logout
        if (Auth::guard('web')->check()) {
            Auth::guard('web')->logout();  // Logout untuk Admin
        } elseif (Auth::guard('clients')->check()) {
            Auth::guard('clients')->logout();  // Logout untuk Client
        } elseif (Auth::guard('employees')->check()) {
            Auth::guard('employees')->logout();  // Logout untuk Employee
        }

        // Invalidate session dan regenerate token untuk keamanan
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        // Redirect ke halaman login atau halaman lain setelah logout
        return redirect('/')->with('status', 'You have successfully logged out.');
    }
}
