@extends('layouts.admin')

@section('content')

<div class="p-6">

    <div class="flex justify-between mb-4">
        <h1 class="text-2xl font-bold">Data Kepala Sekolah</h1>

        <a href="{{ route('admin.kepala_sekolah.create') }}"
           class="bg-indigo-600 text-white px-4 py-2 rounded">
           + Tambah Kepala Sekolah
        </a>
    </div>

    <div class="bg-white rounded shadow">
        <table class="w-full">
            <thead class="bg-gray-100">
                <tr>
                    <th class="p-3">Nama</th>
                    <th class="p-3">Email</th>
                    <th class="p-3">Aksi</th>
                </tr>
            </thead>

            <tbody>
                @foreach($data as $d)
                <tr class="border-t">
                    <td class="p-3">{{ $d->nama_lengkap }}</td>
                    <td class="p-3">{{ $d->user->email }}</td>

                    <td class="p-3 flex gap-2">
                        <a href="{{ route('admin.kepala_sekolah.edit',$d->id) }}"
                           class="bg-blue-500 text-white px-3 py-1 rounded">
                           Edit
                        </a>

                        <form method="POST" action="{{ route('admin.kepala_sekolah.destroy',$d->id) }}">
                            @csrf @method('DELETE')
                            <button class="bg-red-500 text-white px-3 py-1 rounded">
                                Hapus
                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

</div>

@endsection