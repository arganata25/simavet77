@extends('layouts.admin')
@section('title', 'Data Nilai Siswa - SIAKAD')

@section('content')
<div class="mb-6 flex justify-between items-center">
    <h2 class="text-2xl font-bold text-slate-800">Manajemen Nilai</h2>
    <a href="{{ route('admin.nilai.create') }}" class="bg-indigo-600 hover:bg-indigo-700 text-white px-4 py-2 rounded-lg font-medium transition-colors">
        <i class="fas fa-plus mr-2"></i> Input Nilai Baru
    </a>
</div>

@if(session('success'))
<div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-6 rounded">
    {{ session('success') }}
</div>
@endif

<div class="bg-white rounded-xl shadow-sm border border-slate-200 overflow-hidden">
    <table class="w-full text-left">
        <thead class="bg-slate-50 border-b border-slate-200 text-slate-600 text-sm uppercase">
            <tr>
                <th class="p-4">Siswa</th>
                <th class="p-4">Mata Pelajaran</th>
                <th class="p-4 text-center">Harian</th>
                <th class="p-4 text-center">UTS</th>
                <th class="p-4 text-center">UAS</th>
                <th class="p-4 text-center font-bold">Akhir</th>
                <th class="p-4 text-center">Predikat</th>
                <th class="p-4 text-center">Aksi</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-slate-200">
            @forelse($nilai as $item)
            <tr>
                <td class="p-4">
                    <div class="font-medium text-slate-800">{{ $item->siswa->nama ?? 'N/A' }}</div>
                    <div class="text-xs text-slate-500">{{ $item->tahunAjaran->nama ?? '-' }}</div>
                </td>
                <td class="p-4 text-slate-700">{{ $item->mataPelajaran->nama ?? 'N/A' }}</td>
                <td class="p-4 text-center">{{ $item->nilai_harian ?? 0 }}</td>
                <td class="p-4 text-center">{{ $item->nilai_uts ?? 0 }}</td>
                <td class="p-4 text-center">{{ $item->nilai_uas ?? 0 }}</td>
                <td class="p-4 text-center font-bold text-indigo-600">{{ $item->nilai_akhir }}</td>
                <td class="p-4 text-center">
                    <span class="px-2 py-1 rounded text-xs font-bold 
                        {{ $item->predikat == 'A' ? 'bg-green-100 text-green-700' : ($item->predikat == 'E' ? 'bg-red-100 text-red-700' : 'bg-blue-100 text-blue-700') }}">
                        {{ $item->predikat }}
                    </span>
                </td>
                <td class="p-4 text-center flex justify-center gap-2">
                    <a href="{{ route('admin.nilai.edit', $item->id) }}" class="text-blue-600 hover:bg-blue-50 p-2 rounded">
                        <i class="fas fa-edit"></i>
                    </a>
                    <form action="{{ route('admin.nilai.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Hapus nilai ini?')">
                        @csrf @method('DELETE')
                        <button type="submit" class="text-red-600 hover:bg-red-50 p-2 rounded">
                            <i class="fas fa-trash"></i>
                        </button>
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="8" class="p-8 text-center text-slate-500 italic">Belum ada data nilai.</td>
            </tr>
            @endforelse
        </tbody>
    </table>
    <div class="p-4 border-t border-slate-100">
        {{ $nilai->links() }}
    </div>
</div>
@endsection