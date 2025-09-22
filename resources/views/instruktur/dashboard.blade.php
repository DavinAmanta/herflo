@extends('layout.main')

@section('content')
<h1 class="text-2xl font-bold mb-6">Dashboard Instruktur</h1>

{{-- Statistik --}}
<div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
    <div class="bg-white p-4 rounded-lg shadow">
        <h2 class="text-lg font-semibold text-gray-700">Total Jadwal Kelas</h2>
        <p class="text-3xl font-bold text-gray-900">{{ $totalJadwal }}</p>
    </div>
    <div class="bg-white p-4 rounded-lg shadow">
        <h2 class="text-lg font-semibold text-gray-700">Total Booking Member</h2>
        <p class="text-3xl font-bold text-gray-900">{{ $totalBooking }}</p>
    </div>
</div>

{{-- Tabel Jadwal --}}
<div class="bg-white p-4 rounded-lg shadow">
    <h2 class="text-lg font-semibold text-gray-700 mb-4">Jadwal Kelas Saya</h2>
    <div class="overflow-x-auto">
        <table class="min-w-full divide-y divide-gray-200 shadow-sm rounded-lg overflow-hidden">
            <thead class="bg-gray-100">
                <tr>
                    <th class="p-4 text-left text-xs font-medium text-gray-500 uppercase">No</th>
                    <th class="p-4 text-left text-xs font-medium text-gray-500 uppercase">Nama Kelas</th>
                    <th class="p-4 text-left text-xs font-medium text-gray-500 uppercase">Hari</th>
                    <th class="p-4 text-left text-xs font-medium text-gray-500 uppercase">Waktu</th>
                    <th class="p-4 text-center text-xs font-medium text-gray-500 uppercase">Booking</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @forelse($jadwals as $jadwal)
                <tr class="hover:bg-gray-50">
                    <td class="p-4 text-sm font-medium text-gray-900">{{ $loop->iteration }}</td>
                    <td class="p-4 text-sm text-gray-700">{{ $jadwal->nama_kelas }}</td>
                    <td class="p-4 text-sm text-gray-700">{{ $jadwal->hari }}</td>
                    <td class="p-4 text-sm text-gray-700">{{ $jadwal->waktu }}</td>
                    <td class="p-4 text-center">
                        <a href="{{ route('instruktur.jadwal.booking', $jadwal->id) }}"
                           class="text-white bg-cyan-600 hover:bg-cyan-700 font-medium rounded-lg text-sm inline-flex items-center px-3 py-2">
                           {{ $jadwal->bookings->count() }} Member
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
</div>
@endsection
