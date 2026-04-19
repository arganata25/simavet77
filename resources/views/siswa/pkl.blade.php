@extends('siswa.layout')

@section('content')
<div class="max-w-6xl mx-auto">
    <div class="mb-6">
        <h1 class="text-2xl font-semibold text-gray-800">Data PKL / Magang</h1>
        <p class="text-sm text-gray-500 mt-1">Informasi penempatan dan jurnal kegiatan Praktek Kerja Lapangan</p>
    </div>

    <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6">
        <div class="bg-blue-50 border border-blue-200 rounded-lg p-4 flex gap-4">
            <svg class="w-6 h-6 text-blue-500 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
            <div>
                <h4 class="font-semibold text-blue-800">Status Penempatan: Belum Ditentukan</h4>
                <p class="text-sm text-blue-600 mt-1">Anda belum didaftarkan pada mitra DUDI manapun. Silakan hubungi koordinator PKL jurusan Anda.</p>
            </div>
        </div>
    </div>
</div>
@endsection