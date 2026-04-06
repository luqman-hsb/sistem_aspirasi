<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Siswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        if (session()->has('siswa_nis')) {
            return redirect('/aspirasi');
        }
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'nis' => 'required|exists:siswa,nis',
            'password' => 'required',
        ]);

        $nis = $request->nis;
        $siswa = Siswa::where('nis', $nis)->first();

        if ($siswa && password_verify($request->password, $siswa->password)) {
            session(['siswa_nis' => $nis]);
            return redirect('/aspirasi');
        }

        return back()->withErrors(['password' => 'Password salah']);
    }

    public function logout()
    {
        session()->forget('siswa_nis');
        return redirect('/login');
    }
}

