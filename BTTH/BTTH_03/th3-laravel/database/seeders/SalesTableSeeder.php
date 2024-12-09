<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;

class SalesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        foreach (range(1, 50) as $index) {
            DB::table('sales')->insert([
                'quantity' => $faker->numberBetween(1, 100),
                'sale_date' => $faker->dateTimeThisYear(),
                'customer_phone' => $faker->phoneNumber,
                'created_at' => now(),
                'updated_at'=> now(),
                'medicine_id' => $faker->numberBetween(1, 50)
            ]);
        }
    }
}
