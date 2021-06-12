<?php

namespace Database\Factories;

use App\Models\Factura;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

class FacturaFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Factura::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nombre_contacto'=>$this->faker->firstName().' '.$this->faker->firstName(),
            'correo_contacto'=> $this->faker->unique()->safeEmail(),
            'telefono_contacto'=>'SV_7'.$this->faker->randomNumber(3, true).' '.$this->faker->randomNumber(4, true),
            'indicaciones'=> $this->faker->sentence(5, true)
        ];
    }
}
