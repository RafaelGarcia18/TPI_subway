<?php

namespace Database\Factories;

use App\Models\TipoPan;
use Illuminate\Database\Eloquent\Factories\Factory;

class TipoPanFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = TipoPan::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nombre'=>$this->faker->sentence(2,true) ,
            'precio'=>$this->faker->randomFloat(2, 0.01, 5)
        ];
    }
}
