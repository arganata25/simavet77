@extends('layouts.admin')

@section('content')
<div class="p-6">
    <h1 class="text-xl font-bold mb-4">Detail Jadwal</h1>

    <p><b>Guru:</b> {{ $jadwal->guru->nama_lengkap }}</p>
    <p><b>Mapel:</b> {{ $jadwal->mapel->nama }}</p>
    <p><b>Kelas:</b> {{ $jadwal->kelas->nama }}</p>
    <p><b>Hari:</b> {{ $jadwal->hari }}</p>
    <p><b>Jam:</b> {{ $jadwal->jam_mulai }} - {{ $jadwal->jam_selesai }}</p>
</div>
@endsection