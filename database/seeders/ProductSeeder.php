<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Product::factory()
        //     ->count(3)
        //     ->hasProductCarts(2)
        //     ->create();

        DB::table("products")
            ->insert([
                'name' => "ALITAS EN SALSA",
                'description' => "ALITAS BAÑADAS EN DISTINTOS TIPOS DE SALSAS",
                'photo' => 2.5,
                'price' => 2.5,
                'category_id' => 1
            ]);
    }
}
