<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration{
    public function up(): void
    {
        Schema::create('pengumuman', function (Blueprint $table) {
            $table->id();
            $table->string('judul', 200);
            $table->text('konten');
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->enum('target', ['semua', 'siswa', 'guru'])->default('semua');
            $table->boolean('is_active')->default(true);
            $table->datetime('published_at')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
