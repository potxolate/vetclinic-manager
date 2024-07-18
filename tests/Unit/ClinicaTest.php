<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;
use App\Models\Clinic;

class ClinicaTest extends TestCase
{
    public function test_clinica_creation()
    {
        $clinic = new Clinic([
            'name' => 'Test Clinic',
            'mail' => 'test@clinic.com',
            'phone' => '123456789'
        ]);

        $this->assertEquals('Test Clinic', $clinic->name);
        $this->assertEquals('test@clinic.com', $clinic->mail);
        $this->assertEquals('123456789', $clinic->phone);
    }
}
