@extends('layouts.admin')

@section('content')

<div class="max-w-4xl mx-auto bg-white p-8 rounded shadow">

    <h2 class="text-xl font-bold mb-6">Edit Nilai</h2>

    <form action="{{ route('admin.nilai.update', $nilai->id) }}" method="POST">
        @csrf
        @method('PUT')

        {{-- SISWA --}}
        <select name="siswa_id" class="w-full border p-2 mb-3">
            @foreach($siswa as $s)
                <option value="{{ $s->id }}"
                    {{ $nilai->siswa_id == $s->id ? 'selected' : '' }}>
                    {{ $s->nama }}
                </option>
            @endforeach
        </select>

        {{-- MAPEL --}}
        <select name="mata_pelajaran_id" class="w-full border p-2 mb-3">
            @foreach($mapel as $m)
                <option value="{{ $m->id }}"
                    {{ $nilai->mata_pelajaran_id == $m->id ? 'selected' : '' }}>
                    {{ $m->nama }}
                </option>
            @endforeach
        </select>

        {{-- GURU --}}
        <select name="guru_id" class="w-full border p-2 mb-3">
            @foreach($guru as $g)
                <option value="{{ $g->id }}"
                    {{ $nilai->guru_id == $g->id ? 'selected' : '' }}>
                    {{ $g->nama_lengkap }}
                </option>
            @endforeach
        </select>

        {{-- TAHUN --}}
        <select name="tahun_ajaran_id" class="w-full border p-2 mb-3">
            @foreach($tahun as $t)
                <option value="{{ $t->id }}"
                    {{ $nilai->tahun_ajaran_id == $t->id ? 'selected' : '' }}>
                    {{ $t->nama }}
                </option>
            @endforeach
        </select>

        {{-- NILAI --}}
        <input type="number" name="nilai_harian" value="{{ $nilai->nilai_harian }}" class="w-full border p-2 mb-2">
        <input type="number" name="nilai_uts" value="{{ $nilai->nilai_uts }}" class="w-full border p-2 mb-2">
        <input type="number" name="nilai_uas" value="{{ $nilai->nilai_uas }}" class="w-full border p-2 mb-4">

        <button class="bg-blue-600 text-white px-4 py-2 w-full">
            Update
        </button>

    </form>

</div>

@endsection