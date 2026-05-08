<?php

namespace App\Http\Controllers;

use App\Models\Presensi;
use Illuminate\Http\Request;

class PresensiController extends Controller
{
    // Endpoint 1: Menampilkan semua data presensi kelas
    public function index()
    {
        $data = Presensi::all();
        return response()->json([
            'pesan' => 'Berhasil mengambil data presensi kelas',
            'data' => $data
        ], 200);
    }

    // Endpoint 2: Menginput presensi mahasiswa baru
    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'nama_mahasiswa' => 'required|string',
            'nim' => 'required|string',
            'mata_kuliah' => 'required|string',
            'pertemuan_ke' => 'required|string',
            'status' => 'required|in:Hadir,Izin,Sakit,Alpa',
        ]);

        $presensi = Presensi::create($request->all());

        return response()->json([
            'pesan' => 'Presensi kelas berhasil dicatat',
            'data' => $presensi
        ], 201);
    }

    // Endpoint 3: Menampilkan rekap/statistik kehadiran per mata kuliah
    public function rekap($mata_kuliah)
    {
        $totalHadir = Presensi::where('mata_kuliah', $mata_kuliah)
                              ->where('status', 'Hadir')
                              ->count();

        return response()->json([
            'mata_kuliah' => $mata_kuliah,
            'total_mahasiswa_hadir' => $totalHadir
        ], 200);
    }

    // Endpoint Wajib: Health Check
    public function kesehatan()
    {
        return response()->json([
            'status' => 'sehat',
            'layanan' => 'API Presensi Kelas',
            'waktu' => now()
        ], 200);
    }
}