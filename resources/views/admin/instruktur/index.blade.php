@extends('layout.main')

@section('content')
<div class="d-flex items-center justify-between mb-4">
    <h1 class="text-xl sm:text-2xl font-semibold text-gray-900">Halaman Instruktur</h1>
    <button type="button" data-modal-toggle="add-instruktur-modal"
        class="text-white bg-cyan-600 hover:bg-cyan-700 font-medium inline-flex items-center rounded-lg text-sm px-3 py-2">
        <svg class="-ml-1 mr-2 h-6 w-6" fill="currentColor" viewBox="0 0 20 20">
            <path fill-rule="evenodd"
                d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z"
                clip-rule="evenodd"></path>
        </svg>
        Tambah Instruktur
    </button>
</div>

{{-- Flash Messages --}}
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

{{-- Tabel Data Instruktur --}}
<table class="table-fixed min-w-full divide-y divide-gray-200 shadow-sm rounded-lg overflow-hidden mt-3">
    <thead class="bg-gray-100">
        <tr>
            <th class="p-4 text-left text-xs font-medium text-gray-500 uppercase">No</th>
            <th class="p-4 text-left text-xs font-medium text-gray-500 uppercase">Nama</th>
            <th class="p-4 text-left text-xs font-medium text-gray-500 uppercase">Email</th>
            <th class="p-4 text-left text-xs font-medium text-gray-500 uppercase">No HP</th>
            <th class="p-4 text-left text-xs font-medium text-gray-500 uppercase">Alamat</th>
            <th class="p-4 text-left text-xs font-medium text-gray-500 uppercase">Biaya</th>
            <th class="p-4 text-left text-xs font-medium text-gray-500 uppercase">Foto</th>
            <th class="p-4 text-center text-xs font-medium text-gray-500 uppercase">Aksi</th>
        </tr>
    </thead>
    <tbody class="bg-white divide-y divide-gray-200">
        @forelse ($instrukturs as $i)
        <tr class="hover:bg-gray-100">
            <td class="p-4 text-sm font-medium text-gray-900">{{ $loop->iteration }}</td>
            <td class="p-4 text-sm font-medium text-gray-900">{{ $i->user->name ?? $i->user->nama ?? '-' }}</td>
            <td class="p-4 text-sm text-gray-700">{{ $i->user->email ?? '-' }}</td>
            <td class="p-4 text-sm text-gray-700">{{ $i->no_hp ?? '-' }}</td>
            <td class="p-4 text-sm text-gray-700">{{ $i->alamat ?? '-' }}</td>
            <td class="p-4 text-sm text-gray-700">Rp {{ number_format($i->biaya, 0, ',', '.') }}</td>
            <td class="p-4 text-sm text-gray-700">
                @if($i->foto)
                    <img src="{{ asset('storage/'.$i->foto) }}" alt="Foto" class="h-12 w-12 object-cover rounded-full cursor-pointer"
                         onclick="openImageModal('{{ asset('storage/'.$i->foto) }}')">
                @else
                    <span class="text-gray-400">-</span>
                @endif
            </td>
            <td class="p-4 space-x-2 text-center">
                <button type="button" data-modal-toggle="edit-instruktur-modal-{{ $i->id }}"
                    class="text-white bg-cyan-600 hover:bg-cyan-700 font-medium rounded-lg text-sm inline-flex items-center px-3 py-2">
                    Edit
                </button>
                <form action="{{ route('admin.instruktur.destroy', $i->id) }}" method="POST" class="inline delete-form">
                    @csrf
                    @method('DELETE')
                    <button type="button" class="text-white bg-red-600 hover:bg-red-700 font-medium rounded-lg text-sm inline-flex items-center px-3 py-2 delete-button">
                        Hapus
                    </button>
                </form>
            </td>
        </tr>
        @empty
        <tr>
            <td colspan="8" class="p-4 text-center text-gray-500">Belum ada data instruktur.</td>
        </tr>
        @endforelse
    </tbody>
</table>

{{-- Modal Preview Gambar --}}
<div id="image-modal" class="hidden fixed inset-0 z-50 bg-black/70 flex items-center justify-center">
    <span class="absolute top-5 right-5 text-white text-3xl cursor-pointer" onclick="closeImageModal()">✕</span>
    <img id="preview-image" src="" class="max-h-[90%] max-w-[90%] rounded-lg shadow-lg">
</div>

