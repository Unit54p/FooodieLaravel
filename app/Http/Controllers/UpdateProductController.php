<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class UpdateProductController extends Controller
{
    public function editView($id)
    {
        $product = Product::find($id);
        return view('admin.editProduct', compact('product'));
    }
    public function UpdateProduct(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'type' => 'required|in:food,drink',
            'price' => 'required|numeric|min:0',
            'rating' => 'required|numeric|min:0|max:5',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        $product = Product::findOrFail($id);

        $product->name = $request->name;
        $product->type = $request->type;
        $product->price = $request->price;
        $product->rating = $request->rating;

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('products', 'public');
            $product->image = $imagePath;
        }

        $product->save();

        return redirect()->route('Admin.productManagement')->with('success', 'Produk berhasil diperbarui!');
    }
}
