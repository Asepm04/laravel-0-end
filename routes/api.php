<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Categori;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::fallback(function(){
    return "up not found";
});


Route::get("categori/{id}",function($id){
    $categori = Categori::FindOrFail($id);
    return new App\Http\Resources\CategoriResource($categori);
});

Route::get("categori",function()
{
    $categori = Categori::all();
    return  App\Http\Resources\CategoriResource::collection($categori);
    
});

Route::get("categoriV2",function()
{
    $categori = Categori::all();
    return  new App\Http\Resources\CategoriCollResource($categori);
    
});



