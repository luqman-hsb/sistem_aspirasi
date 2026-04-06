<?php

namespace App\Http\Controllers;

use App\Models\InputAspirasi;
use App\Models\Aspirasi;
use App\Models\Kategori;
use App\Models\Siswa;
use Illuminate\Http\Request;

class AspirasiController extends Controller
{
    public function index()
    {
        if (!session()->has('siswa_nis')) {
            return redirect('/login');
        }

        $nis = session('siswa_nis');
        $inputAspirasis = InputAspirasi::where('nis', $nis)->with(['kategori', 'aspirasi'])->get();

        return view('aspirasi.history', compact('inputAspirasis'));
    }

    public function create()
    {
        if (!session()->has('siswa_nis')) {
            return redirect('/login');
        }

        $kategoris = Kategori::all();

        return view('aspirasi.form', compact('kategoris'));
    }

    public function store(Request $request)
    {
        if (!session()->has('siswa_nis')) {
            return redirect('/login');
        }

        $request->validate([
            'id_kategori' => 'required|exists:kategori,id_kategori',
            'lokasi' => 'required|max:50',
            'ket' => 'required|max:50',
        ]);

        $nis = session('siswa_nis');

        // Create aspirasi first for id
        $aspirasi = Aspirasi::create([
            'id_kategori' => $request->id_kategori,
            'status' => 'Menunggu',
        ]);

        // Create input_aspirasi with same id_pelaporan as id_aspirasi (manual since custom PK)
        InputAspirasi::create([
            'id_pelaporan' => $aspirasi->id_aspirasi,
            'nis' => $nis,
            'id_kategori' => $request->id_kategori,
            'lokasi' => $request->lokasi,
            'ket' => $request->ket,
            'id_aspirasi' => $aspirasi->id_aspirasi,
        ]); // id_aspirasi nullable, so OK

        return redirect('/aspirasi')->with('success', 'Aspirasi berhasil disubmit.');
    }
}

