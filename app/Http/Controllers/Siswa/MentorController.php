<?php

namespace App\Http\Controllers\Siswa;

use App\Http\Controllers\Controller;

class MentorController extends Controller
{
    public function index()
    {
        return view('siswa.mentor');
    }
}