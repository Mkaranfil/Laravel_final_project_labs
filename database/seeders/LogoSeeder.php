<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LogoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('logos')->insert(
            [
                [
                    'src' => "big-logo.png",
                    'titre' => "Logo LABS",
                ],
              
            ]
        );
    }
}
