@extends('layouts.portal')

@section('content')
<div class="row mt-2 mt-md-4">
  <div class="col-12 col-md-4">
    <div class="card bcard">
      <div class="card-body">
        <div class="d-flex flex-column pt-3 justify-content-center align-items-center">
          <div class="pos-rel">
            <img alt="Profile image" src="{{ Auth::user()->picture ?? asset('..\assets\image\avatar\default.png')}}" class="radius-round bord1er-2 brc-warning-m1" style="width: 128px;height:128px;">
          </div>
          <div class="text-center mt-2">
            <h5 class="text-130 text-dark-m3">{{Auth::user()->name}}</h5>
            <span class="text-80 text-primary text-600">UI/UX Designer</span>
          </div>
          <hr class="w-90 mx-auto mb-1 brc-secondary-l3">
          <div class="row w-100 text-center">
            <div class="col-6">
              <div class="px-1 pt-2">
                <span class="text-150 text-dark-m3">15</span>
                <br>
                <span class="text-grey-m1 text-90">Job Applied</span>
              </div>
              <div class="position-rc h-75 border-l-1 brc-secondary-l3"></div>
            </div>
            <div class="col-6">
              <div class="px-1 pt-2">
                <span class="text-150 text-dark-m3">87</span>
                <br>
                <span class="text-grey-m1 text-90">Skills</span>
              </div>
            </div>
          </div>
          <hr class="w-90 mx-auto mb-1 border-dotted">

          <div class="mt-2 mx-3">
            <div class="text-secondary-d3 font-bolder text-90 mb-2">My Skills</div>
            <div class="text-left d-inline-flex flex-wrap">
              <span class="d-inline-block radius-round bgc-purple-l2 text-dark-tp3 text-90 px-25 py-3px mx-2px my-2px">Reading</span>
              <span class="d-inline-block radius-round bgc-default-l2 text-dark-tp3 text-90 px-25 py-3px mx-2px my-2px">Excerise</span>
              <span class="d-inline-block radius-round bgc-success-l2 text-dark-tp3 text-90 px-25 py-3px mx-2px my-2px">Travel</span>
              <span class="d-inline-block radius-round bgc-default-l2 text-dark-tp3 text-90 px-25 py-3px mx-2px my-2px">Cooking</span>
              <span class="d-inline-block radius-round bgc-default-l2 text-dark-tp3 text-90 px-25 py-3px mx-2px my-2px">Politics</span>
              <span class="d-inline-block radius-round bgc-default-l2 text-dark-tp3 text-90 px-25 py-3px mx-2px my-2px">Tech</span>
            </div>
          </div>
          <div class="mt-2 w-100 text-90 text-secondary radius-1 px-25 py-3">
            <div class="d-flex mb-1">
              <h6 class="text-600">
                Overview
              </h6>
            </div>

            <div class="border-1 brc-dark-l3 radius-1 px-3 py-25 bgc-white text-secondary-d1">
              <div>
                Task Progress:
                <div class="progress mt-1 bgc-white overflow-visible" style="height: 0.5rem;">
                  <div class="progress-bar bgc-green radius-2px" role="progressbar" style="width: 66%;" aria-valuenow="66" aria-valuemin="0" aria-valuemax="100"></div>
                  <span class="align-self-center ml-2 text-dark-m3 text-sm">66%</span>
                </div>
              </div>

              <div class="mt-4">
                Projects:
                <span class="float-right badge badge-pill bgc-secondary-l2 text-secondary-d3 text-90 px-3">
                        12
                    </span>
              </div>

              <div class="mt-2">
                Posts:
                <span class="float-right badge badge-pill bgc-secondary-l2 text-secondary-d3 text-90 px-3">
                        25
                    </span>
              </div>

              <div class="mt-2">
                Comments:
                <span class="float-right badge badge-pill bgc-secondary-l2 text-secondary-d3 text-90 px-3">
                        11
                    </span>
              </div>

              <div class="mt-2">
                Likes:
                <span class="float-right badge badge-pill bgc-secondary-l2 text-secondary-d3 text-90 px-3">
                        87
                    </span>
              </div>
            </div>

          </div>

        </div>
      </div>
    </div>
  </div>

  <!-- the right side profile tabs -->
  <div class="col-12 col-md-8 mt-3 mt-md-0">
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
            <div class="row mt-1">
              <div class="col-12 px-4 mt-1">
                <h4 class="mt-2 text-dark-m3 text-130">
                  <i class="fa fa-pen-alt text-85 text-purple-d1 w-3"></i>
                  About Me
                </h4>

                <div class="d-flex flex-column flex-sm-row align-items-center align-items-sm-start mt-3 mb-2 text-95 pl-3">
                  <div class="mt-2 mt-sm-0 flex-grow-1 text-dark-m2">
                    <p class="mb-1">
                      Hello, may name is Amy. I'm a professional designer based in Dublin.
                    </p>
                    <p class="mb-1">
                      My job is mostly lorem ipsuming and dolor sit ameting for clients!
                    </p>
                    <p>
                      As long as consectetur adipiscing elit...
                    </p>
                  </div>
                </div>
              </div>
            </div>

            <div class="row mt-3">
              <div class="col-12 px-4 mb-3">
                <h4 class="text-dark-m3 text-140">
                  <i class="fa fa-info text-blue mr-1 w-2"></i>
                  More Info
                </h4>
                <hr class="w-100 mx-auto mb-0 brc-default-l2">
                <div class="bgc-white radius-1">
                  <table class="table table table-striped-default table-borderless">
                    <tr>
                      <td width="36px"><i class="far fa-user text-success"></i></td>
                      <td class="text-95 text-600 text-secondary-d2">Username</td>
                      <td class="text-dark-m3">amy_smith</td>
                    </tr>
                    <tr>
                      <td><i class="far fa-envelope text-blue"></i></td>
                      <td class="text-95 text-600 text-secondary-d2">Email</td>
                      <td class="text-blue-d1 text-wrap">amy.smith@inc.com</td>
                    </tr>
                    <tr>
                      <td><i class="fa fa-phone text-purple"></i></td>
                      <td class="text-95 text-600 text-secondary-d2">Phone</td>
                      <td class="text-dark-m3">+1128934218</td>
                    </tr>
                    <tr>
                      <td><i class="fa fa-map-marker text-orange-d1"></i></td>
                      <td class="text-95 text-600 text-secondary-d2">Location</td>
                      <td class="text-dark-m3">Dublin</td>
                    </tr>
                    <tr>
                      <td><i class="far fa-clock text-secondary"></i></td>
                      <td class="text-95 text-600 text-secondary-d2">Last Active</td>
                      <td class="text-dark-m3">6 min ago</td>
                    </tr>
                  </table>
                </div>

              </div>

            </div>
          </div>

          <!-- profile edit tab -->
          <div class="tab-pane px-1 px-md-2 px-lg-4" id="profile-tab-edit">
            <h4 class="bgc-secondary-l4 text-dark-tp3 text-center text-140 mb-3 mx-3 py-25">Update profile info</h4>
            <div class="row">
              <div class="col-12 col-lg-10 offset-lg-1 mt-3">
                <form class="text-grey-d1 text-95" action="{{route('portal.users.profile')}}" method="post" autocomplete="off">
                  <div class="form-group row mx-0">
                    <div class="offset-sm-4 offset-xl-3 col-sm-8 col-lg-6">
                      <input type="file" class="form-control" id="id-field0">
                    </div>
                  </div>
                  <div class="form-group row mx-0">
                    <label for="id-field1" class="col-sm-4 col-xl-3 col-form-label text-sm-right">Full Name</label>
                    <div class="col-sm-8 col-lg-6">
                      <input type="text" class="form-control brc-on-focus brc-success-m2" id="id-field1" placeholder="e.g. Alex Doe">
                    </div>
                  </div>
                  <div class="form-group row mx-0">
                    <label for="id-field2" class="col-sm-4 col-xl-3 col-form-label text-sm-right">Email Address</label>
                    <div class="col-sm-8 col-lg-6">
                      <input type="email" class="form-control brc-on-focus brc-success-m2" id="id-field2" placeholder="Enter your email address here">
                    </div>
                  </div>
                  <div class="form-group row mx-0">
                    <label for="id-field3" class="col-sm-4 col-xl-3 col-form-label text-sm-right">Phone Number</label>
                    <div class="col-sm-8 col-lg-6">
                      <input type="text" class="form-control brc-on-focus brc-success-m2" id="id-field3" placeholder="e.g. (+44) 3482342">
                    </div>
                  </div>
                  <div class="form-group row mx-0">
                    <label for="id-field4" class="col-sm-4 col-xl-3 col-form-label text-sm-right">Location</label>
                    <div class="col-sm-8 col-lg-6">
                      <input type="text" class="form-control brc-on-focus brc-success-m2" id="id-field4" placeholder="">
                    </div>
                  </div>
                </form>
              </div>



              <div class="col-12">
                <hr class="border-double brc-dark-l3">
                <div class="form-group text-center mt-4 mb-3">
                  <button type="button" class="btn btn-outline-secondary radius-1 px-3 mx-1">Cancel</button>
                  <button type="submit" class="btn btn-outline-green radius-1 px-4 mx-1">Save Changes</button>
                </div>
              </div>

            </div>
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
  $('a#toggle-password').on('click', function(e) {
    e.preventDefault()
    $(this).toggleClass('active')
    var inp = $(this).siblings('input');
    $(inp).attr('type', $(this).hasClass('active') ? 'text' : 'password');
  });
});
</script>
@endsection