<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MovieSeeder extends Seeder
{
    public function run()
    {
        DB::table('movies')->insert([
            [
                'title' => 'Avengers: Endgame',
                'director' => 'Anthony và Joe Russo',
                'release_date' => '2019-04-26',
                'duration' => 181,
                'cinema_id' => 1, // CGV Vincom
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Parasite',
                'director' => 'Bong Joon-ho',
                'release_date' => '2019-05-30',
                'duration' => 132,
                'cinema_id' => 1, // CGV Vincom
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Joker',
                'director' => 'Todd Phillips',
                'release_date' => '2019-10-04',
                'duration' => 122,
                'cinema_id' => 2, // Lotte Cinema
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
