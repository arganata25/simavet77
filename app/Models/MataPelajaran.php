<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class MataPelajaran extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'mata_pelajaran';

    protected $fillable = [
        'kode',
        'nama',
        'jam_per_minggu',
        'kelompok'
    ];

    protected $casts = [
        'jam_per_minggu' => 'integer'
    ];

    /*
    |--------------------------------------------------------------------------
    | RELASI
    |--------------------------------------------------------------------------
    */

    // Relasi ke jadwal pelajaran
    public function jadwalPelajaran()
    {
        return $this->hasMany(JadwalPelajaran::class);
    }

    // Relasi ke nilai
    public function nilai()
    {
        return $this->hasMany(Nilai::class);
    }

    /*
    |--------------------------------------------------------------------------
    | ACCESSOR
    |--------------------------------------------------------------------------
    */

    // Contoh: tampilkan label lengkap
    public function getLabelAttribute()
    {
        return "{$this->kode} - {$this->nama}";
    }

    /*
    |--------------------------------------------------------------------------
    | SCOPE
    |--------------------------------------------------------------------------
    */

    // Scope untuk filter berdasarkan kelompok
    public function scopeKelompok($query, $kelompok)
    {
        return $query->where('kelompok', $kelompok);
    }
}
