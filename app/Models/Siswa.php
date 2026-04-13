<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use illuminate\Database\Eloquent\Factories\HasFactory;

use App\Models\Kelas;
use App\Models\Nilai;
use App\Models\Absensi;
use App\Models\User;

class Siswa extends Model{
    use HasFactory, SoftDeletes;

    protected $table = 'siswa';
    protected $fillable = [
        'user_id','kelas_id','nis','nisn','nama_lengkap','jenis_kelamin','tanggal_lahir',
        'alamat','no_hp_siswa','no_hp_ortu','foto','status'
    ];
    protected $casts = ['tanggal_lahir' => 'date'];
    public function user(){ return $this->belongsTo(User::class); }
    public function kelas(){ return $this->belongsTo(Kelas::class); }
    public function nilai(){return $this->hasMany(Nilai::class); }
   
    public function absensi()
    {
        return $this->hasMany(Absensi::class);
    }

    public function getRataNilaiAttribute(): float{
        return $this->nilai()->avg('nilai_akhir') ?? 0;
    }
    public function getPresentaseHadirAttribute(): float{
        $total = $this->absensi()->count();
        if($total === 0) return 100.0;
        $hadir = $this->absensi()->where('status', 'Hadir')->count();
        return round(($hadir / $total) * 100, 1);   
    }
    public function getDokumenStatus()
    {
    return [
        'ktp' => $this->doc_ktp,
        'kk' => $this->doc_kk,
        'nisn' => $this->doc_nisn,
    ];
}
}