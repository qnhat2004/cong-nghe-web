<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BookSeeder extends Seeder
{
    public function run()
    {
        DB::table('books')->insert([
            [
                'title' => 'Clean Code',
                'author' => 'Robert C. Martin',
                'publication_year' => 2008,
                'genre' => 'Programming',
                'library_id' => 1, // Tham chiếu tới thư viện có id=1
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Design Patterns',
                'author' => 'Erich Gamma, Richard Helm, Ralph Johnson, John Vlissides',
                'publication_year' => 1994,
                'genre' => 'Software Engineering',
                'library_id' => 1, // Tham chiếu tới thư viện có id=1
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'The Pragmatic Programmer',
                'author' => 'Andrew Hunt, David Thomas',
                'publication_year' => 1999,
                'genre' => 'Programming',
                'library_id' => 2, // Tham chiếu tới thư viện có id=2
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
