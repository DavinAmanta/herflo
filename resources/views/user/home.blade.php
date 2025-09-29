@extends('user.layout.member')
@section('konten')
    <section class="bg-gradient-to-r from-white via-[#fdf9f7] to-[#f8f4f1] pt-28 lg:pt-32">
        <div class="container mx-auto px-6 lg:px-16">
            <div class="grid grid-cols-1 lg:grid-cols-2 items-center gap-12">
                <div class="space-y-6 hero-text">
                    <h1 class="text-4xl lg:text-5xl font-extrabold text-[#4a3f35] leading-tight">
                        Push Your <br>Limits with Us
                    </h1>
                    <p class="text-[#3a2d28] text-lg leading-relaxed">
                        Gym khusus wanita modern dengan fasilitas lengkap dan suasana nyaman.
                        Tingkatkan kekuatan, kesehatan, dan kepercayaan diri bersama kami.
                    </p>
                    <a href="#" class="inline-block px-8 py-3 btn-custom hover-scale">Join Now</a>
                    <div class="flex flex-wrap gap-2 text-sm pt-4">
                        <span class="bg-white border border-[#D3A796] text-[#4a3f35] px-4 py-1.5 rounded-full shadow-md hover-scale">Strength</span>
                        <span class="bg-white border border-[#D3A796] text-[#4a3f35] px-4 py-1.5 rounded-full shadow-md hover-scale">Endurance</span>
                        <span class="bg-white border border-[#D3A796] text-[#4a3f35] px-4 py-1.5 rounded-full shadow-md hover-scale">Workout</span>
                        <span class="bg-white border border-[#D3A796] text-[#4a3f35] px-4 py-1.5 rounded-full shadow-md hover-scale">Weightlifting</span>
                    </div>
                </div>
                <div class="flex justify-center hero-image">
                    <img src="{{ asset('assets/gym_foto/10fe3850984220be97243e714da1f13e-removebg-preview.png') }}"
                        alt="HerFlo Hero" class="w-full max-w-xl max-h-[500px] object-contain drop-shadow-2xl">
                </div>
            </div>
        </div>
    </section>

    <section class="py-16 bg-white">
        <div class="container mx-auto px-6 lg:px-16">
            <h2 class="text-center text-4xl font-bold text-[#7d6b60] mb-12 fade-in-up">About Us</h2>
            <div class="mb-10 fade-in">
                <img src="{{ asset('assets/gym_foto/download (42).jpg') }}" alt="HerFlo Gym"
                    class="w-full h-[500px] object-cover object-top rounded-xl shadow-lg hover-scale">
            </div>
            <div class="flex flex-col-reverse lg:flex-row items-center gap-10">
                <div class="lg:w-1/2 space-y-6 text-gray-700 fade-in-up">
                    <p class="text-xl leading-relaxed">
                        <span class="font-semibold text-[#7d6b60]">HerFlo</span> adalah gym khusus wanita dengan
                        fasilitas lengkap dan privasi penuh. Kami mendukung setiap langkah perjalanan Anda untuk
                        menjadi lebih sehat, lebih kuat, dan lebih percaya diri.
                    </p>
                </div>
                <div class="lg:w-1/2 grid grid-cols-2 gap-4">
                    <img src="{{ asset('assets/gym_foto/download (44).jpg') }}" alt="HerFlo Training Area"
                        class="w-full h-48 object-cover rounded-xl shadow-lg hover-scale staggered-item">
                    <img src="{{ asset('assets/gym_foto/download (47).jpg') }}" alt="HerFlo Facilities"
                        class="w-full h-48 object-cover rounded-xl shadow-lg hover-scale staggered-item">
                </div>
            </div>
        </div>
    </section>

    <section class="py-16 bg-[#f8f4f1]">
        <div class="container mx-auto px-6 lg:px-16">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-10 items-center">
                <div class="fade-in">
                    <img src="{{ asset('assets/gym_foto/Fitness Model Ellie Gonsalves Shares Secret To Her Amazing Physique.jpg') }}"
                        alt="Membership HerFlo"
                        class="w-full h-[400px] rounded-2xl shadow-lg object-cover hover-scale">
                </div>
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 items-center">
                    <div class="flex flex-col gap-4">
                        <img src="{{ asset('assets/gym_foto/download (43).jpg') }}" alt="Member Workout"
                            class="h-48 w-full rounded-xl shadow-lg object-cover hover-scale staggered-item">
                        <img src="{{ asset('assets/gym_foto/Ascend Pilates - Classical Pilates San Diego.jpg') }}"
                            alt="Pilates Training"
                            class="h-48 w-full rounded-xl shadow-lg object-cover hover-scale staggered-item">
                    </div>
                    <div class="text-center lg:text-left flex flex-col justify-center fade-in-up">
                        <h2 class="text-3xl font-bold text-[#7d6b60] mb-4">
                            Membership mulai dari 250K/bulan
                        </h2>
                        <p class="text-gray-700 mb-6">
                            Pilih paket yang sesuai dengan kebutuhanmu dan mulailah perjalanan kebugaran bersama HerFlo.
                        </p>
                        <a href="#" class="inline-block px-6 py-3 btn-custom hover-scale">Lihat Paket Membership</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="py-16 bg-white">
        <div class="container mx-auto px-6 lg:px-16">
            <h2 class="text-center text-4xl font-bold text-[#7d6b60] mb-12 fade-in-up">Our Service</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
                <div class="overflow-hidden rounded-xl shadow-lg card-hover staggered-item">
                    <img src="{{ asset('assets/gym_foto/download (44).jpg') }}"
                        class="w-full h-96 object-cover hover-scale">
                </div>
                <div class="overflow-hidden rounded-xl shadow-lg card-hover staggered-item">
                    <img src="{{ asset('assets/gym_foto/More than just a workout - TPC is a community_.jpg') }}"
                        class="w-full h-96 object-cover hover-scale">
                </div>
                <div class="overflow-hidden rounded-xl shadow-lg card-hover staggered-item">
                    <img src="{{ asset('assets/gym_foto/House Gym.jpg') }}"
                        class="w-full h-96 object-cover hover-scale">
                </div>
                <div class="overflow-hidden rounded-xl shadow-lg card-hover staggered-item">
                    <img src="{{ asset('assets/gym_foto/(1) Instagram_files/491460037_17846392308453354_8990374039995515462_n.jpg') }}"
                        class="w-full h-96 object-cover hover-scale">
                </div>
            </div>
        </div>
    </section>

    <section class="py-20 bg-[#f8f4f1]">
        <div class="container mx-auto px-6 lg:px-16">
            <h2 class="text-center text-4xl font-extrabold text-[#7d6b60] mb-14 fade-in-up">Latest Articles</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-10">
                <div class="bg-white rounded-2xl shadow-md overflow-hidden card-hover staggered-item">
                    <div class="overflow-hidden">
                        <img src="{{ asset('assets/gym_foto/(1) Instagram_files/514742250_17856304311453354_8640657566842467816_n.jpg') }}"
                            class="w-full h-56 object-cover hover-scale">
                    </div>
                    <div class="p-6 space-y-3">
                        <span class="text-sm text-gray-500 block">10-10-2025</span>
                        <span class="text-xs uppercase tracking-wider text-[#C5A08A] font-semibold">Lifestyle</span>
                        <h3 class="font-bold text-xl text-[#7d6b60] leading-snug">
                            Bugar dan Percaya Diri di Herflo: Gym Eksklusif untuk Wanita
                        </h3>
                        <a href="#" class="inline-block mt-3 text-sm font-semibold text-[#C5A08A] hover:text-[#7d6b60] transition">
                            Read More →
                        </a>
                    </div>
                </div>
                <div class="bg-white rounded-2xl shadow-md overflow-hidden card-hover staggered-item">
                    <div class="overflow-hidden">
                        <img src="{{ asset('assets/gym_foto/(1) Instagram_files/491464294_17846180673453354_906816609803980329_n.jpg') }}"
                            class="w-full h-56 object-cover hover-scale">
                    </div>
                    <div class="p-6 space-y-3">
                        <span class="text-sm text-gray-500 block">10-10-2025</span>
                        <span class="text-xs uppercase tracking-wider text-[#C5A08A] font-semibold">Wellness</span>
                        <h3 class="font-bold text-xl text-[#7d6b60] leading-snug">
                            Herflo Women’s Gym: Ruang Aman dan Nyaman untuk Perempuan Aktif
                        </h3>
                        <a href="#" class="inline-block mt-3 text-sm font-semibold text-[#C5A08A] hover:text-[#7d6b60] transition">
                            Read More →
                        </a>
                    </div>
                </div>
                <div class="bg-white rounded-2xl shadow-md overflow-hidden card-hover staggered-item">
                    <div class="overflow-hidden">
                        <img src="{{ asset('assets/gym_foto/(1) Instagram_files/491460037_17846392308453354_8990374039995515462_n.jpg') }}"
                            class="w-full h-56 object-cover hover-scale">
                    </div>
                    <div class="p-6 space-y-3">
                        <span class="text-sm text-gray-500 block">10-10-2025</span>
                        <span class="text-xs uppercase tracking-wider text-[#C5A08A] font-semibold">Fitness</span>
                        <h3 class="font-bold text-xl text-[#7d6b60] leading-snug">
                            Herflo Gym Resmi Dibuka: Tempat Terbaik untuk Membangun Tubuh Sehat
                        </h3>
                        <a href="#" class="inline-block mt-3 text-sm font-semibold text-[#C5A08A] hover:text-[#7d6b60] transition">
                            Read More →
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection