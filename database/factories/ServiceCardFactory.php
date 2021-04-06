<?php

namespace Database\Factories;

use App\Models\ServiceCard;
use Illuminate\Database\Eloquent\Factories\Factory;

class ServiceCardFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = ServiceCard::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'titre' => $this->faker->sentence($nbWords = 2, $variableNbWords = true) ,
            'texte' => $this->faker->text($maxNbChars = 150),
            'picture_id'=> $this->faker->numberBetween(1,3),
        ];
    }
}
