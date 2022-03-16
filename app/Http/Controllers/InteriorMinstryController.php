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

class InteriorMinstryController extends Controller
{

    public function __construct()
    {
        $this->middleware('permission:interior-list|interior-create|interior-edit|interior-delete', ['only' => ['index', 'store']]);
        $this->middleware('permission:interior-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:interior-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:interior-delete', ['only' => ['destroy']]);
    }
    public function index()
    {

        $InteriorMinistryDepartments = Petition::Where('file_in_department', 'InteriorMinistry')->Where('received_from_department', 'HomeDepartment')->orderBy("id", "desc")->get();

        return view('InteriorMinstry.index', compact('InteriorMinistryDepartments'));

    }
    public function interiorsearch(Request $request)
    {
        $search = trim($request->input('search'));

          $InteriorMinistryDepartments = Petition::where('file_in_department', 'InteriorMinistry')->where('received_from_department', 'HomeDepartment')
       
       
        ->where(function($query) use ($search){
                $query->where('name', 'LIKE', '%'.$search.'%')
                    ->orWhere('gender', 'LIKE', '%'.$search.'%')
                    ->orWhere('confined_in_jail', 'LIKE', '%'.$search.'%')
                    ->orWhere('nationality', 'LIKE', '%'.$search.'%')
                    ->orWhere('f_name', 'LIKE', '%'.$search.'%')
                    ->orWhere('status', 'LIKE', '%'.$search.'%')
                    ->orWhere('prisonerid', 'LIKE', '%'.$search.'%');
            })->get();
   
    
    
            
   
        return view('InteriorMinstry.interiorsearch', compact('InteriorMinistryDepartments'));
    }
    public function humaninteriorsearch(Request $request)
    {
        $search = trim($request->input('search'));

          $InteriorMinistryDepartments = Petition::where('file_in_department', 'InteriorMinistry')->where('received_from_department', 'HumanRightDepartment')
       
       
        ->where(function($query) use ($search){
                $query->where('name', 'LIKE', '%'.$search.'%')
                    ->orWhere('gender', 'LIKE', '%'.$search.'%')
                    ->orWhere('confined_in_jail', 'LIKE', '%'.$search.'%')
                    ->orWhere('nationality', 'LIKE', '%'.$search.'%')
                    ->orWhere('f_name', 'LIKE', '%'.$search.'%')
                    ->orWhere('status', 'LIKE', '%'.$search.'%')
                    ->orWhere('prisonerid', 'LIKE', '%'.$search.'%');
            })->get();
   
    
    
            
   
        return view('InteriorMinstry.humaninteriorsearch', compact('InteriorMinistryDepartments'));
    }
    public function remarksfromhrd()
    {

        $InteriorMinistryDepartments = Petition::Where('file_in_department', 'InteriorMinistry')->Where('received_from_department', 'HumanRightDepartment')->orderBy("id", "desc")->get();

        return view('InteriorMinstry.remarksfromhrd', compact('InteriorMinistryDepartments'));
    }
    public function finaldecisions()
    {

        $InteriorMinistryDepartments = Petition::Where('file_in_department', 'InteriorMinistry')->Where('received_from_department', 'HumanRightDepartment')->orderBy("id", "desc")->get();

        return view('InteriorMinstry.finaldecision', compact('InteriorMinistryDepartments'));
    }
    public function view($id)
    {
        $homepititions = HomeDepartment::with('homefileattachements')->where('petition_id', $id)->first();
        $interiorpititions = InteriorMinistry::with('interiorfileattachements')->where('petition_id', $id)->first();
        $humanrightpittions = HumanRightDepartment::with('humanrightfileattachements')->where('petition_id', $id)->first();

        $pets = Petition::with('fileattachements', 'sectionss','provinces','physicalstatus')->get();

        $petitions = $pets->find($id);
        $response = [
            'petitions' => $petitions,
            'homepititions' => $homepititions,
            'interiorpititions' => $interiorpititions,
            'humanrightpittions' => $humanrightpittions,
        ];

        return response()->json($response);

    }
    public function forwardpetition($id)
    {

        return view('InteriorMinstry.forward');
    }
    public function interiordecision($id)
    {

        $interiorpititions = InteriorMinistry::with('interiorfileattachements')->where('petition_id', $id)->first();
        foreach ($interiorpititions->interiorfileattachements as $post) {
            $path = [];
            $path = public_path() . "/assets/image/" . $post->file;

            if (!isset($path)) {

                unlink($path);
            }

        }
        $interior = File::where('interiorministry_id', $interiorpititions->id)->get();
        $interior->each->delete();
        return view('InteriorMinstry.decision',compact('interiorpititions'));
    }
    public function interiorministryfinaldecisions($id)
    {

        $interiorpititions = InteriorMinistry::with('interiorfileattachements')->where('petition_id', $id)->first();
        // foreach ($interiorpititions->interiorfileattachements as $post) {
        //     $path = [];
        //     $path = public_path() . "/assets/image/" . $post->file;

        //     if (!isset($path)) {

        //         unlink($path);
        //     }

        // }
        // $interior = File::where('interiorministry_id', $interiorpititions->id)->get();
        // $interior->each->delete();
        return view('InteriorMinstry.interiorministryfinaldecisions',compact('interiorpititions'));
    }
    
