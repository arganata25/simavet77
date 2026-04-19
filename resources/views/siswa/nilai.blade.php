@extends('siswa.layout')

@section('content')
<div class="max-w-6xl mx-auto">
    <div class="mb-6">
        <h1 class="text-2xl font-semibold text-gray-800">Nilai Akademik</h1>
        <p class="text-sm text-gray-500 mt-1">Rekapitulasi nilai harian, UTS, dan UAS</p>
    </div>

    <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
        <div class="p-6">
            <h3 class="text-lg font-medium text-purple-700 mb-4">Transkrip Nilai Semester Ganjil 2024</h3>
            <div class="border-2 border-dashed border-gray-200 rounded-lg p-10 flex flex-col items-center justify-center">
                 <p class="text-gray-500">Data nilai akan ditampilkan di sini.</p>
            </div>
        </div>
    </div>
</div>
@endsection