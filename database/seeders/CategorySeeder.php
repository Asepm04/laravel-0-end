<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Categori;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categori = new Categori();
        $categori->id = "food";
        $categori->nama ="food";
        $categori->save();
       
        $categori = new Categori();
        $categori->id = "good";
        $categori->nama ="good";
        $categori->save();
    }
}
