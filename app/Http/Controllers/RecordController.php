<?php

namespace App\Http\Controllers;

use App\Http\Resources\RecordResource;
use App\Models\Raw;
use App\Models\Record;
use App\Models\Sawmillstock;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;

class RecordController extends Controller
{

    public function index()
    {
        $records = Record::with('warehouse', 'raw')->latest()->get();
        return RecordResource::collection($records);
    }

    public function move(Raw $raw)
    {

        // first set data for record attribute before it updated
        $series = $raw->series;
        $nop = $raw->nop - request('nop');


        $attr = request()->validate([
            'nop' => 'required',
        ]);


        $raw->update([
            'nop' => request('nop'),
            'status' => 'processed'
        ]);

        $record = Record::create([
            'series' => $series,
            'origin' => 5,
            'warehouse_id' => 1,
            'nop' => $nop,
            'status' => 'moving',
            'confirm_status' => 'unconfirmed',
        ]);

        return response()->json([
            'message' => 'success'
        ]);
    }

    public function recordBB()
    {
        $records = Record::where('origin', '5')->orWhere('warehouse_id', '5')->with('warehouse', 'sawmillstocks')->latest()->get();
        return RecordResource::collection($records);
    }

    public function inputrecordsawmill()
    {
        $records = Record::where('origin', '1')->orWhere('warehouse_id', '1')->with('warehouse', 'sawmillstocks')->latest()->get();
        return RecordResource::collection($records);
    }

    public function rollbackBB(Record $record)
    {
        Raw::where('series', $record->series)->increment('nop', $record->nop);
        $record->delete();

        return response()->json([
            'message' => 'success',
            'response' => 200,
            'id' => $record->id,
        ]);
    }

    public function check(Raw $raw)
    {

        return $raw;
    }

    public function checkconfrim(Record $record)
    {

        return RecordResource::make($record);
    }

    public function editOnHand(Record $record)
    {

        $record->update([
            'unit' => request('nop'),
            'confirm_status' => 'revision'
        ]);

        return response()->json([
            'message' => 'success'
        ]);
    }

    public function confirmMismatch(Record $record)
    {
        $unit = request('unit');
        $series = request('series');
        $nop = request('nop');

        $dev = $nop - $unit;

        $record->update([
            'confirm_status' => 'revision confirmed',
            'status' => 'on queue',
            'nop' =>  $unit,
        ]);

        Raw::where('series', '=', $series)->increment('nop', $dev);

        $stock = Sawmillstock::where('series', $series)->first();
        $stock->update([
            'nop' =>  $unit,
            'nop_virtual' => 0,
        ]);

        return response()->json([
            'message' => 'success'
        ]);
    }

    public function confirmraw(Record $record)
    {
        $series = request('series');
        $nop = request('nop');

        $record->update([
            'confirm_status' => 'confirmed',
            'status' => 'on queue',
            'confirm_at' => date("Y-m-d H:i:s"),
        ]);

        $sawmillstock =  Sawmillstock::where('series', '=', $series)->get();
        if (count($sawmillstock) == 0) {
            Sawmillstock::create([
                'series' => $series,
                'nop' => $nop,
                'nop_virtual' => 0,
                'processed' => 0,
            ]);
        } else {
            DB::table('sawmillstocks')->where('series', '=', $series)->increment('nop', $nop);
        }

        return response()->json([
            'message' => 'success'
        ]);
    }

    public function stored(Record $record)
    {

        $series = request('series');
        $nop = request('nop');

        $record->update([
            'confirm_status' => 'mismatch',
            'status' => 'stored',
            'confirm_at' => date("Y-m-d H:i:s"),
        ]);

        $sawmillstock =  Sawmillstock::where('series', '=', $series)->get();
        if (count($sawmillstock) == 0) {
            Sawmillstock::create([
                'series' => $series,
                'nop_virtual' => $nop,
                'processed' => 0,
                'nop' => 0,
            ]);
        } else {
            DB::table('sawmillstocks')->where('series', '=', $series)->increment('nop_virtual', $nop);
        }
        return response()->json([
            'message' => 'success',
        ]);
    }

    public function returned(Record $record)
    {
        $series = request('series');
        $nop = request('nop');
        $record->update([
            'confirm_status' => 'mismatch',
            'status' => 'returned',
            'confirm_at' => date("Y-m-d H:i:s"),
            'origin' => 1,
            'warehouse_id' => 5,
        ]);

        Raw::where('series', '=', $series)->increment('nop', $nop);

        return response()->json([
            'message' => 'success',
        ]);
    }
}
