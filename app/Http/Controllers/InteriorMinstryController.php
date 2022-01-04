<?php

namespace App\Http\Controllers;
use Spatie\Permission\Models\Permission;
use Illuminate\Http\Request;
use App\HomeDepartment;
use App\Petition;
use App\File;
use Auth;
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
     
     
        
        $InteriorMinistryDepartments=Petition::Where('status', 'InteriorMinistryDepartment')->orderBy("id","desc")->get();

        return view('InteriorMinstry.index',compact('InteriorMinistryDepartments'));
       
    }
    public function view($id){
        $homepititions = HomeDepartment::with('homefileattachements')->where('petition_id',$id)->first();
       
        $pets = Petition::with('fileattachements','sectionss')->get();
      
        
        $petitions = $pets->find($id);
        $response = [
            'petitions' => $petitions,
            'homepititions' => $homepititions,
        ];

        return response()->json($response);




    }
}
