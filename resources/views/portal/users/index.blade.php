@extends('layouts.portal', [
    'menu' => 'system_setting',
    'sub_menu' => 'users'
])
@section('module','User Management')
@section('element','List of Users')

@section('content')
<div class="row">
  <div class="col-12">
    <div class="card bcard">
      <div class="card-body px-1 px-md-3">
        <div class="d-flex justify-content-between flex-column flex-sm-row mb-3 px-2 px-sm-0">
          <h3 class="text-130 pl-1 mb-3 mb-sm-0">Users Management</h3>
          <div class="mb-2 mb-sm-0">
            <a class="btn btn-outline-success" href="{{ route('portal.users.create') }}"><i class="fa fa-fw fa-plus mr-1"></i> New User</a>
          </div>
        </div>

        <table id="simple-table" class="mb-0 table table-borderless table-bordered-x brc-secondary-l3 text-dark-m2 radius-1 overflow-hidden">
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
                  @if(!empty($user->getRoleNames()))
                    @foreach($user->getRoleNames() as $v)
                      <label class="m-1 badge bgc-white border-2 brc-success-m3 radius-1 btn-text-success px-25">{{ $v }}</label>
                    @endforeach
                  @endif
                </td>
                <td>
                  <div class="d-lg-flex">
                    <a href="{{route('portal.users.show',$user->id)}}" class="mx-2px btn radius-1 border-2 btn-xs btn-brc-tp btn-light-secondary btn-h-lighter-success btn-a-lighter-success">
                      <i class="fa fa-eye"></i>
                    </a>
                    <a href="{{route('portal.users.edit',$user->id)}}" class="mx-3px btn radius-1 border-2 btn-xs btn-brc-tp btn-light-secondary btn-h-lighter-success btn-a-lighter-success">
                      <i class="fa fa-pencil-alt"></i>
                    </a>
                    <a id="delete-user" class="mx-2px btn radius-1 border-2 btn-xs btn-brc-tp btn-light-secondary btn-h-lighter-danger btn-a-lighter-danger">
                      <i class="fa fa-trash-alt"></i>
                    </a>
                    <form method="POST" id="delete-user-form" action="{{route('portal.users.destroy',$user->id)}}" style="display:none">
                      @csrf
                      <input name="_method" type="hidden" value="DELETE">
                    </form>
                  </div>
                </td>
              </tr>
            @endforeach
          </tbody>
        </table>

        <div class="d-flex pl-4 pr-3 pt-35 border-t-1 brc-secondary-l2 flex-column flex-sm-row mt-n1px">
          <form method="get" action="{{request()->fullUrlWithQuery(['search' => '']) }}}}">
            <div class="pos-rel d-inline-block" style="width: calc(100% - 48px);">
              <i class="fa fa-search position-lc ml-25 text-primary-m1"></i>
              <input type="text" name="search" value="{{$search}}" class="form-control w-100 pl-45 brc-primary-m4" placeholder="Search ...">
            </div>
            <button class="ml-2 btn btn-sm btn-outline-primary btn-h-outline-info btn-a-outline-info" style="margin-left: -6px !important;height: 38px;margin-top: -4px;border-left: 0;padding-right: 15px;"><i class="fa fa-arrow-right ml-2 f-n-hover"></i></button>
          </form>
          <div class="btn-group ml-sm-auto mt-3 mt-sm-0">
            {!! $data->appends(['search' => $search])->render() !!}
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection
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