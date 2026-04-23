<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pengumuman;
use Illuminate\Support\Facades\Auth;

class PengumumanController extends Controller
{
    // =========================
    // INDEX
    // =========================
    public function index(Request $request)
    {
        $query = Pengumuman::query();

        // Filter kategori
        if ($request->filled('kategori')) {
            $query->where('kategori', $request->kategori);
        }

        $pengumuman = $query->latest()->get();

        return view('admin.pengumuman.index', compact('pengumuman'));
    }

    // =========================
    // CREATE
    // =========================
    public function create()
    {
        return view('admin.pengumuman.create');
    }

    // =========================
    // STORE
    // =========================
    public function store(Request $request)
    {
        $data = $request->validate([
            'judul' => 'required|string|max:255',
            'kategori' => 'required|string',
            'tanggal' => 'required|date',
            'isi' => 'required|string',
            'prioritas' => 'required|in:biasa,sedang,penting'
        ]);

    // Tambahkan user_id otomatis
    $data['user_id'] = Auth::id();

    Pengumuman::create($data);

    return redirect()
        ->route('admin.pengumuman.index')
        ->with('success', 'Pengumuman berhasil ditambahkan');
    }

    // =========================
    // EDIT
    // =========================
    public function edit($id)
    {
        $pengumuman = Pengumuman::findOrFail($id);

        return view('admin.pengumuman.edit', compact('pengumuman'));
    }

    // =========================
    // UPDATE
    // =========================
    public function update(Request $request, $id)
    {
        $pengumuman = Pengumuman::findOrFail($id);

        $data = $request->validate([
            'judul' => 'required|string|max:255',
            'kategori' => 'required|string',
            'tanggal' => 'required|date',
            'isi' => 'required|string',
            'prioritas' => 'required|in:biasa,sedang,penting'
        ]);

        $pengumuman->update($data);

        return redirect()
            ->route('admin.pengumuman.index')
            ->with('success', 'Pengumuman berhasil diupdate');
    }
    // =========================
    // SHOW (DETAIL)
    // =========================
    public function show($id)
    {
        $pengumuman = Pengumuman::findOrFail($id);

    return view('admin.pengumuman.show', compact('pengumuman'));
    }

    // =========================
    // DELETE
    // =========================
    public function destroy($id)
    {
        $pengumuman = Pengumuman::findOrFail($id);
        $pengumuman->delete();

        return back()->with('success', 'Pengumuman berhasil dihapus');
    }
}