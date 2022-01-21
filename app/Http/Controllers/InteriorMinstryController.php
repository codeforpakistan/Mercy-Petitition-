<?php

namespace App\Http\Controllers;

use App\File;
use App\HomeDepartment;
use App\HumanRightDepartment;
use App\InteriorMinistry;
use App\Petition;
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

        $InteriorMinistryDepartments = Petition::Where('status', 'InteriorMinistryDepartment')->Where('received_from_department', 'HomeDepartment')->orderBy("id", "desc")->get();

        return view('InteriorMinstry.index', compact('InteriorMinistryDepartments'));

    }
    public function remarksfromhrd()
    {

        $InteriorMinistryDepartments = Petition::Where('status', 'InteriorMinistryDepartment')->Where('received_from_department', 'HumanRightDepartment')->orderBy("id", "desc")->get();

        return view('InteriorMinstry.remarksfromhrd', compact('InteriorMinistryDepartments'));
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

        return view('InteriorMinstry.forward');
    }
    public function decision(Request $request, $id)
    {

        $homepetition = HomeDepartment::with('homefileattachements')->where('petition_id', $id)->first();

        $interiorministrydecision = Petition::find($id);
        $interiorministrydecision->received_from_department = "InteriorMinistryDepartment";
        //    $forwardhomedepartment->remarks = strip_tags($request->get('remarks'));
        $interiorministrydecision->status = $request->get('status');
        $interiorministrydecision->save();
        $Interiorministries = new InteriorMinistry([
            'remarks' => strip_tags($request->get('remarks')),
            'petition_id' => $interiorministrydecision->id,
            'homedepartment_id' => $homepetition->id,
            "user_id" => Auth::user()->id,

        ]);

        $Interiorministries->save();
        if ($request->file('otherdocument')) {
            $otherdocumentarry = [];
            foreach ($request->file('otherdocument') as $file) {
                $otherdocument = time() . rand(10, 100) . '.' . $file->extension();

                $file->move(public_path('assets/image'), $otherdocument);
                $otherexplode = explode(".", $otherdocument);

                $file = new File([
                    'interiorministry_id' => $Interiorministries->id,
                    "file" => $otherdocument,
                    "type" => $otherexplode["1"],

                ]);

                $file->save();

            }
        }

        return redirect()->route('InteriorMinstry.index')->with('message', 'Petion Forward Successfully ');
    }
}
