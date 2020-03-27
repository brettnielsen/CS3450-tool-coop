<?php


namespace Tests\Unit;
use Tests\TestCase;

class GeneralTests extends TestCase
{
    public function testWelcomeScreen() {
        $response = $this->get('/');

        $response->assertStatus(200);
        $response->assertSee('Neighborhood Tool Co-op');
    }

    public function testContactUs() {
        $response = $this->get('/help');

        $response->assertStatus(200);
        $response->assertSee('Contact info');
    }

    public function testLogin() {
        $response = $this->get('/login');

        $response->assertStatus(200);
        $response->assertSee('Login');
        $response->assertSee('Forgot Your Password?');
    }
}
