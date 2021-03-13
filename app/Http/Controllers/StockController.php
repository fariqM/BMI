<?php

namespace App\Http\Controllers;

use App\Http\Resources\StockResource;
use App\Models\Stock;
use App\Models\Stockprofile;
use App\Models\Type;
use App\Models\Warehouse;
use App\Rules\PositiveBolean;
use Illuminate\Http\Request;

class StockController extends Controller
{

    public function index()
    {
        $stocks = Stock::get();
        return StockResource::collection($stocks);
    }

    public function update(Stock $stock)
    {
        $attr = request()->validate([
            'length' => ['required', new PositiveBolean],
            'width' => ['required', new PositiveBolean],
            'height' => ['required', new PositiveBolean],
            'type_id' => 'required',
        ]);

        $type = Type::find(request('type_id'));
        $name = capslock(request('structure_category')) . ' BB ' . $type->name;
        $length = request('length');
        $width = request('width');
        $height = request('height');
        $size = $length * $width * $height;
        $float = number_format((float)$size, 3, '.', '');

        $attr2 = [
            'size' => $float,
            'name' => $name,
        ];

        $stock->update(array_merge($attr, $attr2));

        return response()->json([
            'message' => 'success',
        ]);
    }

    public function addstock()
    {
        $stock =  request()->validate([
            'length' => ['required', new PositiveBolean],
            'width' => ['required', new PositiveBolean],
            'height' => ['required', new PositiveBolean],
            'type_id' => 'required',
            'sawmillrun_id' => 'required',
        ]);
        $type = Type::find(request('type_id'));
        $name = capslock(request('structure_category')) . ' BB ' . $type->name;
        $length = request('length');
        $width = request('width');
        $height = request('height');
        $size = $length * $width * $height;
        $float = number_format((float)$size, 3, '.', '');
        $stock2 = [
            'size' => $float,
            'name' => $name,
            'tally' => 'IR',
            'status' => NULL,
            'confirm_status' => NULL,
            'unit_measure_id' => 1,
            'origin' => 1,
            'warehouse_id' => 1,
        ];

        Stock::create(array_merge($stock, $stock2));

        $latestid = latestid('stocks');
        $tally = 'IR' . $latestid + 13157;

        optional(Stock::find($latestid))->update([
            'tally' => $tally
        ]);

        return response()->json([
            'message' => 'success'
        ]);
    }

    public function move1(Stock $stock)
    {
        $warehouse_id = request('warehouse_id');
        $warehouse = Warehouse::find($warehouse_id);

        $status = "moving to " . $warehouse->name;

        $stock->update([
            'warehouse_id' => $warehouse_id,
            'status' => $status,
            'confirm_status' => 'unconfirmed'
        ]);

        return response()->json([
            'message' => 'success'
        ]);
    }

    public function indexInputBasah()
    {
        $stocks = Stock::where('warehouse_id', 2)->latest()->get();
        return StockResource::collection($stocks);
    }


    public function confirmBasah(Stock $stock)
    {

        $stock->update([
            'confirm_status' => 'confirmed',
            'status' => 'stored at GUDANG P BASAH',
        ]);

        return response()->json([
            'message' => 'success',
        ]);
    }

    public function proceedBasah(Stock $stock)
    {
        $stock->update([
            'status' => 'profile process'
        ]);

        return response()->json([
            'message' => 'success',
        ]);
    }

    public function rollbackBasahProcess(Stock $stock)
    {
        $stock->update([
            'status' => 'stored at GUDANG P BASAH'
        ]);
        return response()->json([
            'message' => 'success',
        ]);
    }

    public function cancelMouldingBasah(Stock $stock){
        $stock->update([
            'status' => 'finished on BMI-D'
        ]);
        return response()->json([
            'message' => 'success',
        ]);
    }

    public function finishMouldingBasah(Stock $stock){
        $name = request('name').' '.'MD';

        $stock->update([
            'name' => $name,
            'status' => 'finished on BMI-D'
        ]);
        return response()->json([
            'message' => 'success',
        ]);
    }

    public function processIndexBasah()
    {
        $stocks = Stock::with('stockprofile')->where('warehouse_id', 2)
        ->where('confirm_status', 'confirmed')->latest()->get();
        return StockResource::collection($stocks);
    }

    public function mouldingProcessBasah(Stock $stock){
        $stock->update([
            'status' => 'moulding process'
        ]);
        return response()->json([
            'message' => 'success',
        ]);
    }

    public function createProfileStock(Stock $stock)
    {

        $length = request('length');
        $width = request('width');
        $height = request('height');
        $size = $length * $width * $height;
        $float = number_format((float)$size, 3, '.', '');


        $stockprofile = request()->validate([
            'length' => ['required', new PositiveBolean],
            'width' => ['required', new PositiveBolean],
            'height' => ['required', new PositiveBolean],
        ]);

        $stockprofile2 = [
            'size' => $float
        ];

        Stockprofile::create(array_merge($stockprofile, $stockprofile2));

        $latestid = latestid('stockprofiles');

        $stock->update([
            'stockprofile_id' => $latestid,
            'status' => 'finished on BMI-D',
        ]);

        return response()->json([
            'message' => 'success'
        ]);
    }

    public function UpdateProfileStock(Stockprofile $stockprofile){

        $attr = request()->validate([
            'length' => ['required', new PositiveBolean],
            'width' => ['required', new PositiveBolean],
            'height' => ['required', new PositiveBolean],
        ]);
        $length = request('length');
        $width = request('width');
        $height = request('height');
        $size = $length * $width * $height;
        $float = number_format((float)$size, 3, '.', '');

        $attr2 = [
            'size' => $float,
        ];

        $stockprofile->update(array_merge($attr, $attr2));

        return response()->json([
            'message' => 'success',
            'info' => $stockprofile
        ]);
    }

