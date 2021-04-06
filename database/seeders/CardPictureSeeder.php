<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CardPictureSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('card_pictures')->insert(
            [
                [
                    'src' => "card-1.jpg",
                ],
                [
                    'src' => "card-2.jpg",
                ],
                [
                    'src' => "card-3.jpg",
                ],
                
              
            ]
        );
    }
}
