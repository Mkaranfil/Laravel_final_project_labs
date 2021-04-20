<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ContactAdresseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('contact_adresses')->insert(
            [
                [
                    'Rue' => "C/ Libertad",
                    'commune' => "Arévalo",
                    'numero' => "34",
                    'code_postale' => "05200",
                    'tel'=>"0034 37483 2445 322",
                    'email'=>"hello@company.com",

                ],
                
                
            ]
        );
    }
}
