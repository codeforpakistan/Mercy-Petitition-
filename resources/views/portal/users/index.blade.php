@extends('layouts.portal', [
'menu' => 'system_setting',
'sub_menu' => 'users'
])
@section('module', 'User Management')
@section('element', 'List of Users')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card bcard">
                <div class="card-body px-1 px-md-3">
                    <div class="d-flex justify-content-between flex-column flex-sm-row mb-3 px-2 px-sm-0">
                        <form method="get" action="{{ request()->fullUrlWithQuery(['search' => '']) }}}}">
                            <div class="pos-rel d-inline-block" style="width: calc(100% - 48px);">
                                <i class="fa fa-search position-lc ml-25 text-primary-m1"></i>
                                <input type="text" name="search" value="{{ $search }}"
                                    class="form-control w-100 pl-45 brc-primary-m4" placeholder="Search ...">
                            </div>
                            <button class="ml-2 btn btn-sm btn-outline-primary btn-h-outline-info btn-a-outline-info"
                                style="margin-left: -6px !important;height: 38px;margin-top: -4px;border-left: 0;padding-right: 15px;"><i
                                    class="fa fa-arrow-right ml-2 f-n-hover"></i></button>
                        </form>
                        <div class="btn-group ml-sm-auto mt-3 mt-sm-0">
                            {!! $data->appends(['search' => $search])->render() !!}
                        </div>

                        <div class="mb-2 mb-sm-0">
                            
                                     <a href="{{ route('portal.users.create') }}">
                                        <button type="button" " class="
                                            btn btn-blue px-3 d-block w-100 text-95 radius-round border-2 brc-black-tp10">
                                            <i class="fa fa-plus mr-1"></i>
                                             <span class="d-sm-none d-md-inline">New</span>User
                                        </button>
                                    </a>
                        </div>
                    </div>

                    <table id="simple-table"
                        class="mb-0 table table-borderless table-bordered-x brc-secondary-l3 text-dark-m2 radius-1 overflow-hidden">
                        <thead class="text-dark-tp3 bgc-grey-l4 text-90 border-b-1 brc-transparent">
                            <tr>
                                <th>User ID</th>
                                <th>User Name</th>
                                <th class="d-none d-sm-table-cell">Email</th>
                                <th class="d-none d-sm-table-cell">Roles</th>
                                <th width="164px"></th>
                            </tr>
                        </thead>

                        <tbody class="mt-1">
                            @foreach ($data as $key => $user)
                                <tr class="bgc-h-yellow-l4 d-style">
                                    <td>{{ $user->id }}</td>
                                    <td>{{ $user->name }}</td>
                                    <td class="d-none d-sm-table-cell">{{ $user->email }}</td>
                                    <td class="d-none d-sm-table-cell">
                                        @if (!empty($user->getRoleNames()))
                                            @foreach ($user->getRoleNames() as $v)
                                                <label
                                                    class="m-1 badge bgc-white border-2 brc-success-m3 radius-1 btn-text-success px-25">{{ $v }}</label>
                                            @endforeach
                                        @endif
                                    </td>
                                    <td>
                                        <div class="d-lg-flex">
                                            <a href="{{ route('portal.users.show', $user->id) }}"
                                                class="mx-2px btn radius-1 border-2 btn-xs btn-brc-tp btn-light-secondary btn-h-lighter-success btn-a-lighter-success">
                                                <i class="fa fa-eye"></i>
                                            </a>
                                            <a href="{{ route('portal.users.edit', $user->id) }}"
                                                class="mx-3px btn radius-1 border-2 btn-xs btn-brc-tp btn-light-secondary btn-h-lighter-success btn-a-lighter-success">
                                                <i class="fa fa-pencil-alt"></i>
                                            </a>
                                            <!-- <a id="delete-user" class="mx-2px btn radius-1 border-2 btn-xs btn-brc-tp btn-light-secondary btn-h-lighter-danger btn-a-lighter-danger">
                          <i class="fa fa-trash-alt"></i>
                        </a> -->
                                            <form method="POST" id="delete-user-form"
                                                action="{{ route('portal.users.destroy', $user->id) }}">
                                                @csrf
                                                @method('delete')
                                                <input name="_method" type="hidden" value="DELETE">
                                                <button id="delete-user"
                                                    class=" inactive mx-2px btn radius-1 border-2 btn-xs btn-brc-tp btn-light-secondary btn-h-lighter-danger btn-a-lighter-danger"
                                                    type="submit" class="btn btn-danger btn-icon">
                                                    <i class="fa fa-trash-alt"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                    <div class="d-flex pl-4 pr-3 pt-35 border-t-1 brc-secondary-l2 flex-column flex-sm-row mt-n1px">
                        <!-- <form method="get" action="{{ request()->fullUrlWithQuery(['search' => '']) }}}}">
                <div class="pos-rel d-inline-block" style="width: calc(100% - 48px);">
                  <i class="fa fa-search position-lc ml-25 text-primary-m1"></i>
                  <input type="text" name="search" value="{{ $search }}" class="form-control w-100 pl-45 brc-primary-m4" placeholder="Search ...">
                </div>
                <button class="ml-2 btn btn-sm btn-outline-primary btn-h-outline-info btn-a-outline-info" style="margin-left: -6px !important;height: 38px;margin-top: -4px;border-left: 0;padding-right: 15px;"><i class="fa fa-arrow-right ml-2 f-n-hover"></i></button>
              </form>
              <div class="btn-group ml-sm-auto mt-3 mt-sm-0">
                {!! $data->appends(['search' => $search])->render() !!}
              </div> -->
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
