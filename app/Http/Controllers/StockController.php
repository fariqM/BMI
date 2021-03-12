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
            'status' => 'processed'
        ]);

        return response()->json([
            'message' => 'success',
        ]);
    }

    public function rollbackBasahProcess(Stock $stock)
    {
        $stock->update([
            'status' => 'confirmed'
        ]);
        return response()->json([
            'message' => 'success',
        ]);
    }

    public function processIndexBasah()
    {
        $stocks = Stock::with('stockprofile')->where('warehouse_id', 2)->where('status', 'processed')->orWhere('status', 'finished')->latest()->get();
        return StockResource::collection($stocks);
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
            'status' => 'finished',
        ]);

        return response()->json([
            'message' => 'success'
        ]);
    }
}
