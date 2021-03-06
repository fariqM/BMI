<?php

use App\Http\Controllers\RawController;
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
        Route::patch('{fruit:id}/edit', 'FruitController@update');
        Route::delete('{fruit:id}/delete', 'FruitController@destroy');
    });

    Route::prefix('gudang-bahanbaku')->group(function(){
        Route::get('index', 'RawController@index');
        Route::post('add-raw', 'RawController@addraw');
        Route::get('index/{raw:id}', 'RawController@show');
        Route::get('lastrecord', 'RawController@lastrecord');
        Route::patch('{raw:id}/move', 'RawController@move');
        Route::get('output-index', 'RecordController@recordBB');
        Route::delete('output-index/rollback/{record:id}', 'RecordController@rollbackBB');
    });

    Route::prefix('gudang-sawmill')->group(function(){
        Route::patch('confirm-raw/{record:id}', 'RecordController@confirmraw');
        Route::get('checkconfirm/{record:id}', 'RecordController@checkconfrim');
        Route::patch('mismatch-stored/{record:id}', 'RecordController@stored');
        Route::patch('mismatch-returned/{record:id}', 'RecordController@returned');
    });


    Route::prefix('invoice')->group(function(){
        Route::get('index', 'InvoiceController@index');
        Route::post('add-invoice', 'InvoiceController@addinvoice');
    });

    Route::prefix('supplier')->group(function(){
        Route::get('index', 'SupplierController@index');
        Route::post('add-supplier', 'SupplierController@addsupplier');
        Route::get('index/{supplier:id}', 'SupplierController@show');
        Route::patch('index/{supplier:id}/edit', 'SupplierController@update');
    });

    Route::prefix('structure-category')->group(function(){
        Route::get('index', 'StructureCategoryController@index');
        Route::post('add-structure', 'StructureCategoryController@addstructure');
    });

    Route::prefix('warehouse')->group(function(){
        Route::get('index', 'WarehouseController@index');
        Route::post('add-warehouse', 'WarehouseController@addwarehouse');
        Route::get('index/{warehouse:id}', 'WarehouseController@show');
        Route::get('gudang-bb', 'WarehouseController@bb');
    });

    Route::prefix('record')->group(function(){
        Route::get('index', 'RecordController@index');
        Route::post('move/{raw:id}', 'RecordController@move');
        Route::get('check/{raw:id}', 'RecordController@check');
        
    });

});

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });
