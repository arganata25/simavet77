@extends('guru.layout')

@section('content')

<div class="space-y-6">

    {{-- PROFIL --}}
    <div class="bg-white p-5 rounded-xl shadow flex items-center gap-5">
        <div class="w-20 h-20 bg-gradient-to-r from-pink-500 to-purple-600 rounded-xl flex items-center justify-center text-white text-2xl">
            👨‍🏫
        </div>

        <div>
            <h2 class="text-xl font-bold text-purple-700">
                {{ auth()->user()->name }}
            </h2>
            <p class="text-sm text-gray-500">NIP: -</p>
        </div>
    </div>

    {{-- STATISTIK --}}
    <div class="grid grid-cols-3 gap-4">

        <div class="bg-blue-600 text-white p-5 rounded-xl shadow">
            <p class="text-sm">Jam Mengajar</p>
            <h2 class="text-3xl font-bold">24</h2>
        </div>

        <div class="bg-purple-600 text-white p-5 rounded-xl shadow">
            <p class="text-sm">Total Kelas</p>
            <h2 class="text-3xl font-bold">6</h2>
        </div>

        <div class="bg-purple-800 text-white p-5 rounded-xl shadow">
            <p class="text-sm">Jumlah Siswa</p>
            <h2 class="text-3xl font-bold">32</h2>
        </div>

    </div>

    {{-- GRID --}}
    <div class="grid grid-cols-2 gap-4">

        {{-- JADWAL --}}
        <div class="bg-white p-5 rounded-xl shadow">
            <h3 class="font-bold text-purple-700 mb-3">
                Jadwal Hari Ini
            </h3>

            <div class="space-y-3">

                <div class="border-l-4 border-blue-500 p-3 bg-gray-50 rounded">
                    <p class="font-semibold">Pemrograman Web</p>
                    <p class="text-sm text-gray-500">XII TKJ 1</p>
                    <span class="text-xs bg-blue-500 text-white px-2 py-1 rounded">
                        07:30 - 10:30
                    </span>
                </div>

                <div class="border-l-4 border-purple-500 p-3 bg-gray-50 rounded">
                    <p class="font-semibold">Basis Data</p>
                    <p class="text-sm text-gray-500">XI TKJ 2</p>
                    <span class="text-xs bg-purple-500 text-white px-2 py-1 rounded">
                        11:00 - 13:30
                    </span>
                </div>

            </div>
        </div>

        {{-- TUGAS --}}
        <div class="bg-white p-5 rounded-xl shadow">
            <h3 class="font-bold text-purple-700 mb-3">
                Tugas Belum Dinilai
            </h3>

            <div class="space-y-3">

                <div class="flex justify-between items-center bg-gray-50 p-3 rounded">
                    <div>
                        <p class="font-semibold">Tugas Web</p>
                        <p class="text-sm text-gray-500">XII TKJ 1</p>
                    </div>
                    <span class="bg-yellow-100 text-yellow-700 px-2 py-1 text-xs rounded">
                        Pending
                    </span>
                </div>

                <div class="flex justify-between items-center bg-gray-50 p-3 rounded">
                    <div>
                        <p class="font-semibold">Quiz Basis Data</p>
                        <p class="text-sm text-gray-500">XI TKJ 2</p>
                    </div>
                    <span class="bg-yellow-100 text-yellow-700 px-2 py-1 text-xs rounded">
                        Pending
                    </span>
                </div>

            </div>
        </div>

    </div>

</div>

@endsection