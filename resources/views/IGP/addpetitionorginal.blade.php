@extends('layouts.portal', [
'menu' => 'IGP',
'sub_menu' => 'Petition'
])
@section('module', 'IGP Management')
@section('element', 'Add Petition')

@section('content')

<style>
    .required:after {
      content:" *";
      color: red;
    }
  </style>

    <div role="main" class="page-content container container-plus">

        <div class="card bcard mt-2 mt-lg-3">
            <div class="card-header">
                <h3 class="card-title text-125">
                    <i class="far fa-edit text-dark-l3 mr-1"></i>
                    Add New Petion

                </h3>
            </div>

             @if ($errors->any())
            <div class="alert alert-danger">

                <ul>

                    @foreach ($errors->all() as $error)
                    {{ $error }}<br />
                    @endforeach
                </ul>

            </div><br />
            @endif
            <?php date_default_timezone_set("Asia/Karachi");?>
            <form style=" margin-left:12px; margin-right:12px;padding-top:12px" action="{{ route('storepetition') }}"
                method="post" enctype="multipart/form-data">
                @csrf

                <div class="form-row">
                    <u><h3>CASE FILE PARTICULARS</h3></u>
                </div>
                {{-- <div class="form-row">
                    <div class="form-group col-md-12">
                        <label for="inputEmail4">Prisoner ID</label>
                        <input type="text"
                            class="form-control"  name="prisonerid" value="{{ date('Ymdhis')}}" id="inputEmail4" placeholder="Enter Name" readonly>


                    </div>

                </div> --}}
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label class="required" for="inputEmail4">Case FIR NO</label>
                        <input type="text" onkeyup="this.value=this.value.replace(/[^-/0-9\s]/g,'');"
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
                        <input onkeyup="this.value=this.value.replace(/[^-/0-9\s]/g,'');"
                            class="form-control @error('firdate') is-invalid @enderror" value="{{ old('fir_date') }}"
                            type="date" name="firdate" class="form-control" id="inputCity">
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
                        <input type="text" onkeyup="this.value=this.value.replace(/[^A-Za-z\s]/g,'');"
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
                        <input type="text" onkeyup="this.value=this.value.replace(/[^A-Za-z\s]/g,'');"
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
                        <input onkeyup="this.value=this.value.replace(/[^A-Za-z\s]/g,'');"
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
                        <input class="form-control @error('date_of_sentence') is-invalid @enderror"
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
                    <input type="text"
                        class="form-control"  name="prisonerid" value="{{ date('Ymdhis')}}" id="inputEmail4" placeholder="Enter Name" readonly>


                </div>



                    <div class="form-group col-md-6">
                        <label class="required" for="inputState">Mercy petition Date</label>

                        <input class="form-control @error('mercypetitiondate') is-invalid @enderror"
                            value="{{ old('mercypetitiondate') }}" type="Date" name="mercypetitiondate"
                            class="form-control" placeholder=" Pick Mercy petition Date">
                        @error('mercypetitiondate')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                </div>


                <div class="form-row">
                <u><h3>PARTICULARS OF PRISONER</h3></u>
                </div>



                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label class="required" for="inputEmail4">Prisoner Name</label>
                        <input type="text" onkeyup="this.value=this.value.replace(/[^A-Za-z\s]/g,'');"
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
                        <input onkeyup="this.value=this.value.replace(/[^A-Za-z\s]/g,'');" type="text"
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
                        <input type="text" onkeyup="this.value=this.value.replace(/[^-/0-9\s]/g,'');"
                            class="form-control @error('name') is-invalid @enderror" value="{{ old('cnic') }}" name="cnic"
                            class="form-control" id="inputEmail4" placeholder="Enter Name">
                        @error('cnic')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group col-md-6">
                        <label class="required" for="inputPassword4">Age of Petitoner</label>
                        <input onkeyup="this.value=this.value.replace(/[^A-Za-z\s]/g,'');" type="text"
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
                        <label class="required" for="form-field-select-11">Gender</label>
                        <select class="form-control @error('gender') is-invalid @enderror" value="{{ old('gender') }}"
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
                        <select class="form-control @error('gender') is-invalid @enderror" value="{{ old('martial_status') }}"
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
                        <input type="text" onkeyup="this.value=this.value.replace(/[^A-Za-z\s]/g,'');"
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
                        <select class="form-control @error('gender') is-invalid @enderror" value="{{ old('religion') }}"
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
                        <input type="text" onkeyup="this.value=this.value.replace(/[^A-Za-z\s]/g,'');"
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
                        <input onkeyup="this.value=this.value.replace(/[^A-Za-z\s]/g,'');" type="text"
                            class="form-control @error('f_name') is-invalid @enderror" value="{{ old('occupation') }}"
                            name="occupation" class="form-control" id="inputPassword4" placeholder="Father Name">
                        @error('occupation')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="form-row">

                    <div class="form-group col-md-6">
                        <label class="required" for="inputState">DOB</label>

                        <input type="date" class="form-control @error('f_name') is-invalid @enderror"
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

                        <select class="form-control @error('nationality') is-invalid @enderror"
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
                        <select class="form-control @error('physicalstatus') is-invalid @enderror"
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
                            class="form-control @error('firdate') is-invalid @enderror" value="{{ old('mental_health') }}"
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
                        <label class="required" for="form-field-select-11">Pisoner Conduct</label>
                        <select class="form-control @error('gender') is-invalid @enderror" value="{{ old('gender') }}"
                            name="gender"
                            class="ace-select text-dark-m1 bgc-default-l5 bgc-h-warning-l3 brc-default-m3 brc-h-warning-m1"
                            id="form-field-select-11">
                            <option value='Good'>Good</option>
                            <option value='Bad'>Bad</option>
                        </select>
                        @error('gender')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>


                </div>

                <div class="form-row">
                    <u><h3>PARTICULAR OF CRIME</h3></u>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label class="required" for="form-field-select-11">Compoundable offence</label>
                        <select class="form-control @error('gender') is-invalid @enderror" value="{{ old('compoundableoffence') }}"
                            name="compoundableoffence"
                            class="ace-select text-dark-m1 bgc-default-l5 bgc-h-warning-l3 brc-default-m3 brc-h-warning-m1"
                            id="form-field-select-11">
                            <option value='Yes'>Yes</option>
                            <option value='No'>No</option>
                        </select>
                        @error('gender')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group col-md-6">
                        <label class="required" for="form-field-select-11">Non compoundable offence</label>
                        <select class="form-control @error('gender') is-invalid @enderror" value="{{ old('noncompoundableoffence') }}"
                            name="noncompoundableoffence"
                            class="ace-select text-dark-m1 bgc-default-l5 bgc-h-warning-l3 brc-default-m3 brc-h-warning-m1"
                            id="form-field-select-11">
                            <option value='Good'>Yes</option>
                            <option value='Bad'>No</option>
                        </select>
                        @error('gender')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                </div>

                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label class="required" for="inputCity">Nature of crime</label>
                        <input onkeyup="this.value=this.value.replace(/[^A-Za-z\s]/g,'');"
                            class="form-control @error('sentence_in_court') is-invalid @enderror"
                            value="{{ old('sentence_in_court') }}" type="text" name="sentence_in_court"
                            placeholder="Enter nature of c ourt" class="form-control" id="inputCity">
                        @error('sentence_in_court')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group col-md-6">
                        <label class="required" for="form-field-select-11">Section</label>
                        <select class="form-control @error('section_id') is-invalid @enderror"
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
                            warrant information
                        </h3>
                        <div class="card bcard border-1 brc-dark-l1">
                            <div class="card-body p-0">

                                <textarea onkeyup="this.value=this.value.replace(/[^A-Za-z0-9\s]/g,'');"
                                    class="form-control @error('warrent_information') is-invalid @enderror" id="summernote"
                                    name="warrent_information">{{ old('warrent_information') }}</textarea>
                                @error('warrent_information')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                            </div>
                        </div>
                    </div>
                </div>

                @error('application_image')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                <div class="form-row" style="margin:5px;">

                    <div class="form-group col-md-6">
                        <label class="required" for="inputCity">  Application </label>
                        <input accept=".pdf,.png,.jpeg,.jpg"
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
                        <input accept=".pdf,.png,.jpeg,.jpg"
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
                        <input type="file" accept=".png,.jpeg,.jpg" value="{{ old('prisoner_image') }}"
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
                        <input type="file" accept=".pdf,.png,.jpeg,.jpg" value="{{ old('warrent_file') }}"
                            name="warrent_file"
                            class="ace-file-input form-control @error('warrent_file') is-invalid @enderror"
                            id="ace-file-input13" required>

                    </div>
                    {{-- here --}}
                    <div class="form-group col-md-6">
                        <label class="required" for="inputCity"> Attach  Application in urdu</label>
                        <input type="file" accept=".pdf,.png,.jpeg,.jpg" value="{{ old('application_in_urdu_file') }}"
                            name="application_in_urdu_file"
                            class="ace-file-input form-control @error('application_in_urdu_file') is-invalid @enderror"
                            id="ace-file-input27" required>


                    </div>


                    <div class="form-group col-md-6">

                        <label class="required"  for="inputState"> Attach Judgments File </label>
                        <input type="file" accept=".pdf,.png,.jpeg,.jpg" value="{{ old('judgments_file') }}"
                            name="judgments_file"
                            class="ace-file-input form-control @error('judgments_file') is-invalid @enderror"
                            id="ace-file-input14" required>

                    </div>
                    <div class="form-group col-md-6">
                        <label class="required" for="inputCity"> Attach Petition Certificate</label>
                        <input type="file" accept=".pdf,.png,.jpeg,.jpg" value="{{ old('petition_certificate') }}"
                            name="petition_certificate"
                            class="ace-file-input form-control @error('petition_certificate') is-invalid @enderror"
                            id="ace-file-input26" required>


                    </div>


                    <div class="form-group col-md-6">

                        <label class="required"  for="inputState"> Attach Mercy Petition Roll File </label>
                        <input type="file" accept=".pdf,.png,.jpeg,.jpg" value="{{ old('petition_roll_file') }}"
                            name="petition_roll_file"
                            class="ace-file-input form-control @error('petition_roll_file') is-invalid @enderror"
                            id="ace-file-input25" required>

                    </div>
                    <div class="form-group col-md-6">
                        <label class="required" for="inputCity"> Attach Check List</label>
                        <input type="file" accept=".pdf,.png,.jpeg,.jpg" value="{{ old('check_list_file') }}"
                            name="check_list_file"
                            class="ace-file-input form-control @error('check_list_file') is-invalid @enderror"
                            id="ace-file-input24" required>


                    </div>


                    <div class="form-group col-md-6">

                        <label class="required"  for="inputState"> Attach Convection Summary </label>
                        <input type="file" accept=".pdf,.png,.jpeg,.jpg" value="{{ old('convection_summary') }}"
                            name="convection_summary"
                            class="ace-file-input form-control @error('convection_summary') is-invalid @enderror"
                            id="ace-file-input23" required>

                    </div>

                    <div class=" form-group col-md-12 mt-5 border-t-1 brc-secondary-l2 py-35 mx-n25">
                        <div class=" col-md-12 text-nowrap">
                            <button style="float:right;" class="btn btn-info btn-bold px-4" type="submit">
                                <i class="fa fa-check mr-1"></i>
                                Submit
                            </button>

                            <button style="float:right;" class="btn btn-outline-lightgrey btn-bold ml-2 px-4" type="reset">
                                <i class="fa fa-undo mr-1"></i>
                                Reset
                            </button>
                        </div>
                    </div>
                </div>
        </div>
    </div>




    </form>

    </div><!-- /.card -->
    </div>

@endsection
