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
        $fruit = request()->validate([
            'name' => 'required|min:3',
            'varian' => 'required',
            'latin_name' => 'required',
            'origin' => 'required',
            'year_found' => 'required',
        ]);
        Fruit::create($fruit);

        return response()->json([
            'message' => 'Succes',
            // 'fruit' => $fruit,
        ]);
    }

    public function update(Fruit $fruit){     

        $attr = request()->validate([
            'name' => 'required|min:3',
            'varian' => 'required',
            'latin_name' => 'required',
            'origin' => 'required',
            'year_found' => 'required',
        ]);
       
        
        $fruit->update($attr);

        return response()->json([
            'message' => 'success',
        ]);
    }

    public function destroy(Fruit $fruit){
        $fruit->delete();
        return response()->json([
            'message' => 'success',
        ],200);
    }
}
