<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class CustomerController extends Controller
{
    public function dashboard()
    {
        return view('customer.dashboard');
    }

    public function read()
    {
        $customers = User::where('role', 'customer')->get();
        return view('customer.index', compact('customers'));
        // return view('customer.index');
    }

    public function create()
    {
        return view('customer.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string',
            'ttl' => 'required|string',
            'gender' => 'required|in:Pria,Wanita',
            'address' => 'required|string',
            'ktp_photo' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'username' => 'required|string|unique:users',
            'password' => 'required|string|min:6',
            'role' => 'required',
        ]);

        // Upload and save KTP photo
        if ($request->hasFile('ktp_photo')) {
            $ktpPhotoPath = $request->file('ktp_photo')->store('ktp_photos', 'public');
            $data['ktp_photo'] = $ktpPhotoPath;
        }

        // Hash the password
        $data['password'] = Hash::make($data['password']);

        User::create($data);

        return redirect()->route('customer.read')->with('success', 'Data user berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('customer.edit', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $data = $request->validate([
            'name' => 'required|string',
            'ttl' => 'required|string',
            'gender' => 'required|in:Pria,Wanita',
            'address' => 'required|string',
            'ktp_photo' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            'role' => 'required',
        ]);

        if ($request->hasFile('ktp_photo')) {
            $ktpPhotoPath = $request->file('ktp_photo')->store('ktp_photos', 'public');
            $data['ktp_photo'] = $ktpPhotoPath;
        }

        $user->update($data);

        return redirect()->route('customer.read')->with('success', 'User berhasil diperbarui.');
    }

    public function destroy($id) {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('customer.read')->with('success', 'Data user berhasil dihapus.');
    }

}