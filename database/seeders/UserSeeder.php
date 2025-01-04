<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'fullname' => 'Abid Muzhaffar',
            'username' => 'abidgagah',
            'email' => 'abid@gmail.com',
            'password' => Hash::make('Lop12345'), // Gunakan hash untuk password
            'image' => 'default.jpg', // Ganti dengan nama file gambar default jika ada
            'point' => 100,
            'is_admin' => false,
            'status_member' => 'basic',
        ]);

        User::create([
            'fullname' => 'Rezki Andika',
            'username' => 'redika',
            'email' => 'dika@gmail.com',
            'password' => Hash::make('Lop12345'), // Gunakan hash untuk password
            'image' => 'default.jpg', // Ganti dengan nama file gambar default jika ada
            'point' => 100,
            'is_admin' => true,
            'status_member' => '',
        ]);
    }
}
