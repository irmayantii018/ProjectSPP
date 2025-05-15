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
        // buat Tabel user
        Schema::create('user', function (Blueprint $table) {
        $table->id('id_user');
        $table->string('nama');
        $table->string('username')->unique();
        $table->string('password');
        $table->enum('role', ['bendahara', 'orang_tua', 'kepala_sekolah']);
        $table->timestamps();
        });

        //buat table pembayaran
        Schema::create('pembayaran', function (Blueprint $table) {
        $table->id('id_pembayaran');
        $table->foreignId('id_user')->constrained('user', 'id_user');
        $table->decimal('jumlah_bayar', 10, 2);
        $table->timestamp('tanggal_bayar');
        $table->enum('status', ['lunas', 'belum_lunas']);
        $table->timestamps();
        });

        //buat table tagihan
        Schema::create('tagihan', function (Blueprint $table) {
        $table->id('id_tagihan');
        $table->foreignId('id_user')->constrained('user', 'id_user');
        $table->decimal('jumlah_tagihan', 10, 2);
        $table->string('bulan');
        $table->integer('tahun');
        $table->enum('status', ['belum_bayar', 'sudah_bayar']);
        $table->timestamps();
        });

        //buat table laporan
        Schema::create('laporan', function (Blueprint $table) {
        $table->id('id_laporan');
        $table->foreignId('id_user')->constrained('user', 'id_user');
        $table->enum('jenis_laporan', ['pembayaran', 'tagihan']);
        $table->text('deskripsi');
        $table->timestamp('tanggal');
        $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user');
        Schema::dropIfExists('pembayaran');
        Schema::dropIfExists('tagihan');
        Schema::dropIfExists('laporan');
    }
};
