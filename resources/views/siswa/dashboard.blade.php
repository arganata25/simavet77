{{-- <!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Dashboard Siswa</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 flex">

    <!-- SIDEBAR -->
    <div class="w-64 min-h-screen bg-gradient-to-b from-purple-700 to-purple-500 text-white">

        <div class="p-6 text-center">
            <img src="https://i.pravatar.cc/100" class="w-20 h-20 rounded-full mx-auto mb-3">
            <h2 class="font-bold">Arganata Sanggara</h2>
            <span class="text-sm bg-purple-300 text-purple-800 px-2 py-1 rounded">SISWA TKJ</span>
        </div>

        <nav class="mt-6">
            <a href="#" class="block px-6 py-3 bg-purple-600">🏠 Beranda</a>
            <a href="#" class="block px-6 py-3 hover:bg-purple-600">📘 Akademis</a>
            <a href="#" class="block px-6 py-3 hover:bg-purple-600">🎓 Kejuruan</a>
            <a href="#" class="block px-6 py-3 hover:bg-purple-600">💬 Aspirasi</a>
            <a href="#" class="block px-6 py-3 hover:bg-purple-600">📩 Komunikasi</a>

            <form method="POST" action="{{ route('logout') }}" class="mt-6 px-6">
                @csrf
                <button class="text-red-300">⏻ Keluar</button>
            </form>
        </nav>

    </div>

    <!-- MAIN CONTENT -->
    <div class="flex-1">

        <!-- TOPBAR -->
        <div class="bg-gradient-to-r from-purple-700 to-indigo-500 text-white p-4 flex justify-between">
            <h1 class="font-bold">Beranda SIAKAD SMK Veteran 1</h1>
            <span class="text-sm">Tahun Akademik 2024/2025 Ganjil</span>
        </div>

        <!-- CONTENT -->
        <div class="p-6 grid grid-cols-3 gap-4">

            <!-- BIODATA -->
            <div class="col-span-2 bg-white rounded shadow p-4">
                <h2 class="text-purple-700 font-bold mb-4">Biodata Siswa</h2>

                <div class="grid grid-cols-2 gap-4 text-sm">
                    <div>
                        <p class="text-gray-500">NIP/NISN</p>
                        <p>0054321987</p>
                    </div>

                    <div>
                        <p class="text-gray-500">Program Keahlian</p>
                        <p>TEKNIK KOMPUTER & JARINGAN</p>
                    </div>

                    <div>
                        <p class="text-gray-500">Nama Lengkap</p>
                        <p>ARGANATA SANGGARA</p>
                    </div>

                    <div>
                        <p class="text-gray-500">Status</p>
                        <span class="bg-green-200 text-green-700 px-2 py-1 rounded">AKTIF</span>
                    </div>

                    <div>
                        <p class="text-gray-500">Email</p>
                        <p>arganata@email.com</p>
                    </div>
                </div>
            </div>

            <!-- DOKUMEN -->
            <div class="bg-white rounded shadow p-4">
                <h2 class="text-purple-700 font-bold mb-4">Dokumen Pendukung</h2>

                <div class="text-sm space-y-2">
                    <div class="flex justify-between">
                        <span>Kartu Keluarga</span>
                        <span class="text-green-500">✔</span>
                    </div>

                    <div class="flex justify-between">
                        <span>Ijazah</span>
                        <span class="text-green-500">✔</span>
                    </div>

                    <div class="flex justify-between">
                        <span>Foto 3x4</span>
                        <span class="text-green-500">✔</span>
                    </div>
                </div>
            </div>

            <!-- STATUS AKADEMIK -->
            <div class="col-span-2 bg-white rounded shadow p-4">
                <h2 class="text-purple-700 font-bold mb-4">Status Akademik</h2>

                <table class="w-full text-sm">
                    <thead class="bg-purple-500 text-white">
                        <tr>
                            <th class="p-2 text-left">Kewajiban</th>
                            <th class="p-2">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="border-b">
                            <td class="p-2">Registrasi Ulang</td>
                            <td class="text-center text-green-500">✔</td>
                        </tr>
                        <tr class="border-b">
                            <td class="p-2">Pelunasan SPP</td>
                            <td class="text-center text-green-500">✔</td>
                        </tr>
                        <tr>
                            <td class="p-2">Kuisioner Guru</td>
                            <td class="text-center text-red-500">✖</td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <!-- CETAK -->
            <div class="bg-white rounded shadow p-4">
                <h2 class="text-purple-700 font-bold mb-4">Cetak Berkas</h2>

                <div class="space-y-2 text-sm">
                    <div class="flex justify-between items-center">
                        <span>Kartu Anggota</span>
                        <button class="bg-red-500 text-white px-3 py-1 rounded">Cetak</button>
                    </div>

                    <div class="flex justify-between items-center">
                        <span>Raport</span>
                        <button class="bg-red-500 text-white px-3 py-1 rounded">Cetak</button>
                    </div>

                    <div class="flex justify-between items-center">
                        <span>Surat Aktif</span>
                        <button class="bg-red-500 text-white px-3 py-1 rounded">Cetak</button>
                    </div>
                </div>
            </div>

        </div>

    </div>

</body>
</html> --}}
@extends('siswa.layout')

