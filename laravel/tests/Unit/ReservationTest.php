<?php

namespace Tests\Unit;

use App\Http\Controllers\ReservationController;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ReservationTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testReservationPageIsAuthAndRedirects()
    {
        $response = $this->get('/reservation/index');

        $response->assertStatus(302);
    }
}
