
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ToGlow | Push Your Limits</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">
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

        /* Fade and slide animations */
        .animate-on-load {
            opacity: 0;
            transform: translateY(30px);
            transition: opacity 0.8s ease-out, transform 0.8s ease-out;
        }

        .animate-on-load.is-visible {
            opacity: 1;
            transform: translateY(0);
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

        .scale-in {
            opacity: 0;
            transform: scale(0.95);
            transition: opacity 0.8s ease-out, transform 0.8s ease-out;
        }

        .scale-in.is-visible {
            opacity: 1;
            transform: scale(1);
        }

        /* Hero section animations */
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

        /* Parallax effect for images */
        .parallax-image {
            background-attachment: fixed;
            background-size: cover;
            background-position: center;
            transition: transform 0.5s ease-out;
        }

        /* Staggered animations for grid items */
        .staggered-item {
            opacity: 0;
            transform: translateY(20px);
            transition: opacity 0.6s ease-out, transform 0.6s ease-out;
        }

        .staggered-item.is-visible {
            opacity: 1;
            transform: translateY(0);
        }

        /* Hover effects */
        .hover-scale {
            transition: transform 0.3s ease-in-out;
        }

        .hover-scale:hover {
            transform: scale(1.05);
        }

        .card-hover {
            transition: transform 0.4s ease, box-shadow 0.4s ease;
        }

        .card-hover:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.15);
        }
    </style>
</head>

<body class="bg-[#f8f4f1] text-gray-800">
<header class="bg-[#f8f4f1] fixed w-full shadow-md z-50">
        <nav class="container mx-auto flex justify-between items-center px-4 py-4 lg:py-6">
            <div class="font-bold text-2xl text-[#7d6b60] animate-on-load">ToGlow</div>
            <div class="hidden lg:flex space-x-8 text-base font-medium">
                <a href="#" class="hover:text-[#7d6b60] transition-colors animate-on-load">About Us</a>
                <a href="#" class="hover:text-[#7d6b60] transition-colors animate-on-load">Membership</a>
                <a href="#" class="hover:text-[#7d6b60] transition-colors animate-on-load">Personal Trainer</a>
                <a href="#" class="hover:text-[#7d6b60] transition-colors animate-on-load">Subject</a>
            </div>
            <div class="hidden lg:flex items-center space-x-4">
                @guest
                    <a href="{{ route('login') }}" class="btn-custom text-sm animate-on-load">Login</a>
                @else
                    <a href="{{ route('logout') }}"
                       onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                       class="text-gray-600 hover:text-red-500 transition-colors animate-on-load">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H7a3 3 0 01-3-3V7a3 3 0 013-3h3a3 3 0 013 3v1" />
                        </svg>
                    </a>
                @endguest
            </div>
            <button class="lg:hidden" id="menu-toggle">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8 text-[#7d6b60]" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                </svg>
            </button>
        </nav>
        <div class="hidden flex-col space-y-4 px-6 pb-6 bg-[#f8f4f1] border-t border-gray-200" id="mobile-menu">
            <a href="#" class="py-2 hover:bg-gray-100 rounded-lg px-4 transition-colors animate-on-load">About Us</a>
            <a href="#" class="py-2 hover:bg-gray-100 rounded-lg px-4 transition-colors animate-on-load">Membership</a>
            <a href="#" class="py-2 hover:bg-gray-100 rounded-lg px-4 transition-colors animate-on-load">Personal Trainer</a>
            <a href="#" class="py-2 hover:bg-gray-100 rounded-lg px-4 transition-colors animate-on-load">Subject</a>
            @guest
                <a href="{{ route('login') }}" class="btn-custom inline-block text-center mt-4 animate-on-load">Login</a>
            @else
                <a href="{{ route('logout') }}"
                   onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                   class="py-2 text-gray-600 hover:text-red-500 rounded-lg px-4 transition-colors animate-on-load">
                    <div class="flex items-center space-x-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H7a3 3 0 01-3-3V7a3 3 0 013-3h3a3 3 0 013 3v1" />
                        </svg>
                        <span>Logout</span>
                    </div>
                </a>
            @endguest
        </div>
    </header>

    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        @csrf
    </form>
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
                        alt="ToGlow Hero" class="w-full max-w-xl max-h-[500px] object-contain drop-shadow-2xl">
                </div>
            </div>
        </div>
    </section>

    <section class="py-16 bg-white">
        <div class="container mx-auto px-6 lg:px-16">
            <h2 class="text-center text-4xl font-bold text-[#7d6b60] mb-12 fade-in-up">About Us</h2>
            <div class="mb-10 fade-in">
                <img src="{{ asset('assets/gym_foto/download (42).jpg') }}" alt="ToGlow"
                    class="w-full h-[500px] object-cover object-top rounded-xl shadow-lg hover-scale">
            </div>
            <div class="flex flex-col-reverse lg:flex-row items-center gap-10">
                <div class="lg:w-1/2 space-y-6 text-gray-700 fade-in-up">
                    <p class="text-xl leading-relaxed">
                        <span class="font-semibold text-[#7d6b60]">ToGlow</span> adalah gym khusus wanita dengan
                        fasilitas lengkap dan privasi penuh. Kami mendukung setiap langkah perjalanan Anda untuk
                        menjadi lebih sehat, lebih kuat, dan lebih percaya diri.
                    </p>
                </div>
                <div class="lg:w-1/2 grid grid-cols-2 gap-4">
                    <img src="{{ asset('assets/gym_foto/download (44).jpg') }}" alt="ToGlow Training Area"
                        class="w-full h-48 object-cover rounded-xl shadow-lg hover-scale staggered-item">
                    <img src="{{ asset('assets/gym_foto/download (47).jpg') }}" alt="ToGlow Facilities"
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
                        alt="Membership ToGlow"
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
                            Pilih paket yang sesuai dengan kebutuhanmu dan mulailah perjalanan kebugaran bersama ToGlow.
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
                            Bugar dan Percaya Diri di ToGlow: Gym Eksklusif untuk Wanita
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
                            ToGlow Women’s Gym: Ruang Aman dan Nyaman untuk Perempuan Aktif
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
                            ToGlow Resmi Dibuka: Tempat Terbaik untuk Membangun Tubuh Sehat
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
