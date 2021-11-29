<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\DB;

class HomeDepartmentController extends Controller
{

    function __construct()
    {
         $this->middleware('permission:HomeDepartment-list|HomeDepartment-create|HomeDepartment-edit|HomeDepartment-delete', ['only' => ['index','store']]);
         $this->middleware('permission:HomeDepartment-create', ['only' => ['create','store']]);
         $this->middleware('permission:HomeDepartment-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:HomeDepartment-delete', ['only' => ['destroy']]);
    }
    public function index(){

        return view('homedept.index');
    }
}
