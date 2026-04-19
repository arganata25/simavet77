<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pengumuman;
use Illuminate\Support\Facades\Auth;

class PengumumanController extends Controller
{
    public function index()
    {
        // Menampilkan semua pengumuman
        $pengumuman = Pengumuman::latest()->paginate(10);
        return view('admin.pengumuman.index', compact('pengumuman'));
    }

    public function create()
    {
        // Menampilkan halaman form "Buat Pengumuman"
        return view('admin.pengumuman.create');
    }

    public function store(Request $request)
    {
        // Validasi input dari form
        $request->validate([
            'judul' => 'required|string|max:255',
            'kategori' => 'required|string',
            'tanggal' => 'required|date',
            'isi' => 'required|string',
        ]);

        // Simpan ke database
        Pengumuman::create([
            'user_id' => Auth::id(), // ID Admin yang membuat pengumuman
            'judul' => $request->judul,
            'kategori' => $request->kategori,
            'tanggal' => $request->tanggal,
            'isi' => $request->isi,
        ]);

        return redirect()->route('admin.pengumuman.index')->with('success', 'Pengumuman baru berhasil dipublikasikan!');
    }
}