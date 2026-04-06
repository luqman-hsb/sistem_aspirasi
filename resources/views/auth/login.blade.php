@extends('layouts.app')

@section('content')
<div style="max-width: 400px; margin: 0 auto;">
    <h1>Login Siswa</h1>
    <form method="POST" action="/login">
        @csrf
        <div style="margin-bottom: 10px;">
            <label>NIS:</label>
            <input type="number" name="nis" required style="width: 100%; padding: 5px;">
        </div>
        <button type="submit" style="padding: 10px 20px;">Login</button>
    </form>
    <p>Sample NIS: 12345, 12346, 12347</p>
</div>
@endsection

