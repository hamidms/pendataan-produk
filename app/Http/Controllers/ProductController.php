<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('product.index', compact('products'));
    }

    public function create()
    {
        return view('product.create');
    }

    public function store(Request $request)
    {
        // Validasi data yang diinput dari form
        $data = $request->validate([
            'name' => 'required|string',
            'desc' => 'required|string',
            'type' => 'required|string',
            'stock' => 'required|integer',
            'buy_price' => 'required|numeric',
            'sell_price' => 'required|numeric',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Upload and save photo
        if ($request->hasFile('photo')) {
            $photoPath = $request->file('photo')->store('product_photos', 'public');
            $data['photo'] = $photoPath;
        }

        // Simpan data ke database
        Product::create($data);

        return redirect()->route('product.index')->with('success', 'Data barang berhasil ditambahkan.');
    }
}

