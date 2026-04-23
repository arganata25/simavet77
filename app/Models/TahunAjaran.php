<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class TahunAjaran extends Model
{
    use HasFactory;

    protected $table = 'tahun_ajaran';
    

    protected $fillable = [
        'nama',
        'tahun',
        'semester',
        'is_aktif',
        'tanggal_mulai',
        'tanggal_selesai'

    ];

    public function kelas()
    {
        return $this->hasMany(Kelas::class);
    }
}