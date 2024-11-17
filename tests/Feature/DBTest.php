<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Illuminate\Support\facades\DB;
use Illuminate\Support\facades\log;
use App\Models\Categori;
use Database\Seeders\CategorySeeder;
use App\Models\Vouchers;


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
        DB::delete("delete from categoris");
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

    public function testEloquent()
    {
        $categori = new Categori();
        $categori->id = '1wwr1';
        $categori->nama = "yadi";
        $result = $categori->save();

        self::assertTrue($result);

    }

    public function testInsertMany()
    {
        for($a=0; $a<10; $a++)
        {
            $categori = new Categori();
            $categori->id =$a;
            $categori->nama = "nama $a";

            $result = $categori->save();

            self::assertTrue($result);
        }
        $categori->each(function($category)
    {
        log::info(json_encode($category));
     });
    }

    public function testFind(){

        $this->seed(CategorySeeder::class);

        $result = Categori::Find("food");

        self::assertEquals("food",$result->nama);

    }

    public function testUpdate()
    {
        $this->seed(CategorySeeder::class);

        $result = Categori::Find("food");
        $result->nama = "yadi food";
       $a =  $result->update();
       self::assertEquals("yadi food",$result->nama);

        


    }

    public function testSelect()
    {
        $this->seed(CategorySeeder::class);

        $result = Categori::get();
        self::assertNotNull($result);

        $result->each(function($item)
    {
        log::info(json_encode($item));
    });

        


    }

    public function testDelete()
    {
        $this->seed(CategorySeeder::class);

        $result = Categori::where("id","=","food")->delete();
        self::assertEquals(1,$result);
    }

    public function testEloquent2()
    {
        $item = new Vouchers();
        $item->save();

        self::assertTrue($item);
    }

    public function testFillable()

    {
        $request = [ 'name_voucher' =>'free voucher'];

        $result = Vouchers::create($request);
        self::assertTrue($result);
    }

}
