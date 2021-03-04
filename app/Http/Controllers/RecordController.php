<?php

namespace App\Http\Controllers;

use App\Http\Resources\RecordResource;
use App\Models\Raw;
use App\Models\Record;

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
        $records = Record::where('origin','1')->with('warehouse')->latest()->get();
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
            'confirm_at' => date("Y-m-d H:i:s"),
        ]);

        return response()->json([
            'message' => 'success'
        ]);

    }

    public function stored(Record $record){

    }

    public function returned(Record $record){
        $record->update([
            'confirm_status' => 'mismatch',
            'status' => 'on queue',
            'confirm_at' => date("Y-m-d H:i:s"),
        ]);

        // $raw = Raw::where('series', request('series'))->firstOrFail();
        // $raw->update([

        // ]);

        return response()->json([
            'message' => 'success',
        ]);
    }
}
