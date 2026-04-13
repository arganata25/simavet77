<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Kelas;
use Illuminate\Http\Request;

class KelasController extends Controller
{
    public function index()
    {
        return view('admin.kelas.index', [
            'kelas'=>Kelas::with('waliKelas')->get()
        ]);
    }

    public function store(Request $request)
    {
        Kelas::create($request->all());
        return back();
    }

    public function update(Request $request, $id)
    {
        Kelas::findOrFail($id)->update($request->all());
        return back();
    }

    public function destroy($id)
    {
        Kelas::findOrFail($id)->delete();
        return back();
    }
}
