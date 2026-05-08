<?php

use Illuminate\Support\Facades\Route;
use App\Models\Presensi;
use Illuminate\Http\Request;

Route::get('/', function () {
    // Ambil data terbaru dari database untuk ditampilkan di tabel
    $semuaPresensi = Presensi::latest()->get();
    return view('welcome', compact('semuaPresensi'));
});

// Route khusus untuk menerima input dari formulir web
Route::post('/simpan-presensi', function (Request $request) {
    Presensi::create($request->all());
    return redirect('/')->with('sukses', 'Data presensi berhasil disimpan!');
});