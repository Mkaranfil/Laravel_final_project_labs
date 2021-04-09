<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BlogPictureSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('blog_pictures')->insert(
            [
                [
                    'src' => "blog-1.jpg",
                ],
                [
                    'src' => "blog-2.jpg",
                ],
                [
                    'src' => "blog-3.jpg",
                ],
              
            ]
        );
    }
}
