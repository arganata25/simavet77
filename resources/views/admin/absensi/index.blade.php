@extends('layouts.admin')

@section('content')

<div class="p-6">

    <div class="flex justify-between mb-4">
        <h1 class="text-xl font-bold">Data Absensi</h1>

        <a href="{{ route('admin.absensi.create') }}"
           class="bg-indigo-600 text-white px-3 py-2 rounded">
            + Tambah
        </a>
    </div>

    <table class="w-full border">
        <thead>
            <tr class="bg-gray-100">
                <th class="p-2">Siswa</th>
                <th class="p-2">Tanggal</th>
                <th class="p-2">Status</th>
                <th class="p-2">Aksi</th>
            </tr>
        </thead>

        <tbody>
            @foreach($absensi as $a)
            <tr>
                <td class="p-2">{{ $a->siswa->nama ?? '_' }}</td>
                <td class="p-2">{{ $a->tanggal }}</td>
                <td class="p-2">{{ ucfirst($a->status) }}</td>
                <td class="p-2 flex gap-2">
                    <a href="{{ route('admin.absensi.edit',$a->id) }}"
                       class="text-blue-500">Edit</a>

                    <form method="POST" action="{{ route('admin.absensi.destroy',$a->id) }}">
                        @csrf @method('DELETE')
                        <button class="text-red-500">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

</div>

@endsection