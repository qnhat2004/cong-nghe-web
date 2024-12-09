<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LibrarySeeder extends Seeder
{
    public function run()
    {
        DB::table('libraries')->insert([
            [
                'name' => 'Thư viện IT Đại học ABC',
                'address' => '123 Đường X, Hà Nội',
                'contact_number' => '0123456789',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Thư viện Khoa học Đại học XYZ',
                'address' => '456 Đường Y, TP.HCM',
                'contact_number' => '0987654321',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
