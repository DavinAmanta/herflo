@extends('layout.main')
@section('content')
<div class="d-flex">
    <h1 class="text-xl sm:text-2xl font-semibold text-gray-900 mb-4">Halaman Galeri</h1>
    <button type="button" data-modal-toggle="add-galeri-modal"
        class="text-white bg-cyan-600 hover:bg-cyan-700 focus:ring-4 focus:ring-cyan-200 font-medium inline-flex items-center rounded-lg text-sm px-3 py-2 text-center sm:ml-auto">
        <svg class="-ml-1 mr-2 h-6 w-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
            <path fill-rule="evenodd"
                d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z"
                clip-rule="evenodd"></path>
        </svg>
        Tambah Galeri
    </button>
    <table class="table-fixed min-w-full divide-y divide-gray-200 shadow-sm rounded-lg overflow-hidden mt-3">
        <thead class="bg-gray-100">
            <tr>
                <th scope="col" class="p-4 text-left text-xs font-medium text-gray-500 uppercase">
                    No
                </th>
                <th scope="col" class="p-4 text-left text-xs font-medium text-gray-500 uppercase">
                    Judul
                </th>
                <th scope="col" class="p-4 text-left text-xs font-medium text-gray-500 uppercase">
                    Deskripsi
                </th>
                <th scope="col" class="p-4 text-left text-xs font-medium text-gray-500 uppercase">
                    Gambar
                </th>
                <th scope="col" class="p-4 text-center text-xs font-medium text-gray-500 uppercase">
                    Aksi
                </th>
            </tr>
        </thead>
        <tbody class="bg-white divide-y divide-gray-200">
            @foreach ($galeri as $u)
            <tr class="hover:bg-gray-100">
                <td class="p-4 whitespace-nowrap text-sm font-medium text-gray-900">
                    {{ $loop->iteration }}
                </td>
                <td class="p-4 whitespace-nowrap text-sm font-medium text-gray-900">
                    {{ $u->judul }}
                </td>
                <td class="p-4 whitespace-nowrap text-sm text-gray-700">
                    {{ $u->deskripsi }}
                </td>
                <td class="p-4 whitespace-nowrap text-sm text-gray-700">
                    <img src="{{ asset('storage/' . $u->gambar) }}" alt="{{ $u->judul }}" class="w-20 h-20 object-cover rounded">
                </td>
                <td class="p-4 whitespace-nowrap space-x-2 text-center">
                    <button type="button" data-modal-toggle="edit-galeri-modal-{{ $u->id }}"
                        class="text-white bg-cyan-600 hover:bg-cyan-700 focus:ring-4 focus:ring-cyan-200 font-medium rounded-lg text-sm inline-flex items-center px-3 py-2">
                        <svg class="mr-2 h-5 w-5" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M17.414 2.586a2 2 0 00-2.828 0L7 10.172V13h2.828l7.586-7.586a2 2 0 000-2.828z">
                            </path>
                            <path fill-rule="evenodd"
                                d="M2 6a2 2 0 012-2h4a1 1 0 010 2H4v10h10v-4a1 1 0 112 0v4a2 2 0 01-2 2H4a2 2 0 01-2-2V6z"
                                clip-rule="evenodd"></path>
                        </svg>
                        Edit
                    </button>
                    <form action="{{ route('galeri.destroy', $u->id) }}" method="POST" class="inline delete-form">
                        @csrf
                        @method('DELETE')
                        <button type="submit"
                            class="text-white bg-red-600 hover:bg-red-700 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm inline-flex items-center px-3 py-2 delete-confirm">
                            <svg class="mr-2 h-5 w-5" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd"
                                    d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"
                                    clip-rule="evenodd"></path>
                            </svg>
                            Hapus
                        </button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

