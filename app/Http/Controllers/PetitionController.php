<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PetitionController extends Controller
{

    // function __construct()
    // {
    //      $this->middleware('permission:petition-list|petition-create|petition-edit|petition-delete', ['only' => ['index','store']]);
    //      $this->middleware('permission:petition-create', ['only' => ['create','store']]);
    //      $this->middleware('permission:petition-edit', ['only' => ['edit','update']]);
    //      $this->middleware('permission:petition-delete', ['only' => ['destroy']]);
    // }
    public function index(){

        return view('IGP.index');
    }
    public function create(){

        return view('IGP.addpetition');
    }
}
