@extends('layouts.admin')
@section('title', 'Tambah Kelas - SIAKAD')

@section('content')
<div class="mb-6">
    <h2 class="text-2xl font-bold text-slate-800">Tambah Kelas Baru</h2>
    <a href="{{ route('admin.kelas.index') }}" class="text-indigo-600 hover:underline text-sm"><i class="fas fa-arrow-left mr-1"></i> Kembali ke daftar</a>
</div>

<div class="bg-white rounded-xl shadow-sm border border-slate-200 p-6 max-w-2xl">
    <form action="{{ route('admin.kelas.store') }}" method="POST">
        @csrf
        
        <div class="mb-4">
            <label class="block text-sm font-medium text-slate-700 mb-1">Nama Kelas <span class="text-red-500">*</span></label>
            <input type="text" name="nama" value="{{ old('nama') }}" class="w-full border border-slate-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 outline-none transition-all" placeholder="Contoh: X RPL 1" required>
           <select name="tahun_ajaran_id" required class="w-full border px-4 py-2 rounded">
    <option value="">-- Pilih Tahun Ajaran --</option>

    @foreach($tahunAjaran as $ta)
        <option value="{{ $ta->id }}"
            {{ old('tahun_ajaran_id') == $ta->id ? 'selected' : '' }}>
            {{ $ta->nama }}
            </option>
    @endforeach
</select>
            @error('nama') <span class="text-red-500 text-xs mt-1">{{ $message }}</span> @enderror
        </div>

        <div class="mb-4">
            <label class="block text-sm font-medium text-slate-700 mb-1">Tingkat <span class="text-red-500">*</span></label>
            <select name="tingkat" class="w-full border border-slate-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-indigo-500 outline-none" required>
                <option value="">Pilih Tingkat</option>
                <option value="X" {{ old('tingkat') == 'X' ? 'selected' : '' }}>Kelas X (10)</option>
                <option value="XI" {{ old('tingkat') == 'XI' ? 'selected' : '' }}>Kelas XI (11)</option>
                <option value="XII" {{ old('tingkat') == 'XII' ? 'selected' : '' }}>Kelas XII (12)</option>
            </select>
            @error('tingkat') <span class="text-red-500 text-xs mt-1">{{ $message }}</span> @enderror
        </div>

        <div class="mb-4">
            <label class="block text-sm font-medium text-slate-700 mb-1">Jurusan <span class="text-red-500">*</span></label>
            <select name="jurusan" class="w-full border border-slate-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-indigo-500 outline-none" required>
                <option value="">Pilih Jurusan</option>
                <option value="Rekayasa Perangkat Lunak" {{ old('jurusan') == 'Rekayasa Perangkat Lunak' ? 'selected' : '' }}>Rekayasa Perangkat Lunak (RPL)</option>
                <option value="Teknik Komputer dan Jaringan" {{ old('jurusan') == 'Teknik Komputer dan Jaringan' ? 'selected' : '' }}>Teknik Komputer dan Jaringan (TKJ)</option>
                <option value="Multimedia" {{ old('jurusan') == 'Multimedia' ? 'selected' : '' }}>Multimedia (MM)</option>
            </select>
            @error('jurusan') <span class="text-red-500 text-xs mt-1">{{ $message }}</span> @enderror
        </div>

        <div class="mb-6">
            <label class="block text-sm font-medium text-slate-700 mb-1">Wali Kelas</label>
            <select name="wali_kelas_id" class="w-full border border-slate-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-indigo-500 outline-none">
                <option value="">Pilih Wali Kelas</option>
                @foreach($gurus as $g)
                    <option value="{{ $g->id }}">
                        {{ $g->nama_lengkap }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="flex justify-end gap-3">
            <button type="reset" class="px-4 py-2 bg-slate-100 text-slate-700 rounded-lg hover:bg-slate-200">Reset</button>
            <button type="submit" class="px-4 py-2 bg-indigo-600 text-white rounded-lg hover:bg-indigo-700">Simpan Data</button>
        </div>
    </form>
</div>
@endsection