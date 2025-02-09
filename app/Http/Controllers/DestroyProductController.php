<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class DestroyProductController extends Controller
{
    public function destroy($id)
    {
        $produk = Product::where('products_id', $id)->delete();
        return redirect()->route('productManagement')->with('success', 'Produk berhasil dihapus!');
    }
}
