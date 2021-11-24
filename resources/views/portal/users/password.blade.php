@extends('layouts.portal')
@section('module','User Management')
@section('element','Change User Password')

@section('content')
<div class="card bcard mt-2 mt-lg-3">
  <div class="card-header">
    <h3 class="card-title text-125">
      <i class="fa fa-key text-dark-l3 mr-1"></i>
      Change Password
    </h3>
  </div>

  <div class="card-body px-3 pb-1">
    
    @if (count($errors) > 0)
      <div class="alert alert-danger">
          <strong>Whoops!</strong> There were some problems with your input.<br><br>
          <ul>
          @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
          @endforeach
          </ul>
      </div>
    @endif
    
    @if (isset($success))
      <div class="alert alert-success">
        {{$success ?? ''}}
      </div>
    @endif
    <form class="mt-lg-3" action="{{route('portal.users.password')}}" method="post" autocomplete="off">
      @csrf
      <div class="form-group row">
        <div class="col-sm-3 col-form-label text-sm-right pr-0">
          <label for="old_password" class="mb-0">Old Password</label>
        </div>
        <div class="col-sm-9">
          <input type="password" class="form-control brc-on-focus col-sm-8 col-md-6 d-inline-block" placeholder="Old Password" id="old_password" name="old_password">
        </div>
      </div>
      <div class="form-group row">
        <div class="col-sm-3 col-form-label text-sm-right pr-0">
          <label for="new_password" class="mb-0">New Password</label>
        </div>
        <div class="col-sm-9">
          <input type="password" class="form-control brc-on-focus col-sm-8 col-md-6 d-inline-block" placeholder="New Password" id="new_password" name="new_password">
          <a href="#" id="toggle-password" class="btn btn-sm border-0 btn-white ml-n5 no-underline radius-1 d-style">
            <i class="fa fa-eye-slash text-90 d-n-active w-3"></i>
            <i class="fa fa-eye text-90 d-active w-3"></i>
          </a>
        </div>
      </div>
      <div class="form-group row">
        <div class="col-sm-3 col-form-label text-sm-right pr-0">
          <label for="confirm_password" class="mb-0">Confirm New Password</label>
        </div>
        <div class="col-sm-9">
          <input type="password" class="form-control brc-on-focus col-sm-8 col-md-6 d-inline-block" placeholder="Confirm New Password" id="confirm_password" name="confirm_password">
          <a href="#" id="toggle-password" class="btn btn-sm border-0 btn-white ml-n5 no-underline radius-1 d-style">
            <i class="fa fa-eye-slash text-90 d-n-active w-3"></i>
            <i class="fa fa-eye text-90 d-active w-3"></i>
          </a>
        </div>
      </div>

      <div class="mt-5 border-t-1 brc-secondary-l2 py-35 mx-n25">
        <div class="offset-md-3 col-md-9 text-nowrap">
          <button class="btn btn-info btn-bold px-4" type="submit">
            <i class="fa fa-check mr-1"></i>
            Submit
          </button>
        </div>
      </div>
    </form>
  </div><!-- /.card-body -->
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