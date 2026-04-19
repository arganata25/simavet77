@extends('layouts.admin')

@section('content')

<div class="p-6 max-w-lg">

    <h1 class="text-xl font-bold mb-4">Tambah Jadwal Pelajaran</h1>

    <form method="POST" action="{{ route('admin.jadwal-pelajaran.store') }}">
        @csrf

        {{-- Guru --}}
        <select name="guru_id" class="w-full border p-2 mb-2" required>
            <option value="">Pilih Guru</option>
            @foreach($guru as $g)
                <option value="{{ $g->id }}">{{ $g->nama_lengkap }}</option>
            @endforeach
        </select>

        {{-- Mapel --}}
        <select name="mata_pelajaran_id" class="w-full border p-2 mb-2" required>
            <option value="">Pilih Mapel</option>
            @foreach($mapel as $m)
                <option value="{{ $m->id }}">{{ $m->nama }}</option>
            @endforeach
        </select>

        {{-- Kelas --}}
        <select name="kelas_id" class="w-full border p-2 mb-2" required>
            <option value="">Pilih Kelas</option>
            @foreach($kelas as $k)
                <option value="{{ $k->id }}">{{ $k->nama }}</option>
            @endforeach
        </select>

        <select name="tahun_ajaran_id" class="w-full border p-2 mb-2" required>
            @foreach($tahunAjaran as $ta)
                <option value="{{ $ta->id }}">{{ $ta->nama }}</option>
            @endforeach
        </select>

        {{-- Hari --}}
        <select name="hari" class="w-full border p-2 mb-2" required>
            <option value="Senin">Senin</option>
            <option value="Selasa">Selasa</option>
            <option value="Rabu">Rabu</option>
            <option value="Kamis">Kamis</option>
            <option value="Jumat">Jumat</option>
        </select>

        {{-- Jam --}}
        <input type="time" name="jam_mulai" class="w-full border p-2 mb-2" required>
        <input type="time" name="jam_selesai" class="w-full border p-2 mb-4" required>

        <button class="bg-indigo-600 text-white px-4 py-2 w-full">
            Simpan
        </button>

    </form>

</div>

@endsection