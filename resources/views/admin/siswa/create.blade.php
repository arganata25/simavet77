@extends('layouts.admin')

@section('content')

<div class="p-6 max-w-lg">

    <h1 class="text-xl font-bold mb-4">Tambah Siswa</h1>

    <form method="POST" action="{{ route('admin.siswa.store') }}">
        @csrf

        <input name="nama_lengkap" placeholder="Nama Lengkap"
            class="w-full border p-2 mb-2" required>

        <input name="nisn" placeholder="NISN"
            class="w-full border p-2 mb-2" required>

        {{-- TINGKAT --}}
        <select name="tingkat" class="w-full border p-2 mb-2" required>
            <option value="">Pilih Tingkat</option>
            <option value="X">X</option>
            <option value="XI">XI</option>
            <option value="XII">XII</option>
        </select>

        {{-- KELAS --}}
        <select name="kelas_id" class="w-full border p-2 mb-2" required>
            <option value="">Pilih Kelas</option>
            @foreach($kelas as $k)
                <option value="{{ $k->id }}">{{ $k->nama }}</option>
            @endforeach
        </select>

        <select name="jenis_kelamin" class="w-full border p-2 mb-2" required>
            <option value="Laki-laki">Laki-laki</option>
            <option value="Perempuan">Perempuan</option>
        </select>

        <input name="no_hp_siswa" placeholder="No HP"
            class="w-full border p-2 mb-3">

        <button class="bg-indigo-600 text-white px-4 py-2 w-full">
            Simpan
        </button>

    </form>

</div>

@endsection