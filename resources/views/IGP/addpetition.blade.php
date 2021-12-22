
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

              <form style="margin-left:12px; margin-right:12px;padding-top:12px" action="{{route('storepetition')}}" method="post" enctype="multipart/form-data">
                         @csrf   
                         @if ($errors->any())
        <div class="alert alert-danger">

            <ul>

                @foreach ($errors->all() as $error)
                {{ $error }}<br />
                @endforeach
            </ul>

        </div><br />
        @endif
              <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputEmail4">Name</label>
      <input type="text" name="name" class="form-control" id="inputEmail4" placeholder="Enter Name">
    </div>
    <div class="form-group col-md-6">
      <label for="inputPassword4">F-Name</label>
      <input type="text" name="f_name" class="form-control" id="inputPassword4" placeholder="Father Name">
    </div>
  </div>
  <div class="form-row">
    
    <div class="form-group col-md-12">
    <label for="inputCity">Sentence in Court</label>
      <input type="text" name="sentence_in_court"  placeholder="Enter name of Court"class="form-control" id="inputCity">

    </div>
  </div>

  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="form-field-select-11">Physical Status</label>
      <select class="ace-select text-dark-m1 bgc-default-l5 bgc-h-warning-l3 brc-default-m3 brc-h-warning-m1"  name="physicalstatus" id="form-field-select-11">
      <option value='TB'>TB</option>
                        <option value='Cancer'>Cancer</option>
                        <option value='LungsCancer'>LungsCancer</option>
                      </select>
    </div>
    <div class="form-group col-md-6">
      <label for="inputState">Fir & Date</label>
      <input type="text" name="firdate" class="form-control" id="inputCity">
    </div>

  </div>
  <div class="form-row">
   
    <div class="form-group col-md-12">
    <label for="inputState">DOB</label>

     <input type="date" name="dob"class="form-control" >
    </div>

  </div>
  <div class="form-row">
    <div class="form-group col-md-6">
    <label for="form-field-select-11">Gender</label>
    <select name="gender" class="ace-select text-dark-m1 bgc-default-l5 bgc-h-warning-l3 brc-default-m3 brc-h-warning-m1" id="form-field-select-11">
      <option value='male'>Male</option>
                        <option value='female'>Female</option>
                        <option value='other'>Other</option>
                      </select>
    </div>
    <div class="form-group col-md-6">
    <label for="form-field-select-11">Section</label>
    <select name="section_id" class="ace-select text-dark-m1 bgc-default-l5 bgc-h-warning-l3 brc-default-m3 brc-h-warning-m1" id="form-field-select-11">
    @foreach ($sections as $section)
                        <option value='{{$section->id}}'>{{$section->undersection}}</option>
                       @endforeach
                      </select>
    </div>

  </div>
  <div class="form-row">
    <div class="form-group col-md-6">
    <label for="inputState">Mercy petition Date</label>

     <input type="Date"  name="mercypetitiondate" class="form-control" placeholder=" Pick Mercy petition Date" >
    </div>
    <div class="form-group col-md-6">
    <label for="inputCity">Date of sentence</label>
      <input type="Date" name="date_of_sentence"class="form-control" id="inputCity">
    </div>

  </div>
  <div class="form-row">
    <div class="form-group col-md-6">
    <label for="form-field-select-11">
                       Nationality
                      </label>

                      <select name="nationality" class="ace-select text-dark-m1 bgc-default-l5 bgc-h-warning-l3 brc-default-m3 brc-h-warning-m1" id="form-field-select-11">
                       
                        <option value='Pakistan'>Pakistan</option>
                        <option value='Afghanistan'>Afghanistan</option>

                      </select>
    </div>
    <div class="form-group col-md-6">
      <label for="inputState">Warrent Date (Jail entry Date)</label>

                    <input type="Date" class="form-control" name="warrent_date" placeholder=" Pick Warrent Date (Jail entry Date)">



  </div>
</div>
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputCity">Application Attachment</label>
      <input type="file"  name="application_image"class="ace-file-input" id="ace-file-input1">
    </div>
    <div class="form-group col-md-6">
      <label for="inputState">Health Report Attachment</label>
      <input type="file" name="health_paper" class="ace-file-input" id="ace-file-input22">
    </div>

  </div>
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputCity">Prisoner Image</label>
      <input type="file" name="prisoner_image" class="ace-file-input" id="ace-file-input12">
    </div>
    <div class="form-group col-md-6">
      <label for="inputState">Warrent File Attachment</label>
      <input type="file" name="warrent_file" class="ace-file-input"  id="ace-file-input13">
    </div>

  </div>
  <div class="form-row">
 
    <div class="form-group col-md-12">
    <h3 class="text-primary-d2 text-140 mb-3">
    warrent information
                </h3>
                <div class="card bcard border-1 brc-dark-l1">
                  <div class="card-body p-0">
                    <form method="post">
                      <textarea id="summernote" name="warrent_information"></textarea>
                    </form>
                  </div>
                </div>
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
  


 
          

                  
                </form>

            </div><!-- /.card -->
</div>
<script>

  </script>
@endsection
