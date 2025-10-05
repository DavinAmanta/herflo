<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('members', function (Blueprint $table) {
            $table->string('nik', 20)->nullable()->after('user_id');
            $table->enum('paket', ['1 Bulan', '3 Bulan', '8 Bulan'])->after('alamat');
            $table->date('tgl_berakhir')->nullable()->after('tgl_daftar');
            $table->enum('status', ['aktif', 'tidak aktif'])->default('aktif')->after('tgl_berakhir');
        });
    }

    public function down(): void
    {
        Schema::table('members', function (Blueprint $table) {
            $table->dropColumn(['nik', 'paket', 'tgl_berakhir', 'status']);
        });
    }
};
