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

    .btn-secondary {
        background-color: #7d6b60;
        color: white;
        padding: 0.75rem 2rem;
        border-radius: 50px;
        font-weight: 600;
        transition: all 0.3s ease-in-out;
    }

    .btn-secondary:hover {
        background-color: #6a5a50;
        transform: translateY(-2px);
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
        padding: 2rem;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
        margin-bottom: 1.5rem;
    }

    .section-title {
        font-weight: 700;
        color: #7d6b60;
        margin-bottom: 1.5rem;
        padding-bottom: 0.75rem;
        border-bottom: 2px solid #f8f4f1;
        font-size: 1.25rem;
    }

    .summary-item {
        display: flex;
        justify-content: between;
        margin-bottom: 1rem;
        padding-bottom: 0.75rem;
        border-bottom: 1px solid #f8f4f1;
    }

    .summary-label {
        flex: 1;
        font-size: 0.9rem;
        color: #7d6b60;
    }

    .summary-value {
        flex: 1;
        font-weight: 600;
        color: #4a3f35;
        text-align: right;
    }

    .total-item {
        display: flex;
        justify-content: between;
        margin-top: 1rem;
        padding-top: 1rem;
        border-top: 2px solid #f8f4f1;
        font-weight: 700;
        font-size: 1.1rem;
    }

    .payment-method {
        background-color: #f8f4f1;
        border-radius: 10px;
        padding: 1rem;
        margin-bottom: 1rem;
        cursor: pointer;
        transition: all 0.3s ease;
        border: 2px solid transparent;
    }

    .payment-method:hover {
        background-color: #e8dfd9;
    }

    .payment-method.selected {
        background-color: #D3A796;
        color: white;
        border-color: #b88c7a;
    }

    .payment-icon {
        width: 40px;
        height: 40px;
        background-color: white;
        border-radius: 8px;
        display: flex;
        align-items: center;
        justify-content: center;
        margin-right: 1rem;
    }

    .payment-method.selected .payment-icon {
        background-color: rgba(255, 255, 255, 0.2);
    }

    .form-group {
        margin-bottom: 1.5rem;
    }

    .form-label {
        display: block;
        margin-bottom: 0.5rem;
        font-weight: 600;
        color: #7d6b60;
    }

    .form-input {
        width: 100%;
        padding: 0.75rem 1rem;
        border: 2px solid #f8f4f1;
        border-radius: 10px;
        font-size: 1rem;
        transition: all 0.3s ease;
    }

    .form-input:focus {
        outline: none;
        border-color: #D3A796;
        box-shadow: 0 0 0 3px rgba(211, 167, 150, 0.1);
    }

    .checkbox-group {
        display: flex;
        align-items: center;
        margin-bottom: 1rem;
    }

    .checkbox-input {
        margin-right: 0.75rem;
        width: 18px;
        height: 18px;
        accent-color: #D3A796;
    }

    .checkbox-label {
        font-size: 0.9rem;
        color: #7d6b60;
    }

    .discount-badge {
        background-color: #e8f5e8;
        color: #2e7d32;
        padding: 0.25rem 0.75rem;
        border-radius: 20px;
        font-size: 0.75rem;
        font-weight: 500;
        margin-left: 0.5rem;
    }

    .security-badge {
        display: flex;
        align-items: center;
        justify-content: center;
        margin-top: 1rem;
        color: #7d6b60;
        font-size: 0.875rem;
    }

    .security-icon {
        margin-right: 0.5rem;
        color: #4CAF50;
    }

    .loading-spinner {
        display: none;
        width: 20px;
        height: 20px;
        border: 2px solid #ffffff;
        border-radius: 50%;
        border-top-color: transparent;
        animation: spin 1s ease-in-out infinite;
        margin-right: 0.5rem;
    }

    @keyframes spin {
        to {
            transform: rotate(360deg);
        }
    }

    .processing-payment {
        pointer-events: none;
        opacity: 0.7;
    }

</style>
</head>

