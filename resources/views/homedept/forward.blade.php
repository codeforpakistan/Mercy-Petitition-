@extends('layouts.portal', [
'menu' => 'HomeDepartment',
'sub_menu' => 'Forward'
])
@section('module', 'HomeDepartment Management')
@section('element', 'Forward To')

@section('content')

    <div class="card bcard mt-2 mt-lg-3">
        <div class="card-header">
            <h3 class="card-title text-125">
                <i class="far fa-edit text-dark-l3 mr-1"></i>
                Forward To InteriorMinstry Department
            </h3>
        </div>
        <div class="card-body px-3 pb-1">
            <form class="mt-lg-3" autocomplete="off"
                action="{{ route('forwardinteriorministrydepartment', [request()->route('id')]) }}" method="post"
                enctype="multipart/form-data">
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
                        <label for="name" class="mb-0">PetitionID</label>
                    </div>
                    <div class="col-sm-9">
                        <input type="text" disabled value="{{ request()->route('id') }}"
                            class="form-control col-sm-8 col-md-6" name="name" id="name">
                    </div>
                </div>
               
                <div class="form-group row">
                    <div class="col-sm-3 col-form-label text-sm-right pr-0">
                        <label for="Status"></label>
                    </div>
                    <div class="col-sm-5 col-11 tag-input-style">
                    <input id="Jail-Supt"  value="Jail-Supt"  name="file_in_department" type="radio"><label for='Jail-Supt'>File Back to Jail-Supt</label><br/> 
                </div>
            </div> 
            <div class="form-group row">
                <div class="col-sm-3 col-form-label text-sm-right pr-0">
                    <label for="Status"></label>
                </div>
                <div class="col-sm-5 col-11 tag-input-style">
                <input id="InteriorMinistry"  value="InteriorMinistry"  name="file_in_department" type="radio" checked="checked"><label for='InteriorMinistry'> Forward To InteriorMinistry</label><br/> 
            </div>
        </div> 
                {{-- <div class="form-group row " id="statuss">
                    <div class="col-sm-3 col-form-label text-sm-right pr-0">
                        <label for="Status">Forward TO</label>
                    </div>
                    <div class="col-sm-5 col-11 tag-input-style">
                        <select  name="file_in_department" class="form-control col-sm-8 col-md-11"
                            data-placeholder="Choose Role For User...">
                            
                            <option value='InteriorMinistry'>InteriorMinistry</option>

                        </select>
                    </div>
                </div> --}}

                <div class="form-group row">
                    <div class="col-sm-3 col-form-label text-sm-right pr-0">
                        <label for="email" class="mb-0">Otherdocuments</label>
                    </div>
                    <div class="col-sm-4">
                        <input type="file" class="ace-file-input" name="otherdocument[]" id="ace-file-input2" multiple=""
                            accept=".pdf,.png,.jpeg,.jpg">

                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-3 col-form-label text-sm-right pr-0">
                        <label for="email" class="mb-0">Remarks</label>
                    </div>
                    <div class="col-sm-9">

                        <div class="card bcard border-1 brc-dark-l1">
                            <div class="card-body p-0">
                                <!-- <form method="post"> -->
                                <textarea id="summernote" name="remarks"></textarea>
                                <!-- </form> -->
                            </div>
                        </div>

                    </div>


                </div>
                <div class="form-group row">
                
                    <div class="col-sm-6 col-form-label text-sm-right pr-0">
                        <input  class=" @error('checking') is-invalid @enderror" type="checkbox" id="checking" name="checking" value="checking" required>
                        <label for="vehicle1"> I agree that i have reviewed the above documents</label><br>
                    </div>
                   
                </div>
                <div class="mt-5 border-t-1 brc-secondary-l2 py-35 mx-n25">
                    <div class="offset-md-3 col-md-9 text-nowrap">
                        <button class="btn btn-info btn-bold px-4 " type="submit">
                            <i class="fa fa-check mr-1"></i>
                            Forward
                        </button>

                    </div>
                </div>


            </form>
        </div>
    </div>

@endsection
