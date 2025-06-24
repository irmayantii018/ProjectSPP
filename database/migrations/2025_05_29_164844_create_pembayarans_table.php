<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('pembayarans', function (Blueprint $table) {
            $table->id();

            // Jika masih pakai relasi ke tabel siswas
            $table->foreignId('siswa_id')
                  ->nullable()
                  ->constrained('siswas')
                  ->onDelete('cascade');

            // Data input dari form
            $table->string('nis');
            $table->string('nama');
            $table->string('bulan');
            $table->date('tanggal');
            $table->decimal('jumlah', 15, 2);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pembayarans');
    }
};
