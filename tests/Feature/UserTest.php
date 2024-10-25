<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Services\User\UserService;


class UserTest extends TestCase
{
    private $UserService;
   public function setUp():void
   {
     parent::setUp();
     $this->UserService = $this->app->make(UserService::class);
   }
   
   public function testUser()
   {
     self::assertTrue(true);
   }

   public function testLogin()
   {
    self::assertTrue($this->UserService->login("yadi","ok"));
    self::assertFalse($this->UserService->login("yadi","klS"));

   }
}
