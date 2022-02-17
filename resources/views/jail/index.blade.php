@extends('layouts.portal', [
'menu' => 'system_setting',
'sub_menu' => 'jails'
])
@section('module', 'jail Management')
@section('element', 'Jails')

@section('content')
    @if (Session::has('message'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>{{ Session::get('message') }}!</strong> .
            <buton type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
    <div class="row">
        <div class="col-12">
            <div class="card bcard">
                <div class="card-body px-1 px-md-3">
                    <div class="d-flex justify-content-between flex-column flex-sm-row mb-3 px-2 px-sm-0">
                        {{-- <form method="get" action="{{request()->fullUrlWithQuery(['search' => '']) }}}}">
            <div class="pos-rel d-inline-block" style="width: calc(100% - 48px);">
              <i class="fa fa-search position-lc ml-25 text-primary-m1"></i>
              <input type="text" name="search" value="{{$search}}" class="form-control w-100 pl-45 brc-primary-m4" placeholder="Search ...">
            </div>
            <button class="ml-2 btn btn-sm btn-outline-primary btn-h-outline-info btn-a-outline-info" style="margin-left: -6px !important;height: 38px;margin-top: -4px;border-left: 0;padding-right: 15px;"><i class="fa fa-arrow-right ml-2 f-n-hover"></i></button>
          </form> --}}
                        {{-- <div class="btn-group ml-sm-auto mt-3 mt-sm-0">
            {!! $data->appends(['search' => $search])->render() !!}
          </div> --}}

                        <div class="mb-2 mb-sm-0">
                            <a class="btn btn-outline-success" href="{{ route('jail.add') }}"><i
                                    class="fa fa-fw fa-plus mr-1"></i> Add province</a>
                        </div>
                    </div>

                    <table id="simple-table"
                        class="mb-0 table table-borderless table-bordered-x brc-secondary-l3 text-dark-m2 radius-1 overflow-hidden">
                        <thead class="text-dark-tp3 bgc-grey-l4 text-90 border-b-1 brc-transparent">
                            <tr>
                                <th>ID</th>
                                <th class="d-none d-sm-table-cell">Jail name</th>
                                <th class="d-none d-sm-table-cell">Province name</th>
                                <th class="d-none d-sm-table-cell">Action</th>
                                <th width="164px"></th>
                            </tr>
                        </thead>

                        <tbody class="mt-1">

                            @foreach ($jail  as $jails)

                                <tr class="bgc-h-yellow-l4 d-style">
                                    <td>{{ $jails->id }}</td>
                                    <td>{{ $jails->jail_name }}</td>
                                    <td>{{ $jails->provinces->province_name }}</td>


                                    <td>
                                        <div class="d-lg-flex">

                                            <a href="{{ route('jail.edit', $jails->id) }}"
                                                class="mx-3px btn radius-1 border-2 btn-xs btn-brc-tp btn-light-secondary btn-h-lighter-success btn-a-lighter-success">
                                                <i class="fa fa-pencil-alt"></i>
                                            </a>
                                            {{-- <a id="{{ $jails->id }}" href="#"
                                                class="btn btn-sm btn-danger del-PS" data-toggle="tooltip"
                                                title="Delete Item">
                                                <i class="far fa-trash-alt"></i>
                                            </a> --}}

                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                    {{-- <div class="d-flex pl-4 pr-3 pt-35 border-t-1 brc-secondary-l2 flex-column flex-sm-row mt-n1px">
          <!-- <form method="get" action="{{request()->fullUrlWithQuery(['search' => '']) }}}}">
            <div class="pos-rel d-inline-block" style="width: calc(100% - 48px);">
              <i class="fa fa-search position-lc ml-25 text-primary-m1"></i>
              <input type="text" name="search" value="{{$search}}" class="form-control w-100 pl-45 brc-primary-m4" placeholder="Search ...">
            </div>
            <button class="ml-2 btn btn-sm btn-outline-primary btn-h-outline-info btn-a-outline-info" style="margin-left: -6px !important;height: 38px;margin-top: -4px;border-left: 0;padding-right: 15px;"><i class="fa fa-arrow-right ml-2 f-n-hover"></i></button>
          </form>
          <div class="btn-group ml-sm-auto mt-3 mt-sm-0">
            {{-- {!! $data->appends(['search' => $search])->render() !!} --}}
                    {{-- </div>
        </div> --}}
                </div>
            </div>
        </div>
    </div>

@endsection
