<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use illuminate\Database\Eloquent\Factories\HasFactory;

class Guru extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'guru';
    protected $fillable = [
        'user_id','nip','nama_lengkap','jenis_kelamin','tanggal_lahir',
        'alamat','no_hp','foto','pendidikan_terakhir','mata_pelajaran_utama'
    ];
    protected $casts = ['tanggal_lahir' => 'date'];
    public function user(){
        return $this->belongsTo(User::class);
    }
    public function kelas(){
        return $this->hasMany(Kelas::class, 'wali_kelas_id');
    }
    public function jadwal(){
        return $this->hasMany(JadwalPelajaran::class);
    }
    public function nilai(){
        return $this->hasMany(Nilai::class);
    }
}