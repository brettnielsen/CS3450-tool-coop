<?php

namespace Tests\Unit;

use Tests\TestCase;

class ItemTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function testItemsShowWithoutAuth()
    {
        $response = $this->get('/item/index');

        $response->assertStatus(200);
        $response->assertSee('Item Catalog');
    }
}
