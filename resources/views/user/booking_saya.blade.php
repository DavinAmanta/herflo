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
        padding: 0.5rem 1.5rem;
        border-radius: 50px;
        font-weight: 600;
        transition: all 0.3s ease-in-out;
        font-size: 0.875rem;
    }

    .btn-custom:hover {
        background-color: #b88c7a;
        transform: translateY(-2px);
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
    }

    .btn-secondary {
        background-color: #7d6b60;
        color: white;
        padding: 0.5rem 1.5rem;
        border-radius: 50px;
        font-weight: 600;
        transition: all 0.3s ease-in-out;
        font-size: 0.875rem;
    }

    .btn-secondary:hover {
        background-color: #6a5a50;
        transform: translateY(-2px);
    }

    .btn-outline {
        background-color: transparent;
        border: 2px solid #D3A796;
        color: #D3A796;
        padding: 0.5rem 1.5rem;
        border-radius: 50px;
        font-weight: 600;
        transition: all 0.3s ease-in-out;
        font-size: 0.875rem;
    }

    .btn-outline:hover {
        background-color: #D3A796;
        color: white;
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

    .booking-card {
        background-color: white;
        border-radius: 15px;
        padding: 1.5rem;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
        margin-bottom: 1.5rem;
        border-left: 4px solid #D3A796;
    }

    .booking-card.pending {
        border-left-color: #FFA726;
    }

    .booking-card.approved {
        border-left-color: #4CAF50;
    }

    .booking-card.rejected {
        border-left-color: #F44336;
    }

    .status-badge {
        padding: 0.25rem 0.75rem;
        border-radius: 20px;
        font-size: 0.75rem;
        font-weight: 600;
        text-transform: uppercase;
    }

    .status-pending {
        background-color: #FFF3E0;
        color: #EF6C00;
    }

    .status-approved {
        background-color: #E8F5E8;
        color: #2E7D32;
    }

    .status-rejected {
        background-color: #FFEBEE;
        color: #C62828;
    }

    .payment-badge {
        padding: 0.25rem 0.75rem;
        border-radius: 20px;
        font-size: 0.75rem;
        font-weight: 600;
        text-transform: uppercase;
    }

    .payment-pending {
        background-color: #FFF3E0;
        color: #EF6C00;
    }

    .payment-paid {
        background-color: #E8F5E8;
        color: #2E7D32;
    }

    .booking-header {
        display: flex;
        justify-content: between;
        align-items: flex-start;
        margin-bottom: 1rem;
    }

    .booking-title {
        font-weight: 700;
        color: #4a3f35;
        font-size: 1.125rem;
        margin-bottom: 0.5rem;
    }

    .booking-meta {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
        gap: 1rem;
        margin-bottom: 1rem;
    }

    .meta-item {
        display: flex;
        flex-direction: column;
    }

    .meta-label {
        font-size: 0.75rem;
        color: #7d6b60;
        font-weight: 500;
        margin-bottom: 0.25rem;
    }

    .meta-value {
        font-weight: 600;
        color: #4a3f35;
    }

    .booking-actions {
        display: flex;
        gap: 0.5rem;
        flex-wrap: wrap;
    }

    .empty-state {
        text-align: center;
        padding: 3rem 2rem;
        color: #7d6b60;
    }

    .empty-icon {
        font-size: 4rem;
        margin-bottom: 1rem;
        color: #D3A796;
        opacity: 0.5;
    }

    .filter-tabs {
        display: flex;
        background-color: white;
        border-radius: 15px;
        padding: 0.5rem;
        margin-bottom: 2rem;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.08);
    }

    .filter-tab {
        flex: 1;
        padding: 0.75rem 1rem;
        text-align: center;
        border-radius: 10px;
        font-weight: 600;
        cursor: pointer;
        transition: all 0.3s ease;
        color: #7d6b60;
    }

    .filter-tab.active {
        background-color: #D3A796;
        color: white;
    }

    .filter-tab:hover:not(.active) {
        background-color: #f8f4f1;
    }

    .booking-date {
        font-size: 0.875rem;
        color: #7d6b60;
        margin-bottom: 0.5rem;
    }

    .price-tag {
        background-color: #f8f4f1;
        padding: 0.5rem 1rem;
        border-radius: 25px;
        font-weight: 700;
        color: #4a3f35;
        font-size: 0.875rem;
    }

    @media (max-width: 768px) {
        .booking-header {
            flex-direction: column;
            gap: 1rem;
        }

        .booking-actions {
            width: 100%;
            justify-content: flex-start;
        }

        .booking-meta {
            grid-template-columns: 1fr;
        }
    }

</style>
</head>

