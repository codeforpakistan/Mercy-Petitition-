<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\File;
use App\Petition;
use App\Section;
use Illuminate\Support\Carbon;
class PetitionController extends Controller
{

    function __construct()
    {
         $this->middleware('permission:jail-supt-list|jail-supt-create|jail-supt-edit|jail-supt-delete', ['only' => ['index','store']]);
         $this->middleware('permission:jail-supt-create', ['only' => ['create','store']]);
         $this->middleware('permission:jail-supt-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:jail-supt-delete', ['only' => ['destroy']]);
    }
    public function index(){
       $petitions=Petition::all();
        return view('IGP.index',compact('petitions'));
    }
    public function create(){
        $sections = Section::all();

        return view('IGP.addpetition',compact('sections'));
    }
    public function edit($id){
        $sections = Section::all();
        $petitionsedit=Petition::find($id);
       $filepetition=File::where('petition_id',$id)->first();

        return view('IGP.petitionsedit',compact('petitionsedit','sections','filepetition'));
    }

    public function storepetition(Request $request)
    {
        // Validate the inputs

        // $request->validate([
        //     'presionimage' => 'required|mimes:jpeg,png,jpg,gif,svg|max:2048',
        //     'applicationattachment' => 'required|mimes:csv,txt,xlx,xls,jpeg,png,jpg,gif,svg,pdf|max:2048',
        //     'healthreportattachment' => 'required|mimes:csv,txt,xlx,xls,jpeg,png,jpg,gif,svg,pdf|max:2048',
        //     'warrentfileattachment' => 'required|mimes:csv,txt,xlx,xls,jpeg,png,jpg,gif,svg,pdf|max:2048',
        //     'otherdocument' => 'required|mimes:csv,txt,xlx,xls,jpeg,png,jpg,gif,svg,pdf|max:2048',
        //    ]);

           if ($request->hasFile('application_image') && $request->hasFile('prisoner_image') && $request->hasFile('warrent_file')) {

                    //   $request->application_image->store('assets/image', 'public');
                    //   $request->prisoner_image->store('assets/image', 'public');
                    //   $request->warrent_file->store('assets/image', 'public');
                      $application_image = time().'.'.$request->application_image->extension();

        $request->application_image->move(public_path('assets/image'), $application_image);

        $prisoner_image = time().'.'.$request->prisoner_image->extension();

        $request->prisoner_image->move(public_path('assets/image'), $prisoner_image);

        $warrent_file = time().'.'.$request->warrent_file->extension();

        $request->warrent_file->move(public_path('assets/image'), $warrent_file);


                   }
                   if ($request->hasFile('health_paper')) {

                    // $request->health_paper->store('assets/image', 'public');
                    $health_paper = time().'.'.$request->health_paper->extension();

                    $request->health_paper->move(public_path('assets/image'), $health_paper);

                 }
                 if ($request->hasFile('otherdocument')) {
                    $otherdocument = time().'.'.$request->otherdocument->extension();

                    $request->otherdocument->move(public_path('assets/image'), $otherdocument);

                    // $request->otherdocument->store('assets/image', 'public');
                  $file=  explode(".",$otherdocument);
                  $file['1'];

                 }
                //  $now = date('Y-m-d',strttotime($request->get('warrent_date'))); //Fomat Date and time //you are overwriting this variable below
                $warrent_date = Carbon::parse($request->get('warrent_date'))->format('Y-m-d');

                $date_of_sentence = Carbon::parse($request->get('date_of_sentence'))->format('Y-m-d');
                $dob = Carbon::parse($request->get('dob'))->format('Y-m-d');
                $mercypetitiondate = Carbon::parse($request->get('mercypetitiondate'))->format('Y-m-d');




        $Petition = new Petition([
            "name" => $request->get('name'),

            "f_name" => $request->get('f_name'),
            "nationality" => $request->get('nationality'),
            "physicalstatus" => $request->get('physicalstatus'),
            "confined_in_jail" => $request->get('confined_in_jail'),
            "gender" => $request->get('gender'),
            "dob" => $dob,
            "fir&date" => $request->get('fir&date'),
            "mercypetitiondate" => $mercypetitiondate,
            "section_id" => $request->get('section_id'),
            "warrent_date" =>  $warrent_date,
            "date_of_sentence" =>  $date_of_sentence,
            "sentence_in_court" =>$request->get('sentence_in_court'),
            "warrent_information" => $request->get('warrent_information'),
            "nationality" => $request->get('nationality'),
            "Status" => "IGP",

            "prisoner_image" => $prisoner_image,
            "warrent_file" =>$warrent_file,
            "application_image" => $application_image,
            "health_paper" => $health_paper,
            "remarks" =>'igpremarks',

        ]);

        $Petition->save();
        $file = new File([
         'petition_id'=>$Petition->id,
         "file" => $otherdocument,
        ]);
        $file->save();
        return back()->with('session','Petion Successfully save');
        }

        public function forwardpetition($id){
        //   dd($id);()
        return view('IGP.forward');
        }
}
