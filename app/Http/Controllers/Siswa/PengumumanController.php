<?php

namespace App\Http\Controllers\Siswa;

use App\Http\Controllers\Controller;

class PengumumanController extends Controller
{
    public function index()
    {
        return view('siswa.pengumuman');
    }
}