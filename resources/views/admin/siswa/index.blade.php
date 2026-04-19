@extends('layouts.admin')

@section('content')

<div class="p-6">

    <div class="flex justify-between mb-4">
        <h1 class="text-2xl font-bold">Data Siswa</h1>

      <button onclick="openModal()" 
            class="bg-indigo-600 hover:bg-indigo-700 text-white px-4 py-2 rounded-lg shadow">
            + Tambah Siswa
        </button>
    </div>

    <!-- SEARCH -->
    <form method="GET" class="mb-4">
        <input type="text" name="search" placeholder="Cari siswa..."
            class="border px-4 py-2 rounded w-1/3">
    </form>

    <!-- TABLE -->
    <div class="bg-white rounded shadow">
        <table class="w-full">
            <thead class="bg-gray-100">
                <tr>
                    <th class="p-3">Nama</th>
                    <th class="p-3">NISN</th>
                    <th class="p-3">Kelas</th>
                    <th class="p-3">Jurusan</th>
                    <th class="p-3">Angkatan</th>
                    <th class="p-3">JK</th>
                    <th class="p-3">Aksi</th>
                </tr>
            </thead>

            <tbody>
@foreach($siswa as $s)
<tr class="border-t">
    <td class="p-3">{{ $s->nama_lengkap }}</td>
    <td class="p-3">{{ $s->nisn }}</td>

    <!-- KELAS -->
    <td class="p-3">
        {{ $s->kelas->nama ?? '-' }}
    </td>

    <!-- JURUSAN -->
    <td class="p-3">
        {{ $s->kelas->jurusan ?? '-' }}
    </td>

    <!-- ANGKATAN -->
    <td class="p-3">
        {{ $s->kelas->tahunAjaran->nama ?? '-' }}
    </td>

    <!-- JK -->
    <td class="p-3">
        <span class="px-2 py-1 rounded text-xs 
        {{ $s->jenis_kelamin == 'Laki-laki' ? 'bg-blue-100 text-blue-600' : 'bg-pink-100 text-pink-600' }}">
        {{ $s->jenis_kelamin }}
        </span>
    </td>

    <!-- AKSI -->
    <td class="p-3 flex gap-2">

        <button onclick='editData(@json($s))'
            class="bg-blue-500 text-white px-3 py-1 rounded">
            Edit
        </button>

        <form method="POST" action="{{ route('admin.siswa.destroy',$s->id) }}">
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

        <div class="p-4">
            {{ $siswa->links() }}
        </div>
    </div>
</div>

<!-- MODAL -->
<div id="modal" class="fixed inset-0 bg-black bg-opacity-50 hidden justify-center items-center">

    <div class="bg-white p-6 rounded w-96">
        <h2 class="text-lg font-bold mb-4">Form Siswa</h2>

        <form id="form" method="POST" >
            @csrf

            <input type="hidden" name="_method" id="method">

            <input name="nama_lengkap" 
            id="nama" 
            placeholder="Nama"
             class="w-full border p-2 mb-2">

            <input name="nisn" id="nisn" placeholder="NISN"
                class="w-full border p-2 mb-2">
              <div class="mb-2">
    <label class="block text-sm mb-1">Jenis Kelamin</label>

    <div class="flex gap-4">
        <label class="flex items-center gap-2">
            <input type="radio" name="jenis_kelamin" value="Laki-laki">
            Laki-laki
        </label>

        <label class="flex items-center gap-2">
            <input type="radio" name="jenis_kelamin" value="Perempuan">
            Perempuan
        </label>
    </div>
</div>

<input name="no_hp_siswa" placeholder="No HP" class="w-full border p-2 mb-2">

<input name="kelas_id" placeholder="ID Kelas" class="w-full border p-2 mb-2">

            <button class="bg-indigo-600 text-white px-4 py-2 w-full">
                Simpan
            </button>
        </form>

        <button onclick="closeModal()" class="mt-2 text-red-500">Tutup</button>
    </div>
</div>

<script>
function openModal() {
    document.getElementById('modal').classList.remove('hidden');
    document.getElementById('form').action = "{{ route('admin.siswa.store') }}";
    document.getElementById('method').value = '';
}

function closeModal() {
    document.getElementById('modal').classList.add('hidden');
}

function editData(data) {
    openModal();
    document.getElementById('nama').value = data.nama_lengkap;
    document.getElementById('nisn').value = data.nisn;

    document.getElementById('form').action = '/admin/siswa/' + data.id;
    document.getElementById('method').value = 'PUT';
}
</script>

@endsection