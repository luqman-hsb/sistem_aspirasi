<?php

namespace App\Http\Controllers;

use App\Models\Aspirasi;
use App\Models\InputAspirasi;
use App\Models\Kategori;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index(Request $request)
    {
        $query = Aspirasi::with(['kategori', 'inputAspirasi.siswa']);

        if ($request->filled('tanggal')) {
            $query->whereDate('created_at', $request->tanggal);
        }

        if ($request->filled('bulan')) {
            $query->whereMonth('created_at', $request->bulan);
        }

        if ($request->filled('nis')) {
            $query->whereHas('inputAspirasi', function ($q) use ($request) {
                $q->where('nis', $request->nis);
            });
        }

        if ($request->filled('id_kategori')) {
            $query->where('id_kategori', $request->id_kategori);
        }

        $aspirasis = $query->paginate(10);

        $kategoris = Kategori::all();

        return view('admin.dashboard', compact('aspirasis', 'kategoris'));
    }

    public function updateStatus(Request $request, $id_aspirasi)
    {
        $request->validate([
            'status' => 'required|in:Menunggu,Proses,Selesai',
'feedback' => 'nullable|string|max:255',
        ]);

        $aspirasi = Aspirasi::findOrFail($id_aspirasi);
        $aspirasi->update([
            'status' => $request->status,
            'feedback' => $request->feedback,
        ]);

        return redirect('/admin')->with('success', 'Status dan feedback updated.');
    }
}

