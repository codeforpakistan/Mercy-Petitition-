@extends('layouts.portal', [
    'menu' => 'system_setting',
    'sub_menu' => 'users'
])
@section('module','Access Control System')
@section('element','Edit User')


@section('content')
<div class="card bcard mt-2 mt-lg-3">
  <div class="card-header">
    <h3 class="card-title text-125">
      <i class="far fa-edit text-dark-l3 mr-1"></i>
      Update User Info
    </h3>
  </div>
	<div class="card-body px-3 pb-1">
		<form class="mt-lg-3" autocomplete="off" action="{{route('portal.users.update', $user->id)}}" method="post">
            <input type="hidden" name="_method" value="PATCH" />
			@csrf
			@if (count($errors) > 0)
				<div class="alert bgc-red-l4 border-none border-l-4 brc-red-tp1 radius-0 text-dark-tp2" role="alert">
					<div class="position-tl h-102 border-l-4 brc-danger m-n1px rounded-left"></div>
					<h5 class="alert-heading text-danger-m1 font-bolder">
						<i class="fas fa-exclamation-triangle mr-1 mb-1"></i>
						Error
					</h5>
					
					@foreach ($errors->all() as $error)
						<p class="mt-3 mb-0">
							{{ $error }}
						</p>
					@endforeach
				</div>
			@endif
			<div class="form-group row">
				<div class="col-sm-3 col-form-label text-sm-right pr-0">
					<label for="name" class="mb-0">Name</label>
				</div>
				<div class="col-sm-9">
					<input type="text" value="{{$user->name}}" class="form-control col-sm-8 col-md-6" name="name" id="name" placeholder="Enter User Name">
				</div>
			</div>
			<div class="form-group row">
				<div class="col-sm-3 col-form-label text-sm-right pr-0">
					<label for="email" class="mb-0">Email</label>
				</div>
				<div class="col-sm-9">
					<input type="text" value="{{$user->email}}" class="form-control col-sm-8 col-md-6" id="email" name="email" placeholder="Enter User Email">
				</div>
			</div>
			<div class="form-group row">
				<div class="col-sm-3 col-form-label text-sm-right pr-0">
					<label for="password" class="mb-0">New Password</label>
				</div>
				<div class="col-sm-9">
					<div class="d-inline-flex align-items-center">
						<input type="password" class="form-control form-control-lg pr-5" placeholder="Enter Password" name="password" spellcheck="false" id="password">
						<a href="#" id="toggle-password" class="btn btn-sm border-0 btn-white btn-h-light-orange btn-a-light-orange text-125 ml-n5 no-underline radius-1 d-style">
							<i class="fa fa-eye-slash text-90 d-n-active w-3"></i>
							<i class="fa fa-eye text-90 d-active w-3"></i>
						</a>
					</div>
				</div>
			</div>
			<div class="form-group row">
				<div class="col-sm-3 col-form-label text-sm-right pr-0">
					<label for="confirm-password" class="mb-0">Confirm New Password</label>
				</div>
				<div class="col-sm-9">
					<div class="d-inline-flex align-items-center">
						<input type="password" class="form-control form-control-lg pr-5" placeholder="Confirm Password" name="confirm-password" spellcheck="false" id="confirm-password">
						<a href="#" id="toggle-password" class="btn btn-sm border-0 btn-white btn-h-light-orange btn-a-light-orange text-125 ml-n5 no-underline radius-1 d-style">
							<i class="fa fa-eye-slash text-90 d-n-active w-3"></i>
							<i class="fa fa-eye text-90 d-active w-3"></i>
						</a>
					</div>
				</div>
			</div>
			<div class="form-group row">
				<div class="col-sm-3 col-form-label text-sm-right pr-0">
					<label for="roles">User Role</label>
				</div>
				<div class="col-sm-5 col-12 tag-input-style">
					<select multiple id="roles" name="roles[]" class="select2 form-control" data-placeholder="Choose Role For User...">
						@foreach($roles as $role)
							<option value="{{$role->name}}" {{array_search($role->name, $userRole) ? 'selected' : ''}}>{{$role->name}}</option>
						@endforeach
					</select>
				</div>
			</div>

			<div class="mt-5 border-t-1 brc-secondary-l2 py-35 mx-n25">
				<div class="offset-md-3 col-md-9 text-nowrap">
						<button class="btn btn-info btn-bold px-4" type="submit">
							<i class="fa fa-check mr-1"></i>
							Submit
						</button>
						<button class="btn btn-outline-lightgrey btn-bold ml-2 px-4" type="reset">
							<i class="fa fa-undo mr-1"></i>
							Reset
						</button>
						<a href="{{route('portal.users.index')}}" class="btn btn-outline-lightgrey btn-bold ml-2 px-4">
							<i class="fa fa-arrow-left mr-1"></i>
							Cancel
						</a>
				</div>
			</div>
		</form>
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