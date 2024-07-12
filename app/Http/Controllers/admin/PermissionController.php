<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Role;
use App\Models\Route;
use App\Models\RolePermission;

class PermissionController extends Controller
{
    public function index(){
        $roles = Role::select('id','name')->get();
        $routes = Route::select('id','route_name','name')->get();
        return view('admin.permissions.permission',compact('roles','routes'));
    }


    public function store(Request $request){

        $validation = $request->validate([
            'role_id' => 'required',
            'route_name' => 'required',

        ]);

        $routes = $request->route_name;
        $roles = RolePermission::where('role_id', $request->role_id)->first();

        if ($roles) {
            $role = $roles;
        } else {
            $role = new RolePermission();
        }

        $role->route_name = $routes;
        $role->user_id = auth()->user()->id;
        $role->role_id = $request->role_id;
        $role->created_by = auth()->user()->id;
        $role->updated_by = auth()->user()->id;
        $role->status = 1;
        $role->save();
        return redirect()->back()->with('success', 'Permission up !');
    }

    public function fetchPermission(Request $request){
        $data = RolePermission::where('role_id', $request->role_id)->first();
        $routes = Route::select('id','route_name','name')->get();
        return response()->json([
            'status' => '200',
            'data' =>  $data,
            'routes' =>  $routes,

        ]);
    }

}
