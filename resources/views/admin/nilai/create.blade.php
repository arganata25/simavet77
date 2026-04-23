@extends('layouts.admin')
@section('content')
<div class="mb-6">
    <h2 class="text-2xl font-bold text-slate-800 text-center">Input Nilai Akademik</h2>
</div>

<div class="max-w-4xl mx-auto bg-white p-8 rounded-2xl shadow-sm border border-slate-200">
    <form action="{{ route('admin.nilai.store') }}" method="POST" class="grid grid-cols-1 md:grid-cols-2 gap-6">
        @csrf
        
        <div class="space-y-4">
            <div>
                <label class="block text-sm font-semibold mb-1">Siswa</label>
                <select name="siswa_id" class="w-full border-slate-300 rounded-lg" required>
                    @foreach($siswa as $s) <option value="{{ $s->id }}">{{ $s->nama }}</option> @endforeach
                </select>
            </div>
            <div>
                <label class="block text-sm font-semibold mb-1">Mata Pelajaran</label>
                <select name="mata_pelajaran_id" class="w-full border-slate-300 rounded-lg" required>
                    @foreach($mapel as $m) <option value="{{ $m->id }}">{{ $m->nama }}</option> @endforeach
                </select>
            </div>
            <div>
                <label class="block text-sm font-semibold mb-1">Guru Pengajar</label>
                <select name="guru_id" class="w-full border-slate-300 rounded-lg" required>
                    @foreach($guru as $g) <option value="{{ $g->id }}">{{ $g->nama_lengkap }}</option> @endforeach
                </select>
            </div>
            <div>
                <label class="block text-sm font-semibold mb-1">Tahun Ajaran</label>
                <select name="tahun_ajaran_id" class="w-full border-slate-300 rounded-lg" required>
                    @foreach($tahun as $t) <option value="{{ $t->id }}">{{ $t->nama }} ({{ $t->semester }})</option> @endforeach
                </select>
            </div>
        </div>

        <div class="space-y-4 bg-slate-50 p-6 rounded-xl">
            <div>
                <label class="block text-sm font-semibold mb-1">Nilai Harian (20%)</label>
                <input type="number" name="nilai_harian" step="0.01" class="w-full border-slate-300 rounded-lg">
            </div>
            <div>
                <label class="block text-sm font-semibold mb-1">Nilai UTS (30%)</label>
                <input type="number" name="nilai_uts" step="0.01" class="w-full border-slate-300 rounded-lg">
            </div>
            <div>
                <label class="block text-sm font-semibold mb-1">Nilai UAS (50%)</label>
                <input type="number" name="nilai_uas" step="0.01" class="w-full border-slate-300 rounded-lg">
            </div>
        </div>

        <div class="md:col-span-2 text-right pt-4 border-t border-slate-100">
            <button type="submit" class="bg-indigo-600 text-white px-8 py-3 rounded-xl font-bold hover:bg-indigo-700 shadow-lg">
                Simpan Nilai
            </button>
        </div>
    </form>
</div>
@endsection