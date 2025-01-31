<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    private function getProducts()
    {
        return [
            'foodProducts' => Product::where('type', 'food')->get(),
            'drinkProducts' => Product::where('type', 'drink')->get(),
        ];
    }
    public function productView()
    {
        $products = Product::all(); // Ambil data produk

        return view('Admin.productManagement', compact('products'));
    }
    public function dashboardData()
    {
        $products = Product::all(); // Ambil data produk

        return view('Admin.homeAdmin', compact('products'));
    }
    // contoh class fungsi untuk routing dengan controller
    // public function logOut()
    // {
    //     return view('Admin.logOut');
    // }

    public function showProducts()
    {
        $products = $this->getProducts(); // Ambil data produk

        return view('home', $products);
        // untuk satu panggilan tanpa pembeda
        // Ambil semua data produk dari database
        // $products = Product::where('type', 'drink')->get();
        // Kirim data produk ke view 'home'
        // return view('home', compact('products'));

        // $foodProducts = Product::where('type', 'food')->get();

        // // Ambil produk dengan tipe 'drink'
        // $drinkProducts = Product::where('type', 'drink')->get();

        // // Kirim kedua data produk ke view 'home'
        // return view('home', compact('foodProducts', 'drinkProducts'));
    }
    public function showFoods()
    {
        $foodProducts = Product::where('type', 'food')->get();
        return view('foods', compact('foodProducts'));
    }
    public function showDrinks()
    {
        $drinkProducts = Product::where('type', 'drink')->get();
        return view('drinks', compact('drinkProducts'));
    }
}
