<?php

namespace App\Http\Controllers;

use App\Http\Resources\SawmillResource;
use App\Models\Sawmillstock;
use Illuminate\Http\Request;

class SawmillstockController extends Controller
{
    public function stockindex(){
        return SawmillResource::collection(Sawmillstock::with('raw')->get());
    }
}
