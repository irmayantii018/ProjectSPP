<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        User::create([
            'name' => 'Bendahara',
            'email' => 'bendahara@gmail.com',
            'password' => Hash::make('password'),
            'role' => 'bendahara',
        ]);

        User::create([
            'name' => 'Orang Tua',
            'email' => 'ortu@gmail.com',
            'password' => Hash::make('password'),
            'role' => 'orangtua',
        ]);

        User::create([
            'name' => 'Kepala Sekolah',
            'email' => 'kepala@gmail.com',
            'password' => Hash::make('password'),
            'role' => 'kepala_sekolah',
        ]);
    }
}
