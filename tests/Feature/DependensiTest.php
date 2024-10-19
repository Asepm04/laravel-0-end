<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Services\services1;

class DependensiTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_example()
    {
        $services = $this->app->make(services1::class);
        $services2 = $this->app->make(services1::class);


        self::assertEquals($services,$services2);
    }
}
