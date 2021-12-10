
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
              
              <form style="margin-left:12px; margin-right:12px;padding-top:12px" action="#" method="post" enctype="multipart/form-data">
                         @csrf   
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
    <div class="form-group col-md-6">
          <label for="inputState">Warrent Information</label>
      <input type="text" name="warrentinformation" placeholder="Enter Warrent Information" class="form-control" id="inputCity">
    </div>
    <div class="form-group col-md-6">
    <label for="inputCity">Sentence in Court</label>
      <input type="text" name="Sentence in Court"  placeholder="Enter name of Court"class="form-control" id="inputCity">
     
    </div>
  </div>
 
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="form-field-select-11">Physical Status</label>
      <select class="ace-select text-dark-m1 bgc-default-l5 bgc-h-warning-l3 brc-default-m3 brc-h-warning-m1"  name="physicalstatus" id="form-field-select-11">
      <option value='WV'>West Virginia</option>
                        <option value='WI'>Wisconsin</option>
                        <option value='WY'>Wyoming</option>
                      </select>
    </div>
    <div class="form-group col-md-6">
      <label for="inputState">Fir & Date</label>
      <input type="text" name="firdate" class="form-control" id="inputCity">
    </div>
  
  </div>
  <div class="form-row">
    <div class="form-group col-md-6">
     
      <label for="form-field-select-11">Confined In Jail</label>
      <select class="ace-select text-dark-m1 bgc-default-l5 bgc-h-warning-l3 brc-default-m3 brc-h-warning-m1" id="form-field-select-11">
      <option value='WV'>West Virginia</option>
                        <option value='WI'>Wisconsin</option>
                        <option value='WY'>Wyoming</option>
                      </select>
    </div>
    <div class="form-group col-md-6">
    <label for="inputState">Mercy petition Date</label>
     
     <input type="date" class="form-control" placeholder=" Pick Mercy petition Date">
    </div>
  
  </div>
  <div class="form-row">
    <div class="form-group col-md-6">
    <label for="form-field-select-11">Gender</label>
    <select class="ace-select text-dark-m1 bgc-default-l5 bgc-h-warning-l3 brc-default-m3 brc-h-warning-m1" id="form-field-select-11">
      <option value='WV'>West Virginia</option>
                        <option value='WI'>Wisconsin</option>
                        <option value='WY'>Wyoming</option>
                      </select>
    </div>
    <div class="form-group col-md-6">
    <label for="form-field-select-11">Section</label>
    <select class="ace-select text-dark-m1 bgc-default-l5 bgc-h-warning-l3 brc-default-m3 brc-h-warning-m1" id="form-field-select-11">
     
                        <option value='WI'>Wisconsin</option>
                        <option value='WY'>Wyoming</option>
                      </select>
    </div>
  
  </div>

  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputCity">Application Attachment</label>
      <input type="file"  name="applicationattachment"class="ace-file-input" id="ace-file-input1">
    </div>
    <div class="form-group col-md-6">
      <label for="inputState">Health Report Attachment</label>
      <input type="file" name="healthreportattachment" class="ace-file-input" id="ace-file-input22">
    </div>
  
  </div>
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputCity">Presion Image</label>
      <input type="file" name="presionimage" class="ace-file-input" id="ace-file-input12">
    </div>
    <div class="form-group col-md-6">
      <label for="inputState">Warrent File Attachment</label>
      <input type="file" name="warrentfileattachment" class="ace-file-input"  id="ace-file-input13">
    </div>
  
  </div>
  <div class="form-row">
    <div class="form-group col-md-6">
    <label for="inputState">Mercy petition Date</label>
     
     <input type="Date"  name="mercypetitiondate" class="form-control" placeholder=" Pick Mercy petition Date" >
    </div>
    <div class="form-group col-md-6">
    <label for="inputCity">Date of sentence</label>
      <input type="Date" class="form-control" id="inputCity">
    </div>
  
  </div>
  <div class="form-row">
    <div class="form-group col-md-6">
    <label for="form-field-select-11">
                       Nationality
                      </label>

                      <select name="nationality" class="ace-select text-dark-m1 bgc-default-l5 bgc-h-warning-l3 brc-default-m3 brc-h-warning-m1" id="form-field-select-11">
                        <option value="">Choose Option</option>
                        <option value='AL'>Pakistan</option>
                        <option value='AK'>Afghanistan</option>
                        
                      </select>
    </div>
    <div class="form-group col-md-6">
      <label for="inputState">Warrent Date (Jail entry Date)</label>
     
                    <input type="Date" class="form-control" placeholder=" Pick Warrent Date (Jail entry Date)">
                    
   
  
  </div>
</div>
  <div class="form-row">
    <div class="form-group col-md-12">
      
      <label for="inputCity">Other FIle Attchment</label>
      <input type="file" class="ace-file-input" id="ace-file-input2" multiple="">
    </div>
    
  
  </div>
 

  

                  <div class="mt-5 border-t-1 brc-secondary-l2 py-35 mx-n25">
                    <div class="offset-md-3 col-md-9 text-nowrap">
                      <button class="btn btn-info btn-bold px-4" type="button">
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
         
            </div><!-- /.card -->
</div>
<script>
  
  </script>
@endsection