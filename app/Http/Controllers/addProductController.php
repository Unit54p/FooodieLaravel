<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class addProductController extends Controller
{
    // public function addProduct(Request $request)
    // {
    //     // Validasi data yang masuk
    //     $validated = $request->validate([
    //         'name' => 'required|string|max:255',
    //         'type' => 'required|string|max:255',
    //         'price' => 'required|numeric|min:0',
    //         'rating' => 'required|numeric|min:0|max:5',
    //     ]);

    //     // Menyimpan data ke database
    //     Product::create($validated);

    //     // Redirect atau tampilkan pesan sukses
    //     return redirect()->route('home')->with('success', 'Product added successfully!');
    // }
    public function addProdcut()
    {
        return view('Admin.addProdcut');
    }
    public function saveProduct(Request $request)
    {
        // Validasi data dari form
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'type' => 'required|string|max:255',
            'price' => 'required|numeric',
            'rating' => 'required|numeric|min:0|max:5',
        ]);

        // Simpan produk ke database
        Product::create($validated);

        // Redirect ke halaman addProduct setelah berhasil menyimpan produk
        return redirect()->route('addProduct')->with('success', 'Product added successfully!');
    }
}
