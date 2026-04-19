@extends('layouts.admin')
@section('title', 'Edit Kelas - SIAKAD')

@section('content')

<div class="mb-6">
    <h2 class="text-2xl font-bold text-slate-800">Edit Kelas</h2>
    <a href="{{ route('admin.kelas.index') }}" class="text-indigo-600 text-sm">← Kembali</a>
</div>

<div class="bg-white p-6 rounded-xl shadow max-w-2xl">

    <form action="{{ route('admin.kelas.update', $kela->id) }}" method="POST">
        @csrf
        @method('PUT')

        <!-- Nama -->
        <div class="mb-4">
            <label>Nama Kelas</label>
            <input type="text" name="nama" value="{{ $kela->nama }}" class="w-full border p-2 rounded">
        </div>

        <!-- Tingkat -->
        <div class="mb-4">
            <label>Tingkat</label>
            <select name="tingkat" class="w-full border p-2 rounded">
                <option value="X" {{ $kela->tingkat == 'X' ? 'selected' : '' }}>X</option>
                <option value="XI" {{ $kela->tingkat == 'XI' ? 'selected' : '' }}>XI</option>
                <option value="XII" {{ $kela->tingkat == 'XII' ? 'selected' : '' }}>XII</option>
            </select>
        </div>

        <!-- Jurusan -->
        <div class="mb-4">
            <label>Jurusan</label>
            <input type="text" name="jurusan" value="{{ $kela->jurusan }}" class="w-full border p-2 rounded">
        </div>

        <!-- Wali Kelas -->
        <div class="mb-4">
            <label>Wali Kelas</label>
            <select name="wali_kelas_id" class="w-full border p-2 rounded">
                <option value="">Pilih</option>
                @foreach($gurus as $g)
                    <option value="{{ $g->id }}" {{ $kela->wali_kelas_id == $g->id ? 'selected' : '' }}>
                        {{ $g->nama_lengkap }}
                    </option>
                @endforeach
            </select>
        </div>

        <!-- Tahun Ajaran -->
        <div class="mb-4">
            <label>Tahun Ajaran</label>
            <select name="tahun_ajaran_id" class="w-full border p-2 rounded">
                @foreach($tahunAjaran as $ta)
                    <option value="{{ $ta->id }}" {{ $kela->tahun_ajaran_id == $ta->id ? 'selected' : '' }}>
                        {{ $ta->nama }}
                    </option>
                @endforeach
            </select>
        </div>

        <button class="bg-indigo-600 text-white px-4 py-2 rounded">
            Update
        </button>

    </form>

</div>

@endsection