@extends('layouts.portal', [
'menu' => 'Remarksfromhrd',
])
@section('module', 'InteriorMinitry Management')
@section('element', 'Remarksfromhrd')

@section('content')
    @if (!$InteriorMinistryDepartments->isEmpty())


            @if (Session::has('message'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>{{ Session::get('message') }}!</strong> .
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif
            <style>
                /* .b-container1 {
            background-image: linear-gradient(#b33232, #304d86);
            background-attachment: fixed;
            opacity: 16px;
            background-repeat: no-repeat;
        } */
                /* hr.rounded {
            border-top: 8px solid #bbb;
            border-radius: 5px;
        } */
                .center {
                    margin-left: auto;
                    margin-right: auto;
                }
            </style>
            <div role="main" class="page-content container container-plus">
                <div class="page-header border-0">
                    <h1 class="page-title text-primary-d2 text-140">

                    </h1>
                </div>

                <div class="row">
                    <div class="col-12">
                        <div class="card bcard">
                            <div class="card-body px-1 px-md-3">


                                <div class="d-flex justify-content-between flex-column flex-sm-row mb-3 px-2 px-sm-0">
                                    <h3 class="text-130 pl-1 mb-3 mb-sm-0">

                                    </h3>


                                    <div class="pos-rel ml-sm-auto mr-sm-2 order-last order-sm-0">
                                        <i class="fa fa-search position-lc ml-25 text-primary-m1"></i>
                                        <!-- <form  method="get"  action="{{ route('petitionsearch') }}">
                              <input type="text" class="form-control w-100 pl-45 radius-1 brc-primary-m4"  name="search" placeholder="Search ...">
                              <button  class="btn btn-info btn-bold px-4" type="submit">
                              <i class="fa fa-search position-lc ml-25 text-primary-m1"></i>
                            </button>
                            </form> -->



                                        <div class="pos-rel d-inline-block" style="width: calc(100% - 48px);">
                                            <i class="fa fa-search position-lc ml-25 text-primary-m1"></i>

                                            <form action="{{ route('humaninteriorsearch') }}" method="get">
                                                @csrf
                                                <input type="text" name="search"
                                                    class="form-control w-100 pl-45 brc-primary-m4"
                                                    placeholder="Search ...">
                                        </div>
                                        <button type="submit"
                                            class="ml-2 btn btn-sm btn-outline-primary btn-h-outline-info btn-a-outline-info"
                                            style="margin-left: -6px !important;height: 38px;margin-top: -4px;border-left: 0;padding-right: 15px;"><i
                                                class="fa fa-arrow-right ml-2 f-n-hover"></i></button>
                                        </form>
                                    </div>

                                    <div class="mb-2 mb-sm-0">

                                    </div>
                                </div>

                                @if ($errors->any())
                                    <div class="alert alert-danger">

                                        <ul>

                                            @foreach ($errors->all() as $error)
                                                {{ $error }}
                                            @endforeach
                                        </ul>

                                    </div><br />
                                @endif


                                @if (Session::has('message'))
                                    <p class="alert alert-info">{{ Session::get('message') }}</p>
                                @endif

                                <table id="simple-table"
                                    class="mb-0 table table-borderless table-bordered-x brc-secondary-l3 text-dark-m2 radius-1 overflow-hidden">
                                    <thead class="text-dark-tp3 bgc-grey-l4 text-90 border-b-1 brc-transparent">
                                        <tr>


                                            <th>
                                                Prisoner Name
                                            </th>

                                            <th>
                                                Father Name
                                            </th>

                                            <th class="d-none d-sm-table-cell">
                                                Nationality
                                            </th>

                                            <th class='d-none d-sm-table-cell'>
                                                Confined IN Jail
                                            </th>
                                            <th class='d-none d-sm-table-cell'>
                                                Status
                                            </th>
                                            <th class='d-none d-sm-table-cell'>
                                                File Location
                                            </th>
                                            <th class='d-none d-sm-table-cell'>
                                                Received from department
                                            </th>

                                            <th class="d-none d-sm-table-cell">
                                                Prisoner image
                                            </th>

                                            <th>Show</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    @foreach ($InteriorMinistryDepartments as $petion)
                                        <tbody class="mt-1">
                                            <tr class="bgc-h-yellow-l4 d-style">


                                                <td>
                                                    <a href='#'
                                                        class='text-blue-d1 text-600 text-95'>{{ $petion->name }}</a>
                                                </td>

                                                <td class="text-600 text-orange-d2">
                                                    {{ $petion->f_name }}
                                                </td>

                                                <td class='d-none d-sm-table-cell text-grey-d1'>
                                                    {{ $petion->nationality }}
                                                </td>

                                                <td class='d-none d-sm-table-cell text-grey text-95'>
                                                    {{ $petion->confined_in_jail }}
                                                </td>
                                                <td class='d-none d-sm-table-cell text-grey text-95'>
                                                    {{ $petion->status }}
                                                </td>
                                                <td class='d-none d-sm-table-cell text-grey text-95'>
                                                    {{ $petion->file_in_department }}
                                                </td>
                                                <td class='d-none d-sm-table-cell text-grey text-95'>
                                                    {{ $petion->received_from_department }}
                                                </td>

                                                <td class='d-none d-sm-table-cell'>
                                                    <span class='badge badge-sm bgc-warning-d1 text-white pb-1 px-25'><img
                                                            src="{{ asset('/assets/image/' . $petion->prisoner_image) }}"
                                                            width="50" height="50" alt="pic" /></span>

                                                </td>

                                                <td class='text-center pr-0'>
                                                    <div>
                                                        <a href="javascript:void(0)" data-toggle="modal"
                                                            data-target="#modalFullscreen"
                                                            class="d-style btn btn-outline-info text-90 text-600 border-0 px-2 collapsed"
                                                            data-id="{{ $petion->id }}" id="interiorshow-user"
                                                            title="Show Details">
                                                            <span class="d-none d-md-inline mr-1">
                                                                Details
                                                            </span>
                                                            <i class="fa fa-angle-down toggle-icon opacity-1 text-90"></i>
                                                        </a>







                                                <td>
                                                    <!-- action buttons -->
                                                    <div class='d-none d-lg-flex'>
                                                        <!-- <a href="{{ route('petition-edit', [$petion->id]) }}"
                                                class="mx-2px btn radius-1 border-2 btn-xs btn-brc-tp btn-light-secondary btn-h-lighter-success btn-a-lighter-success">
                                                <i class="fa fa-pencil-alt"></i>
                                            </a> -->

                                            @can('interior-create')

                                                        <a href="{{ route('decision', [$petion->id]) }}"
                                                            class="mx-2px btn radius-1 border-2 btn-xs btn-brc-tp btn-light-secondary btn-h-lighter-success btn-a-lighter-success bg-success text-white">
                                                            Decision/forward <i class="fa fa-forward"></i>
                                                        </a>
   @endcan
                                                    </div>

                                                    <!-- show a dropdown in mobile -->
                                                    <div
                                                        class='dropdown d-inline-block d-lg-none dd-backdrop dd-backdrop-none-lg'>
                                                        <a href='#'
                                                            class='btn btn-default btn-xs py-15 radius-round dropdown-toggle'
                                                            data-toggle="dropdown">
                                                            <i class="fa fa-cog"></i>
                                                        </a>

                                                        <div class="dropdown-menu dd-slide-up dd-slide-none-lg">

                                                            @can('interior-create')

                                                                <a href="{{ route('decision', [$petion->id]) }}"
                                                                    class=" dropdown-item mx-2px btn radius-1 border-2 btn-xs btn-brc-tp btn-light-secondary btn-h-lighter-success btn-a-lighter-success bg-success text-white">
                                                                    Decision <i class="fa fa-forward"></i>
                                                                </a>
                                                                @endcan
                                                            </div>
                                                </td>
                                            </tr>



                                    @endforeach
                                    </tbody>

                                </table>

                            </div>



                            <div class="modal fade modal-fs" id="modalFullscreen" tabindex="-1" role="dialog"
                                aria-labelledby="exampleModalLabel2" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-scrollable" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel2">
                                                Petition view
                                            </h5>

                                            <button type="button" class="close" data-dismiss="modal"
                                                aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>


                                        <div class="modal-body">


                                            <div role="main" class="page-content container container-plus">
                                                <div class="row mt-2 mt-md-4">

                                                    <!-- the left side profile picture and other info -->
                                                    <div class="col-12 col-md-12">
                                                        <div class="card bcard">
                                                            <div class="card-body">
                                                                <div class="row no-print"
                                                                    style="float:right;margin-right:10%;font-size:160%">


                                                                    <i id="btnPrint" data-toggle="tooltip" title="print"
                                                                        type="button"
                                                                        class="mr-1 fa fa-print text-primary text-120 w-2"></i>


                                                                </div>
                                                                <span class="d-none position-tl mt-2 pt-3px">
                                                                    <span
                                                                        class="text-white bgc-blue-d1 ml-2 radius-b-1 py-2 px-2">
                                                                        <i class="fa fa-star"></i>
                                                                    </span>
                                                                </span>


                                                                <div
                                                                    class="d-flex flex-column py-3 px-lg-3 justify-content-center align-items-center">

                                                                    <div id="Prisonerimage" class="pos-rel">

                                                                    </div>

                                                                    <div class="text-center mt-2">
                                                                        <h5  style="color: black;"
                                                                            class="text-130 text-dark-m3">

                                                                        </h5>




                                                                    </div>









                                                                </div><!-- /.d-flex -->
                                                            </div><!-- /.card-body -->
                                                        </div><!-- /.card -->



                                                    </div><!-- .col -->


                                                    <!-- the right side profile tabs -->
                                                    <div class="col-12 col-md-12 mt-3 mt-md-0">
                                                        <div class="card bcard h-100">
                                                            <div class="card-body p-0">
                                                                <div class="sticky-nav">
                                                                    <div
                                                                        class="position-tr w-100 border-t-4 brc-blue-m2 radius-2 d-md-none">
                                                                    </div>

                                                                    <u> <h3 style="text-align: center";>Check list for Prisoner Authorities </h3></u>
                                                                    <br>
                                                                    <h5>The following particulars pertaining to the condemned prisoner has been disclosed as required in the checklist on part of prison Authorities </h5>
                                                                     <br>
                                                                     <u> <h3>Case file particulars</h3></u>
                                                                     <div>
                                                                     <table class="table" width="100%" style="border: none;">

                                                                        <tbody>
                                                                            <tr>

                                                                                <td width="25%">Case Fir No</td>
                                                                                <td width="75%" id="casefirno"></td>
                                                                            </tr>
                                                                            <tr>

                                                                                <td width="25%">Fir date</td>
                                                                                <td width="75%" class="firdate"></td>
                                                                            </tr>
                                                                            <tr>

                                                                                <td width="25%">Name of Police station</td>
                                                                                <td width="75%" class="policestation"></td>
                                                                            </tr>
                                                                            <tr>

                                                                               <td width="25%">province</td>
                                                                               <td width="75%" id="Province"></td>
                                                                           </tr>
                                                                           <tr>

                                                                               <td width="25%">Age of petitioner</td>
                                                                               <td width="75%" id="age"></td>
                                                                           </tr>
                                                                           <tr>

                                                                               <td width="25%">Nationality</td>
                                                                               <td  width="75%" id="Nationality"></td>
                                                                           </tr>
                                                                           <tr>

                                                                               <td width="25%"><b>Status</b></td>
                                                                               <td width="75%" id="status"></td>
                                                                           </tr>
                                                                            <tr>

                                                                                <td width="25%">Case Title</td>
                                                                                <td width="75%" id="casetitle"></td>
                                                                            </tr>
                                                                            <tr>

                                                                                <td width="25%">Sentencing Court</td>
                                                                                <td width="75%" id="sentence_in_court"></td>
                                                                            </tr>
                                                                            <tr>

                                                                                <td width="25%">Date of Sentence</td>
                                                                                <td width="75%" id="date_of_sentence"></td>

                                                                            </tr>
                                                                            <tr>

                                                                                <td width="25%">Mercy petition number</td>
                                                                                <td width="75%"  id="prisonerid"></td>
                                                                            </tr>
                                                                            <tr>

                                                                                <td width="25%">Date of submission of Mercy Petition</td>
                                                                                <td width="75%" id="Mercypetitiondate"></td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td width="25%">
                                                                            <u> <h3>Particulars of Prisoner</h3></u>
                                                                                </td>
                                                                            </tr>
                                                                            <tr>

                                                                                <td width="25%">Name</td>
                                                                                <td width="75%"  id="firstname"></td>
                                                                            </tr>
                                                                            <tr>

                                                                                <td width="25%"> Father Name</td>
                                                                                <td width="75%" id="Fathername"></td>
                                                                            </tr>
                                                                            <tr>

                                                                                <td width="25%">Cnic</td>
                                                                                <td width="75%"  id="cnic"></td>
                                                                            </tr>
                                                                            <tr>

                                                                                <td width="25%">Date of birth</td>
                                                                                <td width="75%" id="Dob"></td>

                                                                            </tr>
                                                                            <tr>

                                                                                <td width="25%">Gender</td>

                                                                                <td width="75%" id="Gender"></td>
                                                                            </tr>
                                                                            <tr>

                                                                               <td width="25%">Address</td>

                                                                               <td width="75%" id="address"></td>
                                                                           </tr>
                                                                           <tr>

                                                                               <td width="25%">Phone</td>

                                                                               <td width="75%" id="phone"></td>
                                                                           </tr>
                                                                           <tr>

                                                                               <td width="25%">Mark of identification</td>

                                                                               <td width="75%" id="mark_of_identification"></td>
                                                                           </tr>
                                                                           <tr>

                                                                            <td width="25%">Confirmationdate_Highcourt</td>
                                                                            <td><span width="75%"  id="confirmationdatehighcourt"></span></td>
                                                                        </tr>
                                                                        <tr>

                                                                            <td width="25%">Resultappeal_Highcourt</td>
                                                                            <td><span width="75%"  id="resultappealhighcourt"></span></td>
                                                                        </tr>
                                                                        <tr>

                                                                            <td width="25%">Resultappeal_Suppremecourt</td>
                                                                            <td><span width="75%"  id="resultappealsuppremecourt"></span></td>
                                                                        </tr>
                                                                        <tr>

                                                                            <td width="25%">Resultappeal_Federalcourt</td>
                                                                            <td><span width="75%"  id="resultappealfederalcourt"></span></td>
                                                                        </tr>
                                                                        <tr>

                                                                            <td width="25%">Listlegalheir_Agreement</td>
                                                                            <td><span width="75%"  id="listlegalheiragreement"></span></td>
                                                                        </tr>
                                                                        <tr>

                                                                            <td width="25%">Listlegalheir_Victim</td>
                                                                            <td><span width="75%"  id="listlegalheirvictim"></span></td>
                                                                        </tr>

                                                                        <tr>
                                                                           <tr>

                                                                               <td width="25%">Imediate heirs</td>

                                                                               <td width="75%" id="imediate_heirs"></td>
                                                                           </tr>
                                                                            <tr>

                                                                                <td width="25%">Martial Status</td>
                                                                                <td width="75%" id="martialstatus"></td>

                                                                            </tr>
                                                                            <tr>

                                                                                <td width="25%">Caste</td>
                                                                                <td width="75%" id="caste"></td>
                                                                            </tr>
                                                                            <tr>

                                                                                <td width="25%">Religion</td>
                                                                                <td width="75%"  id="religion"></td>
                                                                            </tr>

                                                                            <tr>

                                                                                <td width="25%">Education</td>
                                                                                <td width="75%"  id="education"></td>
                                                                            </tr>
                                                                            <tr>

                                                                                <td width="25%">Occupation</td>
                                                                                <td> <span width="75%" id="occupation"></span></td>
                                                                            </tr>
                                                                            <tr>

                                                                                <td width="25%">Petition History</td>
                                                                                <td><span width="75%"  id="petitionhistory"></span></td>
                                                                            </tr>
                                                                            <tr>

                                                                                <td width="25%">Physical Health</td>
                                                                                <td><span width="75%"  id="physicalhealth"></span></td>
                                                                            </tr>
                                                                            <tr>

                                                                                <td width="25%">Mental Health</td>
                                                                                <td><span width="75%"  id="mentalhealth"></span></td>
                                                                            </tr>

                                                                            <tr>

                                                                                <td width="25%">Prisoner Conduct</td>
                                                                                <td><span width="75%"  id="prisonerconduct"></span></td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td width="25%">
                                                                            <u> <h3>Particulars of Crime </h3></u>
                                                                                </td>
                                                                            </tr>
                                                                            <tr>

                                                                                <td width="25%">Date of Fir</td>
                                                                                <td><span width="75%" class="firdate"></span></td>
                                                                            </tr>
                                                                            <tr>

                                                                                <td width="25%">Name of Police station</td>
                                                                                <td><span width="75%" class="policestation"></span></td>
                                                                            </tr>
                                                                            <tr>

                                                                                <td width="25%">compoundable_offence</td>
                                                                                <td><span width="75%"  id="compoundableoffence"></span></td>
                                                                            </tr>
                                                                            <tr>

                                                                                <td width="25%">Non Compoundable offense</td>
                                                                                <td><span width="75%"  id="noncompoundableoffence"></span></td>
                                                                            </tr>
                                                                            <tr>

                                                                                <td width="25%">Nature of crime</td>
                                                                                <td><span width="75%" id="natureofcrime"></span></td>
                                                                            </tr>
                                                                            <tr>

                                                                                <td width="25%">Mitigating factors</td>
                                                                                <td><span width="75%"  id="mitigatingcircumstances"></span></td>
                                                                            </tr>
                                                                            <tr>

                                                                                <td width="25%">Confined in jail</td>
                                                                                <td><span width="75%"  id="Confined_in_jail"></span></td>
                                                                            </tr>
                                                                            {{-- <tr>

                                                                                <td width="25%">Confined in jail</td>
                                                                                <td>{{$petion->mitigating_circumstances}}</td>
                                                                            </tr> --}}
                                                                            <tr>
                                                                                <td width="25%">
                                                                            <u> <h3>Attachments</h3></u>
                                                                                </td>
                                                                            </tr>
                                                                            <tr>

                                                                                <td width="33%">Warrent File Attachment</td>
                                                                                <td><span id="warrent_file"></span>
                                                                                    <span id="warrent_files"></span>
                                                                                </td>


                                                                                <td width="33%">Health paper</td>
                                                                                <td><span id="health_paper"></span>
                                                                                    <span id="health_papers"></span></td>


                                                                                <td width="33%">Application image</td>
                                                                                <td><span id="application_image"></span>
                                                                                    <span id="application_images"></span></td>
                                                                            </tr>


                                                                            <tr>

                                                                                <td width="33%">Application urdu Attachment</td>
                                                                                <td><span id="application_in_urdu_file"></span>
                                                                                <span id="application_in_urdu_files"></span></td>


                                                                                <td width="33%">Judgement file document</td>
                                                                                <td><span id="judgments_file"></span>
                                                                                    <span id="judgments_files"></span></td>


                                                                                <td width="33%">Conviction Summary</td>
                                                                                <td><span id="convection_summary"></span>
                                                                                    <span id="convection_summarys"></span></td>
                                                                            </tr>
                                                                            <tr>

                                                                                <td width="33%">check file list</td>
                                                                                <td><span id="check_list_file"></span>
                                                                                    <span id="check_list_files"></span></td>


                                                                                <td width="33%">Petition roll file</td>
                                                                                <td><span id="petition_roll_file"></span>
                                                                                    <span id="petition_roll_files"></span></td>


                                                                                <td width="33%">petition Certificate</td>
                                                                                <td><span id="petition_certificate "></span>
                                                                                    <span id="petition_certificates"></span></td>
                                                                            </tr>

                                                                            <tr>

                                                                                <td width="33%">Jail-Supt Remarks</td>
                                                                                <td><span id="Remarks"></td>

                                                                            </tr>
                                                                            <tr>

                                                                                <td width="33%">Other Documents</td>
                                                                                <td><span id="pic"></td>
                                                                                <td></span>
                                                                                    <span id="picss"></span></td>
                                                                            </tr>
                                                                            <tr class="homeDoc">



                                                                               <td class="homefile"width="33%">Home Department</td>
                                                                               <td class="homefile"><span id="homepic"></span></td>
                                                                               <td class="homefile" width="33%">
                                                                                   <span id="homefilepdf"></span></td>
                                                                            </tr>
                                                                            <tr class="homeremarks homeDoc">
                                                                                   <td width="33%">Home Remarks</td>
                                                                               <td ><span id="homeremarks"></td>
                                                                           </tr>

                                                                           <tr class="interiorDoc">



                                                                               <td class="interiorfile" width="33%">InteriorMinistry </td>
                                                                               <td class="interiorfile"><span id="interiorpic"></span></td>
                                                                               <td class="interiorfile" width="33%">
                                                                                   <span id="interiorfilepdf"></span></td>
                                                                           </tr>
                                                                                   <tr class="interiorremarks interiorDoc">

                                                                                   <td  width="33%">InteriorMinistry Remarks</td>
                                                                               <td ><span id="interiorremarks"></span></td>
                                                                               </tr>

                                                                           <tr class="humanDoc">



                                                                               <td class="humanfile"width="33%">HumanrightsMinistry </td>
                                                                               <td class="humanfile"><span id="humanrightpic"></span></td>

                                                                               <td class="humanfile" width="33%">
                                                                                   <span  id="humanrightfilepdf"></span></td>
                                                                           </tr>
                                                                               <tr class="humanremarks humanDoc">

                                                                                   <td  width="33%">HumanrightsMinistry Remarks</td>
                                                                               <td  ><span id="humanrightremarks"></span></td>
                                                                               </tr>


                                                                        </tbody>
                                                                     </table>
                                                                                         </div>
                                                                                        </div>
                                                                            </div>
                                                                        </div>
                                                                        <div id="btnhide1" class=" col-12 px-8 mt-5">
                                                                            <div class="form-row text-center">
                                                                                <div class="form-group col-md-6">
                                                                                    @can('interior-create')
                                                                                    <span id="interiorforward"></span>
                                                                                   @endcan

                                                                                    {{-- <a href="{{ route('interior-forward', [$petion->id]) }}"
                                                                                        class="  mx-2px btn radius-1 border-2 btn-xs btn-brc-tp btn-light-secondary btn-h-lighter-success btn-a-lighter-success bg-success text-white">
                                                                                        Forward <i
                                                                                            class="fa fa-forward"></i>
                                                                                    </a> --}}
                                                                                </div>
                                                                                <div class="form-group col-md-6">
                                                                                    <a href="{{ route('InteriorMinstry.index') }}"
                                                                                        class="  mx-2px btn radius-1 border-2 btn-xs btn-brc-tp btn-light-secondary btn-h-lighter-success btn-a-lighter-success bg-primary text-white">
                                                                                        Back <i
                                                                                            class="fa fa-arrow-left"></i>
                                                                                    </a>
                                                                                </div>

                                                                            </div>
                                                                        </div>
                                                                    </div>




                                                                    <!-- activity tab -->






                                                                    <!-- activity tab -->






                                                                </div><!-- /.row -->

                                                            </div>

                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>

                                </div>
                            </div>








                        </div>


                    </div><!-- /.card-body -->
                </div><!-- /.card -->
            </div><!-- /.col -->
            </div><!-- /.row -->
            </div><!-- /.row -->
        @else
            <h4 style="background-color:#800000; text-align:center;color:#fff">No Record Found</h4>
        @endif
    @endsection
