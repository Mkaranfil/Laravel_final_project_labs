<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserPictureSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('user_pictures')->insert(
            [
                [
                    'src' => "1.jpg",
                ],
                [
                    'src' => "2.jpg",
                ],
                [
                    'src' => "3.jpg",
                ],
              
            ]
        );
    }
}
