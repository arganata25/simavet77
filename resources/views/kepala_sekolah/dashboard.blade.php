<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Dashboard Kepala Sekolah</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">

    <!-- HEADER -->
    <div class="bg-blue-600 text-white p-4 flex justify-between items-center">
        <h1 class="text-xl font-bold">Dashboard Kepala Sekolah</h1>

        <!-- LOGOUT -->
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button class="bg-red-500 px-4 py-2 rounded hover:bg-red-600">
                Logout
            </button>
        </form>
    </div>

    <!-- CONTENT -->
    <div class="p-6 grid grid-cols-1 md:grid-cols-3 gap-4">

        <!-- CARD 1 -->
        <div class="bg-white p-4 rounded shadow">
            <h2 class="text-gray-500">Total Siswa</h2>
            <p class="text-2xl font-bold">0</p>
        </div>

        <!-- CARD 2 -->
        <div class="bg-white p-4 rounded shadow">
            <h2 class="text-gray-500">Total Guru</h2>
            <p class="text-2xl font-bold">0</p>
        </div>

        <!-- CARD 3 -->
        <div class="bg-white p-4 rounded shadow">
            <h2 class="text-gray-500">Total Kelas</h2>
            <p class="text-2xl font-bold">0</p>
        </div>

        <!-- CARD 4 -->
        <div class="bg-white p-4 rounded shadow">
            <h2 class="text-gray-500">Rata-rata Nilai</h2>
            <p class="text-2xl font-bold">0</p>
        </div>

        <!-- CARD 5 -->
        <div class="bg-white p-4 rounded shadow">
            <h2 class="text-gray-500">Absensi Hari Ini</h2>
            <p class="text-2xl font-bold">0</p>
        </div>

    </div>

</body>
</html>