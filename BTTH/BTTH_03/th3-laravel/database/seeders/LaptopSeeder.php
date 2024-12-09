<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LaptopSeeder extends Seeder
{
    public function run()
    {
        DB::table('laptops')->insert([
            [
                'brand' => 'Dell',
                'model' => 'Inspiron 15 3000',
                'specifications' => 'i5, 8GB RAM, 256GB SSD',
                'rental_status' => true,
                'renter_id' => 1, // Tham chiếu tới người thuê có id=1
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'brand' => 'HP',
                'model' => 'Pavilion 14',
                'specifications' => 'i7, 16GB RAM, 512GB SSD',
                'rental_status' => false,
                'renter_id' => null, // Laptop chưa được cho thuê
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'brand' => 'Asus',
                'model' => 'Vivobook S15',
                'specifications' => 'i3, 4GB RAM, 1TB HDD',
                'rental_status' => true,
                'renter_id' => 2, // Tham chiếu tới người thuê có id=2
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
