<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Seed data for Customer role
        User::create([
            'name' => 'Nama Customer',
            'ttl' => '1990-01-01', // Format tanggal YYYY-MM-DD
            'gender' => 'Pria', // Ganti dengan 'Wanita' jika perlu
            'address' => 'Alamat Customer',
            'ktp_photo' => 'customer_ktp.jpg', // Ganti dengan nama foto KTP customer
            'username' => 'customer1', // Username customer
            'password' => Hash::make('password123'), // Password customer
            'role' => 'customer', // Role customer
        ]);

        // Seed data for Staff role
        User::create([
            'name' => 'Nama Staff',
            'ttl' => '1995-05-10', // Format tanggal YYYY-MM-DD
            'gender' => 'Wanita', // Ganti dengan 'Pria' jika perlu
            'address' => 'Alamat Staff',
            'ktp_photo' => 'staff_ktp.jpg', // Ganti dengan nama foto KTP staff
            'username' => 'staff1', // Username staff
            'password' => Hash::make('password123'), // Password staff
            'role' => 'staff', // Role staff
        ]);

        // Seed data for Admin role
        User::create([
            'name' => 'Nama Admin',
            'ttl' => '1985-12-25', // Format tanggal YYYY-MM-DD
            'gender' => 'Pria', // Ganti dengan 'Wanita' jika perlu
            'address' => 'Alamat Admin',
            'ktp_photo' => 'admin_ktp.jpg', // Ganti dengan nama foto KTP admin
            'username' => 'admin1', // Username admin
            'password' => Hash::make('password123'), // Password admin
            'role' => 'admin', // Role admin
        ]);

        // Tambahkan data user lainnya sesuai dengan kebutuhan
    }
}
