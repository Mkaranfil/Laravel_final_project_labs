<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class HomeVideoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('home_videos')->insert(
            [
                [
                    'lien' => "https://www.youtube.com/watch?v=JgHfx2v9zOU",
                    'info' => "video home promotion copmany",
                ],
              
            ]
        );
    }
}
