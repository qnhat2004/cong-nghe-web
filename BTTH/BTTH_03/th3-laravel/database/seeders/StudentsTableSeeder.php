<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;
class StudentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        foreach(range(1, 50) as $i) {
            DB::table('students')->insert([
                'first_name' => $faker->firstName,
                'last_name'=> $faker->lastName,
                'date_of_birth' => $faker->date('Y-m-d'),
                'parent_phone' => $faker->phoneNumber(),
                'class_id'=> $faker->numberBetween(1, 50),
                'created_at' => now(),  
                'updated_at' => now()                                
            ]);
        }
    }
}
