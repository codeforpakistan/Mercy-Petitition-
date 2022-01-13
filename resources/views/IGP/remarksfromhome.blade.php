@extends('layouts.portal', [
'menu' => 'homeremarks',
'sub_menu' => 'Petition'
])
@section('module','IGP Management')
@section('element','homeremarks')

@section('content')
@if(isset($petitions))


    

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
                            <!-- <form  method="get"  action="{{route('petitionsearch')}}">

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

                        <div class="mb-2 mb-sm-0">
                            <a href="{{ route('Petition.create') }}"
                                class="btn btn-blue px-3 d-block w-100 text-95 radius-round border-2 brc-black-tp10">
                                <i class="fa fa-plus mr-1"></i>
                                Add <span class="d-sm-none d-md-inline">New</span> Petition
                            </a>
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


                    @if(Session::has('message'))
                    <p class="alert alert-info">{{ Session::get('message') }}</p>
                    @endif

                    <table id="simple-table"
                        class="mb-0 table table-borderless table-bordered-x brc-secondary-l3 text-dark-m2 radius-1 overflow-hidden">
                        <thead class="text-dark-tp3 bgc-grey-l4 text-90 border-b-1 brc-transparent">
                            <tr>


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
                                    Confined in Jail
                                </th>
                                <th class='d-none d-sm-table-cell'>
                                    Status
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
                        @foreach($petitions as $petion)
                        <tbody class="mt-1">
                            <tr class="bgc-h-yellow-l4 d-style">


                                <td>
                                    <a href='#' class='text-blue-d1 text-600 text-95'>{{$petion->name}}</a>
                                </td>

                                <td class="text-600 text-orange-d2">
                                    {{$petion->f_name}}
                                </td>

                                <td class='d-none d-sm-table-cell text-grey-d1'>
                                    {{$petion->nationality}}
                                </td>

                                <td class='d-none d-sm-table-cell text-grey text-95'>
                                    {{$petion->confined_in_jail}}
                                </td>
                                <td class='d-none d-sm-table-cell text-grey text-95'>
                                    @if($petion->status == "Accepted")
                                    <span class="badge badge-success mr-1">
                                        {{$petion->status}}
                                    </span>
                                    @elseif($petion->status == "Rejected")
                                    <span class="badge bgc-orange-d2 text-white mr-1">
                                        {{$petion->status}}
                                    </span>
                                    @else
                                    {{$petion->status}}
                                    @endif
                                    
                                   
                                </td>
                                <td class='d-none d-sm-table-cell text-grey text-95'>
                                    {{$petion->received_from_department}}
                                </td>
                               
                                <td class='d-none d-sm-table-cell'>
                                    <span class='badge badge-sm bgc-warning-d1 text-white pb-1 px-25'><img
                                            src="{{ asset('/assets/image/'.$petion->prisoner_image) }}" width="50"
                                            height="50" alt="pic" /></span>

                                </td>

                                <td class='text-center pr-0'>
                                    <div>
                                        <a href="javascript:void(0)" data-toggle="modal" data-target="#modalFullscreen"
                                            class="d-style btn btn-outline-info text-90 text-600 border-0 px-2 collapsed"
                                            data-id="{{$petion->id}}" id="remarksview" title="Show Details">
                                            <span class="d-none d-md-inline mr-1">
                                                Details
                                            </span>
                                            <i class="fa fa-angle-down toggle-icon opacity-1 text-90"></i>
                                        </a>







                                <td>
                                    <!-- action buttons -->
                                    <div class='d-none d-lg-flex'>
                                        <a href="{{route('petition-edit', [$petion->id])}}"
                                            class="mx-2px btn radius-1 border-2 btn-xs btn-brc-tp btn-light-secondary btn-h-lighter-success btn-a-lighter-success">
                                            <i class="fa fa-pencil-alt"></i>
                                        </a>

                                        <a href="{{route('petition-forward',[$petion->id])}}"
                                            class="mx-2px btn radius-1 border-2 btn-xs btn-brc-tp btn-light-secondary btn-h-lighter-success btn-a-lighter-success bg-success text-white">
                                            Forward  <i class="fa fa-forward"></i>
                                        </a>

                                    </div>

                                    <!-- show a dropdown in mobile -->
                                    <div class='dropdown d-inline-block d-lg-none dd-backdrop dd-backdrop-none-lg'>
                                        <a href='#' class='btn btn-default btn-xs py-15 radius-round dropdown-toggle'
                                            data-toggle="dropdown">
                                            <i class="fa fa-cog"></i>
                                        </a>

                                        <div class="dropdown-menu dd-slide-up dd-slide-none-lg">
                                            <div class="dropdown-inner">
                                                <div
                                                    class="dropdown-header text-100 text-secondary-d1 border-b-1 brc-secondary-l2 text-600 mb-2">
                                                    ace.com
                                                </div>
                                                <a href="{{route('petition-edit', [$petion->id])}}"
                                                    class="dropdown-item">
                                                    <i class="fa fa-pencil-alt text-blue mr-1 p-2 w-4"></i>
                                                    Edit
                                                </a>
                                                <a href="#" class="dropdown-item">
                                                    <i class="fa fa-trash-alt text-danger-m1 mr-1 p-2 w-4"></i>
                                                    Delete
                                                </a>
                                                <a href="#" class="dropdown-item">
                                                    <i class="far fa-flag text-orange-d1 mr-1 p-2 w-4"></i>
                                                    Flag
                                                </a>
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
                                   Petition View
                                </h5>

                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
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
                                                    <span class="d-none position-tl mt-2 pt-3px">
                                                        <span class="text-white bgc-blue-d1 ml-2 radius-b-1 py-2 px-2">
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
                                                                class=" position-tr bgc-success p-1 radius-round border-2 brc-white mt-2px mr-2px"></span>
                                                            --}}
                                                        </div>

                                                        <div class="text-center mt-2">

                                                            <h5 id="firstname" style="color: black;"
                                                                class="text-130 text-dark-m3">

                                                            </h5>
                                                            <span  style="color: black;"
                                                            class="text-80 text-primary text-600">Father Name :</span>
                                                            <span id="Fathername" style="color: black;"
                                                                class="text-80 text-primary text-600">

                                                            </span>

                                                            {{-- <span
                                                                class="d-none badge bgc-orange-l3 text-orange-d3 pt-2px pb-1 text-85 radius-round px-25 border-1 brc-orange-m3">
                                                                pro
                                                            </span> --}}
                                                        </div>



                                                        <hr class="w-90 mx-auto brc-secondary-l3">





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

                                                        <ul id="profile-tabs"
                                                            class="nav nav-tabs-scroll is-scrollable nav-tabs nav-tabs-simple p-1px pl-25 bgc-white border-b-1 brc-dark-l3"
                                                            role="tablist">
                                                            <li class="nav-item mr-2 mr-lg-3">
                                                                <a class="d-style nav-link active px-2 py-35 brc-green-tp1"
                                                                    data-toggle="tab" href="#profile-tab-overview"
                                                                    role="tab" aria-controls="profile-tab-overview"
                                                                    aria-selected="true">
                                                                    <span class="d-n-active text-dark-l1">1. Prisoner
                                                                        Information</span>
                                                                    <span class="d-active text-dark-m3">1. Prisoner
                                                                        Information</span>
                                                                </a>
                                                            </li>


                                                    </div><!-- /.sticky-nav-md -->


                                                    <div class="tab-content px-0 tab-sliding flex-grow-1 border-0">

                                                        <!-- overview tab -->
                                                        <div class="tab-pane active show px-1 px-md-2 px-lg-4"
                                                            id="profile-tab-overview">

                                                            <div class="row mt-1">


                                                                <div class="row mt-5">
                                                                    <div class="col-8 px-4 mb-3 text-center center">

                                                                        <h4 class="text-dark-m3 text-140">
                                                                            <i
                                                                                class="fa fa-info text-blue mr-1 w-2"></i>
                                                                            Prisoner Info
                                                                        </h4>

                                                                        <hr class="w-100 mx-auto mb-0 brc-default-l2">

                                                                        <div class="bgc-white radius-1 center"
                                                                            style="box-shadow: rgba(50, 50, 93, 0.25) 0px 2px 5px -1px, rgba(0, 0, 0, 0.3) 0px 1px 3px -1px;">
                                                                            <table
                                                                        class="table table  table-borderless">
                                                                        <tr>
                                                                            <td>
                                                                                <i class="far fa-user text-success"></i>
                                                                            </td>

                                                                            <td
                                                                                class="text-95 text-600 text-secondary-d2">
                                                                                Nationality
                                                                            </td>

                                                                            <td id ="Nationality" class="text-dark-m3">

                                                                            </td>
                                                                        </tr>

                                                                        <tr>
                                                                            <td>
                                                                                <i
                                                                                    class="far fa-envelope text-blue"></i>
                                                                            </td>

                                                                            <td
                                                                                class="text-95 text-600 text-secondary-d2">
                                                                                Physical Status
                                                                            </td>

                                                                            <td id ="Physicalstatus" class="text-blue-d1 text-wrap">

                                                                            </td>
                                                                        </tr>

                                                                        <tr>
                                                                            <td>

                                                                                <i class="fas fa-bars text-purple"></i>
                                                                            </td>

                                                                            <td
                                                                                class="text-95 text-600 text-secondary-d2">
                                                                                Confined in jail
                                                                            </td>

                                                                            <td id="Confined_in_jail" class="text-dark-m3">

                                                                            </td>
                                                                        </tr>

                                                                        <tr>
                                                                            <td>
                                                                                <i
                                                                                    class="fa fa-map-marker text-orange-d1"></i>
                                                                            </td>

                                                                            <td
                                                                                class="text-95 text-600 text-secondary-d2">
                                                                                Gender
                                                                            </td>

                                                                            <td id ="Gender" class="text-dark-m3">

                                                                            </td>
                                                                        </tr>

                                                                        <tr>
                                                                            <td>
                                                                                <i
                                                                                    class="far fa-clock text-secondary"></i>
                                                                            </td>

                                                                            <td
                                                                                class="text-95 text-600 text-secondary-d2">
                                                                            DOB
                                                                            </td>

                                                                            <td id = "Dob" class="text-dark-m3">

                                                                            </td>
                                                                        </tr>

                                                                        <tr>
                                                                            <td>
                                                                                <i
                                                                                    class="far fa-clock text-secondary"></i>
                                                                            </td>

                                                                            <td
                                                                                class="text-95 text-600 text-secondary-d2">
                                                                                firdate
                                                                            </td>

                                                                            <td id = "firdate" class="text-dark-m3">

                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>
                                                                                <i
                                                                                    class="far fa-clock text-secondary"></i>
                                                                            </td>

                                                                            <td
                                                                                class="text-95 text-600 text-secondary-d2">
                                                                                Mercy petition date
                                                                            </td>

                                                                            <td id = "Mercypetitiondate" class="text-dark-m3">

                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>
                                                                                <i
                                                                                    class="far fa-clock text-secondary"></i>
                                                                            </td>

                                                                            <td
                                                                                class="text-95 text-600 text-secondary-d2">
                                                                                Section
                                                                            </td>

                                                                            <td id = "Section_id" class="text-dark-m3">

                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>
                                                                                <i
                                                                                    class="fas fa-border-all text-secondary"></i>
                                                                            </td>

                                                                            <td
                                                                                class="text-95 text-600 text-secondary-d2">
                                                                                Warrant date
                                                                            </td>

                                                                            <td id = "warrent_date" class="text-dark-m3">

                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>
                                                                                <i
                                                                                    class="fas fa-border-all text-secondary"></i>
                                                                            </td>

                                                                            <td
                                                                                class="text-95 text-600 text-secondary-d2">
                                                                                Remarks
                                                                            </td>

                                                                            <td id = "Remarks" class="text-dark-m3">

                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>
                                                                                <i
                                                                                    class="fas fa-building text-secondary"></i>
                                                                            </td>

                                                                            <td
                                                                                class="text-95 text-600 text-secondary-d2">
                                                                                Sentence in court
                                                                            </td>

                                                                            <td id = "sentence_in_court" class="text-dark-m3">

                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>
                                                                                <i
                                                                                    class="fas fa-check-square text-secondary"></i>
                                                                            </td>

                                                                            <td
                                                                                class="text-95 text-600 text-secondary-d2">
                                                                                Date of sentence
                                                                            </td>

                                                                            <td id = "date_of_sentence" class="text-dark-m3">

                                                                            </td>
                                                                        </tr>

                                                                    </table>
                                                                </div>

                                                            </div>

                                                        {{-- </div><!-- /.row --> --}}



                                                                <div class="col-12 px-4 mt-3" style="box-shadow: rgba(50, 50, 93, 0.25) 0px 2px 5px -1px, rgba(0, 0, 0, 0.3) 0px 1px 3px -1px;">

                                                                    <h4 class="mt-2 text-dark-m3 text-130">
                                                                        <i
                                                                            class="fa fa-pen-alt text-85 text-purple-d1 w-3"></i>
                                                                            Warrant Information
                                                                    </h4>

                                                                    <div
                                                                        class="d-flex flex-column flex-sm-row align-items-center align-items-sm-start mt-3 mb-2 text-95 pl-3">


                                                                        <div
                                                                            class="mt-2 mt-sm-0 flex-grow-1 text-dark-m2">
                                                                            <p id="warrent_information" class="mb-1">

                                                                            </p>

                                                                        </div>
                                                                    </div>
                                                                </div>


                                                                <div class="col-12 px-4 mt-3" style="box-shadow: rgba(50, 50, 93, 0.25) 0px 2px 5px -1px, rgba(0, 0, 0, 0.3) 0px 1px 3px -1px;">
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
                                                                <figcaption class="figure-caption text-right">Warrant File</figcaption>
                                                              </figure>
                                                              </div>
                                                              <div class="form-group col-md-3">
                                                                   <figure class="figure">
                                                                    <div id="health_paper"></div>
                                                                    <div id="health_papers"></div>
                                                                <figcaption class="figure-caption text-right">Health Paper</figcaption>
                                                              </figure>
                                                              </div>
                                                              <div class="form-group col-md-3">
                                                               <figure class="figure">
                                                                   <div id="application_image"></div>
                                                                   <div id="application_images"></div>
                                                                <figcaption class="figure-caption text-right">Application Image</figcaption>
                                                              </figure>
                                                              </div>

                                                                      </div>
                                                                      <div class=" form-group row">
                                                                      <div class="form-group col-md-12">
                                                               <figure class="figure">
                                                                   <div id="pic"></div>


                                                                <!-- <figcaption class="figure-caption text-right">Other documents</figcaption> -->
                                                              </figure>
                                                              </div>
                                                            </div>
                                                            <div class=" form-group row">
                                                                      <div class="form-group col-md-12">
                                                               <figure class="figure">

                                                                   <div id="picss"></div>

                                                                 <figcaption class="figure-caption text-right">Other documents</figcaption>
                                                              </figure>
                                                              </div>
                                                            </div>
                                                                      </div>
                                                                      <div class="col-12 px-4 mt-3"
                                                                      style="box-shadow: rgba(50, 50, 93, 0.25) 0px 2px 5px -1px, rgba(0, 0, 0, 0.3) 0px 1px 3px -1px;">
                                                                          <div class=" form-group row">
      
                                                                              <div class="form-group col-md-12">
                                                                                  {{-- <hr class="rounded"> --}}
                                                                                  <h4 class="text-dark-m3 text-140">
                                                                                      <i
                                                                                          class="far fa-lightbulb text-danger-d1 text-85 w-3"></i>
                                                                                      Home Department documents
                                                                                  </h4>
      
                                                                                  <figure class="figure">
                                                                                      <div id="homepic"></div>&nbsp;&nbsp;
      
      
                                                                                      <!-- <figcaption class="figure-caption text-right">Other documents</figcaption> -->
                                                                                  </figure>
                                                                              </div>
      
      
                                                                              <div class=" form-group row">
                                                                                  <div class="form-group col-md-12">
                                                                                      <figure class="figure">
      
                                                                                          <div id="homefilepdf"></div>
                                                                                          &nbsp;&nbsp;
      
                                                                                      </figure>
                                                                                  </div>
                                                                              </div>
                                                                              <div class="form-group col-md-12">
                                                                                  {{-- <hr class="rounded"> --}}
                                                                                  <h4 class="text-dark-m3 text-140">
                                                                                      <i
                                                                                          class="fas fa-comment text-danger-d1 text-85 w-3"></i>
                                                                                      Home Department Remarks
                                                                                  </h4>
      
                                                                                  <figure class="figure">
                                                                                      <div id="homeremarks"></div>
      
      
                                                                                      <!-- <figcaption class="figure-caption text-right">Other documents</figcaption> -->
                                                                                  </figure>
                                                                              </div>
                                                                              
                                                                          </div>
                                                                      </div>
                                                                      <div class="col-12 px-4 mt-3"
                                                                style="box-shadow: rgba(50, 50, 93, 0.25) 0px 2px 5px -1px, rgba(0, 0, 0, 0.3) 0px 1px 3px -1px;">
                                                                    <div class=" form-group row">

                                                                        <div class="form-group col-md-12">
                                                                            {{-- <hr class="rounded"> --}}
                                                                            <h4 class="text-dark-m3 text-140">
                                                                                <i
                                                                                    class="far fa-lightbulb text-danger-d1 text-85 w-3"></i>
                                                                                InteriorMinitries documents
                                                                            </h4>

                                                                            <figure class="figure">
                                                                                <div id="interiorpic"></div>&nbsp;&nbsp;


                                                                                <!-- <figcaption class="figure-caption text-right">Other documents</figcaption> -->
                                                                            </figure>
                                                                        </div>


                                                                        <div class=" form-group row">
                                                                            <div class="form-group col-md-12">
                                                                                <figure class="figure">

                                                                                    <div id="interiorfilepdf"></div>
                                                                                   

                                                                                </figure>
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group col-md-12">
                                                                            {{-- <hr class="rounded"> --}}
                                                                            <h4 class="text-dark-m3 text-140">
                                                                                <i
                                                                                    class="fas fa-comment text-danger-d1 text-85 w-3"></i>
                                                                               InteriorMinistry Remarks
                                                                            </h4>

                                                                            <figure class="figure">
                                                                                <div id="interiorremarks"></div>


                                                                                <!-- <figcaption class="figure-caption text-right">Other documents</figcaption> -->
                                                                            </figure>
                                                                        </div>
                                                                        
                                                                    </div>
                                                                </div>
                                                                <div class="col-12 px-4 mt-3"
                                                                style="box-shadow: rgba(50, 50, 93, 0.25) 0px 2px 5px -1px, rgba(0, 0, 0, 0.3) 0px 1px 3px -1px;">
                                                                    <div class=" form-group row">

                                                                        <div class="form-group col-md-12">
                                                                            {{-- <hr class="rounded"> --}}
                                                                            <h4 class="text-dark-m3 text-140">
                                                                                <i
                                                                                    class="far fa-lightbulb text-danger-d1 text-85 w-3"></i>
                                                                               HumanRightDepartment documents
                                                                            </h4>

                                                                            <figure class="figure">
                                                                                <div id="humanrightpic"></div>&nbsp;&nbsp;


                                                                                <!-- <figcaption class="figure-caption text-right">Other documents</figcaption> -->
                                                                            </figure>
                                                                        </div>


                                                                        <div class=" form-group row">
                                                                            <div class="form-group col-md-12">
                                                                                <figure class="figure">

                                                                                    <div id="humanrightfilepdf"></div>
                                                                                    &nbsp;&nbsp;

                                                                                </figure>
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group col-md-12">
                                                                            {{-- <hr class="rounded"> --}}
                                                                            <h4 class="text-dark-m3 text-140">
                                                                                <i
                                                                                    class="fas fa-comment text-danger-d1 text-85 w-3"></i>
                                                                               HumanRightDepartment Remarks
                                                                            </h4>

                                                                            <figure class="figure">
                                                                                <div id="humanrightremarks"></div>


                                                                                <!-- <figcaption class="figure-caption text-right">Other documents</figcaption> -->
                                                                            </figure>
                                                                        </div>
                                                                        
                                                                    </div>
                                                                </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-12 px-8 mt-5"
                                                            >
                                                            <div class="form-row text-center">
                                                                <div class="form-group col-md-6">
                                                                    <a href="{{route('petition-forward',[$petion->id])}}"
                                                                        class="  mx-2px btn radius-1 border-2 btn-xs btn-brc-tp btn-light-secondary btn-h-lighter-success btn-a-lighter-success bg-success text-white">
                                                                        Forward <i class="fa fa-forward"></i>
                                                                    </a>
                                                                </div>
                                                                <div class="form-group col-md-6">
                                                                    <a href="{{route('remarksfromhome')}}"
                                                                        class="  mx-2px btn radius-1 border-2 btn-xs btn-brc-tp btn-light-secondary btn-h-lighter-success btn-a-lighter-success bg-primary text-white">
                                                                        Back <i class="fa fa-arrow-left"></i>
                                                                    </a>
                                                                </div>
    
                                                            </div>
                                                        </div>
                                                        </div>





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




            {{-- </tbody>

            </table> --}}

            <!-- table footer -->
            {{-- <div class="d-flex pl-4 pr-3 pt-35 border-t-1 brc-secondary-l2 flex-column flex-sm-row mt-n1px">
                <div class="text-nowrap align-self-center align-self-sm-start">
                    <span class="d-inline-block text-grey-d2">
                        Showing 1 - 10 of 152
                    </span>

                    <select class="ml-3 ace-select no-border angle-down brc-h-blue-m3 w-auto pr-45 text-secondary-d3">
                        <option value="10">Show 10</option>
                        <option value="20">Show 20</option>
                        <option value="50">Show 50</option>
                    </select>
                </div>

                <div class="btn-group ml-sm-auto mt-3 mt-sm-0">
                    <a href="#" class="btn btn-lighter-default btn-bgc-white btn-a-secondary radius-l-1 px-3 border-2">
                        <i class="fa fa-caret-left mr-1"></i>
                        Prev
                    </a>
                    <a href="#"
                        class="btn btn-lighter-default btn-bgc-white btn-a-secondary radius-r-1 px-3 border-2 ml-n2px">
                        Next
                        <i class="fa fa-caret-right ml-1"></i>
                    </a>
                </div>
            </div> --}}
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
