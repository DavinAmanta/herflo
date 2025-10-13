<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bugar dan Percaya Diri di ToGlow: Gym Eksklusif untuk Wanita | ToGlow</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
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

        /* Animations */
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

        /* Article specific styles */
        .article-content h2 {
            font-size: 1.75rem;
            font-weight: 700;
            color: #7d6b60;
            margin-top: 2.5rem;
            margin-bottom: 1rem;
            line-height: 1.4;
        }

        .article-content h3 {
            font-size: 1.4rem;
            font-weight: 600;
            color: #7d6b60;
            margin-top: 2rem;
            margin-bottom: 0.8rem;
            line-height: 1.4;
        }

        .article-content p {
            font-size: 1.1rem;
            line-height: 1.8;
            margin-bottom: 1.5rem;
            color: #5a4d42;
        }

        .article-content ul, .article-content ol {
            margin-bottom: 1.5rem;
            padding-left: 1.5rem;
        }

        .article-content li {
            margin-bottom: 0.5rem;
            line-height: 1.6;
            color: #5a4d42;
        }

        .article-content blockquote {
            border-left: 4px solid #D3A796;
            padding-left: 1.5rem;
            margin: 2rem 0;
            font-style: italic;
            color: #7d6b60;
            font-size: 1.2rem;
        }

        .article-image {
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            margin: 2rem 0;
        }

        .tag {
            display: inline-block;
            background-color: #f8f4f1;
            color: #7d6b60;
            padding: 0.4rem 1rem;
            border-radius: 50px;
            font-size: 0.85rem;
            margin-right: 0.5rem;
            margin-bottom: 0.5rem;
            transition: all 0.3s ease;
        }

        .tag:hover {
            background-color: #D3A796;
            color: white;
            transform: translateY(-2px);
        }

        .social-share a {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background-color: #f8f4f1;
            color: #7d6b60;
            margin-right: 0.5rem;
            transition: all 0.3s ease;
        }

        .social-share a:hover {
            background-color: #D3A796;
            color: white;
            transform: translateY(-2px);
        }

        .author-card {
            background: linear-gradient(to right, #fdf9f7, #f8f4f1);
            border-radius: 12px;
            padding: 2rem;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
        }

        .related-article-card {
            transition: all 0.3s ease;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
        }

        .related-article-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
        }

        /* Back to top button */
        .back-to-top {
            position: fixed;
            bottom: 30px;
            right: 30px;
            width: 50px;
            height: 50px;
            border-radius: 50%;
            background-color: #D3A796;
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.2rem;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
            cursor: pointer;
            opacity: 0;
            visibility: hidden;
            transition: all 0.3s ease;
            z-index: 1000;
        }

        .back-to-top.active {
            opacity: 1;
            visibility: visible;
        }

        .back-to-top:hover {
            background-color: #b88c7a;
            transform: translateY(-3px);
        }
    </style>
</head>

