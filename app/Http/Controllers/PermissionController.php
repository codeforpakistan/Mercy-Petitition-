<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\DB;

class PermissionController extends Controller
{
    function __construct()
    {
         $this->middleware('permission:permission-list|permission-create|permission-edit|permission-delete', ['only' => ['index','store']]);
         $this->middleware('permission:permission-create', ['only' => ['create','store']]);
         $this->middleware('permission:permission-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:permission-delete', ['only' => ['destroy']]);
    }

    public function index(){
        $permissions=DB::table('permissions')->get();
        return view('portal.permissions.index',['permissions'=>$permissions]);
    }
    public function create(){
        return view('portal.permissions.create');
    }

    public function edit($id){
        $permission=Permission::findById($id);
        return view('portal.permissions.edit',['permission'=>$permission]);
    }

    public function store(Request $request)
    {
        //dd($request);
        $this->validate($request, [
            'name' => 'required|unique:permissions,name',
            'frindly_title' => 'required',
        ]);
        
        Permission::create(['name' => $request->input('name'),
                            'friendly_title' => $request->input('frindly_title')]);
        
        $permissions =Permission::all();
        return view('portal.permissions.index',['permissions '=>$permissions])->with('success','Permission created successfully');
    }
}
