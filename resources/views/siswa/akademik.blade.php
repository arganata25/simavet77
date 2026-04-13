@extends('siswa.layout')

@section('content')

<div class="space-y-6">

    <!-- CARD STATISTIK -->
    <div class="grid grid-cols-3 gap-4">

        <!-- RATA-RATA -->
        <div class="bg-white p-4 rounded-xl shadow border flex justify-between items-center">
            <div>
                <p class="text-gray-400 text-sm">Rata-rata Nilai</p>
                <h2 class="text-2xl font-bold">87.40</h2>
            </div>
            <div class="w-10 h-10 bg-blue-500 rounded flex items-center justify-center text-white">
                📊
            </div>
        </div>

        <!-- TOTAL MAPEL -->
        <div class="bg-white p-4 rounded-xl shadow border flex justify-between items-center">
            <div>
                <p class="text-gray-400 text-sm">Total Mata Pelajaran</p>
                <h2 class="text-2xl font-bold">5</h2>
            </div>
            <div class="w-10 h-10 bg-green-500 rounded flex items-center justify-center text-white">
                📚
            </div>
        </div>

        <!-- NILAI A -->
        <div class="bg-white p-4 rounded-xl shadow border flex justify-between items-center">
            <div>
                <p class="text-gray-400 text-sm">Nilai A</p>
                <h2 class="text-2xl font-bold">3</h2>
            </div>
            <div class="w-10 h-10 bg-purple-500 rounded flex items-center justify-center text-white">
                🏆
            </div>
        </div>

    </div>

    <!-- TABEL NILAI -->
    <div class="bg-white rounded-xl shadow border">

        <div class="p-4 border-b">
            <h2 class="text-purple-600 font-semibold">Nilai Akademik</h2>
            <p class="text-sm text-gray-400">Semester Ganjil 2023/2024</p>
        </div>

        <div class="overflow-x-auto">

            <table class="w-full text-sm">

                <thead class="bg-gray-100 text-gray-500 uppercase text-xs">
                    <tr>
                        <th class="p-3 text-left">Kode</th>
                        <th class="p-3 text-left">Mata Pelajaran</th>
                        <th class="p-3 text-left">Pengajar</th>
                        <th class="p-3 text-center">Nilai</th>
                        <th class="p-3 text-center">Grade</th>
                    </tr>
                </thead>

                <tbody>

                    <tr class="border-b hover:bg-gray-50">
                        <td class="p-3">MAT101</td>
                        <td>Matematika</td>
                        <td>Dr. Suryanto</td>
                        <td class="text-center">88</td>
                        <td class="text-center">
                            <span class="bg-green-100 text-green-600 px-2 py-1 rounded-full text-xs">A</span>
                        </td>
                    </tr>

                    <tr class="border-b hover:bg-gray-50">
                        <td class="p-3">FIS101</td>
                        <td>Fisika</td>
                        <td>Prof. Wijaya</td>
                        <td class="text-center">82</td>
                        <td class="text-center">
                            <span class="bg-blue-100 text-blue-600 px-2 py-1 rounded-full text-xs">B+</span>
                        </td>
                    </tr>

                    <tr class="border-b hover:bg-gray-50">
                        <td class="p-3">KIM101</td>
                        <td>Kimia</td>
                        <td>Dr. Sari Indah</td>
                        <td class="text-center">90</td>
                        <td class="text-center">
                            <span class="bg-green-100 text-green-600 px-2 py-1 rounded-full text-xs">A</span>
                        </td>
                    </tr>

                    <tr class="border-b hover:bg-gray-50">
                        <td class="p-3">BIO101</td>
                        <td>Biologi</td>
                        <td>Dr. Ahmad Yani</td>
                        <td class="text-center">92</td>
                        <td class="text-center">
                            <span class="bg-green-100 text-green-600 px-2 py-1 rounded-full text-xs">A</span>
                        </td>
                    </tr>

                    <tr class="hover:bg-gray-50">
                        <td class="p-3">IND101</td>
                        <td>Bahasa Indonesia</td>
                        <td>Dwi Hartono</td>
                        <td class="text-center">85</td>
                        <td class="text-center">
                            <span class="bg-blue-100 text-blue-600 px-2 py-1 rounded-full text-xs">B+</span>
                        </td>
                    </tr>

                </tbody>

            </table>

        </div>

    </div>

</div>

@endsection