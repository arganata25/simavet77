<?php

namespace App\Http\Controllers\Siswa;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Siswa;
// Pastikan Anda membuat Model Tugas dan PengumpulanTugas nanti
// use App\Models\Tugas; 
// use App\Models\PengumpulanTugas;

class TugasController extends Controller
{
    public function index()
    {
        // Ambil data siswa yang sedang login
        $user = Auth::user();
        $siswa = Siswa::where('user_id', $user->id)->first();

        // Ambil tugas berdasarkan kelas siswa tersebut
        // $tugas = Tugas::where('kelas_id', $siswa->kelas_id)->latest()->get();

        return view('siswa.tugas', [
            'siswa' => $siswa,
            // 'tugas' => $tugas 
        ]);
    }

    public function submit(Request $request, $id)
    {
        $request->validate([
            'file_jawaban' => 'required|mimes:pdf,doc,docx,zip|max:5120', // Maks 5MB
        ]);

        $user = Auth::user();
        $siswa = Siswa::where('user_id', $user->id)->first();

        // Upload File
        $filePath = $request->file('file_jawaban')->store('tugas_siswa', 'public');

        /*
        PengumpulanTugas::updateOrCreate(
            ['tugas_id' => $id, 'siswa_id' => $siswa->id],
            ['file_jawaban' => $filePath]
        );
        */

        return redirect()->route('siswa.tugas')->with('success', 'Tugas berhasil dikumpulkan!');
    }
}