<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use illuminate\Database\Eloquent\Factories\HasFactory;

class JadwalPelajaran extends Model {
    use HasFactory, SoftDeletes;

    protected $table = 'jadwal_pelajaran';
    protected $fillable = [
        'kelas_id',
        'mata_pelajaran_id',
        'guru_id',
        'hari',
        'jam_mulai',
        'jam_selesai'
    ];

    public function jadwalPelajaran(){
        return $this->hasMany(JadwalPelajaran::class);
    }
    public function nilai(){
        return $this->hasMany(Nilai::class);
    }
}

    