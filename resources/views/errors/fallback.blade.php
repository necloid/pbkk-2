@extends('layouts.app')

@section('title', '404 — Halaman Tidak Ditemukan')

@section('content')
<div class="container fallback-wrapper">

    <div class="fallback-card">

        <div class="error-code">404</div>

        <h1 class="heading-mixed" style="font-size: clamp(1.8rem, 3.5vw, 2.4rem); margin-bottom: 12px;">
            Halaman Tidak <span class="serif-italic">Ditemukan</span>
        </h1>

        <p style="color: var(--text-secondary); font-size: 0.95rem; line-height: 1.6; max-width: 540px; margin: 0 auto;">
            Permintaan yang Anda kirimkan tidak cocok dengan pola rute yang terdaftar pada sistem <strong>Local Routing Sandbox Laravel</strong>.
        </p>

        <div class="diagnostics-box">
            <div class="diag-row">
                <span class="diag-label">Metode HTTP</span>
                <span style="color: #ffffff; font-family: var(--font-mono); font-weight: 700;">{{ request()->method() }}</span>
            </div>
            <div class="diag-row">
                <span class="diag-label">Path URL</span>
                <span class="diag-val">/{{ request()->path() }}</span>
            </div>
            <div class="diag-row">
                <span class="diag-label">Status Kode</span>
                <span style="color: #f87171; font-family: var(--font-mono); font-weight: 700;">404 Not Found</span>
            </div>
        </div>

        <div style="display: flex; gap: 12px; justify-content: center; flex-wrap: wrap;">
            <a href="{{ route('home') }}" class="btn-pill-primary">
                <span>Kembali ke Halaman Utama</span>
                <span>→</span>
            </a>
        </div>

    </div>

</div>
@endsection
