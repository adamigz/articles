<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        for($i = 0; $i < 10; $i++) {
            $author = new \App\Models\Author;
            $author->name = fake()->firstName();
            $author->surname = fake()->lastName();
            $author->fullname = $author->name.' '.$author->surname;
            $author->fullname_slug = Str::slug($author->fullname);
            $author->save();
        }
    }
}
