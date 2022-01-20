
@extends('layouts.portal', [
    'menu' => 'IGP',
    'sub_menu' => 'Petition'
])
@section('module','IGP Management')
@section('element','Add Petition')

@section('content')
<div role="main" class="page-content container container-plus">

            <div class="card bcard mt-2 mt-lg-3">
              <div class="card-header">
                <h3 class="card-title text-125">
                  <i class="far fa-edit text-dark-l3 mr-1"></i>
                Add New Petion

                </h3>
              </div>

                         <!-- @if ($errors->any())
        <div class="alert alert-danger">

            <ul>

                @foreach ($errors->all() as $error)
                {{ $error }}<br />
                @endforeach
            </ul>

        </div><br />
        @endif -->
              <form style="margin-left:12px; margin-right:12px;padding-top:12px" action="{{route('storepetition')}}" method="post" enctype="multipart/form-data">
              @csrf
              <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputEmail4">Name</label>
      <input type="text" onkeyup="this.value=this.value.replace(/[^A-Za-z\s]/g,'');" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}" name="name" class="form-control" id="inputEmail4" placeholder="Enter Name">
      @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
    </div>
    <div class="form-group col-md-6">
      <label for="inputPassword4">Father Name</label>
      <input onkeyup="this.value=this.value.replace(/[^A-Za-z\s]/g,'');" type="text" class="form-control @error('f_name') is-invalid @enderror" value="{{ old('f_name') }}" name="f_name" class="form-control" id="inputPassword4" placeholder="Father Name">
      @error('f_name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
    </div>
  </div>
  <div class="form-row">

    <div class="form-group col-md-6">
    <label for="inputState">DOB</label>

     <input type="date"  class="form-control @error('f_name') is-invalid @enderror" value="{{ old('dob') }}" name="dob" class="form-control" >
     @error('dob')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
    </div>
    <div class="form-group col-md-6">
        <label for="form-field-select-11">
                           Nationality
                          </label>

                          <select  class="form-control @error('nationality') is-invalid @enderror" value="{{ old('nationality') }}" name="nationality" class="ace-select text-dark-m1 bgc-default-l5 bgc-h-warning-l3 brc-default-m3 brc-h-warning-m1" id="form-field-select-11">

                            <option value='Pakistan'>Pakistan</option>
                            <option value='Afghanistan'>Afghanistan</option>

                          </select>
                          @error('nationality')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
        </div>

  </div>


  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="form-field-select-11">Physical Status</label>
      <select  class="form-control @error('physicalstatus') is-invalid @enderror" value="{{ old('physicalstatus') }}" class="ace-select text-dark-m1 bgc-default-l5 bgc-h-warning-l3 brc-default-m3 brc-h-warning-m1"  name="physicalstatus" id="form-field-select-11">
      <option value='TB'>TB</option>
                        <option value='Cancer'>Cancer</option>
                        <option value='LungsCancer'>LungsCancer</option>
                      </select>
                      @error('physicalstatus')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
    </div>
    <div class="form-group col-md-6">
      <label for="inputState">Fir & Date</label>
      <input onkeyup="this.value=this.value.replace(/[^-/0-9\s]/g,'');" class="form-control @error('firdate') is-invalid @enderror"  value="{{ old('firdate') }}" type="text" name="firdate" class="form-control" id="inputCity">
      @error('firdate')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
    </div>

  </div>

  <div class="form-row">
    <div class="form-group col-md-6">
    <label for="form-field-select-11">Gender</label>
    <select class="form-control @error('gender') is-invalid @enderror" value="{{ old('gender') }}" name="gender" class="ace-select text-dark-m1 bgc-default-l5 bgc-h-warning-l3 brc-default-m3 brc-h-warning-m1" id="form-field-select-11">
      <option value='male'>Male</option>
                        <option value='female'>Female</option>
                        <option value='other'>Other</option>
                      </select>
                      @error('gender')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
    </div>
    <div class="form-group col-md-6">
    <label for="form-field-select-11">Section</label>
    <select  class="form-control @error('section_id') is-invalid @enderror" value="{{ old('section_id') }}"  name="section_id" class="ace-select text-dark-m1 bgc-default-l5 bgc-h-warning-l3 brc-default-m3 brc-h-warning-m1" id="form-field-select-11">
    @foreach ($sections as $section)
                        <option value='{{$section->id}}'>{{$section->undersection}}</option>
                       @endforeach
                      </select>
                      @error('section_id')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
    </div>

  </div>
  <div class="form-row">
    <div class="form-group col-md-6">
    <label for="inputState">Mercy petition Date</label>

     <input  class="form-control @error('mercypetitiondate') is-invalid @enderror" value="{{ old('mercypetitiondate') }}" type="Date"  name="mercypetitiondate" class="form-control" placeholder=" Pick Mercy petition Date" >
     @error('mercypetitiondate')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
    </div>
    <div class="form-group col-md-6">
    <label for="inputCity">Date of sentence</label>
      <input class="form-control @error('date_of_sentence') is-invalid @enderror" value="{{ old('date_of_sentence') }}" type="Date" name="date_of_sentence"class="form-control" id="inputCity">
      @error('date_of_sentence')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
    </div>

  </div>

    <div class="form-row">
    <div class="form-group col-md-6">
        <label for="inputCity">Sentence in Court</label>
          <input onkeyup="this.value=this.value.replace(/[^A-Za-z\s]/g,'');"  class="form-control @error('sentence_in_court') is-invalid @enderror" value="{{ old('sentence_in_court') }}" type="text" name="sentence_in_court"  placeholder="Enter name of Court"class="form-control" id="inputCity">
          @error('sentence_in_court')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
        </div>

    <div class="form-group col-md-6">
      <label for="inputState">Warrent Date (Jail entry Date)</label>
    <input  class="form-control @error('warrent_date') is-invalid @enderror" value="{{ old('warrent_date') }}" type="Date" class="form-control" name="warrent_date" placeholder=" Pick Warrent Date (Jail entry Date)">
    @error('warrent_date')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
  </div>
  </div>

  <div class="form-row">

    <div class="form-group col-md-12">
    <h3 class="text-primary-d2 text-140 mb-3">
    warrent information
                </h3>
                <div class="card bcard border-1 brc-dark-l1">
                  <div class="card-body p-0">

                      <textarea onkeyup="this.value=this.value.replace(/[^A-Za-z0-9\s]/g,'');" class="form-control @error('warrent_information') is-invalid @enderror"  id="summernote" name="warrent_information">{{ old('warrent_information') }}</textarea>
                      @error('warrent_information')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror

                  </div>
                </div>
    </div>
  </div>

  @error('application_image')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
  <div class="form-row" style="margin:5px;">

    <div class="form-group col-md-6">
      <label for="inputCity">Application Attachment</label>
      <input accept=".pdf,.png,.jpeg,.jpg"  class="form-control @error('application_image') is-invalid @enderror"  value="{{ old('application_image') }}" type="file"  name="application_image"class="ace-file-input" id="ace-file-input1">

    </div>
    @error('health_paper')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
    <div class="form-group col-md-6">

      <label for="inputState">Health Report Attachment</label>
      <input accept=".pdf,.png,.jpeg,.jpg" class="form-control @error('health_paper') is-invalid @enderror"  value="{{ old('health_paper') }}" type="file" name="health_paper" class="ace-file-input" id="ace-file-input22">

    </div>

  </div>
  @error('prisoner_image')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
  <div class="form-row" style="margin:5px;" >


    <div class="form-group col-md-6">
      <label for="inputCity">Prisoner Image</label>
      <input   type="file" accept=".png,.jpeg,.jpg"  value="{{ old('prisoner_image') }}" name="prisoner_image" class="ace-file-input form-control @error('prisoner_image') is-invalid @enderror" id="ace-file-input12">


    </div>

    @error('warrent_file')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
    <div class="form-group col-md-6">

      <label for="inputState">Warrent File Attachment</label>
      <input  type="file" accept=".pdf,.png,.jpeg,.jpg"  value="{{ old('warrent_file') }}"  name="warrent_file" class="ace-file-input form-control @error('warrent_file') is-invalid @enderror"  id="ace-file-input13">

    </div>

    <div class=" form-group col-md-12 mt-5 border-t-1 brc-secondary-l2 py-35 mx-n25" >
                    <div class=" col-md-12 text-nowrap" >
                      <button style="float:right;" class="btn btn-info btn-bold px-4" type="submit">
                        <i class="fa fa-check mr-1"></i>
                        Submit
                      </button>

                      <button style="float:right;" class="btn btn-outline-lightgrey btn-bold ml-2 px-4" type="reset">
                        <i class="fa fa-undo mr-1"></i>
                        Reset
                      </button>
                    </div>
                  </div>
  </div>
</div>
  </div>




                </form>

            </div><!-- /.card -->
</div>

@endsection
