<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class UserFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = User::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {   //usa this porque usa los metodos que hereda de Factory
        return [
            'nombre' => $this->faker->firstName().' '.$this->faker->firstName(),
            'apellido' => $this->faker->lastName().' '.$this->faker->lastName(),
            'telefono'=>'SV_7'.$this->faker->randomNumber(3, true).' '.$this->faker->randomNumber(4, true),
            'email' => $this->faker->unique()->safeEmail(),
            'fecha_nacimiento'=>$this->faker-> dateTime($max = 'now', $timezone = null),
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => Str::random(10),
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    public function unverified()
    {
        return $this->state(function (array $attributes) {
            return [
                'email_verified_at' => null,
            ];
        });
    }
}
