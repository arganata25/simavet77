<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SIAKAD - SMK Veteran 1 Tulungagung</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Inter', sans-serif; }
    </style>
</head>
<body class="flex bg-gray-50 min-h-screen">

    <div class="w-64 bg-white shadow-xl z-10 hidden md:block">
        <div class="p-6 text-center border-b border-gray-100 bg-gray-50">
            <div class="w-20 h-20 bg-gradient-to-tr from-purple-600 to-pink-500 rounded-full mx-auto mb-3 flex items-center justify-center shadow-md">
                <svg class="w-10 h-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
            </div>
            <h2 class="font-bold text-gray-800 truncate">{{ auth()->user()->name }}</h2>
            <span class="text-purple-600 text-xs font-semibold uppercase">Siswa Aktif</span>
        </div>

        <nav class="mt-4 space-y-1 px-3">
            <a href="{{ route('siswa.dashboard') }}" class="flex items-center px-4 py-3 text-sm font-medium rounded-lg bg-purple-50 text-purple-700">
                <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path></svg>
                Beranda
            </a>
            <a href="{{ route('siswa.akademik') }}" class="flex items-center px-4 py-3 text-sm font-medium text-gray-600 rounded-lg hover:bg-gray-50 hover:text-purple-600 transition-colors">
                <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path></svg>
                Akademik
            </a>
            <a href="{{ route('siswa.absensi') }}" class="flex items-center px-4 py-3 text-sm font-medium text-gray-600 rounded-lg hover:bg-gray-50 hover:text-purple-600 transition-colors">
                <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                Absensi
            </a>
            <a href="{{ route('siswa.jadwal') }}" class="flex items-center px-4 py-3 text-sm font-medium text-gray-600 rounded-lg hover:bg-gray-50 hover:text-purple-600 transition-colors">
                <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                Jadwal
            </a>
            <a href="{{ route('siswa.tugas') }}" class="flex items-center px-4 py-3 text-sm font-medium text-gray-600 rounded-lg hover:bg-purple-50 hover:text-purple-700 transition-colors">
                <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01"></path></svg>
                Ujian & Tugas
            </a>
            <a href="{{ route('siswa.nilai') }}" class="flex items-center px-4 py-3 text-sm font-medium text-gray-600 rounded-lg hover:bg-purple-50 hover:text-purple-700 transition-colors">
                <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path></svg>
                Nilai Akademik
            </a>
            <a href="{{ route('siswa.pkl') }}" class="flex items-center px-4 py-3 text-sm font-medium text-gray-600 rounded-lg hover:bg-purple-50 hover:text-purple-700 transition-colors">
                <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                PKL / Magang
            </a>
            <a href="{{ route('siswa.pengumuman') }}" class="flex items-center px-4 py-3 text-sm font-medium text-gray-600 rounded-lg hover:bg-purple-50 hover:text-purple-700 transition-colors">
                <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5.882V19.24a1.76 1.76 0 01-3.417.592l-2.147-6.15M18 13a3 3 0 100-6M5.436 13.683A4.001 4.001 0 017 6h1.832c4.1 0 7.625-1.234 9.168-3v14c-1.543-1.766-5.067-3-9.168-3H7a3.988 3.988 0 01-1.564-.317z"></path></svg>
                Pengumuman
            </a>

            <div class="pt-4 mt-4 border-t border-gray-100">
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button class="w-full flex items-center px-4 py-3 text-sm font-medium text-red-500 rounded-lg hover:bg-red-50 transition-colors">
                        <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path></svg>
                        Logout
                    </button>
                </form>
            </div>
        </nav>
    </div>

    <div class="flex-1 flex flex-col min-h-screen overflow-hidden">
        
        <header class="bg-gradient-to-r from-purple-700 via-purple-600 to-pink-500 shadow-md">
            <div class="px-6 py-4 flex justify-between items-center text-white">
                <div class="flex items-center">
                    <h1 class="text-xl font-bold tracking-wider">SIAKAD</h1>
                    <span class="hidden md:inline-block ml-3 pl-3 border-l border-white/30 text-purple-100 text-sm">SMK Veteran 1 Tulungagung</span>
                </div>
                <div class="text-sm font-medium text-purple-100">
                    Welcome, <span class="font-bold text-white">{{ auth()->user()->name }}</span>
                </div>
            </div>
        </header>

        <main class="p-6 md:p-8 overflow-y-auto">
            @yield('content')
        </main>

    </div>

</body>
</html>