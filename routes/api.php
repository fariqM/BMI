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
        Route::patch('basah-move-to/{stock:id}', 'StockController@BasahMoveto');
        Route::patch('cancel-moulding-basah/{stock:id}', 'StockController@cancelMouldingBasah');
        Route::patch('finish-moulding-basah/{stock:id}', 'StockController@finishMouldingBasah');
        Route::patch('move-to-joint/{stock:id}', 'StockController@MoveToJoint');
        Route::patch('proceed/moulding/{stock:id}', 'StockController@mouldingProcessBasah');
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
        Route::patch('kering-move-to/{stock:id}', 'StockController@KeringMoveto');
        Route::patch('cancel-moulding-kering/{stock:id}', 'StockController@cancelMouldingKering');
        Route::patch('finish-moulding-kering/{stock:id}', 'StockController@finishMouldingKering');
        Route::patch('move-to-joint/{stock:id}', 'StockController@MoveToJointFromBasah');
        Route::patch('proceed/moulding/{stock:id}', 'StockController@mouldingProcessBasah');
        Route::get('output-index', 'StockController@outputKeringIndex');
        Route::patch('output-index/rollback/{stock:id}', 'StockController@outputKeringIndexRollback');
    });

    Route::prefix('gudang-coating')->group(function(){
        Route::get('input-index', 'StockController@indexInputCoating');
        Route::patch('confirm/{stock:id}', 'StockController@confirmCoating');
        Route::patch('proceed/{stock:id}', 'StockController@proceedCoating');
        Route::patch('rollback/{stock:id}', 'StockController@rollbackCoatingProcess');
        Route::get('process-index', 'StockController@processIndexCoating');
        Route::patch('finish-coating/{stock:id}', 'StockController@finishCoating');
        Route::patch('move-to-packing/{stock:id}', 'StockController@CoatingMoveToPacking');
        Route::get('output-index', 'StockController@outputCoatingIndex');
        Route::patch('output-index/rollback/{stock:id}', 'StockController@outputCoatingIndexRollback');
    });

    Route::prefix('gudang-packing')->group(function(){
        Route::get('input-index', 'StockController@indexInputPacking');
        Route::patch('confirm/{stock:id}', 'StockController@confirmPacking');
        Route::patch('proceed/{stock:id}', 'StockController@proceedPacking');
        Route::patch('rollback/{stock:id}', 'StockController@rollbackPackingProcess');
        Route::get('process-index', 'StockController@processIndexPacking');
        Route::patch('finish-packing/{stock:id}', 'StockController@finishPacking');
        Route::patch('edit-stock-packing/{stock:id}', 'StockController@updateStockPacking');
        Route::patch('edit-profile-stock-packing/{stock:id}', 'StockController@updateProfileStockPacking');
    });

    Route::prefix('gudang-joint')->group(function(){
        Route::get('input-index', 'StockController@indexInputJoint');
        Route::patch('confirm/{stock:id}', 'StockController@confirmJoint');
        Route::patch('proceed-fj/{stock:id}', 'StockController@proceedFingerJoint');
        Route::patch('finish-fj/{stock:id}', 'StockController@finishFingerJoint');
        Route::patch('proceed-hf/{stock:id}', 'StockController@proceedHighFreqJoint');
        Route::patch('finish-hf/{stock:id}', 'StockController@finishHighFreq');
        Route::patch('rollback/{stock:id}', 'StockController@rollbackJointProcess');
        Route::get('process-index', 'StockController@processIndexJoint');
        Route::patch('joint-move-to/{stock:id}', 'StockController@JointMoveto');
        Route::get('output-index', 'StockController@outputJointIndex');
        Route::patch('output-index/rollback/{stock:id}', 'StockController@outputJointIndexRollback');
        Route::patch('proceed-moulding-joint/{stock:id}', 'StockController@mouldingJointProceed');
        Route::patch('proceed-moulding-joint/finish/{stock:id}', 'StockController@FinishMouldingJointProceed');
        Route::patch('proceed-moulding-joint/cancel/{stock:id}', 'StockController@CancelMouldingJointProceed');
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
