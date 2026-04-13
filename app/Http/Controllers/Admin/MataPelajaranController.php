<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\MataPelajaran;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class MataPelajaranController extends Controller
{
    public function index()
    {
        return view('admin.mapel.index', [
            'mapel' => MataPelajaran::all()
        ]);
    }

    public function store(Request $request)
    {
        MataPelajaran::create($request->all());
        return back();
    }

    public function destroy($id)
    {
        MataPelajaran::findOrFail($id)->delete();
        return back();
    }
}