<body class="bg-[#f8f4f1] text-gray-800">
    <!-- Hero Section -->
    <section class="pt-28 lg:pt-32 pb-16 bg-gradient-to-br from-white via-[#fdf9f7] to-[#f8f4f1]">
        <div class="container mx-auto px-6 lg:px-16">
            <div class="text-center max-w-3xl mx-auto fade-in-up">
                <h1 class="text-3xl lg:text-4xl font-extrabold text-[#4a3f35] leading-tight mb-4">
                    Lengkapi <span class="text-[#D3A796]">Pembayaran</span>
                </h1>
                <p class="text-[#3a2d28] text-lg leading-relaxed">
                    Selesaikan pembayaran untuk mengkonfirmasi booking kelas Anda
                </p>
            </div>
        </div>
    </section>

    <!-- Main Content -->
    <section class="py-8 pb-16">
        <div class="container mx-auto px-6 lg:px-16">
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                <!-- Payment Form -->
                <div class="lg:col-span-2">
                    <!-- Booking Summary -->
                    <div class="booking-card fade-in">
                        <h2 class="section-title">Detail Booking</h2>
                        <div class="summary-item">
                            <div class="summary-label">Kelas</div>
                            <div class="summary-value" id="booking-class">
                                {{ $booking->jadwalKelas->nama_kelas ?? 'N/A' }}</div>
                        </div>
                        <div class="summary-item">
                            <div class="summary-label">Instruktur</div>
                            <div class="summary-value" id="booking-trainer">
                                {{ $booking->jadwalKelas->instruktur->user->name ?? 'N/A' }}</div>
                        </div>
                        <div class="summary-item">
                            <div class="summary-label">Hari & Waktu</div>
                            <div class="summary-value" id="booking-schedule">
                                {{ $booking->jadwalKelas->hari ?? 'N/A' }},
                                {{ \Carbon\Carbon::parse($booking->jadwalKelas->waktu ?? now())->format('H:i') }}
                            </div>
                        </div>
                        <div class="summary-item">
                            <div class="summary-label">Tanggal Booking</div>
                            <div class="summary-value" id="booking-date">
                                {{ \Carbon\Carbon::parse($booking->created_at ?? now())->format('d F Y') }}
                            </div>
                        </div>
                    </div>

                    <!-- Payment Method -->
                    <div class="booking-card fade-in-up">
                        <h2 class="section-title">Metode Pembayaran</h2>

                        <div class="payment-method" data-method="bank_transfer">
                            <div class="flex items-center">
                                <div class="payment-icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-[#D3A796]" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z" />
                                    </svg>
                                </div>
                                <div>
                                    <div class="font-semibold">Transfer Bank</div>
                                    <div class="text-sm opacity-75">BCA, BNI, Mandiri, BRI</div>
                                </div>
                            </div>
                        </div>

                        <div class="payment-method" data-method="credit_card">
                            <div class="flex items-center">
                                <div class="payment-icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-[#D3A796]" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z" />
                                    </svg>
                                </div>
                                <div>
                                    <div class="font-semibold">Kartu Kredit</div>
                                    <div class="text-sm opacity-75">Visa, Mastercard, JCB</div>
                                </div>
                            </div>
                        </div>

                        <div class="payment-method" data-method="e_wallet">
                            <div class="flex items-center">
                                <div class="payment-icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-[#D3A796]" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2zm7-5a2 2 0 11-4 0 2 2 0 014 0z" />
                                    </svg>
                                </div>
                                <div>
                                    <div class="font-semibold">E-Wallet</div>
                                    <div class="text-sm opacity-75">Gopay, OVO, Dana, LinkAja</div>
                                </div>
                            </div>
                        </div>

                        <!-- Bank Transfer Details (Initially Hidden) -->
                        <div id="bank-details" class="hidden mt-4 p-4 bg-[#f8f4f1] rounded-lg">
                            <h4 class="font-semibold mb-3">Instruksi Transfer Bank</h4>
                            <div class="space-y-2 text-sm">
                                <div class="flex justify-between">
                                    <span>Bank</span>
                                    <span class="font-semibold">BCA</span>
                                </div>
                                <div class="flex justify-between">
                                    <span>Nomor Rekening</span>
                                    <span class="font-semibold">123 456 7890</span>
                                </div>
                                <div class="flex justify-between">
                                    <span>Atas Nama</span>
                                    <span class="font-semibold">HERFLO FITNESS</span>
                                </div>
                                <div class="mt-3 p-3 bg-yellow-50 rounded border border-yellow-200">
                                    <p class="text-yellow-800 text-xs">Harap transfer tepat sesuai nominal total
                                        pembayaran. Booking akan dikonfirmasi otomatis setelah pembayaran diverifikasi.
                                    </p>
                                </div>
                            </div>
                        </div>

                        <!-- Credit Card Form (Initially Hidden) -->
                        <div id="credit-card-form" class="hidden mt-4">
                            <div class="grid grid-cols-2 gap-4">
                                <div class="form-group">
                                    <label class="form-label">Nomor Kartu</label>
                                    <input type="text" class="form-input" placeholder="1234 5678 9012 3456"
                                        maxlength="19">
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Nama di Kartu</label>
                                    <input type="text" class="form-input" placeholder="John Doe">
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Masa Berlaku</label>
                                    <input type="text" class="form-input" placeholder="MM/YY" maxlength="5">
                                </div>
                                <div class="form-group">
                                    <label class="form-label">CVV</label>
                                    <input type="text" class="form-input" placeholder="123" maxlength="3">
                                </div>
                            </div>
                        </div>

                        <!-- E-Wallet Details (Initially Hidden) -->
                        <div id="e-wallet-details" class="hidden mt-4 p-4 bg-[#f8f4f1] rounded-lg">
                            <h4 class="font-semibold mb-3">Pilih E-Wallet</h4>
                            <div class="grid grid-cols-2 gap-3">
                                <button
                                    class="p-3 border border-[#D3A796] rounded-lg text-center hover:bg-[#f8f4f1] transition">
                                    <div class="font-semibold">Gopay</div>
                                </button>
                                <button
                                    class="p-3 border border-[#D3A796] rounded-lg text-center hover:bg-[#f8f4f1] transition">
                                    <div class="font-semibold">OVO</div>
                                </button>
                                <button
                                    class="p-3 border border-[#D3A796] rounded-lg text-center hover:bg-[#f8f4f1] transition">
                                    <div class="font-semibold">Dana</div>
                                </button>
                                <button
                                    class="p-3 border border-[#D3A796] rounded-lg text-center hover:bg-[#f8f4f1] transition">
                                    <div class="font-semibold">LinkAja</div>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Order Summary -->
                <div class="lg:col-span-1">
                    <div class="booking-card sticky top-4 fade-in">
                        <h2 class="section-title">Ringkasan Pembayaran</h2>

                        <div class="summary-item">
                            <div class="summary-label">Biaya Kelas</div>
                            <div class="summary-value">Rp
                                {{ number_format($booking->jadwalKelas->instruktur->biaya ?? 0, 0, ',', '.') }}</div>
                        </div>

                        <div class="total-item">
                            <div class="summary-label">Total</div>
                            <div class="summary-value" id="total-amount">
                                Rp {{ number_format($booking->jadwalKelas->instruktur->biaya ?? 0, 0, ',', '.') }}
                            </div>
                        </div>
                        <div class="checkbox-group mt-4">
                            <input type="checkbox" id="agree-terms" class="checkbox-input" required>
                            <label for="agree-terms" class="checkbox-label">
                                Saya menyetujui <a href="#" class="text-[#D3A796] hover:underline">Syarat &
                                    Ketentuan</a>
                                dan <a href="#" class="text-[#D3A796] hover:underline">Kebijakan Privasi</a>
                            </label>
                        </div>
                        <form action="{{ route('member.payment.process') }}" method="POST">
                            @csrf
                            <input type="hidden" name="booking_id" value="{{ $booking->id }}">
                            <button type="submit" class="w-full py-3 btn-custom hover:scale-105 transition mt-4">
                                <div class="loading-spinner"></div>
                                <span>Bayar Sekarang</span>
                            </button>
                        </form>

                        <div class="security-badge">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 security-icon" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                            </svg>
                            Pembayaran Aman & Terenkripsi
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>

@endsection