<body class="bg-[#f8f4f1] text-gray-800">
    <!-- Hero Section -->
    <section class="pt-28 lg:pt-32 pb-16 bg-gradient-to-br from-white via-[#fdf9f7] to-[#f8f4f1]">
        <div class="container mx-auto px-6 lg:px-16">
            <div class="text-center max-w-3xl mx-auto fade-in-up">
                <h1 class="text-3xl lg:text-4xl font-extrabold text-[#4a3f35] leading-tight mb-4">
                    Data <span class="text-[#D3A796]">Booking Saya</span>
                </h1>
                <p class="text-[#3a2d28] text-lg leading-relaxed">
                    Kelola dan pantau semua booking kelas kebugaran Anda di satu tempat
                </p>
            </div>
        </div>
    </section>

    <!-- Main Content -->
    <section class="py-8 pb-16">
        <div class="container mx-auto px-6 lg:px-16">
            <!-- Filter Tabs -->
            <div class="filter-tabs fade-in">
                <div class="filter-tab active" data-filter="all">Semua Booking</div>
                <div class="filter-tab" data-filter="pending">Menunggu</div>
                <div class="filter-tab" data-filter="approved">Disetujui</div>
                <div class="filter-tab" data-filter="rejected">Ditolak</div>
            </div>

            <!-- Booking List -->
            <div id="booking-container">
                @if($bookings->count() > 0)
                @foreach($bookings as $booking)
                <div class="booking-card fade-in-up {{ $booking->status }}" data-status="{{ $booking->status }}">
                    <div class="booking-header">
                        <div class="flex-1">
                            <div class="booking-date">
                                Dibooking pada {{ \Carbon\Carbon::parse($booking->created_at)->format('d F Y H:i') }}
                            </div>
                            <h3 class="booking-title">
                                {{ $booking->jadwalKelas->nama_kelas }} -
                                {{ $booking->jadwalKelas->instruktur->user->name }}
                            </h3>
                        </div>
                        <div class="flex items-center gap-3">
                            <span class="status-badge status-{{ $booking->status }}">
                                {{ $booking->status }}
                            </span>
                            <span
                                class="payment-badge payment-{{ $booking->status_bayar === 'lunas' ? 'paid' : 'pending' }}">
                                {{ $booking->status_bayar === 'lunas' ? 'Lunas' : 'Belum Lunas' }}
                            </span>
                        </div>
                    </div>

                    <div class="booking-meta">
                        <div class="meta-item">
                            <span class="meta-label">Hari & Jam</span>
                            <span class="meta-value">
                                {{ $booking->jadwalKelas->hari }},
                                {{ \Carbon\Carbon::parse($booking->jadwalKelas->waktu)->format('H:i') }}
                            </span>
                        </div>
                        <div class="meta-item">
                            <span class="meta-label">Tanggal Kelas</span>
                            <span class="meta-value">
                                {{ \Carbon\Carbon::parse($booking->tanggal)->format('d F Y') }}
                            </span>
                        </div>
                        <div class="meta-item">
                            <span class="meta-label">Instruktur</span>
                            <span class="meta-value">
                                {{ $booking->jadwalKelas->instruktur->user->name }}
                            </span>
                        </div>
                        <div class="meta-item">
                            <span class="meta-label">Biaya</span>
                            <span class="price-tag">
                                Rp {{ number_format($booking->jadwalKelas->instruktur->biaya, 0, ',', '.') }}
                            </span>
                        </div>
                    </div>

                    <div class="booking-actions">
                        @if($booking->status === 'pending' && $booking->status_bayar === 'belum_lunas')
                        <a href="{{ route('member.pembayaran', $booking->id) }}" class="btn-custom">
                            Bayar Sekarang
                        </a>
                        <button class="btn-outline" onclick="cancelBooking({{ $booking->id }})">
                            Batalkan
                        </button>
                        {{-- @elseif($booking->status === 'approved' && $booking->status_bayar === 'lunas')
                                <button class="btn-secondary" onclick="showClassDetails({{ $booking->id }})">
                        Detail Kelas
                        </button>
                        <button class="btn-outline" onclick="downloadInvoice({{ $booking->id }})">
                            Download Invoice
                        </button> --}}
                        @elseif($booking->status === 'rejected')
                        <a href="{{ route('trainer.index') }}"><button class="btn-outline">
                                Booking Ulang
                            </button></a>
                        @endif

                        @if($booking->status === 'pending' && $booking->status_bayar === 'lunas')
                        <span class="text-sm text-gray-500">Menunggu konfirmasi admin</span>
                        @endif
                    </div>
                </div>
                @endforeach
                @else
                <div class="empty-state fade-in-up">
                    <div class="empty-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-16 w-16 mx-auto" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-[#7d6b60] mb-2">Belum Ada Booking</h3>
                    <p class="text-gray-600 mb-6">Anda belum memiliki booking kelas. Yuk, booking kelas pertama Anda!
                    </p>
                    <a href="{{ route('trainer.index') }}" class="btn-custom">
                        Cari Kelas
                    </a>
                </div>
                @endif
            </div>

            <!-- Pagination -->
            @if($bookings->count() > 0)
            <div class="mt-8 flex justify-center fade-in">
                <div class="flex space-x-2">
                    @if($bookings->onFirstPage())
                    <span class="px-3 py-2 bg-gray-200 text-gray-500 rounded-lg cursor-not-allowed">Sebelumnya</span>
                    @else
                    <a href="{{ $bookings->previousPageUrl() }}"
                        class="px-3 py-2 bg-[#D3A796] text-white rounded-lg hover:bg-[#b88c7a] transition">Sebelumnya</a>
                    @endif

                    @foreach(range(1, $bookings->lastPage()) as $page)
                    @if($page == $bookings->currentPage())
                    <span class="px-3 py-2 bg-[#7d6b60] text-white rounded-lg">{{ $page }}</span>
                    @else
                    <a href="{{ $bookings->url($page) }}"
                        class="px-3 py-2 bg-white text-[#7d6b60] rounded-lg hover:bg-[#f8f4f1] transition">{{ $page }}</a>
                    @endif
                    @endforeach

                    @if($bookings->hasMorePages())
                    <a href="{{ $bookings->nextPageUrl() }}"
                        class="px-3 py-2 bg-[#D3A796] text-white rounded-lg hover:bg-[#b88c7a] transition">Selanjutnya</a>
                    @else
                    <span class="px-3 py-2 bg-gray-200 text-gray-500 rounded-lg cursor-not-allowed">Selanjutnya</span>
                    @endif
                </div>
            </div>
            @endif
        </div>
    </section>

    <!-- Cancel Booking Modal -->
    <div id="cancel-modal" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50 hidden">
        <div class="bg-white rounded-2xl p-6 max-w-md mx-4">
            <h3 class="text-xl font-bold text-gray-800 mb-4">Batalkan Booking</h3>
            <p class="text-gray-600 mb-6">Apakah Anda yakin ingin membatalkan booking ini? Tindakan ini tidak dapat
                dibatalkan.</p>
            <div class="flex space-x-3">
                <button id="confirm-cancel"
                    class="flex-1 py-2 bg-red-600 text-white rounded-lg font-semibold hover:bg-red-700 transition">
                    Ya, Batalkan
                </button>
                <button id="close-cancel-modal"
                    class="flex-1 py-2 border border-gray-300 text-gray-700 rounded-lg font-semibold hover:bg-gray-50 transition">
                    Batal
                </button>
            </div>
        </div>
    </div>
</body>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        // Filter functionality
        const filterTabs = document.querySelectorAll('.filter-tab');
        const bookingCards = document.querySelectorAll('.booking-card');

        filterTabs.forEach(tab => {
            tab.addEventListener('click', function () {
                // Remove active class from all tabs
                filterTabs.forEach(t => t.classList.remove('active'));

                // Add active class to clicked tab
                this.classList.add('active');

                const filter = this.getAttribute('data-filter');

                // Show/hide booking cards based on filter
                bookingCards.forEach(card => {
                    if (filter === 'all' || card.getAttribute('data-status') ===
                        filter) {
                        card.style.display = 'block';
                    } else {
                        card.style.display = 'none';
                    }
                });
            });
        });

        // Cancel booking modal
        const cancelModal = document.getElementById('cancel-modal');
        const closeCancelModal = document.getElementById('close-cancel-modal');
        let currentBookingId = null;

        window.cancelBooking = function (bookingId) {
            currentBookingId = bookingId;
            cancelModal.classList.remove('hidden');
        };

        closeCancelModal.addEventListener('click', function () {
            cancelModal.classList.add('hidden');
            currentBookingId = null;
        });

        document.getElementById('confirm-cancel').addEventListener('click', function () {
            if (currentBookingId) {
                // Send cancel request
                fetch(`/member/booking/${currentBookingId}/cancel`, {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                        }
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            location.reload();
                        } else {
                            alert('Gagal membatalkan booking');
                        }
                    })
                    .catch(error => {
                        console.error('Error:', error);
                        alert('Terjadi kesalahan saat membatalkan booking');
                    });
            }
        });

        // Other action functions
        window.showClassDetails = function (bookingId) {
            alert(`Menampilkan detail kelas untuk booking ID: ${bookingId}`);
            // Implement class details modal or page
        };

        window.downloadInvoice = function (bookingId) {
            alert(`Mengunduh invoice untuk booking ID: ${bookingId}`);
            // Implement invoice download
            // window.open(`/member/booking/${bookingId}/invoice`, '_blank');
        };

        window.rebookClass = function (bookingId) {
            alert(`Redirect ke halaman booking ulang untuk ID: ${bookingId}`);
            // Implement rebooking logic
            // window.location.href = `/member/booking/${bookingId}/rebook`;
        };

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
        document.querySelectorAll('.fade-in, .fade-in-up').forEach(el => {
            observer.observe(el);
        });
    });

</script>

@endsection
