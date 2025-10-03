@extends('layout.main')
@section('content')
<div class="max-w-7xl mx-auto">
    <div class="flex items-center justify-between mb-6">
        <h1 class="text-2xl font-bold text-gray-800">Kelola Booking</h1>
    </div>

    <div class="bg-white shadow-md rounded-xl overflow-hidden">
        {{-- Tabel Booking --}}
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200 text-sm">
                <thead class="bg-gray-50 sticky top-0 z-10">
                    <tr>
                        <th class="p-4 text-left font-semibold text-gray-600">No</th>
                        <th class="p-4 text-left font-semibold text-gray-600">Member</th>
                        <th class="p-4 text-left font-semibold text-gray-600">Kelas</th>
                        <th class="p-4 text-left font-semibold text-gray-600">Tanggal</th>
                        <th class="p-4 text-left font-semibold text-gray-600">Status</th>
                        <th class="p-4 text-center font-semibold text-gray-600">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100">
                    @forelse ($bookings as $b)
                    <tr class="hover:bg-gray-50 transition">
                        <td class="p-4 font-medium text-gray-900">{{ $loop->iteration }}</td>
                        <td class="p-4 text-gray-800">{{ $b->member->user->name ?? '-' }}</td>
                        <td class="p-4 text-gray-700">{{ $b->jadwalKelas->nama_kelas }}</td>
                        <td class="p-4 text-gray-700">{{ $b->tanggal }}</td>
                        <td class="p-4">
                            @if($b->status == 'pending')
                            <span
                                class="px-3 py-1 rounded-full bg-yellow-100 text-yellow-700 text-xs font-medium">Pending</span>
                            @elseif($b->status == 'approved')
                            <span
                                class="px-3 py-1 rounded-full bg-green-100 text-green-700 text-xs font-medium">Approved</span>
                            @else
                            <span
                                class="px-3 py-1 rounded-full bg-red-100 text-red-700 text-xs font-medium">Rejected</span>
                            @endif
                        </td>
                        <td class="p-4 text-center space-x-2">
                            {{-- Detail --}}
                            <button type="button" data-modal-toggle="detail-booking-modal-{{ $b->id }}"
                                class="bg-cyan-600 hover:bg-cyan-700 text-white rounded-lg px-3 py-1.5 text-xs transition">
                                Detail
                            </button>

                            {{-- Edit --}}
                            {{-- <button type="button" data-modal-toggle="edit-booking-modal-{{ $b->id }}"
                                class="bg-blue-600 hover:bg-blue-700 text-white rounded-lg px-3 py-1.5 text-xs transition">
                                Edit
                            </button> --}}

                            {{-- Approve / Reject --}}
                            @if($b->status == 'pending')
                            <form action="{{ route('admin.booking.approve', $b->id) }}" method="POST" class="inline">
                                @csrf @method('PUT')
                                <button type="submit"
                                    class="bg-green-600 hover:bg-green-700 text-white rounded-lg px-3 py-1.5 text-xs transition">
                                    Setujui
                                </button>
                            </form>

                            <form action="{{ route('admin.booking.reject', $b->id) }}" method="POST" class="inline">
                                @csrf @method('PUT')
                                <button type="submit"
                                    class="bg-red-600 hover:bg-red-700 text-white rounded-lg px-3 py-1.5 text-xs transition">
                                    Tolak
                                </button>
                            </form>
                            @endif

                            {{-- Hapus --}}
                            {{-- <form action="{{ route('admin.booking.destroy', $b->id) }}" method="POST" class="inline">
                                @csrf @method('DELETE')
                                <button type="submit" onclick="return confirm('Yakin ingin menghapus data ini?')"
                                    class="bg-gray-600 hover:bg-gray-700 text-white rounded-lg px-3 py-1.5 text-xs transition">
                                    Hapus
                                </button>
                            </form> --}}
                        </td>
                    </tr>

                    {{-- Modal Detail --}}
                    <div id="detail-booking-modal-{{ $b->id }}"
                        class="hidden fixed inset-0 z-50 flex items-center justify-center bg-black/40 backdrop-blur-sm">
                        <div class="bg-white rounded-xl shadow-lg w-full max-w-lg transform transition-all">
                            <div class="flex items-center justify-between p-5 border-b">
                                <h3 class="text-lg font-semibold text-gray-800">Detail Booking</h3>
                                <button type="button" data-modal-toggle="detail-booking-modal-{{ $b->id }}"
                                    class="text-gray-500 hover:text-gray-700">✕</button>
                            </div>
                            <div class="p-6 space-y-3 text-sm text-gray-700">
                                <p><strong>Member:</strong> {{ $b->member->user->name ?? '-' }}</p>
                                <p><strong>Email:</strong> {{ $b->member->user->email ?? '-' }}</p>
                                <p><strong>No HP:</strong> {{ $b->member->no_hp ?? '-' }}</p>
                                <p><strong>Kelas:</strong> {{ $b->jadwalKelas->nama_kelas ?? '-' }}</p>
                                <p><strong>Tanggal:</strong> {{ $b->tanggal }}</p>
                                <p><strong>Status:</strong>
                                    @if($b->status == 'pending')
                                    <span
                                        class="px-3 py-1 rounded-full bg-yellow-100 text-yellow-700 text-xs font-medium">Pending</span>
                                    @elseif($b->status == 'approved')
                                    <span
                                        class="px-3 py-1 rounded-full bg-green-100 text-green-700 text-xs font-medium">Approved</span>
                                    @else
                                    <span
                                        class="px-3 py-1 rounded-full bg-red-100 text-red-700 text-xs font-medium">Rejected</span>
                                    @endif
                                </p>
                            </div>
                        </div>
                    </div>

                    {{-- Modal Edit --}}
                    <div id="edit-booking-modal-{{ $b->id }}"
                        class="hidden fixed inset-0 z-50 flex items-center justify-center bg-black/40 backdrop-blur-sm">
                        <div class="bg-white rounded-xl shadow-lg w-full max-w-lg transform transition-all">
                            <div class="flex items-center justify-between p-5 border-b">
                                <h3 class="text-lg font-semibold text-gray-800">Edit Booking</h3>
                                <button type="button" data-modal-toggle="edit-booking-modal-{{ $b->id }}"
                                    class="text-gray-500 hover:text-gray-700">✕</button>
                            </div>
                            <div class="p-6">
                                <form action="{{ route('admin.booking.update', $b->id) }}" method="POST"
                                    class="space-y-4">
                                    @csrf @method('PUT')
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700">Kelas</label>
                                        <select name="jadwal_kelas_id"
                                            class="mt-1 block w-full border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500">
                                            @foreach($jadwalKelas as $k)
                                            <option value="{{ $k->id }}"
                                                {{ $b->jadwal_kelas_id == $k->id ? 'selected' : '' }}>
                                                {{ $k->nama_kelas }}
                                            </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700">Tanggal</label>
                                        <input type="date" name="tanggal" value="{{ $b->tanggal }}"
                                            class="mt-1 block w-full border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500">
                                    </div>
                                    <div class="flex justify-end space-x-2 pt-3">
                                        <button type="button" data-modal-toggle="edit-booking-modal-{{ $b->id }}"
                                            class="bg-gray-500 hover:bg-gray-600 text-white px-4 py-2 rounded-lg text-sm">
                                            Batal
                                        </button>
                                        <button type="submit"
                                            class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg text-sm">
                                            Simpan
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    @empty
                    <tr>
                        <td colspan="6" class="p-6 text-center text-gray-500">Belum ada data booking.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
