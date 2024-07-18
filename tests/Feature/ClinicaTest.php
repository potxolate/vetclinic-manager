<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\User;

class ClinicaTest extends TestCase
{
    use RefreshDatabase;

    public function test_user_can_create_clinic()
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)->post('/clinics', [
            'name' => 'Test Clinic',
            'mail' => 'test@clinic.com',
            'phone' => '123456789'
        ]);

        $response->assertStatus(302); // Redirección después de creación
        $this->assertDatabaseHas('clinics', [
            'name' => 'Test Clinic',
            'mail' => 'test@clinic.com',
            'phone' => '123456789'
        ]);
    }
}
