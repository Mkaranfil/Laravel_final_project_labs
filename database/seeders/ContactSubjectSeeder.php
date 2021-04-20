<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ContactSubjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('contact_subjects')->insert(
            [
                [
                    'subject' => "Tarif",
                ],
                [
                    'subject' => "Question",
                ],
                [
                    'subject' => "Service",
                ], 
            ]
        );
    }
}
