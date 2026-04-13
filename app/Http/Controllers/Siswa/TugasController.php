<?php

namespace App\Http\Controllers\Siswa;

use App\Http\Controllers\Controller;

class TugasController extends Controller
{
    public function index()
    {
        return view('siswa.tugas');
    }
}