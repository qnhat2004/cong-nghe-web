<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class ClassesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        foreach (range(1, 50) as $i) {
            DB::table('classes')->insert([
                'id' => $i,
                'grade_level' => $faker->randomElement(['Pre-K', 'KinderGarten']),
                'room_number' => $faker->word(),
                'created_at' => now(),
                'updated_at'=> now(),
            ]);
        }
    }
}
