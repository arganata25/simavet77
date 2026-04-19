@extends('layouts.admin')

@section('content')

<div class="p-6 max-w-md">

    <h1 class="text-xl font-bold mb-4">Tambah Kepala Sekolah</h1>

    <form method="POST" action="{{ route('admin.kepala_sekolah.store') }}">
        @csrf

        <input name="nama_lengkap" placeholder="Nama"
            class="w-full border p-2 mb-2" required>

        <input name="email" placeholder="Email"
            class="w-full border p-2 mb-2" required>

        <input name="password" type="password" placeholder="Password"
            class="w-full border p-2 mb-2" required>

        <input name="no_hp" type="text" placeholder="Nomor Handphone"
            class="w-full border p-2 mb-2" required>

        <select name="jenis_kelamin" class="w-full border p-2 mb-2">
            <option value="Laki-laki">Laki-laki</option>
            <option value="Perempuan">Perempuan</option>
        </select>

        <!-- role FIX -->
        <input type="hidden" name="role" value="kepala_sekolah">

        <button class="bg-indigo-600 text-white px-4 py-2 w-full">
            Simpan
        </button>

    </form>

</div>

@endsection