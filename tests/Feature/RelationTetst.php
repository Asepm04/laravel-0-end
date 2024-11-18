<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;
use App\Models\Profile;
use Illuminate\Support\Facades\Auth;

class RelationTetst extends TestCase
{
    /** 
     * A basic feature test example.
     *
     *ini percobaan input data relasi denga logic terpisah 
     *misal setelah input data user lalu ,dan input data profile setelah login
     */
    public function testRelation(){
        $request = 
        [
            "name"=>"asep",
            "email"=>"a2@com",
            "password"=>bcrypt("123abc.")
        ];
        $user = User::create($request);

        Auth::login($user); //paksa login manual

        $profile = [ "job"=>"programmer"];
        Auth::user()->profile()->create($profile);
        self::assertTrue(true);


    }
/**
 * jika sebelumnya data profile sudah ada ,maka gunakan update,
 * tapi jika null,maka gunakan create
 */
    public function testUpdate(){
        $user = User::with('profile')->Find(1);
        Auth::login($user);
        Auth::user()->profile()->create(["job"=>"senior java"]); 
        self::assertTrue(true);
    }

    
}
