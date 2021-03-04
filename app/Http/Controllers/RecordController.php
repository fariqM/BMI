<?php

namespace App\Http\Controllers;

use App\Http\Resources\RawResource;
use App\Http\Resources\RecordResource;
use App\Http\Resources\WarehouseResource;
use App\Models\Raw;
use App\Models\Record;
use App\Models\Warehouse;
use Illuminate\Http\Request;

class RecordController extends Controller
{

    public function index(){
        $records = Record::get();
        return RecordResource::collection($records);
    }

    public function move(Raw $raw){

        // first set data for record attribute before it updated
        $series = $raw->series;
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
            'origin' => 1,
            'warehouse_id' => 1,
            'nop' => $nop,
            'status' => 'moving',
            'confirm_status' => 'unconfirmed',
        ]);

        return response()->json([
            'message' => 'success'
        ]);
    }

    public function recordBB(){
        $records = Record::where('origin','1')->with('warehouse')->get();
        return RecordResource::collection($records);
    }

    public function check(Raw $raw){

        return $raw;

    }

    public function checkconfrim(Record $record){

        return RecordResource::make($record);
    }

    public function confirmraw(Record $record){

        $record->update([
            'confirm_status' => 'confirmed',
            'status' => 'on queue',
        ]);

        return response()->json([
            'message' => 'success'
        ]);

    }
}
