<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'SIAKAD Admin')</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body class="bg-slate-100 font-sans">
    <div class="flex min-h-screen">
        
        <aside class="w-64 bg-indigo-900 text-white flex-shrink-0 shadow-xl hidden md:flex flex-col">
            <div class="p-6 flex items-center gap-3 border-b border-indigo-800">
                <i class="fas fa-graduation-cap text-2xl text-indigo-300"></i>
                <span class="text-xl font-bold tracking-wider">SIAKAD</span>
            </div>
            
           <nav class="flex-1 p-4 space-y-2 overflow-y-auto">

    <p class="text-xs font-semibold text-indigo-300 uppercase px-3 pb-2">Utama</p>

    <a href="{{ route('admin.dashboard') }}"
       class="flex items-center gap-3 px-4 py-3 rounded-lg transition-colors
       {{ request()->is('admin/dashboard') ? 'bg-indigo-800' : 'hover:bg-indigo-800' }}">
        <i class="fas fa-chart-line w-5"></i> Dashboard
    </a>

    <p class="text-xs font-semibold text-indigo-300 uppercase px-3 pt-4 pb-2">Manajemen User</p>

    <a href="{{ route('admin.users.index') }}"
       class="flex items-center gap-3 px-4 py-3 rounded-lg transition-colors
       {{ request()->is('admin/users*') ? 'bg-indigo-800' : 'hover:bg-indigo-800' }}">
        <i class="fas fa-users w-5"></i> Data User
    </a>

    <a href="{{ route('admin.kelas.index') }}"
       class="flex items-center gap-3 px-4 py-3 rounded-lg transition-colors
       {{ request()->is('admin/kelas*') ? 'bg-indigo-800' : 'hover:bg-indigo-800' }}">
        <i class="fas fa-school w-5"></i> Data Kelas
    </a>

    <a href="{{ route('admin.guru.index') }}"
       class="flex items-center gap-3 px-4 py-3 rounded-lg transition-colors
       {{ request()->is('admin/guru*') ? 'bg-indigo-800' : 'hover:bg-indigo-800' }}">
        <i class="fas fa-chalkboard-teacher w-5"></i> Data Guru
    </a>

    <a href="{{ route('admin.siswa.index') }}"
       class="flex items-center gap-3 px-4 py-3 rounded-lg transition-colors
       {{ request()->is('admin/siswa*') ? 'bg-indigo-800' : 'hover:bg-indigo-800' }}">
        <i class="fas fa-user-graduate w-5"></i> Data Siswa
    </a>

    <a href="{{ route('admin.kepala_sekolah.index') }}"
       class="flex items-center gap-3 px-4 py-3 rounded-lg transition-colors
       {{ request()->is('admin/kepala_sekolah*') ? 'bg-indigo-800' : 'hover:bg-indigo-800' }}">
        <i class="fas fa-user-graduate w-5"></i> Data Kepala Sekolah
    </a>
</nav>

            <div class="p-4 border-t border-indigo-800">
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="w-full flex items-center gap-3 px-4 py-3 text-red-300 hover:text-red-100 hover:bg-red-900/30 rounded-lg transition-colors">
                        <i class="fas fa-sign-out-alt w-5"></i> Keluar
                    </button>
                </form>
            </div>
        </aside>

        <main class="flex-1 flex flex-col min-w-0 overflow-hidden">
            <header class="bg-white border-b border-slate-200 h-16 flex items-center justify-between px-8 shadow-sm">
                <h2 class="text-lg font-semibold text-slate-700">Panel Administrator</h2>
                <div class="flex items-center gap-4">
                    <span class="text-sm text-slate-500 italic">{{ date('d M Y') }}</span>
                    <div class="w-8 h-8 rounded-full bg-indigo-100 flex items-center justify-center text-indigo-700 font-bold uppercase">
                        A
                    </div>
                </div>
            </header>

            <div class="flex-1 overflow-y-auto p-8">
                @yield('content')
            </div>
        </main>
        
    </div>
</body>
</html>