<?php

namespace App\Http\Controllers;

use App\Http\Resources\RawResource;
use App\Http\Resources\TesResource;
use App\Models\Raw;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RawController extends Controller
{
    public function index()
    {
        $raws = Raw::with('structure_category', 'invoice')->latest()->get();
        return RawResource::collection($raws);
    }

    public function update(){
        
    }

    public function show(Raw $raw)
    {
        return RawResource::make($raw);
    }

    public function addraw()
    {

        $raw = request()->validate([
            'structure_category_id' => 'required',
            'size' => 'required',
            'uom' => 'required',
            'nop' => 'required',
            'invoice_id' => 'required',
        ]);

        $raw2 = [
            'amount' => request('nop'),
            'status' => 'unprocessed'
        ];

        Raw::create(array_merge($raw, $raw2));

        // Series Logics
        $lastid = latestid('raws');
        $series = $lastid+8472;
        $obj = Raw::find($lastid);
        $obj->update([
            'series' => request('series')."-".$series
        ]);

        return response("success");

    }

    public function move(Raw $raw){
        $attr = request()->validate([
            
        ]);
    }
}
