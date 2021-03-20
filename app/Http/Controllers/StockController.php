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
            'pcs' => ['required', new PositiveBolean, 'integer'],
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
            'pcs' => ['required', new PositiveBolean, 'integer'],
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
        $pcs = request('pcs');
        $size = ($length * $width * $height * $pcs)/1000000;

        $float = number_format((float)$size, 3, '.', '');


        $stockprofile = request()->validate([
            'length' => ['required', new PositiveBolean],
            'pcs' => ['required', new PositiveBolean, 'integer'],
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
            'pcs' => ['required', new PositiveBolean, 'integer'],
            'width' => ['required', new PositiveBolean],
            'height' => ['required', new PositiveBolean],
        ]);
        $length = request('length');
        $width = request('width');
        $height = request('height');
        $pcs = request('pcs');
        $size = ($length * $width * $height * $pcs)/1000000;
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

    public function confirmCoating(Stock $stock)
    {

        $stock->update([
            'confirm_status' => 'confirmed',
            'status' => 'stored at GUDANG COATING',
        ]);

        return response()->json([
            'message' => 'success',
        ]);
    }

    public function proceedCoating(Stock $stock)
    {
        $stock->update([
            'status' => 'coating process'
        ]);

        return response()->json([
            'message' => 'success',
        ]);
    }

    public function rollbackCoatingProcess(Stock $stock)
    {
        $stock->update([
            'status' => 'stored at GUDANG COATING'
        ]);
        return response()->json([
            'message' => 'success',
        ]);
    }

    public function processIndexCoating()
    {
        $stocks = Stock::with('stockprofile')->where('warehouse_id', 13)
        ->where('confirm_status', 'confirmed')->latest()->get();
        return StockResource::collection($stocks);
    }

    public function finishCoating(Stock $stock){

        $name = request('name').' '.'COATED';

        $stock->update([
            'name' => $name,
            'status' => 'finished on BMI-E'
        ]);
        return response()->json([
            'message' => 'success',
        ]);
    }

    public function CoatingMoveToPacking(Stock $stock){
        $warehouse = Warehouse::find(14);

        $status = "moving to " . $warehouse->name;

        $stock->update([
            'warehouse_id' => 14,
            'status' => $status,
            'origin' => 13,
            'confirm_status' => 'unconfirmed'
        ]);

        return response()->json([
            'message' => 'success'
        ]);
    }

    public function outputCoatingIndex(){

        $stocks = Stock::where('origin', 13)->get();

        return StockResource::collection($stocks);
    }

    public function outputCoatingIndexRollback(Stock $stock){
        $StockId = request('id');
        $model = Stock::find($StockId);
        $name = $model->name;
        $warehouse_id = 13;

        if(strpos($name, 'JOINT') !== false){
            $warehouse_id = 4;
        } else if (strpos($name, 'KD') !== false){
            $warehouse_id = 3;
        } else {
            $warehouse_id = 2;
        }
        

        $stock->update([
            'warehouse_id' => 13,
            'status' => 'finished on BMI-E',
            'origin' => $warehouse_id,
            'confirm_status' => 'confirmed'
        ]);
        return response()->json([
            'message' => 'success'
        ]);
    }

    public function indexInputJoint(){
        $stocks = Stock::where('warehouse_id', 4)->latest()->get();
        return StockResource::collection($stocks);
    }

    public function confirmJoint(Stock $stock)
    {

        $stock->update([
            'confirm_status' => 'confirmed',
            'status' => 'stored at GUDANG JOINT',
        ]);

        return response()->json([
            'message' => 'success',
        ]);
    }

    public function proceedFingerJoint(Stock $stock){
        $stock->update([
            'status' => 'finger-joint process'
        ]);

        return response()->json([
            'message' => 'success',
        ]);
    }

    public function proceedHighFreqJoint(Stock $stock){
        $stock->update([
            'status' => 'high-frequency process'
        ]);

        return response()->json([
            'message' => 'success',
        ]);
    }

    public function mouldingJointProceed(Stock $stock){
        $stock->update([
            'status' => 'moulding process'
        ]);
        return response()->json([
            'message' => 'success',
        ]);
    }

    public function FinishMouldingJointProceed(Stock $stock){
        $name = request('name').' '.'MD';

        $stock->update([
            'name' => $name,
            'status' => 'finished on BMI-F'
        ]);
        return response()->json([
            'message' => 'success',
        ]);
    }

    public function CancelMouldingJointProceed(Stock $stock){
        $stock->update([
            'status' => 'finished on BMI-F'
        ]);
        return response()->json([
            'message' => 'success',
        ]);
    }

    public function rollbackJointProcess(Stock $stock)
    {
        $stock->update([
            'status' => 'stored at GUDANG JOINT'
        ]);
        return response()->json([
            'message' => 'success',
        ]);
    }

    public function processIndexJoint()
    {
        $stocks = Stock::with('stockprofile')
        ->where('warehouse_id', 4)->where('confirm_status', 'confirmed')->latest()->get();
        return StockResource::collection($stocks);
    }

    public function finishFingerJoint(Stock $stock){

        $stockprofile = request()->validate([
            'length' => ['required', new PositiveBolean],
            'width' => ['required', new PositiveBolean],
            'height' => ['required', new PositiveBolean],
            'pcs' => ['required', new PositiveBolean, 'integer'],
        ]);
        
        $profilewood_id = $stock->stockprofile_id;
        $length = request('length');
        $width = request('width');
        $height = request('height');
        $pcs = request('pcs');
        $size = ($length * $width * $height * $pcs)/1000000;
        $float = number_format((float)$size, 3, '.', '');

        $name = request('name').' '.'FJ';
        
        $stockprofile2 = [
            'size' => $float,
        ];
        
        optional(Stockprofile::find($profilewood_id))
        ->update(array_merge($stockprofile, $stockprofile2));

        $stock->update([
            'name' => $name,
            'status' => 'finished on BMI-F'
        ]);
        return response()->json([
            'message' => 'success',
        ]);
    }
    
    public function finishHighFreq(Stock $stock){
        $stockprofile = request()->validate([
            'length' => ['required', new PositiveBolean],
            'width' => ['required', new PositiveBolean],
            'height' => ['required', new PositiveBolean],
            'pcs' => ['required', new PositiveBolean, 'integer'],
        ]);
        
        $profilewood_id = $stock->stockprofile_id;
        $length = request('length');
        $width = request('width');
        $height = request('height');
        $pcs = request('pcs');
        $size = ($length * $width * $height * $pcs)/1000000;
        $float = number_format((float)$size, 3, '.', '');

        $name = request('name').' '.'HF';

        $stockprofile2 = [
            'size' => $float,
        ];
        
        optional(Stockprofile::find($profilewood_id))
        ->update(array_merge($stockprofile, $stockprofile2));

        $stock->update([
            'name' => $name,
            'status' => 'finished on BMI-F'
        ]);
        return response()->json([
            'message' => 'success',
        ]);
    }
    
    public function JointMoveto(Stock $stock){
        $warehouse_id = request('warehouse_id');
        $warehouse = Warehouse::find($warehouse_id);

        $status = "moving to " . $warehouse->name;

        $stock->update([
            'warehouse_id' => $warehouse_id,
            'status' => $status,
            'origin' => 4,
            'confirm_status' => 'unconfirmed'
        ]);

        return response()->json([
            'message' => 'success'
        ]);
    }

    public function outputJointIndex(){

        $stocks = Stock::where('origin', 4)->get();

        return StockResource::collection($stocks);
    }

    public function outputJointIndexRollback(Stock $stock){

        $StockId = request('id');
        $model = Stock::find($StockId);
        $warehouse_id = 4;
        $name = $model->name;
        
        if(strpos($name, 'KD') !== false){
            $warehouse_id = 3;
        } else{
            $warehouse_id = 2;
        }

        $stock->update([
            'warehouse_id' => 4,
            'status' => 'finished on BMI-F',
            'origin' => $warehouse_id,
            'confirm_status' => 'confirmed'
        ]);

        return response()->json([
            'message' => 'success'
        ]);
    }



    public function indexInputKering(){
        $stocks = Stock::where('warehouse_id', 3)->latest()->get();
        return StockResource::collection($stocks);
    }

    public function confirmKering(Stock $stock)
    {

        $stock->update([
            'confirm_status' => 'confirmed',
            'status' => 'stored at GUDANG P KERING',
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
        $pcs = request('pcs');
        $size = ($length * $width * $height * $pcs)/1000000;
        $float = number_format((float)$size, 3, '.', '');


        $stockprofile = request()->validate([
            'length' => ['required', new PositiveBolean],
            'width' => ['required', new PositiveBolean],
            'pcs' => ['required', new PositiveBolean, 'integer'],
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

    public function updateProfileStockPacking(Stockprofile $stockprofile){
        

        $attr = request()->validate([
            'length' => ['required', new PositiveBolean],
            'pcs' => ['required', new PositiveBolean, 'integer'],
            'width' => ['required', new PositiveBolean],
            'height' => ['required', new PositiveBolean],
        ]);

        $length = request('length');
        $width = request('width');
        $height = request('height');
        $pcs = request('pcs');
        $size = ($length * $width * $height * $pcs)/1000000;
        $float = number_format((float)$size, 3, '.', '');

        $attr2 = [
            'size' => $float,
        ];
        
        optional(Stockprofile::find(request('id')))->update(array_merge($attr, $attr2));

        return response()->json([
            'message' => 'success updating wood profile',
            'attch' => $stockprofile
        ]);
    }

    public function updateStockPacking(Stock $stock){
        $attr = request()->validate([
            'length' => ['required', new PositiveBolean],
            'width' => ['required', new PositiveBolean],
            'height' => ['required', new PositiveBolean],
            'pcs' => ['required', new PositiveBolean, 'integer'],
        ]);

        $length = request('length');
        $width = request('width');
        $height = request('height');
        $size = $length * $width * $height;
        $float = number_format((float)$size, 3, '.', '');

        $attr2 = [
            'size' => $float,
        ];

        // optional(Stockprofile::find($stock->stockprofile_id))->update(array_merge($attr, $attr2));

        $stock->update(array_merge($attr, $attr2));

        return response()->json([
            'message' => 'success',
        ]);
    }

    public function indexInputPacking(){
        $stocks = Stock::where('warehouse_id', 14)->latest()->get();
        return StockResource::collection($stocks);
    }

    public function confirmPacking(Stock $stock)
    {

        $stock->update([
            'confirm_status' => 'confirmed',
            'status' => 'stored at GUDANG PACKING',
        ]);

        return response()->json([
            'message' => 'success',
        ]);
    }

    public function proceedPacking(Stock $stock)
    {
        $stock->update([
            'status' => 'packing process'
        ]);

        return response()->json([
            'message' => 'success',
        ]);
    }

    public function rollbackPackingProcess(Stock $stock)
    {
        $stock->update([
            'status' => 'stored at GUDANG PACKING'
        ]);
        return response()->json([
            'message' => 'success',
        ]);
    }

    public function processIndexPacking()
    {
        $stocks = Stock::with('stockprofile')->where('warehouse_id', 14)
        ->where('confirm_status', 'confirmed')->latest()->get();
        return StockResource::collection($stocks);
    }

    public function finishPacking(Stock $stock){

        $name = request('name').' '.'[READY]';

        $stock->update([
            'name' => $name,
            'status' => 'finished on BMI-G'
        ]);
        return response()->json([
            'message' => 'success',
        ]);
    }

    

    


    
}
