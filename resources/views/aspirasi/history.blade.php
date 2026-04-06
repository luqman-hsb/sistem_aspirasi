@extends('layouts.app')

@section('content')
<h1>Histori Aspirasi Saya</h1>
@if($inputAspirasis->count() > 0)
<table border="1" style="width: 100%; border-collapse: collapse;">
    <thead>
        <tr>
            <th>ID</th>
            <th>Kategori</th>
            <th>Lokasi</th>
            <th>Ket</th>
            <th>Status</th>
            <th>Feedback</th>
            <th>Tanggal</th>
        </tr>
    </thead>
    <tbody>
        @foreach($inputAspirasis as $input)
        <tr>
            <td>{{ $input->id_pelaporan }}</td>
            <td>{{ $input->kategori->ket_kategori }}</td>
            <td>{{ $input->lokasi }}</td>
            <td>{{ $input->ket }}</td>
            <td>{{ $input->aspirasi->status ?? 'Pending' }}</td>
            <td>{{ $input->aspirasi->feedback ?? '-' }}</td>
            <td>{{ $input->created_at->format('d/m/Y') }}</td>
        </tr>
        @endforeach
    </tbody>
</table>
@else
<p>Belum ada aspirasi.</p>
@endif

<a href="/aspirasi/create" style="display: inline-block; padding: 10px 20px; background: blue; color: white; text-decoration: none;">Buat Aspirasi Baru</a>
@endsection

