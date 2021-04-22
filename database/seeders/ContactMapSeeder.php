<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ContactMapSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('contact_maps')->insert(
            [
                [
                    'src' => "https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d24377.261375908427!2d4.2728366786400125!3d50.86219354236788!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sfr!2sbe!4v1619072136090!5m2!1sfr!2sbe",
                ],
               
            ]
        );
    }
}
