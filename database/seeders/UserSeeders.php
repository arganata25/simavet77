<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Guru;
use Illuminate\Support\Facades\Hash;

class UserSeeders extends Seeder {
    public function run(): void {
        User::create([
            'name' => 'Administrator',
            'email' => 'admin@smkveteran.sch.id.com',
            'password' => Hash::make('password'),
            'role' => 'admin',
            'is_active' => true,
        ]);
        User::create([
            'name' => 'Kepala_sekolah',
            'email' => 'kepsek@smkveteran.sch.id.com',
            'password' => Hash::make('password'),
            'role' => 'kepala_sekolah',
            'is_active' => true,
        ]);
        $guruUser = User::create([
            'name' => 'Guru',
            'email' => 'guru@smkveteran.sch.id.com',
            'password' => Hash::make('password'),
            'role' => 'guru',
            'is_active' => true,
        ]);
        Guru::create([
            'user_id' => $guruUser->id,
            'nip' => '1234567890',
            'nama_lengkap' => 'Budi Santoso',
            'jenis_kelamin' => 'L',
        ]);
        User::create([
            'name' => 'Siswa',
            'email' => 'siswa@smkveteran.sch.id.com',
            'password' => Hash::make('password'),
            'role' => 'siswa',
            'is_active' => true,
        ]);
    }
}