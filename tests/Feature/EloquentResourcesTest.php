<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class EloquentResourcesTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testResource(){
        $this->get("/api/categori/food")
        ->assertStatus(200)
        ->assertjson([
            "data"=>
            [
                    "id"=>"food",
                    "nama"=>"food",
                    "created"=>"2024-11-17T13:33:16.000000Z",
                    "updated"=>"2024-11-17T13:33:16.000000Z"
            ]
        ]
        );
    }
}
