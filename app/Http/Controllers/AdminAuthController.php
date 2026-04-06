<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminAuthController extends Controller
{
    public function showAdminLogin()
    {
        if (session()->has('admin_logged')) {
            return redirect('/admin');
        }
        return view('auth.admin-login');
    }

    public function adminLogin(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        if ($request->username === 'admin' && $request->password === 'admin123') {
            session(['admin_logged' => true]);
            return redirect('/admin');
        }

        return back()->withErrors(['username' => 'Invalid credentials']);
    }

    public function adminLogout()
    {
        session()->forget('admin_logged');
        return redirect('/admin/login');
    }
}

