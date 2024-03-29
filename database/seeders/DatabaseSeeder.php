<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Business;
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
        $this->call([
            InfoSeeder::class,
            UserSeeder::class,
            BusinessSeeder::class,
            CategorySeeder::class,
            ProductSeeder::class,
            CartSeeder::class,
            ProductCartSeeder::class
        ]);
    }
}
