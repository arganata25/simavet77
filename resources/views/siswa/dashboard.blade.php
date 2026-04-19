@extends('siswa.layout')

@section('content')

<div class="space-y-6">

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">

        <div class="lg:col-span-2 bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
            <div class="flex justify-between items-center px-6 py-4 border-b border-gray-100 bg-gray-50">
                <h2 class="text-purple-700 font-bold text-lg">Biodata Siswa</h2>
                <span class="bg-green-100 text-green-700 text-xs px-3 py-1 rounded-full font-semibold flex items-center">
                    <svg class="w-3 h-3 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                    Telah Diverifikasi
                </span>
            </div>

            <div class="p-6 flex flex-col sm:flex-row gap-6 items-start">
                <div class="w-32 h-32 flex-shrink-0 bg-gray-100 rounded-xl flex items-center justify-center border-4 border-white shadow-md">
                    <svg class="w-16 h-16 text-gray-400" fill="currentColor" viewBox="0 0 24 24"><path d="M24 20.993V24H0v-2.996A14.977 14.977 0 0112.004 15c4.904 0 9.26 2.354 11.996 5.993zM16.002 8.999a4 4 0 11-8 0 4 4 0 018 0z" /></svg>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-x-8 gap-y-4 text-sm w-full">
                    <div>
                        <p class="text-gray-500 text-xs uppercase tracking-wider mb-1">Nama Lengkap</p>
                        <p class="font-semibold text-gray-900">ARGANATA SANGGARA</p>
                    </div>
                    <div>
                        <p class="text-gray-500 text-xs uppercase tracking-wider mb-1">Nomor Asal</p>
                        <p class="font-semibold text-gray-900">DA_KRISNANANTA/X-K III/6</p>
                    </div>
                    <div>
                        <p class="text-gray-500 text-xs uppercase tracking-wider mb-1">Tahun Masuk</p>
                        <p class="font-semibold text-gray-900">2023/2024 Ganjil</p>
                    </div>
                    <div>
                        <p class="text-gray-500 text-xs uppercase tracking-wider mb-1">Kompetensi Keahlian</p>
                        <p class="font-semibold text-gray-900">(TKJ-K) Teknik Komputer</p>
                    </div>
                    <div>
                        <p class="text-gray-500 text-xs uppercase tracking-wider mb-1">Jenis Kelamin</p>
                        <p class="font-semibold text-gray-900">Laki-Laki</p>
                    </div>
                    <div>
                        <p class="text-gray-500 text-xs uppercase tracking-wider mb-1">Tempat, Tanggal Lahir</p>
                        <p class="font-semibold text-gray-900">Tulungagung, 10 Okt 2007</p>
                    </div>
                    <div>
                        <p class="text-gray-500 text-xs uppercase tracking-wider mb-1">NISN</p>
                        <p class="font-semibold text-gray-900">0038125018485</p>
                    </div>
                    <div>
                        <p class="text-gray-500 text-xs uppercase tracking-wider mb-1">NIK</p>
                        <p class="font-semibold text-gray-900">3504205100030003</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
            <div class="px-6 py-4 border-b border-gray-100 bg-gray-50 flex justify-between items-center">
                <h2 class="text-purple-700 font-bold text-lg">Dokumen</h2>
                <svg class="w-5 h-5 text-purple-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
            </div>

            <div class="p-6 space-y-3">
                
                <div class="flex justify-between items-center bg-gray-50 p-3 rounded-lg border border-gray-100">
                    <div>
                        <p class="font-medium text-sm text-gray-800">KTP</p>
                        <p class="text-xs text-gray-500">Kartu Tanda Penduduk</p>
                    </div>
                    <div>
                        @if(isset($dokumen['ktp']) && $dokumen['ktp'])
                            <span class="text-green-500"><svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg></span>
                        @else
                            <span class="text-red-500"><svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg></span>
                        @endif
                    </div>
                </div>

                <div class="flex justify-between items-center bg-gray-50 p-3 rounded-lg border border-gray-100">
                    <div>
                        <p class="font-medium text-sm text-gray-800">Kartu Keluarga</p>
                        <p class="text-xs text-gray-500">Scan asli / Fotokopi</p>
                    </div>
                    <div>
                        <span class="text-red-500"><svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg></span>
                    </div>
                </div>

                <div class="flex justify-between items-center bg-gray-50 p-3 rounded-lg border border-gray-100">
                    <div>
                        <p class="font-medium text-sm text-gray-800">Kartu NISN</p>
                        <p class="text-xs text-gray-500">Nomor Induk Siswa</p>
                    </div>
                    <div>
                        @if(isset($dokumen['nisn']) && $dokumen['nisn'])
                            <span class="text-green-500"><svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg></span>
                        @else
                            <span class="text-red-500"><svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg></span>
                        @endif
                    </div>
                </div>

                <p class="text-xs text-red-400 mt-2 italic">*Harap lengkapi dokumen yang bertanda silang merah.</p>
            </div>
        </div>

    </div>

    <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
        <div class="px-6 py-4 border-b border-gray-100 flex justify-between items-center">
            <h2 class="text-purple-700 font-bold text-lg">Status Akademik</h2>
            <p class="text-sm text-gray-500">Semester: <span class="font-semibold text-gray-800">2023/2024 Ganjil</span></p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-0 divide-y md:divide-y-0 md:divide-x divide-gray-100">
            <div class="p-6 text-center">
                <p class="text-sm text-gray-500 mb-2 uppercase tracking-wide">Status Siswa</p>
                <div class="inline-block px-6 py-2 bg-green-100 text-green-700 font-bold rounded-lg text-xl">
                    AKTIF
                </div>
            </div>
            <div class="p-6 text-center">
                <p class="text-sm text-gray-500 mb-2 uppercase tracking-wide">KRS / Jadwal</p>
                <div class="flex items-center justify-center text-gray-800 font-semibold">
                    Tersedia <svg class="w-5 h-5 ml-2 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                </div>
            </div>
            <div class="p-6 text-center">
                <p class="text-sm text-gray-500 mb-2 uppercase tracking-wide">Kontrak Studi</p>
                <div class="flex items-center justify-center text-red-600 font-semibold">
                    Belum Selesai <svg class="w-5 h-5 ml-2 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                </div>
            </div>
        </div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
        
        <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
            <div class="px-6 py-4 border-b border-gray-100 bg-gray-50">
                <h2 class="text-purple-700 font-bold text-lg">Persuratan</h2>
            </div>
            <div class="p-6 space-y-4">
                <div class="flex justify-between items-center pb-4 border-b border-gray-100 last:border-0 last:pb-0">
                    <div>
                        <p class="font-semibold text-gray-800">Surat Izin Sakit</p>
                        <p class="text-xs text-gray-500">Cetak form pengajuan izin</p>
                    </div>
                    <button class="bg-blue-50 text-blue-600 hover:bg-blue-600 hover:text-white transition-colors px-4 py-2 rounded-lg text-sm font-medium">Cetak</button>
                </div>
                <div class="flex justify-between items-center pb-4 border-b border-gray-100 last:border-0 last:pb-0">
                    <div>
                        <p class="font-semibold text-gray-800">Surat Keterangan Aktif</p>
                        <p class="text-xs text-gray-500">Bukti siswa aktif sekolah</p>
                    </div>
                    <button class="bg-blue-50 text-blue-600 hover:bg-blue-600 hover:text-white transition-colors px-4 py-2 rounded-lg text-sm font-medium">Cetak</button>
                </div>
                <div class="flex justify-between items-center pb-4 border-b border-gray-100 last:border-0 last:pb-0">
                    <div>
                        <p class="font-semibold text-gray-800">Surat Dispensasi</p>
                        <p class="text-xs text-gray-500">Dispensasi kegiatan di luar sekolah</p>
                    </div>
                    <button class="bg-blue-50 text-blue-600 hover:bg-blue-600 hover:text-white transition-colors px-4 py-2 rounded-lg text-sm font-medium">Cetak</button>
                </div>
            </div>
        </div>

        <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
            <div class="px-6 py-4 border-b border-gray-100 bg-gray-50">
                <h2 class="text-purple-700 font-bold text-lg">Pengumuman Terbaru</h2>
            </div>
            <div class="p-6 space-y-4">
                @if(isset($pengumuman) && count($pengumuman) > 0)
                    @foreach($pengumuman as $p)
                        <div class="border-l-4 border-purple-500 pl-4 py-1">
                            <p class="font-semibold text-gray-800">{{ $p->judul }}</p>
                            <p class="text-xs text-purple-600 font-medium mb-1">
                                {{ \Carbon\Carbon::parse($p->tanggal)->format('d M Y') }}
                            </p>
                            @if($p->isi)
                                <p class="text-sm text-gray-600 line-clamp-2">{{ $p->isi }}</p>
                            @endif
                        </div>
                    @endforeach
                @else
                    <div class="text-center py-6 text-gray-400">
                        <svg class="w-12 h-12 mx-auto mb-2 text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4"></path></svg>
                        <p>Belum ada pengumuman saat ini.</p>
                    </div>
                @endif
            </div>
        </div>

    </div>

</div>

@endsection