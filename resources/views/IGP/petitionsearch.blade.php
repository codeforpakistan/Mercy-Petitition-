@extends('layouts.portal', [
    'menu' => 'IGP',
    'sub_menu' => 'Petition'
])
@section('module','IGP Management')
@section('element','Listing')

@section('content')


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
                        <a href="{{ route('Petition.index') }}" class="btn btn-blue px-3 d-block w-100 text-95 radius-round border-2 brc-black-tp10">
                            <i class="fa fa-arrow-left mr-1"></i>
                             <span class="d-sm-none d-md-inline">Back</span> 
</a>
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
              <input type="text" name="search" value={{request()->input('search')}} class="form-control w-100 pl-45 brc-primary-m4" placeholder="Search ...">
            </div>
            <button type="submit" class="ml-2 btn btn-sm btn-outline-primary btn-h-outline-info btn-a-outline-info" style="margin-left: -6px !important;height: 38px;margin-top: -4px;border-left: 0;padding-right: 15px;"><i class="fa fa-arrow-right ml-2 f-n-hover"></i></button>
          </form>
                        </div>
                        
                        <div class="mb-2 mb-sm-0">
                          <a href="{{ route('Petition.create') }}" class="btn btn-blue px-3 d-block w-100 text-95 radius-round border-2 brc-black-tp10">
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

                      <table id="simple-table" class="mb-0 table table-borderless table-bordered-x brc-secondary-l3 text-dark-m2 radius-1 overflow-hidden">
                        <thead class="text-dark-tp3 bgc-grey-l4 text-90 border-b-1 brc-transparent">
                          <tr>


                            <th>
                            Name
                            </th>

                            <th>
                             F_Name
                            </th>

                            <th class="d-none d-sm-table-cell">
                              Nationality
                            </th>

                            <th class='d-none d-sm-table-cell'>
                              Confined IN Jail
                            </th>

                            <th class="d-none d-sm-table-cell">
                             Presion PIC
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

                            <td class='d-none d-sm-table-cell'>
                              <span class='badge badge-sm bgc-warning-d1 text-white pb-1 px-25'><img src="{{ asset('/assets/image/'.$petion->application_image) }}" width="50" height="50" alt="pic"/></span>

                            </td>

                            <td class='text-center pr-0'>
                              <div>
                                <a href="javascript:void(0)" data-toggle="modal" data-target="#modalFullscreen" class="d-style btn btn-outline-info text-90 text-600 border-0 px-2 collapsed" data-id ="{{$petion->id}}" id="show-user" title="Show Details">
                                  <span class="d-none d-md-inline mr-1">
                                            Details
                                        </span>
                                  <i class="fa fa-angle-down toggle-icon opacity-1 text-90"></i>
                                </a>
                              </div>
                            </td>

                            <td>
                              <!-- action buttons -->
                              <div class='d-none d-lg-flex'>
                                <a href="{{route('petition-edit', [$petion->id])}}" class="mx-2px btn radius-1 border-2 btn-xs btn-brc-tp btn-light-secondary btn-h-lighter-success btn-a-lighter-success">
                                  <i class="fa fa-pencil-alt"></i>
                                </a>

                                <a href="{{route('petition-forward',[$petion->id])}}" class="mx-2px btn radius-1 border-2 btn-xs btn-brc-tp btn-light-secondary btn-h-lighter-success btn-a-lighter-success">
                                    <i class="fa fa-plus"></i>
                                  </a>

                              </div>

                              <!-- show a dropdown in mobile -->
                              <div class='dropdown d-inline-block d-lg-none dd-backdrop dd-backdrop-none-lg'>
                                <a href='#' class='btn btn-default btn-xs py-15 radius-round dropdown-toggle' data-toggle="dropdown">
                                  <i class="fa fa-cog"></i>
                                </a>

                                <div class="dropdown-menu dd-slide-up dd-slide-none-lg">
                                  <div class="dropdown-inner">
                                    <div class="dropdown-header text-100 text-secondary-d1 border-b-1 brc-secondary-l2 text-600 mb-2">
                                      ace.com
                                    </div>
                                    <a href="{{route('petition-edit', [$petion->id])}}" class="dropdown-item">
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



             <div class="modal fade modal-fs" id="modalFullscreen" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel2" aria-hidden="true">
              <div class="modal-dialog modal-dialog-scrollable" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel2">
                      Modal title
                    </h5>

                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>

                  <div class="modal-body">
                 {{-- <p id = "show"> </p><input type="text"  >
                 name : <span id="firstname"></span> --}}

                 <div class="bg-white border-bottom">
                    <div class="content content-boxed">
                        <div class="row items-push text-center">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-vcenter">
                                    <tbody>
                                        {{-- @foreach ($details as $detail) --}}
                                        <tr>
                                            <td class="text-left">Name:</td>
                                            <td id="firstname" class="font-w600 font-size-sm"></td>
                                            <td class="text-left">Father Name:</td>
                                            <td id ="Fathername" class="font-w600 font-size-sm"></td>
                                        </tr>
                                        <tr>
                                            <td class="text-left">Nationality:</td>
                                            <td id="Nationality" class="font-w600 font-size-sm"></td>
                                            <td class="text-left">Physical status:</td>
                                            <td id="Physicalstatus" class="font-w600 font-size-sm"></td>
                                        </tr>
                                        <tr>
                                            <td class="text-left">Confined in jail:</td>
                                            <td id="Confined_in_jail" class="font-w600 font-size-sm"></td>
                                            <td class="text-left">Mobile Network:</td>
                                            <td class="font-w600 font-size-sm"></td>
                                        </tr>
                                        <tr>
                                            <td class="text-left">Gender:</td>
                                            <td id="Gender" class="font-w600 font-size-sm"></td>
                                            <td class="text-left">Dob:</td>
                                            <td id="Dob" class="font-w600 font-size-sm"></td>
                                        </tr>
                                        <tr>
                                            <td class="text-left">Fir and date:</td>
                                            <td id="fir&date" class="font-w600 font-size-sm"></td>
                                            <td class="text-left">Mercy petition date:</td>
                                            <td id="Mercypetitiondate" class="font-w600 font-size-sm"></td>
                                        </tr>
                                        <tr>
                                            <td class="text-left">Section:</td>
                                            <td id="Section_id" class="font-w600 font-size-sm"></td>
                                            <td class="text-left">Remarks:</td>
                                            <td id="Remarks" class="font-w600 font-size-sm"></td>
                                        </tr>
                                        {{-- @endforeach --}}
                                    </tbody>
                                </table>
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
                          <a href="#" class="btn btn-lighter-default btn-bgc-white btn-a-secondary radius-r-1 px-3 border-2 ml-n2px">
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
            @endsection

