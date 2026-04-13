<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Dashboard Guru</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">

    <!-- HEADER -->
    <div class="bg-teal-600 text-white p-4 flex justify-between items-center">
        <h1 class="text-xl font-bold">Dashboard Guru</h1>

        <!-- LOGOUT -->
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button class="bg-red-500 px-4 py-2 rounded hover:bg-red-600">
                Logout
            </button>
        </form>
    </div>

    <!-- CONTENT CARDS -->
    <div class="p-6 grid grid-cols-1 md:grid-cols-3 gap-4">

        <!-- KELAS DIAJAR -->
        <div class="bg-white p-4 rounded shadow">
            <h2 class="text-gray-500">Kelas Mengajar</h2>
            <p class="text-2xl font-bold">-</p>
        </div>

        <!-- TOTAL SISWA -->
        <div class="bg-white p-4 rounded shadow">
            <h2 class="text-gray-500">Jumlah Siswa</h2>
            <p class="text-2xl font-bold">-</p>
        </div>

        <!-- JADWAL HARI INI -->
        <div class="bg-white p-4 rounded shadow">
            <h2 class="text-gray-500">Jadwal Hari Ini</h2>
            <p class="text-2xl font-bold">-</p>
        </div>

    </div>

    <!-- MENU NAVIGATION -->
    <div class="p-6 grid grid-cols-1 md:grid-cols-3 gap-4">

        <a href="{{ route('guru.nilai.index') }}"
           class="bg-blue-500 text-white p-4 rounded text-center hover:bg-blue-600">
            Input Nilai
        </a>

        <a href="{{ route('guru.absensi.index') }}"
           class="bg-yellow-500 text-white p-4 rounded text-center hover:bg-yellow-600">
            Absensi Siswa
        </a>

        <a href="{{ route('guru.jadwal') }}"
           class="bg-purple-500 text-white p-4 rounded text-center hover:bg-purple-600">
            Jadwal Mengajar
        </a>

    </div>

</body>
</html>