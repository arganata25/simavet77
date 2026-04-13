<?php

namespace App\Http\Controllers\Siswa;

use App\Http\Controllers\Controller;

class AlumniController extends Controller
{
    public function index()
    {
        return view('siswa.alumni');
    }
}