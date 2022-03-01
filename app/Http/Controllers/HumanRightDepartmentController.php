<?php

namespace App\Http\Controllers;

use App\File;
use App\HomeDepartment;
use App\HumanRightDepartment;
use App\InteriorMinistry;
use App\Petition;
use App\LogPetition;
use Auth;
use Illuminate\Http\Request;

class HumanRightDepartmentController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:HumanRightDepartment-list|HumanRightDepartment-create|HumanRightDepartment-edit|interior-delete', ['only' => ['index', 'store']]);
        $this->middleware('permission:HumanRightDepartment-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:HumanRightDepartment-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:HumanRightDepartment-delete', ['only' => ['destroy']]);
    }
    public function index()
    {

        $HumanRightDepartments = Petition::Where('file_in_department', 'HumanRightDepartment')->Where('received_from_department', 'InteriorMinistry')->orderBy("id", "desc")->get();

        return view('HumanRight.index', compact('HumanRightDepartments'));

    }

    public function hrsearch(Request $request)
    {
        $search = trim($request->input('search'));

        
        $hr = Petition::where('file_in_department', 'HumanRightDepartment')->where('received_from_department', 'InteriorMinistry')
       
       
->where(function($query) use ($search){
        $query->where('name', 'LIKE', '%'.$search.'%')
              ->orWhere('gender', 'LIKE', '%'.$search.'%')
              ->orWhere('confined_in_jail', 'LIKE', '%'.$search.'%')
              ->orWhere('nationality', 'LIKE', '%'.$search.'%')
              ->orWhere('f_name', 'LIKE', '%'.$search.'%')
              ->orWhere('status', 'LIKE', '%'.$search.'%')
              ->orWhere('prisonerid', 'LIKE', '%'.$search.'%');
    })->get();

        return view('HumanRight.hrsearch', compact('hr'));
    }
    public function view($id)
    {
        $homepititions = HomeDepartment::with('homefileattachements')->where('petition_id', $id)->first();
        $interiorpititions = InteriorMinistry::with('interiorfileattachements')->where('petition_id', $id)->first();
        $pets = Petition::with('fileattachements', 'sectionss','provinces','physicalstatus')->get();

        $petitions = $pets->find($id);
        $response = [
            'petitions' => $petitions,
            'homepititions' => $homepititions,
            'interiorpititions' => $interiorpititions,
        ];

        return response()->json($response);

    }
    public function backpetition($id)
    {

        return view('HumanRight.forward');
    }
    public function humanrightdecision(Request $request, $id)
    {

        $interiorministry = InteriorMinistry::with('interiorfileattachements')->where('petition_id', $id)->first();
        $homepetition = HomeDepartment::with('homefileattachements')->where('petition_id', $id)->first();
        $humanrightdecision = Petition::find($id);

        //    $forwardhomedepartment->remarks = strip_tags($request->get('remarks'));

        $humanrightdecision->received_from_department = "HumanRightDepartment";
        $humanrightdecision->file_in_department = $request->get('file_in_department');

        $humanrightdecision->save();
        $HumanRightDepartments = new HumanRightDepartment([
            'remarks' => strip_tags($request->get('remarks')),
            'petition_id' => $humanrightdecision->id,
            'homedepartment_id' => $homepetition->id,
            'interiorministry_id' => $interiorministry->id,
            "user_id" => Auth::user()->id,

        ]);

        $HumanRightDepartments->save();
        if ($request->file('otherdocument')) {
            $otherdocumentarry = [];
            foreach ($request->file('otherdocument') as $file) {
                $otherdocument = $file->getClientOriginalName();

                $file->move(public_path('assets/image'), $otherdocument);
                $otherexplode = explode(".", $otherdocument);

                $file = new File([
                    'humanrightdepartment_id' => $HumanRightDepartments->id,
                    "file" => $otherdocument,
                    "type" => $otherexplode["1"],

                ]);

                $file->save();

            }
            $logPetitions =  new LogPetition([
                "user_id" => Auth::user()->id,
                "department" => $request->get('file_in_department'),
                "petition_id" => $humanrightdecision->id,
            ]);
            $logPetitions->save();
        }

        return redirect()->route('HumanRight.index')->with('message', 'Petition Forward Successfully ');
    }
}
