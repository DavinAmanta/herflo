@extends('layout.main')

@section('content')
<div class="flex items-center justify-between mb-4">
    <h1 class="text-xl sm:text-2xl font-semibold text-gray-900">Jadwal Kelas Saya</h1>
</div>

{{-- Flash Messages --}}
@if(session('success'))
<div class="mb-4 p-3 rounded bg-green-100 text-green-800">{{ session('success') }}</div>
@endif
@if(session('error'))
<div class="mb-4 p-3 rounded bg-red-100 text-red-800">{{ session('error') }}</div>
@endif

{{-- Tabel Jadwal --}}
<div class="overflow-x-auto">
<table class="min-w-full divide-y divide-gray-200 shadow-sm rounded-lg overflow-hidden mt-3">
    <thead class="bg-gray-100">
        <tr>
            <th class="p-4 text-left text-xs font-medium text-gray-500 uppercase">No</th>
            <th class="p-4 text-left text-xs font-medium text-gray-500 uppercase">Nama Kelas</th>
            <th class="p-4 text-left text-xs font-medium text-gray-500 uppercase">Hari</th>
            <th class="p-4 text-left text-xs font-medium text-gray-500 uppercase">Waktu</th>
            <th class="p-4 text-center text-xs font-medium text-gray-500 uppercase">Aksi</th>
        </tr>
    </thead>
    <tbody class="bg-white divide-y divide-gray-200">
        @forelse ($jadwals as $jadwal)
        <tr class="hover:bg-gray-50">
            <td class="p-4 text-sm font-medium text-gray-900">{{ $loop->iteration }}</td>
            <td class="p-4 text-sm text-gray-700">{{ $jadwal->nama_kelas }}</td>
            <td class="p-4 text-sm text-gray-700">{{ $jadwal->hari }}</td>
            <td class="p-4 text-sm text-gray-700">{{ $jadwal->waktu }}</td>
            <td class="p-4 text-center space-x-2">
                <a href="{{ route('instruktur.jadwal.booking', $jadwal->id) }}"
                   class="text-white bg-cyan-600 hover:bg-cyan-700 font-medium rounded-lg text-sm inline-flex items-center px-3 py-2">
                   Lihat Member
                </a>
            </td>
        </tr>
        @empty
        <tr>
            <td colspan="5" class="p-4 text-center text-gray-500">Belum ada jadwal tersedia.</td>
        </tr>
        @endforelse
    </tbody>
</table>
</div>
@endsection
