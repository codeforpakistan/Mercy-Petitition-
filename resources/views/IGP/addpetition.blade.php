@extends('layouts.portal', [
'menu' => 'IGP',
'sub_menu' => 'Petition'
])
@section('module', 'IGP Management')
@section('element', 'Add Petition')

@section('content')









     <!-- include vendor stylesheets used in "Wizard & Validation" page. see "application/views/default/pages/partials/form-wizard/@vendor-stylesheets.hbs" -->



     <!-- include fonts -->


     <!-- "Wizard & Validation" page styles, specific to this page for demo only -->




           <div role="main" class="page-content container container-plus">
             <div class="row mt-4">
               <div class="col-12">
                 <div class="card bcard">
                   <div class="card-header">
                     <div class="card-toolbar mr-auto no-border">
                       <label class="mb-0">
                         <span class="align-middle d-block d-sm-inline text-600">
                         Add petition
                     </span>
                         <input type="checkbox" hidden id="id-validate" class="input-lg text-secondary-l1 bgc-purple-d1 ml-2 ace-switch ace-switch-onoff align-middle">
                       </label>
                     </div>

                     <div class="card-toolbar pl-3">
                       <!-- buttons used to control/navigate the wizard -->
                       <button id="wizard-1-prev" type="button" class="mx-2px btn btn-outline-default btn-h-outline-primary btn-bgc-white btn-a-primary border-2 radius-1" disabled="">
                         <i class="fa fa-chevron-left"></i>
                       </button>

                       <button id="wizard-1-next" type="button" class="mx-2px btn btn-outline-default btn-h-outline-primary btn-bgc-white btn-a-primary border-2 radius-1">
                         <i class="fa fa-chevron-right"></i>
                       </button>

                       <button id="wizard-1-finish" type="button" class="d-none mx-2px px-3 btn btn-outline-success btn-h-outline-success btn-bgc-white border-2 radius-1">
                         <i class="fa fa-arrow-right"></i>
                       </button>
                     </div>
                   </div>


                   <div class="card-body">

                     <div id="smartwizard-1" class="d-none mx-n3 mx-sm-auto">
                       <ul class="mx-auto">
                         <li class="wizard-progressbar"></li><!-- the progress line connecting wizard steps -->

                         <li>
                           <a href="#step-1">
                             <span class="step-title">
                                 1
                             </span>

                             <span class="step-title-done">
                                 <i class="fa fa-check text-success"></i>
                             </span>
                           </a>

                           <span class="step-description">
                            CASE FILE PARTICULARS
                         </span>
                         </li>


                         <li>
                           <a href="#step-2">
                             <span class="step-title">
                                 2
                             </span>

                             <span class="step-title-done">
                                 <i class="fa fa-check text-success"></i>
                             </span>
                           </a>

                           <span class="step-description">
                            PARTICULARS OF PRISONER
                         </span>
                         </li>


                         <li>
                           <a href="#step-3">
                             <span class="step-title">
                                 3
                             </span>

                             <span class="step-title-done">
                                 <i class="fa fa-check text-success"></i>
                             </span>
                           </a>

                           <span class="step-description">
                            PARTICULAR OF CRIME
                         </span>
                         </li>


                         <li>
                           <a href="#step-4">
                             <span class="step-title">
                                 4
                             </span>

                             <span class="step-title-done">
                                 <i class="fa fa-check text-success"></i>
                             </span>
                           </a>

                           <span class="step-description">
                             Attachments
                         </span>
                         </li>
                       </ul>

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




                       <div class="px-2 py-2 mb-4">
                         <div id="step-1">
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
                        <input type="text" onkeyup="this.value=this.value.replace(/[^A-Za-z\s]/g,'');"
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

















                           </form>

                           <!-- if "Input Validation" is selected, we should validate this form before going to next step -->
                           <form id="validation-form" class="d-none mt-4 text-dark-m1">
                             <h4 class="text-primary mb-4 ml-md-4">
                               Enter the following information
                             </h4>

                             <div class="form-group row mt-2">
                               <div class="col-sm-3 col-form-label text-sm-right pr-0">
                                 Email Address:
                               </div>

                               <div class="col-sm-9 pr-0 pr-sm-3">
                                 <input required="" type="email" name="email" class="form-control col-11 col-sm-8 col-md-6" placeholder="">
                               </div>
                             </div>


                             <div class="form-group row">
                               <div class="col-sm-3 col-form-label text-sm-right pr-0">
                                 Password:
                               </div>

                               <div class="col-sm-9 pr-0 pr-sm-3">
                                 <input required="" type="password" id="password" name="password" class="form-control col-11 col-sm-6 col-md-4" placeholder="">
                               </div>
                             </div>


                             <div class="form-group row">
                               <div class="col-sm-3 col-form-label text-sm-right pr-0">
                                 Confirm Password:
                               </div>

                               <div class="col-sm-9 pr-0 pr-sm-3">
                                 <input required="" type="password" name="password2" class="form-control col-11 col-sm-6 col-md-4" placeholder="">
                               </div>
                             </div>


                             <hr>


                             <div class="form-group row">
                               <div class="col-sm-3 col-form-label text-sm-right pr-0">
                                 Company Name:
                               </div>

                               <div class="col-sm-9 pr-0 pr-sm-3">
                                 <input type="text" name="company" class="form-control col-11 col-sm-8 col-md-5" placeholder="Optional ...">
                               </div>
                             </div>


                             <div class="form-group row">
                               <div class="col-sm-3 col-form-label text-sm-right pr-0">
                                 Phone Number:
                               </div>

                               <div class="col-sm-9 pr-0 pr-sm-3">
                                 <input required="" type="text" name="phone" class="form-control col-11 col-sm-8 col-md-3" id="phone" placeholder="">
                               </div>
                             </div>


                             <div class="form-group row">
                               <div class="col-sm-3 col-form-label text-sm-right pr-0">
                                 Company URL:
                               </div>

                               <div class="col-sm-9 pr-0 pr-sm-3">
                                 <input required="" type="url" name="url" class="form-control col-11 col-sm-8 col-md-8" id="url" placeholder="">
                               </div>
                             </div>


                             <hr>


                             <div class="form-group row">
                               <div class="col-sm-3 col-form-label text-sm-right pr-0">
                                 Subscribe to:
                               </div>

                               <div class="col-sm-9 pr-0 pr-sm-3 pt-1">
                                 <div>
                                   <label>
                                     <input type="checkbox" id="id-check-1" name="subscription" value="1" class="mr-1 align-sub">
                                     Latest news and announcements
                                   </label>
                                 </div>

                                 <div>
                                   <label>
                                     <input type="checkbox" id="id-check-2" name="subscription" value="2" class="mr-1 align-sub">
                                     Product offers and discounts
                                   </label>
                                 </div>
                               </div>
                             </div>


                             <div class="form-group row">
                               <div class="col-sm-3 col-form-label text-sm-right pr-0">
                                 Gender:
                               </div>

                               <div class="col-sm-9 pr-0 pr-sm-3 pt-1">
                                 <div>
                                   <label>
                                     <input type="radio" id="id-radio-2" name="gender" value="1" class="mr-1 align-sub">
                                     Male
                                   </label>
                                 </div>

                                 <div>
                                   <label>
                                     <input type="radio" id="id-radio-3" name="gender" value="2" class="mr-1 align-sub">
                                     Female
                                   </label>
                                 </div>
                               </div>
                             </div>


                             <hr>


                             <div class="form-group row">
                               <div class="col-sm-3 col-form-label text-sm-right pr-0">
                                 Platform:
                               </div>

                               <div class="col-sm-9 pr-0 pr-sm-3">
                                 <select class="form-control col-11 col-sm-4" id="platform" name="platform" data-placeholder="Click to Choose...">
                                   <option value="">&nbsp;</option>
                                   <option value="linux">Linux</option>
                                   <option value="windows">Windows</option>
                                   <option value="mac">Mac OS</option>
                                   <option value="ios">iOS</option>
                                   <option value="android">Android</option>
                                 </select>
                               </div>
                             </div>


                             <div class="form-group row">
                               <div class="col-sm-3 col-form-label text-sm-right pr-0">
                                 Comment:
                               </div>

                               <div class="col-sm-9 pr-0 pr-sm-3">
                                 <textarea class="form-control col-11 col-sm-12 col-md-6" name="comment" id="comment"></textarea>
                               </div>
                             </div>


                             <div class="form-group row mt-4">
                               <div class="col-sm-9 pr-0 pr-sm-3 pt-1 offset-sm-3">
                                 <label>
                                   <input required="" type="checkbox" class="border-2 brc-success-m1 brc-on-checked input-lg text-dark-tp3 mr-1" id="id-check-terms" name="agree">
                                   I agree to the terms of use
                                 </label>
                               </div>
                             </div>
                           </form>
                         </div>


                         <div id="step-2">
                           <div class="row">
                             <div class="col-12 col-xl-10 offset-xl-1">





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
                                            <input type="text" onkeyup="this.value=this.value.replace(/[^A-Za-z\s]/g,'');"
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
                                                class="form-control @error('f_name') is-invalid @enderror" value="{{ old('f_name') }}"
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
                                            <label class="required" for="inputState">Mental Health</label>
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
                                            <label class="required" for="inputState">Physical Health</label>
                                            <input
                                                class="form-control @error('firdate') is-invalid @enderror" value="{{ old('physicalhealth') }}"
                                                type="text" name="physicalhealth" class="form-control" id="inputCity">
                                            @error('physicalhealth')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label class="required" for="form-field-select-11">Pisoner Conduct</label>
                                            <select class="form-control @error('gender') is-invalid @enderror" value="{{ old('physicalhealth') }}"
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






                             </div>
                           </div>
                         </div>


                         <div id="step-3" >


                           <form autocomplete="off" data-toggle="buttons">


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
                                <div class="form-group col-md-6">
                                    <label class="required" for="inputCity">Mitigating Circumstances</label>
                                    <input onkeyup="this.value=this.value.replace(/[^A-Za-z\s]/g,'');"
                                        class="form-control @error('sentence_in_court') is-invalid @enderror"
                                        value="{{ old('sentence_in_court') }}" type="text" name="mitigating_circumstances"
                                        placeholder="Enter mitigating circumstances" class="form-control" id="inputCity">
                                    @error('mitigating_circumstances')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="form-group col-md-6">
                                    <label class="required" for="inputCity">Petition History</label>
                                    <input onkeyup="this.value=this.value.replace(/[^A-Za-z\s]/g,'');"
                                        class="form-control @error('sentence_in_court') is-invalid @enderror"
                                        value="{{ old('sentence_in_court') }}" type="text" name="petition_history"
                                        placeholder="Enter  Petition history" class="form-control" id="petition_history">
                                    @error('petition_history')
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









                           </form>
                         </div>


                         <div id="step-4" class="text-center">

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
            </div>
                         </div>
                       </div>
                     </div><!-- /#smartwizard-1 -->

                   </div><!-- /.card-body -->
                 </div><!-- .card -->

               </div>
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

