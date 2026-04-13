<?php

namespace App\Http\Controllers\Siswa;

use App\Http\Controllers\Controller;

class NilaiController extends Controller
{
    public function index()
    {
        return view('siswa.nilai');
    }
}
