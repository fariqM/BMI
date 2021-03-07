<?php

namespace App\Http\Controllers;

use App\Http\Resources\WarehouseResource;
use App\Models\Warehouse;
use Illuminate\Http\Request;

class WarehouseController extends Controller
{
    public function index() {
        $warehouses = Warehouse::get();
        return WarehouseResource::collection($warehouses);
    }


    public function show(Warehouse $warehouse){
        return WarehouseResource::make($warehouse);
    }

    public function addwarehouse(){

        $warehouse = request()->validate([
            'name' => 'required',
            'shortname' => 'required',
        ]);

        $warehouse2 = [
            'shortname' => strtoupper(request('shortname')),
            'address' => request('address'),
            'capacity' => request('capacity'),
        ];

        Warehouse::create(array_merge($warehouse, $warehouse2));

        return response()->json([
            'message' => 'done!'
        ]);
    }

    public function bb(){
        $costum = Warehouse::where('name', 'GUDANG P BASAH')->orWhere('name', 'GUDANG JOINT')->get();

        return WarehouseResource::collection($costum);
    }
}
