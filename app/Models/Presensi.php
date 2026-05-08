<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Presensi extends Model
{
    use HasFactory;
    // Tambahkan baris ini:
    protected $guarded = [];
}
