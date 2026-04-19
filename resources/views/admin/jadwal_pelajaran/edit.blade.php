@extends('layouts.admin')

@section('content')

<div class="p-6 max-w-lg">

    <h1 class="text-xl font-bold mb-4">Edit Jadwal Pelajaran</h1>

    <form method="POST" action="{{ route('admin.jadwal-pelajaran.update', $jadwal->id) }}">
        @csrf
        @method('PUT')

        {{-- Guru --}}
        <select name="guru_id" class="w-full border p-2 mb-2">
            @foreach($guru as $g)
                <option value="{{ $g->id }}"
                    {{ $jadwal->guru_id == $g->id ? 'selected' : '' }}>
                    {{ $g->nama_lengkap }}
                </option>
            @endforeach
        </select>

        {{-- Mapel --}}
        <select name="mata_pelajaran_id" class="w-full border p-2 mb-2">
            @foreach($mapel as $m)
                <option value="{{ $m->id }}"
                    {{ $jadwal->mata_pelajaran_id == $m->id ? 'selected' : '' }}>
                    {{ $m->nama }}
                </option>
            @endforeach
        </select>

        {{-- Kelas --}}
        <select name="kelas_id" class="w-full border p-2 mb-2">
            @foreach($kelas as $k)
                <option value="{{ $k->id }}"
                    {{ $jadwal->kelas_id == $k->id ? 'selected' : '' }}>
                    {{ $k->nama }}
                </option>
            @endforeach
        </select>

        {{-- Hari --}}
        <select name="hari" class="w-full border p-2 mb-2">
            @foreach(['Senin','Selasa','Rabu','Kamis','Jumat'] as $hari)
                <option {{ $jadwal->hari == $hari ? 'selected' : '' }}>
                    {{ $hari }}
                </option>
            @endforeach
        </select>

        {{-- Jam --}}
        <input type="time" name="jam_mulai" value="{{ $jadwal->jam_mulai }}"
            class="w-full border p-2 mb-2">

        <input type="time" name="jam_selesai" value="{{ $jadwal->jam_selesai }}"
            class="w-full border p-2 mb-4">

        <button class="bg-indigo-600 text-white px-4 py-2 w-full">
            Update
        </button>

    </form>

</div>

@endsection