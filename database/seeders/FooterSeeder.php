<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FooterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('footers')->insert(
            [
                [
                    'span1' => "2021 All rights reserved. Designed by",
                    'span2' => "MKA",
                    'url' => "https://github.com/Mkaranfil",

                ],
                
              
            ]
        );
    }
}
