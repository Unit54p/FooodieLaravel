<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Product;
use Illuminate\Http\Request;

class AdminDashboardController extends Controller
{
    public function DashboardView()
    {
        $foodsCounts = Product::where('type', 'food')->count();
        $drinksCounts = Product::where('type', 'drink')->count();
        $userCounts = User::where('role', 'user')->count();
        return view('Admin.adminHome', compact('userCounts', 'drinksCounts', 'foodsCounts'));
    }
}
