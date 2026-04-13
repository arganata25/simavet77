<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Absensi;

class AbsensiController extends Controller
{
    public function index()
    {
        return view('admin.absensi.index', [
            'absensi'=>Absensi::with('siswa')->get()
        ]);
    }
}
