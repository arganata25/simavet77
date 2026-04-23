@extends('layouts.admin')

@section('content')

<div class="p-6 max-w-lg">

    <h1 class="text-xl font-bold mb-4">Edit Siswa</h1>

    <form method="POST" action="{{ route('admin.siswa.update', $siswa->id) }}">
        @csrf
        @method('PUT')

        <input name="nama_lengkap"
            value="{{ $siswa->nama_lengkap }}"
            class="w-full border p-2 mb-2">

        <input name="nisn"
            value="{{ $siswa->nisn }}"
            class="w-full border p-2 mb-2">

        <select name="kelas_id" class="w-full border p-2 mb-2">
            @foreach($kelas as $k)
                <option value="{{ $k->id }}"
                    {{ $siswa->kelas_id == $k->id ? 'selected' : '' }}>
                    {{ $k->nama }}
                </option>
            @endforeach
        </select>

        <select name="jenis_kelamin" class="w-full border p-2 mb-2">
            <option value="Laki-laki" {{ $siswa->jenis_kelamin == 'Laki-laki' ? 'selected' : '' }}>
                Laki-laki
            </option>
            <option value="Perempuan" {{ $siswa->jenis_kelamin == 'Perempuan' ? 'selected' : '' }}>
                Perempuan
            </option>
        </select>

        <input name="no_hp_siswa"
            value="{{ $siswa->no_hp_siswa }}"
            class="w-full border p-2 mb-3">

        <button class="bg-indigo-600 text-white px-4 py-2 w-full">
            Update
        </button>

    </form>

</div>

@endsection