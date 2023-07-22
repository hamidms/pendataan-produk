<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StaffController extends Controller
{
    public function dashboard()
    {
        return view('staff.dashboard');
    }

    public function logout()
    {
        auth()->logout();
        return redirect('/'); // Ganti dengan halaman beranda setelah logout
    }
}
