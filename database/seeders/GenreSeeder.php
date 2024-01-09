<?php

use Illuminate\Database\Seeder;
use App\Models\Genre;

class GenreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Genre::insert([
            ['genre' => 'Action'],
            ['genre' => 'Adventure'],
            ['genre' => 'Battle Royale'],
            ['genre' => 'Comedy'],
            ['genre' => 'Cyberpunk'],
            ['genre' => 'Drama'],
            ['genre' => 'Ecchi'],
            ['genre' => 'Fantasy'],
            ['genre' => 'Horreur'],
            ['genre' => 'Isekai'],
            ['genre' => 'Magic'],
            ['genre' => 'Magical Girl'],
            ['genre' => 'Mecha'],
            ['genre' => 'Military'],
            ['genre' => 'Music'],
            ['genre' => 'Mistery'],
            ['genre' => 'Psychological'],
            ['genre' => 'Romance'],
            ['genre' => 'School Life'],
            ['genre' => 'Sci-Fi'],
            ['genre' => 'Seinen'],
            ['genre' => 'Shojo'],
            ['genre' => 'Shonen'],
            ['genre' => 'Slice of Life'],
            ['genre' => 'Sport'],
            ['genre' => 'Super Power'],
            ['genre' => 'Thriller'],
            ['genre' => 'Vampire'],
            ['genre' => 'Yaoi'],
            ['genre' => 'Yuri'],
        ]);
    }
}