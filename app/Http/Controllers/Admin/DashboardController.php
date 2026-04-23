<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Schema;
use App\Models\User;
use App\Models\Guru;
use App\Models\Siswa;
use App\Models\Kelas;
use App\Models\Pengumuman;

class DashboardController extends Controller
{
    public function index()
    {
        $stats = [
            'total_guru'  => Guru::count(),
            'total_siswa' => Siswa::count(),
            'total_kelas' => Kelas::count(),
            'total_user'  => User::count(),
        ];

       $pengumuman = [];

if (Schema::hasTable('pengumuman')) {
    $pengumuman = Pengumuman::latest()->take(5)->get();
}

        return view('admin.dashboard', compact('stats', 'pengumuman'));
    }
}