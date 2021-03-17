<?php

namespace App\Http\Controllers;

use App\Http\Resources\MasterstockResource;
use App\Http\Resources\PermissionResource;
use App\Http\Resources\StockchartResource;
use App\Http\Resources\UserResource;
use App\Models\Stock;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Contracts\Permission;
use Spatie\Permission\Models\Permission as ModelsPermission;

class DashboardController extends Controller
{
    public function StockChart(){
        $chart = DB::table('stocks')->rightJoin('warehouses', 'stocks.warehouse_id', '=', 'warehouses.id')
        ->select(DB::raw('stocks.name as stock'), DB::raw('COUNT(*) as data'), 'warehouses.name')
        ->groupBy('stocks.name', 'warehouses.name')
        ->orderBy('warehouses.id', 'asc')->get();


        return StockchartResource::collection($chart);
        // return compact('chart');
    }

    public function index(){
        $stocks = Stock::with('stockprifle', 'warehouse', 'unit_measure', 'sawmillrun')->get();

        return MasterstockResource::collection($stocks);
    }

    public function user_index(){
        $users = User::role('admin')->get();

        return UserResource::collection($users);
    }

    public function getAdminPermission(){
        $permissions = ModelsPermission::get();

        return PermissionResource::collection($permissions);
    }
}
