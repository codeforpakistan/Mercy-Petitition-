@extends('layouts.portal', [
    'menu' => 'Report',
    'sub_menu' => 'Report'
])
@section('module','Report ')
@section('element','Form')


@section('content')


<?php
 $gender = request()->input('gender');
 $province= request()->input('province');

?>


<div role="main" class="page-content container-fluid" style="margin-top:5%;margin-left:-29px;box-shadow: rgba(253, 253, 253, 0.05) 0px 6px 24px 0px, rgba(255, 255, 255, 0.08) 0px 0px 0px 1px;background-color: white">
        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
        @endif


        <form action="{{route('reportform.search')}}" method="GET" role="search" id="search">
            <div class="form-group form-row" style="margin-bottom: 6px;">

                <label class="col-md-2">Gender</label>
                <div class="col-md-4">
                <select class="form-control"   name="gender" id="DeptID">

                  <option value="">Please select</option>
                    <option @if( old('gender', request()->input('gender')) == 'male') selected @endif value="male" >Male</option>

                    <option  @if( old('gender', request()->input('gender')) == 'female') selected @endif value="female" >Female</option>

                    <option  @if( old('gender', request()->input('gender')) == 'Other') selected @endif value="Other" >Other</option>




                </select>
                </div>

              <label class="col-md-2">province</label>
              <div class="col-md-4">
              <select class="form-control" name="province" id="province_id">
                  <option value="">Please select</option>

                  @foreach($provinces as $province)


                      <option @if((int)old('province', request()->input('province')) === $province->id) selected @endif  value="{{$province->id}}" >{{$province->province_name}}</option>

                  @endforeach
              </select>
              </div>
            </div>
           {{-- {{dd($employes)}} --}}
            <div class="form-group form-row" style="margin-bottom: 6px;">

              <label class="col-md-2">Confined In Jail</label>
              <div class="col-md-4">
              <select class="form-control"  name="confinedinjail" id="DeptID">
                  <option value="">Please select</option>
                  @foreach($jail as $jails)
                      <option  @if( old('confinedinjail', request()->input('confinedinjail')) == $jails->jail_name) selected @endif value="{{$jails->jail_name}}">{{$jails->jail_name}}</option>
                  @endforeach
              </select>
              </div>
                <label class="col-md-2">Under Section</label>
                <div class="col-md-4">
                <select class="form-control"  name="undersection" id="undersection">
                    <option value="">Please select</option>
                    @foreach($section as $sections)
                        <option @if((int) old('undersection', request()->input('undersection')) === $sections->id) selected @endif value="{{$sections->id}}">{{$sections->undersection}}</option>
                    @endforeach
                </select>
                </div>
            </div>
            <div class="form-group form-row" style="margin-bottom: 6px;">

              <label class="col-md-2">Prison Status</label>
              <div class="col-md-4">
              <select class="form-control"    name="status" id="DeptID">
                  <option value="">Please select</option>
                  <option  @if( old('status', request()->input('status')) == 'Accepted') selected @endif value="Accepted">Accepted</option>
                  <option  @if( old('status', request()->input('status')) == 'Rejected') selected @endif value="Rejected">Rejected</option>
                  <option  @if( old('status', request()->input('status')) == 'Jail-Supt') selected @endif value="Jail-Supt">Jail-Supt</option>
                  <option  @if( old('status', request()->input('status')) == 'Homedept') selected @endif value="Homedept">Homedept</option>
                  <option  @if( old('status', request()->input('status')) == 'InteriorMinstry') selected @endif value="InteriorMinstry">InteriorMinstry</option>
                  <option  @if( old('status', request()->input('status')) == 'HumanrRightDepartment') selected @endif value="HumanrRightDepartment">HumanrRightDepartment</option>

              </select>
              </div>
                <label class="col-md-2">Physical Status</label>
                <div class="col-md-4">
                <select class="form-control"  name="physicalstatus" id="DeptID">
                    <option value="">Please select</option>
                    @foreach($physicalstatus as $physicalstatuses)
                        <option  @if((int) old('undersection', request()->input('physicalstatus')) === $physicalstatuses->id) selected  @endif value="{{$physicalstatuses->id}}">{{$physicalstatuses->PhysicalStatus}}</option>
                    @endforeach
                </select>
                </div>
            </div>
            <div class="form-group form-row" style="margin-bottom: 6px;">

              <label class="col-md-2">Multiple Date</label>
              <div class="col-md-4">
                <div id="id-daterange-wrapper" class="pos-rel">
                <div class="form-row">
                    <div class="col">
                      <input id="id-daterange-from"   name = "fromdate" class="form-control ex-inputs-start" placeholder="From date">
                    </div>

                    <div class="text-grey-l2">_</div>

                    <div class="col">
                      <input id="id-daterange-to"   name = "todate" class="form-control ex-inputs-end" placeholder="To date">
                    </div>
                  </div>

                  <div id="id-daterange-container" class="dp-daterange-picker dp-daterange-above"></div>
                </div>
              </div>
            </div>

            <br>

              <div class="row">
                <div class="col-md-6" style="text-align: left;">
                  <button type="button" id="btnExport" onclick="Export()" class="btn btn-info">Export</button>
                  {{-- <i class="fa-solid fa-download" type="button" id="btnExport" onclick="Export()"></i> --}}

                </div>
                <div class="col-md-6" style="text-align: right;">
                  <button type="submit" id="searchbtn" class="btn btn-info">Search</button>
                  <button type="button" id="resetbtn" class="btn btn-success" onclick="document.getElementById('EmployeeID').value = null; document.getElementById('searchbtn').click(); return false;">Reset</button>
                </div>

              </div>



            </form>
            <br>

  <tr>
    <table id="tblCustomers"
    class="table-responsive; overflow: hidden; ">
    <thead class="text-dark-tp3 bgc-grey-l4 text-90 border-b-1 brc-transparent">
  <tr>
    <th class="p-3 mb-2 bg-success text-white" style="width: 80px;">ID</th>
    {{-- <th class="p-3 mb-2 bg-success text-white">id</th> --}}
    <th class="p-3 mb-2 bg-success text-white">Name</th>
    <th class="p-3 mb-2 bg-success text-white">Father Name</th>
    <th class="p-3 mb-2 bg-success text-white">Nationality</th>
    <th class="p-3 mb-2 bg-success text-white">Confined in jail</th>
    <th class="p-3 mb-2 bg-success text-white">gender</th>
    <th class="p-3 mb-2 bg-success text-white">section</th>
    <th class="p-3 mb-2 bg-success text-white">province</th>
    <th class="p-3 mb-2 bg-success text-white">file in department</th>
    <th class="p-3 mb-2 bg-success text-white">physical status</th>
    <th class="p-3 mb-2 bg-success text-white">status</th>
    <th class="p-3 mb-2 bg-success text-white">sentence in court </th>


  </tr>
  </thead>
  <tbody>

  @foreach ($searchs as $petition)
    <tr>
        {{-- <td class="text-center font-size-sm">{{$key+1}}</td> --}}
        <td>{{ $petition->prisonerid }}</td>
        <td>{{ $petition->name }}</td>
        <td>{{ $petition->f_name }}</td>
        <td>{{ $petition->nationality }}</td>
        <td>{{ $petition->confined_in_jail }}</td>
        <td>{{ $petition->gender }}</td>
        <td>{{ $petition->sectionss->undersection }}</td>

        @if($petition->provinces)
        <td>{{ $petition->provinces->province_name }}</td>
        @else
        <td></td>
        @endif
        <td>{{ $petition->file_in_department }}</td>
        @if($petition->physicalstatus)
        <td>{{ $petition->physicalstatus->PhysicalStatus }}</td>
        @else
        <td></td>
        @endif
        <td>{{ $petition->status }}</td>
        <td>{{ $petition->sentence_in_court }}</td>


    </tr>
  @endforeach
  </tbody>
</table>
</div>



@endsection
