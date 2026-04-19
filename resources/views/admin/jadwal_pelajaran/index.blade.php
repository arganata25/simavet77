@extends('layouts.admin')

@section('content')

<div class="p-6">

    <div class="flex justify-between items-center mb-6">
        <div>
            <h1 class="text-2xl font-bold">Manajemen Jadwal</h1>
            <p class="text-gray-500 text-sm">Distribusi jadwal mengajar</p>
        </div>

        <a href="{{ route('admin.jadwal-pelajaran.create') }}"
           class="bg-gradient-to-r from-purple-600 to-indigo-600 text-white px-4 py-2 rounded-lg">
            + Tambah Jadwal
        </a>
        <a href="{{ route('admin.jadwal-pelajaran.trash') }}"
        class="bg-red-500 text-white px-3 py-2 rounded">
        Recycle Bin
</a>
    </div>

    {{-- STAT CARD --}}
    <div class="grid grid-cols-4 gap-4 mb-6">

        <div class="bg-blue-100 p-4 rounded">
            <p class="text-sm">Total Jadwal</p>
            <h2 class="text-xl font-bold">{{ $jadwal->count() }}</h2>
        </div>

        <div class="bg-green-100 p-4 rounded">
            <p class="text-sm">Guru Mengajar</p>
            <h2 class="text-xl font-bold">{{ $jadwal->pluck('guru_id')->unique()->count() }}</h2>
        </div>

        <div class="bg-purple-100 p-4 rounded">
            <p class="text-sm">Kelas Aktif</p>
            <h2 class="text-xl font-bold">{{ $jadwal->pluck('kelas_id')->unique()->count() }}</h2>
        </div>

        <div class="bg-orange-100 p-4 rounded">
            <p class="text-sm">Mapel</p>
            <h2 class="text-xl font-bold">{{ $jadwal->pluck('mata_pelajaran_id')->unique()->count() }}</h2>
        </div>

    </div>

    {{-- TABLE --}}
    <div class="bg-white rounded shadow overflow-hidden">

        <table class="w-full text-sm">
            <thead class="bg-gray-100">
                <tr>
                    <th class="p-3 text-left">Guru</th>
                    <th class="p-3 text-left">Mapel</th>
                    <th class="p-3 text-left">Kelas</th>
                    <th class="p-3 text-left">Hari</th>
                    <th class="p-3 text-left">Waktu</th>
                    <th class="p-3 text-left">Aksi</th>
                </tr>
            </thead>

            <tbody>
                @foreach($jadwal as $j)
                <tr class="border-t hover:bg-gray-50">
                    <td class="p-3">{{ $j->guru->nama_lengkap }}</td>
                    <td class="p-3">{{ $j->mapel->nama }}</td>
                    <td class="p-3">{{ $j->kelas->nama }}</td>
                    <td class="p-3">
                        <span class="bg-blue-100 px-2 py-1 rounded text-xs">
                            {{ $j->hari }}
                        </span>
                    </td>
                    <td class="p-3">
                        {{ $j->jam_mulai }} - {{ $j->jam_selesai }}
                    </td>
                    <td class="p-3 flex gap-2">
                        <a href="{{ route('admin.jadwal-pelajaran.edit',$j->id) }}"
                           class="text-blue-500">Edit</a>

                        <form method="POST" action="{{ route('admin.jadwal-pelajaran.destroy',$j->id) }}">
                            @csrf @method('DELETE')
                            <button class="text-red-500">Hapus</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>

        </table>

    </div>

</div>

@endsection