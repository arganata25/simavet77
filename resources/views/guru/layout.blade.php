<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>SIKAD Guru</title>

    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="flex bg-gray-50 min-h-screen">

    {{-- SIDEBAR --}}
    <div class="w-64 bg-white shadow-xl hidden md:block">

        {{-- PROFILE --}}
        <div class="p-6 text-center border-b bg-gray-50">
            <div class="w-20 h-20 bg-gradient-to-tr from-purple-600 to-pink-500 rounded-full mx-auto mb-3 flex items-center justify-center text-white text-2xl">
                👨‍🏫
            </div>

            <h2 class="font-bold text-gray-800">
                {{ auth()->user()->name ?? 'Guru' }}
            </h2>

            <span class="text-purple-600 text-xs font-semibold uppercase">
                Guru Aktif
            </span>
        </div>

        {{-- MENU --}}
        <nav class="mt-4 space-y-1 px-3 text-sm">

            <a href="{{ route('guru.dashboard') }}"
               class="block px-4 py-3 rounded-lg hover:bg-purple-50 hover:text-purple-700">
               🏠 Dashboard
            </a>

            <a href="{{ route('guru.jadwal') }}"
   class="flex items-center px-4 py-3 text-sm font-medium rounded-lg
   {{ request()->routeIs('guru.jadwal') ? 'bg-purple-50 text-purple-700' : 'hover:bg-gray-50' }}">
   📅 Jadwal Mengajar
</a>

            <a href="#"
               class="block px-4 py-3 rounded-lg hover:bg-purple-50 hover:text-purple-700">
               📝 Input Nilai
            </a>

            <a href="#"
               class="block px-4 py-3 rounded-lg hover:bg-purple-50 hover:text-purple-700">
               📷 Absensi
            </a>

            <a href="#"
               class="block px-4 py-3 rounded-lg hover:bg-purple-50 hover:text-purple-700">
               📂 Upload Materi
            </a>

            {{-- LOGOUT --}}
            <div class="pt-4 mt-4 border-t">
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button class="w-full text-left px-4 py-3 text-red-500 hover:bg-red-50 rounded-lg">
                        🚪 Logout
                    </button>
                </form>
            </div>

        </nav>

    </div>

    {{-- MAIN --}}
    <div class="flex-1 flex flex-col">

        {{-- NAVBAR --}}
        <header class="bg-gradient-to-r from-purple-700 to-pink-500 text-white px-6 py-4 flex justify-between">
            <div class="font-bold">
                SIAKAD | Dashboard Guru
            </div>

            <div>
                {{ auth()->user()->name ?? 'Guru' }}
            </div>
        </header>

        {{-- CONTENT --}}
        <main class="p-6">
            @yield('content')
        </main>

    </div>

</body>
</html>