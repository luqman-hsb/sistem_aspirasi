<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Siswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function showRegisterForm()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'nis' => 'required|integer|unique:siswa,nis',
            'tingkat_kelas' => 'required|in:10,11,12',
            'jurusan' => 'required|in:DKV,RPL,TITL,TKJ',
            'nomor_kelas' => 'required|integer|between:1,10',
            'password' => 'required|confirmed|min:6',
        ]);

        $kelas = $request->tingkat_kelas . ' ' . $request->jurusan . ' ' . $request->nomor_kelas;

        Siswa::create([
            'nis' => $request->nis,
            'kelas' => $kelas,
            'password' => Hash::make($request->password),
        ]);

        return redirect('/login')->with('success', 'Registrasi berhasil. Silakan login.');
    }
}

