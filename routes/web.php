<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PresensiController;

// Endpoint Health Check (Syarat wajib ada)
Route::get('/kesehatan', [PresensiController::class, 'kesehatan']);

// Endpoint Presensi
Route::get('/presensi', [PresensiController::class, 'index']);
Route::post('/presensi', [PresensiController::class, 'store']);
Route::get('/presensi/rekap/{mata_kuliah}', [PresensiController::class, 'rekap']);

Route::get('/', function () {
    return view('welcome');
});
