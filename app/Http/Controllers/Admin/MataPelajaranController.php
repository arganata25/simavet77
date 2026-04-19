<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\MataPelajaran;
use Illuminate\Http\Request;

class MataPelajaranController extends Controller
{
    public function index()
    {
        $mapel = MataPelajaran::latest()->paginate(10);
        return view('admin.mata_pelajaran.index', compact('mapel'));
    }

    public function create()
    {
        return view('admin.mata_pelajaran.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'kode' => 'required|unique:mata_pelajaran,kode'
        ]);

        MataPelajaran::create($request->all());

        return redirect()->route('admin.mata-pelajaran.index')
            ->with('success', 'Mapel berhasil ditambahkan');
    }

    public function edit($id)
    {
        $mapel = MataPelajaran::findOrFail($id);
        return view('admin.mata_pelajaran.edit', compact('mapel'));
    }

    public function update(Request $request, $id)
    {
        $mapel = MataPelajaran::findOrFail($id);

        $request->validate([
            'nama' => 'required',
            'kode' => 'required|unique:mata_pelajaran,kode,' . $id
        ]);

        $mapel->update($request->all());

        return redirect()->route('admin.mata-pelajaran.index')
            ->with('success', 'Mapel berhasil diupdate');
    }

    public function destroy($id)
    {
        MataPelajaran::findOrFail($id)->delete();

        return back()->with('success', 'Mapel dihapus');
    }
}