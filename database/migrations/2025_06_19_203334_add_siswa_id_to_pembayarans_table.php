<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        // Tambahkan foreign key jika belum ada
        Schema::table('pembayarans', function (Blueprint $table) {
    if (!Schema::hasColumn('pembayarans', 'siswa_id')) {
        $table->unsignedBigInteger('siswa_id')->nullable()->after('id');
    }

    // Hindari error duplicate foreign key (tidak ada cara Laravel-native mengecek FK, jadi bisa gunakan raw SQL atau manual seperti ini)
    try {
        DB::statement("ALTER TABLE pembayarans ADD CONSTRAINT pembayarans_siswa_id_foreign FOREIGN KEY (siswa_id) REFERENCES siswas(id) ON DELETE CASCADE");
    } catch (\Illuminate\Database\QueryException $e) {
        // Foreign key sudah ada, diamkan
    }
});
    }

    public function down(): void
    {
        Schema::table('pembayarans', function (Blueprint $table) {
            $table->dropForeign('pembayarans_siswa_id_foreign');
        });
    }
};
