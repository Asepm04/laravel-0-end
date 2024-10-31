<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Illuminate\Support\facades\DB;
use Illuminate\Support\facades\log;


class DBTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function setUp():void
    {
        parent::setUp();
        DB::delete("delete from user_");
    }

    public function testInsertDBquery()
    {
        DB::table("user_")->insert(
            [
                'id'=>1,
            'nama'=>'yadi',
            'deskripsi'=>'text'
            ]
            
        );

        self::assertTrue(true);
    }
    public function testInsertDBqueryw()
    {
        DB::table("user_")->insert(
            [
                'id'=>10,
            'nama'=>'yadi',
            'deskripsi'=>'text'
            ]
            
        );
        $data = DB::table("user_")->select('*')->get();
        $data->each(function($item)
        {
            log::info(json_encode($item));
        });
        self::assertTrue(true);
    }

}
