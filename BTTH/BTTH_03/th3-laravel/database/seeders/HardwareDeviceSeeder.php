<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class HardwareDeviceSeeder extends Seeder
{
    public function run()
    {
        DB::table('hardware_devices')->insert([
            [
                'device_name' => 'Logitech G502',
                'type' => 'Mouse',
                'status' => true, // Đang hoạt động
                'center_id' => 1, // Tham chiếu đến it_centers id=1
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'device_name' => 'Corsair K70',
                'type' => 'Keyboard',
                'status' => true,
                'center_id' => 1, // Tham chiếu đến it_centers id=1
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'device_name' => 'HyperX Cloud II',
                'type' => 'Headset',
                'status' => false, // Hỏng
                'center_id' => 2, // Tham chiếu đến it_centers id=2
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
