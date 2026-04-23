@extends('layouts.admin')

@section('content')

<div class="mb-8">
    <h1 class="text-2xl font-bold text-slate-800">Dashboard Kepala Sekolah</h1>
    <p class="text-slate-500 text-sm">Ringkasan data operasional dan prestasi akademik sekolah.</p>
</div>

<div class="grid grid-cols-1 md:grid-cols-3 lg:grid-cols-5 gap-6">
    <div class="bg-white p-6 rounded-2xl shadow-sm border border-slate-200 border-l-4 border-l-blue-600">
        <h2 class="text-xs font-semibold text-slate-500 uppercase tracking-wider">Total Guru</h2>
        <p class="text-3xl font-extrabold text-slate-800 mt-2">{{ $stats['total_guru'] ?? 0 }}</p>
    </div>

    <div class="bg-white p-6 rounded-2xl shadow-sm border border-slate-200 border-l-4 border-l-green-600">
        <h2 class="text-xs font-semibold text-slate-500 uppercase tracking-wider">Total Siswa</h2>
        <p class="text-3xl font-extrabold text-slate-800 mt-2">{{ $stats['total_siswa'] ?? 0 }}</p>
    </div>

    <div class="bg-white p-6 rounded-2xl shadow-sm border border-slate-200 border-l-4 border-l-yellow-500">
        <h2 class="text-xs font-semibold text-slate-500 uppercase tracking-wider">Total Kelas</h2>
        <p class="text-3xl font-extrabold text-slate-800 mt-2">{{ $stats['total_kelas'] ?? 0 }}</p>
    </div>

    <div class="bg-white p-6 rounded-2xl shadow-sm border border-slate-200 border-l-4 border-l-purple-600">
        <h2 class="text-xs font-semibold text-slate-500 uppercase tracking-wider">Rata-Rata Nilai</h2>
        <p class="text-3xl font-extrabold text-slate-800 mt-2">{{ $stats['rata_nilai'] ?? 0 }}</p>
    </div>

    <div class="bg-white p-6 rounded-2xl shadow-sm border border-slate-200 border-l-4 border-l-red-600">
        <h2 class="text-xs font-semibold text-slate-500 uppercase tracking-wider">Absensi Hari Ini</h2>
        <p class="text-3xl font-extrabold text-slate-800 mt-2">{{ $stats['absensi_hari_ini'] ?? 0 }}</p>
    </div>
</div>

@endsection