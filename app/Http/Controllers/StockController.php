<?php

namespace App\Http\Controllers;

use App\Models\Stock;
use App\Models\Type;
use App\Rules\PositiveBolean;
use Illuminate\Http\Request;

class StockController extends Controller
{
    public function update(Stock $stock){
        $attr = request()->validate([
            'length' => ['required', new PositiveBolean],
            'width' => ['required', new PositiveBolean],
            'height' => ['required', new PositiveBolean],
            'type_id' => 'required',
        ]);
        
        $type = Type::find(request('type_id'));
        $name = capslock(request('structure_category')).' BB '.$type->name;
        $length = request('length');
        $width = request('width');
        $height = request('height');
        $size = $length*$width*$height;
        $float = number_format((float)$size, 3, '.','');

        $attr2 = [
            'size' => $float,
            'name' => $name,
        ];

        $stock->update(array_merge($attr, $attr2));

        return response()->json([
            'message' => 'success',
        ]);
    }

    public function addstock(){
       $stock =  request()->validate([
            'length' => ['required', new PositiveBolean],
            'width' => ['required', new PositiveBolean],
            'height' => ['required', new PositiveBolean],
            'type_id' => 'required',
            'sawmillrun_id' => 'required',
        ]);
        $type = Type::find(request('type_id'));
        $name = capslock(request('structure_category')).' BB '.$type->name;
        $length = request('length');
        $width = request('width');
        $height = request('height');
        $size = $length*$width*$height;
        $float = number_format((float)$size, 3, '.','');
        $stock2 = [
            'size' => $float,
            'name' => $name,
            'tally' => 'IR',
            'unit_measure_id' => 1,
            'origin' => 1,
            'warehouse_id' => 1,
        ];

        Stock::create(array_merge($stock, $stock2));

        $latestid = latestid('stocks');
        $tally = 'IR'.$latestid+13157;

        optional(Stock::find($latestid))->update([
            'tally' => $tally
        ]);

        return response()->json([
            'message' => 'success'
        ]);

    }
}
