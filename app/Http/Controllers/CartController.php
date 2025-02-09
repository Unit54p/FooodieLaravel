<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\User;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function cartView()
    {
        $cart = Cart::where('user_id', Auth::id())->with('product')->get();
        return view('cart', compact('cart'));
    }

    public function addToCart($product_id)
    {
        $cartItem = Cart::where('user_id', Auth::id())->where('product_id', $product_id)->first();

        if ($cartItem) {
            // Jika produk sudah ada di keranjang, tambah quantity
            $cartItem->increment('quantity');
        } else {
            // Jika produk belum ada, buat entri baru
            Cart::create([
                'user_id' => Auth::id(),
                'product_id' => $product_id,
                'quantity' => 1
            ]);
        }

        return redirect()->route('foodsView', ['id' => Auth::id()])->with('success', 'Produk ditambahkan ke keranjang!');
    }
}
