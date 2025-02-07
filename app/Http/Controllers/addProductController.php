<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class addProductController extends Controller
{
    public function saveProduct(Request $request)
    {
        // cara 1
        // Validasi data dari form
        // $validated = $request->validate([
        //     'name' => 'required|string|max:255',
        //     'type' => 'required|string|max:255',
        //     'price' => 'required|numeric',
        //     'rating' => 'required|numeric|min:0|max:5',
        //     'image_name' => 'required|string|max:255',
        //     'image' => 'required|image|mimes:jpg,jpeg,png|max:2048', // Validasi untuk file gambar
        // ]);
        // // Simpan gambar ke dalam folder 'public/img' dengan nama dari input
        // $validated['image'] = $request->file('image')->storeAs('img', $validated['image_name'] . '.' . $request->file('image')->extension(), 'public');
        // // Simpan produk ke database
        // Product::create($validated);
        // Redirect ke halaman addProduct setelah berhasil menyimpan produk
        // return redirect()->route('addProduct')->with('success', 'Product added successfully!');

        // cara 2
        // Validasi data
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'type' => 'required|string|max:255',
            'price' => 'required|numeric',
            'rating' => 'required|numeric|min:0|max:5',
            'image' => 'required|image|mimes:jpg,jpeg,png|max:2048', // Validasi file gambar
        ]);

        $imagePath = $request->file('image')->store('products', 'public');

        Product::create([
            'name' => $validated['name'],
            'type' => $validated['type'],
            'price' => $validated['price'],
            'rating' => $validated['rating'],
            'img' =>  $imagePath, // Simpan path relatif ke kolom 'img'
        ]);

        return redirect()->route('addProduct')->with('success', 'Product added successfully!');
    }
}
