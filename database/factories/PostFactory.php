<?php

namespace Database\Factories;

use App\Models\Post;
use Illuminate\Database\Eloquent\Factories\Factory;

class PostFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Post::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'titre' => $this->faker->sentence($nbWords = 2, $variableNbWords = true) ,
            'texte' => $this->faker->text($maxNbChars = 1000)  ,
            'check' => $this->faker->numberBetween(0,1),
            'picture_id'=> $this->faker->numberBetween(1,3),   
            'user_id'=> 3, 
            'categorie_id'=> $this->faker->numberBetween(1,5), 
        ];
    }
}
