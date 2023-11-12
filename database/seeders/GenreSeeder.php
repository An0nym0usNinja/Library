<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GenreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $genres = [
            'Action',
            'Adventure',
            'Animation',
            'Biography',
            'Comedy',
            'Crime',
            'Documentary',
            'Drama',
            'Family',
            'Fantasy',
            'Film Noir',
            'History',
            'Horror',
            'Music',
            'Musical',
            'Mystery',
            'Romance',
            'Sci-Fi',
            'Short Film',
            'Sport',
            'Superhero',
            'Thriller',
            'War',
            'Western',
        ];
        
        foreach ($genres as $genre) {
            \App\Models\Genre::factory()->create([
                'name' => $genre,
            ]);
        }
    }
}
