<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table("users")
            ->insert([
                "id" => 10000,
                'name' => "Cliente",
                "lastname" => "Harold xddd",
                'email' => "client",
                'password' => Hash::make("client")
            ]);
        DB::table("users")
            ->insert([
                "id" => 1,
                'name' => "Super",
                "lastname" => "Administrador",
                "role" => User::$_ROLES[2],
                'email' => "admin",
                'password' => Hash::make("admin")
            ]);
        DB::table("users")
            ->insert([
                "id" => 2,
                'name' => "Administrador",
                "lastname" => " ",
                "role" => User::$_ROLES[2],
                'email' => "travelbfm",
                'password' => Hash::make("6zrK^#qV#2S1$8Fh")
            ]);

        // User for Business
        DB::table("users")
            ->insert([
                "id" => 3,
                'name' => "MUSAP",
                "lastname" => "BAR",
                "role" => User::$_ROLES[1],
                'email' => "musap",
                'password' => Hash::make("password")
            ]);
        DB::table("users")
            ->insert([
                'id' => 4,
                'name' => "HENDRIX",
                "lastname" => " ",
                "role" => User::$_ROLES[1],
                'email' => "HENDRIX",
                'password' => Hash::make("password")
            ]);
        DB::table("users")
            ->insert([
                'id' => 5,
                'name' => "RONCOS",
                "lastname" => "RESTAURANT",
                "role" => User::$_ROLES[1],
                'email' => "RONCOS",
                'password' => Hash::make("password")
            ]);
        DB::table("users")
            ->insert([
                'id' => 6,
                'name' => "COMIDA RAPIDA",
                "lastname" => "DOÑA PACHI",
                "role" => User::$_ROLES[1],
                'email' => "DOÑAPACHI",
                'password' => Hash::make("password")
            ]);
        DB::table("users")
            ->insert([
                'id' => 7,
                'name' => "NILA",
                "lastname" => "EMPANADAS",
                "role" => User::$_ROLES[1],
                'email' => "NILA",
                'password' => Hash::make("password")
            ]);
        DB::table("users")
            ->insert([
                'id' => 8,
                'name' => "TISHOS",
                "lastname" => "PIZZA",
                "role" => User::$_ROLES[1],
                'email' => "TISHOS",
                'password' => Hash::make("password")
            ]);
    }
}
