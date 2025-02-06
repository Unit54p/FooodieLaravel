<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\UserOrderHistory;

class UserOrderHistoryController extends Controller
{
    public function userOrderHistoryView($id)
    {
        $user = User::findOrFail($id); // Mencari pengguna berdasarkan ID

        // Ambil riwayat pesanan untuk pengguna tersebut
        $orders = $user->orders; // Pastikan ada relasi yang benar antara User dan UserOrderHistory

        return view('UserOrderHistoryView', compact('user', 'orders')); // Kirim data ke view
    }
}
