<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class InteriorMinstryController extends Controller
{

    function __construct()
    {
         $this->middleware('permission:interior-list|interior-create|interior-edit|interior-delete', ['only' => ['index','store']]);
         $this->middleware('permission:interior-create', ['only' => ['create','store']]);
         $this->middleware('permission:interior-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:interior-delete', ['only' => ['destroy']]);
    }
    public function index(){

        return view('InteriorMinstry.index');
    }
}
