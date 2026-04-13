@extends('siswa.layout')

@section('content')

<div class="bg-white rounded-xl shadow border p-6">

    <h2 class="text-purple-600 font-semibold mb-4">Data Absensi</h2>

    <table class="w-full text-sm">
        <thead class="bg-gray-100">
            <tr>
                <th class="p-2 text-left">Tanggal</th>
                <th class="p-2 text-left">Mata Pelajaran</th>
                <th class="p-2 text-center">Status</th>
            </tr>
        </thead>

        <tbody>
            <tr class="border-b">
                <td class="p-2">2025-02-01</td>
                <td>Matematika</td>
                <td class="text-center text-green-500">Hadir</td>
            </tr>

            <tr class="border-b">
                <td class="p-2">2025-02-02</td>
                <td>Fisika</td>
                <td class="text-center text-yellow-500">Izin</td>
            </tr>

            <tr>
                <td class="p-2">2025-02-03</td>
                <td>Kimia</td>
                <td class="text-center text-red-500">Alfa</td>
            </tr>
        </tbody>
    </table>

</div>

@endsection