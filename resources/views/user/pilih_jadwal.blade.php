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

    .schedule-day {
        background-color: white;
        border-radius: 15px;
        padding: 1.5rem;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
        transition: all 0.3s ease;
    }

    .schedule-day:hover {
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.12);
        transform: translateY(-3px);
    }

    .day-header {
        font-weight: 700;
        color: #7d6b60;
        margin-bottom: 1rem;
        padding-bottom: 0.75rem;
        border-bottom: 2px solid #f8f4f1;
    }

    .class-item {
        background-color: #f8f4f1;
        border-radius: 10px;
        padding: 1rem;
        margin-bottom: 0.75rem;
        transition: all 0.3s ease;
        cursor: pointer;
        border: 2px solid transparent;
    }

    .class-item:hover {
        background-color: #e8dfd9;
        transform: translateX(5px);
    }

    .class-item.selected {
        background-color: #D3A796;
        color: white;
        border-color: #b88c7a;
    }

    .class-time {
        font-weight: 600;
        font-size: 0.9rem;
    }

    .class-name {
        font-weight: 500;
        margin-top: 0.25rem;
    }

    .trainer-name {
        font-size: 0.8rem;
        color: #7d6b60;
        margin-top: 0.25rem;
    }

    .class-item.selected .trainer-name {
        color: rgba(255, 255, 255, 0.9);
    }

    .booking-summary {
        background-color: white;
        border-radius: 15px;
        padding: 1.5rem;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
        position: sticky;
        top: 2rem;
    }

    .summary-title {
        font-weight: 700;
        color: #7d6b60;
        margin-bottom: 1rem;
        padding-bottom: 0.75rem;
        border-bottom: 2px solid #f8f4f1;
    }

    .summary-item {
        margin-bottom: 1rem;
    }

    .summary-label {
        font-size: 0.9rem;
        color: #7d6b60;
    }

    .summary-value {
        font-weight: 600;
        color: #4a3f35;
    }

    .empty-state {
        text-align: center;
        padding: 2rem;
        color: #7d6b60;
    }

    .empty-icon {
        font-size: 3rem;
        margin-bottom: 1rem;
        color: #D3A796;
    }

    .filter-btn {
        background-color: white;
        border: 1px solid #D3A796;
        color: #7d6b60;
        padding: 0.5rem 1rem;
        border-radius: 50px;
        font-weight: 500;
        transition: all 0.3s ease;
        margin-right: 0.5rem;
        margin-bottom: 0.5rem;
    }

    .filter-btn.active {
        background-color: #D3A796;
        color: white;
    }

    .filter-btn:hover:not(.active) {
        background-color: #f8f4f1;
    }
</style>
</head>

