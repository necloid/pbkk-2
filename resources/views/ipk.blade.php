@extends('layouts.app')

@php
    $f_ipk1 = (float) $ipk1;
    $f_ipk2 = (float) $ipk2;
    $isValidRange = ($f_ipk1 >= 0.0 && $f_ipk1 <= 4.00 && $f_ipk2 >= 0.0 && $f_ipk2 <= 4.00);
    $warningMsg = $isValidRange ? null : 'Peringatan: Nilai IPK berada di luar rentang standar akademik (0.00 – 4.00). Harap periksa kembali input Anda.';

    $predikat = 'Belum Memenuhi';
    if ($isValidRange) {
        if ($rata2 >= 3.80) {
            $predikat = 'Dengan Pujian (Summa Cum Laude)';
        } elseif ($rata2 >= 3.51) {
            $predikat = 'Sangat Memuaskan (Magna Cum Laude)';
        } elseif ($rata2 >= 3.00) {
            $predikat = 'Memuaskan';
        } else {
            $predikat = 'Cukup';
        }
    }
@endphp

@section('title', 'Kalkulator IPK Otomatis — Hasil Perhitungan')

@section('content')
<div class="container calc-hero">

    <h1 class="heading-mixed" style="font-size: clamp(2.2rem, 4.5vw, 3.4rem);">
        Kalkulator Rata-Rata <br>
        <span class="serif-italic">Prestasi Akademik</span>
    </h1>

    <p class="subtitle-lead" style="margin: 0 auto;">
        Menghitung kumulatif nilai IP dua semester secara dinamis via closure rute Laravel dan validasi presisi desimal.
    </p>
    <br>

    @if(!$isValidRange)
        <div class="alert-banner">
            <span style="font-size: 1.5rem;">⚠️</span>
            <div>
                <strong>Peringatan Validasi Rentang IPK:</strong>
                <div style="font-size: 0.85rem; margin-top: 2px;">
                    {{ $warningMsg }} (Input: Semester 1 = <code>{{ $ipk1 }}</code>, Semester 2 = <code>{{ $ipk2 }}</code>). Skala standar ITS adalah 0.00 – 4.00.
                </div>
            </div>
        </div>
    @else
        <div class="success-banner">
            <div style="display: flex; align-items: center; gap: 12px;">
                <span style="font-size: 1.5rem;">🎓</span>
                <div>
                    <span style="font-size: 0.78rem; text-transform: uppercase; letter-spacing: 0.06em; color: #4ade80; font-weight: 700;">Predikat Kelulusan</span>
                    <h3 style="font-size: 1.2rem; color: #ffffff; font-weight: 700; margin-top: 2px;">{{ $predikat }}</h3>
                </div>
            </div>
            <div class="badge-popular" style="background: rgba(34, 197, 94, 0.15); border-color: rgba(34, 197, 94, 0.4); color: #86efac;">
                Nilai Dalam Rentang Standar Wajar (0.00 – 4.00)
            </div>
        </div>
    @endif

    <div class="metrics-grid">
        <div class="metric-card">
            <div class="metric-label">IP Semester 1</div>
            <div class="metric-val">{{ number_format((float)$ipk1, 2) }}</div>
            <div style="font-size: 0.78rem; color: var(--text-muted); margin-top: 6px;">Parameter {ipk1}</div>
        </div>

        <div class="metric-card">
            <div class="metric-label">IP Semester 2</div>
            <div class="metric-val">{{ number_format((float)$ipk2, 2) }}</div>
            <div style="font-size: 0.78rem; color: var(--text-muted); margin-top: 6px;">Parameter {ipk2}</div>
        </div>

        <div class="metric-card">
            <div class="metric-label">Total Akumulasi</div>
            <div class="metric-val">{{ number_format($total, 2) }}</div>
            <div style="font-size: 0.78rem; color: var(--text-muted); margin-top: 6px;">$ipk1 + $ipk2</div>
        </div>

        <div class="metric-card highlight">
            <div class="metric-label" style="color: #ffffff;">Rata-Rata Akhir (IPK)</div>
            <div class="metric-val" style="color: #ffffff;">{{ number_format($rata2, 2) }}</div>
            <div style="font-size: 0.78rem; color: #d4d4d8; margin-top: 6px;">$total / 2</div>
        </div>
    </div>

    <div class="simulator-panel">
        <h3 style="font-size: 1.2rem; font-weight: 700; color: #ffffff; margin-bottom: 6px;">
            Simulasikan Nilai Semester Lain
        </h3>
        <p style="font-size: 0.85rem; color: var(--text-secondary); margin-bottom: 20px;">
            Masukkan dua nilai desimal untuk diarahkan langsung ke rute <code>/dashboard/hitung-ipk/{ipk1}/{ipk2}</code>.
        </p>

        <form id="ipkForm" onsubmit="event.preventDefault(); submitIpk();">
            <div class="form-row">
                <div class="form-group">
                    <label for="inputIpk1">IPK Semester 1 (0.00 – 4.00)</label>
                    <input type="number" step="0.01" min="0" max="10" id="inputIpk1" class="form-input" value="{{ $ipk1 }}" required>
                </div>
                <div class="form-group">
                    <label for="inputIpk2">IPK Semester 2 (0.00 – 4.00)</label>
                    <input type="number" step="0.01" min="0" max="10" id="inputIpk2" class="form-input" value="{{ $ipk2 }}" required>
                </div>
            </div>

            <button type="submit" class="btn-pill-primary" style="width: 100%; justify-content: center;">
                <span>Hitung Nilai Rata-Rata</span>
                <span>→</span>
            </button>
        </form>

        <div class="preset-pills">
            <span style="font-size: 0.75rem; color: var(--text-muted); align-self: center;">Preset Uji Cepat:</span>
            <a href="{{ route('ipk.hitung', ['ipk1' => '4.00', 'ipk2' => '4.00']) }}" class="preset-link">Sempurna (4.00 & 4.00)</a>
            <a href="{{ route('ipk.hitung', ['ipk1' => '3.85', 'ipk2' => '3.95']) }}" class="preset-link">Cumlaude (3.85 & 3.95)</a>
            <a href="{{ route('ipk.hitung', ['ipk1' => '3.20', 'ipk2' => '3.40']) }}" class="preset-link">Memuaskan (3.20 & 3.40)</a>
            <a href="{{ route('ipk.hitung', ['ipk1' => '4.50', 'ipk2' => '3.00']) }}" class="preset-link" style="color: #fca5a5; border-color: rgba(239, 68, 68, 0.3);">Uji Error Validasi (> 4.00)</a>
        </div>
    </div>

</div>

<script>
    function submitIpk() {
        const ipk1 = document.getElementById('inputIpk1').value;
        const ipk2 = document.getElementById('inputIpk2').value;
        if (!ipk1 || !ipk2) return;
        
        window.location.href = "{{ url('/dashboard/hitung-ipk') }}/" + encodeURIComponent(ipk1) + "/" + encodeURIComponent(ipk2);
    }
</script>
@endsection
