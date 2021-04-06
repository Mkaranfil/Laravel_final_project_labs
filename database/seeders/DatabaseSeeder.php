<?php

namespace Database\Seeders;

use App\Models\Carousel;
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

        ]);
        Testimonial::factory()->count(10)->create();
        ServiceListe::factory()->count(18)->create();
    }
}
