<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Dashboard Admin</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">

    <!-- HEADER -->
    <div class="bg-indigo-600 text-white p-4 flex justify-between items-center">
        <h1 class="text-xl font-bold">Dashboard Admin</h1>

        <!-- LOGOUT -->
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button class="bg-red-500 px-4 py-2 rounded hover:bg-red-600">
                Logout
            </button>
        </form>
    </div>

    <!-- CONTENT CARDS -->
    <div class="p-6 grid grid-cols-1 md:grid-cols-4 gap-4">

        <div class="bg-white p-4 rounded shadow">
            <h2 class="text-gray-500">Total Siswa</h2>
            <p class="text-2xl font-bold">0</p>
        </div>

        <div class="bg-white p-4 rounded shadow">
            <h2 class="text-gray-500">Total Guru</h2>
            <p class="text-2xl font-bold">0</p>
        </div>

        <div class="bg-white p-4 rounded shadow">
            <h2 class="text-gray-500">Total Kelas</h2>
            <p class="text-2xl font-bold">0</p>
        </div>

        <div class="bg-white p-4 rounded shadow">
            <h2 class="text-gray-500">Total Mapel</h2>
            <p class="text-2xl font-bold">0</p>
        </div>

    </div>

    <!-- MENU NAVIGATION -->
    <div class="p-6 grid grid-cols-1 md:grid-cols-3 gap-4">

        <a href="{{ route('admin.users.index') }}" class="bg-blue-500 text-white p-4 rounded text-center hover:bg-blue-600">
            Manajemen User
        </a>

        <a href="{{ route('admin.guru.index') }}" class="bg-green-500 text-white p-4 rounded text-center hover:bg-green-600">
            Data Guru
        </a>

        <a href="{{ route('admin.siswa.index') }}" class="bg-yellow-500 text-white p-4 rounded text-center hover:bg-yellow-600">
            Data Siswa
        </a>

        <a href="{{ route('admin.kelas.index') }}" class="bg-purple-500 text-white p-4 rounded text-center hover:bg-purple-600">
            Data Kelas
        </a>

        <a href="{{ route('admin.mata-pelajaran.index') }}" class="bg-pink-500 text-white p-4 rounded text-center hover:bg-pink-600">
            Mata Pelajaran
        </a>

        <a href="{{ route('admin.jadwal-pelajaran.index') }}" class="bg-indigo-500 text-white p-4 rounded text-center hover:bg-indigo-600">
            Jadwal Pelajaran
        </a>

        <a href="{{ route('admin.nilai.index') }}" class="bg-orange-500 text-white p-4 rounded text-center hover:bg-orange-600">
            Nilai Siswa
        </a>

        <a href="{{ route('admin.absensi.index') }}" class="bg-gray-500 text-white p-4 rounded text-center hover:bg-gray-600">
            Absensi
        </a>

        <a href="{{ route('admin.pengumuman.index') }}" class="bg-red-500 text-white p-4 rounded text-center hover:bg-red-600">
            Pengumuman
        </a>

    </div>

</body>
</html>