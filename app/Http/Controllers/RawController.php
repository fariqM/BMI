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
        $raws = Raw::with('structure_category', 'supplier', 'invoice')->latest()->get();
        return RawResource::collection($raws);
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
            'supplier_id' => 'required',
            'invoice_id' => 'required',
        ]);

        Raw::create($raw);

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
