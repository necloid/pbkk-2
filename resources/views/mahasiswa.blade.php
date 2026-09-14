@extends('layouts.app')

@php
    $isOwner = ($nrp === '5025241094');
    $nama = $isOwner ? 'Fayza Lathifah Humam' : 'Mahasiswa Informatika ITS (' . $nrp . ')';
    $angkatan = $isOwner ? '2024' : '20' . substr($nrp, 4, 2);
    $prodi = 'Teknik Informatika';
    $fakultas = 'Fakultas Teknologi Elektro dan Informatika Cerdas (FTEIC)';
    $universitas = 'Institut Teknologi Sepuluh Nopember (ITS)';
    $semester = 5;

    // Daftar 7 Mata Kuliah yang diambil semester ini
    $mataKuliah = [
        ['kode' => 'IF234401', 'nama' => 'Framework-Based Programming', 'sks' => 3, 'kategori' => 'Keahlian Wajib'],
        ['kode' => 'IF234402', 'nama' => 'Knowledge Based System Engineering', 'sks' => 3, 'kategori' => 'Keahlian Pilihan'],
        ['kode' => 'IF234403', 'nama' => 'Multivariate Data Analysis', 'sks' => 3, 'kategori' => 'Analisis Data'],
        ['kode' => 'IF234404', 'nama' => 'Data Mining', 'sks' => 3, 'kategori' => 'Kecerdasan Artifisial'],
        ['kode' => 'IF234405', 'nama' => 'Modeling and Simulation', 'sks' => 3, 'kategori' => 'Komputasi'],
        ['kode' => 'IF234406', 'nama' => 'Computer Graphics', 'sks' => 3, 'kategori' => 'Visualisasi'],
        ['kode' => 'IF234407', 'nama' => 'Information Security', 'sks' => 3, 'kategori' => 'Keamanan Siber'],
    ];
@endphp

@section('title', 'Profil Mahasiswa — ' . $nama)

@section('content')
<div class="container profile-hero">

    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 24px; flex-wrap: wrap; gap: 12px;">
        <div>
            <a href="{{ route('home') }}" class="btn-pill-secondary" style="padding: 6px 16px; font-size: 0.8rem;">← Kembali ke Home</a>
        </div>
    </div>

    <div class="profile-layout">
        
        <aside class="id-card">
            <div class="id-avatar-frame">
                👩‍🎓
            </div>
            <h2 class="id-name">{{ $nama }}</h2>
            <div style="text-align: center;">
                <span class="id-nrp-badge">{{ $nrp }}</span>
            </div>

            <div class="id-detail-list">
                <div class="id-detail-row">
                    <span class="key">Angkatan</span>
                    <span class="val">{{ $angkatan }}</span>
                </div>
                <div class="id-detail-row">
                    <span class="key">Program Studi</span>
                    <span class="val">{{ $prodi }}</span>
                </div>
                <div class="id-detail-row">
                    <span class="key">Fakultas</span>
                    <span class="val">{{ $fakultas }}</span>
                </div>
                <div class="id-detail-row">
                    <span class="key">Perguruan Tinggi</span>
                    <span class="val">{{ $universitas }}</span>
                </div>
                <div class="id-detail-row">
                    <span class="key">Semester Berjalan</span>
                    <span class="val">Semester {{ $semester }}</span>
                </div>
            </div>

            <div style="margin-top: 24px; padding-top: 20px; border-top: 1px solid var(--border-subtle);">
                <a href="{{ route('agent.ide', ['tema' => 'security']) }}" class="btn-pill-primary" style="width: 100%; justify-content: center; font-size: 0.88rem;">
                    <span>Lihat Rencana Agentic AI</span>
                    <span>⚡</span>
                </a>
            </div>
        </aside>

        <section>
            
            <div class="courses-header">
                <div>
                    <h1 class="heading-mixed" style="font-size: 2.3rem; margin-bottom: 6px;">
                        Mata Kuliah <span class="serif-italic">Semester 5</span>
                    </h1>
                    <p style="color: var(--text-secondary); font-size: 0.95rem;">
                        Daftar 7 mata kuliah yang ditempuh pada semester ini di Departemen Teknik Informatika ITS.
                    </p>
                </div>
            </div>

            <div class="course-grid">
                @foreach($mataKuliah as $mk)
                <div class="course-card">
                    <div>
                        <span class="course-code">{{ $mk['kode'] }}</span>
                        <h3 class="course-title">{{ $mk['nama'] }}</h3>
                    </div>
                    <div class="course-meta-row">
                        <span>{{ $mk['kategori'] }}</span>
                        <span class="sks-pill">{{ $mk['sks'] }} SKS</span>
                    </div>
                </div>
                @endforeach
            </div>

        </section>

    </div>

</div>
@endsection