    public function finalapprovedecision(Request $request, $id)
    {

        $finalinteriorministrydecision = Petition::find($id);
        $finalinteriorministrydecision->received_from_department = "HumanRightDeparment";
        //    $forwardhomedepartment->remarks = strip_tags($request->get('remarks'));
        // if($request->get('file_in_department')=="Accepted"){
        //     $finalinteriorministrydecision->status = $request->get('file_in_department');
        // }else if($request->get('file_in_department')=="Rejected"){
        //     $finalinteriorministrydecision->status = $request->get('file_in_department');
        // }else{
        //     $finalinteriorministrydecision->file_in_department = $request->get('file_in_department');
        // }
        $finalinteriorministrydecision->status = $request->get('file_in_department');

        $finalinteriorministrydecision->save();

        //homedepartment remarks

        $interiorpititions = InteriorMinistry::with('interiorfileattachements')->where('petition_id', $id)->first();

        $interiorpititions->remarks = html_entity_decode(strip_tags($request->get('remarks')));

        $interiorpititions->save();

        if ($request->file('otherdocument')) {

            foreach ($request->file('otherdocument') as $file) {
                $otherdocument = $file->getClientOriginalName();

                $file->move(public_path('assets/image'), $otherdocument);
                $otherexplode = explode(".", $otherdocument);

                $file = new File([
                    'interiorministry_id' => $interiorpititions->id,
                    "file" => $otherdocument,
                    "type" => $otherexplode["1"],

                ]);

                $file->save();

            }
            $logPetitions =  new LogPetition([
                "user_id" => Auth::user()->id,
                "department" => $request->get('file_in_department'),
                "petition_id" => $finalinteriorministrydecision->id,
            ]);
            $logPetitions->save();

        }

        return redirect()->route('finaldecisions')
            ->with('success', 'Petition forward successfully');
    }
    public function finaldecision(Request $request, $id)
    {

        $finalinteriorministrydecision = Petition::find($id);
        $finalinteriorministrydecision->received_from_department = "HumanRightDeparment";
        //    $forwardhomedepartment->remarks = strip_tags($request->get('remarks'));
        if($request->get('file_in_department')=="Accepted"){
            $finalinteriorministrydecision->status = $request->get('file_in_department');
        }else if($request->get('file_in_department')=="Rejected"){
            $finalinteriorministrydecision->status = $request->get('file_in_department');
        }else{
            $finalinteriorministrydecision->file_in_department = $request->get('file_in_department');
        }

        $finalinteriorministrydecision->save();

        //homedepartment remarks

        $interiorpititions = InteriorMinistry::with('interiorfileattachements')->where('petition_id', $id)->first();

        $interiorpititions->remarks = html_entity_decode(strip_tags($request->get('remarks')));

        $interiorpititions->save();

        if ($request->file('otherdocument')) {

            foreach ($request->file('otherdocument') as $file) {
                $otherdocument = $file->getClientOriginalName();

                $file->move(public_path('assets/image'), $otherdocument);
                $otherexplode = explode(".", $otherdocument);

                $file = new File([
                    'interiorministry_id' => $interiorpititions->id,
                    "file" => $otherdocument,
                    "type" => $otherexplode["1"],

                ]);

                $file->save();

            }
            $logPetitions =  new LogPetition([
                "user_id" => Auth::user()->id,
                "department" => $request->get('file_in_department'),
                "petition_id" => $finalinteriorministrydecision->id,
            ]);
            $logPetitions->save();

        }

        return redirect()->route('InteriorMinstry.hrd')
            ->with('success', 'Petition forward successfully');
    }
    public function decision(Request $request, $id)
    {

        $homepetition = HomeDepartment::with('homefileattachements')->where('petition_id', $id)->first();

        $interiorministrydecision = Petition::find($id);
        $interiorministrydecision->received_from_department = "InteriorMinistry";
        //    $forwardhomedepartment->remarks = strip_tags($request->get('remarks'));
        if($request->get('file_in_department')=="Accepted"){
            $interiorministrydecision->status = $request->get('file_in_department');
        }else if($request->get('file_in_department')=="Rejected"){
            $interiorministrydecision->status = $request->get('file_in_department');
        }else{
            $interiorministrydecision->file_in_department = $request->get('file_in_department');
        }

        $interiorministrydecision->save();
        $Interiorministries = new InteriorMinistry([
            'remarks' => html_entity_decode(strip_tags($request->get('remarks'))),
            'petition_id' => $interiorministrydecision->id,
            'homedepartment_id' => $homepetition->id,
            "user_id" => Auth::user()->id,

        ]);

        $Interiorministries->save();
        if ($request->file('otherdocument')) {
            $otherdocumentarry = [];
            foreach ($request->file('otherdocument') as $file) {
                $otherdocument = $file->getClientOriginalName();;

                $file->move(public_path('assets/image'), $otherdocument);
                $otherexplode = explode(".", $otherdocument);

                $file = new File([
                    'interiorministry_id' => $Interiorministries->id,
                    "file" => $otherdocument,
                    "type" => $otherexplode["1"],

                ]);

                $file->save();

            }
            $logPetitions =  new LogPetition([
                "user_id" => Auth::user()->id,
                "department" => $request->get('file_in_department'),
                "petition_id" => $interiorministrydecision->id,
            ]);
            $logPetitions->save();
        }

        return redirect()->route('InteriorMinstry.index')->with('message', 'Petion Forward Successfully ');
    }
}
