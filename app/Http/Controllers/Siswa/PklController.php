<?php

namespace App\Http\Controllers\Siswa;

use App\Http\Controllers\Controller;

class PklController extends Controller
{
    public function index()
    {
        return view('siswa.pkl');
    }
}