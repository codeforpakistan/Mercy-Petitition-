@extends('layouts.portal', [
'menu' => 'system_setting',
'sub_menu' => 'Jail'
])
@section('module', 'system_setting')
@section('element', 'Add Jail')

@section('content')
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
    <div class="card bcard mt-2 mt-lg-3">
        <div class="card-header">
            <h3 class="card-title text-125">
                <i class="far fa-edit text-dark-l3 mr-1"></i>
                Create New Jail
            </h3>
        </div>
        <div class="card-body px-3 pb-1">
            <form class="mt-lg-3" autocomplete="off" action="{{ route('jail.store') }}" method="post">
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
                        <label for="province" class="mb-0">Jail name</label>
                    </div>
                    <div class="col-sm-5 col-12 tag-input-styler d-inline-flex align-items-center">
                        <input type="text" onkeyup="this.value=this.value.replace(/[^A-Za-z\s]/g,'');"
                            class="form-control form-control-lg pr-5" name="jail_name" id="jail_name"
                            placeholder="Enter jail name">
                    </div>
                </div>
                <div class="form-group row">

                    <div class="col-sm-3 col-form-label text-sm-right pr-0">
                        <label for="province_id" class="mb-0">Province</label>
                    </div>
                    <div class="col-sm-5 col-12 tag-input-styler d-inline-flex align-items-center">
                        <select class="form-control form-control-lg pr-5"  name="province_id" id="province_id">
                            <option value="">Please select</option>
                          @foreach($provinces as $province)
                                <option value="{{$province->id}}" >{{$province->province_name}}</option>
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