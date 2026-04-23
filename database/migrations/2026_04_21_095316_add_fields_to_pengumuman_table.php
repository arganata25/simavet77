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
    Schema::table('pengumuman', function (Blueprint $table) {

        if (!Schema::hasColumn('pengumuman', 'isi')) {
            $table->text('isi')->nullable();
        }

        if (!Schema::hasColumn('pengumuman', 'kategori')) {
            $table->string('kategori')->nullable();
        }

        if (!Schema::hasColumn('pengumuman', 'prioritas')) {
            $table->enum('prioritas', ['biasa','sedang','penting'])->default('biasa');
        }

        });
    }
};
