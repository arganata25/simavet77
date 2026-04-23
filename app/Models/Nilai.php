<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Nilai extends Model
{
    use HasFactory;

    protected $table = 'nilai';

    protected $fillable = [
        'siswa_id',
        'mata_pelajaran_id',
        'tahun_ajaran_id',
        'guru_id',
        'nilai_harian',
        'nilai_uts',
        'nilai_uas',
        'nilai_akhir',
        'predikat',
        'catatan'
    ];

    public function siswa()
    {
        return $this->belongsTo(Siswa::class);
    }

    public function jadwalPelajaran()
    {
        return $this->belongsTo(JadwalPelajaran::class);
    }

    public function mataPelajaran()
    {
        return $this->belongsTo(MataPelajaran::class, 'mata_pelajaran_id');
    }

    public function guru()
    {
        return $this->belongsTo(Guru::class);
    }

    public function tahunAjaran()
    {
        return $this->belongsTo(TahunAjaran::class);
    }

    public function hitungNilaiAkhir(): float
    {
        return ($this->nilai_harian * 0.2) +
               ($this->nilai_uts * 0.3) +
               ($this->nilai_uas * 0.5);
    }
}