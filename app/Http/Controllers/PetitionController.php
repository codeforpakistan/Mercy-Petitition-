<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\File;
use App\Petition;
use App\Section;
Use Illuminate\Support\Facades\Auth;
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

   if(Auth::user()->confined_in_jail ==""){
    $petitions=Petition::orderBy("id","desc")->get();
   }else{
    $petitions=Petition::Where('confined_in_jail', Auth::user()->confined_in_jail)->Where('status', 'IGP')->Where('received_from_department', 'IGP')->orderBy("id","desc")->get();
   }


        return view('IGP.index',compact('petitions'));
    }
    public function search(Request $request){
      $search = trim($request->input('search'));

           if(Auth::user()->confined_in_jail==""){


        $petitions=Petition::where('confined_in_jail',  $search)->
        orWhere('name',  'like', "%{$search}%" )->orWhere('gender',  'like', "%{$search}%"  )->
        orWhere('nationality',  'like', "%{$search}%" )->orWhere('f_name',  'like', "%{$search}%"  )->
        orWhere('status',  'like', "%{$search}%" )->get();
           }else{
         //   $pet=Petition::where('status','IGP')->where('confined_in_jail', Auth::user()->confined_in_jail)->get();

            $petitions=Petition::where('status','IGP')->where('confined_in_jail', Auth::user()->confined_in_jail)->orWhere('name', $search )->orWhere('gender', $search)->

            orWhere('nationality',  $search  )->orWhere('f_name',  $search  )->get();


           }

        return view('IGP.petitionsearch',compact('petitions'));
    }
    public function view($id){

        $pets = Petition::with('fileattachements','sectionss')->get();

        $petitions = $pets->find($id);

        return response()->json($petitions);




    }
    public function  remarksfromhome(){
        if(Auth::user()->confined_in_jail ==""){
            $petitions=Petition::orderBy("id","desc")->get();
           }else{
        $petitions=Petition::Where('confined_in_jail', Auth::user()->confined_in_jail)->Where('status', 'IGP')->Where('received_from_department', 'HomeDepartment')->orderBy("id","desc")->get();
         
           }

    
        return view('IGP.remarksfromhome',compact('petitions'));
    }
    public function searchform(){
        return view('IGP.searchform');
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

    // file validation

        $this->validate($request, [
            'prisoner_image' => 'required|mimes:jpeg,png,jpg,gif,svg',
            'application_image' => 'required|mimes:jpeg,png,jpg,gif,svg,pdf',
            'health_paper' => 'required|mimes:jpeg,png,jpg,gif,svg,pdf',
            'warrent_file' => 'required|mimes:jpeg,png,jpg,gif,svg,pdf',

             'name' => 'required|regex:/^[a-zA-Z0-9 ]+$/|max:20',

        'f_name' => 'required|regex:/^[a-zA-Z0-9 ]+$/|max:20',
        'nationality' => 'required|regex:/^[a-zA-Z0-9 ]+$/|max:20',
        'physicalstatus' => 'required',

        'gender' => 'required|regex:/^[a-zA-Z0-9 ]+$/|max:20',
        'dob' => 'required',

        'firdate' => 'required|regex:/^[0-9.-]*$/',
        'mercypetitiondate' => 'required',
        'section_id' => 'required',
        'warrent_date' =>  'required',
        'date_of_sentence' =>  'required',
        'sentence_in_court' =>'required|regex:/^[a-zA-Z0-9 ]+$/|max:100',
        'warrent_information' => 'required|regex:/[a-zA-Z0-9\s]+/|max:255',

           ]);

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
            "confined_in_jail" => Auth::user()->confined_in_jail,
            "gender" => $request->get('gender'),
            "dob" => $dob,
            "user_id"=> Auth::user()->id,
            "firdate" => $request->get('firdate'),
            "mercypetitiondate" => $mercypetitiondate,
            "section_id" => $request->get('section_id'),
            "warrent_date" =>  $warrent_date,
            "date_of_sentence" =>  $date_of_sentence,
            "sentence_in_court" =>$request->get('sentence_in_court'),
            "warrent_information" =>strip_tags($request->warrent_information),
            "status" => "IGP",
            
            "prisoner_image" => $prisoner_image,
            "warrent_file" =>$warrent_file,
            "application_image" => $application_image,
            "health_paper" => $health_paper,
            "remarks" =>strip_tags($request->remarks),

        ]);

        $Petition->save();
        // $file = new File([
        //  'petition_id'=>$Petition->id,
        //  "file" => json_encode($otherdocumentarry),
        // ]);
        // $file->save();
        return redirect()->route('Petition.index')->with('message','Petion Successfully save');
        }

        public function petitionupdate(Request $request,$id){


            $petitionsedit=Petition::find($id);
            if ($request->hasFile('warrent_file')) {



    $warrent_file = time().'.'.$request->warrent_file->extension();

    $request->warrent_file->move(public_path('assets/image'), $warrent_file);

    $petitionsedit->warrent_file = $warrent_file;


               }else{

                $petitionsedit->warrent_file =   $petitionsedit->warrent_file;
               }


               if ($request->hasFile('health_paper')) {

                // $request->health_paper->store('assets/image', 'public');
                $health_paper = time().'.'.$request->health_paper->extension();

                $request->health_paper->move(public_path('assets/image'), $health_paper);
                $petitionsedit->health_paper = $health_paper;
             }else{
                $petitionsedit->health_paper = $petitionsedit->health_paper ;
             }
             if ($request->hasFile('application_image')) {

                // $request->health_paper->store('assets/image', 'public');
                $application_image = time().'.'.$request->application_image->extension();

                $request->application_image->move(public_path('assets/image'), $application_image);
                $petitionsedit->application_image = $application_image;
             }else{
                $petitionsedit->application_image = $petitionsedit->application_image ;
             }

             if ($request->hasFile('prisoner_image')) {

                // $request->health_paper->store('assets/image', 'public');
                $prisoner_image = time().'.'.$request->prisoner_image->extension();

                $request->prisoner_image->move(public_path('assets/image'), $prisoner_image);
                $petitionsedit->prisoner_image = $prisoner_image;
             }else{
                $petitionsedit->prisoner_image = $petitionsedit->prisoner_image;
             }



            //  $now = date('Y-m-d',strttotime($request->get('warrent_date'))); //Fomat Date and time //you are overwriting this variable below
            $warrent_date = Carbon::parse($request->get('warrent_date'))->format('Y-m-d');

            $date_of_sentence = Carbon::parse($request->get('date_of_sentence'))->format('Y-m-d');
            $dob = Carbon::parse($request->get('dob'))->format('Y-m-d');
            $mercypetitiondate = Carbon::parse($request->get('mercypetitiondate'))->format('Y-m-d');



            $petitionsedit->name = $request->get('name');

            $petitionsedit->f_name = $request->get('f_name');
            $petitionsedit->nationality = $request->get('nationality');
            $petitionsedit->physicalstatus = $request->get('physicalstatus');
            $petitionsedit->dob = $request->get('dob');

            $petitionsedit->user_id = Auth::user()->id;

            $petitionsedit->firdate = $request->get('fir&date');
            $petitionsedit->mercypetitiondate = $mercypetitiondate;
            $petitionsedit->confined_in_jail = Auth::user()->confined_in_jail;

            $petitionsedit->gender = $request->get('gender');
            $petitionsedit->section_id = $request->get('section_id');
            $petitionsedit->warrent_date =  $warrent_date;
            $petitionsedit->date_of_sentence = $date_of_sentence;
            $petitionsedit->sentence_in_court = $request->get('sentence_in_court');
            $petitionsedit->warrent_information = $request->get('warrent_information');
            $petitionsedit->nationality = $request->get('nationality');



            $petitionsedit->remarks = $request->get('remarks');



            // $fileupdate = File::where('petition_id',$id)->first();

          $fileupdate = File::where('petition_id',$petitionsedit->id)->first();


        //   if ($request->hasFile('otherdocument')) {
        //     $otherdocument = time().'.'.$request->otherdocument->extension();

        //     $request->otherdocument->move(public_path('assets/image'), $otherdocument);


        //     $fileupdate->file = $otherdocument;


        //  }else{
        //     $fileupdate->file = $fileupdate->file ;
        //  }


        //         $fileupdate->petition_id= $id;


        //         foreach ( $petitionsedit->fileattachements as $post) {
        //             $post->petitions()->associate($fileupdate);; // not id
        //         }



            $petitionsedit->save();
            // $fileupdate->save();
            return redirect()->route('Petition.index')
                        ->with('success','Product deleted successfully');
        }

        public function forwardpetition($id){

            return view('IGP.forward');
            }
            public function forwardhomedepartment(Request $request, $id){





           $forwardhomedepartment= Petition::find($id);
           $forwardhomedepartment->remarks = strip_tags($request->get('remarks'));
           $forwardhomedepartment->status = $request->get('status');
           $forwardhomedepartment->received_from_department = "IGP";
           $forwardhomedepartment->save();
           if ($request->file('otherdocument')) {
            $otherdocumentarry=[];
            foreach($request->file('otherdocument') as $file)
            {
            $otherdocument = time().'.'.$file->extension();

            $file->move(public_path('assets/image'), $otherdocument);
        $otherexplode =  explode(".",$otherdocument);

            $file = new File([
                'petition_id'=>$forwardhomedepartment->id,
                "file" =>  $otherdocument,
                "type"=> $otherexplode["1"],

               ]);

               $file->save();

            }

         }

        //    $otherdoc= File::where('petition_id',$forwardhomedepartment->id)->first();
        //    $otherdoc->file = $otherdocument;
        //    $otherdoc->type = $file['1'];
        //    $otherdoc->save();
           return redirect()->route('Petition.index')->with('message','Petion Forward Successfully ');
                }

        public function igpreport(){

        return view('IGP.reportform');


        }

}
