@extends('layout.main')

@section('content')
<div class="d-flex items-center justify-between mb-4">
    <h1 class="text-xl sm:text-2xl font-semibold text-gray-900">Halaman Jadwal Kelas</h1>
    <button type="button" onclick="openAddModal()"
        class="text-white bg-cyan-600 hover:bg-cyan-700 font-medium inline-flex items-center rounded-lg text-sm px-3 py-2">
        Tambah Jadwal
    </button>
</div>

{{-- Pesan --}}
@if(session('success'))
<div class="mb-4 p-3 rounded bg-green-100 text-green-800">{{ session('success') }}</div>
@endif

@if(session('error'))
<div class="mb-4 p-3 rounded bg-red-100 text-red-800">{{ session('error') }}</div>
@endif

@if($errors->any())
<div class="mb-4 p-3 rounded bg-red-50 text-red-800">
    <ul class="list-disc pl-5">
        @foreach($errors->all() as $err)
            <li>{{ $err }}</li>
        @endforeach
    </ul>
</div>
@endif

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
                <button type="button" onclick="openEditModal({{ $j->id }}, '{{ $j->nama_kelas }}', '{{ $j->hari }}', '{{ $j->waktu }}', {{ $j->instruktur_id ?? 'null' }})"
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
            <input type="text" name="hari" placeholder="Hari" class="w-full border rounded p-2.5" required>
            <input type="time" name="waktu" class="w-full border rounded p-2.5" required>
            <select name="instruktur_id" class="w-full border rounded p-2.5">
                <option value="">-- Pilih Instruktur --</option>
                @foreach($instrukturs as $i)
                <option value="{{ $i->id }}">{{ $i->user?->name ?? 'Instruktur #'.$i->id }}</option>
                @endforeach
            </select>
            <div class="flex justify-end">
                <button type="submit" class="bg-cyan-600 text-white px-5 py-2.5 rounded hover:bg-cyan-700">Simpan</button>
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
            <input type="text" name="hari" id="edit-hari" class="w-full border rounded p-2.5" required>
            <input type="time" name="waktu" id="edit-waktu" class="w-full border rounded p-2.5" required>
            <select name="instruktur_id" id="edit-instruktur_id" class="w-full border rounded p-2.5">
                <option value="">-- Pilih Instruktur --</option>
                @foreach($instrukturs as $i)
                <option value="{{ $i->id }}">{{ $i->user?->name ?? 'Instruktur #'.$i->id }}</option>
                @endforeach
            </select>
            <div class="flex justify-end">
                <button type="submit" class="bg-cyan-600 text-white px-5 py-2.5 rounded hover:bg-cyan-700">Simpan Perubahan</button>
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
    document.getElementById('edit-instruktur_id').value = instruktur_id ?? '';
    document.getElementById('edit-jadwal-modal').classList.remove('hidden');
}
</script>

@endsection
