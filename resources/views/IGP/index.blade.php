@extends('layouts.portal', [
'menu' => 'IGP',
'sub_menu' => 'Petition'
])
@section('module', 'IGP Management')
@section('element', 'Listing')

@section('content')

    <style>
        .b-container1 {
            background-image: linear-gradient(#b33232, #304d86);
            background-attachment: fixed;
            opacity: 16px;
            background-repeat: no-repeat;
        }
        .center {
            margin-left: auto;
            margin-right: auto;
        }
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

                                        <form action="{{ route('petitionsearch') }}" method="get">
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
                                @can('jail-supt-create')
                                <div class="mb-2 mb-sm-0">
                                    <a href="{{ route('Petition.create') }}"
                                        class="btn btn-blue px-3 d-block w-100 text-95 radius-round border-2 brc-black-tp10">
                                        <i class="fa fa-plus mr-1"></i>
                                        Add <span class="d-sm-none d-md-inline">New</span> Petition
                                    </a>
                                </div>
                                @endcan
                            </div>
                            @if (!$petitions->isEmpty())
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
                                           Prisoner Name
                                        </th>

                                        <th>
                                            Father Name
                                        </th>

                                        <th class="d-none d-sm-table-cell">
                                            Nationality
                                        </th>

                                        <th class='d-none d-sm-table-cell'>
                                            Confined in Jail
                                        </th>
                                        <th class='d-none d-sm-table-cell'>
                                            status
                                        </th>
                                        <th class='d-none d-sm-table-cell'>
                                            File Location
                                        </th>
                                        <th class="d-none d-sm-table-cell">
                                            Prisoner image
                                        </th>

                                        <th>Show</th>
                                        @can('jail-supt-create')
                                        <th>Action</th>
                                        @endcan
                                    </tr>
                                </thead>
                                @foreach ($petitions as $petion)
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
                                                @if ($petion->status == 'Accepted')
                                                    <span class="badge badge-success mr-1">
                                                        {{ $petion->status }}
                                                    </span>
                                                @elseif($petion->status == 'Rejected')
                                                    <span class="badge bgc-orange-d2 text-white mr-1">
                                                        {{ $petion->status }}
                                                    </span>
                                                @else
                                                    {{ $petion->status }}
                                                @endif






                                            </td>
                                            <td class='d-none d-sm-table-cell text-grey text-95'>
                                                {{ $petion->file_in_department }}
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
                                                        data-id="{{ $petion->id }}" id="show-user" title="Show Details">
                                                        <span class="d-none d-md-inline mr-1">
                                                            Details
                                                        </span>
                                                        <i class="fa fa-angle-down toggle-icon opacity-1 text-90"></i>
                                                    </a>

                                            <td>
                                                <!-- action buttons -->
                                                @can('jail-supt-create')
                                                <div class='d-none d-lg-flex'>
                                                    <a href="{{ route('petition-edit', [$petion->id]) }}"
                                                        class="mx-2px btn radius-1 border-2 btn-xs btn-brc-tp btn-light-secondary btn-h-lighter-success btn-a-lighter-success">
                                                        <i class="fa fa-pencil-alt"></i>
                                                    </a>

                                                    <a href="{{ route('petition-forward', [$petion->id]) }}"
                                                        class="mx-2px btn radius-1 border-2 btn-xs btn-brc-tp btn-light-secondary btn-h-lighter-success btn-a-lighter-success bg-success text-white">
                                                        Forward <i class="fa fa-forward"></i>
                                                    </a>

                                                </div>
                                                @endcan

                                                <!-- show a dropdown in mobile -->
                                                <div
                                                    class='dropdown d-inline-block d-lg-none dd-backdrop dd-backdrop-none-lg'>
                                                    <a href='#'
                                                        class='btn btn-default btn-xs py-15 radius-round dropdown-toggle'
                                                        data-toggle="dropdown">
                                                        <i class="fa fa-cog"></i>
                                                    </a>
                                                    @can('jail-supt-create')
                                                    <div class="dropdown-menu dd-slide-up dd-slide-none-lg">
                                                        <div class="dropdown-inner">
                                                            <div
                                                                class="dropdown-header text-100 text-secondary-d1 border-b-1 brc-secondary-l2 text-600 mb-2">
                                                                ace.com
                                                            </div>
                                                            <a href="{{ route('petition-edit', [$petion->id]) }}"
                                                                class="dropdown-item">
                                                                <i class="fa fa-pencil-alt text-blue mr-1 p-2 w-4"></i>
                                                                Edit
                                                            </a>


                                                            <a href="{{ route('petition-forward', [$petion->id]) }}" data

                                                                class=" dropdown-item mx-2px btn radius-1 border-2 btn-xs btn-brc-tp btn-light-secondary btn-h-lighter-success btn-a-lighter-success bg-success text-white">
                                                                Forward <i class="fa fa-forward"></i>
                                                            </a>
                                                        </div>
                                                        @endcan
                                            </td>
                                        </tr>

                                    </tbody>
                                @endforeach
                            </table>

                            {{ $petitions->links() }}


                        </div><!-- /.card-body -->
                        <div class="modal fade modal-fs" id="modalFullscreen" tabindex="-1" role="dialog"
                            aria-labelledby="exampleModalLabel2" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-scrollable" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel2">
                                            Petition View
                                        </h5>

                                        <button type="button" class="close" data-dismiss="modal"
                                            aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>


                                    <div class="modal-body">


                                        <div role="main" id="printThis" class="page-content container container-plus">
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
                                                                    {{-- <img alt="Profile image"
                                                                src="..\assets\image\avatar\avatar5.jpg"
                                                                class="radius-round bord1er-2 brc-warning-m1"> --}}
                                                                    {{-- <span
                                                                class=" position-tr bgc-success p-1 radius-round border-2 brc-white mt-2px mr-2px"></span> --}}
                                                                </div>

                                                                <div class="text-center mt-2">

                                                                    <h5  style="color: black;"
                                                                        class="text-130 text-dark-m3">

                                                                    </h5>
                                                                    <span style="color: black;"
                                                                        class="text-80 text-primary text-600">
                                                                        :</span>
                                                                    <span  style="color: black;"
                                                                        class="text-80 text-primary text-600">

                                                                    </span>

                                                                    {{-- <span
                                                                class="d-none badge bgc-orange-l3 text-orange-d3 pt-2px pb-1 text-85 radius-round px-25 border-1 brc-orange-m3">
                                                                pro
                                                            </span> --}}
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



                                                                </tbody>
                                                            </table>
                                                                                </div>



                                                                            {{-- </div><!-- /.row --> --}}

                                                                            {{-- <div class="col-12 px-4 mt-3"
                                                                            style="box-shadow: rgba(50, 50, 93, 0.25) 0px 2px 5px -1px, rgba(0, 0, 0, 0.3) 0px 1px 3px -1px;">

                                                                            <h4 class="mt-2 text-dark-m3 text-130">
                                                                                <i
                                                                                    class="fa fa-pen-alt text-85 text-purple-d1 w-3"></i>
                                                                                  Jail-supt  Remarks
                                                                            </h4>

                                                                            <div
                                                                                class="d-flex flex-column flex-sm-row align-items-center align-items-sm-start mt-3 mb-2 text-95 pl-3">


                                                                                <div
                                                                                    class="mt-2 mt-sm-0 flex-grow-1 text-dark-m2">
                                                                                    <p id="Remarks"
                                                                                        class="mb-1">

                                                                                    </p>

                                                                                </div>
                                                                            </div>
                                                                        </div> --}}




                                                                            {{-- <div class="col-12 px-4 mt-3"
                                                                                style="box-shadow: rgba(50, 50, 93, 0.25) 0px 2px 5px -1px, rgba(0, 0, 0, 0.3) 0px 1px 3px -1px;">
                                                                                <h4 class="text-dark-m3 text-140">
                                                                                    <i
                                                                                        class="far fa-lightbulb text-danger-d1 text-85 w-3"></i>
                                                                                    Files
                                                                                </h4>

                                                                                <div id="skill-chart"
                                                                                    class="d-flex justify-content-center mx-auto flex-wrap">
                                                                                </div>

                                                                                <div class=" form-group row">

                                                                                    <div class="form-group col-md-3">
                                                                                        <figure class="figure">
                                                                                            <div id="warrent_file"></div>
                                                                                            <div id="warrent_files"></div>
                                                                                            <figcaption
                                                                                                class="figure-caption text-right">
                                                                                                Warrant File</figcaption>
                                                                                        </figure>
                                                                                    </div>
                                                                                    <div class="form-group col-md-3">
                                                                                        <figure class="figure">
                                                                                            <div id="health_paper"></div>
                                                                                            <div id="health_papers"></div>
                                                                                            <figcaption
                                                                                                class="figure-caption text-right">
                                                                                                Health Paper</figcaption>
                                                                                        </figure>
                                                                                    </div>
                                                                                    <div class="form-group col-md-3">
                                                                                        <figure class="figure">
                                                                                            <div id="application_image">
                                                                                            </div>
                                                                                            <div id="application_images">
                                                                                            </div>
                                                                                            <figcaption
                                                                                                class="figure-caption text-right">
                                                                                                Application Image
                                                                                            </figcaption>
                                                                                        </figure>
                                                                                    </div>

                                                                                </div>

                                                                                <div class=" form-group row">
                                                                                    <div class="form-group col-md-3">
                                                                                        <figure class="figure">
                                                                                            <div id="convection_summary">
                                                                                            </div>
                                                                                            <div id="convection_summarys">
                                                                                            </div>
                                                                                            <figcaption
                                                                                                class="figure-caption text-right">
                                                                                                Convection Summary
                                                                                            </figcaption>
                                                                                        </figure>
                                                                                    </div>
                                                                                    <div class="form-group col-md-3">
                                                                                        <figure class="figure">
                                                                                            <div id="check_list_file">
                                                                                            </div>
                                                                                            <div id="check_list_files">
                                                                                            </div>
                                                                                            <figcaption
                                                                                                class="figure-caption text-right">
                                                                                                Check List File
                                                                                            </figcaption>
                                                                                        </figure>
                                                                                    </div>
                                                                                    <div class="form-group col-md-3">
                                                                                        <figure class="figure">
                                                                                            <div id="petition_roll_file">
                                                                                            </div>
                                                                                            <div id="petition_roll_files">
                                                                                            </div>
                                                                                            <figcaption
                                                                                                class="figure-caption text-right">
                                                                                                Petition Roll
                                                                                            </figcaption>
                                                                                        </figure>
                                                                                    </div>
                                                                                </div>
                                                                                <div class=" form-group row">
                                                                                    <div class="form-group col-md-3">
                                                                                        <figure class="figure">
                                                                                            <div id="petition_certificate">
                                                                                            </div>
                                                                                            <div id="petition_certificates">
                                                                                            </div>
                                                                                            <figcaption
                                                                                                class="figure-caption text-right">
                                                                                                Petition Certificate
                                                                                            </figcaption>
                                                                                        </figure>
                                                                                    </div>
                                                                                    <div class="form-group col-md-3">
                                                                                        <figure class="figure">
                                                                                            <div id="judgments_file">
                                                                                            </div>
                                                                                            <div id="judgments_files">
                                                                                            </div>
                                                                                            <figcaption
                                                                                                class="figure-caption text-right">
                                                                                                Judgments_file
                                                                                            </figcaption>
                                                                                        </figure>
                                                                                    </div>
                                                                                    <div class="form-group col-md-3">
                                                                                        <figure class="figure">
                                                                                            <div id="application_in_urdu_file">
                                                                                            </div>
                                                                                            <div id="application_in_urdu_files">
                                                                                            </div>
                                                                                            <figcaption
                                                                                                class="figure-caption text-right">
                                                                                                Application In Urdu File
                                                                                            </figcaption>
                                                                                        </figure>
                                                                                    </div>
                                                                                </div>
                                                                                <div class=" form-group row">
                                                                                    <div class="form-group col-md-12">
                                                                                        <figure class="figure">
                                                                                            <div id="pic"></div>
                                                                                            <div id="pics"></div>


                                                                                            <figcaption
                                                                                                class="figure-caption text-right">
                                                                                                Other documents</figcaption>
                                                                                        </figure>
                                                                                    </div>
                                                                                </div>
                                                                            </div> --}}
                                                                            <div class="col-12 px-8 mt-5">
                                                                                <div id="btnhide1"
                                                                                    class="form-row text-center">
                                                                                    <div class="form-group col-md-6">

                                                                                     <span id="forward"></span>
                                                                                        {{-- <a href="{{ url('petition-forward', [$petion->id]) }}"
                                                                                            class="  mx-2px btn radius-1 border-2 btn-xs btn-brc-tp btn-light-secondary btn-h-lighter-success btn-a-lighter-success bg-success text-white">
                                                                                            Forward <i
                                                                                                class="fa fa-forward"></i>
                                                                                        </a> --}}



                                                                                    </div>
                                                                                    <div class="form-group col-md-6">
                                                                                        <a href="{{ route('Petition.index') }}"
                                                                                            class="  mx-2px btn radius-1 border-2 btn-xs btn-brc-tp btn-light-secondary btn-h-lighter-success btn-a-lighter-success bg-primary text-white">
                                                                                            Back <i
                                                                                                class="fa fa-arrow-left"></i>
                                                                                        </a>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>





                                                                        <!-- activity tab -->




                                                                        @else
                                                                        <h4 style="background-color:#800000; text-align:center;color:#fff"> Record Not Yet Added!</h4>
                                                        @endif


                                                                    </div><!-- /.row -->
                                                                </div>

                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>

                                    </div>
                                </div><!-- /.card -->
                            </div><!-- /.col -->




                        </div><!-- /.row -->

                    </div><!-- /.row -->
                </div><!-- /.row -->
            </div><!-- /.row -->
        </div><!-- /.row -->

@endsection
