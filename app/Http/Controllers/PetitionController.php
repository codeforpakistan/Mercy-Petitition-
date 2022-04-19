<?php

namespace App\Http\Controllers;

use App\File;
use App\Petition;
use App\Section;
use App\LogPetition;
use App\PhysicalStatus;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class PetitionController extends Controller
{

    public function __construct()
    {
        $this->middleware('permission:jail-supt-list|jail-supt-create|jail-supt-edit|jail-supt-delete', ['only' => ['index', 'store']]);
        $this->middleware('permission:jail-supt-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:jail-supt-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:jail-supt-delete', ['only' => ['destroy']]);
    }
    public function index()
    {
       
       
        $pets = Petition::with('fileattachements', 'sectionss','provinces','physicalstatus')->get();

        if (Auth::user()->confined_in_jail == "") {
            $petitions = Petition::Where('province_id', Auth::user()->province_id)->orderBy("id", "desc")->paginate(5);
        } else {
            $petitions = Petition::Where('confined_in_jail', Auth::user()->confined_in_jail)->Where('province_id', Auth::user()->province_id)->Where('file_in_department', 'Jail-Supt')->Where('received_from_department',null)->orderBy("id", "desc")->paginate(5);

        }

        return view('IGP.index', compact('petitions'));
    }
    public function search(Request $request)
    {
        $search = trim($request->input('search'));

        if (Auth::user()->confined_in_jail == "") {

            $petitions =   Petition::Where('province_id', Auth::user()->province_id)


            ->where(function($query) use ($search){
                    $query->where('name', 'LIKE', '%'.$search.'%')
                          ->orWhere('gender', 'LIKE', '%'.$search.'%')
                          ->orWhere('cnic', 'LIKE', '%'.$search.'%')
                          ->orWhere('name_of_policestation', 'LIKE', '%'.$search.'%')
                          ->orWhere('case_fir_no', 'LIKE', '%'.$search.'%')
                          ->orWhere('file_in_department', 'LIKE', '%'.$search.'%')
                          ->orWhere('confined_in_jail', 'LIKE', '%'.$search.'%')
                          ->orWhere('nationality', 'LIKE', '%'.$search.'%')
                          ->orWhere('f_name', 'LIKE', '%'.$search.'%')
                          ->orWhere('status', 'LIKE', '%'.$search.'%')
                          ->orWhere('prisonerid', 'LIKE', '%'.$search.'%');
                })->paginate(6);
        } else {
            //   $pet=Petition::where('status','IGP')->where('confined_in_jail', Auth::user()->confined_in_jail)->get();


            $petitions =   Petition::where('file_in_department', 'Jail-Supt')->where('confined_in_jail', Auth::user()->confined_in_jail)->Where('province_id', Auth::user()->province_id)


            ->where(function($query) use ($search){
                    $query->where('name', 'LIKE', '%'.$search.'%')
                          ->orWhere('gender', 'LIKE', '%'.$search.'%')
                          ->orWhere('cnic', 'LIKE', '%'.$search.'%')
                          ->orWhere('name_of_policestation', 'LIKE', '%'.$search.'%')
                          ->orWhere('case_fir_no', 'LIKE', '%'.$search.'%')
                          ->orWhere('nationality', 'LIKE', '%'.$search.'%')
                          ->orWhere('f_name', 'LIKE', '%'.$search.'%')
                          ->orWhere('status', 'LIKE', '%'.$search.'%')
                          ->orWhere('prisonerid', 'LIKE', '%'.$search.'%');
                })->paginate(6);



        }

        return view('IGP.petitionsearch', compact('petitions'));
    }

    public function homepetitionsearch(Request $request)
    {
        $search = trim($request->input('search'));

        if (Auth::user()->confined_in_jail == "") {

            $petitions =   Petition::Where('province_id', Auth::user()->province_id)


            ->where(function($query) use ($search){
                    $query->where('name', 'LIKE', '%'.$search.'%')
                          ->orWhere('gender', 'LIKE', '%'.$search.'%')
                          ->orWhere('file_in_department', 'LIKE', '%'.$search.'%')
                          ->orWhere('cnic', 'LIKE', '%'.$search.'%')
                          ->orWhere('name_of_policestation', 'LIKE', '%'.$search.'%')
                          ->orWhere('case_fir_no', 'LIKE', '%'.$search.'%')
                          ->orWhere('confined_in_jail', 'LIKE', '%'.$search.'%')
                          ->orWhere('nationality', 'LIKE', '%'.$search.'%')
                          ->orWhere('f_name', 'LIKE', '%'.$search.'%')
                          ->orWhere('status', 'LIKE', '%'.$search.'%')
                          ->orWhere('prisonerid', 'LIKE', '%'.$search.'%');
                })->paginate(6);
        } else {

            $petitions =   Petition::where('file_in_department', 'Jail-Supt')->where('received_from_department', 'HomeDepartment')->where('confined_in_jail', Auth::user()->confined_in_jail)->Where('province_id', Auth::user()->province_id)


            ->where(function($query) use ($search){
                    $query->where('name', 'LIKE', '%'.$search.'%')
                          ->orWhere('gender', 'LIKE', '%'.$search.'%')
                          ->orWhere('cnic', 'LIKE', '%'.$search.'%')
                          ->orWhere('name_of_policestation', 'LIKE', '%'.$search.'%')
                          ->orWhere('case_fir_no', 'LIKE', '%'.$search.'%')
                          ->orWhere('nationality', 'LIKE', '%'.$search.'%')
                          ->orWhere('f_name', 'LIKE', '%'.$search.'%')
                          ->orWhere('status', 'LIKE', '%'.$search.'%')
                          ->orWhere('prisonerid', 'LIKE', '%'.$search.'%');
                })->paginate(6);


            }


        return view('IGP.homepetitionsearch', compact('petitions'));
    }
    public function view($id)
    {

        $pets = Petition::with('fileattachements', 'sectionss','provinces','physicalstatus')->get();

        $petitions = $pets->find($id);

        return response()->json($petitions);

    }
    public function logpetition()
    {

        $logpetitions = LogPetition::with('petitions', 'users')->get();
        return view('IGP.logpetition', compact('logpetitions'));


    }
    public function remarksfromhome()
    {
        if (Auth::user()->confined_in_jail == "") {
            $petitions = Petition::Where('province_id', Auth::user()->province_id)->Where('file_in_department', 'Jail-Supt')->Where('received_from_department', 'HomeDepartment')->orderBy("id", "desc")->paginate(5);
        } else {
            $petitions = Petition::Where('confined_in_jail', Auth::user()->confined_in_jail)->Where('province_id', Auth::user()->province_id)->Where('file_in_department', 'Jail-Supt')->Where('received_from_department', 'HomeDepartment')->orderBy("id", "desc")->paginate(5);

        }

        return view('IGP.remarksfromhome', compact('petitions'));
    }
    public function searchform()
    {
        return view('IGP.searchform');
    }
    public function create()
    {
        $sections = Section::all();
        $physicalstatus = PhysicalStatus::all();

        return view('IGP.addpetition', compact('sections','physicalstatus'));
    }
    public function edit($id)
    {

        $sections = Section::get();
   

        $physicalstatus = PhysicalStatus::all();
        $petitionsedit = Petition::find($id);
        $filepetition = File::where('petition_id', $id)->first();

        return view('IGP.petitionsedit', compact('petitionsedit', 'sections','physicalstatus', 'filepetition'));
    }
    public function petitionremarksedit($id)
    {

        $petitionsedit = Petition::find($id);

        $pets = Petition::with('fileattachements')->get();

        $petitions = $pets->find($id);

        foreach ($petitions->fileattachements as $post) {
            $path = [];
            $path = public_path() . "/assets/image/" . $post->file;

            if (!isset($path)) {

                unlink($path);
            }

        }
        $home = File::where('petition_id', $petitions->id)->get();
        $home->each->delete();

        return view('IGP.petitionremarksedit', compact('petitionsedit', 'petitions'));
    }

    public function storepetition(Request $request)
    {
        // Validate the inputs

        // file validation

     

        $this->validate($request, [
            'prisoner_image' => 'required|mimes:jpeg,png,jpg,gif,svg',
            'application_image' => 'required|mimes:jpeg,png,jpg,gif,svg,pdf',
            'health_paper' => 'required|mimes:jpeg,png,jpg,gif,svg,pdf',
            'warrent_file' => 'required|mimes:jpeg,png,jpg,gif,svg,pdf',

            'application_in_urdu_file' => 'required|mimes:jpeg,png,jpg,gif,svg,pdf',
            'judgments_file' => 'required|mimes:jpeg,png,jpg,gif,svg,pdf',
            'petition_certificate' => 'required|mimes:jpeg,png,jpg,gif,svg,pdf',
            'petition_roll_file' => 'required|mimes:jpeg,png,jpg,gif,svg,pdf',
            'check_list_file' => 'required|mimes:jpeg,png,jpg,gif,svg,pdf',
            'convection_summary' => 'required|mimes:jpeg,png,jpg,gif,svg,pdf',

            'name' => 'required|regex:/^[a-zA-Z0-9 ]+$/|max:20',

            'f_name' => 'required|regex:/^[a-zA-Z0-9 ]+$/|max:20',
            'nationality' => 'required|regex:/^[a-zA-Z0-9 ]+$/|max:20',
            'physicalstatus_id' => 'required',

            'gender' => 'required|regex:/^[a-zA-Z0-9 ]+$/|max:20',
            'dob' => 'required',

            'case_fir_no'=> 'required',
            'fir_date'=> 'required',
            'name_of_policestation' => 'required',
            'case_title'=> 'required',
            'cnic'=> 'required',
            'martial_status'=> 'required',
            'caste' => 'required',
            'religion' => 'required',
            'education' => 'required',
         'mental_health' => 'required',
         'physical_health'=> 'required',
         'prisoner_conduct'=> 'required',
         'compoundable_offence'=> 'required',
         'non_compoundable_offence'=> 'required',
         'Occupation'=> 'required',
         'nature_of_crime'=> 'required',
         'mitigating_circumstances'=> 'required',
         
         'age_of_petitioner'=> 'required',
            'mercypetitiondate' => 'required',
            'section_id' => 'required',
            
            'date_of_sentence' => 'required',
            'sentence_in_court' => 'required|regex:/^[a-zA-Z0-9 ]+$/|max:100',
            'petition_history' => 'required|regex:/[a-zA-Z0-9\s]+/|max:255',

        ]);

        if ($request->hasFile('application_image') && $request->hasFile('prisoner_image') && $request->hasFile('warrent_file')) {


          $application_image = $request->file('application_image')->getClientOriginalName();
        //   dd($application_image);

            $request->application_image->move(public_path('assets/image'), $application_image);

            $prisoner_image = $request->file('prisoner_image')->getClientOriginalName();

            $request->prisoner_image->move(public_path('assets/image'), $prisoner_image);

            $warrent_file = $request->file('warrent_file')->getClientOriginalName();

            $request->warrent_file->move(public_path('assets/image'), $warrent_file);

        }
        if ($request->hasFile('application_in_urdu_file') && $request->hasFile('judgments_file') && $request->hasFile('petition_certificate')) {


            $application_in_urdu_file = $request->file('application_in_urdu_file')->getClientOriginalName();
          //   dd($application_image);

              $request->application_in_urdu_file->move(public_path('assets/image'), $application_in_urdu_file);

              $judgments_file = $request->file('judgments_file')->getClientOriginalName();

              $request->judgments_file->move(public_path('assets/image'), $judgments_file);

              $petition_certificate = $request->file('petition_certificate')->getClientOriginalName();

              $request->petition_certificate->move(public_path('assets/image'), $petition_certificate);

          }
          if ($request->hasFile('petition_roll_file') && $request->hasFile('check_list_file') && $request->hasFile('convection_summary')) {


            $petition_roll_file = $request->file('petition_roll_file')->getClientOriginalName();
          //   dd($application_image);

              $request->petition_roll_file->move(public_path('assets/image'), $petition_roll_file);

              $check_list_file = $request->file('check_list_file')->getClientOriginalName();

              $request->check_list_file->move(public_path('assets/image'), $check_list_file);

              $convection_summary = $request->file('convection_summary')->getClientOriginalName();

              $request->convection_summary->move(public_path('assets/image'), $convection_summary);

          }
        if ($request->hasFile('health_paper')) {

            // $request->health_paper->store('assets/image', 'public');
            $health_paper = $request->file('health_paper')->getClientOriginalName();

            $request->health_paper->move(public_path('assets/image'), $health_paper);

        }

        //  $now = date('Y-m-d',strttotime($request->get('warrent_date'))); //Fomat Date and time //you are overwriting this variable below
        $warrent_date = Carbon::parse($request->get('warrent_date'))->format('Y-m-d');

        $date_of_sentence = Carbon::parse($request->get('date_of_sentence'))->format('Y-m-d');
        $dob = Carbon::parse($request->get('dob'))->format('Y-m-d');
        $mercypetitiondate = Carbon::parse($request->get('mercypetitiondate'))->format('Y-m-d');
        $data = [];
        foreach($request->get('section_id') as $seat_id) {
            $data[] = 
                 $seat_id;
                
                //  $petitionsedit->section_id=$data;
                $section = implode(',',$data);
        }


        $Petition = new Petition([
            "name" => $request->get('name'),
            "prisonerid" => $request->get('prisonerid'),
            "f_name" => $request->get('f_name'),
            "nationality" => $request->get('nationality'),
            "physicalstatus_id" => $request->get('physicalstatus_id'),
            "confined_in_jail" => Auth::user()->confined_in_jail,
            "province_id" => Auth::user()->province_id,
            "gender" => $request->get('gender'),
            "dob" => $dob,
            "user_id" => Auth::user()->id,
            "fir_date" => $request->get('fir_date'),
            "mercypetitiondate" => $mercypetitiondate,
            
            "section_id" =>  $section,
           
            "date_of_sentence" => $date_of_sentence,
            "sentence_in_court" => $request->get('sentence_in_court'),
            "petition_history" => html_entity_decode(strip_tags($request->petition_history)),
            "status" => "pending",
            "file_in_department"=>"Jail-Supt",
            'case_fir_no'=> $request->get('case_fir_no'),
           
            'name_of_policestation' => $request->get('name_of_policestation'),
            'case_title'=> $request->get('case_title'),
            'cnic'=> $request->get('cnic'),
            'martial_status'=> $request->get('martial_status'),
            'caste' => $request->get('caste'),
            'religion' => $request->get('religion'),
            'education' => $request->get('education'),
         'mental_health' => $request->get('mental_health'),
         'physical_health'=> $request->get('physical_health'),
         'prisoner_conduct'=> $request->get('prisoner_conduct'),
         'compoundable_offence'=> $request->get('compoundable_offence'),
         'non_compoundable_offence'=> $request->get('non_compoundable_offence'),
         'Occupation'=> $request->get('Occupation'),
         'nature_of_crime'=>$request->get('nature_of_crime'),
         'mitigating_circumstances'=> $request->get('mitigating_circumstances'),
         
         'age_of_petitioner'=> $request->get('age_of_petitioner'),

            "prisoner_image" => $prisoner_image,
            "warrent_file" => $warrent_file,
            "application_image" => $application_image,
            "health_paper" => $health_paper,

            "convection_summary" => $convection_summary,
            "check_list_file" => $check_list_file,
            "petition_roll_file" => $petition_roll_file,
            "petition_certificate" => $petition_certificate,
            "judgments_file" => $judgments_file,
            "application_in_urdu_file" => $application_in_urdu_file,
            "remarks" => html_entity_decode(strip_tags($request->get('remarks'))),

        ]);

        $Petition->save();
        // $file = new File([
        //  'petition_id'=>$Petition->id,
        //  "file" => json_encode($otherdocumentarry),
        // ]);
        // $file->save();

        return redirect()->route('Petition.index')->with('message', 'Petition Successfully save');
    }

    public function petitionupdate(Request $request, $id)
    {
      
     
        $petitionsedit = Petition::find($id);

        if ($request->hasFile('warrent_file')) {

            $warrent_file =  $request->file('warrent_file')->getClientOriginalName();

            $request->warrent_file->move(public_path('assets/image'), $warrent_file);

            $petitionsedit->warrent_file = $warrent_file;

        } else {

            $petitionsedit->warrent_file = $petitionsedit->warrent_file;
        }
        if ($request->hasFile('convection_summary')) {

            $convection_summary =  $request->file('convection_summary')->getClientOriginalName();

            $request->convection_summary->move(public_path('assets/image'), $convection_summary);

            $petitionsedit->convection_summary = $convection_summary;

        } else {

            $petitionsedit->convection_summary = $petitionsedit->convection_summary;
        }
        if ($request->hasFile('check_list_file')) {

            $check_list_file =  $request->file('check_list_file')->getClientOriginalName();

            $request->check_list_file->move(public_path('assets/image'), $check_list_file);

            $petitionsedit->check_list_file = $check_list_file;

        } else {

            $petitionsedit->check_list_file = $petitionsedit->check_list_file;
        }
        if ($request->hasFile('petition_roll_file')) {

            $petition_roll_file =  $request->file('petition_roll_file')->getClientOriginalName();

            $request->petition_roll_file->move(public_path('assets/image'), $petition_roll_file);

            $petitionsedit->petition_roll_file = $petition_roll_file;

        } else {

            $petitionsedit->petition_roll_file = $petitionsedit->petition_roll_file;
        }
        if ($request->hasFile('petition_certificate')) {

            $petition_certificate =  $request->file('petition_certificate')->getClientOriginalName();

            $request->petition_certificate->move(public_path('assets/image'), $petition_certificate);

            $petitionsedit->petition_certificate = $petition_certificate;

        } else {

            $petitionsedit->petition_certificate = $petitionsedit->petition_certificate;
        }
        if ($request->hasFile('judgments_file')) {

            $judgments_file =  $request->file('judgments_file')->getClientOriginalName();

            $request->judgments_file->move(public_path('assets/image'), $judgments_file);

            $petitionsedit->judgments_file = $judgments_file;

        } else {

            $petitionsedit->judgments_file = $petitionsedit->judgments_file;
        }
        if ($request->hasFile('application_in_urdu_file')) {

            $application_in_urdu_file =  $request->file('application_in_urdu_file')->getClientOriginalName();

            $request->application_in_urdu_file->move(public_path('assets/image'), $application_in_urdu_file);

            $petitionsedit->application_in_urdu_file = $application_in_urdu_file;

        } else {

            $petitionsedit->application_in_urdu_file = $petitionsedit->application_in_urdu_file;
        }

        if ($request->hasFile('health_paper')) {

            // $request->health_paper->store('assets/image', 'public');
            $health_paper = $request->file('health_paper')->getClientOriginalName();

            $request->health_paper->move(public_path('assets/image'), $health_paper);
            $petitionsedit->health_paper = $health_paper;
        } else {
            $petitionsedit->health_paper = $petitionsedit->health_paper;
        }
        if ($request->hasFile('application_image')) {

            // $request->health_paper->store('assets/image', 'public');
            $application_image = $request->file('application_image')->getClientOriginalName();

            $request->application_image->move(public_path('assets/image'), $application_image);
            $petitionsedit->application_image = $application_image;
        } else {
            $petitionsedit->application_image = $petitionsedit->application_image;
        }

        if ($request->hasFile('prisoner_image')) {

            // $request->health_paper->store('assets/image', 'public');
            $prisoner_image = $request->file('prisoner_image')->getClientOriginalName();


            $request->prisoner_image->move(public_path('assets/image'), $prisoner_image);
            $petitionsedit->prisoner_image = $prisoner_image;
        } else {
            $petitionsedit->prisoner_image = $petitionsedit->prisoner_image;
        }

        //  $now = date('Y-m-d',strttotime($request->get('warrent_date'))); //Fomat Date and time //you are overwriting this variable below
     

        $date_of_sentence = Carbon::parse($request->get('date_of_sentence'))->format('Y-m-d');
        $dob = Carbon::parse($request->get('dob'))->format('Y-m-d');
        $mercypetitiondate = Carbon::parse($request->get('mercypetitiondate'))->format('Y-m-d');

        $petitionsedit->name = $request->get('name');

        $petitionsedit->f_name = $request->get('f_name');
        $petitionsedit->nationality = $request->get('nationality');
        $petitionsedit->physicalstatus_id = $request->get('physicalstatus_id');
        $petitionsedit->dob = $request->get('dob');

        $petitionsedit->user_id = Auth::user()->id;

        $petitionsedit->fir_date = $request->get('fir_date');
        $petitionsedit->mercypetitiondate = $mercypetitiondate;
        $petitionsedit->confined_in_jail = Auth::user()->confined_in_jail;

        $petitionsedit->gender = $request->get('gender');
       
        $data = [];
        foreach($request->get('section_id') as $seat_id) {
            $data[] = 
                 $seat_id;
                
                //  $petitionsedit->section_id=$data;
                $petitionsedit->section_id = implode(',',$data);
        }
    
    
        $petitionsedit->date_of_sentence = $date_of_sentence;
        $petitionsedit->sentence_in_court = $request->get('sentence_in_court');
        $petitionsedit->petition_history = html_entity_decode(strip_tags($request->get('petition_history')));
        $petitionsedit->nationality = $request->get('nationality');
        $petitionsedit->case_fir_no  = $request->get('case_fir_no');
           
        $petitionsedit->name_of_policestation   = $request->get('name_of_policestation');
        $petitionsedit->case_title = $request->get('case_title');
        $petitionsedit->cnic = $request->get('cnic');
        $petitionsedit->martial_status = $request->get('martial_status');
        $petitionsedit->caste   = $request->get('caste');
        $petitionsedit->religion   = $request->get('religion');
        $petitionsedit->education   = $request->get('education');
        $petitionsedit->mental_health  = $request->get('mental_health');
        $petitionsedit->physical_health = $request->get('physical_health');
        $petitionsedit->prisoner_conduct = $request->get('prisoner_conduct');
        $petitionsedit->compoundable_offence  = $request->get('compoundable_offence');
        $petitionsedit->non_compoundable_offence = $request->get('non_compoundable_offence');
        $petitionsedit->Occupation  = $request->get('Occupation');
        $petitionsedit->nature_of_crime = $request->get('nature_of_crime');
        $petitionsedit->mitigating_circumstances  = $request->get('mitigating_circumstances');
     
        $petitionsedit->age_of_petitioner  = $request->get('age_of_petitioner');

        $petitionsedit->remarks = html_entity_decode(strip_tags($request->get('remarks')));

        // $fileupdate = File::where('petition_id',$id)->first();

        $fileupdate = File::where('petition_id', $petitionsedit->id)->first();

        $petitionsedit->save();
        // $fileupdate->save();
        return redirect()->route('Petition.index')
            ->with('message', 'Petition update successfully');
    }

    //petition remarks and file update
    public function petitionremarksupdate(Request $request, $id)
    {

        $this->validate($request, [
            'checking' => 'required',


        ]);

        $petitionsedit = Petition::find($id);

        $petitionsedit->remarks = html_entity_decode(strip_tags($request->get('remarks')));
        $petitionsedit->received_from_department = "Jail-Supt";

        $petitionsedit->file_in_department = $request->get('file_in_department');

        $petitionsedit->save();
        // $fileupdate = File::where('petition_id',$id)->first();

        if ($request->file('otherdocument')) {

            foreach ($request->file('otherdocument') as $file) {
                $otherdocument = $file->getClientOriginalName();

                $file->move(public_path('assets/image'), $otherdocument);
                $otherexplode = explode(".", $otherdocument);

                $file = new File([
                    'petition_id' => $petitionsedit->id,
                    "file" => $otherdocument,
                    "type" => $otherexplode["1"],

                ]);

                $file->save();

            }
            $logPetitions =  new LogPetition([
                "user_id" => Auth::user()->id,
                "department" => $request->get('file_in_department'),
                "petition_id" => $petitionsedit->id,
            ]);
            $logPetitions->save();

        }

        return redirect()->route('remarksfromhome')
            ->with('message', 'Petition forward successfully');
    }

    public function forwardpetition($id)
    {

        return view('IGP.forward');
    }
    public function forwardhomedepartment(Request $request, $id)
    {

        $this->validate($request, [
            'checking' => 'required',


        ]);



        $forwardhomedepartment = Petition::find($id);
        $forwardhomedepartment->remarks = html_entity_decode(strip_tags($request->get('remarks')));
        $forwardhomedepartment->file_in_department = $request->get('file_in_department');
        $forwardhomedepartment->received_from_department = "Jail-Supt";
        $forwardhomedepartment->save();
        if ($request->file('otherdocument')) {
            $otherdocumentarry = [];
            foreach ($request->file('otherdocument') as $file) {
                $otherdocument = $file->getClientOriginalName();

                $file->move(public_path('assets/image'), $otherdocument);
                $otherexplode = explode(".", $otherdocument);

                $file = new File([
                    'petition_id' => $forwardhomedepartment->id,
                    "file" => $otherdocument,
                    "type" => $otherexplode["1"],

                ]);

                $file->save();

            }
            $logPetitions =  new LogPetition([
                "user_id" => Auth::user()->id,
                "department" => $request->get('file_in_department'),
                "petition_id" => $forwardhomedepartment->id,
            ]);
            $logPetitions->save();

        }

        //    $otherdoc= File::where('petition_id',$forwardhomedepartment->id)->first();
        //    $otherdoc->file = $otherdocument;
        //    $otherdoc->type = $file['1'];
        //    $otherdoc->save();
        return redirect()->route('Petition.index')->with('message', 'Petition Forward Successfully ');
    }

    // public function reportform()
    // {
    //     if (Auth::user()->confined_in_jail == "") {
    //         $petitions = Petition::orderBy("id", "desc")->get();
    //     } else {
    //         $petitions = Petition::Where('confined_in_jail', Auth::user()->confined_in_jail)->Where('status', 'IGP')->Where('received_from_department', 'IGP')->orderBy("id", "desc")->get();
    //     }

    //     return view('IGP.reportform', compact('petitions'));
    // }

}
