<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserRegistration extends Controller
{
    public function registrationPage()
    {
        return view('UserRegistration');
    }

    public function saveRegistration(Request $request)
    {
        $request->validate([
            'username' => 'required|string|max:255',
            // Laravel akan memeriksa apakah nilai email sudah ada di dalam tabel users sebelum menyimpan data baru.
            // melalu unique:users, dimana users adalah nama tabel yang akan dicek.
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|string|min:8',
        ], [
            // email.unique → hanya sekedar menyimpan pesan error khusus untuk aturan unique pada field email dan di teruskan ke halmaan dituju.
            'email.unique' => 'Email sudah digunakan, silakan gunakan email lain.', // Pesan error kustom
        ]);

        $user = User::create([
            'name' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'user',
        ]);

        // Auth::login($user);
        return redirect()->route('registrationPage')->with('success', 'registration success welcome');
    }
}
