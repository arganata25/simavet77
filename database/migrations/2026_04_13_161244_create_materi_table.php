<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    // File: database/migrations/xxxx_xx_xx_xxxxxx_create_tugas_table.php
public function up(): void
{
    Schema::create('tugas', function (Blueprint $table) {
        $table->id();
        $table->foreignId('guru_id')->constrained('guru')->onDelete('cascade');
        $table->foreignId('kelas_id')->constrained('kelas')->onDelete('cascade');
        $table->string('judul');
        $table->text('deskripsi');
        $table->string('file_pendukung')->nullable(); // File soal dari guru
        $table->dateTime('tenggat_waktu');
        $table->timestamps();
    });

    Schema::create('pengumpulan_tugas', function (Blueprint $table) {
        $table->id();
        $table->foreignId('tugas_id')->constrained('tugas')->onDelete('cascade');
        $table->foreignId('siswa_id')->constrained('siswa')->onDelete('cascade');
        $table->string('file_jawaban'); // File jawaban dari siswa
        $table->integer('nilai')->nullable();
        $table->text('komentar_guru')->nullable();
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('materi');
    }
};
