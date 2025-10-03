<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description"
        content="Get started with a free and open source Tailwind CSS admin dashboard featuring a sidebar layout, advanced charts, and hundreds of components based on Flowbite">
    <meta name="author" content="Themesberg">
    <meta name="generator" content="Hugo 0.143.0">
    <title>Aplikasi GYM HerFlo - Home</title>
    <link rel="canonical" href="https://themesberg.com/product/tailwind-css/dashboard-windster">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://themewagon.github.io/windster/app.css">
    <link rel="apple-touch-icon" sizes="180x180" href="https://themewagon.github.io/windster/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="https://themewagon.github.io/windster/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="https://themewagon.github.io/windster/favicon-16x16.png">
    <link rel="icon" type="image/png" href="https://themewagon.github.io/windster/favicon.ico">
    <link rel="manifest" href="https://themewagon.github.io/windster/site.webmanifest">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="mask-icon" href="https://themewagon.github.io/windster/safari-pinned-tab.svg" color="#5bbad5">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="theme-color" content="#ffffff">
    <!-- Twitter -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:site" content="@">
    <meta name="twitter:creator" content="@">
    <meta name="twitter:title" content="Tailwind CSS Dashboard - Windster">
    <meta name="twitter:description"
        content="Get started with a free and open source Tailwind CSS admin dashboard featuring a sidebar layout, advanced charts, and hundreds of components based on Flowbite">
    <meta name="twitter:image" content="https://themewagon.github.io/windster/">
    <!-- Facebook -->
    <meta property="og:url" content="https://themewagon.github.io/windster/">
    <meta property="og:title" content="Tailwind CSS Dashboard - Windster">
    <meta property="og:description"
        content="Get started with a free and open source Tailwind CSS admin dashboard featuring a sidebar layout, advanced charts, and hundreds of components based on Flowbite">
    <meta property="og:type" content="website">
    <meta property="og:image" content="https://themewagon.github.io/docs/images/og-image.jpg">
    <meta property="og:image:type" content="image/png">
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-141734189-6"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://code.iconify.design/iconify-icon/1.0.7/iconify-icon.min.js"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'UA-141734189-6');

    </script>
    <script>
        (function (w, d, s, l, i) {
            w[l] = w[l] || [];
            w[l].push({
                'gtm.start': new Date().getTime(),
                event: 'gtm.js'
            });
            var f = d.getElementsByTagName(s)[0],
                j = d.createElement(s),
                dl = l != 'dataLayer' ? '&l=' + l : '';
            j.async = true;
            j.src =
                'https://www.googletagmanager.com/gtm.js?id=' + i + dl;
            f.parentNode.insertBefore(j, f);
        })(window, document, 'script', 'dataLayer', 'GTM-THQTXJ7');

    </script>
</head>

