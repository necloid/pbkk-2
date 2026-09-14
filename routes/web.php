<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes — PBKK Pertemuan 2 (Local Routing Sandbox)
|--------------------------------------------------------------------------
| Mahasiswa : Fayza Lathifah Humam
| NRP       : 5025241094
| Jurusan   : Teknik Informatika — FTEIC ITS
|--------------------------------------------------------------------------
*/

// Rute 1: Home — sambutan dan ringkasan profil mahasiswa
Route::get('/', function () {
    return view('home', [
        'nama'    => 'Fayza Lathifah Humam',
        'nrp'     => '5025241094',
        'jurusan' => 'Teknik Informatika',
    ]);
})->name('home');

// Grup rute profil akademis — semua URL otomatis diawali /dashboard/...
Route::prefix('dashboard')->group(function () {

    // Rute 2: Detail profil mahasiswa (wajib, regex 10 digit)
    Route::get('/mahasiswa/{nrp}', function ($nrp) {
        return view('mahasiswa', compact('nrp'));
    })->where('nrp', '[0-9]{10}')
      ->name('mahasiswa.profil');

    // Rute 3: Ide platform Agentic AI (opsional, default: General Assistant Agent)
    Route::get('/agent/{tema?}', function ($tema = 'General Assistant Agent') {
        return view('agent', compact('tema'));
    })->name('agent.ide');

    // Rute 4: Kalkulator IPK (dua parameter desimal, perhitungan di closure)
    Route::get('/hitung-ipk/{ipk1}/{ipk2}', function ($ipk1, $ipk2) {
        $total = (float) $ipk1 + (float) $ipk2;
        $rata2 = $total / 2;
        return view('ipk', compact('ipk1', 'ipk2', 'total', 'rata2'));
    })->where([
        'ipk1' => '[0-9]+(\.[0-9]+)?',
        'ipk2' => '[0-9]+(\.[0-9]+)?'
    ])->name('ipk.hitung');

});

// Fallback — menangani URL tidak terdaftar dengan halaman 404 ramah pengguna
Route::fallback(function () {
    return response()->view('errors.fallback', [], 404);
});
