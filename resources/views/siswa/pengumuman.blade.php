@extends('siswa.layout')

@section('content')
<div class="max-w-6xl mx-auto">
    
    <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center mb-6 gap-4">
        <div>
            <h1 class="text-2xl font-semibold text-gray-800">Pengumuman</h1>
            <p class="text-sm text-gray-500 mt-1">Informasi dan pengumuman terbaru</p>
        </div>
        <div>
            <select class="border border-gray-300 rounded-lg px-4 py-2 text-sm text-gray-700 focus:ring-purple-500 focus:border-purple-500 outline-none bg-white">
                <option value="semua">Semua Kategori</option>
                <option value="akademik">Akademik</option>
                <option value="administrasi">Administrasi</option>
                <option value="umum">Umum</option>
            </select>
        </div>
    </div>

    <div class="space-y-4">
        
        <div class="bg-white rounded-lg shadow-sm border border-gray-200 border-t-4 border-t-red-500 overflow-hidden">
            <div class="p-5">
                <div class="flex items-center gap-3 mb-2">
                    <h2 class="text-lg font-semibold text-purple-700">Evaluasi Guru 2024 Ganjil</h2>
                    <span class="bg-red-100 text-red-600 text-xs font-medium px-2.5 py-0.5 rounded-full">Penting</span>
                </div>
                <p class="text-gray-600 text-sm mb-4">
                    Kegiatan evaluasi guru semester ganjil tahun 2024 akan dilaksanakan mulai tanggal 12 Desember 2024 sampai dengan 31 Januari 2025. Harap semua siswa berpartisipasi.
                </p>
                <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center pt-4 border-t border-gray-100 text-xs text-gray-500 gap-4">
                    <div class="flex items-center gap-6">
                        <div class="flex items-center gap-2">
                            <svg class="w-4 h-4 text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                            <span>12 Des 2024 sd 31 Jan 2025</span>
                        </div>
                        <div class="flex items-center gap-2">
                            <svg class="w-4 h-4 text-yellow-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"></path></svg>
                            <span>Akademik</span>
                        </div>
                    </div>
                    <a href="#" class="text-purple-600 font-medium hover:text-purple-800 flex items-center transition-colors">
                        Baca Selengkapnya <span class="ml-1">&rarr;</span>
                    </a>
                </div>
            </div>
        </div>

        <div class="bg-white rounded-lg shadow-sm border border-gray-200 border-t-4 border-t-yellow-400 overflow-hidden">
            <div class="p-5">
                <div class="flex items-center gap-3 mb-2">
                    <h2 class="text-lg font-semibold text-purple-700">Pengajuan Kartu Ijazah Aktif</h2>
                    <span class="bg-yellow-100 text-yellow-700 text-xs font-medium px-2.5 py-0.5 rounded-full">Sedang</span>
                </div>
                <p class="text-gray-600 text-sm mb-4">
                    Pengajuan kartu ijazah aktif dapat dilakukan mulai 16 Desember 2024 sampai 17 Januari 2025. Silakan hubungi bagian administrasi untuk informasi lebih lanjut.
                </p>
                <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center pt-4 border-t border-gray-100 text-xs text-gray-500 gap-4">
                    <div class="flex items-center gap-6">
                        <div class="flex items-center gap-2">
                            <svg class="w-4 h-4 text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                            <span>16 Des 2024 sd 17 Jan 2025</span>
                        </div>
                        <div class="flex items-center gap-2">
                            <svg class="w-4 h-4 text-yellow-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"></path></svg>
                            <span>Administrasi</span>
                        </div>
                    </div>
                    <a href="#" class="text-purple-600 font-medium hover:text-purple-800 flex items-center transition-colors">
                        Baca Selengkapnya <span class="ml-1">&rarr;</span>
                    </a>
                </div>
            </div>
        </div>

        <div class="bg-white rounded-lg shadow-sm border border-gray-200 border-t-4 border-t-blue-500 overflow-hidden">
            <div class="p-5">
                <div class="flex items-center gap-3 mb-2">
                    <h2 class="text-lg font-semibold text-purple-700">Libur Semester Ganjil 2024</h2>
                    <span class="bg-blue-100 text-blue-700 text-xs font-medium px-2.5 py-0.5 rounded-full">Biasa</span>
                </div>
                <p class="text-gray-600 text-sm mb-4">
                    Libur semester ganjil akan dimulai pada tanggal 20 Desember 2024 dan masuk kembali pada 6 Januari 2025.
                </p>
                <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center pt-4 border-t border-gray-100 text-xs text-gray-500 gap-4">
                    <div class="flex items-center gap-6">
                        <div class="flex items-center gap-2">
                            <svg class="w-4 h-4 text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                            <span>20 Des 2024</span>
                        </div>
                        <div class="flex items-center gap-2">
                            <svg class="w-4 h-4 text-yellow-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"></path></svg>
                            <span>Umum</span>
                        </div>
                    </div>
                    <a href="#" class="text-purple-600 font-medium hover:text-purple-800 flex items-center transition-colors">
                        Baca Selengkapnya <span class="ml-1">&rarr;</span>
                    </a>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection