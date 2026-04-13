<!DOCTYPE html>
<html>
<head>
    <title>SIAKAD</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="flex bg-gray-100">

<!-- SIDEBAR -->
<div class="w-64 bg-white min-h-screen shadow">

    <div class="p-6 text-center border-b">
        <div class="w-16 h-16 bg-orange-500 rounded-full mx-auto mb-2"></div>
        <h2 class="font-bold">{{ auth()->user()->name }}</h2>
        <span class="text-purple-600 text-sm">ARGANATA SANGGARA</span>
    </div>

    <nav class="text-sm mt-4 space-y-1">

        <a href="{{ route('siswa.dashboard') }}" class="block px-6 py-3 hover:bg-purple-100">🏠 Beranda</a>
        <a href="{{ route('siswa.akademik') }}" class="block px-6 py-3 hover:bg-purple-100">📚 Akademik</a>
        <a href="{{ route('siswa.absensi') }}" class="block px-6 py-3 hover:bg-purple-100">✔ Absen</a>
        <a href="{{ route('siswa.jadwal') }}" class="block px-6 py-3 hover:bg-purple-100">📅 Jadwal</a>
        <a href="{{ route('siswa.mentor') }}" class="block px-6 py-3 hover:bg-purple-100">👨‍🏫 Mentor</a>
        <a href="{{ route('siswa.alumni') }}" class="block px-6 py-3 hover:bg-purple-100">🎓 Alumni</a>
        <a href="{{ route('siswa.tugas') }}" class="block px-6 py-3 hover:bg-purple-100">📝 Tugas</a>
        <a href="{{ route('siswa.nilai') }}" class="block px-6 py-3 hover:bg-purple-100">📊 Nilai</a>
        <a href="{{ route('siswa.pkl') }}" class="block px-6 py-3 hover:bg-purple-100">🏢 PKL</a>
        <a href="{{ route('siswa.pengumuman') }}" class="block px-6 py-3 hover:bg-purple-100">📢 Pengumuman</a>

        <form method="POST" action="{{ route('logout') }}" class="px-6 pt-4">
            @csrf
            <button class="text-red-500">Logout</button>
        </form>

    </nav>

</div>

<!-- MAIN -->
<div class="flex-1">

    <div class="bg-gradient-to-r from-purple-700 to-pink-500 text-white p-4 flex justify-between">
        <span>SIAKAD SMK Veteran 1 Tulungagung</span>
        <span>WELCOME, {{ auth()->user()->name }}</span>
    </div>

    <div class="p-6">
        @yield('content')
    </div>

</div>

</body>
</html>