@section('content')

<div class="space-y-6">

    <!-- TOP GRID -->
    <div class="grid grid-cols-3 gap-6">

        <!-- BIODATA -->
        <div class="col-span-2 bg-white rounded-xl shadow border">

            <div class="flex justify-between items-center p-4 border-b">
                <h2 class="text-purple-600 font-semibold">Biodata Siswa</h2>
                <div class="w-8 h-8 bg-purple-600 text-white rounded-full flex items-center justify-center">✓</div>
            </div>

            <div class="p-6 flex gap-6">

                <!-- FOTO -->
                <div class="w-24 h-24 bg-orange-500 rounded-xl flex items-center justify-center text-white text-3xl">
                    👤
                </div>

                <!-- DATA -->
                <div class="grid grid-cols-2 gap-6 text-sm w-full">

                    <div>
                        <p class="text-gray-400">Nama Lengkap</p>
                        {{-- <p class="font-semibold">{{ auth()->user()->name }}</p> --}}
                        <P>ARGANATA SANGGARA</P>

                        <p class="text-gray-400 mt-3">Tahun Masuk</p>
                        <p>2023/2024 Ganjil</p>

                        <p class="text-gray-400 mt-3">Jenis Kelamin</p>
                        <p>Laki-Laki</p>
                    </div>

                    <div>
                        <p class="text-gray-400">Nomor Asal</p>
                        <p>DA_KRISNANANTA/X-K III/6</p>

                        <p class="text-gray-400 mt-3">NIK</p>
                        <p>3504205100030003</p>
                    </div>

                    <div>
                        <p class="text-gray-400">Kompetensi Keahlian</p>
                        <p>(TKJ-K) Teknik Komputer</p>

                        <p class="text-gray-400 mt-3">Tempat, Tanggal Lahir</p>
                        <p>Tulungagung, 10 Okt 2007</p>

                        <p class="text-gray-400 mt-3">NIK</p>
                        <p>0053805100030003</p>
                    </div>

                    <div>
                        <p class="text-gray-400">Nama</p>
                        <p>{{ auth()->user()->name }}</p>

                        <p class="text-gray-400 mt-3">NISN</p>
                        <p>0038125018485</p>
                    </div>

                </div>
            </div>
        </div>

        <!-- DOKUMEN -->
        <div class="bg-white rounded-xl shadow border">

            <div class="flex justify-between items-center p-4 border-b">
                <h2 class="text-purple-600 font-semibold">Dokumen Pendukung</h2>
                <div class="w-8 h-8 bg-purple-600 text-white rounded-full flex items-center justify-center">📄</div>
            </div>

            <div class="p-4 space-y-3 text-sm">

                <!-- ITEM -->
                <div class="flex justify-between items-center bg-gray-50 p-3 rounded">
                    <div>
                        <p>KTP</p>
                        <small class="text-gray-400">Kartu Keluarga</small>
                    </div>
                    <div class="flex justify-between items-center bg-gray-50 p-3 rounded">
                    </div>
                          <p>KTP</p>
                          <small class="text-gray-400">Kartu Keluarga</small>
                    </div>
                    <span class="{{ $dokumen['ktp'] ? 'text-green-500' : 'text-red-500' }}">
                        {{ $dokumen['ktp'] ? '✔' : '✖' }}
                    </span>

                <div class="flex justify-between items-center bg-gray-50 p-3 rounded">
                    <div>
                        <p>Kartu Keluarga</p>
                        <small class="text-gray-400">Ijazah Terakhir</small>
                    </div>
                    <span class="text-red-500 text-xl">✖</span>
                </div>

                <div class="flex justify-between items-center bg-gray-50 p-3 rounded">
                    <div>
                        <p>Kartu NISN</p>
                    </div>
                   <span class="{{ $dokumen['nisn'] ? 'text-green-500' : 'text-red-500' }}">
                    {{ $dokumen['nisn'] ? '✔' : '✖' }}
                    </span>
                </div>

                <p class="text-xs text-gray-400 mt-2">
                    *Gunakan menu ini dengan bijak...
                </p>

            </div>
        </div>

    </div>

    <!-- STATUS AKADEMIK -->
    <div class="bg-white rounded-xl shadow border">

        <div class="p-4 border-b">
            <h2 class="text-purple-600 font-semibold">Status Akademik</h2>
            <p class="text-sm text-gray-400">Per tgl: 2/18/2025 Ganjil</p>
        </div>

        <div class="grid grid-cols-3 gap-4 p-6 text-center text-sm">

            <div class="bg-purple-50 p-4 rounded">
                <p class="text-gray-400">Keterangan</p>
                <div class="bg-green-100 p-4 rounded col-span-3">
                <p class="text-green-700 font-semibold text-lg">
                Status Siswa: AKTIF
                </p>
            </div>
            </div>

            <div class="bg-gray-50 p-4 rounded">
                <p class="text-gray-400">STATUS</p>
                <p>Menggunakan KRS/Jadwal ✔</p>
            </div>

            <div class="bg-gray-50 p-4 rounded">
                <p class="text-gray-400">STATUS</p>
                <p class="text-red-500">Melakukan Kontrak Studi ✖</p>
            </div>

        </div>
    </div>

    <!-- CETAK -->
    <div class="bg-white rounded-xl shadow border">

        <div class="p-4 border-b">
           <h2 class="text-purple-600 font-semibold">Persuratan</h2>

