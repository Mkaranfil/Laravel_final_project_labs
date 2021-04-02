<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class HomeTitreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('home_titres')->insert(
            [
                [
                    'titre' => "GET IN THE LAB AND DISCOVER THE WORLD",
                    'description' => "titre 1 page home ",
                ],
                [
                    'titre' => "WHAT OUR CLIENTS SAY",
                    'description' => "titre 2 page home ",
                ],
                [
                    'titre' => "GET IN THE LAB AND SEE THE SERVICES",
                    'description' => "titre 3 page home ",
                ],
                [
                    'titre' => "GET IN THE LAB AND MEET THE TEAM",
                    'description' => "titre 4 page home ",
                ],
              
            ]
        );
    }
}
