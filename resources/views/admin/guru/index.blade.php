@extends('layouts.admin')

@section('content')

<div class="p-6">

    <!-- HEADER -->
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold text-gray-800">Data Guru</h1>

        <button onclick="openModal()" 
            class="bg-indigo-600 hover:bg-indigo-700 text-white px-4 py-2 rounded-lg shadow">
            + Tambah Guru
        </button>
    </div>

    <!-- SEARCH -->
    <form method="GET" class="mb-4">
        <input type="text" name="search" value="{{ request('search') }}"
            placeholder="Cari guru..."
            class="border px-4 py-2 rounded-lg w-1/3 focus:ring focus:ring-indigo-200">
    </form>

    <!-- TABLE -->
    <div class="bg-white rounded-xl shadow border overflow-hidden">
        <table class="w-full text-sm">

            <thead class="bg-gray-100 text-gray-600 uppercase">
                <tr>
                    <th class="p-3 text-left">Nama</th>
                    <th class="p-3 text-left">Email</th>
                    <th class="p-3 text-left">NIP</th>
                    <th class="p-3 text-center">Aksi</th>
                </tr>
            </thead>

            <tbody>
                @forelse($guru as $g)
                <tr class="border-t hover:bg-gray-50">

                    <!-- NAMA -->
                    <td class="p-3">
                        <div class="font-semibold">{{ $g->nama_lengkap }}</div>
                    </td>

                    <!-- EMAIL -->
                    <td class="p-3 text-gray-500">
                        {{ $g->user->email ?? '-' }}
                    </td>

                    <!-- NIP -->
                    <td class="p-3">{{ $g->nip }}</td>

                    <!-- AKSI -->
                    <td class="p-3 text-center flex justify-center gap-2">

                        <!-- EDIT -->
                        <button 
                           onclick="editData(
                             {{ $g->id }}, 
                            '{{ $g->nama_lengkap }}', 
                            '{{ $g->nip }}',
                            '{{ $g->no_hp }}'
                        )"
                            class="bg-blue-500 hover:bg-blue-600 text-white px-3 py-1 rounded">
                            Edit
                        </button>

                        <!-- DELETE -->
                        <form method="POST" action="{{ route('admin.guru.destroy', $g->id) }}">
                            @csrf
                            @method('DELETE')
                            <button 
                                onclick="return confirm('Yakin hapus data?')"
                                class="bg-red-500 hover:bg-red-600 text-white px-3 py-1 rounded">
                                Hapus
                            </button>
                        </form>

                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="4" class="text-center p-6 text-gray-500">
                        Belum ada data guru
                    </td>
                </tr>
                @endforelse
            </tbody>

        </table>

        <!-- PAGINATION -->
        <div class="p-4">
            {{ $guru->links() }}
        </div>
    </div>

</div>

<!-- MODAL -->
<div id="modal" class="fixed inset-0 bg-black bg-opacity-50 hidden items-center justify-center">

    <div class="bg-white rounded-xl shadow-lg p-6 w-96">

        <h2 class="text-lg font-bold mb-4">Form Guru</h2>

        <form id="form" method="POST">
            @csrf

            <input type="hidden" name="_method" id="method">

            <input 
                type="text"
                name="nama_lengkap" 
                id="nama"
                placeholder="Nama Lengkap"
                class="w-full border p-2 mb-3 rounded"
                required
            >

            <input 
                type="text"
                name="nip" 
                id="nip"
                placeholder="NIP"
                class="w-full border p-2 mb-3 rounded"
                required
            >

            <input 
                type="text"
                name="no_hp" 
                id="no_hp"
                placeholder="No HP"
                class="w-full border p-2 mb-3 rounded"
            >

            <button class="bg-indigo-600 hover:bg-indigo-700 text-white px-4 py-2 w-full rounded">
                Simpan
            </button>
        </form>

        <button onclick="closeModal()" class="mt-3 text-red-500 w-full">
            Tutup
        </button>

    </div>

</div>

<!-- SCRIPT -->
<script>

function openModal() {
    document.getElementById('modal').classList.remove('hidden');

    document.getElementById('form').action = "{{ route('admin.guru.store') }}";
    document.getElementById('method').value = '';

    document.getElementById('nama').value = '';
    document.getElementById('nip').value = '';
}

function closeModal() {
    document.getElementById('modal').classList.add('hidden');
}

function editData(id, nama, nip, no_hp) {
    openModal();

    document.getElementById('nama').value = nama;
    document.getElementById('nip').value = nip;
    document.getElementById('no_hp').value = no_hp;

    document.getElementById('form').action = '/admin/guru/' + id;
    document.getElementById('method').value = 'PUT';
}
</script>

@endsection