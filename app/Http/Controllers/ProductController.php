<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function showHome()
    {
        // untuk satu panggilan tanpa pembeda
        // Ambil semua data produk dari database
        // $products = Product::where('type', 'drink')->get();
        // Kirim data produk ke view 'home'
        // return view('home', compact('products'));

        $foodProducts = Product::where('type', 'food')->get();

        // Ambil produk dengan tipe 'drink'
        $drinkProducts = Product::where('type', 'drink')->get();

        // Kirim kedua data produk ke view 'home'
        return view('home', compact('foodProducts', 'drinkProducts'));
    }
}
