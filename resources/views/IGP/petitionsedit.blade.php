@extends('layouts.portal', [
'menu' => 'IGP',
'sub_menu' => 'Petition'
])
@section('module', 'IGP Management')
@section('element', 'Add Petition')

@section('content')
    <div role="main" class="page-content container container-plus">

        <div class="card bcard mt-2 mt-lg-3">
            <div class="card-header">
                <h3 class="card-title text-125">
                    <i class="far fa-edit text-dark-l3 mr-1"></i>
                    Edit Petion
                </h3>
            </div>


            <form style="margin-left:12px; margin-right:12px;padding-top:12px"
                action="{{ route('petition-update', [$petitionsedit->id]) }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="inputEmail4">Name</label>
                        <input onkeyup="this.value=this.value.replace(/[^A-Za-z\s]/g,'');" type="text" name="name"
                            value="{{ $petitionsedit->name }}" class="form-control" id="inputEmail4"
                            placeholder="Enter Name">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="inputPassword4">Father Name</label>
                        <input onkeyup="this.value=this.value.replace(/[^A-Za-z\s]/g,'');" type="text" name="f_name"
                            value="{{ $petitionsedit->f_name }}" class="form-control" id="inputPassword4"
                            placeholder="Father Name">
                    </div>
                </div>
                <div class="form-row">

                    <div class="form-group col-md-6">
                        <label for="form-field-select-11">
                            Nationality
                        </label>

                        <select name="nationality"
                            class="ace-select text-dark-m1 bgc-default-l5 bgc-h-warning-l3 brc-default-m3 brc-h-warning-m1"
                            id="form-field-select-11">

                            <option value="Pakistan"
                                {{ $petitionsedit->nationality == 'Pakistani' ? 'selected' : '' }}>
                                Pakistan</option>
                            <option value="Afghanistan"
                                {{ $petitionsedit->nationality == 'Afghani' ? 'selected' : '' }}>
                                Afghanistan</option>

                        </select>
                    </div>

                    <div class="form-group col-md-6">
                        <label for="form-field-select-11">Physical Status</label>
                        <select
                            class="ace-select text-dark-m1 bgc-default-l5 bgc-h-warning-l3 brc-default-m3 brc-h-warning-m1"
                            name="physicalstatus_id" id="form-field-select-11">
                            @foreach ($physicalstatus as $physical)
                                <option {{ $petitionsedit->physicalstatus_id == $physical->id ? 'selected="selected"' : '' }} value="{{ $physical->id }}" >

                                    {{ $physical->PhysicalStatus }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="inputCity">Sentence in Court</label>
                        <input type="text" name="sentence_in_court" value="{{ $petitionsedit->sentence_in_court }}"
                            placeholder="Enter name of Court" class="form-control" id="inputCity">

                    </div>
                    <div class="form-group col-md-6">
                        <label for="inputState">Fir  Date</label>
                        <input onkeyup="this.value=this.value.replace(/[^-/0-9\s]/g,'');" type="text" name="fir_date"
                            value="{{ $petitionsedit->fir_date }}" class="form-control" id="inputCity">
                    </div>

                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="form-field-select-11">Gender</label>
                        <select name="gender"
                            class="ace-select text-dark-m1 bgc-default-l5 bgc-h-warning-l3 brc-default-m3 brc-h-warning-m1"
                            id="form-field-select-11">
                            <option value='male'>Male</option>
                            <option value='female'>Female</option>
                            <option value='other'>Other</option>
                        </select>
                    </div>
                    <div class="form-group col-md-6 tag-input-style " id="select2-parent">
                        <label for="form-field-select-11">Section</label>
                        <select multiple="" id="state" name="section_id[]" class="select2 form-control " data-placeholder="Click to Choose...">
                            @foreach ($sections as $section)
                            <?php
                            $selected = explode(",", $petitionsedit->section_id);
                          ?>
                           <option value="{{$section->undersection}}" {{ (in_array($section->undersection, $selected)) ? 'selected' : '' }}>{{ $section->undersection}}</option>
                        @endforeach
                          </select>
                    </div>
                </div>
                <div class="form-row">

                    <div class="form-group col-md-6">
                        <label for="inputState">DOB</label>

                        <input type="date" value="{{ $petitionsedit->dob }}" name="dob" class="form-control">
                    </div>
                    <div class="form-group col-md-6">
                    <label class="required" for="inputEmail4">Case FIR NO</label>
                <input type="text" oninput="this.className = ''" onkeyup="this.value=this.value.replace(/[^-/0-9\s]/g,'');"
                    class="form-control @error('name') is-invalid @enderror" value="{{ $petitionsedit->case_fir_no }}" name="case_fir_no"
                    class="form-control" id="inputEmail4" placeholder="Enter Fir no">
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="inputState">Mercy petition Date</label>

                        <input type="Date" name="mercypetitiondate" value="{{ $petitionsedit->mercypetitiondate }}"
                            class="form-control" placeholder=" Pick Mercy petition Date">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="inputCity">Date of sentence</label>
                        <input type="Date" name="date_of_sentence" class="form-control"
                            value="{{ $petitionsedit->date_of_sentence }}" id="inputCity">
                    </div>

                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="inputState">Confirmation Date Highcourt</label>

                        <input type="Date" name="confirmationdatehighcourt" value="{{ $petitionsedit->confirmationdatehighcourt }}"
                            class="form-control" placeholder=" Pick confirmationdatehighcourt">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="inputCity">Result Appeal Highcourt</label>
                        <input type="text" name="resultappealhighcourt" class="form-control"
                            value="{{ $petitionsedit->resultappealhighcourt }}" id="inputCity">
                    </div>

                </div>

                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="inputState">Result Appeal Suppreme Court</label>

                        <input type="text" name="resultappealsuppremecourt" value="{{ $petitionsedit->resultappealsuppremecourt }}"
                            class="form-control" placeholder=" Pick resultappealsuppremecourt">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="inputCity">Result Appeal Federal Court</label>
                        <input type="text" name="resultappealfederalcourt" class="form-control"
                            value="{{ $petitionsedit->resultappealfederalcourt }}" id="inputCity">
                    </div>

                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="inputState">List Legal Heir Agreement</label>

                        <input type="text" name="listlegalheiragreement" value="{{ $petitionsedit->listlegalheiragreement }}"
                            class="form-control" placeholder=" Pick listlegalheiragreement">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="inputCity">List Legal Heir Victim</label>
                        <input type="text" name="listlegalheirvictim" class="form-control"
                            value="{{ $petitionsedit->listlegalheirvictim }}" id="inputCity">
                    </div>

                </div>

                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="inputState"> Name Police Station</label>

                        <input type="text" name="name_of_policestation" value="{{ $petitionsedit->name_of_policestation }}"
                            class="form-control" placeholder="Police station">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="inputCity">Case Title</label>
                        <input type="text" name="case_title" class="form-control"
                            value="{{ $petitionsedit->case_title }}" id="inputCity">
                    </div>

                </div>

                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="inputState">cnic</label>

                        <input type="text" name="cnic" data-inputmask="'mask': '99999-9999999-9'" value="{{ $petitionsedit->cnic }}"
                            class="form-control" placeholder="cnic ">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="inputCity">Age of Petitioner</label>
                        <input type="text" name="age_of_petitioner" class="form-control"
                            value="{{ $petitionsedit->age_of_petitioner }}" id="inputCity">
                    </div>

                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label class="required" for="form-field-select-11">Martial Status</label>
                <select  oninput="this.className = ''" class=" select form-control @error('gender') is-invalid @enderror" value="{{ old('martial_status') }}"
                    name="martial_status"
                    class="ace-select text-dark-m1 bgc-default-l5 bgc-h-warning-l3 brc-default-m3 brc-h-warning-m1"
                    id="form-field-select-11">

                    <option value='Single' {{ $petitionsedit->martial_status == 'Single' ? 'selected' : '' }}>Single</option>
                    <option value='Married'{{ $petitionsedit->martial_status == 'Married' ? 'selected' : '' }}>Married</option>

                </select>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="inputCity">Caste</label>
                        <input type="text" name="caste" class="form-control"
                            value="{{ $petitionsedit->caste }}" id="inputCity">
                    </div>

                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label class="required" for="inputEmail4">Family Phone</label>
                        <input type="text" oninput="this.className = ''"  required=""  value="{{ $petitionsedit->phone }} placeholder="Phone number" data-inputmask="'mask': '9999-9999999'"
                            class="form-control @error('phone') is-invalid @enderror"  name="phone"
                            class="form-control" id="inputEmail4" >
                        @error('phone')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group col-md-6">
                        <label class="required" for="inputPassword4">Family address</label>
                        <input oninput="this.className = ''" onkeyup="this.value=this.value.replace(/[^A0-9Za-z\s]/g,'');" type="text"
                            class="form-control @error('address') is-invalid @enderror"
                            name="address" value="{{ $petitionsedit->address }} class="form-control" id="inputPassword4" placeholder=" Family Address">
                        @error('address')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label class="required" for="inputEmail4">Imediate heirs</label>
                        <input type="text" oninput="this.className = ''"  required="" placeholder="Imediate heirs" maxlength="11" onkeyup="this.value=this.value.replace(/[^A-Za-z\s]/g,'');"
                            class="form-control @error('imediate_heirs') is-invalid @enderror" value="{{ $petitionsedit->imediate_heirs }}" name="imediate_heirs"
                            class="form-control" id="inputEmail4" >
                        @error('imediate_heirs')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group col-md-6">
                        <label class="required" for="inputPassword4">Mark of identification</label>
                        <input oninput="this.className = ''" onkeyup="this.value=this.value.replace(/[^A0-9Za-z\s]/g,'');" type="text"
                            class="form-control @error('mark_of_identification') is-invalid @enderror" value="{{ $petitionsedit->mark_of_identification }}"
                            name="mark_of_identification" class="form-control" id="inputPassword4" placeholder="Mark of identification">
                        @error('mark_of_identification')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label class="required" for="form-field-select-11">Education</label>
                        <input oninput="this.className = ''" type="text" onkeyup="this.value=this.value.replace(/[^A-Za-z\s]/g,'');"
                        class="form-control @error('name') is-invalid @enderror" value="{{ $petitionsedit->education }}" name="education"
                        class="form-control" id="inputEmail4" placeholder="Enter education">
                    </div>
                    <div class="form-group col-md-6">
                        <label class="required" for="form-field-select-11">Religion</label>
                        <select oninput="this.className = ''" class="form-control @error('religion') is-invalid @enderror" value="{{ old('religion') }}"
                            name="religion"
                            class="ace-select text-dark-m1 bgc-default-l5 bgc-h-warning-l3 brc-default-m3 brc-h-warning-m1"
                            id="form-field-select-11">
                            <option value='Muslim'{{ $petitionsedit->religion == 'Muslim' ? 'selected' : '' }}>Muslim</option>
                            <option value='Christian'{{ $petitionsedit->religion == 'Christian' ? 'selected' : '' }}>Christian</option>
                            <option value='Hindu'{{ $petitionsedit->religion == 'Hindu' ? 'selected' : '' }}>Hindu</option>
                            <option value='Other'{{ $petitionsedit->religion == 'Other' ? 'selected' : '' }}>Other</option>

                        </select>
                    </div>

                </div>

                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label class="required" for="inputPassword4">Occupation</label>
                <input oninput="this.className = ''" onkeyup="this.value=this.value.replace(/[^A-Za-z\s]/g,'');" type="text"
                    class="form-control @error('Occupation') is-invalid @enderror" value="{{ $petitionsedit->Occupation }}"
                    name="Occupation" class="form-control" id="inputPassword4" placeholder="Enter Occupation">
                    </div>
                    <div class="form-group col-md-6">
                        <label class="required" for="inputState">Mental Helth</label>
                <input
                oninput="this.className = ''"  onkeyup="this.value=this.value.replace(/[^A-Za-z\s]/g,'');" class="form-control @error('mental_health') is-invalid @enderror" value="{{ $petitionsedit->mental_health  }}"
                    type="text" name="mental_health" class="form-control" id="inputCity">
                    </div>

                </div>

                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label class="required" for="form-field-select-11">Prisoner Conduct</label>
                <input
                oninput="this.className = ''"  onkeyup="this.value=this.value.replace(/[^A-Za-z\s]/g,'');" class="form-control @error('prisoner_conduct') is-invalid @enderror" value="{{$petitionsedit->prisoner_conduct }}"
                    type="text" name="prisoner_conduct" class="form-control" id="inputCity">
                    </div>
                    <div class="form-group col-md-6">
                        <label class="required" for="inputState">Physical Helth</label>
                        <input
                        oninput="this.className = ''"  onkeyup="this.value=this.value.replace(/[^A-Za-z\s]/g,'');" class="form-control @error('physical_health') is-invalid @enderror" value="{{$petitionsedit->physical_health }}"
                            type="text" name="physical_health" class="form-control" id="inputCity">
                    </div>

                </div>
                <h4>PARTICULAR OF CRIME:</h4>

          <div class="form-row">
            <div class="form-group col-md-6">
                <label class="required" for="form-field-select-11">Compoundable offence</label>
                <select oninput="this.className = ''" class="form-control @error('compoundable_offence') is-invalid @enderror" value="{{ old('compoundable_offence') }}"
                    name="compoundable_offence"
                    class="ace-select text-dark-m1 bgc-default-l5 bgc-h-warning-l3 brc-default-m3 brc-h-warning-m1"
                    id="form-field-select-11">
                    <option value='Yes'{{ $petitionsedit->compoundable_offence == 'Yes' ? 'selected' : '' }}>Yes</option>
                    <option value='No'{{ $petitionsedit->compoundable_offence == 'No' ? 'selected' : '' }}>No</option>
                </select>

            </div>
            <div class="form-group col-md-6">
                <label class="required" for="form-field-select-11">Non compoundable offence</label>
                <select oninput="this.className = ''" class="form-control @error('non_compoundable_offence') is-invalid @enderror" value="{{ old('non_compoundable_offence') }}"
                    name="non_compoundable_offence"
                    class="ace-select text-dark-m1 bgc-default-l5 bgc-h-warning-l3 brc-default-m3 brc-h-warning-m1"
                    id="form-field-select-11">
                    <option value='Yes'{{ $petitionsedit->non_compoundable_offence == 'Yes' ? 'selected' : '' }}>Yes</option>
                    <option value='No'{{ $petitionsedit->non_compoundable_offence == 'Noo' ? 'selected' : '' }}>No</option>
                </select>
                @error('non_compoundable_offence')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

        </div>

        <div class="form-row">
            <div class="form-group col-md-12">
                <label class="required" for="inputCity">Nature of crime</label>
                <input oninput="this.className = ''" onkeyup="this.value=this.value.replace(/[^A-Za-z\s]/g,'');"
                    class="form-control @error('nature_of_crime') is-invalid @enderror"
                    value="{{ $petitionsedit->nature_of_crime }}" type="text" name="nature_of_crime"
                    placeholder="Enter nature of crime" class="form-control" id="inputCity">
                @error('nature_of_crime')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>


        <div class="form-row">

            <div class="form-group col-12">
                <h3 class="text-primary-d2 text-140 mb-3">
                    Mitigating Circumstances
                </h3>
                <div class="card bcard border-1 brc-dark-l1">
                    <div class="card-body p-0">

                        <textarea  rows="10" onchange="this.className = ''" onkeyup="this.value=this.value.replace(/[^A-Za-z0-9\s]/g,'');"
                            class="form-control @error('warrent_information') is-invalid @enderror"
                            name="mitigating_circumstances" required>{{ $petitionsedit->mitigating_circumstances }}</textarea>



                    </div>
                </div>
            </div>
        </div>

                <div class="form-row">

                    <div class="form-group col-md-12">
                        <h3 class="text-primary-d2 text-140 mb-3">
                            Petition History
                        </h3>
                        <div class="card bcard border-1 brc-dark-l1">
                            <div class="card-body p-0">
                                {{-- <form method="post"> --}}
                                <textarea id="summernote"
                                    name="petition_history">{{ $petitionsedit->petition_history }}</textarea>
                                {{-- </form> --}}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="inputCity">Application Attachment</label>
                        <?php
                        $applicationimage = $petitionsedit->application_image;
                        $pic = explode('.', $applicationimage);
                        $pic[1];

                        ?>
                        @if ($pic[1] == 'pdf')
                            <a style='height:100px;width:100px;margin-right:15px;' target='_blank' data-lightbox='example-1'
                                href="{{ asset('/assets/image/' . $petitionsedit->application_image) }}"> <img
                                    class='example-image' alt='image-1' style='height:100px;width:100px;margin-right:15px;'
                                    src="{{ asset('/assets/image/pdf.png') }}" width="50" height="50" margin-righ="5%"
                                    alt="pic" /> </a>
                        @else
                            <a target='_blank' data-lightbox='example-1'
                                href="{{ asset('/assets/image/' . $petitionsedit->application_image) }}"> <img
                                    class='example-image' alt='image-1' style='height:100px;width:100px;margin-right:15px;'
                                    src="{{ asset('/assets/image/' . $petitionsedit->application_image) }}" width="50"
                                    height="50" margin-righ="5%" alt="pic" /> </a>
                        @endif
                        <input type="file" name="application_image" accept=".pdf,.png,.jpeg,.jpg" class="ace-file-input" id="ace-file-input1">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="inputState">Health Report Attachment</label>
                        <?php
                        $applicationimage = $petitionsedit->health_paper;
                        $pic = explode('.', $applicationimage);
                        $pic[1];

                        ?>
                        @if ($pic[1] == 'pdf')
                            <a style='height:100px;width:100px;margin-right:15px;' target='_blank' data-lightbox='example-1'
                                href="{{ asset('/assets/image/' . $petitionsedit->health_paper) }}"> <img
                                    class='example-image' alt='image-1' style='height:100px;width:100px;margin-right:15px;'
                                    src="{{ asset('/assets/image/pdf.png') }}" width="50" height="50" margin-righ="5%"
                                    alt="pic" /> </a>
                        @else
                            <a target='_blank' data-lightbox='example-1'
                                href="{{ asset('/assets/image/' . $petitionsedit->health_paper) }}"> <img
                                    class='example-image' alt='image-1' style='height:100px;width:100px;margin-right:15px;'
                                    src="{{ asset('/assets/image/' . $petitionsedit->health_paper) }}" width="50"
                                    height="50" margin-righ="5%" alt="pic" /> </a>
                        @endif

                        <input type="file" name="health_paper" accept=".pdf,.png,.jpeg,.jpg" class="ace-file-input" id="ace-file-input22">
                    </div>

                </div>
                {{-- here --}}
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="inputCity"> Application urdu  Attachment</label>
                        <?php
                        $application_in_urdu_file = $petitionsedit->application_in_urdu_file;
                        $pic = explode('.', $application_in_urdu_file);
                        $pic[1];

                        ?>
                        @if ($pic[1] == 'pdf')
                            <a style='height:100px;width:100px;margin-right:15px;' target='_blank' data-lightbox='example-1'
                                href="{{ asset('/assets/image/' . $petitionsedit->application_in_urdu_file) }}"> <img
                                    class='example-image' alt='image-1' style='height:100px;width:100px;margin-right:15px;'
                                    src="{{ asset('/assets/image/pdf.png') }}" width="50" height="50" margin-righ="5%"
                                    alt="pic" /> </a>
                        @else
                            <a target='_blank' data-lightbox='example-1'
                                href="{{ asset('/assets/image/' . $petitionsedit->application_in_urdu_file) }}"> <img
                                    class='example-image' alt='image-1' style='height:100px;width:100px;margin-right:15px;'
                                    src="{{ asset('/assets/image/' . $petitionsedit->application_in_urdu_file) }}" width="50"
                                    height="50" margin-righ="5%" alt="pic" /> </a>
                        @endif
                        <input type="file" name="application_in_urdu_file" accept=".pdf,.png,.jpeg,.jpg" class="ace-file-input" id="ace-file-input27">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="inputState">Judgments File Attachment</label>
                        <?php
                        $judgments_file = $petitionsedit->judgments_file;
                        $pic = explode('.', $judgments_file);
                        $pic[1];

                        ?>
                        @if ($pic[1] == 'pdf')
                            <a style='height:100px;width:100px;margin-right:15px;' target='_blank' data-lightbox='example-1'
                                href="{{ asset('/assets/image/' . $petitionsedit->judgments_file) }}"> <img
                                    class='example-image' alt='image-1' style='height:100px;width:100px;margin-right:15px;'
                                    src="{{ asset('/assets/image/pdf.png') }}" width="50" height="50" margin-righ="5%"
                                    alt="pic" /> </a>
                        @else
                            <a target='_blank' data-lightbox='example-1'
                                href="{{ asset('/assets/image/' . $petitionsedit->judgments_file) }}"> <img
                                    class='example-image' alt='image-1' style='height:100px;width:100px;margin-right:15px;'
                                    src="{{ asset('/assets/image/' . $petitionsedit->judgments_file) }}" width="50"
                                    height="50" margin-righ="5%" alt="pic" /> </a>
                        @endif

                        <input type="file" name="judgments_file" accept=".pdf,.png,.jpeg,.jpg" class="ace-file-input" id="ace-file-input14">
                    </div>

                </div>
                {{-- /here --}}
                   {{-- here --}}
                   <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="inputCity"> Petition Certificate Attachment</label>
                        <?php
                        $petition_certificate = $petitionsedit->petition_certificate;
                        $pic = explode('.', $petition_certificate);
                        $pic[1];

                        ?>
                        @if ($pic[1] == 'pdf')
                            <a style='height:100px;width:100px;margin-right:15px;' target='_blank' data-lightbox='example-1'
                                href="{{ asset('/assets/image/' . $petitionsedit->petition_certificate) }}"> <img
                                    class='example-image' alt='image-1' style='height:100px;width:100px;margin-right:15px;'
                                    src="{{ asset('/assets/image/pdf.png') }}" width="50" height="50" margin-righ="5%"
                                    alt="pic" /> </a>
                        @else
                            <a target='_blank' data-lightbox='example-1'
                                href="{{ asset('/assets/image/' . $petitionsedit->petition_certificate) }}"> <img
                                    class='example-image' alt='image-1' style='height:100px;width:100px;margin-right:15px;'
                                    src="{{ asset('/assets/image/' . $petitionsedit->petition_certificate) }}" width="50"
                                    height="50" margin-righ="5%" alt="pic" /> </a>
                        @endif
                        <input type="file" name="petition_certificate" accept=".pdf,.png,.jpeg,.jpg" class="ace-file-input" id="ace-file-input26">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="inputState">Petition Roll File Attachment</label>
                        <?php
                        $petition_roll_file = $petitionsedit->petition_roll_file;
                        $pic = explode('.', $petition_roll_file);
                        $pic[1];

                        ?>
                        @if ($pic[1] == 'pdf')
                            <a style='height:100px;width:100px;margin-right:15px;' target='_blank' data-lightbox='example-1'
                                href="{{ asset('/assets/image/' . $petitionsedit->petition_roll_file) }}"> <img
                                    class='example-image' alt='image-1' style='height:100px;width:100px;margin-right:15px;'
                                    src="{{ asset('/assets/image/pdf.png') }}" width="50" height="50" margin-righ="5%"
                                    alt="pic" /> </a>
                        @else
                            <a target='_blank' data-lightbox='example-1'
                                href="{{ asset('/assets/image/' . $petitionsedit->petition_roll_file) }}"> <img
                                    class='example-image' alt='image-1' style='height:100px;width:100px;margin-right:15px;'
                                    src="{{ asset('/assets/image/' . $petitionsedit->petition_roll_file) }}" width="50"
                                    height="50" margin-righ="5%" alt="pic" /> </a>
                        @endif

                        <input type="file" name="petition_roll_file" accept=".pdf,.png,.jpeg,.jpg" class="ace-file-input" id="ace-file-input25">
                    </div>

                </div>
                {{-- /here --}}
                {{-- here --}}
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="inputCity"> Check List FIle Attachment</label>
                        <?php
                        $check_list_file = $petitionsedit->check_list_file;
                        $pic = explode('.', $check_list_file);
                        $pic[1];

                        ?>
                        @if ($pic[1] == 'pdf')
                            <a style='height:100px;width:100px;margin-right:15px;' target='_blank' data-lightbox='example-1'
                                href="{{ asset('/assets/image/' . $petitionsedit->check_list_file) }}"> <img
                                    class='example-image' alt='image-1' style='height:100px;width:100px;margin-right:15px;'
                                    src="{{ asset('/assets/image/pdf.png') }}" width="50" height="50" margin-righ="5%"
                                    alt="pic" /> </a>
                        @else
                            <a target='_blank' data-lightbox='example-1'
                                href="{{ asset('/assets/image/' . $petitionsedit->check_list_file) }}"> <img
                                    class='example-image' alt='image-1' style='height:100px;width:100px;margin-right:15px;'
                                    src="{{ asset('/assets/image/' . $petitionsedit->check_list_file) }}" width="50"
                                    height="50" margin-righ="5%" alt="pic" /> </a>
                        @endif
                        <input type="file" name="check_list_file" accept=".pdf,.png,.jpeg,.jpg" class="ace-file-input" id="ace-file-input24">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="inputState">Convection Summary Attachment</label>
                        <?php
                        $convection_summary = $petitionsedit->convection_summary;
                        $pic = explode('.', $convection_summary);
                        $pic[1];

                        ?>
                        @if ($pic[1] == 'pdf')
                            <a style='height:100px;width:100px;margin-right:15px;' target='_blank' data-lightbox='example-1'
                                href="{{ asset('/assets/image/' . $petitionsedit->convection_summary) }}"> <img
                                    class='example-image' alt='image-1' style='height:100px;width:100px;margin-right:15px;'
                                    src="{{ asset('/assets/image/pdf.png') }}" width="50" height="50" margin-righ="5%"
                                    alt="pic" /> </a>
                        @else
                            <a target='_blank' data-lightbox='example-1'
                                href="{{ asset('/assets/image/' . $petitionsedit->convection_summary) }}"> <img
                                    class='example-image' alt='image-1' style='height:100px;width:100px;margin-right:15px;'
                                    src="{{ asset('/assets/image/' . $petitionsedit->convection_summary) }}" width="50"
                                    height="50" margin-righ="5%" alt="pic" /> </a>
                        @endif

                        <input type="file" name="convection_summary" accept=".pdf,.png,.jpeg,.jpg" class="ace-file-input" id="ace-file-input23">
                    </div>

                </div>
                {{-- /here --}}
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="inputCity">Prisoner Image</label>

                        <a target='_blank' data-lightbox='example-1'
                            href="{{ asset('/assets/image/' . $petitionsedit->prisoner_image) }}"> <img class='example-image'
                                alt='image-1' style='height:100px;width:100px;margin-right:15px;'
                                src="{{ asset('/assets/image/' . $petitionsedit->prisoner_image) }}" width="50" height="50"
                                margin-righ="5%" alt="pic" /> </a>
                        <input type="file" name="prisoner_image" accept =".png,.jpeg,.jpg"  value="{{ $petitionsedit->prisoner_image }}"
                            class="ace-file-input" id="ace-file-input12">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="inputState">Warrent File Attachment</label>
                        <?php
                        $applicationimage = $petitionsedit->warrent_file;
                        $pic = explode('.', $applicationimage);
                        $pic[1];

                        ?>
                        @if ($pic[1] == 'pdf')
                            <a style='height:100px;width:100px;margin-right:15px;' target='_blank' data-lightbox='example-1'
                                href="{{ asset('/assets/image/' . $petitionsedit->warrent_file) }}"> <img
                                    class='example-image' alt='image-1' style='height:100px;width:100px;margin-right:15px;'
                                    src="{{ asset('/assets/image/pdf.png') }}" width="50" height="50" margin-righ="5%"
                                    alt="pic" /> </a>
                        @else
                            <a target='_blank' data-lightbox='example-1'
                                href="{{ asset('/assets/image/' . $petitionsedit->warrent_file) }}"> <img
                                    class='example-image' alt='image-1' style='height:100px;width:100px;margin-right:15px;'
                                    src="{{ asset('/assets/image/' . $petitionsedit->warrent_file) }}" width="50"
                                    height="50" margin-righ="5%" alt="pic" /> </a>
                        @endif

                        <input type="file" name="warrent_file" accept=".pdf,.png,.jpeg,.jpg" value="{{ $petitionsedit->warrent_file }}"
                            class="ace-file-input" id="ace-file-input13">
                    </div>
                    <div class=" form-group col-md-12 mt-5 border-t-1 brc-secondary-l2 py-35 mx-n25">
                        <div class=" col-md-12 text-nowrap">
                            <button style="float:right;" class="btn btn-info btn-bold px-4" type="submit">
                                <i class="fa fa-check mr-1"></i>
                                update
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




    </div>


    </form>

    </div><!-- /.card -->
    </div>

@endsection
