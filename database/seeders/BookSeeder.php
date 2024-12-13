<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Author;
use App\Models\Book;
use App\Models\Genre;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        /**
         * for each author, create 10 books and assign a random genre
         */
        $authors = Author::all();
        $genres = Genre::all();

        $authors->each(function ($author) use ($genres) {
            $author
                ->books()
                ->saveMany(Book::factory(10)->make())
                ->each(function ($book) use ($genres) {
                    $book->genres()->attach($genres->random(rand(1, 3))->pluck('id')->toArray());
                });
        });
    }
}
