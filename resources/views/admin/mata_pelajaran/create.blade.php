@extends('layouts.admin')

@section('content')

<div class="p-6 max-w-md">

    <h1 class="text-xl font-bold mb-4">Tambah Mapel</h1>

    <form method="POST" action="{{ route('admin.mata-pelajaran.store') }}">
        @csrf

        <input name="kode" placeholder="Kode Mapel"
            class="w-full border p-2 mb-2">

        <input name="nama" placeholder="Nama Mapel"
            class="w-full border p-2 mb-2">

        <button class="bg-indigo-600 text-white px-4 py-2 w-full">
            Simpan
        </button>

    </form>

</div>

@endsection