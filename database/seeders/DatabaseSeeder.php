<?php

namespace Database\Seeders;

use App\Models\Author;
use App\Models\User;
use App\Models\Book;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(AuthorSeeder::class);
        $this->call(BookSeeder::class);
        $this->call(UserSeeder::class);
    }
}
