<?php

namespace App\Http\Controllers;

use App\Http\Resources\TypeResource;
use App\Models\Type;
use Illuminate\Http\Request;

class TypeController extends Controller
{
    public function index(){
        $types = Type::get();
        return TypeResource::collection($types);
    }

    public function addtype(){

        $type = request()->validate([
            'name' => 'required',
        ]);

        $type2 = [
            'description' => request('description')
        ];

        Type::create(array_merge($type, $type2));

        return response()->json([
            'message' => 'success'
        ]);
    }
}
