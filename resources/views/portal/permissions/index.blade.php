@extends('layouts.portal')
@section('module','Access Control System')
@section('element','List of Permissions')

@section('content')


<div role="main" class="page-content container container-plus">
    <div class="page-header border-0">
      <h1 class="page-title text-primary-d2 text-140">
        @if ($message = Session::get('success'))
            <div class="alert alert-success">
            <p>{{ $message }}</p>
            </div>
        @endif
      </h1>
    </div> 

    <div class="row">
      <div class="col-12">
        <div class="card bcard">
          <div class="card-body px-1 px-md-3">

            <form autocomplete="off">
              <div class="d-flex justify-content-between flex-column flex-sm-row mb-3 px-2 px-sm-0">
                <h3 class="text-130 pl-1 mb-3 mb-sm-0">
                  {{-- table caption --}}
                </h3>

                <div class="pos-rel ml-sm-auto mr-sm-2 order-last order-sm-0">
                  <i class="fa fa-search position-lc ml-25 text-primary-m1"></i>
                  <input type="text" class="form-control w-100 pl-45 radius-1 brc-primary-m4" placeholder="Search ...">
                </div>

                <div class="mb-2 mb-sm-0">
                @can('role-create')
                  <a href="{{ url('permissions/create') }}">
                    <button type="button" " class="btn btn-blue px-3 d-block w-100 text-95 radius-round border-2 brc-black-tp10">
                       <i class="fa fa-plus mr-1"></i>
                            Add <span class="d-sm-none d-md-inline">New</span> Entry
                    </button>
                  </a>
                @endcan
                </div>
              </div>

              <table id="simple-table" class="mb-0 table table-borderless table-bordered-x brc-secondary-l3 text-dark-m2 radius-1 overflow-hidden">
                <thead class="text-dark-tp3 bgc-grey-l4 text-90 border-b-1 brc-transparent">
                  <tr>
                    <th class="text-center pr-0">
                      <label class="py-0">
                        <input type="checkbox" class="align-bottom mb-n1 border-2 text-dark-m3">
                      </label>
                    </th>

                    <th> S#  </th>

                    <th> Role Name</th>
                    <th>Friendly Title</th>
                    <th></th>
                  </tr>
                </thead>

                <tbody class="mt-1">
                    @php
                        $i=0;
                    @endphp

                    @foreach ($permissions as $permission)
                    <tr class="bgc-h-yellow-l4 d-style">
                        <td class="text-center pr-0 pos-rel">
                        <div class="position-tl h-100 ml-n1px border-l-4 brc-orange-m1 v-hover">
                            <!-- border shown on hover -->
                        </div>
                        <div class="position-tl h-100 ml-n1px border-l-4 brc-success-m1 v-active">
                            <!-- border shown when row is selected -->
                        </div>

                        <label>
                            <input type="checkbox" class="align-middle">
                        </label>
                        </td>

                        <td>
                        <a href="#" class="text-blue-d1 text-600 text-95">
                            {{ ++$i }}
                        </a>
                        </td>

                        <td class="text-600 text-orange-d2">
                            {{ $permission->name }}
                        </td>

                        <td class="text-600 text-orange-d2">
                            {{ $permission->friendly_title }}
                        </td>

                        <td>
                        <!-- action buttons -->
                        <div class="d-none d-lg-flex">
                            <a href="{{ url('portal/permissions/show',$permission->id) }}" class="mx-2px btn radius-1 border-2 btn-xs btn-brc-tp btn-light-secondary btn-h-lighter-warning btn-a-lighter-warning">
                                <i class="fa fa-search-plus text-105">   </i>
                            </a>
                            @can('permission-edit')    
                            <a href="{{ url('permissions/'.$permission->id,'edit') }}" class="mx-2px btn radius-1 border-2 btn-xs btn-brc-tp btn-light-secondary btn-h-lighter-success btn-a-lighter-success">
                            <i class="fa fa-pencil-alt"></i>
                            </a>
                            @endcan
                            <a id="delete-user" class="mx-2px btn radius-1 border-2 btn-xs btn-brc-tp btn-light-secondary btn-h-lighter-danger btn-a-lighter-danger">
                                <i class="fa fa-trash-alt"></i>
                              </a>
                            
                            
                            <form method="POST" id="delete-permission-form" action="{{url('portal.permissions.destroy',$permission->id)}}" style="display:none">
                                @csrf
                                <input name="_method" type="hidden" value="DELETE">
                            </form>
                            @can('permission-delete')
                            {{-- {!! Form::open(['method' => 'DELETE','url' => ['portal.permissions.destroy', $permission->id],'style'=>'mx-2px btn radius-1 border-2 btn-xs btn-brc-tp btn-light-secondary btn-h-lighter-danger btn-a-lighter-danger']) !!}
                            {!! Form::submit('D', ['class' => 'fa fa-trash-alt']) !!}
                            {!! Form::close() !!} --}}
                            @endcan
                           
                        </div>
                        </td>
                    </tr>
                    @endforeach
      

                </tbody>

              </table>

              <!-- table footer -->
              <div class="d-flex pl-4 pr-3 pt-35 border-t-1 brc-secondary-l2 flex-column flex-sm-row mt-n1px">
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
              </div>
            </form>

          </div><!-- /.card-body -->
        </div><!-- /.card -->
      </div><!-- /.col -->
    </div><!-- /.row -->


  </div>
  @endsection
  {{-- {!! $roles->render() !!} --}}
  @section('scripts')
  <script>
  jQuery(function($) {
    
    $('#delete-user').on('click', function() {
      
    var swalWithBootstrapButtons = Swal.mixin({
      customClass: {
        confirmButton: 'btn btn-success mx-2',
        cancelButton: 'btn btn-danger mx-2'
      },
      buttonsStyling: false
    })
  
    swalWithBootstrapButtons.fire({
      title: 'Are you sure?',
      text: "Are you sure you want to delete this user?",
      showCancelButton: true,
      scrollbarPadding: false,
      confirmButtonText: 'Yes, do it!',
      cancelButtonText: 'No, cancel!',
      reverseButtons: true
    }).then(function(result) {
      if (result.value) {
        console.log($('form'));
        $('#delete-user-form').submit();
      }
    })
  })
  });
  </script>
  @endsection
