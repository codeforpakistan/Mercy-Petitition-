<?php

namespace App\Http\Controllers;

use App\File;
use App\HomeDepartment;
use App\Petition;
use App\LogPetition;
use Auth;
use Illuminate\Http\Request;

class HomeDepartmentController extends Controller
{

    public function __construct()
    {
        $this->middleware('permission:HomeDepartment-list|HomeDepartment-create|HomeDepartment-edit|HomeDepartment-delete', ['only' => ['index', 'store']]);
        $this->middleware('permission:HomeDepartment-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:HomeDepartment-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:HomeDepartment-delete', ['only' => ['destroy']]);
    }
    public function index()
    {
        $HomeDepartments = Petition::where([
            ['status', '=', 'HomeDepartment'],
            ['received_from_department', '=', 'IGP'],
        ])->orderBy("id", "desc")->get();

        return view('homedept.index', compact('HomeDepartments'));
    }

    public function homesearch(Request $request)
    {
        $search = trim($request->input('search'));

        $petitions = Petition::where('status', 'HomeDepartment')->orWhere('confined_in_jail', $search)->
            orWhere('name', 'like', "%{$search}%")->orWhere('gender', 'like', "%{$search}%")->
            orWhere('nationality', 'like', "%{$search}%")->orWhere('f_name', 'like', "%{$search}%")->
            orWhere('status', 'like', "%{$search}%")->get();

        return view('homedept.petitionsearch', compact('petitions'));
    }

    public function remarksfrominterior()
    {

        $HomeDepartments = Petition::where([
            ['status', '=', 'HomeDepartment'],
            ['received_from_department', '=', 'InteriorMinistryDepartment'],
        ])->orderBy("id", "desc")->get();

        return view('homedept.remarksfrominterior', compact('HomeDepartments'));
    }

    public function view($id)
    {
        $homepititions = HomeDepartment::with('homefileattachements')->where('petition_id', $id)->first();
        $interiorpititions = InteriorMinistry::with('interiorfileattachements')->where('petition_id', $id)->first();
        $humanrightpittions = HumanRightDepartment::with('humanrightfileattachements')->where('petition_id', $id)->first();

        $pets = Petition::with('fileattachements', 'sectionss')->get();

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

        return view('homedept.forward');
    }
    public function forwardinteriorministrydepartment(Request $request, $id)
    {

        $forwardhomedepartment = Petition::find($id);
        //    $forwardhomedepartment->remarks = strip_tags($request->get('remarks'));
        $forwardhomedepartment->received_from_department = "HomeDepartment";

        $forwardhomedepartment->status = $request->get('status');
        $forwardhomedepartment->save();
        $HomeDepartments = new HomeDepartment([
            'remarks' => strip_tags($request->get('remarks')),
            'petition_id' => $forwardhomedepartment->id,
            "user_id" => Auth::user()->id,

        ]);

        $HomeDepartments->save();
        if ($request->file('otherdocument')) {
            $otherdocumentarry = [];
            foreach ($request->file('otherdocument') as $file) {
                $otherdocument = $file->getClientOriginalName();

                $file->move(public_path('assets/image'), $otherdocument);
                $otherexplode = explode(".", $otherdocument);

                $file = new File([
                    'homedepartment_id' => $HomeDepartments->id,
                    "file" => $otherdocument,
                    "type" => $otherexplode["1"],

                ]);

                $file->save();

            }
            $logPetitions =  new LogPetition([
                "user_id" => Auth::user()->id,
                "department" => $request->get('status'),
                "petition_id" => $forwardhomedepartment->id,
            ]);
            $logPetitions->save();

        }

        return redirect()->route('homedept.index')->with('message', 'Petion Forward Successfully ');
    }

    public function homeremarksedit($id)
    {

        $homepititions = HomeDepartment::with('homefileattachements')->where('petition_id', $id)->first();
        foreach ($homepititions->homefileattachements as $post) {
            $path = [];
            $path = public_path() . "/assets/image/" . $post->file;

            if (!isset($path)) {

                unlink($path);
            }

        }
        $home = File::where('homedepartment_id', $homepititions->id)->get();
        $home->each->delete();

        return view('homedept.homeremarksedit', compact('homepititions'));
    }
    public function homeremarksupdate(Request $request, $id)
    {

        $petitionsedit = Petition::find($id);

        $petitionsedit->received_from_department = "HomeDepartment";
        $petitionsedit->status = $request->get('status');

        $petitionsedit->save();

        //homedepartment remarks

        $homeedit = HomeDepartment::with('homefileattachements')->where('petition_id', $id)->first();

        $homeedit->remarks = strip_tags($request->get('remarks'));

        $homeedit->save();

        if ($request->file('otherdocument')) {

            foreach ($request->file('otherdocument') as $file) {
                $otherdocument = $file->getClientOriginalName();

                $file->move(public_path('assets/image'), $otherdocument);
                $otherexplode = explode(".", $otherdocument);

                $file = new File([
                    'homedepartment_id' => $homeedit->id,
                    "file" => $otherdocument,
                    "type" => $otherexplode["1"],

                ]);

                $file->save();

            }
            $logPetitions =  new LogPetition([
                "user_id" => Auth::user()->id,
                "department" => $request->get('status'),
                "petition_id" => $petitionsedit->id,
            ]);
            $logPetitions->save();

        }

        return redirect()->route('remarksfrominterior')
            ->with('success', 'Petition forward successfully');
    }

}
