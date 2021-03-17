<?php

namespace App\Http\Controllers;

use App\Http\Resources\RawResource;
use App\Http\Resources\TesResource;
use App\Models\Raw;
use App\Rules\PositiveBolean;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RawController extends Controller
{
    public function index()
    {
        $raws = Raw::with('structure_category', 'invoice')->latest()->get();
        return RawResource::collection($raws);
    }

    public function update(Raw $raw){
        $attr2 = request()->validate([
            'structure_category_id' => 'required',
            'length' => ['required', new PositiveBolean],
            'width' => ['required', new PositiveBolean],
            'height' => ['required', new PositiveBolean],
            'invoice_id' => 'required',
        ]);

        $length = request('length');
        $width = request('width');
        $height = request('height');
        $size = $length * $width * $height;
        $float = number_format((float)$size, 3, '.', '');

        $attr = [
            'size' => $float,
        ];

        $raw->update(array_merge($attr, $attr2));

        return response()->json([
            'message' => 'success'
        ]);
    }

    public function show(Raw $raw)
    {
        return RawResource::make($raw);
    }

    public function addraw()
    {

        $raw = request()->validate([
            'structure_category_id' => 'required',
            'length' => ['required', new PositiveBolean],
            'width' => ['required', new PositiveBolean],
            'height' => ['required', new PositiveBolean],
            'uom' => 'required',
            'nop' => 'required',
            'invoice_id' => 'required',
        ]);

        $length = request('length');
        $width = request('width');
        $height = request('height');
        $size = $length * $width * $height;
        $float = number_format((float)$size, 3, '.', '');

        $raw2 = [
            'size' => $float,
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
