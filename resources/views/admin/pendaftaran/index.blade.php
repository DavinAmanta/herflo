@extends('layout.main')

@section('content')
<h1 class="text-2xl font-bold mb-6">Daftar Pendaftaran Member</h1>

<table class="w-full table-auto border-collapse border border-gray-300">
    <thead>
        <tr class="bg-gray-200">
            <th class="border px-4 py-2">No</th>
            <th class="border px-4 py-2">Nama</th>
            <th class="border px-4 py-2">Email</th>
            <th class="border px-4 py-2">Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach($members as $member)
        <tr>
            <td class="border px-4 py-2">{{ $loop->iteration }}</td>
            <td class="border px-4 py-2">{{ $member->name }}</td>
            <td class="border px-4 py-2">{{ $member->email }}</td>
            <td class="border px-4 py-2 space-x-2">
                <a href="{{ route('pendaftaran.approve', $member->id) }}" class="px-2 py-1 bg-green-500 text-white rounded">Setuju</a>
                <a href="{{ route('pendaftaran.reject', $member->id) }}" class="px-2 py-1 bg-red-500 text-white rounded">Tolak</a>
                <a href="{{ route('pendaftaran.edit', $member->id) }}" class="px-2 py-1 bg-blue-500 text-white rounded">Edit</a>
                <form action="{{ route('pendaftaran.destroy', $member->id) }}" method="POST" class="inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="px-2 py-1 bg-gray-700 text-white rounded">Hapus</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