<body class="bg-[#f8f4f1] text-gray-800">
    <!-- Hero Section -->
    <section class="pt-28 lg:pt-32 pb-16 bg-gradient-to-br from-white via-[#fdf9f7] to-[#f8f4f1]">
        <div class="container mx-auto px-6 lg:px-16">
            <div class="text-center max-w-3xl mx-auto fade-in-up">
                <h1 class="text-3xl lg:text-4xl font-extrabold text-[#4a3f35] leading-tight mb-4">
                    Pilih <span class="text-[#D3A796]">Jadwal Kelas</span> yang Tepat untuk Anda
                </h1>
                <p class="text-[#3a2d28] text-lg leading-relaxed">
                    Temukan kelas kebugaran yang sesuai dengan waktu dan kebutuhan Anda. Semua kelas dipandu oleh trainer profesional HerFlo.
                </p>
            </div>
        </div>
    </section>

    <!-- Main Content -->
    <section class="py-8 pb-16">
        <div class="container mx-auto px-6 lg:px-16">
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                <!-- Schedule Section -->
                <div class="lg:col-span-2">
                    <!-- Filter Section -->
                    <div class="mb-8 fade-in">
                        <h3 class="text-xl font-bold text-[#7d6b60] mb-4">Filter Berdasarkan Hari</h3>
                        <div class="flex flex-wrap">
                            <button class="filter-btn active" data-day="all">Semua Hari</button>
                            <button class="filter-btn" data-day="Senin">Senin</button>
                            <button class="filter-btn" data-day="Selasa">Selasa</button>
                            <button class="filter-btn" data-day="Rabu">Rabu</button>
                            <button class="filter-btn" data-day="Kamis">Kamis</button>
                            <button class="filter-btn" data-day="Jumat">Jumat</button>
                            <button class="filter-btn" data-day="Sabtu">Sabtu</button>
                            <button class="filter-btn" data-day="Minggu">Minggu</button>
                        </div>
                    </div>

                    <div id="schedule-container">
                        @php
                            $days = ['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu', 'Minggu'];
                        @endphp
                        
                        @foreach($days as $day)
                        <div class="schedule-day mb-6 fade-in-up" data-day="{{ $day }}">
                            <h3 class="day-header text-lg">{{ $day }}</h3>
                            
                            @php
                                $dayClasses = $jadwalKelas->where('hari', $day)->sortBy('waktu');
                            @endphp
                            
                            @if($dayClasses->count() > 0)
                                @foreach($dayClasses as $jadwal)
                                <div class="class-item staggered-item" 
                                     data-id="{{ $jadwal->id }}"
                                     data-nama="{{ $jadwal->nama_kelas }}"
                                     data-hari="{{ $jadwal->hari }}"
                                     data-waktu="{{ \Carbon\Carbon::parse($jadwal->waktu)->format('H:i') }}"
                                     data-instruktur="{{ $jadwal->instruktur->user->name }}"
                                     data-biaya="{{ $jadwal->instruktur->biaya }}">
                                    <div class="class-time">
                                        {{ \Carbon\Carbon::parse($jadwal->waktu)->format('H:i') }}
                                    </div>
                                    <div class="class-name">
                                        {{ $jadwal->nama_kelas }}
                                    </div>
                                    <div class="trainer-name">
                                        {{ $jadwal->instruktur->user->name }}
                                    </div>
                                </div>
                                @endforeach
                            @else
                                <div class="empty-state">
                                    <div class="empty-icon">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 mx-auto" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                        </svg>
                                    </div>
                                    <p>Tidak ada kelas yang tersedia pada hari {{ $day }}</p>
                                </div>
                            @endif
                        </div>
                        @endforeach
                    </div>
                </div>

                <!-- Booking Summary -->
                <div class="lg:col-span-1">
                    <div class="booking-summary fade-in">
                        <h3 class="summary-title">Ringkasan Pemesanan</h3>
                        
                        <div id="empty-booking" class="empty-state">
                            <div class="empty-icon">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 mx-auto" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                                </svg>
                            </div>
                            <p>Pilih kelas untuk melihat detail pemesanan</p>
                        </div>
                        
                        <div id="booking-details" class="hidden">
                            <div class="summary-item">
                                <div class="summary-label">Kelas</div>
                                <div id="selected-class" class="summary-value"></div>
                            </div>
                            
                            <div class="summary-item">
                                <div class="summary-label">Hari & Waktu</div>
                                <div id="selected-schedule" class="summary-value"></div>
                            </div>
                            
                            <div class="summary-item">
                                <div class="summary-label">Instruktur</div>
                                <div id="selected-trainer" class="summary-value"></div>
                            </div>
                            
                            <div class="summary-item">
                                <div class="summary-label">Biaya per Sesi</div>
                                <div id="selected-fee" class="summary-value"></div>
                            </div>
                            
                            <div class="mt-6 pt-4 border-t border-[#f8f4f1]">
                                <button id="book-now-btn" class="w-full py-3 btn-custom hover:scale-105 transition">
                                    Pesan Sekarang
                                </button>
                                <button id="change-selection" class="w-full py-3 mt-3 text-[#7d6b60] font-medium hover:text-[#D3A796] transition">
                                    Ganti Pilihan
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Filter by day functionality
        const filterButtons = document.querySelectorAll('.filter-btn');
        const scheduleDays = document.querySelectorAll('.schedule-day');
        
        filterButtons.forEach(button => {
            button.addEventListener('click', function() {
                // Remove active class from all buttons
                filterButtons.forEach(btn => btn.classList.remove('active'));
                
                // Add active class to clicked button
                this.classList.add('active');
                
                const selectedDay = this.getAttribute('data-day');
                
                // Show/hide schedule days based on filter
                scheduleDays.forEach(day => {
                    if (selectedDay === 'all' || day.getAttribute('data-day') === selectedDay) {
                        day.style.display = 'block';
                    } else {
                        day.style.display = 'none';
                    }
                });
            });
        });
        
        // Class selection functionality
        const classItems = document.querySelectorAll('.class-item');
        const emptyBooking = document.getElementById('empty-booking');
        const bookingDetails = document.getElementById('booking-details');
        const selectedClass = document.getElementById('selected-class');
        const selectedSchedule = document.getElementById('selected-schedule');
        const selectedTrainer = document.getElementById('selected-trainer');
        const selectedFee = document.getElementById('selected-fee');
        const bookNowBtn = document.getElementById('book-now-btn');
        const changeSelectionBtn = document.getElementById('change-selection');
        
        let selectedClassId = null;
        
        classItems.forEach(item => {
            item.addEventListener('click', function() {
                // Remove selected class from all items
                classItems.forEach(i => i.classList.remove('selected'));
                
                // Add selected class to clicked item
                this.classList.add('selected');
                
                // Get class details
                selectedClassId = this.getAttribute('data-id');
                const className = this.getAttribute('data-nama');
                const classDay = this.getAttribute('data-hari');
                const classTime = this.getAttribute('data-waktu');
                const trainerName = this.getAttribute('data-instruktur');
                const classFee = this.getAttribute('data-biaya');
                
                // Update booking summary
                selectedClass.textContent = className;
                selectedSchedule.textContent = `${classDay}, ${classTime}`;
                selectedTrainer.textContent = trainerName;
                selectedFee.textContent = `Rp ${parseInt(classFee).toLocaleString('id-ID')}`;
                
                // Show booking details
                emptyBooking.classList.add('hidden');
                bookingDetails.classList.remove('hidden');
            });
        });
        
        // Change selection button
        changeSelectionBtn.addEventListener('click', function() {
            // Remove selected class from all items
            classItems.forEach(i => i.classList.remove('selected'));
            
            // Show empty state
            emptyBooking.classList.remove('hidden');
            bookingDetails.classList.add('hidden');
            
            selectedClassId = null;
        });
        
        bookNowBtn.addEventListener('click', function() {
            if (selectedClassId) {
                // arahkan ke TransaksiController@booking
                window.location.href = `/member/booking/${selectedClassId}`;
            } else {
                alert('Silakan pilih kelas terlebih dahulu');
            }
        });

        
        // Animation on scroll
        const observerOptions = {
            threshold: 0.1,
            rootMargin: '0px 0px -50px 0px'
        };
        
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('is-visible');
                }
            });
        }, observerOptions);
        
        // Observe all animated elements
        document.querySelectorAll('.fade-in, .fade-in-up, .staggered-item').forEach(el => {
            observer.observe(el);
        });
    });
</script>

@endsection