@extends('layouts.admin')

@section('content')

<div class="p-6 max-w-md">

    <h1 class="text-xl font-bold mb-4">Edit Mapel</h1>

    <form method="POST" action="{{ route('admin.mata-pelajaran.update',$mapel->id) }}">
        @csrf @method('PUT')

        <input name="kode" value="{{ $mapel->kode }}"
            class="w-full border p-2 mb-2">

        <input name="nama" value="{{ $mapel->nama }}"
            class="w-full border p-2 mb-2">

        <button class="bg-indigo-600 text-white px-4 py-2 w-full">
            Update
        </button>

    </form>

</div>

@endsection