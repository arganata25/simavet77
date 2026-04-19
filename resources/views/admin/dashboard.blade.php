<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SIAKAD - Dashboard Admin</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Inter', sans-serif; }
    </style>
</head>
<body class="bg-slate-50 min-h-screen">

    <nav class="bg-indigo-900 text-white shadow-md">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-16">
                <div class="flex items-center gap-3">
                    <i class="fas fa-graduation-cap text-2xl text-indigo-300"></i>
                    <h1 class="text-xl font-bold tracking-wider">SIAKAD <span class="font-light text-indigo-300">ADMIN</span></h1>
                </div>

                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button class="flex items-center gap-2 bg-red-600/80 px-4 py-2 rounded-md hover:bg-red-600 transition-colors text-sm font-medium">
                        <i class="fas fa-sign-out-alt"></i> Logout
                    </button>
                </form>
            </div>
        </div>
    </nav>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        
        <div class="mb-8">
            <h2 class="text-2xl font-bold text-slate-800">Selamat Datang, Administrator</h2>
            <p class="text-slate-500">Ringkasan data akademik sekolah hari ini.</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-10">
            
            <div class="bg-white p-6 rounded-xl shadow-sm border border-slate-200 flex items-center justify-between border-l-4 border-l-blue-500">
                <div>
                    <h2 class="text-sm font-semibold text-slate-500 uppercase tracking-wider">Siswa Aktif</h2>
                    <p class="text-3xl font-bold text-slate-800 mt-1">{{ $stats['total_siswa'] ?? 0 }}</p>
                </div>
                <div class="p-3 bg-blue-50 text-blue-500 rounded-lg">
                    <i class="fas fa-user-graduate text-2xl"></i>
                </div>
            </div>

            <div class="bg-white p-6 rounded-xl shadow-sm border border-slate-200 flex items-center justify-between border-l-4 border-l-green-500">
                <div>
                    <h2 class="text-sm font-semibold text-slate-500 uppercase tracking-wider">Total Guru</h2>
                    <p class="text-3xl font-bold text-slate-800 mt-1">{{ $stats['total_guru'] ?? 0 }}</p>
                </div>
                <div class="p-3 bg-green-50 text-green-500 rounded-lg">
                    <i class="fas fa-chalkboard-teacher text-2xl"></i>
                </div>
            </div>

            <div class="bg-white p-6 rounded-xl shadow-sm border border-slate-200 flex items-center justify-between border-l-4 border-l-yellow-500">
                <div>
                    <h2 class="text-sm font-semibold text-slate-500 uppercase tracking-wider">Total Kelas</h2>
                    <p class="text-3xl font-bold text-slate-800 mt-1">{{ $stats['total_kelas'] ?? 0 }}</p>
                </div>
                <div class="p-3 bg-yellow-50 text-yellow-500 rounded-lg">
                    <i class="fas fa-school text-2xl"></i>
                </div>
            </div>

            <div class="bg-white p-6 rounded-xl shadow-sm border border-slate-200 flex items-center justify-between border-l-4 border-l-purple-500">
                <div>
                    <h2 class="text-sm font-semibold text-slate-500 uppercase tracking-wider">Total Pengguna</h2>
                    <p class="text-3xl font-bold text-slate-800 mt-1">{{ $stats['total_user'] ?? 0 }}</p>
                </div>
                <div class="p-3 bg-purple-50 text-purple-500 rounded-lg">
                    <i class="fas fa-users-cog text-2xl"></i>
                </div>
            </div>

        </div>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            
            <div class="lg:col-span-2">
                <div class="flex items-center gap-2 mb-4">
                    <i class="fas fa-th-large text-indigo-600"></i>
                    <h3 class="text-lg font-bold text-slate-800">Modul Manajemen Akademik</h3>
                </div>
                
                <div class="grid grid-cols-2 sm:grid-cols-3 gap-4">
                    <a href="{{ route('admin.users.index') }}" class="group flex flex-col items-center justify-center p-6 bg-white rounded-xl shadow-sm border border-slate-200 hover:border-indigo-500 hover:shadow-md transition-all duration-200">
                        <i class="fas fa-user-shield text-3xl text-slate-400 group-hover:text-indigo-600 mb-3 transition-colors"></i>
                        <span class="text-sm font-semibold text-slate-700 group-hover:text-indigo-700">Manajemen User</span>
                    </a>

                    <a href="{{ route('admin.guru.index') }}" class="group flex flex-col items-center justify-center p-6 bg-white rounded-xl shadow-sm border border-slate-200 hover:border-indigo-500 hover:shadow-md transition-all duration-200">
                        <i class="fas fa-chalkboard-teacher text-3xl text-slate-400 group-hover:text-indigo-600 mb-3 transition-colors"></i>
                        <span class="text-sm font-semibold text-slate-700 group-hover:text-indigo-700">Data Guru</span>
                    </a>

                    <a href="{{ route('admin.siswa.index') }}" class="group flex flex-col items-center justify-center p-6 bg-white rounded-xl shadow-sm border border-slate-200 hover:border-indigo-500 hover:shadow-md transition-all duration-200">
                        <i class="fas fa-user-graduate text-3xl text-slate-400 group-hover:text-indigo-600 mb-3 transition-colors"></i>
                        <span class="text-sm font-semibold text-slate-700 group-hover:text-indigo-700">Data Siswa</span>
                    </a>

                    <a href="{{ route('admin.kelas.index') }}" class="group flex flex-col items-center justify-center p-6 bg-white rounded-xl shadow-sm border border-slate-200 hover:border-indigo-500 hover:shadow-md transition-all duration-200">
                        <i class="fas fa-chalkboard text-3xl text-slate-400 group-hover:text-indigo-600 mb-3 transition-colors"></i>
                        <span class="text-sm font-semibold text-slate-700 group-hover:text-indigo-700">Data Kelas</span>
                    </a>

                    <a href="{{ route('admin.mata-pelajaran.index') }}" class="group flex flex-col items-center justify-center p-6 bg-white rounded-xl shadow-sm border border-slate-200 hover:border-indigo-500 hover:shadow-md transition-all duration-200">
                        <i class="fas fa-book text-3xl text-slate-400 group-hover:text-indigo-600 mb-3 transition-colors"></i>
                        <span class="text-sm font-semibold text-slate-700 group-hover:text-indigo-700">Mata Pelajaran</span>
                    </a>

                    <a href="{{ route('admin.jadwal-pelajaran.index') }}" class="group flex flex-col items-center justify-center p-6 bg-white rounded-xl shadow-sm border border-slate-200 hover:border-indigo-500 hover:shadow-md transition-all duration-200">
                        <i class="fas fa-calendar-alt text-3xl text-slate-400 group-hover:text-indigo-600 mb-3 transition-colors"></i>
                        <span class="text-sm font-semibold text-slate-700 group-hover:text-indigo-700">Jadwal Pelajaran</span>
                    </a>

                    <a href="{{ route('admin.nilai.index') }}" class="group flex flex-col items-center justify-center p-6 bg-white rounded-xl shadow-sm border border-slate-200 hover:border-indigo-500 hover:shadow-md transition-all duration-200">
                        <i class="fas fa-clipboard-list text-3xl text-slate-400 group-hover:text-indigo-600 mb-3 transition-colors"></i>
                        <span class="text-sm font-semibold text-slate-700 group-hover:text-indigo-700">Nilai Siswa</span>
                    </a>

                    <a href="{{ route('admin.absensi.index') }}" class="group flex flex-col items-center justify-center p-6 bg-white rounded-xl shadow-sm border border-slate-200 hover:border-indigo-500 hover:shadow-md transition-all duration-200">
                        <i class="fas fa-user-check text-3xl text-slate-400 group-hover:text-indigo-600 mb-3 transition-colors"></i>
                        <span class="text-sm font-semibold text-slate-700 group-hover:text-indigo-700">Absensi</span>
                    </a>

                    <a href="{{ route('admin.pengumuman.index') }}" class="group flex flex-col items-center justify-center p-6 bg-white rounded-xl shadow-sm border border-slate-200 hover:border-indigo-500 hover:shadow-md transition-all duration-200 bg-indigo-50">
                        <i class="fas fa-bullhorn text-3xl text-indigo-500 group-hover:text-indigo-700 mb-3 transition-colors"></i>
                        <span class="text-sm font-semibold text-indigo-700">Kelola Pengumuman</span>
                    </a>
                </div>
            </div>

            <div>
                <div class="flex items-center justify-between mb-4">
                    <div class="flex items-center gap-2">
                        <i class="fas fa-bell text-yellow-500"></i>
                        <h3 class="text-lg font-bold text-slate-800">Pengumuman Terbaru</h3>
                    </div>
                    <a href="{{ route('admin.pengumuman.index') }}" class="text-sm text-indigo-600 hover:underline">Lihat Semua</a>
                </div>

                <div class="bg-white rounded-xl shadow-sm border border-slate-200 p-5">
                    @forelse($pengumuman as $item)
                        <div class="mb-4 pb-4 border-b border-slate-100 last:mb-0 last:pb-0 last:border-0">
                            <h4 class="font-semibold text-slate-800 text-sm">{{ $item->judul ?? 'Judul Pengumuman' }}</h4>
                            <p class="text-xs text-slate-400 mb-1 flex items-center gap-1 mt-1">
                                <i class="far fa-clock"></i> 
                                {{ $item->created_at ? $item->created_at->diffForHumans() : 'Baru saja' }}
                            </p>
                            <p class="text-sm text-slate-600 line-clamp-2 mt-1">
                                {{ $item->konten ?? 'Isi detail pengumuman...' }}
                            </p>
                        </div>
                    @empty
                        <div class="text-center py-6">
                            <i class="far fa-folder-open text-4xl text-slate-300 mb-3"></i>
                            <p class="text-sm text-slate-500">Belum ada pengumuman aktif saat ini.</p>
                        </div>
                    @endforelse
                </div>
            </div>

        </div>
    </div>

</body>
</html>