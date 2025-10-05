@extends('layout.main')
@section('content')
<div class="d-flex items-center justify-between mb-4">
    <h1 class="text-xl sm:text-2xl font-semibold text-gray-900">Halaman Instruktur</h1>
    <button type="button" data-modal-toggle="add-instruktur-modal"
        class="text-white bg-cyan-600 hover:bg-cyan-700 focus:ring-4 focus:ring-cyan-200 font-medium inline-flex items-center rounded-lg text-sm px-3 py-2 mt-2">
        <svg class="-ml-1 mr-2 h-6 w-6" fill="currentColor" viewBox="0 0 20 20">
            <path fill-rule="evenodd"
                d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z"
                clip-rule="evenodd"></path>
        </svg>
        Tambah Instruktur
    </button>
</div>

<table class="table-fixed min-w-full divide-y divide-gray-200 shadow-sm rounded-lg overflow-hidden mt-3">
    <thead class="bg-gray-100">
        <tr>
            <th class="p-4 text-left text-xs font-medium text-gray-500 uppercase">No</th>
            <th class="p-4 text-left text-xs font-medium text-gray-500 uppercase">Nama</th>
            <th class="p-4 text-left text-xs font-medium text-gray-500 uppercase">Email</th>
            <th class="p-4 text-left text-xs font-medium text-gray-500 uppercase">Biaya</th>
            <th class="p-4 text-left text-xs font-medium text-gray-500 uppercase">No HP</th>
            <th class="p-4 text-left text-xs font-medium text-gray-500 uppercase">Alamat</th>
            <th class="p-4 text-left text-xs font-medium text-gray-500 uppercase">Foto</th>
            <th class="p-4 text-left text-xs font-medium text-gray-500 uppercase">Tanggal Daftar</th>
            <th class="p-4 text-center text-xs font-medium text-gray-500 uppercase">Aksi</th>
        </tr>
    </thead>
    <tbody class="bg-white divide-y divide-gray-200">
        @forelse ($instrukturs as $i)
        <tr class="hover:bg-gray-100">
            <td class="p-4 text-sm font-medium text-gray-900">{{ $loop->iteration }}</td>
            <td class="p-4 text-sm font-medium text-gray-900">{{ $i->user->name }}</td>
            <td class="p-4 text-sm text-gray-700">{{ $i->user->email }}</td>
            <td class="p-4 text-sm text-gray-700">Rp {{ number_format($i->biaya,0,',','.') }}</td>
            <td class="p-4 text-sm text-gray-700">{{ $i->no_hp }}</td>
            <td class="p-4 text-sm text-gray-700">{{ $i->alamat }}</td>
            <td class="p-4 text-sm text-gray-700">
                <img src="{{ asset('uploads/instrukturs/'.$i->foto) }}" alt="foto" class="h-12 w-12 rounded-full">
            </td>
            <td class="p-4 text-sm text-gray-700">{{ $i->created_at->format('d-m-Y') }}</td>
            <td class="p-4 space-x-2 text-center">
                <!-- Tombol Edit -->
                <button type="button" data-modal-toggle="edit-instruktur-modal-{{ $i->id }}"
                    class="text-white bg-cyan-600 hover:bg-cyan-700 focus:ring-4 focus:ring-cyan-200 font-medium rounded-lg text-sm inline-flex items-center px-3 py-2">
                    Edit
                </button>
                <!-- Tombol Hapus -->
                <form action="{{ route('admin.instruktur.destroy', $i->id) }}" method="POST" class="inline delete-form">
                    @csrf
                    @method('DELETE')
                    <button type="submit"
                        class="text-white bg-red-600 hover:bg-red-700 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm inline-flex items-center px-3 py-2">
                        Hapus
                    </button>
                </form>
            </td>
        </tr>
        @empty
        <tr>
            <td colspan="7" class="p-4 text-center text-gray-500">Belum ada data instruktur.</td>
        </tr>
        @endforelse
    </tbody>
</table>

