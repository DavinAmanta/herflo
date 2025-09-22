<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('booking', function (Blueprint $table) {
            $table->id();
            $table->foreignId('member_id')->constrained('members')->onDelete('cascade');
            $table->foreignId('jadwal_kelas_id')->constrained('jadwal_kelas')->onDelete('cascade');
            $table->date('tanggal');
            $table->enum('status', ['pending', 'approved', 'rejected'])->default('pending'); // Tambahan status
            $table->timestamps();
        });

    }

    public function down(): void
    {
        Schema::dropIfExists('booking');
    }
};
