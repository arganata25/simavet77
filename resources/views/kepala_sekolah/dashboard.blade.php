@extends('layouts.admin')

@section('content')

<h1 class="text-2xl font-bold mb-4">Dashboard Kepala Sekolah</h1>

<div class="grid grid-cols-3 gap-4">
    <div class="bg-white p-4 rounded shadow">
        <h2>Total Guru</h2>
        <p class="text-xl">{{ $stats['total_guru'] }}</p>
    </div>

    <div class="bg-white p-4 rounded shadow">
        <h2>Total Siswa</h2>
        <p class="text-xl">{{ $stats['total_siswa'] }}</p>
    </div>

    <div class="bg-white p-4 rounded shadow">
        <h2>Total Kelas</h2>
        <p class="text-xl">{{ $stats['total_kelas'] }}</p>
    </div>
</div>

@endsection