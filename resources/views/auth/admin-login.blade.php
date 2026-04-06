@extends('layouts.app')

@section('content')
<style>
  .auth-container {
    max-width: 400px;
    margin: 50px auto;
    padding: 2rem;
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    color: white;
    border-radius: 15px;
    box-shadow: 0 20px 40px rgba(0,0,0,0.2);
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    position: relative;
    overflow: hidden;
  }
  .auth-container::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    height: 5px;
    background: linear-gradient(90deg, #f093fb 0%, #f5576c 100%);
  }
  .auth-title {
    text-align: center;
    margin-bottom: 2rem;
    font-size: 1.8rem;
    font-weight: 700;
    text-shadow: 0 2px 4px rgba(0,0,0,0.1);
  }
  .form-group {
    margin-bottom: 1.5rem;
  }
  .form-label {
    display: block;
    margin-bottom: 0.75rem;
    font-weight: 500;
    opacity: 0.95;
  }
  .form-control {
    width: 100%;
    padding: 14px 18px;
    border: none;
    border-radius: 10px;
    font-size: 1rem;
    background: rgba(255,255,255,0.95);
    backdrop-filter: blur(10px);
    transition: all 0.3s ease;
    box-sizing: border-box;
    color: #333;
  }
  .form-control:focus {
    outline: none;
    transform: translateY(-2px);
    box-shadow: 0 10px 25px rgba(0,0,0,0.2);
    background: white;
  }
  .btn-primary {
    width: 100%;
    padding: 14px;
    background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);
    color: white;
    border: none;
    border-radius: 10px;
    font-size: 1.1rem;
    font-weight: 600;
    cursor: pointer;
    transition: all 0.3s ease;
    text-transform: uppercase;
    letter-spacing: 1px;
  }
  .btn-primary:hover {
    transform: translateY(-3px);
    box-shadow: 0 15px 35px rgba(245,87,108,0.4);
  }
  .error {
    background: rgba(239,68,68,0.2);
    color: #fecaca;
    padding: 10px;
    border-radius: 8px;
    margin-bottom: 1rem;
    border-left: 4px solid #ef4444;
  }
  .sample {
    background: rgba(255,255,255,0.1);
    padding: 12px;
    border-radius: 8px;
    margin-top: 1.5rem;
    text-align: center;
    font-weight: 500;
  }
  .link {
    display: block;
    text-align: center;
    margin-top: 1.5rem;
    color: rgba(255,255,255,0.9);
    text-decoration: none;
    font-weight: 500;
    transition: color 0.3s ease;
  }
  .link:hover {
    color: white;
    text-decoration: underline;
  }
  @media (max-width: 480px) {
    .auth-container {
      margin: 20px;
      padding: 1.5rem;
    }
  }
</style>

<div class="auth-container">
    <h1 class="auth-title">Admin Panel</h1>
    
    @if ($errors->any())
        <div class="error">
            {{ $errors->first() }}
        </div>
    @endif
    
    <form method="POST" action="/admin/login">
        @csrf
        <div class="form-group">
            <label class="form-label">Username</label>
            <input type="text" name="username" class="form-control" value="{{ old('username') }}" required>
        </div>
        <div class="form-group">
            <label class="form-label">Password</label>
            <input type="password" name="password" class="form-control" required>
        </div>
        <button type="submit" class="btn-primary">Masuk Admin</button>
    </form>
    
    <div class="sample">
        <strong>Default:</strong> username: <strong>admin</strong><br>
        password: <strong>admin123</strong>
    </div>
    
    <a href="/login" class="link">← Kembali ke Login Siswa</a>
</div>
@endsection

