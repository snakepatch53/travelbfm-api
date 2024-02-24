<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    public function run()
    {
        // Product::factory()
        //     ->count(3)
        //     ->hasProductCarts(2)
        //     ->create();

        DB::table("products")
            ->insert([
                "id" => 1,
                'name' => "ALITAS EN SALSA",
                'description' => "ALITAS BAÑADAS EN DISTINTOS TIPOS DE SALSAS",
                'photo' => "1.jpg",
                'price' => 6.25,
                'category_id' => 1
            ]);

        DB::table("products")
            ->insert([
                "id" => 2,
                'name' => "COSTILLAS BBQ",
                'description' => "COSTILLAS BBQ CON PAPAS FRITAS O COSINADAS",
                'photo' => "2.jpg",
                'price' => 7.75,
                'category_id' => 1
            ]);

        DB::table("products")
            ->insert([
                "id" => 3,
                'name' => "PIZZA DE MARISCOS 8 PEDAZOS",
                'description' => "EXQUISITA PIZZA DE MARISCOS",
                'photo' => "3.jpg",
                'price' => 10.00,
                'category_id' => 1
            ]);

        DB::table("products")
            ->insert([
                "id" => 4,
                'name' => "PIZZA DE PEPERONI O PIÑA 8 PEDAZOS",
                'description' => "PIZZA",
                'photo' => "4.jpg",
                'price' => 8.50,
                'category_id' => 1
            ]);

        DB::table("products")
            ->insert([
                "id" => 5,
                'name' => "PIZZA MIXTA 8 PEDAZOS PEPERONI Y PIÑA",
                'description' => "PIZZA",
                'photo' => "5.jpg",
                'price' => 9.00,
                'category_id' => 1
            ]);

        DB::table("products")
            ->insert([
                "id" => 6,
                'name' => "PASTA CARBONARA",
                'description' => "PASTA",
                'photo' => "6.jpg",
                'price' => 5.50,
                'category_id' => 1
            ]);

        DB::table("products")
            ->insert([
                "id" => 7,
                'name' => "PASTA CON CAMARONES",
                'description' => "PASTA",
                'photo' => "7.jpg",
                'price' => 6.50,
                'category_id' => 1
            ]);

        DB::table("products")
            ->insert([
                "id" => 8,
                'name' => "MACARRONES CON POLLO Y QUESO PARMESANO",
                'description' => "MACARRONES",
                'photo' => "8.jpg",
                'price' => 5.50,
                'category_id' => 1
            ]);

        DB::table("products")
            ->insert([
                "id" => 9,
                'name' => "PARRILLADA MUSAP 3 PERSONAS",
                'description' => "PARRILLADA",
                'photo' => "9.jpg",
                'price' => 16.00,
                'category_id' => 1
            ]);

        DB::table("products")
            ->insert([
                "id" => 10,
                'name' => "PARRILLADA MUSAP 4/5 PERSONAS",
                'description' => "PARRILLADA",
                'photo' => "10.jpg",
                'price' => 21.00,
                'category_id' => 1
            ]);

        DB::table("products")
            ->insert([
                "id" => 11,
                'name' => "ENSALADA CON PECHUGA A LA PLANCHA",
                'description' => "ENSALADA",
                'photo' => "11.jpg",
                'price' => 5.50,
                'category_id' => 1
            ]);

        DB::table("products")
            ->insert([
                "id" => 12,
                'name' => "NACHOS CON CARNE QUESO Y GUACAMOLE",
                'description' => "NACHOS",
                'photo' => "12.jpg",
                'price' => 7.50,
                'category_id' => 1
            ]);

        DB::table("products")
            ->insert([
                "id" => 13,
                'name' => "NACHOS MOJADOS",
                'description' => "NACHOS",
                'photo' => "13.jpg",
                'price' => 6.50,
                'category_id' => 1
            ]);

        DB::table("products")
            ->insert([
                "id" => 14,
                'name' => "PICADA PEQUEÑA",
                'description' => "PICADA",
                'photo' => "14.jpg",
                'price' => 5.25,
                'category_id' => 1
            ]);

        DB::table("products")
            ->insert([
                "id" => 15,
                'name' => "PICADA GRANDE",
                'description' => "PICADA",
                'photo' => "15.jpg",
                'price' => 10.50,
                'category_id' => 1
            ]);

        DB::table("products")
            ->insert([
                "id" => 16,
                'name' => "QUESADILLA",
                'description' => "DELICIOSA QUESADILLA",
                'photo' => "16.jpg",
                'price' => 5.00,
                'category_id' => 1
            ]);

        DB::table("products")
            ->insert([
                "id" => 17,
                'name' => "HAMBURGUESA",
                'description' => "HAMBURGUESA",
                'photo' => "17.jpg",
                'price' => 6.25,
                'category_id' => 1
            ]);

        DB::table("products")
            ->insert([
                "id" => 18,
                'name' => "CAMARONES APANADOS",
                'description' => "CAMARONES CON APANADURA",
                'photo' => "18.jpg",
                'price' => 6.75,
                'category_id' => 1
            ]);

        DB::table("products")
            ->insert([
                "id" => 19,
                'name' => "PAPI POLLO",
                'description' => "PAPAS FRITAS CON POLLO",
                'photo' => "19.jpg",
                'price' => 3.00,
                'category_id' => 1
            ]);

        DB::table("products")
            ->insert([
                "id" => 20,
                'name' => "SALCHI PAPA",
                'description' => "SALCHICHAS CON PAPAS FRITAS",
                'photo' => "20.jpg",
                'price' => 2.50,
                'category_id' => 1
            ]);

        DB::table("products")
            ->insert([
                "id" => 21,
                'name' => "MICHELADA LIMÓN Y MARACUYA",
                'description' => "DELICIOSA MICHELADA",
                'photo' => "21.jpg",
                'price' => 4.00,
                'category_id' => 2
            ]);
        DB::table("products")
            ->insert([
                "id" => 22,
                'name' => "MICHELADA MUSAP",
                'description' => "UNA MICHELADA EXCLUSIVA DEL MUSAP BAR",
                'photo' => "22.jpg",
                'price' => 7.50,
                'category_id' => 2
            ]);
        DB::table("products")
            ->insert([
                "id" => 23,
                'name' => "CORONA",
                'description' => "CERVEZA CORONA 350 ML",
                'photo' => "23.jpg",
                'price' => 3.00,
                'category_id' => 2
            ]);
        DB::table("products")
            ->insert([
                "id" => 24,
                'name' => "PILSENER PERSONAL",
                'description' => "CERVEZA PILSENER",
                'photo' => "24.jpg",
                'price' => 3.00,
                'category_id' => 2
            ]);
        DB::table("products")
            ->insert([
                "id" => 25,
                'name' => "STELLA",
                'description' => "CERVEZA STELLA 330 ML",
                'photo' => "25.jpg",
                'price' => 3.00,
                'category_id' => 2
            ]);
        DB::table("products")
            ->insert([
                "id" => 26,
                'name' => "CLUB",
                'description' => "CERVEZA CLUB 330 ML",
                'photo' => "26.jpg",
                'price' => 1.75,
                'category_id' => 2
            ]);
        DB::table("products")
            ->insert([
                "id" => 27,
                'name' => "MODELO",
                'description' => "CERVEZA MODELO 355 ML",
                'photo' => "27.jpg",
                'price' => 3.75,
                'category_id' => 2
            ]);
        DB::table("products")
            ->insert([
                "id" => 28,
                'name' => "AGUA",
                'description' => "AGUA VIVANT 600 ML",
                'photo' => "28.jpg",
                'price' => 1.00,
                'category_id' => 2
            ]);
        DB::table("products")
            ->insert([
                "id" => 29,
                'name' => "JARRA DE LIMONADA",
                'description' => "LIMONADA",
                'photo' => "29.jpg",
                'price' => 2.50,
                'category_id' => 2
            ]);
        DB::table("products")
            ->insert([
                "id" => 30,
                'name' => "COCA COLA PERSONAL",
                'description' => "COLA",
                'photo' => "30.jpg",
                'price' => 1.00,
                'category_id' => 2
            ]);
        DB::table("products")
            ->insert([
                "id" => 31,
                'name' => "COCA COLA PERSONAL",
                'description' => "COLA",
                'photo' => "30.jpg",
                'price' => 1.00,
                'category_id' => 2
            ]);
    }
}
