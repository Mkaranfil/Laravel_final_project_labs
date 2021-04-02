<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CarouselSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('carousels')->insert(
            [
                [
                    'src' => "01.jpg",
                    'nom' => "photo 1",
                ],
                [
                    'src' => "02.jpg",
                    'nom' => "photo 2",
                ],
              
            ]
        );
    }
}
