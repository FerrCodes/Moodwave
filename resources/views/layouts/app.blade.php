<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Moodwave')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body { font-family: 'Inter', sans-serif; background: #0B1120; color: #fff; display: flex; height: 100vh; overflow: hidden; }
        .sidebar { width: 240px; background: #1E293B; padding: 24px 16px; display: flex; flex-direction: column; height: 100vh; border-right: 1px solid #334155; }
        .sidebar .logo { font-size: 24px; font-weight: bold; color: #fff; margin-bottom: 40px; }
        .sidebar nav a { display: block; padding: 12px 16px; color: #94A3B8; text-decoration: none; border-radius: 8px; margin-bottom: 4px; }
        .sidebar nav a:hover { background: #334155; color: #fff; }
        .sidebar nav a.active { background: #06B6D4; color: #fff; font-weight: bold; }
        .sidebar nav a:last-child { margin-top: auto; }
        .main { flex: 1; padding: 32px 48px; overflow-y: auto; background: #0B1120; }
        .main h1 { font-size: 28px; font-weight: bold; color: #fff; margin-bottom: 24px; }
        .card { background: #1E293B; padding: 20px; border-radius: 12px; margin-bottom: 16px; }
    </style>
</head>
<body>
    <aside class="sidebar">
        <div class="logo">MOODWAVE</div>
        <nav>
            <a href="{{ route('dashboard') }}" class="{{ request()->routeIs('dashboard') ? 'active' : '' }}">🏠 Beranda</a>
            <a href="{{ route('notes.create') }}" class="{{ request()->routeIs('notes.create') ? 'active' : '' }}">📝 Catatan Baru</a>
            <a href="{{ route('notes.index') }}" class="{{ request()->routeIs('notes.index') ? 'active' : '' }}">📂 Arsip</a>
            <a href="{{ route('profile.edit') }}" class="{{ request()->routeIs('profile.edit') ? 'active' : '' }}">👤 Profil</a>
        </nav>
    </aside>
    <main class="main">
        @yield('content')
    </main>
</body>
</html>