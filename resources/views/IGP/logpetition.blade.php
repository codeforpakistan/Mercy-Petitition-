@extends('layouts.portal', [
'menu' => 'IGP',
'sub_menu' => 'Petition'
])
@section('module', 'IGP Management')
@section('element', 'LogPetition')

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

                                
                            </div>
                            @if (!$logpetitions->isEmpty())
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
                                           Prisoner Name
                                        </th>

                                        <th>
                                            Father Name
                                        </th>

                                        <th class="d-none d-sm-table-cell">
                                            Confined in Jail
                                        </th>

                                       
                                        <th class='d-none d-sm-table-cell'>
                                           Department
                                        </th>
                                        <th class="d-none d-sm-table-cell">
                                            Created
                                        </th>

                                        <th>User</th>
                                        
                                    </tr>
                                </thead>
                                @foreach ($logpetitions as $petion)
                             
                                    <tbody class="mt-1">
                                        <tr class="bgc-h-yellow-l4 d-style">


                                            <td>
                                                <a href='#' class='text-blue-d1 text-600 text-95'>{{ $petion->petitions->name }}</a>
                                            </td>

                                            <td class="text-600 text-orange-d2">
                                                {{ $petion->petitions->f_name }}
                                            </td>

                                            <td class='d-none d-sm-table-cell text-grey-d1'>
                                                {{ $petion->petitions->confined_in_jail }}
                                            </td>

                                           
                                            <td class='d-none d-sm-table-cell text-grey text-95'>
                                                @if ($petion->department == 'Accepted')
                                                    <span class="badge badge-success mr-1">
                                                        {{ $petion->department }}
                                                    </span>
                                                @elseif($petion->department == 'Rejected')
                                                    <span class="badge bgc-orange-d2 text-white mr-1">
                                                        {{ $petion->department }}
                                                    </span>
                                                @else
                                                    {{ $petion->department }}
                                                @endif


                                            </td>
                                            <td class='d-none d-sm-table-cell'>
                                                {{ $petion->created_at}}

                                            </td>

                                            <td class='text-center pr-0'>
                                               
                                                    {{ $petion->users->name}}  

                                            <td>
                                                <!-- action buttons -->
                                                

                                                <!-- show a dropdown in mobile -->
                                                 

                                            </td>
                                        </tr>

                                    </tbody>
                                @endforeach
                               
                            </table>
                       
                            
                        
                       
                        </div><!-- /.card-body -->
                   
                          





                                                                        <!-- activity tab -->







                                                     
                                </div><!-- /.card -->
                            </div><!-- /.col -->
                        </div><!-- /.row -->
                        @else
                        <h4 style="background-color:#800000; text-align:center;color:#fff"> Record Not Yet Added!</h4>
        @endif
                    </div><!-- /.row -->
                </div><!-- /.row -->
            </div><!-- /.row -->
        </div><!-- /.row -->
         
@endsection
