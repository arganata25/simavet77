@extends('layouts.admin')

@section('content')

<div class="p-6">

    <div class="flex justify-between mb-4">
        <h1 class="text-xl font-bold">Recycle Bin Jadwal</h1>

        <a href="{{ route('admin.jadwal-pelajaran.index') }}"
           class="bg-gray-500 text-white px-3 py-2 rounded">
            Kembali
        </a>
    </div>

    <div class="bg-white shadow rounded overflow-hidden">

        <table class="w-full text-sm">
            <thead class="bg-gray-100">
                <tr>
                    <th class="p-3">Guru</th>
                    <th class="p-3">Mapel</th>
                    <th class="p-3">Kelas</th>
                    <th class="p-3">Hari</th>
                    <th class="p-3">Waktu</th>
                    <th class="p-3">Aksi</th>
                </tr>
            </thead>

            <tbody>
                @forelse($jadwal as $j)
                <tr class="border-t">
                    <td class="p-3">{{ $j->guru->nama_lengkap ?? '-' }}</td>
                    <td class="p-3">{{ $j->mapel->nama ?? '-' }}</td>
                    <td class="p-3">{{ $j->kelas->nama ?? '-' }}</td>
                    <td class="p-3">{{ $j->hari }}</td>
                    <td class="p-3">{{ $j->jam_mulai }} - {{ $j->jam_selesai }}</td>
                    <td class="p-3 flex gap-2">

                        {{-- RESTORE --}}
                        <form method="POST" action="{{ route('admin.jadwal-pelajaran.restore',$j->id) }}">
                            @csrf
                            <button class="bg-green-500 text-white px-2 py-1 rounded text-xs">
                                Restore
                            </button>
                        </form>

                        {{-- DELETE PERMANEN --}}
                        <form method="POST" action="{{ route('admin.jadwal-pelajaran.forceDelete',$j->id) }}">
                            @csrf
                            @method('DELETE')
                            <button class="bg-red-500 text-white px-2 py-1 rounded text-xs">
                                Hapus Permanen
                            </button>
                        </form>

                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" class="text-center p-4 text-gray-500">
                        Tidak ada data di recycle bin
                    </td>
                </tr>
                @endforelse
            </tbody>

        </table>

    </div>

</div>

@endsection