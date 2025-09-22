@extends('layout.main')

@section('content')
<div class="d-flex items-center justify-between mb-4">
    <h1 class="text-xl sm:text-2xl font-semibold text-gray-900">Halaman Galeri</h1>
    <button type="button" data-modal-toggle="add-galeri-modal"
        class="text-white bg-cyan-600 hover:bg-cyan-700 font-medium inline-flex items-center rounded-lg text-sm px-3 py-2">
        Tambah Galeri
    </button>
</div>

{{-- Flash message --}}
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
            <th class="p-4 text-left text-xs font-medium text-gray-500 uppercase">Judul</th>
            <th class="p-4 text-left text-xs font-medium text-gray-500 uppercase">Gambar</th>
            <th class="p-4 text-left text-xs font-medium text-gray-500 uppercase">Deskripsi</th>
            <th class="p-4 text-center text-xs font-medium text-gray-500 uppercase">Aksi</th>
        </tr>
    </thead>
    <tbody class="bg-white divide-y divide-gray-200">
        @forelse ($galeri as $g)
        <tr class="hover:bg-gray-100">
            <td class="p-4 text-sm font-medium text-gray-900">{{ $loop->iteration }}</td>
            <td class="p-4 text-sm font-medium text-gray-900">{{ $g->judul }}</td>
            <td class="p-4 text-sm text-gray-700">
                @if($g->gambar)
                    <img src="{{ asset('storage/'.$g->gambar) }}" class="h-12 w-12 object-cover rounded cursor-pointer"
                         onclick="openImageModal('{{ asset('storage/'.$g->gambar) }}')">
                @else
                    <span class="text-gray-400">-</span>
                @endif
            </td>
            <td class="p-4 text-sm text-gray-700">{{ $g->deskripsi ?? '-' }}</td>
            <td class="p-4 space-x-2 text-center">
                <!-- Tombol Edit -->
                <button type="button" data-modal-toggle="edit-galeri-modal-{{ $g->id }}"
                    class="text-white bg-cyan-600 hover:bg-cyan-700 font-medium rounded-lg text-sm inline-flex items-center px-3 py-2">
                    Edit
                </button>
                <!-- Tombol Hapus -->
                <form action="{{ route('admin.galeri.destroy', $g->id) }}" method="POST" class="inline delete-form">
                    @csrf
                    @method('DELETE')
                    <button type="submit"
                        class="text-white bg-red-600 hover:bg-red-700 font-medium rounded-lg text-sm inline-flex items-center px-3 py-2">
                        Hapus
                    </button>
                </form>
            </td>
        </tr>
        @empty
        <tr>
            <td colspan="5" class="p-4 text-center text-gray-500">Belum ada galeri.</td>
        </tr>
        @endforelse
    </tbody>
</table>

<!-- Modal Preview Gambar -->
<div id="image-modal" class="hidden fixed inset-0 z-50 bg-black/70 flex items-center justify-center">
    <span class="absolute top-5 right-5 text-white text-3xl cursor-pointer" onclick="closeImageModal()">✕</span>
    <img id="preview-image" src="" class="max-h-[90%] max-w-[90%] rounded-lg shadow-lg">
</div>

<!-- Modal Tambah Galeri -->
<div id="add-galeri-modal" class="hidden fixed inset-0 z-50 flex items-center justify-center bg-black/50">
    <div class="bg-white rounded-lg shadow w-full max-w-2xl relative">
        <div class="flex items-start justify-between p-5 border-b rounded-t">
            <h3 class="text-xl font-semibold">Tambah Galeri</h3>
            <button type="button" data-modal-toggle="add-galeri-modal"
                class="text-gray-400 hover:bg-gray-200 hover:text-gray-900 rounded-lg p-1.5 ml-auto">✕</button>
        </div>

        <form action="{{ route('admin.galeri.store') }}" method="POST" enctype="multipart/form-data" class="p-6 space-y-6">
            @csrf
            <div class="grid grid-cols-6 gap-6">
                <div class="col-span-6 sm:col-span-3">
                    <label class="block mb-2 text-sm font-medium">Judul</label>
                    <input type="text" name="judul" value="{{ old('judul') }}" class="w-full border rounded-lg p-2.5" required>
                </div>

                <div class="col-span-6 sm:col-span-3">
                    <label class="block mb-2 text-sm font-medium">Gambar</label>
                    <input type="file" name="gambar" class="w-full border rounded-lg p-2.5" required>
                </div>

                <div class="col-span-6">
                    <label class="block mb-2 text-sm font-medium">Deskripsi</label>
                    <textarea name="deskripsi" class="w-full border rounded-lg p-2.5">{{ old('deskripsi') }}</textarea>
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

<!-- Modal Edit Galeri -->
@foreach ($galeri as $g)
<div id="edit-galeri-modal-{{ $g->id }}" class="hidden fixed inset-0 z-50 flex items-center justify-center bg-black/50">
    <div class="bg-white rounded-lg shadow w-full max-w-2xl relative">
        <div class="flex items-start justify-between p-5 border-b rounded-t">
            <h3 class="text-xl font-semibold">Edit Galeri</h3>
            <button type="button" data-modal-toggle="edit-galeri-modal-{{ $g->id }}"
                class="text-gray-400 hover:bg-gray-200 hover:text-gray-900 rounded-lg p-1.5 ml-auto">✕</button>
        </div>

        <form action="{{ route('admin.galeri.update', $g->id) }}" method="POST" enctype="multipart/form-data" class="p-6 space-y-6">
            @csrf
            @method('PUT')

            <div class="grid grid-cols-6 gap-6">
                <div class="col-span-6 sm:col-span-3">
                    <label class="block mb-2 text-sm font-medium">Judul</label>
                    <input type="text" name="judul" value="{{ old('judul', $g->judul) }}" class="w-full border rounded-lg p-2.5" required>
                </div>

                <div class="col-span-6 sm:col-span-3">
                    <label class="block mb-2 text-sm font-medium">Gambar</label><br>
                    @if($g->gambar)
                        <img src="{{ asset('storage/'.$g->gambar) }}" class="h-16 w-16 rounded mb-2 object-cover cursor-pointer"
                             onclick="openImageModal('{{ asset('storage/'.$g->gambar) }}')">
                    @endif
                    <input type="file" name="gambar" class="w-full border rounded-lg p-2.5">
                </div>

                <div class="col-span-6">
                    <label class="block mb-2 text-sm font-medium">Deskripsi</label>
                    <textarea name="deskripsi" class="w-full border rounded-lg p-2.5">{{ old('deskripsi', $g->deskripsi) }}</textarea>
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

<script>
    function openImageModal(src) {
        document.getElementById('preview-image').src = src;
        document.getElementById('image-modal').classList.remove('hidden');
    }
    function closeImageModal() {
        document.getElementById('image-modal').classList.add('hidden');
    }
</script>
@endsection
