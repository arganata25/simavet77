<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Siswa;
use Illuminate\Support\Facades\Hash;

class SiswaSeeder extends Seeder
{
    public function run(): void
    {
        for ($i = 1; $i <= 100; $i++) {

            // Buat user
            $user = User::create([
                'name' => 'Siswa ' . $i,
                'email' => 'siswa' . $i . '@mail.com',
                'password' => Hash::make('12345678'),
                'role' => 'siswa',
                'is_active' => true,
            ]);

            // Buat siswa (relasi ke user)
            Siswa::create([
                'user_id' => $user->id,
                'nama' => 'Siswa ' . $i,
                'doc_ktp' => rand(0,1),
                'doc_kk' => rand(0,1),
                'doc_nisn' => rand(0,1),
            ]);
        }
    }
}