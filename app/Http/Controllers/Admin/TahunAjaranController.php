<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\TahunAjaran;
use Illuminate\Http\Request;

class TahunAjaranController extends Controller
{
    public function index()
    {
        return view('admin.tahun.index', [
            'data'=>TahunAjaran::all()
        ]);
    }

    public function store(Request $request)
    {
        TahunAjaran::create($request->all());
        return back();
    }
}
