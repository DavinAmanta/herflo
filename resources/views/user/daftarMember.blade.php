@extends('user.layout.member')
@section('konten')

<body class="bg-[#f8f4f1] text-gray-800">
    <main class="pt-28 lg:pt-40">
        <div class="container mx-auto px-6 lg:px-16">
            <h1 class="text-center text-5xl font-extrabold text-[#4a3f35] mb-4 fade-in-up">
                Start Your Flow ✨
            </h1>
            <p class="text-center text-lg text-gray-600 mb-16 fade-in-up">
                Daftar sekarang dan pilih paket kebugaran yang paling cocok untukmu.
            </p>

            <section class="mb-20">
                <div class="bg-white p-8 lg:p-12 rounded-2xl shadow-xl max-w-4xl mx-auto fade-in-up">
                    <h2 class="text-3xl font-bold text-[#7d6b60] mb-8 border-b pb-4">
                        Formulir Pendaftaran
                    </h2>

                    <form action="#" method="POST" class="space-y-6">
                        <!-- Nama & Email -->
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label for="name" class="block text-sm font-medium text-gray-700 mb-2">Nama
                                    Lengkap</label>
                                <input type="text" id="name" name="name" required class="w-full border border-gray-300 rounded-xl px-4 py-3 text-gray-700
                   focus:outline-none focus:ring-2 focus:ring-[#7d6b60] focus:border-[#7d6b60]
                   transition duration-200 ease-in-out" placeholder="Masukkan nama Anda">
                            </div>
                            <div>
                                <label for="email" class="block text-sm font-medium text-gray-700 mb-2">Email</label>
                                <input type="email" id="email" name="email" required class="w-full border border-gray-300 rounded-xl px-4 py-3 text-gray-700
                   focus:outline-none focus:ring-2 focus:ring-[#7d6b60] focus:border-[#7d6b60]
                   transition duration-200 ease-in-out" placeholder="contoh@mail.com">
                            </div>
                        </div>

                        <!-- Telepon & Tanggal Lahir -->
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label for="phone" class="block text-sm font-medium text-gray-700 mb-2">Nomor
                                    Telepon</label>
                                <input type="tel" id="phone" name="phone" required class="w-full border border-gray-300 rounded-xl px-4 py-3 text-gray-700
                   focus:outline-none focus:ring-2 focus:ring-[#7d6b60] focus:border-[#7d6b60]
                   transition duration-200 ease-in-out" placeholder="+62 8xx xxxx xxxx">
                            </div>
                            <div>
                                <label for="dob" class="block text-sm font-medium text-gray-700 mb-2">Tanggal
                                    Lahir</label>
                                <input type="date" id="dob" name="dob" required class="w-full border border-gray-300 rounded-xl px-4 py-3 text-gray-700
                   focus:outline-none focus:ring-2 focus:ring-[#7d6b60] focus:border-[#7d6b60]
                   transition duration-200 ease-in-out">
                            </div>
                        </div>

                        <!-- Alamat -->
                        <div>
                            <label for="address" class="block text-sm font-medium text-gray-700 mb-2">Alamat
                                Domisili</label>
                            <textarea id="address" name="address" rows="3" required class="w-full border border-gray-300 rounded-xl px-4 py-3 text-gray-700
                 focus:outline-none focus:ring-2 focus:ring-[#7d6b60] focus:border-[#7d6b60]
                 transition duration-200 ease-in-out" placeholder="Jalan, Kota, Provinsi"></textarea>
                        </div>

                        <!-- Submit -->
                        <div class="pt-4">
                            <button type="submit" class="w-full bg-[#7d6b60] text-white font-semibold py-3 px-6 
                 rounded-xl shadow-md hover:bg-[#6c5c52] 
                 focus:outline-none focus:ring-2 focus:ring-[#7d6b60] focus:ring-offset-2
                 transition duration-200 ease-in-out text-base lg:text-lg">
                                Lanjutkan ke Pemilihan Paket
                            </button>
                        </div>
                    </form>
                </div>
            </section>


            <section>
                <h2 class="text-center text-4xl font-bold text-[#7d6b60] mb-12 fade-in-up">
                    Pilih Paket Keanggotaanmu
                </h2>

                <div class="mb-14 fade-in-up">
                    <h3 class="text-2xl font-semibold text-[#4a3f35] mb-6">Your Flo Plan (Personal)</h3>
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                        <div
                            class="bg-white p-6 rounded-xl shadow-lg border-t-4 border-[#C5A08A] card-hover text-center space-y-4">
                            <div class="font-bold text-xl text-[#7d6b60]">Day Flo</div>
                            <div class="text-sm text-gray-500">Membership</div>
                            <div class="text-4xl font-extrabold text-[#D3A796]">IDR 30K</div>
                            <p class="text-gray-600 text-sm">Drop in and flo for a day.</p>
                            <button class="w-full py-2 btn-custom text-sm">Pilih Sekarang</button>
                        </div>

                        <div
                            class="bg-white p-6 rounded-xl shadow-2xl border-t-4 border-[#7d6b60] card-hover text-center space-y-4 relative">
                            <span
                                class="absolute top-0 right-0 -mt-3 -mr-3 bg-red-500 text-white text-xs font-bold px-3 py-1 rounded-full shadow-md">Populer</span>
                            <div class="font-bold text-xl text-[#7d6b60]">Monthly Flo</div>
                            <div class="text-sm text-gray-500">Membership</div>
                            <div class="text-4xl font-extrabold text-[#D3A796]">IDR 250K</div>
                            <p class="text-gray-600 text-sm">Unlimited access for a full month of flo.</p>
                            <button class="w-full py-2 btn-custom text-sm">Pilih Sekarang</button>
                        </div>

                        <div
                            class="bg-white p-6 rounded-xl shadow-lg border-t-4 border-[#C5A08A] card-hover text-center space-y-4">
                            <div class="font-bold text-xl text-[#7d6b60]">3 Month Flo</div>
                            <div class="text-sm text-gray-500">Membership</div>
                            <div class="text-4xl font-extrabold text-[#D3A796]">IDR 600K</div>
                            <p class="text-gray-600 text-sm">Commit to 3 full month of flo.</p>
                            <button class="w-full py-2 btn-custom text-sm">Pilih Sekarang</button>
                        </div>
                    </div>
                </div>

                <div class="mb-14 fade-in-up">
                    <h3 class="text-2xl font-semibold text-[#4a3f35] mb-6">Your Squad Flow Plan (Group)</h3>
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                        <div
                            class="bg-white p-6 rounded-xl shadow-lg border-t-4 border-[#C5A08A] card-hover text-center space-y-4">
                            <div class="font-bold text-xl text-[#7d6b60]">For 2 Flo Babes</div>
                            <div class="text-sm text-gray-500">8 Session</div>
                            <div class="text-4xl font-extrabold text-[#D3A796]">IDR 640K<span
                                    class="text-lg font-normal block">/Person</span></div>
                            <p class="text-gray-600 text-sm">Valid For a Month</p>
                            <button class="w-full py-2 btn-custom text-sm">Pilih Sekarang</button>
                        </div>

                        <div
                            class="bg-white p-6 rounded-xl shadow-lg border-t-4 border-[#C5A08A] card-hover text-center space-y-4">
                            <div class="font-bold text-xl text-[#7d6b60]">For 3 Flo Babes</div>
                            <div class="text-sm text-gray-500">8 Session</div>
                            <div class="text-4xl font-extrabold text-[#D3A796]">IDR 560K<span
                                    class="text-lg font-normal block">/Person</span></div>
                            <p class="text-gray-600 text-sm">Valid For a Month</p>
                            <button class="w-full py-2 btn-custom text-sm">Pilih Sekarang</button>
                        </div>

                        <div
                            class="bg-white p-6 rounded-xl shadow-lg border-t-4 border-[#C5A08A] card-hover text-center space-y-4">
                            <div class="font-bold text-xl text-[#7d6b60]">For 4 Flo Babes</div>
                            <div class="text-sm text-gray-500">8 Session</div>
                            <div class="text-4xl font-extrabold text-[#D3A796]">IDR 480K<span
                                    class="text-lg font-normal block">/Person</span></div>
                            <p class="text-gray-600 text-sm">Valid For a Month</p>
                            <button class="w-full py-2 btn-custom text-sm">Pilih Sekarang</button>
                        </div>
                    </div>
                </div>

                <div class="fade-in-up">
                    <h3 class="text-2xl font-semibold text-[#4a3f35] mb-6">Your Person Flo Plan (Private Trainer)</h3>
                    <div class="flex justify-center">
                        <div
                            class="bg-white p-8 rounded-2xl shadow-xl border-t-4 border-[#D3A796] card-hover text-center space-y-6 max-w-sm w-full">
                            <div class="font-bold text-2xl text-[#7d6b60]">Personal Flo</div>
                            <div class="text-sm text-gray-500">8 Session</div>
                            <div class="text-5xl font-extrabold text-[#D3A796]">IDR 800K</div>
                            <p class="text-gray-600 text-base">Nikmati akses satu hari penuh tanpa komitmen.</p>
                            <button class="w-full py-3 btn-custom text-base">Pilih Sekarang</button>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </main>
</body>

</html>
@endsection
