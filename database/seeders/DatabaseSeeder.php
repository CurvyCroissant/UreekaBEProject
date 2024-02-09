<?php

namespace Database\Seeders;

use App\Models\Book;
use App\Models\User;
use App\Models\Genre;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();


        User::create([
            'name' => 'Rafael Zefanya Jaya Surya',
            'email' => 'rafze04@gmail.com',
            'password' => bcrypt('password')
        ]);

        User::create([
            'name' => 'Steven Soesono',
            'email' => 'steven@gmail.com',
            'password' => bcrypt('password')
        ]);

        User::create([
            'name' => 'Rafael Widjaya',
            'email' => 'rafael@gmail.com',
            'password' => bcrypt('password')
        ]);

        Genre::create([
            'name' => 'Sci-Fi'
        ]);

        Genre::create([
            'name' => 'Fantasy'
        ]);

        Genre::create([
            'name' => 'Romance'
        ]);

        Book::factory(10)->create();
    }
}
