<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\JadwalPelajaran;
use Illuminate\Http\Request;

class JadwalPelajaranController extends Controller
{
    public function index()
    {
        return view('admin.jadwal.index', [
            'jadwal'=>JadwalPelajaran::with('guru','kelas')->get()
        ]);
    }

    public function store(Request $request)
    {
        JadwalPelajaran::create($request->all());
        return back();
    }
}
