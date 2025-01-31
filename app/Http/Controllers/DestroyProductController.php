<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class DestroyProductController extends Controller
{
    public function destroy($id)
    {
        $produk = Product::where('ID', $id)->delete();

        return redirect()->route('Admin.productManagement')->with('success', 'Produk berhasil dihapus');
    }
}