<!-- Modal Tambah Instruktur -->
<div id="add-instruktur-modal" class="hidden fixed inset-0 z-50 flex items-center justify-center bg-black/50">
    <div class="bg-white rounded-lg shadow w-full max-w-2xl relative">
        <div class="flex items-start justify-between p-5 border-b rounded-t">
            <h3 class="text-xl font-semibold">Tambah Instruktur</h3>
            <button type="button" data-modal-toggle="add-instruktur-modal"
                class="text-gray-400 hover:bg-gray-200 hover:text-gray-900 rounded-lg p-1.5 ml-auto">✕</button>
        </div>
        <form action="{{ route('admin.instruktur.store') }}" method="POST" enctype="multipart/form-data" class="p-6 space-y-6">
            @csrf
            <div class="grid grid-cols-6 gap-6">
                <div class="col-span-6 sm:col-span-3">
                    <label class="block mb-2 text-sm font-medium">Nama</label>
                    <input type="text" name="name" value="{{ old('name') }}" class="w-full border rounded-lg p-2.5" required>
                </div>
                <div class="col-span-6 sm:col-span-3">
                    <label class="block mb-2 text-sm font-medium">Email</label>
                    <input type="email" name="email" value="{{ old('email') }}" class="w-full border rounded-lg p-2.5" required>
                </div>
                <div class="col-span-6 sm:col-span-3">
                    <label class="block mb-2 text-sm font-medium">Password</label>
                    <input type="password" name="password" class="w-full border rounded-lg p-2.5" required>
                </div>
                <div class="col-span-6 sm:col-span-3">
                    <label class="block mb-2 text-sm font-medium">Biaya</label>
                    <input type="text" name="biaya" value="{{ old('biaya') }}" class="w-full border rounded-lg p-2.5" required>
                </div>
                <div class="col-span-6 sm:col-span-3">
                    <label class="block mb-2 text-sm font-medium">No Hp</label>
                    <input type="text" name="no_hp" value="{{ old('no_hp') }}" class="w-full border rounded-lg p-2.5" required>
                </div>
                <div class="col-span-6 sm:col-span-3">
                    <label class="block mb-2 text-sm font-medium">Alamat</label>
                    <input type="text" name="alamat" value="{{ old('alamat') }}" class="w-full border rounded-lg p-2.5" required>
                </div>
                <div class="col-span-6 sm:col-span-3">
                    <label class="block mb-2 text-sm font-medium">Foto</label>
                    <input type="file" name="foto" class="w-full border rounded-lg p-2.5" required>
                </div>
            </div>
            <div class="flex justify-end">
                <button type="submit" class="text-white bg-cyan-600 hover:bg-cyan-700 font-medium rounded-lg text-sm px-5 py-2.5">
                    Simpan
                </button>
            </div>
        </form>
    </div>
</div>

<!-- Modal Edit Instruktur -->
@foreach ($instrukturs as $i)
<div id="edit-instruktur-modal-{{ $i->id }}"
    class="hidden fixed inset-0 z-50 flex items-center justify-center bg-black/50">
    <div class="bg-white rounded-lg shadow w-full max-w-2xl relative">
        <div class="flex items-start justify-between p-5 border-b rounded-t">
            <h3 class="text-xl font-semibold">Edit Instruktur</h3>
            <button type="button" data-modal-toggle="edit-instruktur-modal-{{ $i->id }}"
                class="text-gray-400 hover:bg-gray-200 hover:text-gray-900 rounded-lg p-1.5 ml-auto">✕</button>
        </div>

        <form action="{{ route('admin.instruktur.update', $i->id) }}" method="POST" enctype="multipart/form-data" class="p-6 space-y-6">
            @csrf
            @method('PUT')
            <div class="grid grid-cols-6 gap-6">
                <div class="col-span-6 sm:col-span-3">
                    <label class="block mb-2 text-sm font-medium">Email</label>
                    <input type="text" value="{{ $i->user->email }}" class="w-full border rounded-lg p-2.5 bg-gray-100" readonly>
                </div>
                <div class="col-span-6 sm:col-span-3">
                    <label class="block mb-2 text-sm font-medium">Nama</label>
                    <input type="text" name="name" value="{{ old('name', $i->user->name) }}" class="w-full border rounded-lg p-2.5" required>
                </div>
                <div class="col-span-6 sm:col-span-3">
                    <label class="block mb-2 text-sm font-medium">Biaya</label>
                    <input type="text" name="biaya" value="{{ old('biaya', $i->biaya) }}" class="w-full border rounded-lg p-2.5" required>
                </div>
                <div class="col-span-6 sm:col-span-3">
                    <label class="block mb-2 text-sm font-medium">No Hp</label>
                    <input type="text" name="no_hp" value="{{ old('no_hp', $i->no_hp) }}" class="w-full border rounded-lg p-2.5" required>
                </div>
                <div class="col-span-6 sm:col-span-3">
                    <label class="block mb-2 text-sm font-medium">Alamat</label>
                    <input type="text" name="alamat" value="{{ old('alamat', $i->alamat) }}" class="w-full border rounded-lg p-2.5" required>
                </div>
                <div class="col-span-6 sm:col-span-3">
                    <label class="block mb-2 text-sm font-medium">Foto (kosongkan jika tidak diubah)</label>
                    <input type="file" name="foto" class="w-full border rounded-lg p-2.5">
                </div>
            </div>

            <div class="flex justify-end">
                <button type="submit" class="text-white bg-cyan-600 hover:bg-cyan-700 font-medium rounded-lg text-sm px-5 py-2.5">
                    Simpan Perubahan
                </button>
            </div>
        </form>
    </div>
</div>
@endforeach

@endsection
