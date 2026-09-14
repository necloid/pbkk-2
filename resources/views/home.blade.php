@extends('layouts.app')

@section('title', 'Home — Profil Mahasiswa ITS')

@section('content')
<div class="container">
    
    <section class="hero-section">
        <br>
        <h1 class="heading-mixed hero-heading">
            Hello! Welcome To <br>
            <span class="serif-italic">ITS Academic Profile</span>
        </h1>

        <br>

        <p class="subtitle-lead hero-desc">
            Selamat datang di portal akademik <strong>{{ $nama }}</strong>. Platform ini merupakan local routing sandbox Laravel untuk mata kuliah Pemrograman Berbasis Kerangka Kerja (PBKK), mengeksplorasi routing dinamis, prefix grouping, regex constraints, dan rancangan sistem Agentic AI.
        </p>

        <div class="hero-buttons">
            <a href="{{ route('mahasiswa.profil', ['nrp' => $nrp]) }}" class="btn-pill-primary">
                <span>Lihat Profil Akademik</span>
                <span>→</span>
            </a>
            <a href="{{ route('agent.ide', ['tema' => 'security']) }}" class="btn-pill-secondary">
                <span>Agentic AI Platform</span>
            </a>
            <a href="{{ route('ipk.hitung', ['ipk1' => '3.85', 'ipk2' => '3.95']) }}" class="btn-pill-secondary">
                <span>Simulasi IPK</span>
            </a>
        </div>
    </section>

    <section class="profile-banner">
        <div class="student-card">
            <div>
                <div class="student-meta">
                    <div class="avatar-chrome">👩‍💻</div>
                    <div class="student-info">
                        <h3>{{ $nama }}</h3>
                        <p>{{ $jurusan }} Angkatan 2024</p>
                        <p style="font-size: 0.82rem; color: #71717a; margin-top: 2px;">Institut Teknologi Sepuluh Nopember (ITS)</p>
                    </div>
                </div>

                <div class="student-spec-grid">
                    <div class="spec-item">
                        <span class="label">NRP</span>
                        <span class="value">{{ $nrp }}</span>
                    </div>
                    <div class="spec-item">
                        <span class="label">Program Studi</span>
                        <span class="value">{{ $jurusan }}</span>
                    </div>
                    <div class="spec-item">
                        <span class="label">Departemen</span>
                        <span class="value">Teknik Informatika</span>
                    </div>
                    <div class="spec-item">
                        <span class="label">Fakultas</span>
                        <span class="value">FTEIC ITS</span>
                    </div>
                </div>
            </div>

            <div style="margin-top: 28px;">
                <a href="{{ route('mahasiswa.profil', ['nrp' => $nrp]) }}" class="btn-pill-primary" style="width: 100%; justify-content: center;">
                    <span>Buka Profil Mahasiswa</span>
                    <span>→</span>
                </a>
            </div>
        </div>

        <div class="student-card card-glow-accent">
            <div>
                <h3 style="font-size: 1.45rem; font-weight: 700; color: #ffffff; margin-bottom: 8px;">
                    Agentic Network Security Harness
                </h3>
                <p style="color: var(--text-secondary); font-size: 0.92rem; line-height: 1.6; margin-bottom: 20px;">
                    Arsitektur agen otonom bertenaga LLM yang memadukan MCP (Model Context Protocol), Policy Engine, dan alur investigasi dinamis untuk deteksi ancaman keamanan siber secara adaptif.
                </p>

                <div style="background: rgba(0,0,0,0.4); border: 1px solid var(--border-subtle); border-radius: 14px; padding: 16px; margin-bottom: 20px;">
                    <div style="font-size: 0.72rem; text-transform: uppercase; color: var(--text-muted); margin-bottom: 6px; letter-spacing: 0.05em;">
                        Alur Eksekusi Adaptif
                    </div>
                    <div style="font-family: var(--font-mono); font-size: 0.78rem; color: #e4e4e7; line-height: 1.5;">
                        Understand → Plan → Execute → Observe → Analyze → Investigate → Report
                    </div>
                </div>
            </div>

            <div style="display: flex; gap: 12px; flex-wrap: wrap;">
                <a href="{{ route('agent.ide', ['tema' => 'security']) }}" class="btn-pill-primary" style="flex: 1; justify-content: center;">
                    <span>Lihat Spesifikasi Agent</span>
                </a>
            </div>
        </div>
    </section>

</div>
@endsection
