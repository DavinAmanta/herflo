@extends('layout.main')
@section('content')
    <div class="container mx-auto px-4 py-6">
    <h1 class="text-2xl font-bold mb-6">Dashboard Admin</h1>

    <div class="grid grid-cols-1 md:grid-cols-3 lg:grid-cols-5 gap-6">
        <!-- Total Users -->
        <div class="bg-white shadow-md rounded-lg p-5 text-center">
            <h2 class="text-lg font-semibold">Total Users</h2>
            <p class="text-3xl font-bold text-blue-600 mt-2">{{ $totalUser }}</p>
        </div>

        <!-- Total Members -->
        <div class="bg-white shadow-md rounded-lg p-5 text-center">
            <h2 class="text-lg font-semibold">Total Members</h2>
            <p class="text-3xl font-bold text-green-600 mt-2">{{ $totalMember }}</p>
        </div>

        <!-- Total Instruktur -->
        <div class="bg-white shadow-md rounded-lg p-5 text-center">
            <h2 class="text-lg font-semibold">Total Instruktur</h2>
            <p class="text-3xl font-bold text-purple-600 mt-2">{{ $totalInstruktur }}</p>
        </div>

        <!-- Total Booking -->
        <div class="bg-white shadow-md rounded-lg p-5 text-center">
            <h2 class="text-lg font-semibold">Total Booking</h2>
            <p class="text-3xl font-bold text-yellow-600 mt-2">{{ $totalBooking }}</p>
        </div>

        <!-- Pending Pendaftaran -->
        <div class="bg-white shadow-md rounded-lg p-5 text-center">
            <h2 class="text-lg font-semibold">Pending Pendaftaran</h2>
            <p class="text-3xl font-bold text-red-600 mt-2">{{ $pendingPendaftaran }}</p>
        </div>
    </div>
</div>
@endsection
