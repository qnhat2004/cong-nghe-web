<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class BooksSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        for($i = 0; $i < 50; $i++) {
            DB::table('books')->insert([
               'name' => $faker->sentence('3'),
                'author' => $faker->name(),
                'category' => $faker->randomElement(['Science', 'History', 'Math', 'Programming']),
                'year' => $faker->year(),
                'quantity' => $faker->numberBetween(1, 100)
            ]);
        }
    }
}
