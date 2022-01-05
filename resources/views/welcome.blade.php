@extends('layouts.portal')

@section('content')

            <!-- stat boxes -->
            <div class="row px-2 mt-3" >
              <div class="col-12 col-sm-6 col-lg-4 px-2 mb-2 mb-lg-0" >
                <div class="bcard h-100 d-flex align-items-center p-3" >
                  <div>
                    <span class="d-inline-block bgc-green-d1 p-3 radius-round text-center border-4 brc-green-l2">
                 <i class="fa fa-cog w-4 text-180 text-white-tp1"></i>
             </span>
                  </div>

                  <div class="ml-3">
                    <div class="pos-rel">

                      <span class="text-dark-tp3 text-180">{{ $totalpetitions }}</span>


                    </div>
                    <div class="text-dark-tp4">Total Petitions</div>
                  </div>

                  <div class="position-tr m-1">
                    <!-- the dropdown used in some boxes (cards) -->

                  </div>
                </div>
              </div>



              <div class="col-12 col-sm-6 col-lg-4 px-2 mb-2 mb-lg-0" >
                <div class="bcard h-100 d-flex align-items-center p-3" >

                  <div>
                    <span class="d-inline-block bgc-warning-d1 p-3 radius-round text-center border-4 brc-warning-l2">
                 <i class="fa fa-cog text-white text-170 w-4 h-4"></i>
             </span>
                  </div>

                  <div class="ml-3">
                    <div class="pos-rel">
                      <span class="text-dark-tp3 text-180">{{ $newpetitionToday }}</span>

                    </div>
                    <div class="text-dark-tp4 text-110">New Petitions</div>
                  </div>

                  <!-- this is a dropdown with tooltips -->


                </div>
              </div>





              <div class="col-12 col-sm-6 col-lg-4 px-2 mb-2 mb-lg-0" >
                <div class="bcard h-100 d-flex align-items-center p-3" >

                  <div>
                    <span class="d-inline-block bgc-primary p-3 radius-round text-center border-4 brc-primary-l2">
                 <i class="fas fa-cog text-white text-170 w-4 h-4"></i>
             </span>
                  </div>

                  <div class="ml-3 flex-grow-1">
                    <div>
                      <span class="text-dark-tp3 text-180">520k</span>


                    </div>
                    <div class="text-dark-tp4 text-110">Inprocess Petitons</div>
                  </div>

                  <div class="mr-auto">
                    <canvas id="infobox-chart1" style="width: 70px;"></canvas>
                  </div>

                  <div class="position-tr m-1">
                    <!-- the dropdown used in some boxes (cards) -->

                  </div>

                </div>
              </div>

            </div>
            <!-- here is start 2nd row -->
             <!-- stat boxes -->
             <div class="row px-2 mt-3" >
             @can('HomeDepartment-list')
              <div class="col-12 col-sm-6 col-lg-4 px-2 mb-2 mb-lg-0" >
                <div class="bcard h-100 d-flex align-items-center p-3" >
                  <div>
                    <span class="d-inline-block bgc-green-d1 p-3 radius-round text-center border-4 brc-green-l2">
                 <i class="fa fa-cog w-4 text-180 text-white-tp1"></i>
             </span>
                  </div>

                  <div class="ml-3">
                    <div class="pos-rel">

                      <span class="text-dark-tp3 text-180">85k</span>


                 </span>
                    </div>
                    <div class="text-dark-tp4">Home Department</div>
                  </div>

                  <div class="position-tr m-1">
                    <!-- the dropdown used in some boxes (cards) -->

                  </div>
                </div>
              </div>
@endcan
@can('interior-list')

              <div class="col-12 col-sm-6 col-lg-4 px-2 mb-2 mb-lg-0" >
                <div class="bcard h-100 d-flex align-items-center p-3" >

                  <div>
                    <span class="d-inline-block bgc-warning-d1 p-3 radius-round text-center border-4 brc-warning-l2">
                 <i class="fa fa-cog text-white text-170 w-4 h-4"></i>
             </span>
                  </div>

                  <div class="ml-3">
                    <div class="pos-rel">
                      <span class="text-dark-tp3 text-180">3695</span>

                    </div>
                    <div class="text-dark-tp4 text-110">Interior Ministry Department</div>
                  </div>

                  <!-- this is a dropdown with tooltips -->


                </div>
              </div>
@endcan

@can('HomeDepartment-list')
              <div class="col-12 col-sm-6 col-lg-4 px-2 mb-2 mb-lg-0" >
                <div class="bcard h-100 d-flex align-items-center p-3" >

                  <div>
                    <span class="d-inline-block bgc-primary p-3 radius-round text-center border-4 brc-primary-l2">
                 <i class="fas fa-cog text-white text-170 w-4 h-4"></i>
             </span>
                  </div>

                  <div class="ml-3 flex-grow-1">
                    <div>
                      <span class="text-dark-tp3 text-180">2343</span>


                    </div>
                    <div class="text-dark-tp4 text-110">Human Right Department</div>
                  </div>

                  <div class="mr-auto">
                    <canvas id="infobox-chart1" style="width: 70px;"></canvas>
                  </div>

                  <div class="position-tr m-1">
                    <!-- the dropdown used in some boxes (cards) -->

                  </div>

                </div>
              </div>
@endcan


            </div>

            <!-- here is start 3rd row -->
            <div class="row px-2 mt-3" >
              <div class="col-12 col-sm-6 col-lg-6 px-2 mb-2 mb-lg-0" >
                <div class="bcard h-100 d-flex align-items-center p-3" >
                  <div>
                    <span class="d-inline-block bgc-green-d1 p-3 radius-round text-center border-4 brc-green-l2">
                 <i class="fa fa-cog w-4 text-180 text-white-tp1"></i>
             </span>
                  </div>

                  <div class="ml-3">
                    <div class="pos-rel">

                      <span class="text-dark-tp3 text-180">85k</span>


                 </span>
                    </div>
                    <div class="text-dark-tp4">Accepted Petition</div>
                  </div>

                  <div class="position-tr m-1">
                    <!-- the dropdown used in some boxes (cards) -->

                  </div>
                </div>
              </div>



              <div class="col-12 col-sm-6 col-lg-6 px-2 mb-2 mb-lg-0" >
                <div class="bcard h-100 d-flex align-items-center p-3" >

                  <div>
                    <span class="d-inline-block bgc-warning-d1 p-3 radius-round text-center border-4 brc-warning-l2">
                 <i class="fa fa-cog text-white text-170 w-4 h-4"></i>
             </span>
                  </div>

                  <div class="ml-3">
                    <div class="pos-rel">
                      <span class="text-dark-tp3 text-180">369</span>

                    </div>
                    <div class="text-dark-tp4 text-110">Rejected Petition</div>
                  </div>

                  <!-- this is a dropdown with tooltips -->


                </div>
              </div>







            </div>


@endsection
