<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\Product;

class CartController extends Controller
{
    public function addToCart(Request $request, $productId)
    {
        $product = Product::findOrFail($productId);

        // Tambahkan produk ke dalam keranjang dan update jumlah jika produk sudah ada di keranjang
        auth()->user()->carts()->syncWithoutDetaching([$productId => ['quantity' => 1]]);
        
        return redirect()->route('cart.show')->with('success', 'Produk berhasil ditambahkan ke dalam keranjang.');
    }

    public function show()
    {
        $carts = auth()->user()->carts;
        // return $carts;
        return view('cart.show', compact('carts'));
    }

    public function updateQuantity(Request $request, $cartId)
    {
        $cart = Cart::findOrFail($cartId);

        // Validasi jumlah produk harus lebih dari 0
        $request->validate([
            'quantity' => 'required|integer|min:1'
        ]);

        $cart->quantity = $request->input('quantity');
        $cart->save();
        
        return redirect()->route('cart.show')->with('success', 'Jumlah produk dalam keranjang berhasil diubah.');
    }

    public function removeFromCart($cartId)
    {
        $cart = Cart::findOrFail($cartId);

        $cart->delete();

        return redirect()->route('cart.show')->with('success', 'Produk berhasil dihapus dari keranjang.');
    }
}

