<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class BorrowsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $faker = Faker::create();

        for ($i = 0; $i < 50; $i++) {
            DB::table('borrows')->insert([
                'reader_id' => $faker->numberBetween(1, 50),
                'book_id' => $faker->numberBetween(1, 50),
                'borrow_date' => $faker->date(),
                'return_date' => $faker->date(),
                'status' => $faker->randomElement(['Borrowed', 'Returned'])
            ]);
        }
    }
}
