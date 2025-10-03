@extends('layout.main')

@section('content')
<div class="d-flex items-center justify-between mb-4">
    <h1 class="text-xl sm:text-2xl font-semibold text-gray-900">Halaman Jadwal Kelas</h1>
    <button type="button" data-modal-toggle="add-jadwal-modal"
        class="text-white bg-cyan-600 hover:bg-cyan-700 font-medium inline-flex items-center rounded-lg text-sm px-3 py-2 mt-2">
        <svg class="-ml-1 mr-2 h-6 w-6" fill="currentColor" viewBox="0 0 20 20">
            <path fill-rule="evenodd"
                d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z"
                clip-rule="evenodd"></path>
        </svg>
        Tambah Jadwal
    </button>
</div>

<table class="table-fixed min-w-full divide-y divide-gray-200 shadow-sm rounded-lg overflow-hidden mt-3">
    <thead class="bg-gray-100">
        <tr>
            <th class="p-4 text-left text-xs font-medium text-gray-500 uppercase">No</th>
            <th class="p-4 text-left text-xs font-medium text-gray-500 uppercase">Nama Kelas</th>
            <th class="p-4 text-left text-xs font-medium text-gray-500 uppercase">Hari</th>
            <th class="p-4 text-left text-xs font-medium text-gray-500 uppercase">Waktu</th>
            <th class="p-4 text-left text-xs font-medium text-gray-500 uppercase">Instruktur</th>
            <th class="p-4 text-center text-xs font-medium text-gray-500 uppercase">Aksi</th>
        </tr>
    </thead>
    <tbody class="bg-white divide-y divide-gray-200">
        @forelse ($jadwals as $j)
        <tr class="hover:bg-gray-100">
            <td class="p-4 text-sm font-medium text-gray-900">{{ $loop->iteration }}</td>
            <td class="p-4 text-sm font-medium text-gray-900">{{ $j->nama_kelas }}</td>
            <td class="p-4 text-sm text-gray-700">{{ $j->hari }}</td>
            <td class="p-4 text-sm text-gray-700">{{ $j->waktu }}</td>
            <td class="p-4 text-sm text-gray-700">{{ $j->instruktur?->user?->name ?? '-' }}</td>
            <td class="p-4 space-x-2 text-center">
                <button type="button"
                    onclick="openEditModal({{ $j->id }}, '{{ $j->nama_kelas }}', '{{ $j->hari }}', '{{ $j->waktu }}', {{ $j->instruktur_id ?? 'null' }})"
                    class="text-white bg-cyan-600 hover:bg-cyan-700 font-medium rounded-lg text-sm px-3 py-2">
                    Edit
                </button>
                <form action="{{ route('admin.jadwal.destroy', $j->id) }}" method="POST" class="inline delete-form">
                    @csrf
                    @method('DELETE')
                    <button type="submit"
                        class="text-white bg-red-600 hover:bg-red-700 font-medium rounded-lg text-sm px-3 py-2">
                        Hapus
                    </button>
                </form>
            </td>
        </tr>
        @empty
        <tr>
            <td colspan="6" class="p-4 text-center text-gray-500">Belum ada jadwal kelas.</td>
        </tr>
        @endforelse
    </tbody>
</table>

<!-- Modal Tambah Jadwal -->
<div id="add-jadwal-modal" class="hidden fixed inset-0 z-50 flex items-center justify-center bg-black/50">
    <div class="bg-white rounded-lg shadow w-full max-w-2xl relative p-6">
        <h3 class="text-xl font-semibold mb-4">Tambah Jadwal</h3>
        <form action="{{ route('admin.jadwal.store') }}" method="POST" class="space-y-4">
            @csrf
            <input type="text" name="nama_kelas" placeholder="Nama Kelas" class="w-full border rounded p-2.5" required>
            <select name="hari" class="w-full border rounded p-2.5" required>
                <option value="" disabled selected>Pilih Hari</option>
                <option value="Senin">Senin</option>
                <option value="Selasa">Selasa</option>
                <option value="Rabu">Rabu</option>
                <option value="Kamis">Kamis</option>
                <option value="Jumat">Jumat</option>
                <option value="Sabtu">Sabtu</option>
                <option value="Minggu">Minggu</option>
            </select>

            <input type="time" name="waktu" class="w-full border rounded p-2.5" required>
            <select name="instruktur_id" class="w-full border rounded p-2.5">
                <option value="">-- Pilih Instruktur --</option>
                @foreach($instrukturs as $i)
                <option value="{{ $i->id }}">{{ $i->user?->name ?? 'Instruktur #'.$i->id }}</option>
                @endforeach
            </select>
            <div class="flex justify-end">
                <button type="submit"
                    class="bg-cyan-600 text-white px-5 py-2.5 rounded hover:bg-cyan-700">Simpan</button>
            </div>
        </form>
    </div>
</div>

<!-- Modal Edit Jadwal (Satu Modal Dinamis) -->
<div id="edit-jadwal-modal" class="hidden fixed inset-0 z-50 flex items-center justify-center bg-black/50">
    <div class="bg-white rounded-lg shadow w-full max-w-2xl relative p-6">
        <h3 class="text-xl font-semibold mb-4">Edit Jadwal</h3>
        <form id="edit-jadwal-form" method="POST" class="space-y-4">
            @csrf
            @method('PUT')
            <input type="text" name="nama_kelas" id="edit-nama_kelas" class="w-full border rounded p-2.5" required>
            <select name="hari" class="w-full border rounded p-2.5" required>
                <option value="" disabled selected>Pilih Hari</option>
                <option value="Senin">Senin</option>
                <option value="Selasa">Selasa</option>
                <option value="Rabu">Rabu</option>
                <option value="Kamis">Kamis</option>
                <option value="Jumat">Jumat</option>
                <option value="Sabtu">Sabtu</option>
                <option value="Minggu">Minggu</option>
            </select>

            <input type="time" name="waktu" id="edit-waktu" class="w-full border rounded p-2.5" required>
            <select name="instruktur_id" id="edit-instruktur_id" class="w-full border rounded p-2.5">
                <option value="">-- Pilih Instruktur --</option>
                @foreach($instrukturs as $i)
                <option value="{{ $i->id }}">{{ $i->user?->name ?? 'Instruktur #'.$i->id }}</option>
                @endforeach
            </select>
            <div class="flex justify-end">
                <button type="submit" class="bg-cyan-600 text-white px-5 py-2.5 rounded hover:bg-cyan-700">Simpan
                    Perubahan</button>
            </div>
        </form>
    </div>
</div>

<script>
    function openAddModal() {
        document.getElementById('add-jadwal-modal').classList.remove('hidden');
    }

    function openEditModal(id, nama_kelas, hari, waktu, instruktur_id) {
        const form = document.getElementById('edit-jadwal-form');
        form.action = `/admin/jadwal/${id}`; // pastikan sesuai route
        document.getElementById('edit-nama_kelas').value = nama_kelas;
        document.getElementById('edit-hari').value = hari;
        document.getElementById('edit-waktu').value = waktu;
        document.getElementById('edit-instruktur_id').value = instruktur_id ? ? '';
        document.getElementById('edit-jadwal-modal').classList.remove('hidden');
    }

</script>

@endsection
