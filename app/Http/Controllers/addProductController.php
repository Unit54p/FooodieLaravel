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
            'image_name' => 'required|string|max:255', // Nama gambar
            'image' => 'required|image|mimes:jpg,jpeg,png|max:2048', // Validasi file gambar
        ]);

        // Simpan gambar ke dalam folder 'public/img'
        // Fungsi storeAs secara default menyimpan file di dalam folder storage/app/public/ yang kemudian dapat diakses setelah menjalankan php artisan storage:link.
        // $imagePath = $request->file('image')->storeAs('img', $validated['image_name'] . '.' . $request->file('image')->extension(), 'public');


        $imagePath = $request->file('image')->getClientOriginalName();  // Nama asli file gambar
        $destinationPath = public_path('img');  // Path tujuan: public/img

        $request->file('image')->move($destinationPath, $imagePath);

        // Masukkan data ke database, termasuk path gambar
        /*
        dengan cara ini kita bisa menentukan
        sendiri untuk kolom (objek sebelum tanda =>)
        di database akan diisi dengan nilai apa (sesudah tanda =>)
        */
        Product::create([
            'name' => $validated['name'],
            'type' => $validated['type'],
            'price' => $validated['price'],
            'rating' => $validated['rating'],
            'img' => 'img/' . $imagePath, // Simpan path relatif ke kolom 'img'
        ]);

        // Redirect ke halaman addProduct setelah berhasil menyimpan produk
        return redirect()->route('addProduct')->with('success', 'Product added successfully!');
    }
}
