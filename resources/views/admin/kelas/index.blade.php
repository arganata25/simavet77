@extends('layouts.admin')
@section('title', 'Data Kelas - SIAKAD')

@section('content')
<div class="mb-6 flex justify-between items-center">
    <div>
        <h2 class="text-2xl font-bold text-slate-800">Manajemen Kelas</h2>
        <p class="text-slate-500 text-sm">Kelola data kelas dan wali kelas.</p>
    </div>
    <a href="{{ route('admin.kelas.create') }}" class="bg-indigo-600 hover:bg-indigo-700 text-white px-4 py-2 rounded-lg font-medium transition-colors flex items-center gap-2">
        <i class="fas fa-plus"></i> Tambah Kelas
    </a>
</div>

@if(session('success'))
<div class="bg-green-50 border-l-4 border-green-500 text-green-700 p-4 mb-6 rounded shadow-sm">
    <p class="font-medium"><i class="fas fa-check-circle mr-2"></i>{{ session('success') }}</p>
</div>
@endif

<div class="bg-white rounded-xl shadow-sm border border-slate-200 overflow-hidden">
    <table class="w-full text-left border-collapse">
        <thead>
            <tr class="bg-slate-50 border-b border-slate-200 text-slate-600 text-sm uppercase tracking-wider">
                <th class="p-4 font-semibold">No</th>
                <th class="p-4 font-semibold">Nama Kelas</th>
                <th class="p-4 font-semibold">Tingkat</th>
                <th class="p-4 font-semibold">Wali Kelas</th>
                <th class="p-4 font-semibold text-center">Aksi</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-slate-200 text-slate-700">
            @forelse($kelas as $index => $item)
            <tr class="hover:bg-slate-50 transition-colors">
                <td class="p-4">{{ $kelas->firstItem() + $index }}</td>
                <td class="p-4 font-medium">{{ $item->nama }}</td>
                <td class="p-4">
                    <span class="bg-indigo-100 text-indigo-700 px-2 py-1 rounded text-xs font-semibold">{{ $item->tingkat }}</span>
                </td>
                <td class="p-4">{{ $item->waliKelas->nama_lengkap ?? '-' }}</td>
                <td class="p-4 flex justify-center gap-2">
                    <a href="{{ route('admin.kelas.edit', $item->id) }}" class="p-2 text-blue-600 hover:bg-blue-50 rounded" title="Edit">
                        <i class="fas fa-edit"></i>
                    </a>
                    <form action="{{ route('admin.kelas.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus kelas ini?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="p-2 text-red-600 hover:bg-red-50 rounded" title="Hapus">
                            <i class="fas fa-trash"></i>
                        </button>
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="5" class="p-8 text-center text-slate-500">
                    <i class="fas fa-inbox text-4xl mb-3 text-slate-300"></i>
                    <p>Belum ada data kelas.</p>
                </td>
            </tr>
            @endforelse
        </tbody>
    </table>
    
    <div class="p-4 border-t border-slate-200">
        {{ $kelas->links() }}
    </div>
</div>
@endsection