<body class="bg-gray-50">
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-THQTXJ7" height="0" width="0"
            style="display:none;visibility:hidden"></iframe></noscript>
    <nav class="bg-white border-b border-gray-200 fixed z-30 w-full">
        <div class="px-3 py-3 lg:px-5 lg:pl-3">
            <div class="flex items-center justify-between">
                <div class="flex items-center justify-start">
                    <button id="toggleSidebarMobile" aria-expanded="true" aria-controls="sidebar"
                        class="lg:hidden mr-2 text-gray-600 hover:text-gray-900 cursor-pointer p-2 hover:bg-gray-100 focus:bg-gray-100 focus:ring-2 focus:ring-gray-100 rounded">
                        <svg id="toggleSidebarMobileHamburger" class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h6a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z"
                                clip-rule="evenodd"></path>
                        </svg>
                        <svg id="toggleSidebarMobileClose" class="w-6 h-6 hidden" fill="currentColor"
                            viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                clip-rule="evenodd"></path>
                        </svg>
                    </button>
                    <a href="https://themewagon.github.io/windster/"
                        class="text-xl font-bold flex items-center lg:ml-2.5">
                        <img src="https://themewagon.github.io/windster/images/logo.svg" class="h-6 mr-2"
                            alt="Windster Logo">
                        <span class="self-center whitespace-nowrap">HerFlo</span>
                    </a>
                    <form action="#" method="GET" class="hidden lg:block lg:pl-32">
                        <label for="topbar-search" class="sr-only">Search</label>
                        <div class="mt-1 relative lg:w-64">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <svg class="w-5 h-5 text-gray-500" fill="currentColor" viewBox="0 0 20 20"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                        d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                                        clip-rule="evenodd"></path>
                                </svg>
                            </div>
                            <input type="text" name="email" id="topbar-search"
                                class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-cyan-600 focus:border-cyan-600 block w-full pl-10 p-2.5"
                                placeholder="Search">
                        </div>
                    </form>
                </div>
                <div class="flex items-center">
                    <button id="toggleSidebarMobileSearch" type="button"
                        class="lg:hidden text-gray-500 hover:text-gray-900 hover:bg-gray-100 p-2 rounded-lg">
                        <span class="sr-only">Search</span>
                        <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                                clip-rule="evenodd"></path>
                        </svg>
                    </button>
                    <div x-data="{ open: false }" class="relative">
                        <button @click="open = !open" type="button"
                            class="flex items-center space-x-2 text-gray-700 hover:text-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 rounded-full p-1 transition">
                            <img class="w-9 h-9 rounded-full border border-gray-200 shadow-sm"
                                src="https://ui-avatars.com/api/?name={{ urlencode(Auth::user()->name) }}&background=random"
                                alt="User Avatar">
                            <span class="text-sm font-medium hidden lg:inline-block">{{ Auth::user()->name }}</span>
                            <svg class="w-4 h-4 text-gray-500 transition-transform transform"
                                :class="{'rotate-180': open}" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M19 9l-7 7-7-7"></path>
                            </svg>
                        </button>
                        <div x-show="open" @click.outside="open = false"
                            x-transition:enter="transition ease-out duration-200"
                            x-transition:enter-start="opacity-0 scale-95" x-transition:enter-end="opacity-100 scale-100"
                            x-transition:leave="transition ease-in duration-150"
                            x-transition:leave-start="opacity-100 scale-100" x-transition:leave-end="opacity-0 scale-95"
                            class="absolute right-0 mt-3 w-56 bg-white rounded-xl shadow-lg ring-1 ring-black/5 overflow-hidden z-20">
                            <div class="px-4 py-3 bg-gray-50 border-b border-gray-100">
                                <p class="text-sm font-bold text-gray-500">{{ Auth::user()->email }}</p>
                                <p class="text-sm font-bold text-gray-400 capitalize">{{ Auth::user()->role }}</p>
                            </div>
                            <div class="border-t border-gray-100">
                                <form id="logout-form" method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button type="submit"
                                        class="flex items-center w-full px-4 py-2 text-sm text-gray-700 hover:bg-red-50 hover:text-red-600 transition">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 mr-2 text-gray-400"
                                            fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                                        </svg>
                                        Logout
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <script>
                        const logoutForm = document.getElementById('logout-form');

                        logoutForm.addEventListener('submit', function (e) {
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
                                    logoutForm.submit();
                                }
                            });
                        });
                    </script>
                </div>
            </div>
        </div>
    </nav>

    <div class="flex overflow-hidden bg-white pt-16">
        <aside id="sidebar"
            class="fixed hidden z-20 h-full top-0 left-0 pt-16 flex lg:flex flex-shrink-0 flex-col w-64 transition-width duration-75"
            aria-label="Sidebar">
            <div class="relative flex-1 flex flex-col min-h-0 border-r border-gray-200 bg-white pt-0">
                <div class="flex-1 flex flex-col pt-5 pb-4 overflow-y-auto">
                    <div class="flex-1 px-3 bg-white divide-y space-y-1">
                        <ul class="space-y-2 pb-2">
                            <!-- Dashboard (umum untuk semua role) -->
                            <li>
                                @if(Auth::user()->role == 'admin')
                                    <a href="{{ route('admin.dashboard') }}"
                                        class="flex items-center p-2 text-base text-gray-900 font-normal rounded-lg hover:bg-gray-100 group">
                                        <svg class="w-6 h-6 text-gray-700 group-hover:text-gray-900" fill="currentColor"
                                            viewBox="0 0 24 24"><path d="M3 13h8V3H3v10zm0 8h8v-6H3v6zm10 0h8v-10h-8v10zm0-18v6h8V3h-8z" /></svg>
                                        <span class="ml-3">Dashboard</span>
                                    </a>
                                @elseif(Auth::user()->role == 'user')
                                    <a href="{{ route('user.dashboard') }}"
                                        class="flex items-center p-2 text-base text-gray-900 font-normal rounded-lg hover:bg-gray-100 group">
                                        <svg class="w-6 h-6 text-gray-700 group-hover:text-gray-900" fill="currentColor"
                                            viewBox="0 0 24 24"><path d="M3 13h8V3H3v10zm0 8h8v-6H3v6zm10 0h8v-10h-8v10zm0-18v6h8V3h-8z" /></svg>
                                        <span class="ml-3">Dashboard</span>
                                    </a>
                                @elseif(Auth::user()->role == 'member')
                                    <a href="{{ route('member.dashboard') }}"
                                        class="flex items-center p-2 text-base text-gray-900 font-normal rounded-lg hover:bg-gray-100 group">
                                        <svg class="w-6 h-6 text-gray-700 group-hover:text-gray-900" fill="currentColor"
                                            viewBox="0 0 24 24"><path d="M3 13h8V3H3v10zm0 8h8v-6H3v6zm10 0h8v-10h-8v10zm0-18v6h8V3h-8z" /></svg>
                                        <span class="ml-3">Dashboard</span>
                                    </a>
                                @elseif(Auth::user()->role == 'instruktur')
                                    <a href="{{ route('instruktur.dashboard') }}"
                                        class="flex items-center p-2 text-base text-gray-900 font-normal rounded-lg hover:bg-gray-100 group">
                                        <svg class="w-6 h-6 text-gray-700 group-hover:text-gray-900" fill="currentColor"
                                            viewBox="0 0 24 24"><path d="M3 13h8V3H3v10zm0 8h8v-6H3v6zm10 0h8v-10h-8v10zm0-18v6h8V3h-8z" /></svg>
                                        <span class="ml-3">Dashboard</span>
                                    </a>
                                @endif
                            </li>

                            <!-- Menu khusus USER -->
                            @if(Auth::user()->role == 'user')
                                <li>
                                    <a href="{{ route('user.daftarMember') }}"
                                        class="flex items-center p-2 text-base text-gray-900 font-normal rounded-lg hover:bg-gray-100 group">
                                        <svg class="w-6 h-6 text-gray-700 group-hover:text-gray-900" fill="currentColor"
                                            viewBox="0 0 24 24"><path d="M12 12c2.7 0 4.9-2.2 4.9-4.9S14.7 2.2 12 2.2 7.1 4.4 7.1 7.1 9.3 12 12 12zm0 2.2c-3.3 0-9.8 1.7-9.8 5v2.7h19.6v-2.7c0-3.3-6.5-5-9.8-5z"/></svg>
                                        <span class="ml-3">Daftar Member</span>
                                    </a>
                                </li>
                            @endif

                            <!-- Menu khusus MEMBER -->
                            @if(Auth::user()->role == 'member')
                                <li>
                                    <a href="{{ route('member.booking') }}"
                                        class="flex items-center p-2 text-base text-gray-900 font-normal rounded-lg hover:bg-gray-100 group">
                                        <svg class="w-6 h-6 text-gray-700 group-hover:text-gray-900" fill="currentColor"
                                            viewBox="0 0 24 24"><path d="M19 3H5c-1.1 0-2 .9-2 2v14l4-4h12c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2z"/></svg>
                                        <span class="ml-3">Booking Kelas</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('member.testimoni') }}"
                                        class="flex items-center p-2 text-base text-gray-900 font-normal rounded-lg hover:bg-gray-100 group">
                                        <svg class="w-6 h-6 text-gray-700 group-hover:text-gray-900" fill="currentColor"
                                            viewBox="0 0 24 24"><path d="M12 1C5.9 1 1 5.9 1 12s4.9 11 11 11 11-4.9 11-11S18.1 1 12 1zm1 17h-2v-2h2v2zm0-4h-2V7h2v7z"/></svg>
                                        <span class="ml-3">Kirim Testimoni</span>
                                    </a>
                                </li>
                            @endif

                            <!-- Menu khusus INSTRUKTUR -->
                            @if(Auth::user()->role == 'instruktur')
                                <ul class="space-y-2">
                                    <li>
                                        <a href="{{ route('instruktur.dashboard') }}"
                                            class="flex items-center p-2 text-base font-normal rounded-lg hover:bg-gray-100
                                            {{ request()->routeIs('instruktur.dashboard') ? 'bg-gray-200 font-semibold' : 'text-gray-900' }}">
                                            <svg class="w-6 h-6 text-gray-700 group-hover:text-gray-900" fill="currentColor"
                                                viewBox="0 0 24 24"><path d="M12 2L2 7h20L12 2zM2 17v2h20v-2H2zm0-4v2h20v-2H2z"/></svg>
                                            <span class="ml-3">Dashboard</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{ route('instruktur.jadwal') }}"
                                            class="flex items-center p-2 text-base font-normal rounded-lg hover:bg-gray-100
                                            {{ request()->routeIs('instruktur.jadwal') ? 'bg-gray-200 font-semibold' : 'text-gray-900' }}">
                                            <svg class="w-6 h-6 text-gray-700 group-hover:text-gray-900" fill="currentColor"
                                                viewBox="0 0 24 24"><path d="M3 6h18v2H3V6zm0 5h18v2H3v-2zm0 5h18v2H3v-2z"/></svg>
                                            <span class="ml-3">Kelola Jadwal</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#"
                                            class="flex items-center p-2 text-base font-normal rounded-lg hover:bg-gray-100
                                            {{ request()->routeIs('instruktur.booking') ? 'bg-gray-200 font-semibold' : 'text-gray-900' }}">
                                            <svg class="w-6 h-6 text-gray-700 group-hover:text-gray-900" fill="currentColor"
                                                viewBox="0 0 24 24"><path d="M5 3h14a2 2 0 012 2v16a2 2 0 01-2 2H5a2 2 0 01-2-2V5a2 2 0 012-2zm0 2v16h14V5H5z"/></svg>
                                            <span class="ml-3">Booking Member</span>
                                        </a>
                                    </li>
                                    <!-- Galeri -->
                                    {{-- <li>
                                        <a href="{{ route('galeri.index') }}"
                                            class="flex items-center p-2 text-base text-gray-900 font-normal rounded-lg hover:bg-gray-100 group">
                                            <svg class="w-6 h-6 text-gray-700 group-hover:text-gray-900" fill="currentColor"
                                                viewBox="0 0 24 24">
                                                <path d="M18 2H6c-1.1 0-2 .9-2 2v16c0 1.1.9 2 2 2h12V2zM8 20V4h10v16H8z" />
                                            </svg>
                                            <span class="ml-3 flex-1 whitespace-nowrap">Galeri</span>
                                        </a>
                                    </li> --}}
                                    <!-- Instruktur -->
                                    {{-- <li>
                                        <a href="{{ route('instruktur.dashboard') }}"
                                            class="flex items-center p-2 text-base text-gray-900 font-normal rounded-lg hover:bg-gray-100 group">
                                            <svg class="w-6 h-6 text-gray-700 group-hover:text-gray-900" fill="currentColor"
                                                viewBox="0 0 24 24">
                                                <path d="M3 6h18v2H3V6zm0 5h18v2H3v-2zm0 5h18v2H3v-2z" />
                                            </svg>
                                            <span class="ml-3 flex-1 whitespace-nowrap">Instruktur</span>
                                        </a>
                                    </li> --}}
                                    <!-- Jadwal Kelas -->
                                    {{-- <li>
                                        <a href="{{ route('instruktur.jadwal') }}"
                                            class="flex items-center p-2 text-base text-gray-900 font-normal rounded-lg hover:bg-gray-100 group">
                                            <svg class="w-6 h-6 text-gray-700 group-hover:text-gray-900" fill="currentColor"
                                                viewBox="0 0 24 24">
                                                <path d="M19 3H5c-1.1 0-2 .9-2 2v14l4-4h12c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2z" />
                                            </svg>
                                            <span class="ml-3 flex-1 whitespace-nowrap">Jadwal Kelas</span>
                                        </a>
                                    </li> --}}
                                    <!-- Pengembalian -->
                                    {{-- <li>
                                        <a href="#"
                                            class="flex items-center p-2 text-base text-gray-900 font-normal rounded-lg hover:bg-gray-100 group">
                                            <svg class="w-6 h-6 text-gray-700 group-hover:text-gray-900" fill="currentColor"
                                                viewBox="0 0 24 24">
                                                <path
                                                    d="M12 4V1L8 5l4 4V6c3.3 0 6 2.7 6 6 0 .8-.2 1.5-.5 2.2l1.5 1.5C19 14 20 12.1 20 10c0-4.4-3.6-8-8-8zM4.5 13.8l1.5-1.5C6.2 12.5 6 13.2 6 14c0 3.3 2.7 6 6 6v3l4-4-4-4v3c-2.2 0-4-1.8-4-4 0-.8.2-1.5.5-2.2z" />
                                            </svg>
                                            <span class="ml-3 flex-1 whitespace-nowrap">Pengembalian</span>
                                        </a>
                                    </li> --}}
                                    <!-- Denda -->
                                    {{-- <li>
                                        <a href="#"
                                            class="flex items-center p-2 text-base text-gray-900 font-normal rounded-lg hover:bg-gray-100 group">
                                            <svg class="w-6 h-6 text-gray-700 group-hover:text-gray-900" fill="currentColor"
                                                viewBox="0 0 24 24">
                                                <path
                                                    d="M12 1C5.9 1 1 5.9 1 12s4.9 11 11 11 11-4.9 11-11S18.1 1 12 1zm1 17h-2v-2h2v2zm0-4h-2V7h2v7z" />
                                            </svg>
                                            <span class="ml-3 flex-1 whitespace-nowrap">Denda</span>
                                        </a>
                                    </li> --}}
                                </ul>
                            @endif

                            <!-- Menu khusus ADMIN -->
                            @if(Auth::user()->role == 'admin')
                                <li>
                                    <a href="{{ route('admin.users.index') }}"
                                        class="flex items-center p-2 text-base text-gray-900 font-normal rounded-lg hover:bg-gray-100 group">
                                        <svg class="w-6 h-6 text-gray-700 group-hover:text-gray-900" fill="currentColor"
                                            viewBox="0 0 24 24"><path d="M16 11c1.7 0 3-1.3 3-3s-1.3-3-3-3-3 1.3-3 3 1.3 3 3 3zm-8 0c1.7 0 3-1.3 3-3S9.7 5 8 5 5 6.3 5 8s1.3 3 3 3zm0 2c-2.7 0-8 1.3-8 4v3h8v-3h2v3h8v-3c0-2.7-5.3-4-8-4h-2z"/></svg>
                                        <span class="ml-3">Kelola User</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('admin.member.index') }}"
                                        class="flex items-center p-2 text-base text-gray-900 font-normal rounded-lg hover:bg-gray-100 group">
                                        <svg class="w-6 h-6 text-gray-700 group-hover:text-gray-900" fill="currentColor"
                                            viewBox="0 0 24 24"><path d="M12 12c2.7 0 4.9-2.2 4.9-4.9S14.7 2.2 12 2.2 7.1 4.4 7.1 7.1 9.3 12 12 12zm0 2.2c-3.3 0-9.8 1.7-9.8 5v2.7h19.6v-2.7c0-3.3-6.5-5-9.8-5z"/></svg>
                                        <span class="ml-3">Kelola Member</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('admin.instruktur.index') }}"
                                        class="flex items-center p-2 text-base text-gray-900 font-normal rounded-lg hover:bg-gray-100 group">
                                        <svg class="w-6 h-6 text-gray-700 group-hover:text-gray-900" fill="currentColor"
                                            viewBox="0 0 24 24"><path d="M16 11c1.7 0 3-1.3 3-3s-1.3-3-3-3-3 1.3-3 3 1.3 3 3 3zm-8 0c1.7 0 3-1.3 3-3S9.7 5 8 5 5 6.3 5 8s1.3 3 3 3zm0 2c-2.7 0-8 1.3-8 4v3h8v-3h2v3h8v-3c0-2.7-5.3-4-8-4h-2z"/></svg>
                                        <span class="ml-3">Kelola Instruktur</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('admin.jadwal.index') }}"
                                        class="flex items-center p-2 text-base text-gray-900 font-normal rounded-lg hover:bg-gray-100 group">
                                        <svg class="w-6 h-6 text-gray-700 group-hover:text-gray-900" fill="currentColor"
                                            viewBox="0 0 24 24"><path d="M3 6h18v2H3V6zm0 5h18v2H3v-2zm0 5h18v2H3v-2z"/></svg>
                                        <span class="ml-3">Kelola Jadwal</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('admin.booking.index') }}"
                                        class="flex items-center p-2 text-base text-gray-900 font-normal rounded-lg hover:bg-gray-100 group">
                                        <svg class="w-6 h-6 text-gray-700 group-hover:text-gray-900" fill="currentColor"
                                            viewBox="0 0 24 24"><path d="M19 3H5c-1.1 0-2 .9-2 2v14l4-4h12c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2z"/></svg>
                                        <span class="ml-3">Kelola Booking</span>
                                    </a>
                                </li>
                                {{-- <li>
                                    <a href="{{ route('admin.galeri.index') }}"
                                        class="flex items-center p-2 text-base text-gray-900 font-normal rounded-lg hover:bg-gray-100 group">
                                        <svg class="w-6 h-6 text-gray-700 group-hover:text-gray-900" fill="currentColor"
                                            viewBox="0 0 24 24"><path d="M18 2H6c-1.1 0-2 .9-2 2v16c0 1.1.9 2 2 2h12V2zM8 20V4h10v16H8z"/></svg>
                                        <span class="ml-3">Kelola Galeri</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('admin.testimoni.index') }}"
                                        class="flex items-center p-2 text-base text-gray-900 font-normal rounded-lg hover:bg-gray-100 group">
                                        <svg class="w-6 h-6 text-gray-700 group-hover:text-gray-900" fill="currentColor"
                                            viewBox="0 0 24 24"><path d="M12 1C5.9 1 1 5.9 1 12s4.9 11 11 11 11-4.9 11-11S18.1 1 12 1zm1 17h-2v-2h2v2zm0-4h-2V7h2v7z"/></svg>
                                        <span class="ml-3">Kelola Testimoni</span>
                                    </a>
                                </li> --}}
                            @endif
                        </ul>
                    </div>
                </div>
            </div>
        </aside>

        <div class="bg-gray-900 opacity-50 hidden fixed inset-0 z-10" id="sidebarBackdrop"></div>
        <div id="main-content" class="h-full w-full bg-gray-50 relative overflow-y-auto lg:ml-64">
            <main>
                <div class="pt-6 px-4">
                    @yield('content')
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
                    @if ($errors->any())
                    <script>
                        Swal.fire({
                            icon: 'error',
                            title: 'Validasi Gagal!',
                            html: `
                            <ul style="text-align: center;">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                            `,
                        })
                    </script>
                    @endif
                    @push('scripts')
                    <script>
                        document.querySelectorAll('.delete-form').forEach(form => {
                            form.addEventListener('submit', function (e) {
                                e.preventDefault();
                                Swal.fire({
                                    title: 'Yakin ingin menghapus?',
                                    text: "Data ini tidak bisa dikembalikan!",
                                    icon: 'warning',
                                    showCancelButton: true,
                                    confirmButtonColor: '#d33',
                                    cancelButtonColor: '#3085d6',
                                    confirmButtonText: 'Ya, hapus!',
                                    cancelButtonText: 'Batal'
                                }).then((result) => {
                                    if (result.isConfirmed) {
                                        form.submit();
                                    }
                                })
                            });
                        });
                    </script>
                    @endpush
                    @stack('scripts')
                </div>
            </main>
        </div>
    </div>
    <script async defer src="https://buttons.github.io/buttons.js"></script>
    <script src="https://themewagon.github.io/windster/app.bundle.js"></script>
</body>

</html>
