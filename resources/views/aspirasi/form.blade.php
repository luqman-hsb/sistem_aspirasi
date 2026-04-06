@extends('layouts.app')

@section('content')
<h1>Form Pengaduan Aspirasi</h1>
<form method="POST" action="/aspirasi">
    @csrf
    <div style="margin-bottom: 10px;">
        <label>Kategori:</label>
        <select name="id_kategori" style="width: 100%; padding: 5px;">
            @foreach($kategoris as $kategori)
                <option value="{{ $kategori->id_kategori }}">{{ $kategori->ket_kategori }}</option>
            @endforeach
        </select>
    </div>
    <div style="margin-bottom: 10px;">
        <label>Lokasi:</label>
        <input type="text" name="lokasi" maxlength="50" required style="width: 100%; padding: 5px;">
    </div>
    <div style="margin-bottom: 10px;">
        <label>Keterangan:</label>
        <textarea name="ket" maxlength="50" required style="width: 100%; padding: 5px; height: 80px;"></textarea>
    </div>
    <button type="submit" style="padding: 10px 20px;">Submit Aspirasi</button>
</form>
@endsection

