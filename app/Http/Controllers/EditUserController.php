<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class EditUserController extends Controller
{
    public function editUserView($id)
    {
        $user = User::findOrFail($id); // Ambil data user berdasarkan id
        return view('UserSetting', compact('user')); // Kirim data ke view
    }

    public function saveUserSetting(Request $request, $id)
    {
        $user = User::findOrFail($id);

        // Validasi input pengguna
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            // 'email' => 'required|email|max:255|unique:users,email,' . $user->user_id,
            'password' => 'nullable|string|min:8|confirmed',
            'imageProfile' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ], [
            // 'email.unique' => 'Email sudah digunakan, silakan gunakan email lain.',
            'imageProfile.mimes' => 'Gambar hanya bisa dalam format jpg, jpeg, atau png.',
            'password.confirmed' => 'Password confirmation tidak cocok.',
        ]);

        // Proses update data user
        $user->name = $request->name;
        // $user->email = $request->email;

        // Update password jika diisi
        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
        }

        // Proses upload gambar
        if ($request->hasFile('imageProfile')) {
            // Cek apakah user memiliki gambar profil dan apakah file tersebut ada di penyimpanan
            if ($user->imgProfile && Storage::disk('public')->exists( $user->imgProfile)) {
                // Hapus file gambar profil dari penyimpanan
                Storage::disk('public')->delete($user->imgProfile);
            }

            $imagePath = $request->file('imageProfile')->store('userProfilePicture', 'public');
            $user->imgProfile = '' . $imagePath;
        }

        // Simpan perubahan
        $user->save();

        // Redirect dengan pesan sukses
        return redirect()->route('editUserView', $user->id)->with('success', 'Profil berhasil diperbarui!');
    }
}
