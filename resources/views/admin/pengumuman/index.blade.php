@extends('layouts.admin')

@section('content')

<div class="p-6">

    <div class="flex justify-between items-center mb-6">
        <div>
            <h1 class="text-2xl font-bold">Pengumuman</h1>
            <p class="text-gray-500 text-sm">Informasi dan pengumuman terbaru</p>
        </div>

        <a href="{{ route('admin.pengumuman.create') }}"
           class="bg-indigo-600 text-white px-4 py-2 rounded-lg">
            + Tambah Pengumuman
        </a>
    </div>

    {{-- FILTER KATEGORI --}}
    <div class="mb-4">
        <form method="GET">
            <select name="kategori" onchange="this.form.submit()"
                class="border p-2 rounded">
                <option value="">Semua Kategori</option>
                <option value="akademik">Akademik</option>
                <option value="administrasi">Administrasi</option>
                <option value="umum">Umum</option>
            </select>
        </form>
    </div>

    {{-- LIST PENGUMUMAN --}}
    <div class="space-y-4">

        @forelse($pengumuman as $p)

        <div class="bg-white rounded-xl shadow border-l-4 
            {{ $p->prioritas == 'penting' ? 'border-red-500' : ($p->prioritas == 'sedang' ? 'border-yellow-400' : 'border-blue-400') }}
            p-5">

            {{-- HEADER --}}
            <div class="flex justify-between items-center mb-2">
                <h2 class="text-lg font-semibold text-indigo-600">
                    {{ $p->judul }}
                </h2>

           <span class="
                px-2 py-1 text-xs rounded
                {{ $p->prioritas == 'penting' ? 'bg-red-100 text-red-700' : '' }}
                {{ $p->prioritas == 'sedang' ? 'bg-yellow-100 text-yellow-700' : '' }}
                {{ $p->prioritas == 'biasa' ? 'bg-blue-100 text-blue-700' : '' }}
            ">
                {{ ucfirst($p->prioritas) }}
            </span>
            </div>

            {{-- ISI --}}
            <p class="text-gray-600 text-sm mb-3">
                {{ Str::limit($p->isi, 150) }}
            </p>

            {{-- FOOTER --}}
            <div class="flex justify-between items-center text-sm text-gray-500">

                <div class="flex gap-4">
                    <span>📅 {{ \Carbon\Carbon::parse($p->tanggal)->format('d M Y') }}</span>
                    <span>🏷 {{ ucfirst($p->kategori) }}</span>
                </div>

                <a href="{{ route('admin.pengumuman.show', $p->id) }}"
                   class="text-indigo-600 font-medium">
                    Baca Selengkapnya →
                </a>
            </div>
        </div>
        <div class="flex justify-end gap-2 mt-3">

    {{-- EDIT --}}
    <a href="{{ route('admin.pengumuman.edit', $p->id) }}"
       class="text-blue-600 text-sm">
        Edit
    </a>

    {{-- DELETE --}}
    <form action="{{ route('admin.pengumuman.destroy', $p->id) }}"
          method="POST"
          onsubmit="return confirm('Yakin hapus pengumuman ini?')">
        @csrf
        @method('DELETE')
        <button class="text-red-600 text-sm">
            Hapus
        </button>
    </form>

</div>

        @empty
            <div class="text-center text-gray-500">
                Belum ada pengumuman
            </div>
        @endforelse

    </div>

</div>

@endsection