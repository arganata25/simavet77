@extends('layouts.admin')

@section('content')

<div class="p-6 max-w-xl mx-auto">

    <h1 class="text-xl font-bold mb-4">Edit Pengumuman</h1>

    <form method="POST" action="{{ route('admin.pengumuman.update', $pengumuman->id) }}">
        @csrf
        @method('PUT')

        {{-- Judul --}}
        <input type="text" name="judul"
            value="{{ old('judul', $pengumuman->judul) }}"
            class="w-full border p-2 mb-3"
            placeholder="Judul" required>

        {{-- Kategori --}}
        <select name="kategori" class="w-full border p-2 mb-3">
            <option value="akademik" {{ $pengumuman->kategori == 'akademik' ? 'selected' : '' }}>Akademik</option>
            <option value="administrasi" {{ $pengumuman->kategori == 'administrasi' ? 'selected' : '' }}>Administrasi</option>
            <option value="umum" {{ $pengumuman->kategori == 'umum' ? 'selected' : '' }}>Umum</option>
        </select>

        {{-- Tanggal --}}
        <input type="date" name="tanggal"
            value="{{ old('tanggal', $pengumuman->tanggal) }}"
            class="w-full border p-2 mb-3" required>

        {{-- Isi --}}
        <textarea name="isi"
            class="w-full border p-2 mb-3"
            rows="5"
            required>{{ old('isi', $pengumuman->isi) }}</textarea>

        {{-- Prioritas --}}
        <select name="prioritas" class="w-full border p-2 mb-4">
            <option value="biasa" {{ $pengumuman->prioritas == 'biasa' ? 'selected' : '' }}>Biasa</option>
            <option value="sedang" {{ $pengumuman->prioritas == 'sedang' ? 'selected' : '' }}>Sedang</option>
            <option value="penting" {{ $pengumuman->prioritas == 'penting' ? 'selected' : '' }}>Penting</option>
        </select>

        <button class="bg-indigo-600 text-white px-4 py-2 w-full">
            Update
        </button>

    </form>

</div>

@endsection