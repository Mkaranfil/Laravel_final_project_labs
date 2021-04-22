<?php

namespace Database\Seeders;

use App\Models\ContactUs;
use App\Models\Post;
use App\Models\ServiceCard;
use App\Models\ServiceListe;
use App\Models\Testimonial;
use Illuminate\Database\Seeder;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
       
        $this->call([
            NavbarSeeder::class,
            LogoSeeder::class,
            LogoTitreSeeder::class,
            CarouselSeeder::class,
            HomeTitreSeeder::class,
            ParaHomeSeeder::class,
            HomeVideoSeeder::class,
            TestiPictureSeeder::class,
            // service
            ServiceTitreSeeder::class,
            IconSeeder::class,
            CardPictureSeeder::class,
            // user
            RoleSeeder::class, 
            PosteSeeder::class, 
            UserPictureSeeder::class, 
            MembreSeeder::class, 
            // blog
            TagSeeder::class,
            CategorieSeeder::class,
            BlogPictureSeeder::class,
            // footer
            FooterSeeder::class,
            // Conatact
            ContactUsSeeder::class,
            ContactAdresseSeeder::class,
            ContactSubjectSeeder::class,
            ContactMapSeeder::class,
           
        ]);
        Testimonial::factory()->count(10)->create();
        ServiceListe::factory()->count(18)->create();
        ServiceCard::factory()->count(6)->create();
        Post::factory()->count(4)->create();
        
        $this->call([
            PostTagSeeder::class,
        ]);
       
    }
}
