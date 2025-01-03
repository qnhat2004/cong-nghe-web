<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class ReadersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        for ($i = 0; $i < 50; $i++) {
            DB::table('readers')->insert([
                'name' => $faker->name(),
                'birthday' => $faker->date(),
                'address' => $faker->address(),
                'phone' => $faker->phoneNumber()
            ]);
        }
    }
}
