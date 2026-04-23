@extends('layouts.admin')

@section('content')

<div class="p-6 max-w-lg">

    <h1 class="text-xl font-bold mb-4">Edit Absensi</h1>

    <form method="POST" action="{{ route('admin.absensi.update', $absensi->id) }}">
        @csrf
        @method('PUT')

        <select name="siswa_id" class="w-full border p-2 mb-2">
            @foreach($siswa as $s)
                <option value="{{ $s->id }}"
                    {{ $absensi->siswa_id == $s->id ? 'selected' : '' }}>
                    {{ $s->nama }}
                </option>
            @endforeach
        </select>

        <input type="date" name="tanggal"
            value="{{ $absensi->tanggal }}"
            class="w-full border p-2 mb-2">

        <select name="status" class="w-full border p-2 mb-2">
            <option value="hadir" {{ $absensi->status == 'hadir' ? 'selected' : '' }}>Hadir</option>
            <option value="izin" {{ $absensi->status == 'izin' ? 'selected' : '' }}>Izin</option>
            <option value="alpha" {{ $absensi->status == 'alpha' ? 'selected' : '' }}>Alpha</option>
        </select>

        <button class="bg-indigo-600 text-white px-4 py-2 w-full">
            Update
        </button>

    </form>

</div>

@endsection