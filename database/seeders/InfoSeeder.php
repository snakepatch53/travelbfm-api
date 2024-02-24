<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class InfoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table("infos")
            ->insert([
                "name" => "Travel BFM",
                "logo" => "logo.png",
                "icon" => "icon.png",
                "phone" => "+593 990 684 141",
                "whatsapp" => "+593 990 684 141",
                "email" => "travel.wordec@gmail.com",
            ]);
    }
}
