<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ITCenterSeeder extends Seeder
{
    public function run()
    {
        DB::table('it_centers')->insert([
            [
                'name' => 'Trung tâm Tin học ABC',
                'location' => '456 Đường Y, TP.HCM',
                'contact_email' => 'contact@abc.com',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Trung tâm Tin học XYZ',
                'location' => '789 Đường Z, Hà Nội',
                'contact_email' => 'contact@xyz.com',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
