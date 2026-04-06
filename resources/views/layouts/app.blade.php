<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Aplikasi Pengaduan Sarana Sekolah')</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body>
    <nav style="background: #f3f4f6; padding: 10px; margin-bottom: 20px;">
        <a href="/login" style="margin-right: 10px;">Login Siswa</a>
        <a href="/admin/login" style="margin-right: 10px;">Login Admin</a>
        @if(session('siswa_nis'))
            <span>Siswa: {{ session('siswa_nis') }} | <a href="/aspirasi" style="margin-right: 10px;">Aspirasi</a> | <a href="/logout">Logout Siswa</a></span>
        @endif
        @if(session('admin_logged'))
            <span>Admin | <a href="/admin" style="margin-right: 10px;">Dashboard</a> | <a href="/admin/logout">Logout Admin</a></span>
        @endif
    </nav>

    @if (session('success'))
        <div style="background: green; color: white; padding: 10px; margin-bottom: 10px;">
            {{ session('success') }}
        </div>
    @endif

    <main>
        @yield('content')
    </main>
</body>
</html>

