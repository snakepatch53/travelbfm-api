<?php

namespace Database\Seeders;

use App\Models\ProductCart;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductCartSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ProductCart::factory()
            ->count(3)
            ->create();
    }
}
