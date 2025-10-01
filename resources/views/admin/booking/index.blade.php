@extends('layout.main')

@section('content')
<div class="d-flex items-center justify-between mb-4">
    <h1 class="text-xl sm:text-2xl font-semibold text-gray-900">Kelola Booking</h1>
</div>

{{-- Tabel Booking --}}
<table class="table-fixed min-w-full divide-y divide-gray-200 shadow-sm rounded-lg overflow-hidden mt-3">
    <thead class="bg-gray-100">
        <tr>
            <th class="p-4 text-left text-xs font-medium text-gray-500 uppercase">No</th>
            <th class="p-4 text-left text-xs font-medium text-gray-500 uppercase">Member</th>
            <th class="p-4 text-left text-xs font-medium text-gray-500 uppercase">Kelas</th>
            <th class="p-4 text-left text-xs font-medium text-gray-500 uppercase">Tanggal</th>
            <th class="p-4 text-left text-xs font-medium text-gray-500 uppercase">Status</th>
            <th class="p-4 text-center text-xs font-medium text-gray-500 uppercase">Aksi</th>
        </tr>
    </thead>
    <tbody class="bg-white divide-y divide-gray-200">
        @forelse ($bookings as $b)
        <tr class="hover:bg-gray-100">
            <td class="p-4 text-sm font-medium text-gray-900">{{ $loop->iteration }}</td>
            <td class="p-4 text-sm font-medium text-gray-900">{{ $b->member->user->name ?? '-' }}</td>
            <td class="p-4 text-sm text-gray-700">{{ $b->jadwalKelas->nama_kelas }}</td>
            <td class="p-4 text-sm text-gray-700">{{ $b->tanggal }}</td>
            <td class="p-4 text-sm text-gray-700">
                @if($b->status == 'pending')
                    <span class="px-2 py-1 bg-yellow-100 text-yellow-800 rounded text-xs">Pending</span>
                @elseif($b->status == 'approved')
                    <span class="px-2 py-1 bg-green-100 text-green-800 rounded text-xs">Approved</span>
                @else
                    <span class="px-2 py-1 bg-red-100 text-red-800 rounded text-xs">Rejected</span>
                @endif
            </td>
            <td class="p-4 space-x-2 text-center">
                {{-- Tombol Detail --}}
                <button type="button" data-modal-toggle="detail-booking-modal-{{ $b->id }}"
                    class="text-white bg-cyan-600 hover:bg-cyan-700 rounded-lg text-sm px-3 py-2">
                    Detail
                </button>

                {{-- Tombol Edit --}}
                <button type="button" data-modal-toggle="edit-booking-modal-{{ $b->id }}"
                    class="text-white bg-blue-600 hover:bg-blue-700 rounded-lg text-sm px-3 py-2">
                    Edit
                </button>

                {{-- Tombol Approve / Reject hanya jika pending --}}
                @if($b->status == 'pending')
                    <form action="{{ route('admin.bookings.approve', $b->id) }}" method="POST" class="inline">
                        @csrf @method('PUT')
                        <button type="submit"
                            class="text-white bg-green-600 hover:bg-green-700 rounded-lg text-sm px-3 py-2">
                            Setujui
                        </button>
                    </form>

                    <form action="{{ route('admin.bookings.reject', $b->id) }}" method="POST" class="inline">
                        @csrf @method('PUT')
                        <button type="submit"
                            class="text-white bg-red-600 hover:bg-red-700 rounded-lg text-sm px-3 py-2">
                            Tolak
                        </button>
                    </form>
                @endif

                {{-- Tombol Hapus --}}
                <form action="{{ route('admin.bookings.destroy', $b->id) }}" method="POST" class="inline">
                    @csrf @method('DELETE')
                    <button type="submit" onclick="return confirm('Yakin ingin menghapus data ini?')"
                        class="text-white bg-gray-600 hover:bg-gray-700 rounded-lg text-sm px-3 py-2">
                        Hapus
                    </button>
                </form>
            </td>
        </tr>

        {{-- Modal Detail --}}
        <div id="detail-booking-modal-{{ $b->id }}" class="hidden fixed inset-0 z-50 flex items-center justify-center bg-black/50">
            <div class="bg-white rounded-lg shadow w-full max-w-lg relative">
                <div class="flex items-start justify-between p-5 border-b">
                    <h3 class="text-xl font-semibold">Detail Booking</h3>
                    <button type="button" data-modal-toggle="detail-booking-modal-{{ $b->id }}"
                        class="text-gray-400 hover:bg-gray-200 rounded-lg p-1.5">✕</button>
                </div>
                <div class="p-6 space-y-3">
                    <p><strong>Member:</strong> {{ $b->member->user->name ?? '-' }}</p>
                    <p><strong>Email:</strong> {{ $b->member->user->email ?? '-' }}</p>
                    <p><strong>No HP:</strong> {{ $b->member->no_hp ?? '-' }}</p>
                    <p><strong>Kelas:</strong> {{ $b->jadwalKelas->nama_kelas ?? '-' }}</p>
                    <p><strong>Tanggal:</strong> {{ $b->tanggal }}</p>
                    <p><strong>Status:</strong>
                        @if($b->status == 'pending')
                            <span class="px-2 py-1 bg-yellow-100 text-yellow-800 rounded text-xs">Pending</span>
                        @elseif($b->status == 'approved')
                            <span class="px-2 py-1 bg-green-100 text-green-800 rounded text-xs">Approved</span>
                        @else
                            <span class="px-2 py-1 bg-red-100 text-red-800 rounded text-xs">Rejected</span>
                        @endif
                    </p>
                </div>
            </div>
        </div>

        {{-- Modal Edit --}}
        <div id="edit-booking-modal-{{ $b->id }}" class="hidden fixed inset-0 z-50 flex items-center justify-center bg-black/50">
            <div class="bg-white rounded-lg shadow w-full max-w-lg relative">
                <div class="flex items-start justify-between p-5 border-b">
                    <h3 class="text-xl font-semibold">Edit Booking</h3>
                    <button type="button" data-modal-toggle="edit-booking-modal-{{ $b->id }}"
                        class="text-gray-400 hover:bg-gray-200 rounded-lg p-1.5">✕</button>
                </div>
                <div class="p-6">
                    <form action="{{ route('admin.bookings.update', $b->id) }}" method="POST" class="space-y-4">
                        @csrf @method('PUT')
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Kelas</label>
                            <select name="jadwal_kelas_id" class="mt-1 block w-full border-gray-300 rounded-lg shadow-sm">
                                @foreach($jadwalKelas as $k)
                                    <option value="{{ $k->id }}" {{ $b->jadwal_kelas_id == $k->id ? 'selected' : '' }}>
                                        {{ $k->nama_kelas }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Tanggal</label>
                            <input type="date" name="tanggal" value="{{ $b->tanggal }}"
                                class="mt-1 block w-full border-gray-300 rounded-lg shadow-sm">
                        </div>
                        <div class="flex justify-end space-x-2">
                            <button type="button" data-modal-toggle="edit-booking-modal-{{ $b->id }}"
                                class="bg-gray-500 text-white px-4 py-2 rounded-lg">Batal</button>
                            <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg">
                                Simpan
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        @empty
        <tr>
            <td colspan="6" class="p-4 text-center text-gray-500">Belum ada data booking.</td>
        </tr>
        @endforelse
    </tbody>
</table>
@endsection
