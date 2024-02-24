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
                'name' => "Alitas En Salsa",
                'description' => "Alitas Bañadas En Distintos Tipos De Salsas",
                'photo' => "1.jpg",
                'price' => 6.25,
                'category_id' => 1
            ]);

        DB::table("products")
            ->insert([
                'name' => "Costillas BBQ",
                'description' => "Costillas BBQ Con Papas Fritas O Cosinadas",
                'photo' => "2.jpg",
                'price' => 7.75,
                'category_id' => 1
            ]);

        DB::table("products")
            ->insert([
                'name' => "Pizza De Mariscos 8 Pedazos",
                'description' => "Exquisita Pizza De Mariscos",
                'photo' => "3.jpg",
                'price' => 10.00,
                'category_id' => 1
            ]);

        DB::table("products")
            ->insert([
                'name' => "Pizza De Peperoni O Piña 8 Pedazos",
                'description' => "Pizza",
                'photo' => "4.jpg",
                'price' => 8.50,
                'category_id' => 1
            ]);

        DB::table("products")
            ->insert([
                'name' => "Pizza Mixta 8 Pedazos Peperoni Y Piña",
                'description' => "Pizza",
                'photo' => "5.jpg",
                'price' => 9.00,
                'category_id' => 1
            ]);

        DB::table("products")
            ->insert([
                'name' => "Pasta Carbonara",
                'description' => "Pasta",
                'photo' => "6.jpg",
                'price' => 5.50,
                'category_id' => 1
            ]);

        DB::table("products")
            ->insert([
                'name' => "Pasta Con Camarones",
                'description' => "Pasta",
                'photo' => "7.jpg",
                'price' => 6.50,
                'category_id' => 1
            ]);

        DB::table("products")
            ->insert([
                'name' => "Macarrones Con Pollo Y Queso Parmesano",
                'description' => "Macarrones",
                'photo' => "8.jpg",
                'price' => 5.50,
                'category_id' => 1
            ]);

        DB::table("products")
            ->insert([
                'name' => "Parrillada Musap 3 Personas",
                'description' => "Parrillada",
                'photo' => "9.jpg",
                'price' => 16.00,
                'category_id' => 1
            ]);

        DB::table("products")
            ->insert([
                'name' => "Parrillada Musap 4/5 Personas",
                'description' => "Parrillada",
                'photo' => "10.jpg",
                'price' => 21.00,
                'category_id' => 1
            ]);

        DB::table("products")
            ->insert([
                'name' => "Ensalada Con Pechuga A La Plancha",
                'description' => "Ensalada",
                'photo' => "11.jpg",
                'price' => 5.50,
                'category_id' => 1
            ]);

        DB::table("products")
            ->insert([
                'name' => "Nachos Con Carne Queso Y Guacamole",
                'description' => "Nachos",
                'photo' => "12.jpg",
                'price' => 7.50,
                'category_id' => 1
            ]);

        DB::table("products")
            ->insert([
                'name' => "Nachos Mojados",
                'description' => "Nachos",
                'photo' => "13.jpg",
                'price' => 6.50,
                'category_id' => 1
            ]);

        DB::table("products")
            ->insert([
                'name' => "Picada Pequeña",
                'description' => "Picada",
                'photo' => "14.jpg",
                'price' => 5.25,
                'category_id' => 1
            ]);

        DB::table("products")
            ->insert([
                'name' => "Picada Grande",
                'description' => "Picada",
                'photo' => "15.jpg",
                'price' => 10.50,
                'category_id' => 1
            ]);

        DB::table("products")
            ->insert([
                'name' => "Quesadilla",
                'description' => "Deliciosa Quesadilla",
                'photo' => "16.jpg",
                'price' => 5.00,
                'category_id' => 1
            ]);

        DB::table("products")
            ->insert([
                'name' => "Hamburguesa",
                'description' => "Hamburguesa",
                'photo' => "17.jpg",
                'price' => 6.25,
                'category_id' => 1
            ]);

        DB::table("products")
            ->insert([
                'name' => "Camarones Apanados",
                'description' => "Camarones Con Apanadura",
                'photo' => "18.jpg",
                'price' => 6.75,
                'category_id' => 1
            ]);

        DB::table("products")
            ->insert([
                'name' => "Papi Pollo",
                'description' => "Papas Fritas Con Pollo",
                'photo' => "19.jpg",
                'price' => 3.00,
                'category_id' => 1
            ]);

        DB::table("products")
            ->insert([
                'name' => "Salchi Papa",
                'description' => "Salchichas Con Papas Fritas",
                'photo' => "20.jpg",
                'price' => 2.50,
                'category_id' => 1
            ]);

        DB::table("products")
            ->insert([
                'name' => "Michelada Limón Y Maracuya",
                'description' => "Deliciosa Michelada",
                'photo' => "21.jpg",
                'price' => 4.00,
                'category_id' => 2
            ]);

        DB::table("products")
            ->insert([
                'name' => "Michelada Musap",
                'description' => "Una Michelada Exclusiva Del Musap Bar",
                'photo' => "22.jpg",
                'price' => 7.50,
                'category_id' => 2
            ]);

        DB::table("products")
            ->insert([
                'name' => "Corona",
                'description' => "Cerveza Corona 350 Ml",
                'photo' => "23.jpg",
                'price' => 3.00,
                'category_id' => 2
            ]);

        DB::table("products")
            ->insert([
                'name' => "Pilsener Personal",
                'description' => "Cerveza Pilsener",
                'photo' => "24.jpg",
                'price' => 3.00,
                'category_id' => 2
            ]);

        DB::table("products")
            ->insert([
                'name' => "Stella",
                'description' => "Cerveza Stella 330 Ml",
                'photo' => "25.jpg",
                'price' => 3.00,
                'category_id' => 2
            ]);

        DB::table("products")
            ->insert([
                'name' => "Club",
                'description' => "Cerveza Club 330 Ml",
                'photo' => "26.jpg",
                'price' => 1.75,
                'category_id' => 2
            ]);

        DB::table("products")
            ->insert([
                'name' => "Modelo",
                'description' => "Cerveza Modelo 355 Ml",
                'photo' => "27.jpg",
                'price' => 3.75,
                'category_id' => 2
            ]);

        DB::table("products")
            ->insert([
                'name' => "Agua",
                'description' => "Agua Vivant 600 Ml",
                'photo' => "28.jpg",
                'price' => 1.00,
                'category_id' => 2
            ]);

        DB::table("products")
            ->insert([
                'name' => "Jarra De Limonada",
                'description' => "Limonada",
                'photo' => "29.jpg",
                'price' => 2.50,
                'category_id' => 2
            ]);

        DB::table("products")
            ->insert([
                'name' => "Coca Cola Personal",
                'description' => "Cola",
                'photo' => "30.jpg",
                'price' => 1.00,
                'category_id' => 2
            ]);

        DB::table("products")
            ->insert([
                'name' => "Coca Cola De 1 Litro",
                'description' => "Cola",
                'photo' => "31.jpg",
                'price' => 2.00,
                'category_id' => 2
            ]);

        DB::table("products")
            ->insert([
                'name' => "Coca Cola De 2 Litros",
                'description' => "Cola",
                'photo' => "32.jpg",
                'price' => 3.00,
                'category_id' => 2
            ]);

        DB::table("products")
            ->insert([
                'name' => "Coca Cola De 3 Litros",
                'description' => "Cola",
                'photo' => "33.jpg",
                'price' => 3.50,
                'category_id' => 2
            ]);

        DB::table("products")
            ->insert([
                'name' => "Fuze Tea Personal",
                'description' => "Fuze Tea",
                'photo' => "34.jpg",
                'price' => 1.00,
                'category_id' => 2
            ]);

        DB::table("products")
            ->insert([
                'name' => "Fuze Tea 1 Litro",
                'description' => "Fuze Tea",
                'photo' => "35.jpg",
                'price' => 2.00,
                'category_id' => 2
            ]);

        DB::table("products")
            ->insert([
                'name' => "Heineken",
                'description' => "Cerveza Heineken 330 Ml",
                'photo' => "36.jpg",
                'price' => 3.00,
                'category_id' => 2
            ]);

        DB::table("products")
            ->insert([
                'name' => "Cerveza Sol",
                'description' => "Cerveza Personal 330 Ml",
                'photo' => "37.jpg",
                'price' => 3.00,
                'category_id' => 2
            ]);

        DB::table("products")
            ->insert([
                'name' => "Atalitas Bbq",
                'description' => "Exquisitas Alitas De Pollo Bañadas En Deliciosa Salsa Bbq",
                'photo' => "38.jpg",
                'price' => 5.00,
                'category_id' => 3
            ]);

        DB::table("products")
            ->insert([
                'name' => "Nachos",
                'description' => "Nachos Con Queso",
                'photo' => "39.jpg",
                'price' => 5.00,
                'category_id' => 3
            ]);

        DB::table("products")
            ->insert([
                'name' => "Maracuyá Haze",
                'description' => "Es Una Cerveza Golden Ale Madurada Con Pulpa De Maracuyá Grado Alcoholico 5 Grados Amargor: 15",
                'photo' => "40.jpg",
                'price' => 2.50,
                'category_id' => 4
            ]);

        DB::table("products")
            ->insert([
                'name' => "Strong Bitter",
                'description' => "Aroma: A Lupulo Moderada Media Alta Tipicamente Con Caracter Floral Terroso Y Recinoso Aroma Malta Media Alta Apariencia: Flavor, Medio, Con Evidentes Aromas A Maltas, El Perfil De La Malta Es A Pan Biscoso Y Un Poco Tostado, Con Un Sabor A Caramelo Bajo Alcohol: 5.4 Grados",
                'photo' => "41.jpg",
                'price' => 2.50,
                'category_id' => 4
            ]);

        DB::table("products")
            ->insert([
                'name' => "American Stout",
                'description' => "-Aroma: Moderadamente Lupulada Con Notas De Malta Tostada Con Un Toque A Café Y Chocolate -Sabor: A Malta Tostada Con Un Toque De Amargor Con Un Final Cremoso Medio Seco -Alcohol: 6 Grados",
                'photo' => "42.jpg",
                'price' => 2.50,
                'category_id' => 4
            ]);

        DB::table("products")
            ->insert([
                'name' => "Triple Blont",
                'description' => "-Aroma: A Especies, Banana Y A Clavo De Olor , Directamente -Sabor: Es Frutal Con Un Final Dulce Y Una Ligera Nota A Miel -Alcohol: 8 Grados",
                'photo' => "43.jpg",
                'price' => 2.50,
                'category_id' => 4
            ]);

        DB::table("products")
            ->insert([
                'name' => "Filete De Paiche",
                'description' => "Filete De Paiche Al Vapor, A La Parrilla Y Apanado",
                'photo' => "44.jpg",
                'price' => 12.00,
                'category_id' => 5
            ]);

        DB::table("products")
            ->insert([
                'name' => "Salmón A La Plancha",
                'description' => "Con Vegetales A La Parrilla",
                'photo' => "45.jpg",
                'price' => 12.00,
                'category_id' => 5
            ]);

        DB::table("products")
            ->insert([
                'name' => "Corvina Apanada",
                'description' => "Con Salsa Limón Crema Y Mostaza",
                'photo' => "46.jpg",
                'price' => 12.00,
                'category_id' => 5
            ]);

        DB::table("products")
            ->insert([
                'name' => "Camarón Al Scampi",
                'description' => "Camarones Al Sarten Con Salsa Limón, Ajo Y Vino Blanco",
                'photo' => "47.jpg",
                'price' => 12.00,
                'category_id' => 5
            ]);

        DB::table("products")
            ->insert([
                'name' => "Frutti Di Madre",
                'description' => "Pasta Marinera",
                'photo' => "48.jpg",
                'price' => 12.00,
                'category_id' => 5
            ]);

        DB::table("products")
            ->insert([
                'name' => "Corvina Al Pesto",
                'description' => "Deliciosa Corvina",
                'photo' => "49.jpg",
                'price' => 12.00,
                'category_id' => 5
            ]);

        DB::table("products")
            ->insert([
                'name' => "Camaron A La Bbq",
                'description' => "Camarones Envueltos En Deliciosa Salsa Bbq",
                'photo' => "50.jpg",
                'price' => 12.00,
                'category_id' => 5
            ]);

        DB::table("products")
            ->insert([
                'name' => "Camarones Sobre Pasta Pluma",
                'description' => "Con Brócoli, Tomate Seco En Salsa Alfredo",
                'photo' => "51.jpg",
                'price' => 12.00,
                'category_id' => 6
            ]);

        DB::table("products")
            ->insert([
                'name' => "Camarones Carbonara",
                'description' => "Con Tocino En Salsa Alfredo Sobre Espaghetti",
                'photo' => "52.jpg",
                'price' => 12.00,
                'category_id' => 6
            ]);

        DB::table("products")
            ->insert([
                'name' => "Pollo Cajun",
                'description' => "Sobre Pasta Con Salsa Cremosa De Queso Parmesano",
                'photo' => "53.jpg",
                'price' => 12.00,
                'category_id' => 6
            ]);

        DB::table("products")
            ->insert([
                'name' => "Camarones Casalinga",
                'description' => "Camarones, Chorizo, Champiñones Y Queso Sobre Pasta Rigatoni En Una Clasica Salsa Marina",
                'photo' => "54.jpg",
                'price' => 12.00,
                'category_id' => 6
            ]);

        DB::table("products")
            ->insert([
                'name' => "Pasta Primavera",
                'description' => "Vegetales Al Sarten Con Salsa Alfredo Sobre Espaghetti",
                'photo' => "55.jpg",
                'price' => 12.00,
                'category_id' => 6
            ]);

        DB::table("products")
            ->insert([
                'name' => "Filete Mignon Con Camarones",
                'description' => "Lomo Fino Y Camarones A La Parrilla Con Vino Merlot Y Salsa Pico De Gallo",
                'photo' => "56.jpg",
                'price' => 12.00,
                'category_id' => 7
            ]);

        DB::table("products")
            ->insert([
                'name' => "Lomo Fino",
                'description' => "Al Sarten Con Salsa De Vino Merlot",
                'photo' => "57.jpg",
                'price' => 12.00,
                'category_id' => 7
            ]);

        DB::table("products")
            ->insert([
                'name' => "Pollo Envoltini",
                'description' => "Pechuga Rellena Con Jamón Y Mozarela",
                'photo' => "58.jpg",
                'price' => 12.00,
                'category_id' => 8
            ]);

        DB::table("products")
            ->insert([
                'name' => "Pollo A La Ronco's",
                'description' => "Pechuga De Pollo Con Camarones, Brocoli Al Sarten Cubiertas De Mozzarella Derretida",
                'photo' => "59.jpg",
                'price' => 12.00,
                'category_id' => 8
            ]);

        DB::table("products")
            ->insert([
                'name' => "Bolitas De Carne",
                'description' => "En Fettucini Pasta En Salsa Rosada",
                'photo' => "60.jpg",
                'price' => 6.00,
                'category_id' => 9
            ]);

        DB::table("products")
            ->insert([
                'name' => "Alitas De Pollo",
                'description' => "Alitas",
                'photo' => "61.jpg",
                'price' => 6.00,
                'category_id' => 9
            ]);

        DB::table("products")
            ->insert([
                'name' => "Picadita",
                'description' => "Una Deliciosa Mescla De Carnes Como Pollo, Res Y Cerdo Acopañada De Papas Fritas, Yuca Y Platanos Maduros",
                'photo' => "62.jpg",
                'price' => 5.00,
                'category_id' => 10
            ]);

        DB::table("products")
            ->insert([
                'name' => "Alitas Bbq",
                'description' => "Alitas De Pollo Bañadas En Deliciosa Salsa Bbq",
                'photo' => "63.jpg",
                'price' => 5.00,
                'category_id' => 10
            ]);

        DB::table("products")
            ->insert([
                'name' => "Empanada De Queso",
                'description' => "Una Deliciosa Empadana De Arina De Trigo Sin Levadura Con Un Relleno De Queso Espectacular",
                'photo' => "64.jpg",
                'price' => 1.50,
                'category_id' => 11
            ]);

        DB::table("products")
            ->insert([
                'name' => "Empanada Napolitana",
                'description' => "Una Deliciosa Empadana De Arina De Trigo Sin Levadura Con Un Relleno De Carne Molida, Queso Mozarella Y Una Exquisita Lasaña",
                'photo' => "65.jpg",
                'price' => 1.75,
                'category_id' => 11
            ]);

        DB::table("products")
            ->insert([
                'name' => "Rolls Meet",
                'description' => "Exquisitos Rollos De Carne Acompañados Con Queso, Champiñones, Pimiento, Cebolla Y Una Deliciosa Salsa De Tomate",
                'photo' => "66.jpg",
                'price' => 6.50,
                'category_id' => 12
            ]);
    }
}
