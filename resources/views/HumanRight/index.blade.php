@extends('layouts.portal', [
'menu' => 'HumanRightDepartments',
'sub_menu' => 'HumanRightDepartment'
])
@section('module', 'HumanRightDepartment Management')
@section('element', 'List')

@section('content')

    <style>
        @media screen {
            #printSection {
                display: none;
            }
        }




        @media print {
            body * {
                visibility: hidden;
            }

            #printSection,
            #printSection * {
                visibility: visible;
            }

            #printSection {
                position: absolute;
                left: 0;
                top: 0;
            }
        }

    </style>
    @if (!$HumanRightDepartments->isEmpty())

        @if (Session::has('message'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>{{ Session::get('message') }}!</strong> .
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif

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

                                        <form action="{{ route('hrsearch') }}" method="get">
                                            @csrf
                                            <input type="text" name="search" class="form-control w-100 pl-45 brc-primary-m4"
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




                            <table id="simple-table"
                                class="mb-0 table table-borderless table-bordered-x brc-secondary-l3 text-dark-m2 radius-1 overflow-hidden">
                                <thead class="text-dark-tp3 bgc-grey-l4 text-90 border-b-1 brc-transparent">
                                    <tr>


                                        <th>
                                            Prisoner ID
                                        </th>
                                        <th>
                                            Name
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
                                            Received From Department
                                        </th>

                                        <th class="d-none d-sm-table-cell">
                                            Prisoner image
                                        </th>

                                        <th>Show</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                @foreach ($HumanRightDepartments as $petion)
                                    <tbody class="mt-1">
                                        <tr class="bgc-h-yellow-l4 d-style">


                                            <td>
                                                <a href='#' class='text-blue-d1 text-600 text-95'>{{ $petion->prisonerid }}</a>
                                            </td>
                                            <td>
                                                <a href='#' class='text-blue-d1 text-600 text-95'>{{ $petion->name }}</a>
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
                                                        data-id="{{ $petion->id }}" id="humanrightview-user"
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


                                                    <a href="{{ route('humanright-back', [$petion->id]) }}"
                                                        class="mx-2px btn radius-1 border-2 btn-xs btn-brc-tp btn-light-secondary btn-h-lighter-success btn-a-lighter-success bg-success text-white">
                                                        Decision/forward <i class="fa fa-forward"></i>
                                                    </a>

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
                                                        <div class="dropdown-inner">
                                                            <div
                                                                class="dropdown-header text-100 text-secondary-d1 border-b-1 brc-secondary-l2 text-600 mb-2">
                                                                HumanRightDepartment
                                                            </div>

                                                            <a href="{{ route('humanright-back', [$petion->id]) }}"
                                                                class="mx-2px btn radius-1 border-2 btn-xs btn-brc-tp btn-light-secondary btn-h-lighter-success btn-a-lighter-success bg-success text-white">
                                                                Decision/forward <i class="fa fa-forward"></i>
                                                            </a>
                                                        </div>
                                            </td>
                                        </tr>

                                  


                                    </tbody>
                                @endforeach
                            </table>
                       
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


                                    <div id="printThis" role="main" class="page-content container container-plus">
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

                                                                <span class="text-80 text-primary text-600">
                                                                </span> 


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

                                                            <u> <h3 style="text-align: center";>Check list for Prisoner Authorties</h3></u>
                                                                    <br>
                                                                    <h5>The following particulars pertaining to the condemed prisoner has been disclosed as required in the checklist on part of prison authorties</h5>
                                                                     <br>
                                                                     <u> <h3>Case file particulars</h3></u>
                                                                     <div>
                                                                     <table class="table" width="100%" style="border: none;">
         
                                                                         <tbody>
                                                                             <tr>
         
                                                                                 <td width="25%">Case Fir No</td>
                                                                                 <td id="casefirno"></td>
                                                                             </tr>
                                                                             <tr>
         
                                                                                 <td width="25%">Fir date</td>
                                                                                 <td width="25%" class="firdate"></td>
                                                                             </tr>
                                                                             <tr>
         
                                                                                 <td width="25%">Name of Police station</td>
                                                                                 <td width="25%" class="policestation"></td>
                                                                             </tr>
                                                                             <tr>

                                                                                <td width="25%">province</td>
                                                                                <td width="25%" id="Province"></td>
                                                                            </tr>
                                                                            <tr>
    
                                                                                <td width="25%">Nationality</td>
                                                                                <td width="25%" id="Nationality"></td>
                                                                            </tr>
                                                                             <tr>
         
                                                                                 <td width="25%">Case Title</td>
                                                                                 <td  width="25%" id="casetitle"></td>
                                                                             </tr>
                                                                             <tr>
         
                                                                                 <td width="25%">Sentencing Court</td>
                                                                                 <td id="sentence_in_court"></td>
                                                                             </tr>
                                                                             <tr>
         
                                                                                 <td width="25%">Date of Sentence</td>
                                                                                 <td id="date_of_sentence"></td>
         
                                                                             </tr>
                                                                             <tr>
         
                                                                                 <td width="25%">Mercy petition number</td>
                                                                                 <td id="prisonerid"></td>
                                                                             </tr>
                                                                             <tr>
         
                                                                                 <td width="25%">Date of submission of Mercy Petition</td>
                                                                                 <td id="Mercypetitiondate"></td>
                                                                             </tr>
                                                                             <tr>
                                                                                 <td width="25%">
                                                                             <u> <h3>Particulars of Prisoner</h3></u>
                                                                                 </td>
                                                                             </tr>
                                                                             <tr>
         
                                                                                 <td width="25%">Name</td>
                                                                                 <td id="firstname"></td>
                                                                             </tr>
                                                                             <tr>
         
                                                                                 <td width="25%"> Father Name</td>
                                                                                 <td id="Fathername"></td>
                                                                             </tr>
                                                                             <tr>
         
                                                                                 <td width="25%">Cnic</td>
                                                                                 <td id="cnic"></td>
                                                                             </tr>
                                                                             <tr>
         
                                                                                 <td width="25%">Date of birth</td>
                                                                                 <td id="Dob"></td>
         
                                                                             </tr>
                                                                             <tr>
         
                                                                                 <td width="25%">Gender</td>
         
                                                                                 <td id="Gender"></td>
                                                                             </tr>
                                                                             <tr>
         
                                                                                 <td width="25%">Martial Status</td>
                                                                                 <td id="martialstatus"></td>
         
                                                                             </tr>
                                                                             <tr>
         
                                                                                 <td width="25%">Caste</td>
                                                                                 <td id="caste"></td>
                                                                             </tr>
                                                                             <tr>
         
                                                                                 <td width="25%">Religion</td>
                                                                                 <td id="religion"></td>
                                                                             </tr>
         
                                                                             <tr>
         
                                                                                 <td width="25%">Education</td>
                                                                                 <td id="education"></td>
                                                                             </tr>
                                                                             <tr>
         
                                                                                 <td width="25%">Occupation</td>
                                                                                 <td><span id="occupation"></span></td>
                                                                             </tr>
                                                                             <tr>
         
                                                                                 <td width="25%">Petition History</td>
                                                                                 <td><span id="petitionhistory"></span></td>
                                                                             </tr>
                                                                             <tr>
         
                                                                                 <td width="25%">Physical Health</td>
                                                                                 <td><span id="physicalhealth"></span></td>
                                                                             </tr>
                                                                             <tr>
         
                                                                                 <td width="25%">Mental Health</td>
                                                                                 <td><span id="mentalhealth"></span></td>
                                                                             </tr>
         
                                                                             <tr>
         
                                                                                 <td width="25%">Prisoner Conduct</td>
                                                                                 <td><span id="prisonerconduct"></span></td>
                                                                             </tr>
                                                                             <tr>
                                                                                 <td width="25%">
                                                                             <u> <h3>Particulars of Crime </h3></u>
                                                                                 </td>
                                                                             </tr>
                                                                             <tr>
         
                                                                                 <td width="25%">Date of Fir</td>
                                                                                 <td><span class="firdate"></span></td>
                                                                             </tr>
                                                                             <tr>
         
                                                                                 <td width="25%">Name of Police station</td>
                                                                                 <td><span class="policestation"></span></td>
                                                                             </tr>
                                                                             <tr>
         
                                                                                 <td width="25%">compoundable_offence</td>
                                                                                 <td><span id="compoundableoffence"></span></td>
                                                                             </tr>
                                                                             <tr>
         
                                                                                 <td width="25%">Non Compoundable offense</td>
                                                                                 <td><span id="noncompoundableoffence"></span></td>
                                                                             </tr>
                                                                             <tr>
         
                                                                                 <td width="25%">Nature of crime</td>
                                                                                 <td><span id="natureofcrime"></span></td>
                                                                             </tr>
                                                                             <tr>
         
                                                                                 <td width="25%">Mitigating factors</td>
                                                                                 <td><span id="mitigatingcircumstances"></span></td>
                                                                             </tr>
                                                                             <tr>
         
                                                                                 <td width="25%">Confined in jail</td>
                                                                                 <td><span id="Confined_in_jail"></span></td>
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
                                                                                
                                                                                
                                                                                
                                                                                <td width="33%">Home Department</td>
                                                                                <td class="homefile"><span id="homepic"></td>
                                                                                <td width="33%"></span>
                                                                                    <span id="homefilepdf"></span></td>
                                                                             </tr>
                                                                             <tr class="homeremarks">
                                                                                    <td width="33%">Home Remarks</td>
                                                                                <td ><span id="homeremarks"></td>
                                                                            </tr>
                                                                            <tr class="interiorDoc">
                                                                                
                                                                                
                                                                                
                                                                                <td width="33%">InteriorMinistry </td>
                                                                                <td class="interiorfile"><span id="interiorpic"></td>
                                                                                <td width="33%"></span>
                                                                                    <span id="interiorfilepdf"></span></td>
                                                                                </tr>
                                                                                <tr class="interiorremarks">

                                                                                    <td width="33%">InteriorMinistry Remarks</td>
                                                                                <td ><span id="interiorremarks"></td>
                                                                            </tr>
                                                                            {{-- <tr class="humanDoc">
                                                                                
                                                                                
                                                                                
                                                                                <td width="33%">HumanrightMinistry </td>
                                                                                <td class="humanfile"><span id="humanrightpic"></td>
                                                                               
                                                                                <td width="33%"></span>
                                                                                    <span id="humanrightfilepdf"></span></td>
                                                                                </tr>
                                                                                <tr class="humanremarks">
                                                                              
                                                                                    <td width="33%">HumanrightMinistry Remarks</td>
                                                                                <td ><span id="humanremarks"></td>
                                                                          
                                                                        </tr> --}}
         
                                                                         </tbody>
                                                                     </table>
                                                                                         </div>
                                                                                        </div>
                                                                        

                                                                        {{-- </div><!-- /.row --> --}}

                                                                       
                                                                    </div>
                                                                </div>
                                                                <div id="btnhide1" class="col-12 px-8 mt-5">
                                                                    <div class="form-row text-center">
                                                                        <span id="humangrightback"></span>
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
            <h4 style="background-color:#800000; text-align:center;color:#fff"> Record Not Yet Added!</h4>
    @endif
@endsection
