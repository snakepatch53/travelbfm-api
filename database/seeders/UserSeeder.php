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
                'name' => "Super",
                "lastname" => "Administrador",
                "phone" => "0987654321",
                "address" => "Calle 123",
                "state" => "Activo",
                "role" => "Administrador",
                'email' => "admin",
                'password' => Hash::make("admin"),
                "confirmation_code" => "123456"
            ]);
        User::factory()
            ->count(2)
            ->create();

        User::factory()
            ->count(2)
            ->hasBusinesses(2)
            ->create();

        User::factory()
            ->count(2)
            ->hasCarts(2)
            ->create();

        User::factory()
            ->count(2)
            ->hasBusinesses(2)
            ->hasCarts(2)
            ->create();
    }
}