<body class="bg-[#f8f4f1] text-gray-800">
    <!-- Header -->
    <header class="bg-[#f8f4f1] fixed w-full shadow-md z-50">
        <nav class="container mx-auto flex justify-between items-center px-4 py-4 lg:py-6">
            <div class="font-bold text-2xl text-[#7d6b60]"><a href="index.html">ToGlow</a></div>
            <div class="hidden lg:flex space-x-8 text-base font-medium">
                <a href="index.html#about" class="hover:text-[#7d6b60] transition-colors">About Us</a>
                <a href="index.html#membership" class="hover:text-[#7d6b60] transition-colors">Membership</a>
                <a href="index.html#services" class="hover:text-[#7d6b60] transition-colors">Services</a>
                <a href="index.html#articles" class="hover:text-[#7d6b60] transition-colors">Articles</a>
            </div>
            <a href="#" class="btn-custom hidden lg:block text-sm">Free Trial</a>
            <button class="lg:hidden" id="menu-toggle">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8 text-[#7d6b60]" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                </svg>
            </button>
        </nav>
        <div class="hidden flex-col space-y-4 px-6 pb-6 bg-[#f8f4f1] border-t border-gray-200" id="mobile-menu">
            <a href="index.html#about" class="py-2 hover:bg-gray-100 rounded-lg px-4 transition-colors">About Us</a>
            <a href="index.html#membership" class="py-2 hover:bg-gray-100 rounded-lg px-4 transition-colors">Membership</a>
            <a href="index.html#services" class="py-2 hover:bg-gray-100 rounded-lg px-4 transition-colors">Services</a>
            <a href="index.html#articles" class="py-2 hover:bg-gray-100 rounded-lg px-4 transition-colors">Articles</a>
            <a href="#" class="btn-custom inline-block text-center mt-4">Free Trial</a>
        </div>
    </header>

    <!-- Article Header -->
    <section class="pt-32 pb-16 bg-gradient-to-r from-white via-[#fdf9f7] to-[#f8f4f1]">
        <div class="container mx-auto px-6 lg:px-16">
            <div class="max-w-4xl mx-auto">
                <div class="mb-6 fade-in-up">
                    <a href="index.html#articles" class="inline-flex items-center text-[#D3A796] hover:text-[#b88c7a] transition-colors">
                        <i class="fas fa-arrow-left mr-2"></i> Kembali ke Artikel
                    </a>
                </div>
                
                <div class="mb-6 fade-in-up">
                    <span class="text-sm uppercase tracking-wider text-[#C5A08A] font-semibold">Lifestyle</span>
                    <span class="mx-2 text-gray-400">•</span>
                    <span class="text-sm text-gray-500">10 Oktober 2025</span>
                </div>
                
                <h1 class="text-4xl lg:text-5xl font-extrabold text-[#4a3f35] leading-tight mb-6 fade-in-up">
                    Bugar dan Percaya Diri di ToGlow: Gym Eksklusif untuk Wanita
                </h1>
                
                <p class="text-xl text-gray-700 mb-8 fade-in-up">
                    Temukan bagaimana ToGlow menciptakan lingkungan yang mendukung perempuan untuk mencapai tujuan kebugaran mereka dengan nyaman dan percaya diri.
                </p>
                
                <div class="flex items-center fade-in-up">
                    <div class="w-12 h-12 rounded-full bg-[#D3A796] flex items-center justify-center text-white font-bold text-lg mr-4">
                        A
                    </div>
                    <div>
                        <p class="font-semibold text-gray-800">Admin ToGlow</p>
                        <p class="text-sm text-gray-600">Penulis ToGlow</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Article Content -->
    <section class="py-12 bg-white">
        <div class="container mx-auto px-6 lg:px-16">
            <div class="max-w-4xl mx-auto">
                <div class="article-image fade-in">
                    <img src="https://images.unsplash.com/photo-1534438327276-14e5300c3a48?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1470&q=80" 
                         alt="Wanita berolahraga di ToGlow" class="w-full h-auto">
                </div>
                
                <div class="article-content fade-in-up">
                    <p>Dalam era modern ini, kesadaran akan pentingnya kesehatan dan kebugaran tubuh semakin meningkat di kalangan perempuan. Namun, tidak semua perempuan merasa nyaman berolahraga di gym umum yang didominasi oleh laki-laki. ToGlow hadir sebagai solusi dengan menawarkan lingkungan eksklusif yang dirancang khusus untuk kebutuhan perempuan.</p>
                    
                    <h2>Lingkungan yang Mendukung Perempuan</h2>
                    
                    <p>ToGlow memahami bahwa perempuan memiliki kebutuhan khusus dalam berolahraga. Mulai dari privasi, kenyamanan, hingga dukungan psikologis. Di ToGlow, setiap anggota dapat berolahraga dengan tenang tanpa merasa diawasi atau dinilai.</p>
                    
                    <div class="article-image fade-in">
                        <img src="https://images.unsplash.com/photo-1571019613454-1cb2f99b2d8b?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1470&q=80" 
                             alt="Fasilitas ToGlow" class="w-full h-auto">
                    </div>
                    
                    <p>"Kami menciptakan ToGlow sebagai ruang aman bagi perempuan untuk mengeksplorasi potensi fisik mereka tanpa tekanan," kata Sarah, salah satu pelatih di ToGlow. "Di sini, fokusnya adalah pada perjalanan pribadi setiap anggota, bukan pada kompetisi."</p>
                    
                    <h2>Fasilitas Lengkap dengan Sentuhan Feminin</h2>
                    
                    <p>ToGlow tidak hanya menyediakan peralatan gym standar, tetapi juga berbagai fasilitas yang dirancang dengan memperhatikan kebutuhan perempuan:</p>
                    
                    <ul>
                        <li><strong>Area Kardio dan Strength Training</strong> - Dilengkapi dengan peralatan modern yang sesuai dengan anatomi tubuh perempuan</li>
                        <li><strong>Studio Yoga dan Pilates</strong> - Ruang khusus untuk latihan fleksibilitas dan keseimbangan</li>
                        <li><strong>Area Functional Training</strong> - Untuk latihan yang meniru gerakan sehari-hari</li>
                        <li><strong>Locker Room Premium</strong> - Dengan fasilitas lengkap termasuk shower, vanity area, dan pengering rambut</li>
                        <li><strong>Healthy Cafe</strong> - Menyajikan minuman dan makanan sehat pasca-latihan</li>
                    </ul>
                    
                    <blockquote>
                        "Bergabung dengan ToGlow adalah keputusan terbaik untuk kesehatan saya. Saya tidak hanya menjadi lebih bugar, tetapi juga lebih percaya diri."
                        <footer>- Maria, anggota ToGlow sejak 2024</footer>
                    </blockquote>
                    
                    <h2>Program yang Disesuaikan dengan Kebutuhan Perempuan</h2>
                    
                    <p>ToGlow menawarkan berbagai program yang dikembangkan khusus untuk perempuan, dengan mempertimbangkan siklus hormonal, metabolisme, dan tujuan kebugaran yang unik:</p>
                    
                    <h3>1. Program Strength Building</h3>
                    <p>Dirancang untuk membantu perempuan membangun kekuatan otot tanpa khawatir terlihat terlalu berotot. Program ini fokus pada bentuk tubuh yang proporsional dan sehat.</p>
                    
                    <h3>2. Program Weight Management</h3>
                    <p>Kombinasi antara latihan kardio, strength training, dan konsultasi nutrisi untuk membantu mencapai dan mempertahankan berat badan ideal.</p>
                    
                    <h3>3. Program Prenatal dan Postnatal</h3>
                    <p>Khusus untuk ibu hamil dan menyusui, dengan latihan yang aman dan bermanfaat untuk kesehatan ibu dan bayi.</p>
                    
                    <div class="article-image fade-in">
                        <img src="https://images.unsplash.com/photo-1544367567-0f2fcb009e0b?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1520&q=80" 
                             alt="Kelas grup di ToGlow" class="w-full h-auto">
                    </div>
                    
                    <h2>Komunitas yang Mendukung</h2>
                    
                    <p>Salah satu keunggulan ToGlow adalah komunitasnya. Anggota tidak hanya datang untuk berolahraga, tetapi juga untuk berbagi pengalaman dan saling mendukung. Berbagai event seperti workshop kesehatan, sesi sharing, dan kelas khusus membantu menciptakan ikatan yang kuat antar anggota.</p>
                    
                    <p>"Komunitas di ToGlow seperti keluarga kedua saya," ungkap Rina, anggota setia ToGlow. "Kami saling memotivasi dan merayakan setiap pencapaian, sekecil apapun itu."</p>
                    
                    <h2>Mulai Perjalanan Kebugaran Anda di ToGlow</h2>
                    
                    <p>Bergabung dengan ToGlow adalah langkah pertama menuju versi terbaik diri Anda. Dengan lingkungan yang mendukung, fasilitas lengkap, dan program yang terpersonalisasi, ToGlow siap membantu Anda mencapai tujuan kebugaran dengan cara yang menyenangkan dan berkelanjutan.</p>
                    
                    <p>Jangan ragu untuk mencoba free trial class dan merasakan sendiri pengalaman berolahraga di ToGlow. Jadwalkan kunjungan Anda hari ini dan mulailah perjalanan menuju hidup yang lebih sehat dan percaya diri!</p>
                </div>
                
                <!-- Tags and Share -->
                <div class="mt-12 pt-8 border-t border-gray-200 fade-in-up">
                    <div class="flex flex-col md:flex-row justify-between items-start md:items-center">
                        <div class="mb-6 md:mb-0">
                            <h3 class="font-semibold text-gray-700 mb-3">Tags:</h3>
                            <div>
                                <a href="#" class="tag">Kebugaran Perempuan</a>
                                <a href="#" class="tag">Gym Eksklusif</a>
                                <a href="#" class="tag">Kesehatan Wanita</a>
                                <a href="#" class="tag">Olahraga</a>
                                <a href="#" class="tag">Gaya Hidup Sehat</a>
                            </div>
                        </div>
                        
                        <div class="social-share">
                            <h3 class="font-semibold text-gray-700 mb-3">Bagikan Artikel:</h3>
                            <div class="flex">
                                <a href="#" class="facebook"><i class="fab fa-facebook-f"></i></a>
                                <a href="#" class="twitter"><i class="fab fa-twitter"></i></a>
                                <a href="#" class="linkedin"><i class="fab fa-linkedin-in"></i></a>
                                <a href="#" class="pinterest"><i class="fab fa-pinterest-p"></i></a>
                                <a href="#" class="whatsapp"><i class="fab fa-whatsapp"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Author Bio -->
                <div class="mt-12 author-card fade-in-up">
                    <div class="flex items-start">
                        <div class="w-16 h-16 rounded-full bg-[#D3A796] flex items-center justify-center text-white font-bold text-xl mr-4 flex-shrink-0">
                            A
                        </div>
                        <div>
                            <h3 class="font-bold text-xl text-[#7d6b60] mb-2">Tentang Penulis</h3>
                            <p class="text-gray-700">Admin ToGlow adalah tim yang berdedikasi untuk menyediakan informasi terkini tentang kesehatan, kebugaran, dan gaya hidup sehat untuk perempuan. Dengan pengalaman lebih dari 5 tahun di industri kebugaran, tim kami berkomitmen untuk membantu perempuan Indonesia mencapai versi terbaik diri mereka melalui artikel yang informatif dan inspiratif.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Related Articles -->
    <section class="py-16 bg-[#f8f4f1]">
        <div class="container mx-auto px-6 lg:px-16">
            <h2 class="text-3xl font-bold text-center text-[#7d6b60] mb-12 fade-in-up">Artikel Terkait</h2>
            
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <!-- Related Article 1 -->
                <div class="bg-white rounded-2xl overflow-hidden related-article-card fade-in-up">
                    <div class="overflow-hidden">
                        <img src="https://images.unsplash.com/photo-1518611012118-696072aa579a?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1470&q=80" 
                             alt="Artikel Terkait 1" class="w-full h-48 object-cover transition-transform duration-300 hover:scale-105">
                    </div>
                    <div class="p-6">
                        <span class="text-xs uppercase tracking-wider text-[#C5A08A] font-semibold">Wellness</span>
                        <h3 class="font-bold text-lg text-[#7d6b60] mt-2 mb-3 leading-tight">
                            Tips Diet Sehat untuk Perempuan Aktif
                        </h3>
                        <a href="#" class="inline-block text-sm font-semibold text-[#C5A08A] hover:text-[#7d6b60] transition">
                            Baca Selengkapnya →
                        </a>
                    </div>
                </div>
                
                <!-- Related Article 2 -->
                <div class="bg-white rounded-2xl overflow-hidden related-article-card fade-in-up">
                    <div class="overflow-hidden">
                        <img src="https://images.unsplash.com/photo-1571019613454-1cb2f99b2d8b?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1470&q=80" 
                             alt="Artikel Terkait 2" class="w-full h-48 object-cover transition-transform duration-300 hover:scale-105">
                    </div>
                    <div class="p-6">
                        <span class="text-xs uppercase tracking-wider text-[#C5A08A] font-semibold">Fitness</span>
                        <h3 class="font-bold text-lg text-[#7d6b60] mt-2 mb-3 leading-tight">
                            Manfaat Yoga untuk Kesehatan Mental Perempuan
                        </h3>
                        <a href="#" class="inline-block text-sm font-semibold text-[#C5A08A] hover:text-[#7d6b60] transition">
                            Baca Selengkapnya →
                        </a>
                    </div>
                </div>
                
                <!-- Related Article 3 -->
                <div class="bg-white rounded-2xl overflow-hidden related-article-card fade-in-up">
                    <div class="overflow-hidden">
                        <img src="https://images.unsplash.com/photo-1541534741688-6078c6bfb5c5?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1469&q=80" 
                             alt="Artikel Terkait 3" class="w-full h-48 object-cover transition-transform duration-300 hover:scale-105">
                    </div>
                    <div class="p-6">
                        <span class="text-xs uppercase tracking-wider text-[#C5A08A] font-semibold">Lifestyle</span>
                        <h3 class="font-bold text-lg text-[#7d6b60] mt-2 mb-3 leading-tight">
                            Menjaga Keseimbangan Kerja dan Olahraga
                        </h3>
                        <a href="#" class="inline-block text-sm font-semibold text-[#C5A08A] hover:text-[#7d6b60] transition">
                            Baca Selengkapnya →
                        </a>
                    </div>
                </div>
            </div>
            
            <div class="text-center mt-12 fade-in-up">
                <a href="index.html#articles" class="btn-custom inline-block">Lihat Semua Artikel</a>
            </div>
        </div>
    </section>

    <!-- Newsletter Subscription -->
    <section class="py-16 bg-white">
        <div class="container mx-auto px-6 lg:px-16">
            <div class="max-w-3xl mx-auto text-center fade-in-up">
                <h2 class="text-3xl font-bold text-[#7d6b60] mb-4">Dapatkan Tips Kesehatan Eksklusif</h2>
                <p class="text-gray-700 mb-8">Berlangganan newsletter kami dan dapatkan informasi terbaru tentang kebugaran, nutrisi, dan gaya hidup sehat langsung di inbox Anda.</p>
                
                <form class="flex flex-col sm:flex-row gap-4 max-w-md mx-auto">
                    <input type="email" placeholder="Alamat email Anda" class="flex-grow px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#D3A796]">
                    <button type="submit" class="btn-custom px-6 py-3 whitespace-nowrap">Berlangganan</button>
                </form>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-[#C5A08A] pt-16 pb-10 text-white">
        <div class="container mx-auto px-6 lg:px-16 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-12">
            <div class="fade-in-up">
                <h4 class="font-bold text-3xl mb-5">ToGlow</h4>
                <p class="text-base opacity-90 mb-4">Gym eksklusif untuk perempuan dengan fasilitas lengkap dan lingkungan yang mendukung.</p>
                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1036.0599909379305!2d110.95986325624764!3d-7.5971659244119305!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e7a19004b4ef1f5%3A0x68889f4e4d43230!2sHer%20Flo!5e0!3m2!1sid!2sid!4v1755746348658!5m2!1sid!2sid"
                    width="100%" height="150" style="border:0;" allowfullscreen="" loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade" class="rounded-lg shadow-md"></iframe>
            </div>
            <div class="fade-in-up">
                <h4 class="font-semibold text-2xl mb-5">Explore</h4>
                <ul class="space-y-3 text-base">
                    <li><a href="index.html#about" class="hover:underline hover:opacity-90 transition">About</a></li>
                    <li><a href="index.html#membership" class="hover:underline hover:opacity-90 transition">Membership</a></li>
                    <li><a href="index.html#services" class="hover:underline hover:opacity-90 transition">Services</a></li>
                    <li><a href="index.html#articles" class="hover:underline hover:opacity-90 transition">Articles</a></li>
                </ul>
            </div>
            <div class="fade-in-up">
                <h4 class="font-semibold text-2xl mb-5">Contact Us</h4>
                <p class="text-base opacity-90 mb-2">📧 info@ToGlow.com</p>
                <p class="text-base opacity-90 mb-2">📞 +62 811 2345 6789</p>
                <p class="text-base opacity-90">📍 Jl. Contoh Alamat No. 123, Yogyakarta</p>
            </div>
            <div class="fade-in-up">
                <h4 class="font-semibold text-2xl mb-5">Follow Us</h4>
                <div class="flex space-x-4">
                    <a href="#"
                        class="w-11 h-11 flex items-center justify-center rounded-full bg-white text-[#C5A08A] shadow hover:scale-110 transition-transform">
                        <i class="fab fa-facebook-f"></i>
                    </a>
                    <a href="#"
                        class="w-11 h-11 flex items-center justify-center rounded-full bg-white text-[#C5A08A] shadow hover:scale-110 transition-transform">
                        <i class="fab fa-instagram"></i>
                    </a>
                    <a href="#"
                        class="w-11 h-11 flex items-center justify-center rounded-full bg-white text-[#C5A08A] shadow hover:scale-110 transition-transform">
                        <i class="fab fa-twitter"></i>
                    </a>
                    <a href="#"
                        class="w-11 h-11 flex items-center justify-center rounded-full bg-white text-[#C5A08A] shadow hover:scale-110 transition-transform">
                        <i class="fab fa-youtube"></i>
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
            © 2025 ToGlow. All rights reserved.
        </div>
    </footer>

    <!-- Back to Top Button -->
    <div class="back-to-top" id="backToTop">
        <i class="fas fa-chevron-up"></i>
    </div>

    <script>
        // Toggle mobile menu
        const toggle = document.getElementById("menu-toggle");
        const menu = document.getElementById("mobile-menu");
        toggle.addEventListener("click", () => {
            menu.classList.toggle("hidden");
        });

        // Back to top button
        const backToTopButton = document.getElementById("backToTop");
        
        window.addEventListener("scroll", () => {
            if (window.pageYOffset > 300) {
                backToTopButton.classList.add("active");
            } else {
                backToTopButton.classList.remove("active");
            }
        });
        
        backToTopButton.addEventListener("click", () => {
            window.scrollTo({
                top: 0,
                behavior: "smooth"
            });
        });

        // Scroll-based animations with IntersectionObserver
        const faders = document.querySelectorAll(".fade-in, .fade-in-up, .scale-in");
        
        const appearOptions = {
            threshold: 0.2,
            rootMargin: "0px 0px -50px 0px"
        };

        const appearOnScroll = new IntersectionObserver((entries, observer) => {
            entries.forEach((entry) => {
                if (entry.isIntersecting) {
                    entry.target.classList.add("is-visible");
                    observer.unobserve(entry.target);
                }
            });
        }, appearOptions);

        faders.forEach(fader => appearOnScroll.observe(fader));

        // Social share buttons
        const currentUrl = encodeURIComponent(window.location.href);
        const title = encodeURIComponent(document.title);
        
        document.querySelector('.social-share .facebook').href = `https://www.facebook.com/sharer/sharer.php?u=${currentUrl}`;
        document.querySelector('.social-share .twitter').href = `https://twitter.com/intent/tweet?url=${currentUrl}&text=${title}`;
        document.querySelector('.social-share .linkedin').href = `https://www.linkedin.com/sharing/share-offsite/?url=${currentUrl}`;
        document.querySelector('.social-share .pinterest').href = `https://pinterest.com/pin/create/button/?url=${currentUrl}&description=${title}`;
        document.querySelector('.social-share .whatsapp').href = `https://api.whatsapp.com/send?text=${title}%20${currentUrl}`;
    </script>
</body>

</html>