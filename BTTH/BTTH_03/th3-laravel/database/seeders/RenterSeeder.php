<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RenterSeeder extends Seeder
{
    public function run()
    {
        DB::table('renters')->insert([
            [
                'name' => 'Nguyễn Văn A',
                'phone_number' => '0987654321',
                'email' => 'nva@gmail.com',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Trần Thị B',
                'phone_number' => '0912345678',
                'email' => 'ttb@gmail.com',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
