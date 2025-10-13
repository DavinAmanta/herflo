@extends('user.layout.member')
@section('konten')
<style>
    /* ==== Styling tetap sama dengan milikmu di atas ==== */
    body { font-family: 'Poppins', sans-serif; overflow-x: hidden; }
    .btn-custom { background-color: #D3A796; color: white; padding: 0.75rem 2rem; border-radius: 50px; font-weight: 600; transition: all 0.3s ease-in-out; }
    .btn-custom:hover { background-color: #b88c7a; transform: translateY(-2px); box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2); }
    .section-title { font-weight: 700; color: #7d6b60; margin-bottom: 1.5rem; border-bottom: 2px solid #f8f4f1; padding-bottom: 0.75rem; }
    .summary-item { display: flex; justify-content: space-between; margin-bottom: 1rem; border-bottom: 1px solid #f8f4f1; padding-bottom: 0.5rem; }
    .summary-value { font-weight: 600; text-align: right; color: #4a3f35; }
    .total-item { display: flex; justify-content: space-between; border-top: 2px solid #f8f4f1; padding-top: 1rem; font-weight: 700; font-size: 1.1rem; }
    .payment-method { background-color: #f8f4f1; border-radius: 10px; padding: 1rem; margin-bottom: 1rem; cursor: pointer; transition: all 0.3s ease; border: 2px solid transparent; }
    .payment-method:hover { background-color: #e8dfd9; }
    .payment-method.selected { background-color: #D3A796; color: white; border-color: #b88c7a; }
</style>

<section class="pt-28 pb-16 bg-gradient-to-br from-white via-[#fdf9f7] to-[#f8f4f1]">
    <div class="container mx-auto px-6 lg:px-16 text-center">
        <h1 class="text-3xl lg:text-4xl font-extrabold text-[#4a3f35] mb-4">
            Selesaikan <span class="text-[#D3A796]">Pembayaran Membership</span>
        </h1>
        <p class="text-[#3a2d28] text-lg">Lengkapi pembayaran untuk aktifasi akun member Anda</p>
    </div>
</section>

<section class="py-8 pb-16">
    <div class="container mx-auto px-6 lg:px-16 grid grid-cols-1 lg:grid-cols-3 gap-8">
        
        <!-- Detail Member -->
        <div class="lg:col-span-2 bg-white p-6 rounded-2xl shadow-md">
            <h2 class="section-title">Detail Pendaftaran Member</h2>
            <div class="summary-item">
                <div class="summary-label">Nama</div>
                <div class="summary-value">{{ Auth::user()->name }}</div>
            </div>
            <div class="summary-item">
                <div class="summary-label">Tanggal Daftar</div>
                <div class="summary-value">{{ \Carbon\Carbon::parse($member->tgl_daftar ?? now())->format('d F Y') }}</div>
            </div>
            <div class="summary-item">
                <div class="summary-label">Status Pembayaran</div>
                <div class="summary-value text-{{ $member->status_bayar == 'lunas' ? 'green' : 'red' }}-600">
                    {{ ucfirst($member->status_bayar ?? 'Belum Bayar') }}
                </div>
            </div>

            <h2 class="section-title mt-8">Pilih Metode Pembayaran</h2>
            <div class="payment-method" data-method="bank_transfer">
                <div class="flex items-center gap-3">
                    <div class="payment-icon bg-white p-2 rounded">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-[#D3A796]" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z" />
                        </svg>
                    </div>
                    <div>
                        <div class="font-semibold">Transfer Bank</div>
                        <div class="text-sm opacity-75">BCA, BNI, Mandiri, BRI</div>
                    </div>
                </div>
            </div>

            <div id="bank-details" class="hidden mt-4 p-4 bg-[#f8f4f1] rounded-lg">
                <h4 class="font-semibold mb-3">Instruksi Pembayaran</h4>
                <div class="text-sm space-y-2">
                    <div class="flex justify-between"><span>Bank</span><span class="font-semibold">BCA</span></div>
                    <div class="flex justify-between"><span>No. Rekening</span><span class="font-semibold">1234567890</span></div>
                    <div class="flex justify-between"><span>Atas Nama</span><span class="font-semibold">ToGlow FITNESS</span></div>
                    <p class="mt-3 text-yellow-800 bg-yellow-50 p-2 rounded text-xs">
                        Mohon transfer sesuai total nominal agar aktivasi membership berhasil.
                    </p>
                </div>
            </div>
        </div>

        <!-- Ringkasan Pembayaran -->
        <div class="bg-white p-6 rounded-2xl shadow-md">
            <h2 class="section-title">Ringkasan Biaya</h2>
            <div class="summary-item">
                <div class="summary-label">Biaya Membership</div>
                <div class="summary-value">Rp {{ number_format($paket->harga ?? 200000, 0, ',', '.') }}</div>
            </div>
            <div class="summary-item">
                <div class="summary-label">Durasi</div>
                <div class="summary-value">{{ $paket->durasi ?? '1 Bulan' }}</div>
            </div>
            <div class="total-item">
                <div>Total</div>
                <div>Rp {{ number_format($paket->harga ?? 200000, 0, ',', '.') }}</div>
            </div>

            <form action="{{ route('daftar.update',$member->id) }}" method="POST" class="mt-6">
                @csrf
                @method('PUT')
                <button type="submit" class="w-full py-3 btn-custom">Bayar Sekarang</button>
            </form>
        </div>
    </div>
</section>

<script>
    // efek klik metode pembayaran
    document.querySelectorAll('.payment-method').forEach(el => {
        el.addEventListener('click', () => {
            document.querySelectorAll('.payment-method').forEach(m => m.classList.remove('selected'));
            el.classList.add('selected');
            document.getElementById('bank-details').classList.toggle('hidden', el.dataset.method !== 'bank_transfer');
        });
    });
</script>
@endsection
