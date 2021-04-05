<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ServiceTitreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        DB::table('service_titres')->insert(
            [
                [
                    'titre' => "GET IN THE LAB AND SEE THE SERVICES",
                    'info' => "titre 1 page service ",
                ],
                [
                    'titre' => "GET IN THE LAB AND DISCOVER THE WORLD",
                    'info' => "titre 2 page service ",
                ],      
            ]
        );
    }
}
