@extends('layouts.admin')

@section('content')

<div class="p-6 max-w-2xl mx-auto">

    <h1 class="text-2xl font-bold mb-6">Tambah Pengumuman</h1>

    {{-- ERROR VALIDATION --}}
    @if ($errors->any())
        <div class="bg-red-100 text-red-700 p-4 mb-4 rounded">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>- {{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.pengumuman.store') }}" method="POST" class="bg-white p-6 rounded-xl shadow space-y-4">
        @csrf

        {{-- JUDUL --}}
        <div>
            <label class="block text-sm font-semibold mb-1">Judul</label>
            <input type="text" name="judul"
                class="w-full border p-2 rounded"
                placeholder="Masukkan judul pengumuman"
                required>
        </div>

        {{-- ISI --}}
        <div>
            <label class="block text-sm font-semibold mb-1">Isi Pengumuman</label>
            <textarea name="isi"
                class="w-full border p-2 rounded"
                rows="5"
                placeholder="Isi pengumuman..."
                required></textarea>
        </div>

        {{-- TANGGAL --}}
        <div>
            <label class="block text-sm font-semibold mb-1">Tanggal</label>
            <input type="date" name="tanggal"
                class="w-full border p-2 rounded"
                required>
        </div>

        {{-- KATEGORI --}}
        <div>
            <label class="block text-sm font-semibold mb-1">Kategori</label>
            <select name="kategori" class="w-full border p-2 rounded" required>
                <option value="akademik">Akademik</option>
                <option value="administrasi">Administrasi</option>
                <option value="umum">Umum</option>
            </select>
        </div>

        {{-- PRIORITAS --}}
        <div>
            <label class="block text-sm font-semibold mb-1">Prioritas</label>
            <select name="prioritas" class="w-full border p-2 rounded" required>
    <option value="biasa" {{ old('prioritas')=='biasa'?'selected':'' }}>Biasa</option>
    <option value="sedang" {{ old('prioritas')=='sedang'?'selected':'' }}>Sedang</option>
    <option value="penting" {{ old('prioritas')=='penting'?'selected':'' }}>Penting</option>
</select>
        </div>

        {{-- BUTTON --}}
        <div class="flex justify-between mt-6">
            <a href="{{ route('admin.pengumuman.index') }}"
               class="bg-gray-500 text-white px-4 py-2 rounded">
                Kembali
            </a>

            <button type="submit"
                class="bg-indigo-600 text-white px-6 py-2 rounded hover:bg-indigo-700">
                Simpan
            </button>
        </div>

    </form>

</div>

@endsection