<!-- Modal Tambah galeri -->
<div id="add-galeri-modal"
    class="hidden fixed top-0 left-0 right-0 z-50 w-full h-full flex items-center justify-center bg-black/50">
    <div class="bg-white rounded-lg shadow w-full max-w-2xl relative">
        <!-- Header Modal -->
        <div class="flex items-start justify-between p-5 border-b rounded-t">
            <h3 class="text-xl font-semibold">Tambah galeri</h3>
            <button type="button"
                class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center"
                data-modal-toggle="add-galeri-modal">
                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd"
                        d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                        clip-rule="evenodd"></path>
                </svg>
            </button>
        </div>
        <form action="{{ route('galeri.store') }}" method="POST" class="p-6 space-y-6" enctype="multipart/form-data">
            @csrf
            <div class="grid grid-cols-1 gap-6">
                <div>
                    <label for="judul" class="text-sm font-medium text-gray-900 block mb-2">Judul</label>
                    <input type="text" name="judul" id="judul"
                        class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-cyan-600 focus:border-cyan-600 block w-full p-2.5"
                        placeholder="Judul Gambar" required>
                </div>
                <div>
                    <label for="email" class="text-sm font-medium text-gray-900 block mb-2">Deksripsi</label>
                    <textarea name="deskripsi" id="deskripsi" cols="30" rows="10"
                        class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-cyan-600 focus:border-cyan-600 block w-full p-2.5"
                        placeholder="Deksripsi" required></textarea>
                </div>
                <div>
                    <label for="password" class="text-sm font-medium text-gray-900 block mb-2">Gambar</label>
                    <input type="file" name="gambar" id="gambar"
                        class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-cyan-600 focus:border-cyan-600 block w-full p-2.5"
                        required>
                </div>
            </div>
            <div class="flex justify-end pt-4 border-t border-gray-200">
                <button type="submit"
                    class="text-white bg-cyan-600 hover:bg-cyan-700 focus:ring-4 focus:ring-cyan-200 font-medium rounded-lg text-sm px-5 py-2.5 mt-3">
                    Simpan galeri
                </button>
            </div>
        </form>
    </div>
</div>
@foreach ($galeri as $aa)
<!-- Modal Edit -->
<div id="edit-galeri-modal-{{ $aa->id }}"
    class="hidden fixed top-0 left-0 right-0 z-50 w-full h-full flex items-center justify-center bg-black/50">
    <div class="bg-white rounded-lg shadow w-full max-w-2xl relative">
        <!-- Header Modal -->
        <div class="flex items-start justify-between p-5 border-b rounded-t">
            <h3 class="text-xl font-semibold">Edit galeri</h3>
            <button type="button"
                class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center"
                data-modal-toggle="edit-galeri-modal-{{ $aa->id }}">
                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd"
                        d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                        clip-rule="evenodd"></path>
                </svg>
            </button>
        </div>

        <!-- Form Edit -->
        <form action="{{ route('galeri.update', $aa->id) }}" method="POST" class="p-6 space-y-6" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="grid grid-cols-1 gap-6">
                <div>
                    <label for="judul-{{ $aa->id }}" class="text-sm font-medium text-gray-900 block mb-2">Judul</label>
                    <input type="text" name="judul" id="judul-{{ $aa->id }}" value="{{ $aa->judul }}"
                        class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-cyan-600 focus:border-cyan-600 block w-full p-2.5"
                        required>
                </div>
                <div>
                    <label for="deskripsi-{{ $aa->id }}"
                        class="text-sm font-medium text-gray-900 block mb-2">Deskripsi</label>
                    <textarea name="deskripsi" id="deskripsi-{{ $aa->id }}" cols="30" rows="10"
                        class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-cyan-600 focus:border-cyan-600 block w-full p-2.5"
                        required>{{ $aa->deskripsi }}</textarea>
                </div>
                <div>
                    <label for="gambar-{{ $aa->id }}"
                        class="text-sm font-medium text-gray-900 block mb-2">Gambar</label>
                    <input type="file" name="gambar" id="gambar-{{ $aa->id }}"
                        class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-cyan-600 focus:border-cyan-600 block w-full p-2.5">
                    <p class="text-xs text-gray-500 mt-1">Kosongkan jika tidak ingin mengubah gambar</p>
                </div>
                <!-- Tombol Simpan -->
                <div class="flex justify-end pt-4 border-t border-gray-200">
                    <button type="submit"
                        class="text-white bg-cyan-600 hover:bg-cyan-700 focus:ring-4 focus:ring-cyan-200 font-medium rounded-lg text-sm px-5 py-2.5 mt-3">
                        Simpan Perubahan
                    </button>
                </div>
        </form>
    </div>
</div>
@endforeach
@endsection
