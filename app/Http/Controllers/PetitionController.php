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
    // public function storepetition(Request $request){
    //       $request->validate([
    //         'file' => 'required|mimes:pdf,xlx,csv|max:2048',
    //     ]);
    //                if ($files = $request->file('profile_image')) {
    //                // Define upload path
    //                    $destinationPath = public_path('/assets/image'); // upload path
    //          // Upload Orginal Image           
    //                    $profileImage = date('YmdHis') . "." . $files->getClientOriginalExtension();
    //                    $files->move($destinationPath, $profileImage);
    //                
            
    //                 }
    //         if ($files = $request->file('profile_image')) {
    //                    // Define upload path
    //                        $destinationPath = public_path('/assets/image'); // upload path
    //              // Upload Orginal Image           
    //                        $profileImage = date('YmdHis') . "." . $files->getClientOriginalExtension();
    //                        $files->move($destinationPath, $profileImage);
    //                    
                
    //                     }
    //             if ($files = $request->file('profile_image')) {
    //                        // Define upload path
    //                            $destinationPath = public_path('/assets/image'); // upload path
    //                  // Upload Orginal Image           
    //                            $profileImage = date('YmdHis') . "." . $files->getClientOriginalExtension();
    //                            $files->move($destinationPath, $profileImage);
    //                        
                    
    //                         }
    //                 if ($files = $request->file('profile_image')) {
    //                            // Define upload path
    //                                $destinationPath = public_path('/assets/image'); // upload path
    //                      // Upload Orginal Image           
    //                                $profileImage = date('YmdHis') . "." . $files->getClientOriginalExtension();
    //                                $files->move($destinationPath, $profileImage);
    //                            
                        
    //                             }
    //                     if ($files = $request->file('profile_image')) {
    //                                // Define upload path
    //                                    $destinationPath = public_path('/assets/image'); // upload path
    //                          // Upload Orginal Image           
    //                                    $profileImage = date('YmdHis') . "." . $files->getClientOriginalExtension();
    //                                    $files->move($destinationPath, $profileImage);
    //                                
                            
    //                                 }
    //         $imagemodel= new Photo();
    //         $imagemodel->photo_name="$profileImage";
    //         $imagemodel->save();

    //     return view('IGP.addpetition');
    // }
    public function store(Request $request)
    {
        // Validate the inputs
        $request->validate([
            'presionimage' => 'required|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'file' => 'required|mimes:csv,txt,xlx,xls,jpeg,png,jpg,gif,svg,pdf|max:2048',
           ]);
           if ($request->hasFile('applicationattachment') $$ $request->hasFile('presionimage') && $request->hasFile('warrentfileattachment')) {

                      $request->file->store('product', 'public');

                   }
                   if ($request->hasFile('healthreportattachment')) {

                    $request->file->store('product', 'public');

                 }
                 if ($request->hasFile('presionimage')) {

                    $request->file->store('assets/image', 'public');

                 }
                 if ($request->hasFile('warrentfileattachment')) {

                    $request->file->store('product', 'public');

                 }
        $product = new Petition([
            "name" => $request->get('name'),
            "file_path" => $request->file->hashName()
        ]);
        $product->save();

        }

           
}
