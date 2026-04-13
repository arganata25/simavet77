<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration{
    public function up(): void
    {
        Schema::create('kelas', function (Blueprint $table) {
            $table->id();
            $table->string('nama', 20);
            $table->enum('tingkat', ['X', 'XI', 'XII']);
            $table->string('jurusan', 50);
            $table->integer('kapasitas')->default(36);
            $table->foreignId('wali_kelas_id')->nullable()->constrained('guru');
            $table->foreignId('tahun_ajaran_id')->constrained('tahun_ajaran');
            $table->timestamps();
            $table->softDeletes();
        });
    }
    
    public function down(): void
    {
        Schema::dropIfExists('kelas');
    }
};
