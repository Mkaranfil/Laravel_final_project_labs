<?php

namespace Database\Factories;

use App\Models\ServiceListe;
use Illuminate\Database\Eloquent\Factories\Factory;

class ServiceListeFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = ServiceListe::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        
            return [
                'titre' => $this->faker->sentence($nbWords = 2, $variableNbWords = true) ,
                'texte' => $this->faker->text($maxNbChars = 150)  ,
                'icon_id'=> $this->faker->numberBetween(1,30),   
            ];
    
    }
}
