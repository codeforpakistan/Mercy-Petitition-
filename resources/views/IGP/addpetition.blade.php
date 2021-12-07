@extends('layouts.portal', [
    'menu' => 'system_setting',
    'sub_menu' => 'users'
])
@section('module','User Management')
@section('element','Add New User')

@section('content')
<div role="main" class="page-content container container-plus">

            <div class="card bcard mt-2 mt-lg-3">
              <div class="card-header">
                <h3 class="card-title text-125">
                  <i class="far fa-edit text-dark-l3 mr-1"></i>
                Add New Petion
                </h3>
              </div>
              
              <form style="margin-left:12px; margin-right:12px;padding-top:12px">
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
    <label for="form-field-select-11">
                       Nationality
                      </label>

                      <select class="ace-select text-dark-m1 bgc-default-l5 bgc-h-warning-l3 brc-default-m3 brc-h-warning-m1" id="form-field-select-11">
                        <option value="">&nbsp;</option>
                        <option value='AL'>Alabama</option>
                        <option value='AK'>Alaska</option>
                        <option value='AZ'>Arizona</option>
                        <option value='AR'>Arkansas</option>
                        <option value='CA'>California</option>
                        <option value='CO'>Colorado</option>
                        <option value='CT'>Connecticut</option>
                        <option value='DE'>Delaware</option>
                        <option value='FL'>Florida</option>
                        <option value='GA'>Georgia</option>
                        <option value='HI'>Hawaii</option>
                        <option value='ID'>Idaho</option>
                        <option value='IL'>Illinois</option>
                        <option value='IN'>Indiana</option>
                        <option value='IA'>Iowa</option>
                        <option value='KS'>Kansas</option>
                        <option value='KY'>Kentucky</option>
                        <option value='LA'>Louisiana</option>
                        <option value='ME'>Maine</option>
                        <option value='MD'>Maryland</option>
                        <option value='MA'>Massachusetts</option>
                        <option value='MI'>Michigan</option>
                        <option value='MN'>Minnesota</option>
                        <option value='MS'>Mississippi</option>
                        <option value='MO'>Missouri</option>
                        <option value='MT'>Montana</option>
                        <option value='NE'>Nebraska</option>
                        <option value='NV'>Nevada</option>
                        <option value='NH'>New Hampshire</option>
                        <option value='NJ'>New Jersey</option>
                        <option value='NM'>New Mexico</option>
                        <option value='NY'>New York</option>
                        <option value='NC'>North Carolina</option>
                        <option value='ND'>North Dakota</option>
                        <option value='OH'>Ohio</option>
                        <option value='OK'>Oklahoma</option>
                        <option value='OR'>Oregon</option>
                        <option value='PA'>Pennsylvania</option>
                        <option value='RI'>Rhode Island</option>
                        <option value='SC'>South Carolina</option>
                        <option value='SD'>South Dakota</option>
                        <option value='TN'>Tennessee</option>
                        <option value='TX'>Texas</option>
                        <option value='UT'>Utah</option>
                        <option value='VT'>Vermont</option>
                        <option value='VA'>Virginia</option>
                        <option value='WA'>Washington</option>
                        <option value='WV'>West Virginia</option>
                        <option value='WI'>Wisconsin</option>
                        <option value='WY'>Wyoming</option>
                      </select>
    </div>
    <div class="form-group col-md-6">
       <label for="inputState">Mercy petition Date</label>
     
     <input type="Date"  name="mercypetitiondate" class="form-control" placeholder=" Pick Mercy petition Date" >
    </div>
  </div>
 
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="form-field-select-11">Physical Status</label>
      <select class="ace-select text-dark-m1 bgc-default-l5 bgc-h-warning-l3 brc-default-m3 brc-h-warning-m1"  name="physicalstatus"id="form-field-select-11">
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
      <option value='WV'>West Virginia</option>
                        <option value='WI'>Wisconsin</option>
                        <option value='WY'>Wyoming</option>
                      </select>
    </div>
  
  </div>

  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputCity">Application Attachment</label>
      <input type="file" class="ace-file-input" id="ace-file-input1">
    </div>
    <div class="form-group col-md-6">
      <label for="inputState">Health Report Attachment</label>
      <input type="file" class="ace-file-input" id="ace-file-input22">
    </div>
  
  </div>
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputCity">Presion Image</label>
      <input type="file" class="ace-file-input" id="ace-file-input12">
    </div>
    <div class="form-group col-md-6">
      <label for="inputState">Warrent File Attachment</label>
      <input type="file" class="ace-file-input"  id="ace-file-input13">
    </div>
  
  </div>
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputCity">Other FIle Attchment</label>
      <input type="file" class="ace-file-input" id="ace-file-input2" multiple="">
    </div>
    <div class="form-group col-md-6">
      <label for="inputState">Warrent Information</label>
      <input type="text" name="warrentinformation" class="form-control" id="inputCity">
    </div>
  
  </div>
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputCity">Date of sentence</label>
      <input type="text" class="form-control" id="inputCity">
    </div>
    <div class="form-group col-md-6">
      <label for="inputState">Warrent Date (Jail entry Date)</label>
     
                    <input type="Date" class="form-control" placeholder=" Pick Warrent Date (Jail entry Date)">

                    
           
                     
  
  </div>
</div>
  <div class="form-row">
    <div class="form-group col-md-12">
      <label for="inputCity">Sentence in Court</label>
      <input type="text" class="form-control" id="inputCity">
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