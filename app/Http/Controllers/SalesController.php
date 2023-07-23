<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\Product;

class SalesController extends Controller
{
    public function submitForm()
    {
        // $carts = auth()->user()->carts;
        $carts = Cart::all();
        $products = Product::all();

        return view('sales.index', compact('carts', 'products'));
    }

    public function submitSales(Request $request)
    {
        // Validasi jika terdapat keranjang kosong
        if (auth()->user()->carts->isEmpty()) {
            return redirect()->route('cart.show')->with('error', 'Keranjang kosong, tidak dapat melakukan submit penjualan.');
        }

        // Proses data penjualan, misalnya dengan mengurangi stok barang
        foreach (auth()->user()->carts as $cart) {
            $product = $cart->product;
            $product->stock -= $cart->quantity;
            $product->save();
        }

        // Hapus semua keranjang setelah penjualan selesai
        auth()->user()->carts()->delete();

        return redirect()->route('cart.show')->with('success', 'Penjualan berhasil disubmit. Stok barang telah dikurangi.');
    }
}
