@extends('layouts.admin')

@section('content')

<div class="p-6 max-w-lg">

    <h1 class="text-xl font-bold mb-4">Tambah Absensi</h1>

    <form method="POST" action="{{ route('admin.absensi.store') }}">
        @csrf

        <select name="siswa_id" class="w-full border p-2 mb-2" required>
            <option value="">Pilih Siswa</option>
            @foreach($siswa as $s)
                <option value="{{ $s->id }}">{{ $s->nama }}</option>
            @endforeach
        </select>
        <select name="jadwal_pelajaran_id" class="w-full border p-2 mb-2" required>
         <option value="">Pilih Jadwal</option>
        @foreach($jadwal as $j)
        <option value="{{ $j->id }}">
                {{ $j->kelas->nama }} - {{ $j->mapel->nama }} ({{ $j->hari }})
        </option>
    @endforeach
</select>

        <input type="date" name="tanggal" class="w-full border p-2 mb-2">

        <select name="status" class="w-full border p-2 mb-2">
            <option value="hadir">Hadir</option>
            <option value="izin">Izin</option>
            <option value="alpha">Alpha</option>
        </select>

        <textarea name="keterangan" class="w-full border p-2 mb-2"></textarea>

        <button class="bg-indigo-600 text-white px-4 py-2 w-full">
            Simpan
        </button>

    </form>

</div>

@endsection