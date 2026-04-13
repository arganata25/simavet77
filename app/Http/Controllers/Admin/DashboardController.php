<?php       
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\{User, Guru, Siswa, Kelas, Pengumuman};

class DashboardController extends Controller
{
    public function index()
    {
        $stats = [
            'total_guru' => Guru::count(),
            'total_siswa' => Siswa::where('status', 'aktif')->count(),
            'total_kelas' => Kelas::count(),
            'total_user' => User::count()
        ];

        $pengumuman = Pengumuman::where('is_active', true)
        ->latest()
        ->take(5)
        ->get();

        return view('admin.dashboard', compact(
            'stats',
            'pengumuman'
        ));
    }
}