<?php

namespace Database\Factories;

use App\Models\Student;
use Illuminate\Database\Eloquent\Factories\Factory;

class StudentFactory extends Factory
{
    protected $model = Student::class;

    public function definition()
    {
        return [
            'name' => $this->faker->name, // Se asegura de que el campo 'name' no esté vacío
            'email' => $this->faker->unique()->safeEmail, // Proporciona un email único
            'phone' => $this->faker->phoneNumber, // Genera un número de teléfono
            'language' => $this->faker->word, // Proporciona un idioma ficticio
        ];
    }
}