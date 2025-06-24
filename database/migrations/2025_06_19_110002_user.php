<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Menambahkan kolom 'role' ke tabel 'users'
     */
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            // Tambah kolom 'role' setelah kolom email
            if (!Schema::hasColumn('users', 'role')) {
                $table->string('role')->after('email')->default('orangtua');
            }
        });
    }

    /**
     * Menghapus kolom 'role' dari tabel 'users' saat rollback
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            if (Schema::hasColumn('users', 'role')) {
                $table->dropColumn('role');
            }
        });
    }
};
