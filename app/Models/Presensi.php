<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Presensi extends Model
{
    // Ini agar Laravel tahu tabel mana yang dipakai dan kolom apa saja yang boleh diisi
    protected $table = 'presensi';
    protected $fillable = ['nama_mahasiswa', 'nim', 'mata_kuliah', 'pertemuan_ke', 'status'];
}