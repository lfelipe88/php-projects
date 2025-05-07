<?php

namespace Tests\Feature;

use App\Models\Student;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class StudentControllerTest extends TestCase
{
    use RefreshDatabase; // Se asegura de que la base de datos se reinicie entre pruebas

    /**
     * Test para obtener la lista de estudiantes.
     *
     * @return void
     */
    public function test_can_get_students()
    {
        // Crear algunos estudiantes en la base de datos utilizando la fábrica
        Student::factory()->count(3)->create();

        // Hacer una solicitud GET a la ruta de los estudiantes
        $response = $this->getJson('/api/students');

        // Verificar que el código de estado sea 200 (OK)
        $response->assertStatus(200);

        // Verificar que la respuesta contiene una estructura JSON esperada
        $response->assertJsonStructure([
            'students' => [
                '*' => [ // Cada estudiante debe tener estos campos
                    'id',
                    'name',
                    'email',
                    'phone',
                    'language',
                    'created_at',
                    'updated_at',
                ],
            ],
            'status',
        ]);

        // Verificar que la respuesta contiene la lista de estudiantes
        $response->assertJsonCount(3, 'students'); // Verifica que haya 3 estudiantes
    }
    

}