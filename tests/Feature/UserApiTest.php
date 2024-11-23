<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Illuminate\Support\Facades\DB;
use App\Models\UserApi;

class UserApiTest extends TestCase
{
   public function setUp():void
   {
        parent::setUp();
        DB::delete("delete from user_apis");
        DB::delete("delete from contact_apis");
        DB::delete("delete from address_apis");
   }

    public function testRegisterSuccess()
    {
        $this->post("/api/users",[
            "username"=>"yadi",
            "name"=>"yaddi",
            "password"=>"123456"
        ])->assertStatus(200);
    }

    public function testRegisterFailed()
    {
        $this->post("/api/users",[
            "username"=>"",
            "name"=>"",
            "password"=>""
        ])->assertStatus(500)
        ->assertJson(
            [
                "username"=>["The username field is required"],
                "password"=>["The password field is required"],
                "name"=>["The name field is required"]
                
            ]
        );
    }
    public function testRegisterAlready()
    {
        $this->testRegisterSuccess();

        $this->post("/api/users",[
            "username"=>"yadi",
            "name"=>"yaddi",
            "password"=>"1234556"
        ])->assertStatus(500)
        ->assertJson([
            "errors"=>
            [
                "username"=>"username is already",
                
            ]
        ]);


    }

    //end register test

    //login test

    public function testLogin()
    {
        $this->testRegisterSuccess();

        $this->post("/api/users/login",[
            "username"=>"yadi",
            "password"=>"123456"
        ])->assertStatus(200)
        ->assertJson([
            "username"=>"yadi",
            "name"=>"yaddi"
        ]);

        $user = UserApi::where("username","yadi");
        if($user)
        {
            self::assertNotNull($user->token);
        }
    }

    public function testFailedLogin()
    {
        $this->post("/api/users/login",[
            "username"=>"yaddi",
            "password"=>"10023456"
        ])->assertStatus(200)
        ->assertJson([
            "errors"=>"username or password wrong"
        ]);
    }

    //end login test
}
