<?php

namespace App\Http\Controllers;

use App\Http\Resources\MasterstockResource;
use App\Http\Resources\StockchartResource;
use App\Models\Stock;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
}
