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
        Route::patch('index/{raw:id}', 'RawController@update');
        Route::patch('{raw:id}/move', 'RawController@move');
        Route::get('output-index', 'RecordController@recordBB');
        Route::patch('confirm-mismatch/{record:id}', 'RecordController@confirmMismatch');
        Route::delete('output-index/rollback/{record:id}', 'RecordController@rollbackBB');
    });

    Route::prefix('gudang-sawmill')->group(function(){
        Route::get('input-index', 'RecordController@inputrecordsawmill');
        Route::patch('edit-on-hand/{record:id}', 'RecordController@editOnHand');
        Route::patch('confirm-raw/{record:id}', 'RecordController@confirmraw');
        Route::get('checkconfirm/{record:id}', 'RecordController@checkconfrim');
        Route::patch('mismatch-stored/{record:id}', 'RecordController@stored');
        Route::patch('mismatch-returned/{record:id}', 'RecordController@returned');
        Route::get('stock-index', 'SawmillstockController@stockindex');
        Route::get('bb-stock', 'SawmillstockController@bbindex');
        Route::post('add-bb-stock', 'SawmillstockController@add_bb_stock');
        Route::patch('process/{record:id}', 'SawmillstockController@addprocess');
        Route::get('process-index', 'SawmillstockController@processindex');
        Route::patch('finish-process/{sawmillrun:id}', 'SawmillstockController@finishprocess');
        Route::patch('rollback-process/{sawmillrun:id}', 'SawmillstockController@rollbackprocess');
        Route::get('output-index', 'SawmillstockController@outputIndex');
        Route::patch('output-index/rollback/{stock:id}', 'SawmillstockController@rollbackOutput');
    });

    Route::prefix('gudang-p-basah')->group(function(){
        Route::get('input-index', 'StockController@indexInputBasah');
        Route::patch('confirm/{stock:id}', 'StockController@confirmBasah');
        Route::patch('proceed/{stock:id}', 'StockController@proceedBasah');
        Route::patch('rollback/{stock:id}', 'StockController@rollbackBasahProcess');
        Route::get('process-index', 'StockController@processIndexBasah');
        Route::patch('create-profile-stock/{stock:id}', 'StockController@createProfileStock');
        Route::patch('edit-profile-stock/{stockprofile:id}', 'StockController@UpdateProfileStock');
        Route::patch('move-to-coating/{stock:id}', 'StockController@MoveToCoating');
        Route::patch('move-to-joint/{stock:id}', 'StockController@MoveToJoint');
        Route::get('output-index', 'StockController@outputBasahIndex');
        Route::patch('output-index/rollback/{stock:id}', 'StockController@outputBasahIndexRollback');
    });

    Route::prefix('gudang-p-kering')->group(function(){
        Route::get('input-index', 'StockController@indexInputKering');
        Route::patch('confirm/{stock:id}', 'StockController@confirmKering');
        Route::patch('proceed/{stock:id}', 'StockController@proceedKering');
        Route::patch('rollback/{stock:id}', 'StockController@rollbackKeringProcess');
        Route::get('process-index', 'StockController@processIndexKering');
        Route::patch('create-profile-stock/{stock:id}', 'StockController@createProfileStockKering');
        Route::patch('edit-profile-stock/{stockprofile:id}', 'StockController@UpdateProfileStock');
        Route::patch('move-to-coating/{stock:id}', 'StockController@MoveToCoatingFromBasah');
        Route::patch('move-to-joint/{stock:id}', 'StockController@MoveToJointFromBasah');
        Route::get('output-index', 'StockController@outputKeringIndex');
        Route::patch('output-index/rollback/{stock:id}', 'StockController@outputKeringIndexRollback');
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

    Route::prefix('type')->group(function(){
        Route::get('index', 'TypeController@index');
        Route::post('add-type', 'TypeController@addtype');
        Route::get('edit-type/{type:id}', 'TypeController@updatetype');
        Route::patch('edit-type/{type:id}/update', 'TypeController@updatetype');
    });

    Route::prefix('stock')->group(function(){
        Route::get('index', 'StockController@index');
        Route::post('addstock', 'StockController@addstock');
        Route::get('index/{stock:id}', 'StockController@show');
        Route::patch('index/{stock:id}/update', 'StockController@update');
        Route::patch('move1/{stock:id}', 'StockController@move1');
    });

});

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });
