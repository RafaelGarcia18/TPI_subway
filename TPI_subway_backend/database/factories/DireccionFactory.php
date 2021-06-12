<?php

namespace Database\Factories;

use App\Models\Direccion;
use Illuminate\Database\Eloquent\Factories\Factory;

class DireccionFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Direccion::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $departamentos = array(
            'Santa Ana',
            'Sonsonate',
            'Ahuachapan',
            'Usulután',
            'San Miguel',
            'Morazán',
            'La Unión', 'La Libertad',
            'Chalatenango',
            'Cuscatlán',
            'San Salvador',
            'La Paz',
            'Cabañas',
            'San Vicente'
        );

        $municipios = array(
            'Santa Ana',
            'Candelaria de la Frontera',
            'Chalchuapa',
            'Coatepeque',
            'El Congo',
            'El Porvenir',
            'Masahuat',
            'Metapán',
            'San Antonio Pajonal',
            'San Sebastián Salitrillo',
            'Santa Rosa Guachipilín',
            'Santiago de la Frontera',
            'Texistepeque'
        );
        $colonias = array('San Lorenzo', 'Santa Lucia','Santa Ana Norte','Ciudad Real');
        return [
            'etiqueta' => $this->faker->sentence(2, true),
            'pais'=> 'El Salvador',
            'latitud'=>13.9947208,
            'longitud'=>-89.5566796,
            'codigo_postal'=>'0210',
            'departamento' => $this->faker->randomElement($departamentos),
            'municipio' => $this->faker->randomElement($municipios),
            'colonia' => $this->faker->randomElement($colonias),
            'calle_avenida' => $this->faker->sentence(5, true),
            'num_casa' => $this->faker->numberBetween(1, 20),
            'referencias' => $this->faker->sentence(5, true),
        ];
    }
}
