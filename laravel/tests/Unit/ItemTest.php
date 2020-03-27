<?php

namespace Tests\Unit;

use App\Models\Item;
use Tests\TestCase;

class ItemTest extends TestCase
{
    public function test_items() {
        $items = factory(Item::class)->create();
        $this->assertTrue(is_string($items->description));
        $this->assertTrue(is_string($items->location));
        $this->assertTrue(is_string($items->imagePath));
        $this->assertTrue(is_numeric($items->quantity));
    }

    public function testItemsShowWithoutAuth() {
        $response = $this->get('/item/index');

        $response->assertStatus(200);
        $response->assertSee('Item Catalog');
    }

    public function testItemsDontShowNewItemButtonWhenNotAdmin() {
        $response = $this->get('/item/index');

        $response->assertStatus(200);
        $response->assertDontSee('New Item');
    }

    public function testItemsNew() {
        $response = $this->get('/item/new');

        $response->assertStatus(200);
        $response->assertSee('New Item');
        $response->assertSee('Save');
    }

    public function testItemEdit() {
        $response = $this->get('/item/edit/1');

        $response->assertStatus(200);
        $response->assertSee('Edit Item');
        $response->assertSee('Save');
        $response->assertSee('Delete Item');
    }
}
