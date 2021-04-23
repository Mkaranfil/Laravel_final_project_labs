<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class MembreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                'prenom' => 'Mustafa',
                'nom' => 'Karanfil',
                'email' => 'mkaranfil@live.fr',
                'poste_id' => '1',
                'role_id' => '1',
                'picture_id' => 1,
                'description' => 'Salut je suis Admin',
                'password' => Hash::make('mkaranfil@live.fr'),
                'check' => 1,
            ],
            [
                'prenom' => 'WEB master',
                'nom' => 'web master',
                'email' => 'webmaster@live.fr',
                'poste_id' => '2',
                'role_id' => '2',
                'picture_id' => 2,
                'description' => 'Salut je suis web Master',
                'password' => Hash::make('webmaster@live.fr'),
                'check' => 1,
            ],
            [
                'prenom' => 'Redacteur',
                'nom' => 'Redacteur',
                'email' => 'redacteur@live.fr',
                'poste_id' => '3',
                'role_id' => '3',
                'picture_id' => 3,
                'description' => 'Salut je suis redacteur',
                'password' => Hash::make('redacteur@live.fr'),
                'check' => 1,
            ],
            [
                'prenom' => 'Membre Valide',
                'nom' => 'Membre Valide',
                'email' => 'membreV@live.fr',
                'poste_id' => '4',
                'role_id' => '4',
                'picture_id' => 3,
                'description' => 'Salut je suis membres valide',
                'password' => Hash::make('membreV@live.fr'),
                'check' => 1,
            ],
            [
                'prenom' => 'Membre NON Valide',
                'nom' => 'Membre  NON Valide',
                'email' => 'membreN@live.fr',
                'poste_id' => '5',
                'role_id' => '4',
                'picture_id' => 2,
                'description' => 'Salut je suis membres  NON valide',
                'password' => Hash::make('membreN@live.fr'),
                'check' => 0,
            ],

        ]);
    }
}
