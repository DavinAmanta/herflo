    @extends('layout.main')
    @section('content')
    <div class="d-flex items-center justify-between mb-4">
        <h1 class="text-xl sm:text-2xl font-semibold text-gray-900">Halaman Member</h1>
        <button type="button" data-modal-toggle="add-member-modal"
            class="text-white bg-cyan-600 hover:bg-cyan-700 focus:ring-4 focus:ring-cyan-200 font-medium inline-flex items-center rounded-lg text-sm px-3 py-2 mt-2">
            <svg class="-ml-1 mr-2 h-6 w-6" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd"
                    d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z"
                    clip-rule="evenodd"></path>
            </svg>
            Tambah Member
        </button>
    </div>
    <table class="table-fixed min-w-full divide-y divide-gray-200 shadow-sm rounded-lg overflow-hidden mt-3">
        <thead class="bg-gray-100">
            <tr>
                <th class="p-4 text-left text-xs font-medium text-gray-500 uppercase">No</th>
                <th class="p-4 text-left text-xs font-medium text-gray-500 uppercase">Nama</th>
                <th class="p-4 text-left text-xs font-medium text-gray-500 uppercase">Tanggal Daftar</th>
                <th class="p-4 text-left text-xs font-medium text-gray-500 uppercase">Tgl Berakhir</th>
                <th class="p-4 text-left text-xs font-medium text-gray-500 uppercase">Status</th>
                <th class="p-4 text-center text-xs font-medium text-gray-500 uppercase">Aksi</th>
            </tr>
        </thead>
        <tbody class="bg-white divide-y divide-gray-200">
            @forelse ($members as $m)
            <tr class="hover:bg-gray-100">
                <td class="p-4 text-sm font-medium text-gray-900">{{ $loop->iteration }}</td>
                <td class="p-4 text-sm font-medium text-gray-900">{{ $m->user->name ?? '-' }}</td>
                <td class="p-4 text-sm text-gray-700">{{ $m->tgl_daftar }}</td>
                <td class="p-4 text-sm text-gray-700">{{ $m->tgl_berakhir ?? '-' }}</td>
                <td class="p-4 text-sm text-gray-700">
                    <span
                        class="px-3 py-1 rounded-full text-xs font-semibold {{ $m->status == 'aktif' ? 'bg-green-100 text-green-700' : 'bg-red-100 text-red-700' }}">
                        {{ ucfirst($m->status ?? '-') }}
                    </span>
                </td>
                <td class="p-4 space-x-2 text-center">
                    <button type="button" data-modal-toggle="detail-member-modal-{{ $m->id }}"
                        class="text-white bg-blue-600 hover:bg-blue-700 rounded-lg text-sm px-3 py-2">
                        Detail
                    </button>
                    <button type="button" data-modal-toggle="edit-member-modal-{{ $m->id }}"
                        class="text-white bg-cyan-600 hover:bg-cyan-700 rounded-lg text-sm px-3 py-2">
                        Edit
                    </button>
                    <form action="{{ route('admin.member.destroy', $m->id) }}" method="POST" class="inline delete-form">
                        @csrf
                        @method('DELETE')
                        <button type="submit"
                            class="text-white bg-red-600 hover:bg-red-700 rounded-lg text-sm px-3 py-2">Hapus</button>
                    </form>
                </td>
            </tr>

            {{-- Modal Detail Member --}}
            <div id="detail-member-modal-{{ $m->id }}"
                class="hidden fixed inset-0 z-50 flex items-center justify-center bg-black/50 p-4">
                <div class="bg-white rounded-xl shadow-lg w-full max-w-lg relative">
                    <!-- Header -->
                    <div class="bg-cyan-600 text-white px-5 py-3 rounded-t-xl flex justify-between items-center">
                        <h2 class="text-lg font-semibold">Detail Member</h2>
                        <button type="button" data-modal-toggle="detail-member-modal-{{ $m->id }}"
                            class="hover:bg-cyan-700 p-1.5 rounded-full transition">
                            ✕
                        </button>
                    </div>
                    <!-- Body -->
                    <div class="p-5 space-y-4 text-gray-800 text-sm">
                        <!-- Identitas Pribadi -->
                        <div class="border rounded-lg p-4 bg-gray-50">
                            <h3 class="font-semibold text-cyan-700 mb-2">🧍 Informasi Pribadi</h3>
                            <div class="space-y-2">
                                <p><strong>Nama:</strong> {{ $m->user->name }}</p>
                                <p><strong>Email:</strong> {{ $m->user->email }}</p>
                                <p><strong>NIK:</strong> {{ $m->nik }}</p>
                                <p><strong>No HP:</strong> {{ $m->no_hp }}</p>
                                <p><strong>Alamat:</strong> {{ $m->alamat }}</p>
                            </div>
                        </div>

                        <!-- Informasi Keanggotaan -->
                        <div class="border rounded-lg p-4 bg-gray-50">
                            <h3 class="font-semibold text-cyan-700 mb-2">💪 Keanggotaan</h3>
                            <div class="space-y-2">
                                <p><strong>Paket:</strong> {{ $m->paket ?? '-' }}</p>
                                <p>
                                    <strong>Status Member:</strong>
                                    <span class="px-2 py-0.5 rounded-full text-xs font-medium 
                            {{ $m->status == 'aktif' ? 'bg-blue-100 text-blue-700' : 'bg-gray-200 text-gray-700' }}">
                                        {{ ucfirst($m->status) }}
                                    </span>
                                </p>
                                <p><strong>Tgl Daftar:</strong>
                                    {{ \Carbon\Carbon::parse($m->tgl_daftar)->format('d M Y') }}</p>
                                <p><strong>Tgl Berakhir:</strong>
                                    {{ $m->tgl_berakhir ? \Carbon\Carbon::parse($m->tgl_berakhir)->format('d M Y') : '-' }}
                                </p>
                            </div>
                        </div>

                        <!-- Status Pembayaran -->
                        <div class="border rounded-lg p-4 bg-gray-50">
                            <h3 class="font-semibold text-cyan-700 mb-2">💰 Pembayaran</h3>
                            <p>
                                <strong>Status Bayar:</strong>
                                <span class="px-2 py-0.5 rounded-full text-xs font-semibold 
                        {{ $m->status_bayar == 'lunas' ? 'bg-green-100 text-green-700' : 'bg-red-100 text-red-700' }}">
                                    {{ ucfirst($m->status_bayar) }}
                                </span>
                            </p>
                        </div>
                    </div>

                    <!-- Footer -->
                    <div class="border-t bg-gray-50 px-5 py-3 rounded-b-xl flex justify-end">
                        <button type="button" data-modal-toggle="detail-member-modal-{{ $m->id }}"
                            class="px-4 py-2 bg-cyan-600 hover:bg-cyan-700 text-white rounded-lg text-sm font-medium transition">
                            Tutup
                        </button>
                    </div>
                </div>
            </div>

            @empty
            <tr>
                <td colspan="6" class="p-4 text-center text-gray-500">Belum ada data member.</td>
            </tr>
            @endforelse
        </tbody>
    </table>


    <!-- Modal Tambah Member -->
    <div id="add-member-modal" class="hidden fixed inset-0 z-50 flex items-center justify-center bg-black/50">
        <div class="bg-white rounded-lg shadow w-full max-w-2xl relative">
            <div class="flex items-start justify-between p-5 border-b rounded-t">
                <h3 class="text-xl font-semibold">Tambah member</h3>
                <button type="button" data-modal-toggle="add-member-modal"
                    class="text-gray-400 hover:bg-gray-200 hover:text-gray-900 rounded-lg p-1.5 ml-auto">✕</button>
            </div>
            <form action="{{ route('admin.member.store') }}" method="POST" class="p-6 space-y-6">
                @csrf
                <div class="grid grid-cols-6 gap-6">
                    <div class="col-span-6 sm:col-span-3">
                        <label class="block mb-2 text-sm font-medium">Nama</label>
                        <input type="text" name="name" value="{{ old('name') }}" class="w-full border rounded-lg p-2.5"
                            required>
                    </div>
                    <div class="col-span-6 sm:col-span-3">
                        <label class="block mb-2 text-sm font-medium">Email</label>
                        <input type="email" name="email" value="{{ old('email') }}"
                            class="w-full border rounded-lg p-2.5" required>
                    </div>
                    <div class="col-span-6 sm:col-span-3">
                        <label class="block mb-2 text-sm font-medium">No Hp</label>
                        <input type="text" name="no_hp" value="{{ old('no_hp') }}"
                            class="w-full border rounded-lg p-2.5" required>
                    </div>
                    <div class="col-span-6 sm:col-span-3">
                        <label class="block mb-2 text-sm font-medium">Alamat</label>
                        <input type="text" name="alamat" value="{{ old('alamat') }}"
                            class="w-full border rounded-lg p-2.5" required>
                    </div>
                    <div class="col-span-6 sm:col-span-3">
                        <label class="block mb-2 text-sm font-medium">NIK</label>
                        <input type="text" name="nik" value="{{ old('nik') }}" class="w-full border rounded-lg p-2.5">
                    </div>

                    <div class="col-span-6 sm:col-span-3">
                        <label class="block mb-2 text-sm font-medium">Paket</label>
                        <select name="paket" class="w-full border rounded-lg p-2.5" required>
                            <option value="">-- Pilih Paket --</option>
                            <option value="1 Bulan" {{ old('paket') == '1 Bulan' ? 'selected' : '' }}>1 Bulan</option>
                            <option value="3 Bulan" {{ old('paket') == '3 Bulan' ? 'selected' : '' }}>3 Bulan</option>
                            <option value="8 Bulan" {{ old('paket') == '8 Bulan' ? 'selected' : '' }}>8 Bulan</option>
                        </select>
                    </div>

                    <div class="col-span-6 sm:col-span-3">
                        <label class="block mb-2 text-sm font-medium">Password</label>
                        <input type="password" name="password" class="w-full border rounded-lg p-2.5" required>
                    </div>
                </div>
                <div class="flex justify-end">
                    <button type="submit"
                        class="text-white bg-cyan-600 hover:bg-cyan-700 font-medium rounded-lg text-sm px-5 py-2.5">
                        Simpan
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- Modal Edit Member -->
    @foreach ($members as $m)
    <div id="edit-member-modal-{{ $m->id }}"
        class="hidden fixed inset-0 z-50 flex items-center justify-center bg-black/50">
        <div class="bg-white rounded-lg shadow w-full max-w-2xl relative">
            <div class="flex items-start justify-between p-5 border-b rounded-t">
                <h3 class="text-xl font-semibold">Edit Member</h3>
                <button type="button" data-modal-toggle="edit-member-modal-{{ $m->id }}"
                    class="text-gray-400 hover:bg-gray-200 hover:text-gray-900 rounded-lg p-1.5 ml-auto">✕</button>
            </div>

            <form action="{{ route('admin.member.update', $m->id) }}" method="POST" class="p-6 space-y-6">
                @csrf
                @method('PUT')
                <div class="grid grid-cols-6 gap-6">
                    <div class="col-span-6 sm:col-span-3">
                        <label class="block mb-2 text-sm font-medium">Email</label>
                        <input type="text" value="{{ $m->user->email }}"
                            class="w-full border rounded-lg p-2.5 bg-gray-100" readonly>
                    </div>

                    <div class="col-span-6 sm:col-span-3">
                        <label class="block mb-2 text-sm font-medium">Nama</label>
                        <input type="text" name="name" value="{{ old('name', $m->user->name) }}"
                            class="w-full border rounded-lg p-2.5" required>
                    </div>

                    <div class="col-span-6 sm:col-span-3">
                        <label class="block mb-2 text-sm font-medium">NIK</label>
                        <input type="text" name="nik" value="{{ old('nik', $m->nik) }}"
                            class="w-full border rounded-lg p-2.5" required>
                    </div>

                    <div class="col-span-6 sm:col-span-3">
                        <label class="block mb-2 text-sm font-medium">No HP</label>
                        <input type="text" name="no_hp" value="{{ old('no_hp', $m->no_hp) }}"
                            class="w-full border rounded-lg p-2.5" required>
                    </div>

                    <div class="col-span-6 sm:col-span-3">
                        <label class="block mb-2 text-sm font-medium">Alamat</label>
                        <input type="text" name="alamat" value="{{ old('alamat', $m->alamat) }}"
                            class="w-full border rounded-lg p-2.5" required>
                    </div>

                    <div class="col-span-6 sm:col-span-3">
                        <label class="block mb-2 text-sm font-medium">Status Bayar</label>
                        <select name="status_bayar" class="w-full border rounded-lg p-2.5" required>
                            <option value="lunas" {{ $m->status_bayar == 'lunas' ? 'selected' : '' }}>Lunas</option>
                            <option value="belum_lunas" {{ $m->status_bayar == 'belum_lunas' ? 'selected' : '' }}>Belum
                                Lunas</option>
                        </select>
                    </div>
                    <div class="col-span-6 sm:col-span-3">
                        <label class="block mb-2 text-sm font-medium">Status Member</label>
                        <select name="status" class="w-full border rounded-lg p-2.5" required>
                            <option value="aktif" {{ $m->status_bayar == 'aktif' ? 'selected' : '' }}>Aktif</option>
                            <option value="tidak_aktif" {{ $m->status_bayar == 'tidak_aktif' ? 'selected' : '' }}>Tidak
                                Aktif</option>
                        </select>
                    </div>
                </div>

                <div class="flex justify-end">
                    <button type="submit"
                        class="text-white bg-cyan-600 hover:bg-cyan-700 font-medium rounded-lg text-sm px-5 py-2.5">
                        Simpan Perubahan
                    </button>
                </div>
            </form>
        </div>
    </div>
    @endforeach

    {{-- Konfirmasi delete sederhana
    @push('scripts')

    @endpush --}}

    @endsection
