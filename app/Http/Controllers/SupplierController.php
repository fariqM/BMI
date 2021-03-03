<?php

namespace App\Http\Controllers;

use App\Http\Resources\SupplierResource;
use App\Models\Supplier;
use Illuminate\Http\Request;

class SupplierController extends Controller
{
    public function index(){
        $suppliers = Supplier::get();
        return SupplierResource::collection($suppliers);
    }

    public function show(Supplier $supplier){
        return SupplierResource::make($supplier);
    }

    public function addsupplier(){

        $catch_char = array("(", ")", " ", "-");

        $supplier = request()->validate([
            'name' => 'required',
            'address' => 'required',
        ]);

        $supplier2 = [
            'name' => strtoupper(request('name')),
            'shortname' => strtoupper(singkat(request('name'))),
            'owner' => request('owner'),
            'email' => request('email'),
            'website' => request('website'),
            'phone' => str_replace($catch_char,"",request('phone')),
            'mobile' => str_replace($catch_char,"",request('mobile')),
        ];

        Supplier::create(array_merge($supplier, $supplier2));

        return response()->json([
            'message' => 'Succes',
            // 'fruit' => $fruit,
        ]);
    }

    public function update(Supplier $supplier){     

        $attr = request()->validate([
            'name' => 'required|min:3',
            'varian' => 'required',
            'latin_name' => 'required',
            'origin' => 'required',
            'year_found' => 'required',
        ]);
       
        
        $supplier->update($attr);

        return response()->json([
            'message' => 'success',
        ]);
    }
}
