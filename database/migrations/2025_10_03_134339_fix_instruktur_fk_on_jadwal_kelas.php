<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('jadwal_kelas', function (Blueprint $table) {
            // Hapus foreign key lama (nama default biasanya {table}_{column}_foreign)
            $table->dropForeign(['instruktur_id']);

            // Tambah foreign key baru ke tabel "instrukturs"
            $table->foreign('instruktur_id')
                  ->references('id')
                  ->on('instrukturs')
                  ->nullOnDelete();
        });
    }

    public function down(): void
    {
        Schema::table('jadwal_kelas', function (Blueprint $table) {
            $table->dropForeign(['instruktur_id']);

            // Balikin ke foreign key lama (kalau rollback)
            $table->foreign('instruktur_id')
                  ->references('id')
                  ->on('instruktur')
                  ->nullOnDelete();
        });
    }
};
