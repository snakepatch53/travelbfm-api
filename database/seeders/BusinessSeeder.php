<?php

namespace Database\Seeders;

use App\Models\Business;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BusinessSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Business::factory()
        //     ->count(3)
        //     ->hasCategories(2)
        //     ->create();
        DB::table("businesses")
            ->insert([
                "id" => 1,
                "name" => "Musap",
                "description" => "Exquisitos Platos Hechos Para Ti",
                "short_description" => "Exquisitos platos hechos para ti",
                "phone" => "0987654321",
                "address" => "Macas Por El Centro ",
                "location" => "-2.457071,-78.168099",
                "link" => "https://marea.pro/musap",
                "logo" => "3.jpg",
                "user_id" => 3
            ]);
        DB::table("businesses")
            ->insert([
                "id" => 2,
                "name" => "Hendrix",
                "description" => "Cerveza Artesanal, Alitas Con Diferentes Salsas, Nachos Y Hamburguesas",
                "short_description" => "Cerveza artesanal",
                "phone" => "0987654321",
                "address" => "Macas Por El Centro ",
                "location" => "-2.457071,-78.168099",
                "link" => "https://marea.pro/hendrix",
                "logo" => "4.jpg",
                "user_id" => 4
            ]);
        DB::table("businesses")
            ->insert([
                "id" => 3,
                "name" => "Roncos Restaurant",
                "description" => "Menú De Exquisitos Platos Hechos Para Paladares Selectos",
                "short_description" => "Menú de exquisitos platos",
                "phone" => "0987654321",
                "address" => "Macas Por El Centro ",
                "location" => "-2.457071,-78.168099",
                "link" => "https://marea.pro/roncos",
                "logo" => "5.jpg",
                "user_id" => 5
            ]);
        DB::table("businesses")
            ->insert([
                "id" => 4,
                "name" => "Comida Rapida Doña Pachi",
                "description" => "Menú De Exquisitos Platos Que Se Sirven En Nuestro Local De Comida",
                "short_description" => "Menú de exquisitos platos",
                "phone" => "0987654321",
                "address" => "Macas Por El Centro ",
                "location" => "-2.457071,-78.168099",
                "link" => "https://marea.pro/menupachi",
                "logo" => "6.jpg",
                "user_id" => 6
            ]);
        DB::table("businesses")
            ->insert([
                "id" => 5,
                "name" => "Nila Empanadas",
                "description" => "Relleno De Felicidad En Cada Empanada",
                "short_description" => "Relleno de felicidad en cada empanada",
                "phone" => "0987654321",
                "address" => "Macas Por El Centro ",
                "location" => "-2.457071,-78.168099",
                "link" => "https://marea.pro/nilaempanadas",
                "logo" => "7.jpg",
                "user_id" => 7
            ]);
        DB::table("businesses")
            ->insert([
                "id" => 6,
                "name" => "Tishos Pizza",
                "description" => "Exquisitos Platos Hechos Para Ti",
                "short_description" => "Exquisitos platos hechos para ti",
                "phone" => "0987654321",
                "address" => "Macas Por El Centro ",
                "location" => "-2.457071,-78.168099",
                "link" => "https://marea.pro/tishospizza",
                "logo" => "8.jpg",
                "user_id" => 8
            ]);
    }
}
