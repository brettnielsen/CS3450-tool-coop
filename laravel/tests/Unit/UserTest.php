<?php

namespace Tests\Unit;

use Tests\TestCase;

class UserTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testUserPageRedirects()
    {
        $response = $this->get('/user/index');

        $response->assertStatus(302);
    }

}
