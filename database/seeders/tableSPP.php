<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class SPPSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Seeding data User
        DB::table('user')->insert([
            [
                'nama' => 'Bendahara',
                'username' => 'bendahar',
                'password' => Hash::make('password'),
                'role' => 'bendahar',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'nama' => 'Orang Tua',
                'username' => 'ortu1',
                'password' => Hash::make('password'),
                'role' => 'orang_tua',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'nama' => 'Kepala Sekolah',
                'username' => 'kepsek',
                'password' => Hash::make('password'),
                'role' => 'kepala_sekolah',
                'created_at' => now(),
                'updated_at' => now()
            ]
        ]);

        // Seeding data Pembayaran
        DB::table('pembayaran')->insert([
            'id_user' => 2, // orang_tua
            'jumlah_bayar' => 500000,
            'tanggal_bayar' => now(),
            'status' => 'lunas',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        // Seeding data Tagihan
        DB::table('tagihan')->insert([
            'id_user' => 2, // orang_tua
            'jumlah_tagihan' => 500000,
            'bulan' => 'Mei',
            'tahun' => 2025,
            'status' => 'sudah_bayar',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        // Seeding data Laporan
        DB::table('laporan')->insert([
            'id_user' => 1, // bendahara
            'jenis_laporan' => 'pembayaran',
            'deskripsi' => 'Laporan pembayaran bulan Mei 2025',
            'tanggal' => now(),
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