<div class="p-6 space-y-3">

    <div class="flex justify-between items-center">
        <span>Surat Izin Sakit</span>
        <button class="bg-blue-600 text-white px-3 py-1 rounded">
            Cetak
        </button>
    </div>

    <div class="flex justify-between items-center">
        <span>Surat Keterangan Aktif</span>
        <button class="bg-blue-600 text-white px-3 py-1 rounded">
            Cetak
        </button>
    </div>

    <div class="flex justify-between items-center">
        <span>Surat Dispensasi</span>
        <button class="bg-blue-600 text-white px-3 py-1 rounded">
            Cetak
        </button>
        </div>
    </div>

    <!-- PENGUMUMAN -->
   <div class="bg-white rounded-xl shadow border">

    <div class="p-4 border-b">
        <h2 class="text-purple-600 font-semibold">PENGUMUMAN</h2>
    </div>

    <div class="p-6 space-y-4 text-sm">

        @forelse($pengumuman as $p)
            <div class="border-l-4 border-purple-600 pl-3">
                <p class="font-semibold">{{ $p->judul }}</p>

                <small class="text-gray-400">
                    {{ \Carbon\Carbon::parse($p->tanggal)->format('d M Y') }}
                </small>

                @if($p->isi)
                    <p class="text-gray-500 text-xs mt-1">
                        {{ $p->isi }}
                    </p>
                @endif
            </div>
        @empty
            <p class="text-gray-400">Belum ada pengumuman</p>
        @endforelse

    </div>
</div>

</div>

@endsection