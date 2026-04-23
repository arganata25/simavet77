@extends('layouts.admin')

@section('content')

<div class="p-6 max-w-3xl mx-auto">

    <h1 class="text-2xl font-bold mb-2">
        {{ $pengumuman->judul }}
    </h1>

    <div class="text-sm text-gray-500 mb-4">
        📅 {{ \Carbon\Carbon::parse($pengumuman->tanggal)->format('d M Y') }} |
        🏷 {{ ucfirst($pengumuman->kategori) }}
    </div>

    <div class="bg-white p-6 rounded shadow">
        {{ $pengumuman->isi }}
    </div>

    <a href="{{ route('admin.pengumuman.index') }}"
       class="inline-block mt-4 text-indigo-600">
        ← Kembali
    </a>

</div>

@endsection