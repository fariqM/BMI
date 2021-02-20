<?php

namespace App\Http\Controllers;

use App\Http\Resources\FruitResource;
use App\Models\Fruit;
use Illuminate\Http\Request;

class FruitController extends Controller
{
    public function index(){

        $fruits = Fruit::get();
        return FruitResource::collection($fruits);
    }

    public function show(Fruit $fruit){
        return FruitResource::make($fruit);
    }

    public function addfruit(){
        request()->validate([
            'name' => 'required|min:3',
            'varian' => 'required',
            'latin_name' => 'required',
            'origin' => 'required',
            'year_found' => 'required',
        ]);

        $fruit =Fruit::create([
            'name' => request('name'),
            'varian' => request('varian'),
            'latin_name' => request('latin_name'),
            'origin' => request('origin'),
            'year_found' => request('year_found'),
        ]);

        return response()->json([
            'message' => 'Succes',
            // 'fruit' => $fruit,
        ]);
    }
}
