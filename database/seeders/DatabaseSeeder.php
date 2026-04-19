<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Database\Seeders\UserSeeders;
use Database\Seeders\SiswaSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */

public function run(): void
{
    $this->call([
        UserSeeders::class, // FIX DI SINI
        SiswaSeeder::class,
    ]);
}
}

        
