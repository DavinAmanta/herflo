<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DaftarController;
use App\Http\Controllers\JadwalKelasController;

use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\TestimoniController;
use App\Http\Controllers\Admin\PendaftaranMemberController;
use App\Http\Controllers\Admin\GaleriController as AdminGaleriController;
use App\Http\Controllers\Admin\JadwalController as AdminJadwalController;
use App\Http\Controllers\Admin\MemberController as AdminMemberController;
use App\Http\Controllers\Admin\BookingController as AdminBookingController;
use App\Http\Controllers\Admin\InstrukturController as AdminInstrukturController;

use App\Http\Controllers\InstrukturController as FrontInstrukturController;
use App\Http\Controllers\Instruktur\InstrukturController as InstrukturDashboardController;
use App\Http\Controllers\TransaksiController;

/*
|--------------------------------------------------------------------------
| Guest (belum login) & General Routes
|--------------------------------------------------------------------------
*/
Route::get('/', function () {
    return view('user.home');
})->name('home');

Route::resource('/daftar', DaftarController::class);
Route::resource('/trainer', FrontInstrukturController::class); 

Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login'])->name('login.post');

    Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
    Route::post('/register', [AuthController::class, 'register'])->name('register.post');
});

/*
|--------------------------------------------------------------------------
| Authenticated (semua yang sudah login)
|--------------------------------------------------------------------------
*/
Route::middleware('auth')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    Route::middleware(['role:admin'])->group(function () {
        Route::resource('/galeri', AdminGaleriController::class);
    });

    Route::get('/dashboard', function () {
        $user = auth()->user();
        if ($user->role === 'admin') {
            return redirect()->route('admin.dashboard');
        } elseif ($user->role === 'instruktur') {
            return redirect()->route('instruktur.dashboard');
        } elseif ($user->role === 'member') {
            return redirect()->route('member.dashboard');
        } else {
            return redirect()->route('home');
        }
    })->name('dashboard');
});

/*
|--------------------------------------------------------------------------
| User (role:user)
|--------------------------------------------------------------------------
*/
Route::middleware(['auth', 'role:user'])->prefix('user')->name('user.')->group(function () {
    Route::get('/dashboard', [UserController::class, 'index'])->name('dashboard');
    Route::post('/daftar-member', [UserController::class, 'daftarMember'])->name('daftarMember');
    Route::get('/daftar/create', [DaftarController::class, 'create'])->name('daftar.create');
    Route::post('/daftar/store', [DaftarController::class, 'store'])->name('daftar.store');
    Route::get('/daftar/{id}/edit', [DaftarController::class, 'edit'])->name('daftar.edit');
});

/*
|--------------------------------------------------------------------------
| Member (role:member)
|--------------------------------------------------------------------------
*/
Route::middleware(['auth', 'role:member'])->prefix('member')->name('member.')->group(function () {
    Route::get('/', function () {return view('user.home');})->name('home');
    Route::post('/booking', [AdminMemberController::class, 'bookingKelas'])->name('booking');
    Route::post('/testimoni', [AdminMemberController::class, 'kirimTestimoni'])->name('testimoni');

    Route::get('/pilih_jadwal/{id}',[TransaksiController::class,'index'])->name('pilih_jadwal');
    Route::get('/booking_saya',[TransaksiController::class,'dataBooking'])->name('booking_saya');
    Route::get('/booking/{id}', [TransaksiController::class, 'booking'])->name('booking.create');
    Route::post('/jadwal/store', [TransaksiController::class, 'store'])->name('booking.store');
    Route::get('/payment/{id}', [TransaksiController::class, 'payment'])->name('payment.index');
    Route::post('/payment/process', [TransaksiController::class, 'process'])->name('payment.process');
});

/*
|--------------------------------------------------------------------------
| Instruktur (role:instruktur)
|--------------------------------------------------------------------------
*/
Route::prefix('instruktur')->middleware(['auth', 'role:instruktur'])->group(function () {
    Route::get('/dashboard', [InstrukturDashboardController::class, 'dashboard'])->name('instruktur.dashboard');
    Route::get('/jadwal', [InstrukturDashboardController::class, 'jadwal'])->name('instruktur.jadwal');
    Route::get('/jadwal/{id}/booking', [InstrukturDashboardController::class, 'booking'])->name('instruktur.jadwal.booking');
    Route::post('/jadwal/{id}/kehadiran', [InstrukturDashboardController::class, 'updateKehadiran'])->name('instruktur.kehadiran.update');
});

/*
|--------------------------------------------------------------------------
| Admin (role:admin)
|--------------------------------------------------------------------------
*/
Route::middleware(['auth', 'role:admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');

    Route::resource('users', UserController::class);
    Route::resource('pendaftaran', PendaftaranMemberController::class);
    Route::get('pendaftaran/approve/{id}', [PendaftaranMemberController::class, 'approve'])->name('pendaftaran.approve');
    Route::get('pendaftaran/reject/{id}', [PendaftaranMemberController::class, 'reject'])->name('pendaftaran.reject');

    Route::resource('member', AdminMemberController::class);
    Route::resource('instruktur', AdminInstrukturController::class);
    Route::resource('jadwal', AdminJadwalController::class);
    Route::resource('booking', AdminBookingController::class);

    Route::put('booking/{booking}/approve', [AdminBookingController::class, 'approve'])->name('booking.approve');
    Route::put('booking/{booking}/reject', [AdminBookingController::class, 'reject'])->name('booking.reject');

    Route::resource('galeri', AdminGaleriController::class);
    Route::resource('testimoni', TestimoniController::class)->only(['index','destroy']);
});
