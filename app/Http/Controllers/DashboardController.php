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
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Spatie\Permission\Contracts\Permission;
use Spatie\Permission\Models\Permission as ModelsPermission;

class DashboardController extends Controller
{
    public function StockChart()
    {
        $chart = DB::table('stocks')->rightJoin('warehouses', 'stocks.warehouse_id', '=', 'warehouses.id')
            ->select(DB::raw('stocks.name as stock'), DB::raw('COUNT(*) as data'), 'warehouses.name')
            ->groupBy('stocks.name', 'warehouses.name')
            ->orderBy('warehouses.id', 'asc')->get();


        return StockchartResource::collection($chart);
        // return compact('chart');
    }

    public function index()
    {
        $stocks = Stock::with('stockprofile', 'warehouse', 'unit_measure', 'sawmillrun', 'type')->get();

        return MasterstockResource::collection($stocks);
    }

    public function user_index()
    {
        $users = User::role('admin')->get();

        return UserResource::collection($users);
    }

    public function getAdminPermission()
    {
        $permissions = ModelsPermission::get();

        return PermissionResource::collection($permissions);
    }

    public function add_user()
    {

        $catch_char = array("(", ")", " ", "-");


        $attr = request()->validate([
            'name' => ['required', 'min:5', 'max:250', 'string'],
            'email' => ['required', 'email', 'max:100', 'unique:users,email', 'string'],
            'password' => ['required', 'string', 'min:8'],
            'permission' => ['required'],
            'mobile' => ['required'],
        ]);

        $attr2 = [
            'mobile' => str_replace($catch_char, "", request('mobile')),
            'password' => Hash::make(request('password')),
            'address' => request('address'),
        ];

        $user = User::create(array_merge($attr, $attr2));

        $user->givePermissionTo(request('permission'));
        $user->assignRole('admin');

        return response()->json([
            'message' => 'success',
        ]);
    }


    public function update_user(User $user)
    {
        $attr = request()->validate([
            'password' => ['required', 'string', 'min:8'],

        ]);
        $attr2 = [
            'password' => Hash::make(request('password')),
        ];
        $user->update(array_merge($attr, $attr2));
        return response()->json([
            'message' => 'success',
        ]);
    }



    public function DeleteUser(User $user)
    {

        $user->removeRole('admin');
        $user->revokePermissionTo(request('permission'));

        $user->delete();


        return response()->json([
            'message' => 'success',
        ]);
    }
}
