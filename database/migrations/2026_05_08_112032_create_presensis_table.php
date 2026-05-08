<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::create('presensis', function (Blueprint $table) {
        $table->id();
        $table->string('nama_mahasiswa');
        $table->string('nim');
        $table->string('mata_kuliah'); 
        $table->string('pertemuan_ke');
        $table->enum('status', ['Hadir', 'Izin', 'Sakit', 'Alpa']);
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('presensis');
    }
};
