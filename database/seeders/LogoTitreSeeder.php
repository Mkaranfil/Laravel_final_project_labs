<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LogoTitreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('logo_titres')->insert(
            [
                [
                    'titre' => "Get your freebie template now!",
                ],
              
            ]
        );
    }
}
