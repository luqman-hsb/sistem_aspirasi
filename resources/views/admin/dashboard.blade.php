@extends('layouts.app')

@section('content')
<h1>Admin Dashboard - List Aspirasi</h1>

<form method="GET" style="margin-bottom: 20px;">
    <input type="date" name="tanggal" value="{{ request('tanggal') }}">
    <input type="month" name="bulan" value="{{ request('bulan') }}">
    <input type="number" name="nis" placeholder="NIS" value="{{ request('nis') }}">
    <select name="id_kategori">
        <option value="">Semua Kategori</option>
        @foreach($kategoris as $kategori)
            <option value="{{ $kategori->id_kategori }}" {{ request('id_kategori') == $kategori->id_kategori ? 'selected' : '' }}>{{ $kategori->ket_kategori }}</option>
        @endforeach
    </select>
    <button type="submit">Filter</button>
</form>

<table border="1" style="width: 100%; border-collapse: collapse;">
    <thead>
        <tr>
            <th>ID</th>
            <th>NIS / Kelas</th>
            <th>Kategori</th>
            <th>Lokasi</th>
            <th>Ket</th>
            <th>Status</th>
            <th>Feedback</th>
            <th>Tanggal</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach($aspirasis as $aspirasi)
        <tr>
            <td>{{ $aspirasi->id_aspirasi }}</td>
            <td>{{ $aspirasi->inputAspirasi->nis ?? '-' }} / {{ $aspirasi->inputAspirasi->siswa->kelas ?? '-' }}</td>
            <td>{{ $aspirasi->kategori->ket_kategori }}</td>
            <td>{{ $aspirasi->inputAspirasi->lokasi ?? '-' }}</td>
            <td>{{ $aspirasi->inputAspirasi->ket ?? '-' }}</td>
            <td>{{ $aspirasi->status }}</td>
            <td>{{ $aspirasi->feedback ?? '-' }}</td>
            <td>{{ $aspirasi->created_at->format('d/m/Y') }}</td>
            <td>
                <form method="POST" action="/admin/{{ $aspirasi->id_aspirasi }}" style="display: inline;">
                    @csrf
                    @method('PATCH')
                    <select name="status">
                        <option value="Menunggu" {{ $aspirasi->status == 'Menunggu' ? 'selected' : '' }}>Menunggu</option>
                        <option value="Proses" {{ $aspirasi->status == 'Proses' ? 'selected' : '' }}>Proses</option>
                        <option value="Selesai" {{ $aspirasi->status == 'Selesai' ? 'selected' : '' }}>Selesai</option>
                    </select>
                    <input type="text" name="feedback" value="{{ $aspirasi->feedback }}" placeholder="Umpan Balik" style="width: 150px;">

                    <button type="submit">Update</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

{{ $aspirasis->links() }}
@endsection

