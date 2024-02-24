<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Category::factory()
        //     ->count(3)
        //     ->hasProducts(2)
        //     ->create();

        // MUSAP
        DB::table("categories")
            ->insert([
                "id" => 1,
                'name' => "Comida",
                'description' => "Comidas rapidas",
                'business_id' => 1
            ]);
        DB::table("categories")
            ->insert([
                "id" => 2,
                'name' => "Bebidas",
                'description' => "Todo tipo de bebidas",
                'business_id' => 1
            ]);

        // HENDRIX
        DB::table("categories")
            ->insert([
                "id" => 3,
                'name' => "Comida",
                'description' => "Comidas rapidas",
                'business_id' => 2
            ]);
        DB::table("categories")
            ->insert([
                "id" => 4,
                'name' => "Bebidas",
                'description' => "Todo tipo de bebidas",
                'business_id' => 2
            ]);

        // RONCOS
        DB::table("categories")
            ->insert([
                "id" => 5,
                'name' => "Mariscos",
                'description' => "Mariscos",
                'business_id' => 3
            ]);
        DB::table("categories")
            ->insert([
                "id" => 6,
                'name' => "Pastas",
                'description' => "Pastas",
                'business_id' => 3
            ]);
        DB::table("categories")
            ->insert([
                "id" => 7,
                'name' => "Carnes",
                'description' => "Carnes",
                'business_id' => 3
            ]);

        // DOÑA PACHI
        DB::table("categories")
            ->insert([
                "id" => 8,
                'name' => "Pollo",
                'description' => "Pollo",
                'business_id' => 4
            ]);
        DB::table("categories")
            ->insert([
                "id" => 9,
                'name' => "Menu para niños",
                'description' => "Menu para niños",
                'business_id' => 4
            ]);

        // NILA EMPANADAS
        DB::table("categories")
            ->insert([
                "id" => 10,
                'name' => "Comida rapida",
                'description' => "Comidas rapidas",
                'business_id' => 5
            ]);
        DB::table("categories")
            ->insert([
                "id" => 11,
                'name' => "Empanadas",
                'description' => "Comidas rapidas",
                'business_id' => 5
            ]);

        // TISHOS PIZZA
        DB::table("categories")
            ->insert([
                "id" => 12,
                'name' => "Rolls",
                'description' => "Rolls",
                'business_id' => 6
            ]);
        DB::table("categories")
            ->insert([
                "id" => 13,
                'name' => "Pizzas",
                'description' => "Pizzas",
                'business_id' => 6
            ]);
    }
}
