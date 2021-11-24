@extends('layouts.portal')
@section('module','Access Control System')
@section('element','Add New Permission')

@section('content')
@if(count($errors) > 0)
    <div class="alert alert-danger">
        <strong>Whoops!</strong> There were some problems with your input.<br><br>
        <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
        </ul>
    </div>
@endif
{!! Form::open(array('url' => 'permissions','method'=>'POST')) !!}
<div class="card bcard mt-2 mt-lg-3">
    <div class="card-header">
        <a class="btn btn-primary" href="{{ url('permissions') }}"> Back</a>
      <h3 class="card-title text-125 text-right">
        <i class="far fa-edit text-dark-l3 mr-1"></i>
        Edit Permission Form
      </h3>
    </div>

    <div class="card-body px-3 pb-1">
        <div class="form-group row">
          <div class="col-sm-3 col-form-label text-sm-right pr-0">
            <label for="id-form-field-1" class="mb-0">
              Permission Title:
            </label>
          </div>
         
          <div class="col-sm-9">
          <input type="text" name="name" value="" class="form-control col-sm-8 col-md-6" id="id-form-field-1">
          </div>
        </div>

        <div class="form-group row">
            <div class="col-sm-3 col-form-label text-sm-right pr-0">
              <label for="id-form-field-1" class="mb-0">
                Friendly Title:
              </label>
            </div>
           
            <div class="col-sm-9">
            <input type="text" name="frindly_title" class="form-control col-sm-8 col-md-6" id="id-form-field-1">
            </div>
          </div>

        <div class="form-group row">
            <div class="col-sm-3 col-form-label text-sm-right pr-0">
              <label for="id-form-field-1" class="mb-0">
                Guard Name:
              </label>
            </div>
  
            <div class="col-sm-9">
                <select name='guard_name' class="form-control col-sm-8 col-md-6" id="form-field-select-1">
                    <option value="web">web</option>
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
          </div>
        </div>
      </form>
    </div><!-- /.card-body -->
  </div>
  {!! Form::close() !!}


{{-- 

<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Create New Permission</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('portal.roles.index') }}"> Back</a>
        </div>
    </div>
</div>


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


{!! Form::open(array('url' => 'permissions','method'=>'POST')) !!}
<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Name:</strong>
            {!! Form::text('name', null, array('placeholder' => 'Name','class' => 'form-control')) !!}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>
{!! Form::close() !!} --}}


@endsection
