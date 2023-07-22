<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function index()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('username', 'password');

        if (Auth::attempt($credentials)) {
            return redirect()->intended($this->redirectTo());
        } else {
            return redirect()->back()->withInput()->withErrors(['loginError' => 'Username atau password salah!']);
        }
    }

    protected function redirectTo()
    {
        $role = Auth::user()->role;
        if ($role === 'customer') {
            return '/customer/dashboard';
        } elseif ($role === 'staff') {
            return '/staff/dashboard';
        } elseif ($role === 'admin') {
            return '/admin/dashboard';
        } else {
            return '/';
        }
    }
}