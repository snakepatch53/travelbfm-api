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
                "name" => "MUSAP",
                "description" => "Exquisitos platos hechos para ti",
                "short_description" => "Exquisitos platos hechos para ti",
                "phone" => "0987654321",
                "address" => "Macas por el centro ",
                "location" => "Via al terminal",
                "link" => "https://marea.pro/musap",
                "logo" => "3.jpg",
                "user_id" => 3
            ]);
        DB::table("businesses")
            ->insert([
                "id" => 2,
                "name" => "HENDRIX",
                "description" => "Cerveza artesanal, alitas con diferentes salsas, nachos y hamburguesas",
                "short_description" => "Cerveza artesanal",
                "phone" => "0987654321",
                "address" => "Macas por el centro ",
                "location" => "Via al terminal",
                "link" => "https://marea.pro/hendrix",
                "logo" => "4.jpg",
                "user_id" => 4
            ]);
        DB::table("businesses")
            ->insert([
                "id" => 3,
                "name" => "RONCOS RESTAURANT",
                "description" => "Menú de exquisitos platos hechos para paladares selectos",
                "short_description" => "Menú de exquisitos platos",
                "phone" => "0987654321",
                "address" => "Macas por el centro ",
                "location" => "Via al terminal",
                "link" => "https://marea.pro/roncos",
                "logo" => "5.jpg",
                "user_id" => 5
            ]);
        DB::table("businesses")
            ->insert([
                "id" => 4,
                "name" => "COMIDA RAPIDA DOÑA PACHI",
                "description" => "Menú de exquisitos platos que se sirven en nuestro local de comida",
                "short_description" => "Menú de exquisitos platos",
                "phone" => "0987654321",
                "address" => "Macas por el centro ",
                "location" => "Via al terminal",
                "link" => "https://marea.pro/menupachi",
                "logo" => "6.jpg",
                "user_id" => 6
            ]);
        DB::table("businesses")
            ->insert([
                "id" => 5,
                "name" => "NILA EMPANADAS",
                "description" => "Relleno de felicidad en cada empanada",
                "short_description" => "Relleno de felicidad en cada empanada",
                "phone" => "0987654321",
                "address" => "Macas por el centro ",
                "location" => "Via al terminal",
                "link" => "https://marea.pro/nilaempanadas",
                "logo" => "7.jpg",
                "user_id" => 7
            ]);
        DB::table("businesses")
            ->insert([
                "id" => 6,
                "name" => "TISHOS PIZZA",
                "description" => "Exquisitos platos hechos para ti",
                "short_description" => "Exquisitos platos hechos para ti",
                "phone" => "0987654321",
                "address" => "Macas por el centro ",
                "location" => "Via al terminal",
                "link" => "https://marea.pro/tishospizza",
                "logo" => "8.jpg",
                "user_id" => 8
            ]);
    }
}
