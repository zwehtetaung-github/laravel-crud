<?php

namespace Database\Seeders;

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
        \App\Models\User::factory([
            "name" => "Alice",
            "email" => "alice@gmail.com",
        ])->create();

        \App\Models\User::factory([
            "name" => "Bob",
            "email" => "bob@gmail.com",
        ])->create();
    }
}
