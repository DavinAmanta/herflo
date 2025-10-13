@extends('user.layout.member')
@section('konten')
<style>
    body {
        font-family: 'Poppins', sans-serif;
        overflow-x: hidden;
    }

    .btn-custom {
        background-color: #D3A796;
        color: white;
        padding: 0.75rem 2rem;
        border-radius: 50px;
        font-weight: 600;
        transition: all 0.3s ease-in-out;
    }

    .btn-custom:hover {
        background-color: #b88c7a;
        transform: translateY(-2px);
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
    }

    .card-hover {
        transition: transform 0.4s ease, box-shadow 0.4s ease;
    }

    .card-hover:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 20px rgba(0, 0, 0, 0.15);
    }

    .fade-in {
        opacity: 0;
        transform: translateY(20px);
        transition: opacity 0.8s ease-out, transform 0.8s ease-out;
    }

    .fade-in.is-visible {
        opacity: 1;
        transform: translateY(0);
    }

    .fade-in-up {
        opacity: 0;
        transform: translateY(30px);
        transition: opacity 1s ease-out, transform 1s ease-out;
    }

    .fade-in-up.is-visible {
        opacity: 1;
        transform: translateY(0);
    }

    .staggered-item {
        opacity: 0;
        transform: translateY(20px);
        transition: opacity 0.6s ease-out, transform 0.6s ease-out;
    }

    .staggered-item.is-visible {
        opacity: 1;
        transform: translateY(0);
    }

    .hero-text {
        opacity: 0;
        transform: translateX(-50px);
        animation: fadeInFromLeft 1s ease-out 0.3s forwards;
    }

    .hero-image {
        opacity: 0;
        transform: translateX(50px);
        animation: fadeInFromRight 1s ease-out 0.5s forwards;
    }

    @keyframes fadeInFromLeft {
        0% {
            opacity: 0;
            transform: translateX(-50px);
        }

        100% {
            opacity: 1;
            transform: translateX(0);
        }
    }

    @keyframes fadeInFromRight {
        0% {
            opacity: 0;
            transform: translateX(50px);
        }

        100% {
            opacity: 1;
            transform: translateX(0);
        }
    }

    .trainer-card {
        background: linear-gradient(135deg, #ffffff 0%, #fdf9f7 100%);
        border-radius: 20px;
        overflow: hidden;
        position: relative;
    }

    .trainer-image {
        height: 300px;
        object-fit: cover;
        transition: transform 0.5s ease;
    }

    .trainer-card:hover .trainer-image {
        transform: scale(1.05);
    }

    .specialty-badge {
        background-color: #D3A796;
        color: white;
        padding: 0.25rem 0.75rem;
        border-radius: 20px;
        font-size: 0.75rem;
        font-weight: 500;
    }

    .stats-item {
        text-align: center;
        padding: 1rem;
    }

    .stats-number {
        font-size: 2.5rem;
        font-weight: 700;
        color: #D3A796;
    }

    .stats-label {
        font-size: 0.875rem;
        color: #7d6b60;
        font-weight: 500;
    }

</style>
</head>

<body class="bg-[#f8f4f1] text-gray-800">
    <section class="pt-28 lg:pt-40 pb-20 bg-gradient-to-br from-white via-[#fdf9f7] to-[#f8f4f1]">
        <div class="container mx-auto px-6 lg:px-16">
            <div class="grid grid-cols-1 lg:grid-cols-2 items-center gap-12">
                <div class="space-y-6 hero-text">
                    <h1 class="text-4xl lg:text-5xl font-extrabold text-[#4a3f35] leading-tight">
                        Temukan <span class="text-[#D3A796]">Trainer Profesional</span> untuk Perjalanan Kebugaranmu
                    </h1>
                    <p class="text-[#3a2d28] text-lg leading-relaxed">
                        Di ToGlow, kami memiliki tim trainer berkualitas dengan sertifikasi internasional dan pengalaman
                        bertahun-tahun dalam membimbing wanita mencapai tujuan kebugaran mereka. Setiap trainer kami
                        memahami kebutuhan unik tubuh perempuan dan siap memberikan pendekatan personal untuk hasil
                        maksimal.
                    </p>
                    <div class="flex flex-wrap gap-4">
                        <a href="#trainers" class="px-8 py-3 btn-custom hover:scale-105 transition">Lihat Trainer</a>
                        <a href="#"
                            class="px-8 py-3 border border-[#7d6b60] text-[#7d6b60] rounded-full font-semibold hover:bg-[#7d6b60] hover:text-white transition">Konsultasi
                            Gratis</a>
                    </div>
                </div>
                <div class="flex justify-center hero-image">
                    <img src="{{ asset('assets/gym_foto/2374c51394a8ddfe6ddf6627e4b88362-removebg-preview (1).png') }}"
                        alt="ToGlow Trainer" class="w-full max-w-xl max-h-[500px] object-contain drop-shadow-2xl">
                </div>
            </div>
        </div>
    </section>

    <!-- Stats Section -->
    <section class="py-12 bg-white">
        <div class="container mx-auto px-6 lg:px-16">
            <div class="grid grid-cols-2 md:grid-cols-4 gap-6">
                <div class="stats-item fade-in">
                    <div class="stats-number">15+</div>
                    <div class="stats-label">Trainer Profesional</div>
                </div>
                <div class="stats-item fade-in">
                    <div class="stats-number">500+</div>
                    <div class="stats-label">Klien Puas</div>
                </div>
                <div class="stats-item fade-in">
                    <div class="stats-number">98%</div>
                    <div class="stats-label">Tingkat Kepuasan</div>
                </div>
                <div class="stats-item fade-in">
                    <div class="stats-number">10+</div>
                    <div class="stats-label">Tahun Pengalaman</div>
                </div>
            </div>
        </div>
    </section>

    <!-- Why Choose Our Trainers -->
    <section class="py-16 bg-[#f8f4f1]">
        <div class="container mx-auto px-6 lg:px-16">
            <div class="text-center mb-16 fade-in-up">
                <h2 class="text-4xl font-bold text-[#7d6b60] mb-4">Mengapa Memilih Trainer ToGlow?</h2>
                <p class="text-lg text-gray-600 max-w-3xl mx-auto">
                    Trainer kami tidak hanya ahli dalam bidang kebugaran, tetapi juga memahami psikologi dan kebutuhan
                    khusus wanita Indonesia
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
                <div class="bg-white p-6 rounded-2xl shadow-lg text-center card-hover staggered-item">
                    <div class="w-16 h-16 bg-[#f8f4f1] rounded-full flex items-center justify-center mx-auto mb-4">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8 text-[#D3A796]" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-[#7d6b60] mb-3">Sertifikasi Internasional</h3>
                    <p class="text-gray-600">Semua trainer memiliki sertifikasi dari lembaga terkemuka seperti ACE,
                        NASM, dan ISSA</p>
                </div>

                <div class="bg-white p-6 rounded-2xl shadow-lg text-center card-hover staggered-item">
                    <div class="w-16 h-16 bg-[#f8f4f1] rounded-full flex items-center justify-center mx-auto mb-4">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8 text-[#D3A796]" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197m13.5-9a2.5 2.5 0 11-5 0 2.5 2.5 0 015 0z" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-[#7d6b60] mb-3">Pendekatan Personal</h3>
                    <p class="text-gray-600">Program latihan disesuaikan dengan tujuan, kemampuan, dan kondisi kesehatan
                        masing-masing klien</p>
                </div>

                <div class="bg-white p-6 rounded-2xl shadow-lg text-center card-hover staggered-item">
                    <div class="w-16 h-16 bg-[#f8f4f1] rounded-full flex items-center justify-center mx-auto mb-4">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8 text-[#D3A796]" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M13 10V3L4 14h7v7l9-11h-7z" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-[#7d6b60] mb-3">Hasil Terbukti</h3>
                    <p class="text-gray-600">Ribuan klien telah mencapai target berat badan, kekuatan, dan kesehatan
                        mereka</p>
                </div>

                <div class="bg-white p-6 rounded-2xl shadow-lg text-center card-hover staggered-item">
                    <div class="w-16 h-16 bg-[#f8f4f1] rounded-full flex items-center justify-center mx-auto mb-4">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8 text-[#D3A796]" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M14 10h4.764a2 2 0 011.789 2.894l-3.5 7A2 2 0 0115.263 21h-4.017c-.163 0-.326-.02-.485-.06L7 20m7-10V5a2 2 0 00-2-2h-.095c-.5 0-.905.405-.905.905 0 .714-.211 1.412-.608 2.006L7 11v9m7-10h-2M7 20H5a2 2 0 01-2-2v-6a2 2 0 012-2h2.5" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-[#7d6b60] mb-3">Support Penuh</h3>
                    <p class="text-gray-600">Dukungan nutrisi, motivasi, dan monitoring progress secara berkala</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Trainers Section -->
    <section id="trainers" class="py-16 bg-gray-50">
        <div class="container mx-auto px-6 lg:px-16">
            <!-- Section Header -->
            <div class="text-center mb-12 fade-in-up">
                <h2 class="text-3xl md:text-4xl font-bold text-[#7d6b60] mb-4">Meet Our Professional Trainers</h2>
                <p class="text-base md:text-lg text-gray-600 max-w-2xl mx-auto">
                    Tim trainer berpengalaman siap membimbing Anda mencapai tujuan kebugaran dengan metode yang aman dan
                    efektif.
                </p>
            </div>

            <!-- Trainers Grid -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 md:gap-8">
                @foreach($instrukturs as $instruktur)
                <div
                    class="trainer-card bg-white rounded-lg shadow-md hover:shadow-xl transition-shadow duration-300 staggered-item">
                    <!-- Trainer Image -->
                    <div class="overflow-hidden rounded-t-lg flex items-center justify-center bg-gray-100">
    <img src="{{ $instruktur->foto 
            ? asset('uploads/instrukturs/' . $instruktur->foto) 
            : asset('assets/gym_foto/placeholder.jpg') }}" 
        alt="{{ $instruktur->user->name }}"
        class="w-full max-h-64 object-contain transition-transform duration-300 hover:scale-105">
</div>

                    <!-- Trainer Details -->
                    <div class="p-6">
                        <div class="flex justify-between items-start mb-4">
                            <div>
                                <h3 class="text-xl font-semibold text-[#7d6b60]">
                                    {{ $instruktur->user->name }}
                                </h3>
                                <p class="text-sm text-gray-500">Fitness Coach</p>
                            </div>
                            <div class="flex space-x-2">
                                <span
                                    class="specialty-badge bg-[#D3A796] text-white text-xs font-medium px-2 py-1 rounded">
                                    General Fitness
                                </span>
                            </div>
                        </div>

                        <!-- Trainer Info -->
                        <div class="text-sm text-gray-600 space-y-2 mb-4">
                            <p><span class="font-medium">Kontak:</span> {{ $instruktur->no_hp ?? 'Tidak tersedia' }}</p>
                            <p><span class="font-medium">Alamat:</span> {{ $instruktur->alamat ?? 'Tidak tersedia' }}
                            </p>
                            <p><span class="font-medium">Biaya:</span> Rp
                                {{ number_format($instruktur->biaya ?? 0, 2, ',', '.') }} / sesi</p>
                        </div>
                        <!-- Action Button -->
                        <a href="{{ route('member.pilih_jadwal', $instruktur->id) }}"
                            class="w-full block text-center py-2 bg-[#7d6b60] text-white text-sm font-medium rounded-md hover:bg-[#D3A796] transition-colors duration-300">
                            Pilih Trainer
                        </a>
                    </div>
                </div>
                @endforeach
            </div>

        </div>
    </section>

    <!-- CTA Section -->
    <section class="py-16 bg-gradient-to-r from-[#D3A796] to-[#C5A08A] text-white">
        <div class="container mx-auto px-6 lg:px-16 text-center fade-in-up">
            <h2 class="text-3xl font-bold mb-6">Siap Memulai Perjalanan Kebugaran dengan Trainer Profesional?</h2>
            <p class="text-lg mb-8 max-w-2xl mx-auto">
                Jadwalkan sesi konsultasi gratis dengan trainer pilihan Anda dan dapatkan program latihan personal yang
                sesuai dengan kebutuhan Anda.
            </p>
            <div class="flex flex-wrap justify-center gap-4">
                <a href="#"
                    class="px-8 py-3 bg-white text-[#7d6b60] rounded-full font-semibold hover:bg-[#f8f4f1] transition">Konsultasi
                    Gratis</a>
                <a href="#"
                    class="px-8 py-3 border border-white text-white rounded-full font-semibold hover:bg-white hover:text-[#7d6b60] transition">Lihat
                    Jadwal</a>
            </div>
        </div>
    </section>
</body>

@endsection
