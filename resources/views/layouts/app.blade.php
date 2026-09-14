<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'PBKK Sandbox') — ITS Surabaya</title>
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,600;0,800;1,400;1,700&family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&family=JetBrains+Mono:wght@400;500;600&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('style.css') }}">
</head>
<body>

    <header class="navbar-wrapper">
        <div class="navbar-outer">
            <a href="{{ route('home') }}" class="brand-logo">
                <span class="logo-serif">profile</span><span class="logo-bold">ITS</span>
            </a>

            <nav class="nav-pill">
                <a href="{{ route('home') }}" class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}">Home</a>
                <a href="{{ route('mahasiswa.profil', ['nrp' => '5025241094']) }}" class="nav-link {{ request()->routeIs('mahasiswa.profil') ? 'active' : '' }}">Profil Mahasiswa</a>
                <a href="{{ route('agent.ide') }}" class="nav-link {{ request()->routeIs('agent.ide') ? 'active' : '' }}">Agentic AI</a>
                <a href="{{ route('ipk.hitung', ['ipk1' => '3.85', 'ipk2' => '3.95']) }}" class="nav-link {{ request()->routeIs('ipk.hitung') ? 'active' : '' }}">Kalkulator IPK</a>
            </nav>
        </div>
    </header>

    <main>
        @yield('content')
    </main>

    <footer>
        <div class="container footer-content">
            <div>
                <p><strong>PBKK Pertemuan 2 — Local Routing Sandbox</strong></p>
                <p>Departemen Teknik Informatika — FTEIC — Institut Teknologi Sepuluh Nopember (ITS), 2026</p>
                <p style="margin-top: 4px; font-size: 0.78rem; color: #52525b;">Mahasiswa: Fayza Lathifah Humam (NRP: 5025241094)</p>
            </div>
            <div class="footer-links">
                <a href="{{ route('home') }}">Home</a>
                <a href="{{ route('mahasiswa.profil', ['nrp' => '5025241094']) }}">Profil</a>
                <a href="{{ route('agent.ide', ['tema' => 'security']) }}">Agent Security</a>
                <a href="{{ route('ipk.hitung', ['ipk1' => '4.00', 'ipk2' => '3.90']) }}">Hitung IPK</a>
            </div>
        </div>
    </footer>

</body>
</html>
