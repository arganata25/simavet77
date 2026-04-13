<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Pengumuman;
use Illuminate\Http\Request;

class PengumumanController extends Controller
{
    public function index()
    {
        return view('admin.pengumuman.index', [
            'data'=>Pengumuman::latest()->get()
        ]);
    }

    public function store(Request $request)
    {
        Pengumuman::create($request->all());
        return back();
    }
}
