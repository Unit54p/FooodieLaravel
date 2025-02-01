<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    // Menampilkan halaman login
    public function showLoginForm()
    {
        // Mengembalikan tampilan 'login' yang berisi form login
        return view('login');
    }

    // Memproses login setelah form dikirimkan
    public function processLogin(Request $request)
    {
        // Melakukan validasi input email dan password
        $request->validate([
            'email' => 'required|email', // Email wajib diisi dan harus dalam format yang benar
            'password' => 'required|min:6', // Password wajib diisi dan minimal 6 karakter
        ]);

        // Mencoba login dengan menggunakan email dan password yang diberikan
        if (Auth::attempt($request->only('email', 'password'))) {
            // Jika login berhasil, regenerasi sesi untuk menghindari session fixation (keamanan)
            $request->session()->regenerate();

            // Setelah login berhasil, arahkan pengguna ke halaman yang mereka tuju sebelumnya (atau ke halaman Home)
            return redirect()->route('home')->with('success', 'Login berhasil!');
        }

        // Jika login gagal, kembalikan ke halaman login dengan pesan kesalahan
        // return back()->withErrors([
        //     'email' => 'Email salah.',
        //     'password' => 'password salah' // Menampilkan pesan kesalahan untuk email atau password yang salah
        // ]);
        $user = User::where('email', $request->email)->first();

        if (!$user) {
            // Jika email tidak terdaftar
            return back()->withErrors([
                'email' => 'Email tidak ditemukan.',
            ]);
        }

        // Jika password salah
        return back()->withErrors([
            'password' => 'Password salah.',
        ]);

    }

    // Memproses logout
    public function logout(Request $request)
    {
        // Menghapus informasi autentikasi pengguna
        Auth::logout();

        // Menghapus seluruh data sesi pengguna
        $request->session()->invalidate();

        // Menghasilkan token CSRF baru untuk mencegah serangan CSRF setelah logout
        $request->session()->regenerateToken();

        // Mengarahkan pengguna kembali ke halaman login setelah logout
        return redirect('/login');
    }
}
