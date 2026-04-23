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
    Schema::create('pengumuman', function (Blueprint $table) {
        $table->id();
        $table->foreignId('user_id')->constrained()->cascadeOnDelete();
        $table->string('judul');
        $table->text('isi');
        $table->string('kategori');
        $table->date('tanggal');
        $table->enum('prioritas', ['biasa','sedang','penting'])->default('biasa');
        $table->boolean('is_active')->default(true);
        $table->timestamps();
    });
}
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pengumuman');
    }
};
