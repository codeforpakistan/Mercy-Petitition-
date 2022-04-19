@extends('layouts.portal', [
'menu' => 'IGP',
'sub_menu' => 'Edit  Case Status'
])
@section('module', 'IGP Management')
@section('element', 'Edit Case Status')

@section('content')
    <div role="main" class="page-content container container-plus">

        <div class="card bcard mt-2 mt-lg-3">
            <div class="card-header">
                <h3 class="card-title text-125">
                    <i class="far fa-edit text-dark-l3 mr-1"></i>
                    Edit  Case Status
                </h3>
            </div>
           

            <form style="margin-left:12px; margin-right:12px;padding-top:12px"
                action="{{ route('inprocessedit-update', [$petitionstatusedit->id]) }}" method="post" enctype="multipart/form-data">
                @csrf
                
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="form-field-select-11">Case Status</label>
                        <select name="status"
                            class="ace-select text-dark-m1 bgc-default-l5 bgc-h-warning-l3 brc-default-m3 brc-h-warning-m1"
                            id="form-field-select-11">
                            <option value='Compromise'>Compromise</option>
                            <option value='Prisoner death'>Prisoner death</option>
                            
                        </select>
                    </div>
                   
                    <div class=" form-group col-md-12 mt-5 border-t-1 brc-secondary-l2 py-35 mx-n25">
                        <div class=" col-md-12 text-nowrap">
                            <button style="float:right;" class="btn btn-info btn-bold px-4" type="submit">
                                <i class="fa fa-check mr-1"></i>
                               Update
                            </button>
    
                           
                        </div>
                    </div>
                </div>
                
                
    


    </form>

    </div><!-- /.card -->
    </div>

@endsection
