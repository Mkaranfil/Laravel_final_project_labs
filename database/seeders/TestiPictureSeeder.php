<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TestiPictureSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('testi_pictures')->insert(
            [
                [
                    'src' => "01.jpg",
                ],
                [
                    'src' => "02.jpg",
                ],
                [
                    'src' => "03.jpg",
                ],
              
            ]
        );
    }
}
