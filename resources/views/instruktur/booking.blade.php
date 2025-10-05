@extends('layout.main')

@section('content')
<div class="flex items-center justify-between mb-4">
    <h1 class="text-xl sm:text-2xl font-semibold text-gray-900">
        Booking Kelas: {{ $jadwal->nama_kelas }} ({{ $jadwal->hari }} - {{ $jadwal->waktu }})
    </h1>
</div>

<div class="overflow-x-auto mt-3">
<table class="min-w-full divide-y divide-gray-200 shadow-sm rounded-lg overflow-hidden">
    <thead class="bg-gray-100">
        <tr>
            <th class="p-4 text-left text-xs font-medium text-gray-500 uppercase">No</th>
            <th class="p-4 text-left text-xs font-medium text-gray-500 uppercase">Nama Member</th>
            <th class="p-4 text-left text-xs font-medium text-gray-500 uppercase">Email</th>
            {{-- <th class="p-4 text-left text-xs font-medium text-gray-500 uppercase">Status Kehadiran</th>
            <th class="p-4 text-center text-xs font-medium text-gray-500 uppercase">Aksi</th> --}}
        </tr>
    </thead>
    <tbody class="bg-white divide-y divide-gray-200">
        @forelse($bookings as $booking)
        <tr class="hover:bg-gray-50">
            <td class="p-4 text-sm font-medium text-gray-900">{{ $loop->iteration }}</td>
            <td class="p-4 text-sm text-gray-700">{{ $booking->member->user->name ?? '-' }}</td>
            <td class="p-4 text-sm text-gray-700">{{ $booking->member->user->email ?? '-' }}</td>
            {{-- <td class="p-4 text-sm text-gray-700">{{ $booking->status_kehadiran ?? 'Belum Diisi' }}</td> --}}
            {{-- <td class="p-4 text-center">
                <form action="{{ route('instruktur.booking.update', $jadwal->id) }}" method="POST">
                    @csrf
                    <select name="kehadiran[{{ $booking->id }}]" class="border rounded p-1 text-sm">
                        <option value="Hadir" @selected($booking->status_kehadiran=='Hadir')>Hadir</option>
                        <option value="Tidak Hadir" @selected($booking->status_kehadiran=='Tidak Hadir')>Tidak Hadir</option>
                    </select>
                    <button type="submit" class="ml-2 text-white bg-cyan-600 hover:bg-cyan-700 px-3 py-1 rounded text-sm">
                        Simpan
                    </button>
                </form>
            </td> --}}
        </tr>
        @empty
        <tr>
            <td colspan="5" class="p-4 text-center text-gray-500">Belum ada member yang ikut jadwal ini.</td>
        </tr>
        @endforelse
    </tbody>
</table>
</div>
@endsection
