@extends('layout.main')

@section('content')
<div class="d-flex items-center justify-between mb-4">
    <h1 class="text-xl sm:text-2xl font-semibold text-gray-900">Halaman User</h1>
    <button type="button" data-modal-toggle="add-user-modal"
        class="text-white bg-cyan-600 hover:bg-cyan-700 focus:ring-4 focus:ring-cyan-200 font-medium inline-flex items-center rounded-lg text-sm px-3 py-2 mt-2">
        <svg class="-ml-1 mr-2 h-6 w-6" fill="currentColor" viewBox="0 0 20 20">
            <path fill-rule="evenodd"
                d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z"
                clip-rule="evenodd"></path>
        </svg>
        Tambah User
    </button>
</div>

<table class="table-fixed min-w-full divide-y divide-gray-200 shadow-sm rounded-lg overflow-hidden mt-3">
    <thead class="bg-gray-100">
        <tr>
            <th class="p-4 text-left text-xs font-medium text-gray-500 uppercase">No</th>
            <th class="p-4 text-left text-xs font-medium text-gray-500 uppercase">Nama</th>
            <th class="p-4 text-left text-xs font-medium text-gray-500 uppercase">Email</th>
            <th class="p-4 text-left text-xs font-medium text-gray-500 uppercase">Role</th>
            <th class="p-4 text-center text-xs font-medium text-gray-500 uppercase">Aksi</th>
        </tr>
    </thead>
    <tbody class="bg-white divide-y divide-gray-200">
        @forelse ($users as $u)
        <tr class="hover:bg-gray-100">
            <td class="p-4 text-sm font-medium text-gray-900">{{ $loop->iteration }}</td>
            <td class="p-4 text-sm font-medium text-gray-900">{{ $u->name }}</td>
            <td class="p-4 text-sm text-gray-700">{{ $u->email }}</td>
            <td class="p-4 text-sm text-gray-700 capitalize">{{ $u->role }}</td>
            <td class="p-4 space-x-2 text-center">
                <!-- Tombol Edit -->
                <button type="button" data-modal-toggle="edit-user-modal-{{ $u->id }}"
                    class="text-white bg-cyan-600 hover:bg-cyan-700 focus:ring-4 focus:ring-cyan-200 font-medium rounded-lg text-sm inline-flex items-center px-3 py-2">
                    Edit
                </button>
                <!-- Tombol Hapus -->
                <form action="{{ route('admin.users.destroy', $u->id) }}" method="POST" class="inline delete-form">
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
            <td colspan="5" class="p-4 text-center text-gray-500">Belum ada data user.</td>
        </tr>
        @endforelse
    </tbody>
</table>

<!-- Modal Tambah User -->
<div id="add-user-modal"
    class="hidden fixed inset-0 z-50 flex items-center justify-center bg-black/50">
    <div class="bg-white rounded-lg shadow w-full max-w-2xl relative">
        <div class="flex items-start justify-between p-5 border-b rounded-t">
            <h3 class="text-xl font-semibold">Tambah User</h3>
            <button type="button" data-modal-toggle="add-user-modal"
                class="text-gray-400 hover:bg-gray-200 hover:text-gray-900 rounded-lg p-1.5 ml-auto">✕</button>
        </div>

        <form action="{{ route('admin.users.store') }}" method="POST" class="p-6 space-y-6">
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
                    <label class="block mb-2 text-sm font-medium">Role</label>
                    <select name="role" class="w-full border rounded-lg p-2.5" required>
                        <option value="">-- Pilih Role --</option>
                        <option value="user" {{ old('role')=='user' ? 'selected':'' }}>User</option>
                        <option value="admin" {{ old('role')=='admin' ? 'selected':'' }}>Admin</option>
                    </select>
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

<!-- Modal Edit User -->
@foreach ($users as $u)
<div id="edit-user-modal-{{ $u->id }}"
    class="hidden fixed inset-0 z-50 flex items-center justify-center bg-black/50">
    <div class="bg-white rounded-lg shadow w-full max-w-2xl relative">
        <div class="flex items-start justify-between p-5 border-b rounded-t">
            <h3 class="text-xl font-semibold">Edit User</h3>
            <button type="button" data-modal-toggle="edit-user-modal-{{ $u->id }}"
                class="text-gray-400 hover:bg-gray-200 hover:text-gray-900 rounded-lg p-1.5 ml-auto">✕</button>
        </div>

        <form action="{{ route('admin.users.update', $u->id) }}" method="POST" class="p-6 space-y-6">
            @csrf
            @method('PUT')
            <div class="grid grid-cols-6 gap-6">
                <div class="col-span-6 sm:col-span-3">
                    <label class="block mb-2 text-sm font-medium">Nama</label>
                    <input type="text" name="name" value="{{ old('name', $u->name) }}" class="w-full border rounded-lg p-2.5" required>
                </div>

                <div class="col-span-6 sm:col-span-3">
                    <label class="block mb-2 text-sm font-medium">Email</label>
                    <input type="email" name="email" value="{{ old('email', $u->email) }}" class="w-full border rounded-lg p-2.5" required>
                </div>

                <div class="col-span-6 sm:col-span-3">
                    <label class="block mb-2 text-sm font-medium">Password (Opsional)</label>
                    <input type="password" name="password" class="w-full border rounded-lg p-2.5" placeholder="Biarkan kosong jika tidak diubah">
                </div>

                <div class="col-span-6 sm:col-span-3">
                    <label class="block mb-2 text-sm font-medium">Role</label>
                    <select name="role" class="w-full border rounded-lg p-2.5" required>
                        <option value="user" {{ $u->role=='user' ? 'selected':'' }}>User</option>
                        <option value="admin" {{ $u->role=='admin' ? 'selected':'' }}>Admin</option>
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

@endsection
