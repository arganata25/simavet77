@extends('layouts.admin')

@section('content')

<div class="p-6 max-w-md">

    <h1 class="text-xl font-bold mb-4">Edit Kepala Sekolah</h1>

    <form method="POST" action="{{ route('admin.kepala_sekolah.update',$data->id) }}">
        @csrf @method('PUT')

        <input name="nama_lengkap" value="{{ $data->nama_lengkap }}"
            class="w-full border p-2 mb-2">

        <input name="email" value="{{ $data->user->email }}"
            class="w-full border p-2 mb-2">

        <button class="bg-indigo-600 text-white px-4 py-2 w-full">
            Update
        </button>

    </form>

</div>

@endsection