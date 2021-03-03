<?php

namespace App\Http\Controllers;

use App\Http\Resources\RawResource;
use App\Http\Resources\WarehouseResource;
use App\Models\Raw;
use App\Models\Record;
use App\Models\Warehouse;
use Illuminate\Http\Request;

class RecordController extends Controller
{
    public function move(Raw $raw){

        // first set data for record attribute before it updated
        $series = $raw->series;
        $warehouse_id = $raw->warehouse_id;
        $nop = $raw->nop - request('nop');


        $attr =request()->validate([
            'nop' => 'required',
        ]);
        

        $raw->update([
            'nop' => request('nop'),
            'warehouse_id' => '1'
        ]);

        $record = Record::create([
            'series' => $series,
            'origin' => $warehouse_id,
            'destination' => 1,
            'nop' => $nop,
            'status' => 'moving',
            'confrim_status' => 'unconfirmed',
        ]);

        return response()->json([
            'message' => 'success'
        ]);
    }

    public function check(Raw $raw){

        return $raw;

    }
}
