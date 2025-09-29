<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HerFlo | Push Your Limits</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
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
            <div class="font-bold text-2xl text-[#7d6b60] animate-on-load">HerFlo</div>
            <div class="hidden lg:flex space-x-8 text-base font-medium">
                <a href="{{ route('home') }}" class="hover:text-[#7d6b60] transition-colors animate-on-load">About
                    Us</a>
                <a href="{{ route('daftar.index') }}"
                    class="hover:text-[#7d6b60] transition-colors animate-on-load">Membership</a>
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
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H7a3 3 0 01-3-3V7a3 3 0 013-3h3a3 3 0 013 3v1" />
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
            <a href="{{ route('home') }}"
                class="py-2 hover:bg-gray-100 rounded-lg px-4 transition-colors animate-on-load">About Us</a>
            <a href="{{ route('daftar.index') }}"
                class="py-2 hover:bg-gray-100 rounded-lg px-4 transition-colors animate-on-load">Membership</a>
            <a href="#" class="py-2 hover:bg-gray-100 rounded-lg px-4 transition-colors animate-on-load">Personal
                Trainer</a>
            <a href="#" class="py-2 hover:bg-gray-100 rounded-lg px-4 transition-colors animate-on-load">Subject</a>
            @guest
            <a href="{{ route('login') }}" class="btn-custom inline-block text-center mt-4 animate-on-load">Free
                Trial</a>
            @else
            <a href="{{ route('logout') }}" id="logout-link"
                class="py-2 text-gray-600 hover:text-red-500 rounded-lg px-4 transition-colors animate-on-load">
                <div class="flex items-center space-x-2">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H7a3 3 0 01-3-3V7a3 3 0 013-3h3a3 3 0 013 3v1" />
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

    <section>
        @yield('konten')
        <script>
            document.getElementById('logout-link').addEventListener('click', function (e) {
                e.preventDefault();
                Swal.fire({
                    title: 'Yakin Logout?',
                    text: "Kamu akan keluar dari aplikasi!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#d33',
                    cancelButtonColor: '#3085d6',
                    confirmButtonText: 'Ya, Logout',
                    cancelButtonText: 'Batal'
                }).then((result) => {
                    if (result.isConfirmed) {
                        document.getElementById('logout-form').submit();
                    }
                });
            });

        </script>
        @if(session('success'))
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Berhasil',
                text: '{{ session('success') }}',
                showConfirmButton: false,
                timer: 2000
            })
        </script>
        @endif
        @if(session('error'))
        <script>
            Swal.fire({
                icon: 'error',
                title: 'Gagal',
                text: '{{ session('error') }}',
                showConfirmButton: true,
            })
        </script>
        @endif
    </section>

    <footer class="bg-[#C5A08A] pt-16 pb-10 mt-16 text-white">
        <div class="container mx-auto px-6 lg:px-16 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-12">
            <div class="fade-in-up">
                <h4 class="font-bold text-3xl mb-5">HerFlo</h4>
                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1036.0599909379305!2d110.95986325624764!3d-7.5971659244119305!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e7a19004b4ef1f5%3A0x68889f4e4d43230!2sHer%20Flo!5e0!3m2!1sid!2sid!4v1755746348658!5m2!1sid!2sid"
                    width="100%" height="200" style="border:0;" allowfullscreen="" loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade" class="rounded-lg shadow-md"></iframe>
            </div>
            <div class="fade-in-up">
                <h4 class="font-semibold text-2xl mb-5">Explore</h4>
                <ul class="space-y-3 text-base">
                    <li><a href="#" class="hover:underline hover:opacity-90 transition">About</a></li>
                    <li><a href="#" class="hover:underline hover:opacity-90 transition">Classes</a></li>
                    <li><a href="#" class="hover:underline hover:opacity-90 transition">Services</a></li>
                    <li><a href="#" class="hover:underline hover:opacity-90 transition">Articles</a></li>
                </ul>
            </div>
            <div class="fade-in-up">
                <h4 class="font-semibold text-2xl mb-5">Contact Us</h4>
                <p class="text-base opacity-90">📧 info@herflo.com</p>
                <p class="text-base opacity-90">📞 +62 811 2345 6789</p>
            </div>
            <div class="fade-in-up">
                <h4 class="font-semibold text-2xl mb-5">Follow Us</h4>
                <div class="flex space-x-4">
                    <a href="#"
                        class="w-11 h-11 flex items-center justify-center rounded-full bg-white text-[#C5A08A] shadow hover-scale">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 fill-current" viewBox="0 0 24 24">
                            <path
                                d="M22.675 0h-21.35C.597 0 0 .597 0 1.326v21.348C0 23.403.597 24 1.326 24h11.495v-9.294H9.691V11.01h3.13V8.413c0-3.1 1.893-4.788 4.659-4.788 1.325 0 2.463.099 2.795.143v3.24h-1.918c-1.504 0-1.797.715-1.797 1.764v2.312h3.587l-.467 3.696h-3.12V24h6.116C23.403 24 24 23.403 24 22.674V1.326C24 .597 23.403 0 22.675 0z" />
                        </svg>
                    </a>
                    <a href="#"
                        class="w-11 h-11 flex items-center justify-center rounded-full bg-white text-[#C5A08A] shadow hover-scale">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 fill-current" viewBox="0 0 24 24">
                            <path
                                d="M12 2.163c3.204 0 3.584.012 4.85.07 1.366.062 2.633.35 3.608 1.325.975.975 1.262 2.242 1.324 3.608.058 1.266.069 1.646.069 4.85s-.012 3.584-.07 4.85c-.062 1.366-.35 2.633-1.325 3.608-.975.975-2.242 1.262-3.608 1.324-1.266.058-1.646.069-4.85.069s-3.584-.012-4.85-.07c-1.366-.062-2.633-.35-3.608-1.325-.975-.975-1.262-2.242-1.324-3.608C2.175 15.747 2.163 15.367 2.163 12s.012-3.584.07-4.85c.062-1.366.35-2.633 1.325-3.608.975-.975 2.242-1.262 3.608-1.324C8.416 2.175 8.796 2.163 12 2.163zm0 1.838c-3.17 0-3.548.012-4.796.07-1.042.048-1.61.218-1.982.363-.5.194-.86.426-1.237.803-.377.377-.61.737-.804 1.237-.145.372-.315.94-.363 1.982-.058 1.248-.07 1.626-.07 4.796s.012 3.548.07 4.796c.048 1.042.218 1.61.363 1.982.194.5.426.86.803 1.237.377.377.737.61 1.237.804.372.145.94.315 1.982.363 1.248.058 1.626.07 4.796.07s3.548-.012 4.796-.07c1.042-.048 1.61-.218 1.982-.363.194-.5.426-.86.803-1.237.377-.377.61-.737.804-1.237.145-.372.315-.94.363-1.982.058-1.248.07-1.626.07-4.796s-.012-3.548-.07-4.796c-.048-1.042-.218-1.61-.363-1.982-.194-.5-.426-.86-.803-1.237-.377-.377-.737-.61-1.237-.804-.372-.145-.94-.315-1.982-.363-1.248-.058-1.626-.07-4.796-.07zm0 3.905a5.935 5.935 0 110 11.87 5.935 5.935 0 010-11.87zm0 9.797a3.862 3.862 0 100-7.724 3.862 3.862 0 000 7.724zm7.842-10.705a1.387 1.387 0 11-2.774 0 1.387 1.387 0 012.774 0z" />
                        </svg>
                    </a>
                    <a href="#"
                        class="w-11 h-11 flex items-center justify-center rounded-full bg-white text-[#C5A08A] shadow hover-scale">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 fill-current" viewBox="0 0 24 24">
                            <path
                                d="M24 4.557a9.93 9.93 0 01-2.828.775 4.932 4.932 0 002.165-2.724c-.951.555-2.005.959-3.127 1.184a4.916 4.916 0 00-8.384 4.482A13.94 13.94 0 011.671 3.149a4.916 4.916 0 001.523 6.574 4.897 4.897 0 01-2.229-.616c-.054 2.281 1.581 4.415 3.949 4.89a4.935 4.935 0 01-2.224.084 4.919 4.919 0 004.588 3.417A9.867 9.867 0 010 19.54a13.94 13.94 0 007.548 2.212c9.056 0 14.01-7.496 14.01-13.986 0-.213-.005-.425-.014-.636A10.012 10.012 0 0024 4.557z" />
                        </svg>
                    </a>
                </div>
            </div>
        </div>
        <div class="mt-14 text-center">
            <h3 class="text-2xl font-bold tracking-wide mb-3 fade-in">🕒 Jam Operasional</h3>
            <div class="space-y-2 text-base font-medium opacity-95 fade-in">
                <p><span class="font-semibold">Morning Flo</span> — 07:00 to 12:00 WIB</p>
                <p><span class="font-semibold">Evening Flo</span> — 15:00 to 20:00 WIB</p>
            </div>
        </div>
        <div class="mt-12 border-t border-white/30 pt-6 text-center text-base opacity-90 fade-in">
            © 2025 HerFlo Gym. All rights reserved.
        </div>
    </footer>

    <script>
        const toggle = document.getElementById("menu-toggle");
        const menu = document.getElementById("mobile-menu");
        toggle.addEventListener("click", () => {
            menu.classList.toggle("hidden");
        });

        document.addEventListener("DOMContentLoaded", () => {
            const loadElements = document.querySelectorAll(".animate-on-load");
            loadElements.forEach((el, index) => {
                setTimeout(() => {
                    el.classList.add("is-visible");
                }, index * 100);
            });
        });
        const faders = document.querySelectorAll(".fade-in, .fade-in-up, .scale-in");
        const staggeredItems = document.querySelectorAll(".staggered-item");
        const appearOptions = {
            threshold: 0.2,
            rootMargin: "0px 0px -50px 0px"
        };

        const appearOnScroll = new IntersectionObserver((entries, observer) => {
            entries.forEach((entry, index) => {
                if (entry.isIntersecting) {
                    setTimeout(() => {
                        entry.target.classList.add("is-visible");
                    }, index * 100); // Staggered delay for grid items
                    observer.unobserve(entry.target);
                }
            });
        }, appearOptions);

        faders.forEach(fader => appearOnScroll.observe(fader));
        staggeredItems.forEach(item => appearOnScroll.observe(item));

    </script>
</body>

</html>
