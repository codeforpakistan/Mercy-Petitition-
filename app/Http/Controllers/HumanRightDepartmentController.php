<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;

use App\HomeDepartment;
use App\Petition;
use App\File;
use App\InteriorMinistry;
use App\HumanRightDepartment;
use Auth;
class HumanRightDepartmentController extends Controller
{
    function __construct()
    {
         $this->middleware('permission:HumanRightDepartment-list|HumanRightDepartment-create|HumanRightDepartment-edit|interior-delete', ['only' => ['index','store']]);
         $this->middleware('permission:HumanRightDepartment-create', ['only' => ['create','store']]);
         $this->middleware('permission:HumanRightDepartment-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:HumanRightDepartment-delete', ['only' => ['destroy']]);
    }
    public function index(){
     
     
       
     
        $HumanRightDepartments=Petition::Where('status', 'HumanRightDepartment')->Where('received_from_department', 'InteriorMinistryDepartment')->orderBy("id","desc")->get();

        return view('HumanRight.index',compact('HumanRightDepartments'));
       
    }
     public function view($id){
        $homepititions = HomeDepartment::with('homefileattachements')->where('petition_id',$id)->first();
        $interiorpititions = InteriorMinistry::with('interiorfileattachements')->where('petition_id',$id)->first();
        $pets = Petition::with('fileattachements','sectionss')->get();
      
        
        $petitions = $pets->find($id);
        $response = [
            'petitions' => $petitions,
           'homepititions' => $homepititions,
           'interiorpititions'=> $interiorpititions,
         ];
         
         return response()->json($response);

     }
    public function backpetition($id){
 
        return view('HumanRight.forward');
    }
    public function humanrightdecision(Request $request, $id){



        $interiorministry = InteriorMinistry::with('interiorfileattachements')->where('petition_id',$id)->first();
        $homepetition = HomeDepartment::with('homefileattachements')->where('petition_id',$id)->first();
        $humanrightdecision= Petition::find($id);
        
      
     //    $forwardhomedepartment->remarks = strip_tags($request->get('remarks'));
    
     $humanrightdecision->received_from_department = "HumanRightDepartment";
     $humanrightdecision->status = $request->get('status');
        $humanrightdecision->status = $request->get('status');
        $humanrightdecision->save();
        $HumanRightDepartments = new HumanRightDepartment([
         'remarks' => strip_tags($request->get('remarks')),
         'petition_id'=>$humanrightdecision->id,
         'homedepartment_id'=>$homepetition->id,
         'interiorministry_id'=>$interiorministry->id,
         "user_id"=> Auth::user()->id, 
 
        ]);
      
        $HumanRightDepartments->save();
        if ($request->file('otherdocument')) {
         $otherdocumentarry=[];
         foreach($request->file('otherdocument') as $file)
         {
         $otherdocument = time().'.'.$file->extension();
 
         $file->move(public_path('assets/image'), $otherdocument);
     $otherexplode =  explode(".",$otherdocument);
           
         $file = new File([
             'humanrightdepartment_id'=>$HumanRightDepartments->id,
             "file" =>  $otherdocument,
             "type"=> $otherexplode["1"],
 
            ]);
        
            $file->save();
 
         }
        }
       
        return redirect()->route('HumanRight.index')->with('message','Petition Forward Successfully ');
      }
}




    