    public function BasahMoveto(Stock $stock){
        $warehouse_id = request('warehouse_id');
        $warehouse = Warehouse::find($warehouse_id);

        $status = "moving to " . $warehouse->name;

        $stock->update([
            'warehouse_id' => $warehouse_id,
            'status' => $status,
            'origin' => 2,
            'confirm_status' => 'unconfirmed'
        ]);

        return response()->json([
            'message' => 'success'
        ]);
    }

    public function MoveToJoint(Stock $stock){
        $warehouse = Warehouse::find(4);

        $status = "moving to " . $warehouse->name;

        $stock->update([
            'warehouse_id' => 4,
            'status' => $status,
            'origin' => 2,
            'confirm_status' => 'unconfirmed'
        ]);

        return response()->json([
            'message' => 'success'
        ]);
    }

    public function outputBasahIndex(){

        $stocks = Stock::where('origin', 2)->get();

        return StockResource::collection($stocks);
    }

    public function outputBasahIndexRollback(Stock $stock){
        $stock->update([
            'warehouse_id' => 2,
            'status' => 'finished on BMI-D',
            'origin' => 1,
            'confirm_status' => 'confirmed'
        ]);
        return response()->json([
            'message' => 'success'
        ]);
    }

   

    public function indexInputCoating(){
        $stocks = Stock::where('warehouse_id', 13)->latest()->get();
        return StockResource::collection($stocks);
    }



    public function indexInputKering(){
        $stocks = Stock::where('warehouse_id', 3)->latest()->get();
        return StockResource::collection($stocks);
    }

    public function confirmKering(Stock $stock)
    {

        $stock->update([
            'confirm_status' => 'confirmed',
            'status' => 'stored at GUDANG P Kering',
        ]);

        return response()->json([
            'message' => 'success',
        ]);
    }

    public function proceedKering(Stock $stock)
    {
        $stock->update([
            'status' => 'profile process'
        ]);

        return response()->json([
            'message' => 'success',
        ]);
    }

    public function rollbackKeringProcess(Stock $stock)
    {
        $stock->update([
            'status' => 'stored at GUDANG P KERING'
        ]);
        return response()->json([
            'message' => 'success',
        ]);
    }

    public function cancelMouldingKering(Stock $stock){
        $stock->update([
            'status' => 'finished on BMI-DB'
        ]);
        return response()->json([
            'message' => 'success',
        ]);
    }

    public function finishMouldingKering(Stock $stock){
        $name = request('name').' '.'MD';

        $stock->update([
            'name' => $name,
            'status' => 'finished on BMI-DB'
        ]);
        return response()->json([
            'message' => 'success',
        ]);
    }

    
    public function mouldingProcessKering(Stock $stock){
        $stock->update([
            'status' => 'moulding process'
        ]);
        return response()->json([
            'message' => 'success',
        ]);
    }

    public function KeringMoveto(Stock $stock){
        $warehouse_id = request('warehouse_id');
        $warehouse = Warehouse::find($warehouse_id);

        $status = "moving to " . $warehouse->name;

        $stock->update([
            'warehouse_id' => $warehouse_id,
            'status' => $status,
            'origin' => 3,
            'confirm_status' => 'unconfirmed'
        ]);

        return response()->json([
            'message' => 'success'
        ]);
    }

    
    public function processIndexKering()
    {
        $stocks = Stock::with('stockprofile')
        ->where('warehouse_id', 3)->where('confirm_status', 'confirmed')->latest()->get();
        return StockResource::collection($stocks);
    }

    
    public function createProfileStockKering(Stock $stock)
    {
        $name = request('name').' '.'KD';
        $length = request('length');
        $width = request('width');
        $height = request('height');
        $size = $length * $width * $height;
        $float = number_format((float)$size, 3, '.', '');


        $stockprofile = request()->validate([
            'length' => ['required', new PositiveBolean],
            'width' => ['required', new PositiveBolean],
            'height' => ['required', new PositiveBolean],
        ]);

        $stockprofile2 = [
            'size' => $float
        ];

        Stockprofile::create(array_merge($stockprofile, $stockprofile2));

        $latestid = latestid('stockprofiles');

        $stock->update([
            'stockprofile_id' => $latestid,
            'status' => 'finished on BMI-DB',
            'name' => $name,
        ]);

        return response()->json([
            'message' => 'success'
        ]);
    }

    public function MoveToCoatingFromBasah(Stock $stock){

        $warehouse = Warehouse::find(13);

        $status = "moving to " . $warehouse->name;

        $stock->update([
            'warehouse_id' => 13,
            'status' => $status,
            'origin' => 3,
            'confirm_status' => 'unconfirmed'
        ]);

        return response()->json([
            'message' => 'success'
        ]);
    }

    public function MoveToJointFromBasah(Stock $stock){
        $warehouse = Warehouse::find(4);

        $status = "moving to " . $warehouse->name;

        $stock->update([
            'warehouse_id' => 4,
            'status' => $status,
            'origin' => 3,
            'confirm_status' => 'unconfirmed'
        ]);

        return response()->json([
            'message' => 'success'
        ]);
    }

    public function outputKeringIndex(){

        $stocks = Stock::where('origin', 3)->get();

        return StockResource::collection($stocks);
    }

    public function outputKeringIndexRollback(Stock $stock){
        $stock->update([
            'warehouse_id' => 3,
            'status' => 'finished on BMI-DB',
            'origin' => 1,
            'confirm_status' => 'confirmed'
        ]);
        return response()->json([
            'message' => 'success'
        ]);
    }
    

    


    
}