{{-- Modal Tambah Instruktur --}}
<div id="add-instruktur-modal" class="hidden fixed inset-0 z-50 flex items-center justify-center bg-black/50">
    <div class="bg-white rounded-lg shadow w-full max-w-2xl relative">
        <div class="flex items-start justify-between p-5 border-b rounded-t">
            <h3 class="text-xl font-semibold">Tambah Instruktur</h3>
            <button type="button" data-modal-toggle="add-instruktur-modal"
                class="text-gray-400 hover:bg-gray-200 hover:text-gray-900 rounded-lg p-1.5 ml-auto">✕</button>
        </div>

        @if(!isset($users) || $users->isEmpty())
            <div class="p-6">
                <p class="text-sm text-gray-600 mb-4">Tidak ada user tersedia untuk dijadikan instruktur. Silakan buat user terlebih dahulu.</p>
                @if(Route::has('users.create'))
                    <a href="{{ route('users.create') }}" class="inline-block bg-cyan-600 text-white px-4 py-2 rounded">Buat User Baru</a>
                @endif
            </div>
        @else
            <form action="{{ route('admin.instruktur.store') }}" method="POST" enctype="multipart/form-data" class="p-6 space-y-6">
                @csrf
                <div class="grid grid-cols-6 gap-6">
                    {{-- Pilih User --}}
                    <div class="col-span-6 sm:col-span-3">
                        <label class="block mb-2 text-sm font-medium">Pilih User</label>
                        <select name="user_id" class="w-full border rounded-lg p-2.5" required>
                            <option value="">-- Pilih User --</option>
                            @foreach($users as $u)
                                <option value="{{ $u->id }}">{{ $u->name ?? $u->nama ?? $u->email }}</option>
                            @endforeach
                        </select>
                    </div>

                    {{-- No HP --}}
                    <div class="col-span-6 sm:col-span-3">
                        <label class="block mb-2 text-sm font-medium">No HP</label>
                        <input type="text" name="no_hp" class="w-full border rounded-lg p-2.5">
                    </div>

                    {{-- Alamat --}}
                    <div class="col-span-6 sm:col-span-3">
                        <label class="block mb-2 text-sm font-medium">Alamat</label>
                        <input type="text" name="alamat" class="w-full border rounded-lg p-2.5">
                    </div>

                    {{-- Biaya --}}
                    <div class="col-span-6 sm:col-span-3">
                        <label class="block mb-2 text-sm font-medium">Biaya</label>
                        <input type="number" name="biaya" class="w-full border rounded-lg p-2.5">
                    </div>

                    {{-- Foto --}}
                    <div class="col-span-6 sm:col-span-3">
                        <label class="block mb-2 text-sm font-medium">Foto</label>
                        <input type="file" name="foto" class="w-full border rounded-lg p-2.5">
                    </div>
                </div>

                <div class="flex justify-end">
                    <button type="submit"
                        class="text-white bg-cyan-600 hover:bg-cyan-700 font-medium rounded-lg text-sm px-5 py-2.5">
                        Simpan
                    </button>
                </div>
            </form>
        @endif
    </div>
</div>

{{-- Modal Edit Instruktur --}}
@foreach ($instrukturs as $i)
<div id="edit-instruktur-modal-{{ $i->id }}" class="hidden fixed inset-0 z-50 flex items-center justify-center bg-black/50">
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
                {{-- User (readonly) --}}
                <div class="col-span-6 sm:col-span-3">
                    <label class="block mb-2 text-sm font-medium">User</label>
                    <input type="text" value="{{ $i->user->name ?? $i->user->nama ?? $i->user->email }}"
                           class="w-full border rounded-lg p-2.5 bg-gray-100" readonly>
                </div>

                {{-- No HP --}}
                <div class="col-span-6 sm:col-span-3">
                    <label class="block mb-2 text-sm font-medium">No HP</label>
                    <input type="text" name="no_hp" value="{{ $i->no_hp }}" class="w-full border rounded-lg p-2.5">
                </div>

                {{-- Alamat --}}
                <div class="col-span-6 sm:col-span-3">
                    <label class="block mb-2 text-sm font-medium">Alamat</label>
                    <input type="text" name="alamat" value="{{ $i->alamat }}" class="w-full border rounded-lg p-2.5">
                </div>

                {{-- Biaya --}}
                <div class="col-span-6 sm:col-span-3">
                    <label class="block mb-2 text-sm font-medium">Biaya</label>
                    <input type="number" name="biaya" value="{{ $i->biaya }}" class="w-full border rounded-lg p-2.5">
                </div>

                {{-- Foto --}}
                <div class="col-span-6 sm:col-span-3">
                    <label class="block mb-2 text-sm font-medium">Foto</label><br>
                    @if($i->foto)
                        <img src="{{ asset('storage/'.$i->foto) }}" class="h-16 w-16 rounded-full mb-2 object-cover cursor-pointer"
                             onclick="openImageModal('{{ asset('storage/'.$i->foto) }}')">
                    @endif
                    <input type="file" name="foto" class="w-full border rounded-lg p-2.5">
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

{{-- Script --}}
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    // Preview Gambar
    function openImageModal(src) {
        document.getElementById('preview-image').src = src;
        document.getElementById('image-modal').classList.remove('hidden');
    }
    function closeImageModal() {
        document.getElementById('image-modal').classList.add('hidden');
    }

    // SweetAlert konfirmasi hapus
    document.querySelectorAll('.delete-button').forEach(button => {
        button.addEventListener('click', function() {
            const form = this.closest('form');
            Swal.fire({
                title: 'Yakin ingin menghapus?',
                text: "Data instruktur akan dihapus permanen!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Ya, Hapus!',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    form.submit();
                }
            });
        });
    });
</script>
@endsection
