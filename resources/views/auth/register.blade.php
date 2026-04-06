@extends('layouts.app')

@section('content')
<style>
  :root {
    --primary: #10b981;
    --primary-dark: #059669;
    --primary-light: #34d399;
    --gray-50: #f8fafc;
    --gray-100: #f1f5f9;
    --gray-200: #e2e8f0;
    --gray-400: #94a3b8;
    --gray-600: #475569;
    --gray-700: #334155;
    --gray-900: #0f172a;
    --red-500: #ef4444;
    --green-600: #059669;
  }

  * {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
  }

  .auth-page {
    min-height: 100vh;
    background: linear-gradient(135deg, #ecfdf5 0%, #d1fae5 100%);
    display: flex;
    align-items: center;
    justify-content: center;
    padding: 1.5rem;
  }

  .auth-container {
    max-width: 520px;
    width: 100%;
    background: white;
    border-radius: 1.5rem;
    box-shadow: 0 20px 35px -10px rgba(0, 0, 0, 0.1), 0 1px 3px rgba(0, 0, 0, 0.05);
    padding: 2rem;
    transition: transform 0.2s ease;
  }

  @media (min-width: 640px) {
    .auth-container {
      padding: 2.5rem;
    }
  }

  @media (max-width: 480px) {
    .auth-container {
      padding: 1.5rem;
      border-radius: 1.25rem;
    }
  }

  .auth-header {
    text-align: center;
    margin-bottom: 2rem;
  }

  .auth-title {
    font-family: 'Inter', system-ui, -apple-system, 'Segoe UI', Roboto, Helvetica, sans-serif;
    font-size: 1.75rem;
    font-weight: 600;
    background: linear-gradient(135deg, var(--gray-900) 0%, var(--gray-700) 100%);
    background-clip: text;
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    letter-spacing: -0.02em;
  }

  @media (min-width: 640px) {
    .auth-title {
      font-size: 2rem;
    }
  }

  .auth-subtitle {
    font-family: 'Inter', system-ui, -apple-system, 'Segoe UI', Roboto, Helvetica, sans-serif;
    font-size: 0.875rem;
    color: var(--gray-600);
    margin-top: 0.5rem;
  }

  .form-group {
    margin-bottom: 1.25rem;
  }

  .form-label {
    display: block;
    font-family: 'Inter', system-ui, -apple-system, 'Segoe UI', Roboto, Helvetica, sans-serif;
    font-size: 0.875rem;
    font-weight: 500;
    color: var(--gray-700);
    margin-bottom: 0.5rem;
  }

  .form-control,
  .form-select {
    width: 100%;
    padding: 0.75rem 1rem;
    font-family: 'Inter', system-ui, -apple-system, 'Segoe UI', Roboto, Helvetica, sans-serif;
    font-size: 0.9375rem;
    border: 1.5px solid var(--gray-200);
    border-radius: 0.75rem;
    background-color: var(--gray-50);
    transition: all 0.2s ease;
    color: var(--gray-900);
    cursor: pointer;
  }

  .form-control:focus,
  .form-select:focus {
    outline: none;
    border-color: var(--primary);
    background-color: white;
    box-shadow: 0 0 0 4px rgba(16, 185, 129, 0.1);
  }

  .form-control::placeholder {
    color: var(--gray-400);
    font-size: 0.875rem;
  }

  /* Hilangkan spinner pada input number */
  .form-control[type="number"] {
    -moz-appearance: textfield;
  }
  .form-control[type="number"]::-webkit-inner-spin-button,
  .form-control[type="number"]::-webkit-outer-spin-button {
    -webkit-appearance: none;
    margin: 0;
  }

  .form-row {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 1rem;
  }

  @media (max-width: 560px) {
    .form-row {
      grid-template-columns: 1fr;
      gap: 0;
    }
  }

  .alert-success {
    background-color: #ecfdf5;
    border-left: 4px solid var(--primary);
    padding: 0.875rem 1rem;
    border-radius: 0.75rem;
    margin-bottom: 1.5rem;
    font-family: 'Inter', system-ui, -apple-system, 'Segoe UI', Roboto, Helvetica, sans-serif;
    font-size: 0.8125rem;
    color: var(--green-600);
  }

  .alert-error {
    background-color: #fef2f2;
    border-left: 4px solid var(--red-500);
    padding: 0.875rem 1rem;
    border-radius: 0.75rem;
    margin-bottom: 1.5rem;
    font-family: 'Inter', system-ui, -apple-system, 'Segoe UI', Roboto, Helvetica, sans-serif;
    font-size: 0.8125rem;
    color: #dc2626;
  }

  .field-error {
    color: var(--red-500);
    font-size: 0.75rem;
    font-family: 'Inter', system-ui, -apple-system, 'Segoe UI', Roboto, Helvetica, sans-serif;
    margin-top: 0.375rem;
  }

  .btn-primary {
    width: 100%;
    padding: 0.8125rem 1rem;
    font-family: 'Inter', system-ui, -apple-system, 'Segoe UI', Roboto, Helvetica, sans-serif;
    font-size: 0.9375rem;
    font-weight: 600;
    color: white;
    background: var(--primary);
    border: none;
    border-radius: 0.75rem;
    cursor: pointer;
    transition: all 0.2s ease;
    margin-top: 0.5rem;
  }

  .btn-primary:hover {
    background: var(--primary-dark);
    transform: translateY(-1px);
    box-shadow: 0 4px 12px rgba(16, 185, 129, 0.3);
  }

  .btn-primary:active {
    transform: translateY(0);
  }

  .login-link {
    text-align: center;
    margin-top: 1.5rem;
  }

  .login-link a {
    font-family: 'Inter', system-ui, -apple-system, 'Segoe UI', Roboto, Helvetica, sans-serif;
    font-size: 0.875rem;
    font-weight: 500;
    color: var(--primary);
    text-decoration: none;
    transition: color 0.2s ease;
  }

  .login-link a:hover {
    color: var(--primary-dark);
    text-decoration: underline;
  }

  hr {
    margin: 1rem 0;
    border: none;
    border-top: 1px solid var(--gray-200);
  }

  @media (max-width: 480px) {
    .form-control,
    .form-select {
      padding: 0.7rem 0.875rem;
    }
    .btn-primary {
      padding: 0.75rem 1rem;
    }
  }
</style>

<div class="auth-page">
  <div class="auth-container">
    <div class="auth-header">
      <h1 class="auth-title">Daftar Siswa Baru</h1>
      <p class="auth-subtitle">Lengkapi data diri Anda untuk mendaftar</p>
    </div>

    @if (session('success'))
      <div class="alert-success">
        {{ session('success') }}
      </div>
    @endif

    @if ($errors->any())
      <div class="alert-error">
        {{ $errors->first() }}
      </div>
    @endif

    <form method="POST" action="/register">
      @csrf

      <div class="form-group">
        <label class="form-label">NIS</label>
        <input 
          type="number" 
          name="nis" 
          class="form-control" 
          required 
          value="{{ old('nis') }}"
          placeholder="Masukkan NIS Anda"
        >
      </div>

      <div class="form-row">
        <div class="form-group">
          <label class="form-label">Tingkat Kelas</label>
          <select name="tingkat_kelas" class="form-select" required>
            <option value="">Pilih Tingkat</option>
            <option value="10" {{ old('tingkat_kelas') == '10' ? 'selected' : '' }}>10</option>
            <option value="11" {{ old('tingkat_kelas') == '11' ? 'selected' : '' }}>11</option>
            <option value="12" {{ old('tingkat_kelas') == '12' ? 'selected' : '' }}>12</option>
          </select>
        </div>
        <div class="form-group">
          <label class="form-label">Nomor Kelas</label>
          <select name="nomor_kelas" class="form-select" required>
            <option value="">Pilih Nomor</option>
            @for($i = 1; $i <= 10; $i++)
              <option value="{{ $i }}" {{ old('nomor_kelas') == $i ? 'selected' : '' }}>{{ $i }}</option>
            @endfor
          </select>
        </div>
      </div>

      <div class="form-group">
        <label class="form-label">Jurusan</label>
        <select name="jurusan" class="form-select" required>
          <option value="">Pilih Jurusan</option>
          <option value="DKV" {{ old('jurusan') == 'DKV' ? 'selected' : '' }}>DKV</option>
          <option value="RPL" {{ old('jurusan') == 'RPL' ? 'selected' : '' }}>RPL</option>
          <option value="TITL" {{ old('jurusan') == 'TITL' ? 'selected' : '' }}>TITL</option>
          <option value="TKJ" {{ old('jurusan') == 'TKJ' ? 'selected' : '' }}>TKJ</option>
        </select>
      </div>

      <div class="form-group">
        <label class="form-label">Password</label>
        <input 
          type="password" 
          name="password" 
          class="form-control" 
          required 
          minlength="6"
          placeholder="Minimal 6 karakter"
        >
      </div>

      <div class="form-group">
        <label class="form-label">Konfirmasi Password</label>
        <input 
          type="password" 
          name="password_confirmation" 
          class="form-control" 
          required 
          minlength="6"
          placeholder="Masukkan password lagi"
        >
      </div>

      <button type="submit" class="btn-primary">Daftar Sekarang</button>
    </form>

    <hr>

    <div class="login-link">
      <a href="/login">Sudah punya akun? Masuk sekarang →</a>
    </div>
  </div>
</div>
@endsection