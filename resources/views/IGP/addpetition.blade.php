@extends('layouts.portal', [
'menu' => 'IGP',
'sub_menu' => 'Petition'
])
@section('module', 'IGP Management')
@section('element', 'Add Petition')
<style>
    * {
      box-sizing: border-box;
    }
    
    body {
      background-color: #f1f1f1;
    }
    
    #regForm {
      background-color: #ffffff;
     
      font-family: Raleway;
      padding: 40px;
      width: 100%;
      
    }
    
    h1 {
      text-align: center;  
    }
    
    input {
      padding: 10px;
      width: 100%;
      font-size: 17px;
      font-family: Raleway;
      border: 1px solid #aaaaaa;
    }
    select {
      padding: 10px;
      width: 100%;
      font-size: 17px;
      font-family: Raleway;
      border: 1px solid #aaaaaa;
    }
    
    /* Mark input boxes that gets an error on validation: */
    input.invalid {
      background-color: #ac1818;
    }
    
    /* Hide all steps by default: */
    .tab {
      display: none;
    }
    
    button {
      background-color: #04AA6D;
      color: #ffffff;
      border: none;
      padding: 10px 20px;
      font-size: 17px;
      font-family: Raleway;
      cursor: pointer;
    }
    
    button:hover {
      opacity: 0.8;
    }
    
    #prevBtn {
      background-color: #bbbbbb;
    }
    
    /* Make circles that indicate the steps of the form: */
    .step {
      height: 15px;
      width: 15px;
      margin: 0 2px;
      background-color: #bbbbbb;
      border: none;  
      border-radius: 50%;
      display: inline-block;
      opacity: 0.5;
    }
    
    .step.active {
      opacity: 1;
    }
    
    /* Mark the steps that are finished and valid: */
    .step.finish {
      background-color: #04AA6D;
    }
    </style>

@section('content')

 
@if ($errors->any())
<div class="alert alert-danger">

    <ul>

        @foreach ($errors->all() as $error)
        {{ $error }}<br />
        @endforeach
    </ul>

</div><br />
@endif
<div role="main" class="page-content container container-plus">

    <div class="card bcard mt-2 mt-lg-3">
