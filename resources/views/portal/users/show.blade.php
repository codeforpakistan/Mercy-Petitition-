@extends('layouts.portal')

@section('content')
<div class="row">


  <!-- the right side profile tabs -->
  <div class="col-12 col-md-12 mt-6 mt-md-0">
    <div class="card bcard h-100">
      <div class="card-body p-0">
        <div class="sticky-nav">
          <div class="position-tr w-100 border-t-4 brc-blue-m2 radius-2 d-md-none"></div>
          <ul id="profile-tabs" class="nav nav-tabs-scroll is-scrollable nav-tabs nav-tabs-simple p-1px pl-25 bgc-white border-b-1 brc-dark-l3" role="tablist">
            <li class="nav-item mr-2 mr-lg-3">
              <a class="d-style nav-link active px-2 py-35 brc-green-tp1" data-toggle="tab" href="#profile-tab-overview" role="tab" aria-controls="profile-tab-overview" aria-selected="true">
                <span class="text-dark-m3">Overview</span>
              </a>
            </li>
            <li class="nav-item mr-2 mr-lg-3">
              <a class="d-style nav-link px-2 py-35 brc-green-tp1" data-toggle="tab" href="#profile-tab-edit" role="tab" aria-controls="profile-tab-edit" aria-selected="false">
                <span class="text-dark-m3">Edit Info</span>
              </a>
            </li>
          </ul>
        </div>

        <div class="tab-content px-0 tab-sliding flex-grow-1 border-0">
          <div class="tab-pane active show px-1 px-md-2 px-lg-4" id="profile-tab-overview">


            <div class="row mt-3">
              <div class="col-12 px-4 mb-3">
                <h4 class="text-dark-m3 text-140">
                  <i class="fa fa-info text-blue mr-1 w-2"></i>
                  User Info
                </h4>
                <hr class="w-100 mx-auto mb-0 brc-default-l2">
                <div class="bgc-white radius-1">
                  <table class="table table table-striped-default table-borderless">
                    <tr>
                      <td width="36px"><i class="far fa-user text-success"></i></td>
                      <td class="text-95 text-600 text-secondary-d2">Username</td>
                      <td class="text-dark-m3">{{$user->name}}</td>
                    </tr>
                    <tr>
                      <td><i class="far fa-envelope text-blue"></i></td>
                      <td class="text-95 text-600 text-secondary-d2">Email</td>
                      <td class="text-blue-d1 text-wrap">{{$user->email}}</td>
                    </tr>
                    <tr>
                      <td><i class="fa fa-phone text-purple"></i></td>
                      <td class="text-95 text-600 text-secondary-d2">Status</td>
                      @if($user->status == 1)

                      <td class="text-95 text-600 text-secondary-d2">Active</td>
                      @else

                      <td class="text-95 text-600 text-secondary-d2">InActive</td>
                      @endif
                      {{-- <td class="text-dark-m3">{{$user->status}}</td> --}}
                    </tr>
                    <tr>
                      <td><i class="fa fa-map-marker text-orange-d1"></i></td>
                      <td class="text-95 text-600 text-secondary-d2">Jail name</td>
                      <td class="text-dark-m3">{{$user->confined_in_jail}}</td>
                    </tr>
                  </table>
                </div>

              </div>

            </div>
          </div>

          <!-- profile edit tab -->
       

        </div>
      </div>
    </div>
  </div>
</div>
@endsection
@section('scripts')
<script>
jQuery(function($) {
  $('a#toggle-password').on('click', function(e) {
    e.preventDefault()
    $(this).toggleClass('active')
    var inp = $(this).siblings('input');
    $(inp).attr('type', $(this).hasClass('active') ? 'text' : 'password');
  });
});
</script>
@endsection
