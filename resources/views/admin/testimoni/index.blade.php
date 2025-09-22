@extends('layout.main')

@section('content')
<div class="d-flex items-center justify-between mb-4">
    <h1 class="text-xl sm:text-2xl font-semibold text-gray-900">Kelola Testimoni Member</h1>
</div>

{{-- Pesan sukses / error --}}
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
            <th class="p-4 text-left text-xs font-medium text-gray-500 uppercase">Member</th>
            <th class="p-4 text-left text-xs font-medium text-gray-500 uppercase">Deskripsi</th>
            <th class="p-4 text-left text-xs font-medium text-gray-500 uppercase">Tanggal</th>
            <th class="p-4 text-center text-xs font-medium text-gray-500 uppercase">Aksi</th>
        </tr>
    </thead>
    <tbody class="bg-white divide-y divide-gray-200">
        @forelse ($testimoni as $t)
        <tr class="hover:bg-gray-100">
            <td class="p-4 text-sm font-medium text-gray-900">{{ $loop->iteration }}</td>
            <td class="p-4 text-sm font-medium text-gray-900">{{ $t->member->user->name ?? $t->member->user->email }}</td>
            <td class="p-4 text-sm text-gray-700">{{ $t->deskripsi }}</td>
            <td class="p-4 text-sm text-gray-700">{{ $t->tanggal }}</td>
            <td class="p-4 text-center">
                <!-- Tombol Hapus -->
                <form action="{{ route('admin.testimoni.destroy', $t->id) }}" method="POST" class="inline delete-form">
                    @csrf
                    @method('DELETE')
                    <button type="submit"
                        class="text-white bg-red-600 hover:bg-red-700 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm inline-flex items-center px-3 py-2"
                        onclick="return confirm('Yakin ingin menghapus testimoni ini?')">
                        Hapus
                    </button>
                </form>
            </td>
        </tr>
        @empty
        <tr>
            <td colspan="5" class="p-4 text-center text-gray-500">Belum ada testimoni.</td>
        </tr>
        @endforelse
    </tbody>
</table>
@endsection
