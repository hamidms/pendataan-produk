<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\Product;

class SalesController extends Controller
{
    public function submitForm()
    {
        $carts = Cart::all();
        $products = Product::all();

        return view('sales.index', compact('carts', 'products'));
    }

    public function submitSales(Request $request, $id)
    {
        // Validasi jika terdapat keranjang kosong
        // if (auth()->user()->carts->isEmpty()) {
        //     return redirect()->route('cart.show')->with('error', 'Keranjang kosong, tidak dapat melakukan submit penjualan.');
        // }

        $cart = Cart::findOrFail($id);
        $product = $cart->product;
        $product->stock -= $cart->quantity;
        $product->save();

        $cart->delete();
        // return $cart->product->stock;
        return redirect()->route('sales.index')->with('success', 'Penjualan berhasil disubmit. Stok barang telah dikurangi.');


        // Proses data penjualan, dengan mengurangi stok barang
        // foreach (auth()->user()->carts as $cart) {
        //     $product = $cart->product;
        //     $product->stock -= $cart->quantity;
        //     $product->save();
        // }

        // Hapus semua keranjang setelah penjualan selesai
        // auth()->user()->carts()->delete();

        // return redirect()->route('cart.show')->with('success', 'Penjualan berhasil disubmit. Stok barang telah dikurangi.');
    }
}
