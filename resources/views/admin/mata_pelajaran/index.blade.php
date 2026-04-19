@extends('layouts.admin')

@section('content')

<div class="p-6">

    <div class="flex justify-between mb-4">
        <h1 class="text-2xl font-bold">Data Mata Pelajaran</h1>

        <a href="{{ route('admin.mata-pelajaran.create') }}"
           class="bg-indigo-600 text-white px-4 py-2 rounded">
           + Tambah Mapel
        </a>
    </div>

    <div class="bg-white rounded shadow">
        <table class="w-full">
            <thead class="bg-gray-100">
                <tr>
                    <th class="p-3">Kode</th>
                    <th class="p-3">Nama</th>
                    <th class="p-3">Aksi</th>
                </tr>
            </thead>

            <tbody>
                @foreach($mapel as $m)
                <tr class="border-t">
                    <td class="p-3">{{ $m->kode }}</td>
                    <td class="p-3">{{ $m->nama }}</td>
                    <td class="p-3 flex gap-2">
                        <a href="{{ route('admin.mata-pelajaran.edit',$m->id) }}"
                           class="bg-blue-500 text-white px-2 py-1 rounded">Edit</a>

                        <form method="POST" action="{{ route('admin.mata-pelajaran.destroy',$m->id) }}">
                            @csrf @method('DELETE')
                            <button class="bg-red-500 text-white px-2 py-1 rounded">Hapus</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

        <div class="p-4">
            {{ $mapel->links() }}
        </div>
    </div>

</div>

@endsection