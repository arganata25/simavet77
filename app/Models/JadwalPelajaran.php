<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class JadwalPelajaran extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'jadwal_pelajaran';

    protected $fillable = [
        'kelas_id',
        'mata_pelajaran_id',
        'guru_id',
        'tahun_ajaran_id',
        'hari',
        'jam_mulai',
        'jam_selesai'
    ];

    // =========================
    // RELASI
    // =========================

    public function guru()
    {
        return $this->belongsTo(Guru::class);
    }

    public function kelas()
    {
        return $this->belongsTo(Kelas::class);
    }

    public function mapel()
    {
        return $this->belongsTo(MataPelajaran::class, 'mata_pelajaran_id');
    }

    public function nilai()
    {
        return $this->hasMany(Nilai::class);
    }
}