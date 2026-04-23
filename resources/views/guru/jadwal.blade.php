@extends('guru.layout')

@section('content')

<div class="space-y-6">

    {{-- HEADER --}}
    <div class="bg-gradient-to-r from-purple-600 to-purple-800 text-white p-6 rounded-xl shadow">
        <h2 class="text-xl font-bold">Jadwal Mengajar</h2>
        <p class="text-sm opacity-80">Minggu Ini - Semester Ganjil</p>
    </div>

    {{-- SENIN --}}
    <div>
        <div class="flex items-center gap-3 mb-3">
            <span class="bg-purple-600 text-white px-4 py-1 rounded">Senin</span>
            <div class="flex-1 h-px bg-gray-200"></div>
        </div>

        <div class="grid grid-cols-2 gap-4">

            <div class="bg-white p-4 rounded-xl shadow border-l-4 border-purple-600">
                <div class="flex justify-between">
                    <div>
                        <h3 class="font-semibold">Pemrograman Web</h3>
                        <p class="text-sm text-gray-500">Kelas: XII TKJ 1</p>
                        <p class="text-sm text-gray-500">📍 Lab Komputer 2</p>
                    </div>
                    <span class="bg-purple-600 text-white px-2 py-1 text-xs rounded">
                        07:30 - 10:30
                    </span>
                </div>
            </div>

            <div class="bg-white p-4 rounded-xl shadow border-l-4 border-purple-600">
                <div class="flex justify-between">
                    <div>
                        <h3 class="font-semibold">Pemrograman OOP</h3>
                        <p class="text-sm text-gray-500">Kelas: XI TKJ 1</p>
                        <p class="text-sm text-gray-500">📍 Lab Komputer 1</p>
                    </div>
                    <span class="bg-purple-600 text-white px-2 py-1 text-xs rounded">
                        13:00 - 15:30
                    </span>
                </div>
            </div>

        </div>
    </div>

    {{-- SELASA --}}
    <div>
        <div class="flex items-center gap-3 mb-3">
            <span class="bg-purple-600 text-white px-4 py-1 rounded">Selasa</span>
            <div class="flex-1 h-px bg-gray-200"></div>
        </div>

        <div class="grid grid-cols-2 gap-4">

            <div class="bg-white p-4 rounded-xl shadow border-l-4 border-purple-600">
                <div class="flex justify-between">
                    <div>
                        <h3 class="font-semibold">Basis Data</h3>
                        <p class="text-sm text-gray-500">Kelas: XI TKJ 2</p>
                        <p class="text-sm text-gray-500">📍 Lab Komputer 1</p>
                    </div>
                    <span class="bg-purple-600 text-white px-2 py-1 text-xs rounded">
                        08:00 - 11:00
                    </span>
                </div>
            </div>

            <div class="bg-white p-4 rounded-xl shadow border-l-4 border-purple-600">
                <div class="flex justify-between">
                    <div>
                        <h3 class="font-semibold">Pemrograman Web</h3>
                        <p class="text-sm text-gray-500">Kelas: XI TKJ 2</p>
                        <p class="text-sm text-gray-500">📍 Lab Komputer 2</p>
                    </div>
                    <span class="bg-purple-600 text-white px-2 py-1 text-xs rounded">
                        11:30 - 13:30
                    </span>
                </div>
            </div>

        </div>
    </div>

    {{-- RABU --}}
    <div>
        <div class="flex items-center gap-3 mb-3">
            <span class="bg-purple-600 text-white px-4 py-1 rounded">Rabu</span>
            <div class="flex-1 h-px bg-gray-200"></div>
        </div>

        <div class="grid grid-cols-2 gap-4">

            <div class="bg-white p-4 rounded-xl shadow border-l-4 border-purple-600">
                <div class="flex justify-between">
                    <div>
                        <h3 class="font-semibold">Sistem Komputer</h3>
                        <p class="text-sm text-gray-500">Kelas: X TKJ 1</p>
                        <p class="text-sm text-gray-500">📍 R. Teori 3</p>
                    </div>
                    <span class="bg-purple-600 text-white px-2 py-1 text-xs rounded">
                        07:30 - 10:00
                    </span>
                </div>
            </div>

        </div>
    </div>

</div>

@endsection