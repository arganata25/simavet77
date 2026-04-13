<?php

namespace App\Http\Controllers\Siswa;

use App\Http\Controllers\Controller;

class AkademikController extends Controller
{
    public function index()
    {
        return view('siswa.akademik');
    }
}