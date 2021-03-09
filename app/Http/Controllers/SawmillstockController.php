<?php

namespace App\Http\Controllers;

use App\Http\Resources\SawmillResource;
use App\Http\Resources\SawmillrunResource;
use App\Http\Resources\StockResource;
use App\Models\Record;
use App\Models\Sawmillrun;
use App\Models\Sawmillstock;
use App\Models\Stock;
use Illuminate\Http\Request;
use Illuminate\Support\Optional;

class SawmillstockController extends Controller
{
    public function stockindex(){
        $sawmillstocks = Sawmillstock::with('raw')->get();
        return SawmillResource::collection($sawmillstocks);
    }

    public function processindex(){
        $sawmillruns = Sawmillrun::with('sawmillstock')->get();
        return SawmillrunResource::collection($sawmillruns);
    }

    public function bbindex(){
        $stocks = Stock::where('origin', '1')->with('sawmillrun', 'type', 'warehouse', 'unit_measure')->get();
        return  StockResource::collection($stocks);
    }

    public function rollbackprocess(Sawmillrun $sawmillrun){
        $nop = request('nop');
        $series = request('series');
        $sawmillstock_id = request('sawmillstock_id');
        $message = "";

        $sawmillstock = Sawmillstock::find($sawmillstock_id);
        if($sawmillstock_id){
            $sawmillrun->delete();
            $sawmillstock->decrement('processed', $nop);
            $sawmillstock->increment('nop', $nop);
            optional(Record::where('series', $series)->where('nop', $nop))->update([
                'status' => 'on queue'
            ]);
            $message = "Success";
        } else {
            $message = "Sawmillstock not found";
        }
        
        return response()->json([
            'message' => $message
        ]);

    }

    public function addprocess(Record $record){

        $message = "";
        $sawmillstocks_id = request('sawmillstock_id');
        $nop = request('nop');
        
        // optional(Sawmillstock::find($sawmillstocks_id)->update([
        //     'processed' => $nop,
        // ]));

        $sawmillstock =  Sawmillstock::find($sawmillstocks_id);
        
        if($sawmillstock){
            Sawmillrun::create([
                'sawmillstock_id' => $sawmillstocks_id,
                'nop' => $nop,
                'status' => request('status'),
            ]);
            
            $sawmillstock->increment('processed', $nop);
            $sawmillstock->decrement('nop', $nop);
            $record->update([
                'status' => 'processing all'
            ]);
            $message = "Success";
            
        } else{
            $message = "SawmillStock Doesnt Exist";

        }
        return response()->json([
            'messsage' => $message
        ]);
    }
}
