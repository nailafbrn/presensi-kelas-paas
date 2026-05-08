<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Presensi extends Model
{
    // BARIS INI SANGAT PENTING: Paksa Laravel pakai nama 'presensi' (tanpa s)
    protected $table = 'presensi'; 
    
    protected $fillable = ['nama_mahasiswa', 'nim', 'mata_kuliah', 'pertemuan_ke', 'status'];
}