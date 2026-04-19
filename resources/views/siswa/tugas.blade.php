@extends('siswa.layout')

@section('content')
<div class="max-w-6xl mx-auto">
    <div class="mb-6">
        <h1 class="text-2xl font-semibold text-gray-800">Ujian & Tugas</h1>
        <p class="text-sm text-gray-500 mt-1">Daftar tugas, ulangan harian, UTS, dan UAS Anda</p>
    </div>

    <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-8 text-center">
        <svg class="w-16 h-16 text-gray-300 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
        <h3 class="text-lg font-medium text-gray-900">Belum Ada Tugas/Ujian Aktif</h3>
        <p class="mt-1 text-sm text-gray-500">Saat ini tidak ada ujian atau tugas yang perlu Anda kerjakan.</p>
    </div>
</div>
@endsection