<?php

namespace App\Http\Controllers;

use App\Http\Resources\StructureCategoryResource;
use App\Models\StructureCategory;
use Illuminate\Http\Request;

class StructureCategoryController extends Controller
{
    public function index()
    {
        $str = StructureCategory::get();
        return StructureCategoryResource::collection($str);
    }

    public function addstructure()
    {

        $structure = request()->validate([
            'name' => 'required',
        ]);

        StructureCategory::create([
            'name' => strtoupper(request('name')),
            'shortname' => capslock(request('name'))
        ]);

        return response()->json([
            'message' => 'berhasil',
        ]);
    }
}
