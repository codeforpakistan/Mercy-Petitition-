

 <div role="main" class="page-content container container-plus" style="box-shadow: rgba(99, 99, 99, 0.2) 0px 2px 8px 0px;">
            <div class="page-header border-0">
              <h1 class="page-title text-primary-d2 text-140">
              Petition Search
              </h1>
            </div>

              
                  <div class="card-body px-1 px-md-3">
                 
                  <h3 class="text-130 pl-1 mb-3 mb-sm-0">
                   
                        </h3>
                  <div class="row">
              <div class="col-12">
            
            <input type="text"  class="form-control" placeholder="Search" wire:model="searchText" />


</div>
</div>
            <table id="simple-table" class="mb-0 table table-borderless table-bordered-x brc-secondary-l3 text-dark-m2 radius-1 overflow-hidden">
                        <thead class="text-dark-tp3 bgc-grey-l4 text-90 border-b-1 brc-transparent">
                          <tr>


                            <th>
                            Name
                            </th>

                            <th>
                             F_Name
                            </th>

                            <th class="d-none d-sm-table-cell">
                              Nationality
                            </th>

                            <th class='d-none d-sm-table-cell'>
                              Confined IN Jail
                            </th>
                            <th class='d-none d-sm-table-cell'>
                              Status
                          </th>
                          <th class='d-none d-sm-table-cell'>
                              Received from department
                          </th>
                            

                            <th class="d-none d-sm-table-cell">
                             Presion PIC
                            </th>
                            <th> </th>
                           
                            <th>Action</th>
                          </tr>
                        </thead>
                        @foreach($petitions as $petion)
                        <tbody class="mt-1">
                          <tr class="bgc-h-yellow-l4 d-style">


                            <td>
                              <a href='#' class='text-blue-d1 text-600 text-95'>{{$petion->name}}</a>
                            </td>

                            <td class="text-600 text-orange-d2">
                              {{$petion->f_name}}
                            </td>

                            <td class='d-none d-sm-table-cell text-grey-d1'>
                            {{$petion->nationality}}
                            </td>

                            <td class='d-none d-sm-table-cell text-grey text-95'>
                            {{$petion->confined_in_jail}}
                            </td>
                            <td class='d-none d-sm-table-cell text-grey text-95'>
                              @if($petion->status == "Accepted")
                              <span class="badge badge-success mr-1">
                                  {{$petion->status}}
                              </span>
                              @elseif($petion->status == "Rejected")
                              <span class="badge bgc-orange-d2 text-white mr-1">
                                  {{$petion->status}}
                              </span>
                              @else
                              {{$petion->status}}
                              @endif
                              
                             
                          </td>
                          <td class='d-none d-sm-table-cell text-grey text-95'>
                              {{$petion->received_from_department}}
                          </td>

                            <td class='d-none d-sm-table-cell'>
                              <span class='badge badge-sm bgc-warning-d1 text-white pb-1 px-25'><img src="{{ asset('/assets/image/'.$petion->prisoner_image) }}" width="50" height="50" alt="pic"/></span>

                            </td>

                            <td class='text-center pr-0'>
                              <div>
                                <!-- <a href="javascript:void(0)" data-toggle="modal" data-target="#modalFullscreen" class="d-style btn btn-outline-info text-90 text-600 border-0 px-2 collapsed" data-id ="{{$petion->id}}" id="show-user" title="Show Details">
                                  <span class="d-none d-md-inline mr-1">
                                            Details
                                        </span>
                                  <i class="fa fa-angle-down toggle-icon opacity-1 text-90"></i>
                                </a> -->
                              </div>
                            </td>

                            <td>
                              <!-- action buttons -->
                              <div class='d-none d-lg-flex'>
                                <!-- <a href="{{route('petition-edit', [$petion->id])}}" class="mx-2px btn radius-1 border-2 btn-xs btn-brc-tp btn-light-secondary btn-h-lighter-success btn-a-lighter-success">
                                  <i class="fa fa-pencil-alt"></i>
                                </a>

                                <a href="{{route('petition-forward',[$petion->id])}}" class="mx-2px btn radius-1 border-2 btn-xs btn-brc-tp btn-light-secondary btn-h-lighter-success btn-a-lighter-success">
                                    <i class="fa fa-plus"></i>
                                  </a> -->
                                  <a href="javascript:void(0)" data-toggle="modal" data-target="#modalFullscreen" class="d-style btn btn-outline-info text-90 text-600 border-0 px-2 collapsed" data-id ="{{$petion->id}}" id="show-user" title="Show Details">
                                  <span class="d-none d-md-inline mr-1">
                                            Details
                                        </span>
                                  <i class="fa fa-angle-down toggle-icon opacity-1 text-90"></i>
                                </a>

                              </div>

                              <!-- show a dropdown in mobile -->
                              <div class='dropdown d-inline-block d-lg-none dd-backdrop dd-backdrop-none-lg'>
                                <a href='#' class='btn btn-default btn-xs py-15 radius-round dropdown-toggle' data-toggle="dropdown">
                                  <i class="fa fa-cog"></i>
                                </a>

                                <div class="dropdown-menu dd-slide-up dd-slide-none-lg">
                                  <div class="dropdown-inner">
                                    <div class="dropdown-header text-100 text-secondary-d1 border-b-1 brc-secondary-l2 text-600 mb-2">
                                      ace.com
                                    </div>
                                    <a href="{{route('petition-edit', [$petion->id])}}" class="dropdown-item">
                                      <i class="fa fa-pencil-alt text-blue mr-1 p-2 w-4"></i>
                                      Edit
                                    </a>
                                   
                                    
                                  </div>
                                </td>
                            </tr>



                            @endforeach
                          </tbody>

                      </table>

            {{ $petitions->links() }}
            <div class="modal fade modal-fs" id="modalFullscreen" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel2" aria-hidden="true">
              <div class="modal-dialog modal-dialog-scrollable" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel2">
                      Modal title
                    </h5>

                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>


                  <div class="modal-body">
                 {{-- <p id = "show"> </p><input type="text"  >
                 name : <span id="firstname"></span> --}}
                 <div class="b-container1">
                    <div class="bg-black-50">
                        <div class="content content-full text-center">
                            <div id="Prisonerimage"class="my-3 " >
                         <td class="img-avatar img-avatar-thumb"></td>                            </div>
                            <h1 class="h2 text-white mb-0"></h1>
                            <span style="color: white;" id="firstname" class="text-white-75"></span>
                        </div>
                    </div>
                </div>

                 <div class="bg-white border-bottom">
                    <div class="content content-boxed">
                        <div class="row items-push text-center">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-vcenter">
                                    <tbody>
                                        {{-- @foreach ($details as $detail) --}}
                                        <tr>
                                            <td class="text-left">Name:</td>
                                            <td id="firstname" class="font-w600 font-size-sm"></td>
                                            <td class="text-left">Father Name:</td>
                                            <td id ="Fathername" class="font-w600 font-size-sm"></td>
                                        </tr>
                                        {{-- <tr>
                                            <td class="text-left">Name:</td>
                                            <td id="firstname" class="font-w600 font-size-sm"></td>
                                            <td class="text-left">Image:</td>
                                            <td id ="Prisonerimage" style="height: 100px;width:100px;" class="img-avatar img-avatar-thumb"></td>
                                        </tr> --}}
                                        <tr>
                                            <td class="text-left">Nationality:</td>
                                            <td id="Nationality" class="font-w600 font-size-sm"></td>
                                            <td class="text-left">Physical status:</td>
                                            <td id="Physicalstatus" class="font-w600 font-size-sm"></td>
                                        </tr>
                                        <tr>
                                            <td class="text-left">Confined in jail:</td>
                                            <td id="Confined_in_jail" class="font-w600 font-size-sm"></td>
                                            <td class="text-left">Mobile Network:</td>
                                            <td class="font-w600 font-size-sm"></td>
                                        </tr>
                                        <tr>

                                            <td class="text-left">file:</td>
                                          <td class="picss font-w600 font-size-sm pics" id="picss"></td>
                                            
                                            <td class="pic" id="pic"  class=" font-w600 font-size-sm ">
                                           


                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="text-left">Gender:</td>
                                            <td id="Gender" class="font-w600 font-size-sm"></td>
                                            <td class="text-left">Dob:</td>
                                            <td id="Dob" class="font-w600 font-size-sm"></td>
                                        </tr>
                                        <tr>
                                            <td class="text-left">Fir and date:</td>
                                            <td id="fir&date" class="font-w600 font-size-sm"></td>
                                            <td class="text-left">Mercy petition date:</td>
                                            <td id="Mercypetitiondate" class="font-w600 font-size-sm"></td>
                                        </tr>
                                        <tr>
                                            <td class="text-left">Section:</td>
                                            <td id="Section_id" class="font-w600 font-size-sm"></td>
                                            <td class="text-left">Remarks:</td>
                                            <td id="Remarks" class="font-w600 font-size-sm"></td>
                                        </tr>
                                        <tr>
                                            <td class="text-left">Application image:</td>
                                            <span id="application_images"></span>
                                            <td id="application_image" class="font-w600 font-size-sm"></td>
                                            <td class="text-left">Health paper:</td>
                                            <span id="health_papers"></span>
                                            <td id="health_paper" class="font-w600 font-size-sm"></td>
                                        </tr>
                                        <tr>
                                            <td class="text-left">Warrent file:</td>
                                            <span id="warrent_files"></span>
                                            <td id="warrent_file" class="font-w600 font-size-sm"></td>
                                            {{-- <td class="text-left">Health paper:</td>
                                              
                                            <td id="health_paper" class="font-w600 font-size-sm"></td> --}}
                                        </tr>
                                        {{-- @endforeach --}}
                                    </tbody>
                                </table>
                            </div>

                        </div>
                    </div>
                </div>
                  </div>

                </div>

              </div>
            </div>
</div>
</div>
  

