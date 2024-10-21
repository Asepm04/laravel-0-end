<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Services\services1;
use Illuminate\Support\Facades\Storage;

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

    public function testFileStorage()
    {
        $filesystem = Storage::disk("local");
        $filesystem->put("file.txt","test file storage");
        $test=  $filesystem->get("file.txt");

        self::assertEquals($test,"test file storage");
    }

    public function testFileStorageLink()
    {
        $filesystem = Storage::disk("public");
        $filesystem->put("file.txt","test file storage");
        $test=  $filesystem->get("file.txt");

        self::assertEquals($test,"test file storage");
    }
}
