<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class EditUserController extends Controller
{
    public function editUserView($id)
    {
        $user = User::findOrFail($id); // Ambil data user berdasarkan id
        return view('UserSetting', compact('user')); // Kirim data ke view
    }

    public function saveUserSetting(Request $request, $id)
    {
        $user = User::findOrFail($id); // Cari user berdasarkan id

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email,' . $user->id, // Gunakan ID yang sesuai
            'password' => 'nullable|string|min:8|confirmed',
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048', // Ubah 'imageProfile' jadi 'image'
        ], [
            'email.unique' => 'Email sudah digunakan, silakan gunakan email lain.',
        ]);

        // Update data user
        $user->name = $request->name;
        $user->email = $request->email;

        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
        }

        if ($request->hasFile('imageProfile')) {
            $imagePath = $request->file('imageProfile')->getClientOriginalName();
            $destinationPath = public_path('img/userProfilePicture');
            $request->file('imageProfile')->move($destinationPath, $imagePath);

            $user->imgProfile = 'img/userProfilePicture/' . $imagePath;
        }

        $user->save(); // Simpan perubahan

        return redirect()->route('editUserView', $user->id)->with('success', 'Profil berhasil diperbarui!');
    }
}
