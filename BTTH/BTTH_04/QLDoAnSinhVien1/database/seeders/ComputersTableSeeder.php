<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class ComputersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        for ($i = 0; $i < 50; $i++) {
            DB::table('computers')->insert([
                'computer_name' => $faker->name(),
                'model'=> $faker->name(),
                'operating_system'=> $faker->name(),
                'processor' => $faker->name(),
                'memory' => $faker->numberBetween([8, 16, 32]),
                'available' => $faker->boolean()
            ]);
        }
    }
}
