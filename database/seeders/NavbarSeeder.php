<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class NavbarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('navbars')->insert(
            [
                [
                    'titre' => "Home",
                    'href'=>"/",
                ],
                [
                    'titre' => "Services",
                    'href'=>"/services",
                ],
                [
                    'titre' => "Blog",
                    'href'=>"/blog",
                ],
                [
                    'titre' => "Contact",
                    'href'=>"/contact",
                ],
               
            ]
        );
    }
}