<?php date_default_timezone_set("Asia/Karachi");?>

     <form id="regForm" action="{{ route('storepetition') }}" method="post" enctype="multipart/form-data">
        @csrf

        <h4>CASE FILE PARTICULARS</h4>
        
        <!-- One "tab" for each step in the form: -->
        <div class="tab">
         
          <div class="form-row">
            <div class="form-group col-md-6">
                <label class="required" for="inputEmail4">Case FIR NO</label>
                <input type="text" oninput="this.className = ''" onkeyup="this.value=this.value.replace(/[^-/0-9\s]/g,'');"
                    class="form-control @error('name') is-invalid @enderror" value="{{ old('case_fir_no') }}" name="case_fir_no"
                    class="form-control" id="inputEmail4" placeholder="Enter Fir no">
                @error('case_fir_no')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group col-md-6">
                <label class="required" for="inputState">Date of FIR</label>
                <input oninput="this.className = ''" onkeyup="this.value=this.value.replace(/[^-/0-9\s]/g,'');"
                    class="form-control @error('firdate') is-invalid @enderror" value="{{ old('fir_date') }}"
                    type="date" name="fir_date" class="form-control" id="inputCity">
                @error('fir_date')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
        <div class="form-row">

            <div class="form-group col-md-6">
                <label class="required" for="inputEmail4">Name of Police station</label>
                <input type="text"  oninput="this.className = ''"  onkeyup="this.value=this.value.replace(/[^A-Za-z\s]/g,'');"
                    class="form-control @error('name') is-invalid @enderror" value="{{ old('name_of_policestation') }}" name="name_of_policestation"
                    class="form-control" id="inputEmail4" placeholder="Enter police staion Name">
                @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group col-md-6">
                <label class="required" for="inputEmail4">Case Title</label>
                <input type="text" oninput="this.className = ''"  onkeyup="this.value=this.value.replace(/[^A-Za-z\s]/g,'');"
                    class="form-control @error('name') is-invalid @enderror" value="{{ old('case_title') }}" name="case_title"
                    class="form-control" id="inputEmail4" placeholder="Enter case title">
                @error('case_title')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

        </div>


        <div class="form-row">
            <div class="form-group col-md-6">
                <label class="required" for="inputCity">Sentencing Court</label>
                <input oninput="this.className = ''"  onkeyup="this.value=this.value.replace(/[^A-Za-z\s]/g,'');"
                    class="form-control @error('sentence_in_court') is-invalid @enderror"
                    value="{{ old('sentence_in_court') }}" type="text" name="sentence_in_court"
                    placeholder="Enter name of Court" class="form-control" id="inputCity">
                @error('sentence_in_court')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group col-md-6">
                <label class="required" for="inputCity">Date of sentence</label>
                <input oninput="this.className = ''"  class="form-control @error('date_of_sentence') is-invalid @enderror"
                    value="{{ old('date_of_sentence') }}" type="Date" name="date_of_sentence"
                    class="form-control" id="inputCity">
                @error('date_of_sentence')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

        </div>

        <div class="form-row">
            <div class="form-group col-md-6">
            <label for="inputEmail4">Mercy Petition Number</label>
            <input  oninput="this.className = ''"  type="text"
                class="form-control"  name="prisonerid" value="{{ date('Ymdhis')}}" id="inputEmail4" placeholder="Enter Name" readonly>


        </div>



            <div class="form-group col-md-6">
                <label class="required" for="inputState">Mercy petition Date</label>

                <input  oninput="this.className = ''" class="form-control @error('mercypetitiondate') is-invalid @enderror"
                    value="{{ old('mercypetitiondate') }}" type="Date" name="mercypetitiondate"
                    class="form-control" placeholder=" Pick Mercy petition Date">
                @error('mercypetitiondate')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

        </div>
        </div>
      
        <div class="tab">
            <h4>PARTICULARS OF PRISONER: </h4>
          <div class="form-row">
            <div class="form-group col-md-6">
                <label class="required" for="inputEmail4">Prisoner Name</label>
                <input type="text" oninput="this.className = ''" onkeyup="this.value=this.value.replace(/[^A-Za-z\s]/g,'');"
                    class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}" name="name"
                    class="form-control" id="inputEmail4" placeholder="Enter Name">
                @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group col-md-6">
                <label class="required" for="inputPassword4">Father Name</label>
                <input oninput="this.className = ''" onkeyup="this.value=this.value.replace(/[^A-Za-z\s]/g,'');" type="text"
                    class="form-control @error('f_name') is-invalid @enderror" value="{{ old('f_name') }}"
                    name="f_name" class="form-control" id="inputPassword4" placeholder="Father Name">
                @error('f_name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label class="required" for="inputEmail4">Cnic No</label>
                <input type="text" oninput="this.className = ''" data-inputmask="'mask': '99999-9999999-9'"   required=""
                    class="form-control @error('name') is-invalid @enderror" value="{{ old('cnic') }}" name="cnic"
                    class="form-control" id="inputEmail4"  placeholder="XXXXX-XXXXXXX-X">
                @error('cnic')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group col-md-6">
                <label class="required" for="inputPassword4">Age of Petitoner</label>
                <input oninput="this.className = ''" onkeyup="this.value=this.value.replace(/[^A-Za-z\s]/g,'');" type="text"
                    class="form-control @error('f_name') is-invalid @enderror" value="{{ old('age_of_petitioner') }}"
                    name="age_of_petitioner" class="form-control" id="inputPassword4" placeholder="age_of_petitioner">
                @error('age_of_petitioner')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>

        <div class="form-row">
            <div class="form-group col-md-6">
                <label class="required " for="form-field-select-11">Gender</label>
                <select  oninput="this.className = ''" class=" select form-control @error('gender') is-invalid @enderror" value="{{ old('gender') }}"
                    name="gender"
                    class="ace-select text-dark-m1 bgc-default-l5 bgc-h-warning-l3 brc-default-m3 brc-h-warning-m1"
                    id="form-field-select-11">
                    <option value='male'>Male</option>
                    <option value='female'>Female</option>
                    <option value='other'>Other</option>
                </select>
                @error('gender')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group col-md-6">
                <label class="required" for="form-field-select-11">Martial Status</label>
                <select  oninput="this.className = ''" class=" select form-control @error('gender') is-invalid @enderror" value="{{ old('martial_status') }}"
                    name="martial_status"
                    class="ace-select text-dark-m1 bgc-default-l5 bgc-h-warning-l3 brc-default-m3 brc-h-warning-m1"
                    id="form-field-select-11">
                    <option value='Single'>Single</option>
                    <option value='Married'>Married</option>

                </select>
                @error('martial_status')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label class="required" for="inputEmail4">Caste</label>
                <input oninput="this.className = ''" type="text" onkeyup="this.value=this.value.replace(/[^A-Za-z\s]/g,'');"
                    class="form-control @error('name') is-invalid @enderror" value="{{ old('caste') }}" name="caste"
                    class="form-control" id="inputEmail4" placeholder="Enter caste">
                @error('caste')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group col-md-6">
                <label class="required" for="form-field-select-11">Religion</label>
                <select oninput="this.className = ''" class="form-control @error('gender') is-invalid @enderror" value="{{ old('religion') }}"
                    name="religion"
                    class="ace-select text-dark-m1 bgc-default-l5 bgc-h-warning-l3 brc-default-m3 brc-h-warning-m1"
                    id="form-field-select-11">
                    <option value='Muslim'>Muslim</option>
                    <option value='Christian'>Christian</option>
                    <option value='Hindu'>Hindu</option>
                    <option value='Other'>Other</option>

                </select>
                @error('religion')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label class="required" for="inputEmail4">Education</label>
                <input oninput="this.className = ''" type="text" onkeyup="this.value=this.value.replace(/[^A-Za-z\s]/g,'');"
                    class="form-control @error('name') is-invalid @enderror" value="{{ old('education') }}" name="education"
                    class="form-control" id="inputEmail4" placeholder="Enter education">
                @error('education')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group col-md-6">
                <label class="required" for="inputPassword4">Occupation</label>
                <input oninput="this.className = ''" onkeyup="this.value=this.value.replace(/[^A-Za-z\s]/g,'');" type="text"
                    class="form-control @error('f_name') is-invalid @enderror" value="{{ old('Occupation') }}"
                    name="Occupation" class="form-control" id="inputPassword4" placeholder="Enter Occupation">
                @error('Occupation')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
        <div class="form-row">

            <div class="form-group col-md-6">
                <label class="required" for="inputState">DOB</label>

                <input  oninput="this.className = ''" type="date" class="form-control @error('f_name') is-invalid @enderror"
                    value="{{ old('dob') }}" name="dob" class="form-control">
                @error('dob')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group col-md-6">
                <label class="required" for="form-field-select-11">
                    Nationality
                </label>

                <select oninput="this.className = ''" class="form-control @error('nationality') is-invalid @enderror"
                    value="{{ old('nationality') }}" name="nationality"
                    class="ace-select text-dark-m1 bgc-default-l5 bgc-h-warning-l3 brc-default-m3 brc-h-warning-m1"
                    id="form-field-select-11">

                    <option value='Pakistani'>Pakistani</option>
                    <option value='Afghani'>Afghani</option>

                </select>
                @error('nationality')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

        </div>


        <div class="form-row">
            <div class="form-group col-md-6">
                <label class="required" for="form-field-select-11">Physical Status</label>
                <select oninput="this.className = ''" class="form-control @error('physicalstatus') is-invalid @enderror"
                    value="{{ old('physicalstatus_id') }}"
                    class="ace-select text-dark-m1 bgc-default-l5 bgc-h-warning-l3 brc-default-m3 brc-h-warning-m1"
                    name="physicalstatus_id" id="form-field-select-11">
                    @foreach ($physicalstatus as $physical)
                        <option value='{{ $physical->id }}'>{{ $physical->PhysicalStatus }}</option>
                    @endforeach

                </select>
                @error('physicalstatus')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group col-md-6">
                <label class="required" for="inputState">Mental Helth</label>
                <input
                oninput="this.className = ''"  class="form-control @error('firdate') is-invalid @enderror" value="{{ old('mental_health') }}"
                    type="text" name="mental_health" class="form-control" id="inputCity">
                @error('mental_health')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

        </div>

        <div class="form-row">
            <div class="form-group col-md-6">
                <label class="required" for="form-field-select-11">Prisoner Conduct</label>
                <input
                oninput="this.className = ''"  class="form-control @error('prisoner_conduct') is-invalid @enderror" value="{{ old('prisoner_conduct') }}"
                    type="text" name="prisoner_conduct" class="form-control" id="inputCity">
                @error('prisoner_conduct')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group col-md-6">
                <label class="required" for="inputState">Physical Helth</label>
                <input
                oninput="this.className = ''"  class="form-control @error('mental_health') is-invalid @enderror" value="{{ old('mental_health') }}"
                    type="text" name="physical_health" class="form-control" id="inputCity">
                @error('mental_health')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>


        </div>

        </div>
        
        <div class="tab">
            <h4>PARTICULAR OF CRIME:</h4>
         
          <div class="form-row">
            <div class="form-group col-md-6">
                <label class="required" for="form-field-select-11">Compoundable offence</label>
                <select oninput="this.className = ''" class="form-control @error('compoundable_offence') is-invalid @enderror" value="{{ old('compoundable_offence') }}"
                    name="compoundable_offence"
                    class="ace-select text-dark-m1 bgc-default-l5 bgc-h-warning-l3 brc-default-m3 brc-h-warning-m1"
                    id="form-field-select-11">
                    <option value='Yes'>Yes</option>
                    <option value='No'>No</option>
                </select>
                @error('compoundable_offence')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group col-md-6">
                <label class="required" for="form-field-select-11">Non compoundable offence</label>
                <select oninput="this.className = ''" class="form-control @error('non_compoundable_offence') is-invalid @enderror" value="{{ old('non_compoundable_offence') }}"
                    name="non_compoundable_offence"
                    class="ace-select text-dark-m1 bgc-default-l5 bgc-h-warning-l3 brc-default-m3 brc-h-warning-m1"
                    id="form-field-select-11">
                    <option value='Good'>Yes</option>
                    <option value='Bad'>No</option>
                </select>
                @error('non_compoundable_offence')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

        </div>

        <div class="form-row">
            <div class="form-group col-md-6">
                <label class="required" for="inputCity">Nature of crime</label>
                <input oninput="this.className = ''" onkeyup="this.value=this.value.replace(/[^A-Za-z\s]/g,'');"
                    class="form-control @error('nature_of_crime') is-invalid @enderror"
                    value="{{ old('nature_of_crime') }}" type="text" name="nature_of_crime"
                    placeholder="Enter nature of crime" class="form-control" id="inputCity">
                @error('nature_of_crime')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="form-group col-md-6">
                <label class="required" for="form-field-select-11">Section</label>
                <select oninput="this.className = ''" class="form-control @error('section_id') is-invalid @enderror"
                    value="{{ old('section_id') }}" name="section_id"
                    class="ace-select text-dark-m1 bgc-default-l5 bgc-h-warning-l3 brc-default-m3 brc-h-warning-m1"
                    id="form-field-select-11">
                    @foreach ($sections as $section)
                        <option value='{{ $section->id }}'>{{ $section->undersection }}</option>
                    @endforeach
                </select>
                @error('section_id')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
        <div class="form-row">

            <div class="form-group col-md-12">
                <h3 class="text-primary-d2 text-140 mb-3">
                    Mitigating Circumstances
                </h3>
                <div class="card bcard border-1 brc-dark-l1">
                    <div class="card-body p-0">
                        
                        <textarea  onchange="this.className = ''" onkeyup="this.value=this.value.replace(/[^A-Za-z0-9\s]/g,'');"
                            class="form-control @error('warrent_information') is-invalid @enderror"
                            name="mitigating_circumstances" required>{{ old('mitigating_circumstances') }}</textarea>
                      
                        @error('mitigating_circumstances')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror

                    </div>
                </div>
            </div>
        </div>

        <div class="form-row">

            <div class="form-group col-md-12">
                <h3 class="text-primary-d2 text-140 mb-3">
                    Petiion History
                </h3>
                <div class="card bcard border-1 brc-dark-l1">
                    <div class="card-body p-0">
                        
                        <textarea  onchange="this.className = ''" onkeyup="this.value=this.value.replace(/[^A-Za-z0-9\s]/g,'');"
                            class="form-control @error('warrent_information') is-invalid @enderror"
                            name="petition_history" required>{{ old('petition_history') }}</textarea>
                      
                        @error('petition_history')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror

                    </div>
                </div>
            </div>
        </div>

      

        </div>

        
        <div class="tab">
            <h4>Attachment File:</h4>
           
          
          <div class="form-row" style="margin:5px;">

            <div class="form-group col-md-6">
                <label class="required" for="inputCity">  Application </label>
                <input oninput="this.className = ''" accept=".pdf,.png,.jpeg,.jpg"
                    class="form-control @error('application_image') is-invalid @enderror"
                    value="{{ old('application_image') }}" type="file" name="application_image"
                    class="ace-file-input" id="ace-file-input1" required>

            </div>
            @error('health_paper')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
            <div class="form-group col-md-6">

                <label class="required" for="inputState"> Attach Health Report </label>
                <input oninput="this.className = ''" accept=".pdf,.png,.jpeg,.jpg"
                    class="form-control @error('health_paper') is-invalid @enderror"
                    value="{{ old('health_paper') }}" type="file" name="health_paper" class="ace-file-input"
                    id="ace-file-input22" required>

            </div>

        </div>
        @error('prisoner_image')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
        <div class="form-row" style="margin:5px;">


            <div class="form-group col-md-6">
                <label class="required" for="inputCity"> Attach Prisoner Image</label>
                <input oninput="this.className = ''" type="file" accept=".png,.jpeg,.jpg" value="{{ old('prisoner_image') }}"
                    name="prisoner_image"
                    class="ace-file-input form-control @error('prisoner_image') is-invalid @enderror"
                    id="ace-file-input12" required>


            </div>

            @error('warrent_file')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
            <div class="form-group col-md-6">

                <label class="required"  for="inputState"> Attach Warrant File </label>
                <input oninput="this.className = ''" type="file" accept=".pdf,.png,.jpeg,.jpg" value="{{ old('warrent_file') }}"
                    name="warrent_file"
                    class="ace-file-input form-control @error('warrent_file') is-invalid @enderror"
                    id="ace-file-input13" required>

            </div>
        </div>
            {{-- here --}}
            <div class="form-row" style="margin:5px;">
            <div class="form-group col-md-6">
                <label class="required" for="inputCity"> Attach  Application in urdu</label>
                <input oninput="this.className = ''" type="file" accept=".pdf,.png,.jpeg,.jpg" value="{{ old('application_in_urdu_file') }}"
                    name="application_in_urdu_file"
                    class="ace-file-input form-control @error('application_in_urdu_file') is-invalid @enderror"
                    id="ace-file-input27" required>


            </div>


            <div class="form-group col-md-6">

                <label class="required"  for="inputState"> Attach Judgments File </label>
                <input oninput="this.className = ''" type="file" accept=".pdf,.png,.jpeg,.jpg" value="{{ old('judgments_file') }}"
                    name="judgments_file"
                    class="ace-file-input form-control @error('judgments_file') is-invalid @enderror"
                    id="ace-file-input14" required>

            </div>
        </div>
        <div class="form-row" style="margin:5px;">
            <div class="form-group col-md-6">
                <label class="required" for="inputCity"> Attach Petition Certificate</label>
                <input oninput="this.className = ''" type="file" accept=".pdf,.png,.jpeg,.jpg" value="{{ old('petition_certificate') }}"
                    name="petition_certificate"
                    class="ace-file-input form-control @error('petition_certificate') is-invalid @enderror"
                    id="ace-file-input26" required>


            </div>


            <div class="form-group col-md-6">

                <label class="required"  for="inputState"> Attach Mercy Petition Roll File </label>
                <input oninput="this.className = ''" type="file" accept=".pdf,.png,.jpeg,.jpg" value="{{ old('petition_roll_file') }}"
                    name="petition_roll_file"
                    class="ace-file-input form-control @error('petition_roll_file') is-invalid @enderror"
                    id="ace-file-input25" required>

            </div>
        </div>
            <div class="form-row" style="margin:5px;">
            <div class="form-group col-md-6">
                <label class="required" for="inputCity"> Attach Check List</label>
                <input oninput="this.className = ''" type="file" accept=".pdf,.png,.jpeg,.jpg" value="{{ old('check_list_file') }}"
                    name="check_list_file"
                    class="ace-file-input form-control @error('check_list_file') is-invalid @enderror"
                    id="ace-file-input24" required>


            </div>


            <div class="form-group col-md-6">

                <label class="required"  for="inputState"> Attach Convection Summary </label>
                <input oninput="this.className = ''" type="file" accept=".pdf,.png,.jpeg,.jpg" value="{{ old('convection_summary') }}"
                    name="convection_summary"
                    class="ace-file-input form-control @error('convection_summary') is-invalid @enderror"
                    id="ace-file-input23" required>

            </div>
        </div>
        </div>
        
        <div style="overflow:auto;">
          <div style="float:right;">
            <button type="button" id="prevBtn" onclick="nextPrev(-1)">Previous</button>
            <button type="button" id="nextBtn" onclick="nextPrev(1)">Next</button>
          </div>
        </div>
        
        <!-- Circles which indicates the steps of the form: -->
        <div style="text-align:center;margin-top:40px;">
          <span class="step"></span>
          <span class="step"></span>
          <span class="step"></span>
          <span class="step"></span>
        </div>
        
        </form>
    </div>
</div>
           <!-- this footer is shown in device width above `sm` -->



     <!-- include common vendor scripts used in demo pages -->
     {{-- <script src="{{ asset('assets\npm\jquery@3.5.1\dist\jquery.min.js')}}"></script> --}}



     <!-- include vendor scripts used in "Wizard & Validation" page. see "application/views/default/pages/partials/form-wizard/@vendor-scripts.hbs" -->




     <!-- include ace.js -->
     {{-- <script src="{{ asset('assets/js/ace.min.js') }}"></script>
     <script src="{{ asset('assets/js/demo.min.js') }}"></script> --}}



     <!-- "Wizard & Validation" page script to enable its demo functionality -->

     @endsection

