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
                <div class="bg-white p-8 lg:p-12 rounded-2xl shadow-xl max-w-4xl mx-auto">
                    <h2 class="text-3xl font-bold text-[#7d6b60] mb-8 border-b pb-4 text-center">
                        Formulir Pendaftaran Member
                    </h2>

                    <form action="{{ route('daftar.store') }}" method="POST" class="space-y-8">
                        @csrf
                        <!-- NIK -->
                        <div>
                            <label for="nik" class="block text-sm font-medium text-gray-700 mb-2">NIK</label>
                            <input type="text" name="nik" maxlength="20" required class="w-full border border-gray-300 rounded-xl px-4 py-3 text-gray-700
                    focus:outline-none focus:ring-2 focus:ring-[#7d6b60] focus:border-[#7d6b60]
                    transition duration-200 ease-in-out" placeholder="Masukkan NIK Anda">
                        </div>

                        <!-- Nomor Telepon -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Nomor
                                Telepon</label>
                            <input type="tel" id="no_hp" name="no_hp" required class="w-full border border-gray-300 rounded-xl px-4 py-3 text-gray-700
                    focus:outline-none focus:ring-2 focus:ring-[#7d6b60] focus:border-[#7d6b60]
                    transition duration-200 ease-in-out" placeholder="+62 8xx xxxx xxxx">
                        </div>

                        <!-- Alamat -->
                        <div>
                            <label for="alamat" class="block text-sm font-medium text-gray-700 mb-2">Alamat
                                Domisili</label>
                            <textarea id="alamat" name="alamat" rows="3" required class="w-full border border-gray-300 rounded-xl px-4 py-3 text-gray-700
                    focus:outline-none focus:ring-2 focus:ring-[#7d6b60] focus:border-[#7d6b60]
                    transition duration-200 ease-in-out" placeholder="Jalan, Kota, Provinsi"></textarea>
                        </div>

                        <!-- Pilih Paket -->
                        <div>
                            <h3 class="text-lg font-semibold text-[#7d6b60] mb-6 text-center">Pilih Paket Keanggotaan
                            </h3>
                            <input type="hidden" name="paket" id="paketInput">

                            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                                <!-- Paket 1 Bulan -->
                                <div onclick="pilihPaket('1 Bulan', this)"
                                    class="bg-white p-6 rounded-2xl shadow-md border-2 border-transparent hover:border-[#7d6b60] 
                        transition duration-300 ease-in-out transform hover:-translate-y-1 cursor-pointer card-hover text-center space-y-3">
                                    <div class="font-bold text-2xl text-[#7d6b60]">1 Bulan</div>
                                    <div class="text-sm text-gray-500 uppercase tracking-wider">Starter Plan</div>
                                    <div class="text-4xl font-extrabold text-[#D3A796]">IDR 250K</div>
                                    <p class="text-gray-600 text-sm">Akses penuh ke semua fasilitas selama 1 bulan.</p>
                                </div>

                                <!-- Paket 3 Bulan -->
                                <div onclick="pilihPaket('3 Bulan', this)"
                                    class="relative bg-white p-6 rounded-2xl shadow-xl border-2 border-transparent hover:border-[#7d6b60] 
                        transition duration-300 ease-in-out transform hover:-translate-y-1 cursor-pointer card-hover text-center space-y-3">
                                    <span
                                        class="absolute top-0 right-0 -mt-3 -mr-3 bg-red-500 text-white text-xs font-bold px-3 py-1 rounded-full shadow-md">
                                        Populer
                                    </span>
                                    <div class="font-bold text-2xl text-[#7d6b60]">3 Bulan</div>
                                    <div class="text-sm text-gray-500 uppercase tracking-wider">Pro Plan</div>
                                    <div class="text-4xl font-extrabold text-[#D3A796]">IDR 600K</div>
                                    <p class="text-gray-600 text-sm">Lebih hemat! Nikmati latihan tanpa batas 3 bulan
                                        penuh.</p>
                                </div>

                                <!-- Paket 8 Bulan -->
                                <div onclick="pilihPaket('8 Bulan', this)"
                                    class="bg-white p-6 rounded-2xl shadow-md border-2 border-transparent hover:border-[#7d6b60] 
                        transition duration-300 ease-in-out transform hover:-translate-y-1 cursor-pointer card-hover text-center space-y-3">
                                    <div class="font-bold text-2xl text-[#7d6b60]">8 Bulan</div>
                                    <div class="text-sm text-gray-500 uppercase tracking-wider">Ultimate Plan</div>
                                    <div class="text-4xl font-extrabold text-[#D3A796]">IDR 1.500K</div>
                                    <p class="text-gray-600 text-sm">Paket jangka panjang untuk komitmen gaya hidup
                                        sehatmu.</p>
                                </div>
                            </div>
                        </div>

                        <!-- Tombol Submit -->
                        <div class="pt-6">
                            <button type="submit" class="w-full bg-[#7d6b60] text-white font-semibold py-3 px-6 
                    rounded-xl shadow-md hover:bg-[#6c5c52] 
                    focus:outline-none focus:ring-2 focus:ring-[#7d6b60] focus:ring-offset-2
                    transition duration-300 ease-in-out text-base lg:text-lg">
                                Simpan & Lanjut ke Pembayaran
                            </button>
                        </div>
                    </form>
                </div>
            </section>

            <!-- Script Pilih Paket -->
            <script>
                function pilihPaket(paket, element) {
                    document.getElementById('paketInput').value = paket;

                    // Reset semua border & efek
                    document.querySelectorAll('.card-hover').forEach(card => {
                        card.classList.remove('border-[#7d6b60]', 'scale-105');
                        card.classList.add('border-transparent');
                    });

                    // Tambahkan border & efek ke card yang dipilih
                    element.classList.remove('border-transparent');
                    element.classList.add('border-[#7d6b60]', 'scale-105');
                }
            </script>
        </div>
    </main>
</body>

</html>
@endsection
