<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Estudiante;

class EstudianteFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nombre' => $this->faker->firstName(),
            'apellido' => $this->faker->lastName(),
            'edad' => rand(10, 15),
            'dni' => rand(1000000, 9999999),
            'promedio' => floatval(mt_rand( 0.00 , 100.00 * 2) / 2),
            'grado' => rand(1, 10),
            'seccion' => chr(rand(65,90))
        ];
    }
}
