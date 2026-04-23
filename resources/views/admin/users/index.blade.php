@extends('layouts.admin')

@section('content')

<div class="p-6">

    <!-- HEADER -->
    <div class="flex justify-between items-center mb-6">
        <div>
            <h1 class="text-2xl font-bold">Manajemen User</h1>
            <p class="text-gray-500 text-sm">Kelola akses pengguna sistem</p>
        </div>

        <button onclick="openModal()"
            class="bg-gradient-to-r from-purple-600 to-indigo-600 text-white px-4 py-2 rounded-lg">
            + Tambah User
        </button>
    </div>

    <!-- FILTER -->
    <div class="flex gap-3 mb-4">
        <form method="GET" class="flex gap-2 w-full">

            <select name="role" class="border px-3 py-2 rounded">
                <option value="">Semua</option>
                <option value="admin">Admin</option>
                <option value="guru">Guru</option>
                <option value="siswa">Siswa</option>
            </select>

            <input type="text" name="search" placeholder="Cari user..."
                class="border px-4 py-2 rounded w-full">

            <button class="bg-gray-200 px-4 rounded">Filter</button>
        </form>
    </div>

    <!-- TABLE -->
    <div class="bg-white rounded-xl shadow overflow-hidden">
        <table class="w-full text-sm">
            <thead class="bg-gray-100 text-gray-600 uppercase text-xs">
                <tr>
                    <th class="p-3 text-left">Nama</th>
                    <th class="p-3">Email</th>
                    <th class="p-3">Role</th>
                    <th class="p-3">Status</th>
                    <th class="p-3 text-center">Aksi</th>
                </tr>
            </thead>

            <tbody>
                @forelse($users as $u)
                <tr class="border-t hover:bg-gray-50">

                    <td class="p-3 font-medium">{{ $u->name }}</td>
                    <td class="p-3">{{ $u->email }}</td>

                    <td class="p-3 text-center">
                        <span class="px-2 py-1 text-xs rounded 
                            @if($u->role == 'admin') bg-gray-200
                            @elseif($u->role == 'guru') bg-blue-100 text-blue-700
                            @elseif($u->role == 'siswa') bg-green-100 text-green-700
                            @endif">
                            {{ ucfirst($u->role) }}
                        </span>
                    </td>

                    <td class="p-3 text-center">
                        <span class="bg-green-100 text-green-700 px-2 py-1 rounded text-xs">
                            Aktif
                        </span>
                    </td>

                    <td class="p-3 flex justify-center gap-2">

                        <button onclick='editData(@json($u))'
                            class="text-blue-600 hover:underline">
                            Edit
                        </button>

                        <form method="POST" action="{{ route('admin.users.destroy', $u->id) }}">
    @csrf
    @method('DELETE')
    <button onclick="return confirm('Yakin hapus user ini?')"
        class="text-red-500">
        Hapus
    </button>
</form>

                    </td>

                </tr>
                @empty
                <tr>
                    <td colspan="5" class="text-center p-6 text-gray-400">
                        Belum ada user
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>

        <div class="p-4">
            {{ $users->links() }}
        </div>
    </div>
</div>

<!-- MODAL -->
<div id="modal" class="fixed inset-0 bg-black bg-opacity-50 hidden flex items-center justify-center">

    <div class="bg-white p-6 rounded-lg w-96">
        <h2 class="font-bold text-lg mb-4">Form User</h2>

        <form id="form" method="POST">
            @csrf
            <input type="hidden" name="_method" id="method">

            <!-- Nama -->
            <input type="text" name="name" id="name" placeholder="Nama"
                class="w-full border p-2 mb-2 rounded" required>

            <!-- Email -->
            <input type="email" name="email" id="email" placeholder="Email"
                class="w-full border p-2 mb-2 rounded" required>

            <!-- Password -->
            <input type="password" name="password" id="password" placeholder="Password (kosongkan jika edit)"
                class="w-full border p-2 mb-2 rounded">

            <!-- Role -->
            <select name="role" id="role" class="w-full border p-2 mb-2 rounded">
                <option value="admin">Admin</option>
                <option value="guru">Guru</option>
                <option value="siswa">Siswa</option>
                <option value="kepala_sekolah">Kepala Sekolah</option>
            </select>

            <!-- Jenis Kelamin -->
            <select name="jenis_kelamin" id="jenis_kelamin" class="w-full border p-2 mb-3 rounded">
                <option value="Laki-laki">Laki-laki</option>
                <option value="Perempuan">Perempuan</option>
            </select>

            <button class="bg-indigo-600 text-white w-full py-2 rounded">
                Simpan
            </button>
        </form>

        <button onclick="closeModal()" class="text-red-500 mt-3">Tutup</button>
    </div>
</div>

<script>
function openModal() {
    document.getElementById('modal').classList.remove('hidden');

    const form = document.getElementById('form');

    form.action = "{{ route('admin.users.store') }}";
    document.getElementById('method').value = '';

    // reset semua input
    form.reset();
}

function closeModal() {
    document.getElementById('modal').classList.add('hidden');
}

function editData(data) {
    openModal();

    document.getElementById('name').value = data.name;
    document.getElementById('email').value = data.email;
    document.getElementById('role').value = data.role;

    // kosongkan password saat edit
    document.getElementById('password').value = '';

    document.getElementById('form').action = '/admin/users/' + data.id;
    document.getElementById('method').value = 'PUT';
}
</script>

@endsection