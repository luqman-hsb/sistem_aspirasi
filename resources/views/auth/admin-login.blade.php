
@extends('layouts.app')

@section('content')
<div style="max-width: 400px; margin: 0 auto;">
    <h1>Login Admin</h1>
    @if ($errors->any())
        <div style="background: red; color: white; padding: 10px; margin-bottom: 10px;">
            {{ $errors->first() }}
        </div>
    @endif
    <form method="POST" action="/admin/login">
        @csrf
        <div style="margin-bottom: 10px;">
            <label>Username:</label>
            <input type="text" name="username" value="{{ old('username') }}" required style="width: 100%; padding: 5px;">
        </div>
        <div style="margin-bottom: 10px;">
            <label>Password:</label>
            <input type="password" name="password" required style="width: 100%; padding: 5px;">
        </div>
        <button type="submit" style="padding: 10px 20px;">Login Admin</button>
    </form>
    <p>Default: username <strong>admin</strong>, password <strong>admin123</strong></p>
    <a href="/login">Login Siswa</a>
</div>
@endsection

