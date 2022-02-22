@extends('layouts.portal', [
    'menu' => 'Report',
    'sub_menu' => 'Report'
])
@section('module','Report ')
@section('element','Form')
<style>



    .center {
        margin-left: auto;
        margin-right: auto;
    }

    @media screen {
        #printSection {
            display: none;
        }
    }




    @media print {
        body * {
            visibility: hidden;
        }

        #printSection,
        #printSection * {
            visibility: visible;
        }

        #printSection {
            position: absolute;
            left: 0;
            top: 0;
        }
    }
</style>

@section('content')

<br>
<div class="block">


    <div class="block-content block-content-full">
        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
        @endif
         <div role="main" class="page-content container container-plus">

        <form action="{{route('reportform.search')}}" method="GET" role="search" id="search">
            <div class="form-group form-row" style="margin-bottom: 6px;">

                <label class="col-md-2">Gender</label>
                <div class="col-md-4">
                <select class="form-control"  name="DeptID" id="DeptID">
                    <option value="">Please select</option>
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
                    <option value="Other">Other</option>

                </select>
                </div>
              <label class="col-md-2">province</label>
              <div class="col-md-4">
              <select class="form-control"  name="province_id" id="province_id">
                  <option value="">Please select</option>
                  @foreach($provinces as $province)
                      <option value="{{$province->province_name}}">{{$province->province_name}}</option>
                  @endforeach
              </select>
              </div>
            </div>
           {{-- {{dd($employes)}} --}}
            <div class="form-group form-row" style="margin-bottom: 6px;">

              <label class="col-md-2">Confined In Jail</label>
              <div class="col-md-4">
              <select class="form-control"  name="confined_in_jail" id="DeptID">
                  <option value="">Please select</option>
                  @foreach($jail as $jails)
                      <option value="{{$jails->jail_name}}">{{$jails->jail_name}}</option>
                  @endforeach
              </select>
              </div>
                <label class="col-md-2">Under Section</label>
                <div class="col-md-4">
                <select class="form-control"  name="undersection" id="undersection">
                    <option value="">Please select</option>
                    @foreach($section as $sections)
                        <option value="{{$sections->undersection}}">{{$sections->undersection}}</option>
                    @endforeach
                </select>
                </div>
            </div>
            <div class="form-group form-row" style="margin-bottom: 6px;">

              <label class="col-md-2">Prison Status</label>
              <div class="col-md-4">
              <select class="form-control"  name="DeptID" id="DeptID">
                  <option value="">Please select</option>
                  <option value="Accepted">Accepted</option>
                  <option value="Rejected">Rejected</option>
                  <option value="Jail-Supt">Jail-Supt</option>
                  <option value="Homedept">Homedept</option>
                  <option value="InteriorMinstry">InteriorMinstry</option>
                  <option value="HumanrRightDepartment">HumanrRightDepartment</option>

              </select>
              </div>
                <label class="col-md-2">Phyical Status</label>
                <div class="col-md-4">
                <select class="form-control"  name="DeptID" id="DeptID">
                    <option value="">Please select</option>
                    @foreach($physicalstatus as $physicalstatuses)
                        <option value="{{$physicalstatuses->PhysicalStatus}}">{{$physicalstatuses->PhysicalStatus}}</option>
                    @endforeach
                </select>
                </div>
            </div>
            <div class="form-group form-row" style="margin-bottom: 6px;">

              <label class="col-md-2">Multiple Date</label>
              <div class="col-md-4">
                <div class="form-row">
                    <div class="col">
                      <input id="id-daterange-from" name = "fromdate" class="form-control ex-inputs-start" placeholder="From date">
                    </div>

                    <div class="text-grey-l2">_</div>

                    <div class="col">
                      <input id="id-daterange-to" name = "todate" class="form-control ex-inputs-end" placeholder="To date">
                    </div>
                  </div>

                  <div id="id-daterange-container" class="dp-daterange-picker dp-daterange-above"></div>
                </div>
              </div>
            </div>

            </div>
            <br>
              <div class="col-md-12" style="text-align: right;">
                <button type="submit" id="searchbtn" class="btn btn-info">Search</button>
                <button type="button" id="resetbtn" class="btn btn-success" onclick="document.getElementById('EmployeeID').value = null; document.getElementById('searchbtn').click(); return false;">Reset</button>
              </div>
            </div>
            </form>

  <tr>
    <a href="{{ route('pdfview',['download'=>'pdf']) }}">Download PDF</a>
    <table class="table table-bordered table-striped table-vcenter js-dataTable-buttons table_id">
  <thead>
  <tr>
    <th class="p-3 mb-2 bg-success text-white" style="width: 80px;">ID</th>
    <th class="p-3 mb-2 bg-success text-white">Name</th>
    <th class="p-3 mb-2 bg-success text-white">Father Name</th>


    <th class="p-3 mb-2 bg-success text-white">Nationality</th>
    <th class="p-3 mb-2 bg-success text-white">Confined in jail</th>
    <th class="p-3 mb-2 bg-success text-white">Status</th>

  </tr>
  </thead>
  <tbody>

  @foreach ($searchs as $key=>$petition)
    <tr>
        <td class="text-center font-size-sm">{{$key+1}}</td>
        <td>{{ $petition->name }}</td>
        <td>{{ $petition->f_name }}</td>
        <td>{{ $petition->nationality }}</td>
        <td>{{ $petition->confined_in_jail }}</td>
        <td>{{ $petition->status }}</td>

        {{-- <td class="text-600 text-orange-d2"><img src="{{url('/myfiles/'.$employe->PicturePath)}}" class="user-image" alt="User Image" width = "60px" ></td> --}}



    </tr>
  @endforeach
  </tbody>
</table>
</div>
</div>


@endsection
