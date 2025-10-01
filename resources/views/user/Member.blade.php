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

</style>
</head>

<body class="bg-[#f8f4f1] text-gray-800">

    <section class="pt-28 lg:pt-40 pb-16">
        <div class="container mx-auto px-6 lg:px-16">
            <div class="grid grid-cols-1 lg:grid-cols-2 items-center gap-12">
                <div class="space-y-6 hero-text">
                    <h1 class="text-4xl lg:text-5xl font-extrabold text-[#4a3f35] leading-tight">
                        Mulai Perjalanan <br><span class="text-[#D3A796]">Kebugaranmu</span> Hari Ini
                    </h1>
                    <p class="text-[#3a2d28] text-lg leading-relaxed">
                        Rasakan pengalaman gym eksklusif untuk wanita dengan berbagai pilihan paket membership yang
                        sesuai dengan kebutuhan dan gaya hidupmu. Mulai dari single visit hingga paket bulanan dengan
                        harga terjangkau.
                    </p>
                    <div class="flex flex-wrap gap-4">
                        <a href="#membership" class="px-8 py-3 btn-custom hover:scale-105 transition">Lihat Paket</a>
                        <a href="#"
                            class="px-8 py-3 border border-[#7d6b60] text-[#7d6b60] rounded-full font-semibold hover:bg-[#7d6b60] hover:text-white transition">Free
                            Trial</a>
                    </div>
                    <div class="flex items-center pt-4">
                        <div class="flex -space-x-2">
                            <div
                                class="w-10 h-10 rounded-full bg-[#D3A796] border-2 border-white flex items-center justify-center text-white font-bold">
                                A</div>
                            <div
                                class="w-10 h-10 rounded-full bg-[#C5A08A] border-2 border-white flex items-center justify-center text-white font-bold">
                                S</div>
                            <div
                                class="w-10 h-10 rounded-full bg-[#7d6b60] border-2 border-white flex items-center justify-center text-white font-bold">
                                R</div>
                        </div>
                        <div class="ml-4">
                            <p class="text-sm font-semibold text-[#4a3f35]">+500 member aktif</p>
                            <p class="text-xs text-gray-600">Bergabung dengan komunitas wanita sehat Indonesia</p>
                        </div>
                    </div>
                </div>
                <div class="flex justify-center hero-image">
                    <img src="{{ asset('assets/gym_foto/2374c51394a8ddfe6ddf6627e4b88362-removebg-preview (1).png') }}"
                        alt="HerFlo Membership" class="w-full max-w-xl max-h-[500px] object-contain drop-shadow-2xl">
                </div>
            </div>
        </div>
    </section>

    <!-- Membership Packages -->
    <section id="membership" class="py-16 bg-white">
        <div class="container mx-auto px-6 lg:px-16">
            <div class="text-center mb-16 fade-in-up">
                <h2 class="text-4xl font-bold text-[#7d6b60] mb-4">Pilih Paket Keanggotaanmu</h2>
                <p class="text-lg text-gray-600 max-w-2xl mx-auto">
                    Semua paket memberikan akses penuh ke fasilitas HerFlo. Pilih yang paling sesuai dengan kebutuhan
                    dan budgetmu.
                </p>
            </div>

            <!-- Personal Plans -->
            <div class="mb-16 fade-in-up">
                <h3 class="text-3xl font-semibold text-[#4a3f35] mb-2 text-center">Your Flo Plan (Personal)</h3>
                <p class="text-gray-600 text-center mb-10">Paket personal untuk kebugaran pribadimu</p>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                    <!-- Day Flo -->
                    <div
                        class="bg-white p-8 rounded-2xl shadow-lg border-t-4 border-[#C5A08A] card-hover text-center space-y-6 staggered-item">
                        <div class="font-bold text-2xl text-[#7d6b60]">Day Flo</div>
                        <div class="text-sm text-gray-500 uppercase tracking-wider">Single Visit</div>
                        <div class="text-5xl font-extrabold text-[#D3A796]">IDR 30K</div>
                        <p class="text-gray-600">Drop in and flo for a day without commitment</p>
                        <ul class="space-y-3 text-sm text-gray-600 text-left">
                            <li class="flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-green-500 mr-2"
                                    viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd"
                                        d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                        clip-rule="evenodd" />
                                </svg>
                                Akses 1 hari penuh
                            </li>
                            <li class="flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-green-500 mr-2"
                                    viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd"
                                        d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                        clip-rule="evenodd" />
                                </svg>
                                Semua fasilitas gym
                            </li>
                            <li class="flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-green-500 mr-2"
                                    viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd"
                                        d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                        clip-rule="evenodd" />
                                </svg>
                                Free locker
                            </li>
                        </ul>
                        <a href="{{ route('daftar.create') }}" class="block w-full text-center py-3 px-6 mt-4 text-base font-semibold 
          bg-[#7d6b60] text-white rounded-xl shadow-md 
          hover:bg-[#6c5c52] hover:shadow-lg 
          focus:outline-none focus:ring-2 focus:ring-[#7d6b60] focus:ring-offset-2 
          transition duration-200 ease-in-out">
                            Pilih Sekarang
                        </a>

                    </div>

                    <!-- Monthly Flo -->
                    <div
                        class="bg-white p-8 rounded-2xl shadow-2xl border-t-4 border-[#7d6b60] card-hover text-center space-y-6 staggered-item relative">
                        <span
                            class="absolute top-0 right-0 -mt-4 -mr-4 bg-red-500 text-white text-sm font-bold px-4 py-2 rounded-full shadow-lg rotate-12">Populer</span>
                        <div class="font-bold text-2xl text-[#7d6b60]">Monthly Flo</div>
                        <div class="text-sm text-gray-500 uppercase tracking-wider">Monthly Membership</div>
                        <div class="text-5xl font-extrabold text-[#D3A796]">IDR 250K</div>
                        <p class="text-gray-600">Unlimited access for a full month of flo</p>
                        <ul class="space-y-3 text-sm text-gray-600 text-left">
                            <li class="flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-green-500 mr-2"
                                    viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd"
                                        d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                        clip-rule="evenodd" />
                                </svg>
                                Akses 1 bulan penuh
                            </li>
                            <li class="flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-green-500 mr-2"
                                    viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd"
                                        d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                        clip-rule="evenodd" />
                                </svg>
                                Semua fasilitas gym
                            </li>
                            <li class="flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-green-500 mr-2"
                                    viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd"
                                        d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                        clip-rule="evenodd" />
                                </svg>
                                Free locker & towel
                            </li>
                            <li class="flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-green-500 mr-2"
                                    viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd"
                                        d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                        clip-rule="evenodd" />
                                </svg>
                                1 sesi konsultasi gratis
                            </li>
                        </ul>
                        <a href="{{ route('daftar.create') }}" class="block w-full text-center py-3 px-6 mt-4 text-base font-semibold 
          bg-[#7d6b60] text-white rounded-xl shadow-md 
          hover:bg-[#6c5c52] hover:shadow-lg 
          focus:outline-none focus:ring-2 focus:ring-[#7d6b60] focus:ring-offset-2 
          transition duration-200 ease-in-out">
                            Pilih Sekarang
                        </a>

                    </div>

                    <!-- 3 Month Flo -->
                    <div
                        class="bg-white p-8 rounded-2xl shadow-lg border-t-4 border-[#C5A08A] card-hover text-center space-y-6 staggered-item">
                        <div class="font-bold text-2xl text-[#7d6b60]">3 Month Flo</div>
                        <div class="text-sm text-gray-500 uppercase tracking-wider">3-Month Membership</div>
                        <div class="text-5xl font-extrabold text-[#D3A796]">IDR 600K</div>
                        <p class="text-gray-600">Commit to 3 full months of flo with special rate</p>
                        <ul class="space-y-3 text-sm text-gray-600 text-left">
                            <li class="flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-green-500 mr-2"
                                    viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd"
                                        d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                        clip-rule="evenodd" />
                                </svg>
                                Akses 3 bulan penuh
                            </li>
                            <li class="flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-green-500 mr-2"
                                    viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd"
                                        d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                        clip-rule="evenodd" />
                                </svg>
                                Semua fasilitas gym
                            </li>
                            <li class="flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-green-500 mr-2"
                                    viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd"
                                        d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                        clip-rule="evenodd" />
                                </svg>
                                Free locker & towel
                            </li>
                            <li class="flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-green-500 mr-2"
                                    viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd"
                                        d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                        clip-rule="evenodd" />
                                </svg>
                                2 sesi konsultasi gratis
                            </li>
                            <li class="flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-green-500 mr-2"
                                    viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd"
                                        d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                        clip-rule="evenodd" />
                                </svg>
                                Diskon 20% dari harga bulanan
                            </li>
                        </ul>
                        <a href="{{ route('daftar.create') }}" class="block w-full text-center py-3 px-6 mt-4 text-base font-semibold 
          bg-[#7d6b60] text-white rounded-xl shadow-md 
          hover:bg-[#6c5c52] hover:shadow-lg 
          focus:outline-none focus:ring-2 focus:ring-[#7d6b60] focus:ring-offset-2 
          transition duration-200 ease-in-out">
                            Pilih Sekarang
                        </a>

                    </div>
                </div>
            </div>

            <!-- Group Plans -->
            <div class="mb-16 fade-in-up">
                <h3 class="text-3xl font-semibold text-[#4a3f35] mb-2 text-center">Your Squad Flow Plan (Group)</h3>
                <p class="text-gray-600 text-center mb-10">Lebih seru dan hemat bersama teman-teman!</p>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                    <!-- For 2 Flo Babes -->
                    <div
                        class="bg-white p-8 rounded-2xl shadow-lg border-t-4 border-[#C5A08A] card-hover text-center space-y-6 staggered-item">
                        <div class="font-bold text-2xl text-[#7d6b60]">For 2 Flo Babes</div>
                        <div class="text-sm text-gray-500 uppercase tracking-wider">8 Session</div>
                        <div class="text-5xl font-extrabold text-[#D3A796]">IDR 640K<span
                                class="text-lg font-normal block">/Person</span></div>
                        <p class="text-gray-600">Valid For a Month</p>
                        <ul class="space-y-3 text-sm text-gray-600 text-left">
                            <li class="flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-green-500 mr-2"
                                    viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd"
                                        d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                        clip-rule="evenodd" />
                                </svg>
                                8 sesi dalam 1 bulan
                            </li>
                            <li class="flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-green-500 mr-2"
                                    viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd"
                                        d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                        clip-rule="evenodd" />
                                </svg>
                                Untuk 2 orang
                            </li>
                            <li class="flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-green-500 mr-2"
                                    viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd"
                                        d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                        clip-rule="evenodd" />
                                </svg>
                                Semua fasilitas gym
                            </li>
                            <li class="flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-green-500 mr-2"
                                    viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd"
                                        d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                        clip-rule="evenodd" />
                                </svg>
                                Free locker
                            </li>
                        </ul>
                        <a href="{{ route('daftar.create') }}" class="block w-full text-center py-3 px-6 mt-4 text-base font-semibold 
          bg-[#7d6b60] text-white rounded-xl shadow-md 
          hover:bg-[#6c5c52] hover:shadow-lg 
          focus:outline-none focus:ring-2 focus:ring-[#7d6b60] focus:ring-offset-2 
          transition duration-200 ease-in-out">
                            Pilih Sekarang
                        </a>

                    </div>

                    <!-- For 3 Flo Babes -->
                    <div
                        class="bg-white p-8 rounded-2xl shadow-lg border-t-4 border-[#C5A08A] card-hover text-center space-y-6 staggered-item">
                        <div class="font-bold text-2xl text-[#7d6b60]">For 3 Flo Babes</div>
                        <div class="text-sm text-gray-500 uppercase tracking-wider">8 Session</div>
                        <div class="text-5xl font-extrabold text-[#D3A796]">IDR 560K<span
                                class="text-lg font-normal block">/Person</span></div>
                        <p class="text-gray-600">Valid For a Month</p>
                        <ul class="space-y-3 text-sm text-gray-600 text-left">
                            <li class="flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-green-500 mr-2"
                                    viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd"
                                        d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                        clip-rule="evenodd" />
                                </svg>
                                8 sesi dalam 1 bulan
                            </li>
                            <li class="flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-green-500 mr-2"
                                    viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd"
                                        d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                        clip-rule="evenodd" />
                                </svg>
                                Untuk 3 orang
                            </li>
                            <li class="flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-green-500 mr-2"
                                    viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd"
                                        d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                        clip-rule="evenodd" />
                                </svg>
                                Semua fasilitas gym
                            </li>
                            <li class="flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-green-500 mr-2"
                                    viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd"
                                        d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                        clip-rule="evenodd" />
                                </svg>
                                Free locker & towel
                            </li>
                            <li class="flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-green-500 mr-2"
                                    viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd"
                                        d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                        clip-rule="evenodd" />
                                </svg>
                                Lebih hemat 12.5%
                            </li>
                        </ul>
                        <a href="{{ route('daftar.create') }}" class="block w-full text-center py-3 px-6 mt-4 text-base font-semibold 
          bg-[#7d6b60] text-white rounded-xl shadow-md 
          hover:bg-[#6c5c52] hover:shadow-lg 
          focus:outline-none focus:ring-2 focus:ring-[#7d6b60] focus:ring-offset-2 
          transition duration-200 ease-in-out">
                            Pilih Sekarang
                        </a>

                    </div>

                    <!-- For 4 Flo Babes -->
                    <div
                        class="bg-white p-8 rounded-2xl shadow-lg border-t-4 border-[#C5A08A] card-hover text-center space-y-6 staggered-item">
                        <div class="font-bold text-2xl text-[#7d6b60]">For 4 Flo Babes</div>
                        <div class="text-sm text-gray-500 uppercase tracking-wider">8 Session</div>
                        <div class="text-5xl font-extrabold text-[#D3A796]">IDR 480K<span
                                class="text-lg font-normal block">/Person</span></div>
                        <p class="text-gray-600">Valid For a Month</p>
                        <ul class="space-y-3 text-sm text-gray-600 text-left">
                            <li class="flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-green-500 mr-2"
                                    viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd"
                                        d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                        clip-rule="evenodd" />
                                </svg>
                                8 sesi dalam 1 bulan
                            </li>
                            <li class="flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-green-500 mr-2"
                                    viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd"
                                        d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                        clip-rule="evenodd" />
                                </svg>
                                Untuk 4 orang
                            </li>
                            <li class="flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-green-500 mr-2"
                                    viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd"
                                        d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                        clip-rule="evenodd" />
                                </svg>
                                Semua fasilitas gym
                            </li>
                            <li class="flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-green-500 mr-2"
                                    viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd"
                                        d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                        clip-rule="evenodd" />
                                </svg>
                                Free locker & towel
                            </li>
                            <li class="flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-green-500 mr-2"
                                    viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd"
                                        d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                        clip-rule="evenodd" />
                                </svg>
                                Lebih hemat 25%
                            </li>
                        </ul>
                        <a href="{{ route('daftar.create') }}" class="block w-full text-center py-3 px-6 mt-4 text-base font-semibold 
          bg-[#7d6b60] text-white rounded-xl shadow-md 
          hover:bg-[#6c5c52] hover:shadow-lg 
          focus:outline-none focus:ring-2 focus:ring-[#7d6b60] focus:ring-offset-2 
          transition duration-200 ease-in-out">
                            Pilih Sekarang
                        </a>

                    </div>
                </div>
            </div>

            <!-- Personal Trainer Plan -->
            <div class="fade-in-up">
                <h3 class="text-3xl font-semibold text-[#4a3f35] mb-2 text-center">Your Person Flo Plan (Private
                    Trainer)</h3>
                <p class="text-gray-600 text-center mb-10">Pengalaman eksklusif dengan perhatian penuh dari trainer</p>

                <div class="flex justify-center">
                    <div
                        class="bg-white p-10 rounded-2xl shadow-xl border-t-4 border-[#D3A796] card-hover text-center space-y-8 max-w-md w-full staggered-item">
                        <div class="font-bold text-3xl text-[#7d6b60]">Personal Flo</div>
                        <div class="text-sm text-gray-500 uppercase tracking-wider">8 Session</div>
                        <div class="text-6xl font-extrabold text-[#D3A796]">IDR 800K</div>
                        <p class="text-gray-600 text-base">Nikmati akses satu hari penuh tanpa komitmen.</p>
                        <ul class="space-y-4 text-sm text-gray-600 text-left">
                            <li class="flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-green-500 mr-2"
                                    viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd"
                                        d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                        clip-rule="evenodd" />
                                </svg>
                                8 sesi personal training
                            </li>
                            <li class="flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-green-500 mr-2"
                                    viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd"
                                        d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                        clip-rule="evenodd" />
                                </svg>
                                Program latihan personalisasi
                            </li>
                            <li class="flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-green-500 mr-2"
                                    viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd"
                                        d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                        clip-rule="evenodd" />
                                </svg>
                                Nutrition guidance
                            </li>
                            <li class="flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-green-500 mr-2"
                                    viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd"
                                        d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                        clip-rule="evenodd" />
                                </svg>
                                Progress tracking
                            </li>
                            <li class="flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-green-500 mr-2"
                                    viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd"
                                        d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                        clip-rule="evenodd" />
                                </svg>
                                Akses eksklusif jam tertentu
                            </li>
                        </ul>
                        <a href="{{ route('daftar.create') }}" class="block w-full text-center py-3 px-6 mt-4 text-base font-semibold 
          bg-[#7d6b60] text-white rounded-xl shadow-md 
          hover:bg-[#6c5c52] hover:shadow-lg 
          focus:outline-none focus:ring-2 focus:ring-[#7d6b60] focus:ring-offset-2 
          transition duration-200 ease-in-out">
                            Pilih Sekarang
                        </a>

                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="py-16 bg-[#f8f4f1]">
        <div class="container mx-auto px-6 lg:px-16 text-center fade-in-up">
            <h2 class="text-3xl font-bold text-[#7d6b60] mb-6">Masih Bingung Memilih Paket?</h2>
            <p class="text-lg text-gray-600 max-w-2xl mx-auto mb-8">
                Konsultasikan kebutuhan kebugaranmu dengan tim HerFlo. Kami akan membantu memilih paket yang paling
                tepat untuk tujuanmu.
            </p>
            <div class="flex flex-wrap justify-center gap-4">
                <a href="#" class="px-8 py-3 btn-custom text-base">Konsultasi Gratis</a>
                <a href="#"
                    class="px-8 py-3 border border-[#7d6b60] text-[#7d6b60] rounded-full font-semibold hover:bg-[#7d6b60] hover:text-white transition">Free
                    Trial</a>
            </div>
        </div>
    </section>
</body>
@endsection
