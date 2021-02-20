<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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


Route::namespace('App\Http\Controllers')->group(function(){
    Route::prefix('fruits')->group(function(){
        Route::post('add-fruit', 'FruitController@addfruit');
        Route::get('index', 'FruitController@index');
        Route::get('{fruit:id}', 'FruitController@show')->name('fruits.show');
        Route::patch('{fruit:slug}/edit', 'FruitController@update');
        Route::delete('{fruit:slug}/delete', 'FruitController@destroy');
    });

});

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });
