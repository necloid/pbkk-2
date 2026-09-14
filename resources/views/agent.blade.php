@extends('layouts.app')

@php
    $namaPlatform = 'Agentic Network Security Harness';
    $tagline = 'Autonomous Security Intelligence & Adaptive Investigation Engine';
    $deskripsi = 'Platform investigasi keamanan cerdas yang menggabungkan agen berbasis LLM, skill keamanan khusus, tools native, dan integrasi MCP untuk mengotomatisasi rekonaisans jaringan, analisis kerentanan, dan investigasi log.';
    $alurKerja = ['Understand', 'Plan', 'Execute', 'Observe', 'Analyze', 'Investigate', 'Report'];
    $caraKerja = [
        'User mendefinisikan objektif (mis. mencari kerentanan port, analisis log keamanan, identifikasi titik masuk serangan).',
        'Context Resolver menentukan target, direktori, scope, timeframe, dan data yang tersedia — bertanya ke user bila konteks kurang.',
        'Agent Planner menyusun rencana investigasi berbasis LLM, yang dapat berubah seiring ditemukannya bukti baru.',
        'Tool Registry memilih tool yang sesuai — baik built-in security tools maupun MCP server eksternal.',
        'Hasil tool diubah menjadi artifact terstruktur, dikorelasikan lintas scan/log/data jaringan.',
        'Loop iteratif Observe → Reason → Act menentukan apakah investigasi lanjutan diperlukan.',
        'Reporter menghasilkan temuan berbasis bukti, timeline serangan, tingkat keyakinan, dan rekomendasi langkah berikutnya.',
    ];
    $arsitektur = 'User → Skill → Context Resolver → Agent Planner → Policy Engine → Tool Registry → Tools/MCP → Evidence → Agent → Report';
    $komponen = [
        'Skills'           => 'Spesialisasi kemampuan domain keamanan siber.',
        'Agent'            => 'Inti reasoning bertenaga LLM untuk pengambilan keputusan adaptif.',
        'Context Resolver' => 'Resolusi scope, parameter target, dan data kontekstual.',
        'Tool Registry'    => 'Manajemen antarmuka tool native & eksternal.',
        'MCP Integration'  => 'Protokol Model Context Protocol untuk orkestrasi alat.',
        'Policy Engine'    => 'Validasi keamanan guardrail dan batasan wewenang eksekusi.',
        'Artifact System'  => 'Penyimpanan bukti terstruktur & jejak investigasi.',
        'Memory'           => 'Penyimpanan state jangka pendek dan jangka panjang.',
        'Reporter'         => 'Sintesis laporan audit komprehensif berbasis bukti.',
    ];
    $keunggulan = 'Otomasi keamanan tradisional mengikuti pipeline tetap Scan → Parse → Report; harness ini memungkinkan Objective → Reason → Investigate → Discover → Adapt → Correlate → Report — agent beradaptasi terhadap temuan nyata, bukan menjalankan alur statis berulang kali.';
@endphp

@section('title', 'Ide Platform Agentic AI — ' . ($tema ?: 'General Assistant Agent'))

@section('content')
<div class="container">

    <section class="agent-hero">
        <h1 class="heading-mixed" style="font-size: clamp(2rem, 4vw, 3.2rem);">
            Agentic Network Security <span class="serif-italic">Harness</span>
        </h1>

        <p class="subtitle-lead" style="margin: 0 auto;">
            {{ $deskripsi }}
        </p>
    </section>

    <section class="workflow-bar">
        <div style="display: flex; justify-content: space-between; align-items: center; flex-wrap: wrap; gap: 12px;">
            <div style="font-size: 0.75rem; text-transform: uppercase; letter-spacing: 0.08em; color: var(--text-muted); font-weight: 700;">
                🔄 Alur Kerja Inti Otonom (Adaptive Loop)
            </div>
            <span class="badge-popular">Dynamic Tool Reasoning</span>
        </div>
        <div class="steps-chain">
            @foreach($alurKerja as $idx => $step)
                <div class="step-pill">
                    <span style="font-family: var(--font-mono); font-size: 0.7rem; color: #a1a1aa;">0{{ $idx + 1 }}</span>
                    <span>{{ $step }}</span>
                </div>
                @if(!$loop->last)
                    <span class="step-sep">→</span>
                @endif
            @endforeach
        </div>
    </section>

    <section class="concept-grid">
        
        <div class="card-surface">
            <div class="pill-tag">📋 7 Tahap Operasional</div>
            <h2 style="font-size: 1.4rem; font-weight: 700; color: #ffffff; margin-bottom: 8px;">
                Cara Kerja Singkat
            </h2>
            <p style="font-size: 0.88rem; color: var(--text-secondary); margin-bottom: 16px;">
                Agent secara dinamis mengevaluasi bukti temuan di setiap iterasi tanpa terikat skrip kaku:
            </p>

            <div class="numbered-list">
                @foreach($caraKerja as $index => $stepDesc)
                <div class="numbered-item">
                    <div class="item-num">{{ $index + 1 }}</div>
                    <div class="item-text">{{ $stepDesc }}</div>
                </div>
                @endforeach
            </div>
        </div>

        <div style="display: flex; flex-direction: column; gap: 24px;">
            
            <div class="card-surface">
                <div class="pill-tag">🏛️ Topologi Arsitektur</div>
                <h2 style="font-size: 1.4rem; font-weight: 700; color: #ffffff; margin-bottom: 8px;">
                    Aliran Data & Kontrol
                </h2>
                <p style="font-size: 0.88rem; color: var(--text-secondary);">
                    Integrasi end-to-end dari user input hingga laporan investigasi terverifikasi:
                </p>

                <div class="arch-diagram">
User
 ↓
Skill (Domain Knowledge)
 ↓
Context Resolver
 ↓
Agent Planner (LLM Reasoning)
 ↓
Policy Engine (Guardrails & Limits)
 ↓
Tool Registry & MCP Integration
 ↓
Tools Execution → Evidence Gathered
 ↓
Agent Correlation & Reasoning Loop
 ↓
Reporter (Audit & Recommendations)
                </div>
            </div>

            <div class="card-surface" style="background: linear-gradient(135deg, rgba(25, 25, 32, 0.9), rgba(16, 16, 20, 0.9)); border-color: rgba(255, 255, 255, 0.15);">
                <div class="pill-tag">⚡ Keunggulan Kompetitif</div>
                <h2 style="font-size: 1.25rem; font-weight: 700; color: #ffffff; margin-bottom: 8px;">
                    Mengapa Bukan Scanner Konvensional?
                </h2>
                <p style="font-size: 0.88rem; color: var(--text-secondary); line-height: 1.6;">
                    {{ $keunggulan }}
                </p>
            </div>

        </div>

    </section>

    <section>
        <div style="text-align: center; margin-bottom: 24px;">
            <div class="pill-tag">🧩 Modul Sistem</div>
            <h2 class="heading-mixed" style="font-size: 2rem; margin-bottom: 8px;">
                9 Komponen Utama <span class="serif-italic">Platform</span>
            </h2>
            <p style="color: var(--text-secondary); font-size: 0.9rem;">
                Setiap komponen dirancang modular dan decoupling untuk fleksibilitas integrasi security tools.
            </p>
        </div>

        <div class="components-grid">
            @foreach($komponen as $compName => $compDesc)
            <div class="component-card">
                <div class="comp-title">
                    <span style="color: #60a5fa;">●</span>
                    <span>{{ $compName }}</span>
                </div>
                <div class="comp-desc">{{ $compDesc }}</div>
            </div>
            @endforeach
        </div>
    </section>

</div>
@endsection
