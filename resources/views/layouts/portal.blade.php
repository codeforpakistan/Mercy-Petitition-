<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, height=device-height, initial-scale=1">
    <title>@yield('title', 'Mercy Petition System')</title>
    <link rel="icon" type="image/png" href="{{ asset('assets/image/ig.png') }}" />
    @livewireStyles
    <!-- include common vendor stylesheets & fontawesome -->
    <link rel="stylesheet" type="text/css"
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600&display=swap">
    <link href="https://fonts.googleapis.com/css2?family=Pacifico&display=swap" rel="stylesheet">

    <link rel="stylesheet" type="text/css"
        href="{{ asset('assets/npm/bootstrap@4.5.2/dist/css/bootstrap.min.css') }}">
    <link rel="stylesheet" type="text/css"
        href="{{ asset('assets/npm/fontawesome-5.14.0/css/fontawesome.min.css') }}">
  
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/npm/select2@4.0.13/dist/css/select2.min.css') }}">
    <link rel="stylesheet" type="text/css"
    href="{{ asset('assets/css/jquery.steps.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/npm/basictable@1.0.9/basictable.min.css') }}">
    <link rel="stylesheet" type="text/css"
        href="{{ asset('assets/npm/summernote@0.8.18\dist/summernote-lite.min.css') }}">
    <link rel="stylesheet" type="text/css"
        href="{{ asset('assets/npm/bootstrap-markdown@2.10.0/css/bootstrap-markdown.min.css') }}">
    <!-- include vendor stylesheets used in "Form Basic Elements" page. see "application/views/default/pages/partials/form-basic/@vendor-stylesheets.hbs" -->
  
    <link rel="stylesheet" type="text/css"
        href="{{ asset('assets/combine\npm\tiny-date-picker@3.2.8\tiny-date-picker.min.css,npm\tiny-date-picker@3.2.8\date-range-picker.min.css') }}">
    <link rel="stylesheet" type="text/css"
        href="{{ asset('assets/npm\eonasdan-bootstrap-datetimepicker@4.17.47\build\css\bootstrap-datetimepicker.min.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('assets/npm/fontawesome-5.14.0/css/regular.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/npm/fontawesome-5.14.0/css/brands.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/npm/fontawesome-5.14.0/css/solid.min.css') }}">
    

   
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/ace.min.css') }}">

    <link rel="stylesheet" href="{{ asset('assets/css/lightbox.min.css') }}">
    



</head>


<style>
    .b-container {
        background-image: linear-gradient(#10073d, #10073d);
        background-attachment: fixed;
        background-repeat: no-repeat;
    }
    .b-containers {
        background-image: linear-gradient(#800000, #db1717);
        background-attachment: fixed;
        opacity: 16px;
        background-repeat: no-repeat;
    }
    .right-column {
        padding: 10px;
        padding-left: 50px;
        background: white;
    }
</style>

<body>
    <div class="body-container">
        <div class="main-container">
            <div id="sidebar"
                class="b-container sidebar sidebar-dark sidebar-color sidebar-fixed sidebar-backdrop expandable"
                data-swipe="true" data-dismiss="true">
                <div class="sidebar-inner">
                    <div class="ace-scroll flex-grow-1 mt-1px" data-ace-scroll="{}">
                        <!-- all sidebar header is inside scrollable area -->
                        <!-- .navbar-brand inside sidebar, only shown in desktop view -->
                        <!-- .navbar-brand inside sidebar, only shown in desktop view -->
                        <div class="d-none d-xl-flex  sidebar-section-item fadeable-left fadeable-top">
                            <div class="fadeinable">
                                <!-- shown when sidebar is collapsed -->
                                <div class="py-2 mx-1" id="sidebar-header-brand1">
                                    <a class="navbar-brand text-140">
                                        <span><img src="{{ asset('assets/image/ig.png') }}" style="width: 50px" ;>
                                    </a>
                                </div>
                            </div>

                            <div class="fadeable w-100">
                                <!-- shown when sidebar is full-width -->
                                <div class="py-2 text-center mx-3" id="sidebar-header-brand2">

                                    <a class="navbar-brand ml-n2 text-140 text-white " href="#">
                                        {{-- <i class="fa fa-leaf mr-1 text-success-l1"></i> --}}
                                        <span class="text-danger"><img src="{{ asset('assets/image/ig1.png') }}"
                                                style="width: 70px" ;></span>
                                        <span style="color:rgb(250, 250, 250)"> Mercy </span><span
                                            style="color:rgb(250, 250, 250)">Petition</span>
                                    </a>
                                </div>

                            </div>
                        </div><!-- /.sdebar-section-item  -->
                        <?php
                      use  App\Petition;
                        //  use  Auth;
                        if (Auth::user()->confined_in_jail == "") {
            $totalpetitions = Petition::where('province_id', '=', Auth::user()->province_id)->orderBy("id", "desc")->get()->count();
        } else {
            $totalpetitions = Petition::where('province_id', '=', Auth::user()->province_id)->Where('confined_in_jail', Auth::user()->confined_in_jail)->Where('file_in_department', 'Jail-Supt')->Where('received_from_department', null)->orderBy("id", "desc")->get()->count();

        }
        if (Auth::user()->confined_in_jail == "") {
            $recievefromhometotalpetitions = Petition::where('province_id', '=', Auth::user()->province_id)->Where('file_in_department', 'Jail-Supt')->orderBy("id", "desc")->get()->count();

        }else{
            $recievefromhometotalpetitions = Petition::where('province_id', '=', Auth::user()->province_id)->Where('confined_in_jail', Auth::user()->confined_in_jail)->Where('file_in_department', 'Jail-Supt')->Where('received_from_department', 'HomeDepartment')->orderBy("id", "desc")->get()->count();

        }
                        $HomeDepartment = Petition::where('province_id', '=', Auth::user()->province_id)->Where('file_in_department', 'HomeDepartment')->Where('received_from_department', 'Jail-Supt')->orderBy("id", "desc")->get()->count();
                        $receivefrominterior = Petition::where('province_id', '=', Auth::user()->province_id)->Where('file_in_department', 'HomeDepartment')->Where('received_from_department', 'InteriorMinistry')->orderBy("id", "desc")->get()->count();
                        $InteriorMinistryDepartment = Petition::Where('file_in_department', 'InteriorMinistry')->Where('received_from_department', 'HomeDepartment')->Where('status', 'pending')->orderBy("id", "desc")->get()->count();
                        $HumanRightDepartment = Petition::Where('file_in_department', 'HumanRightDepartment')->orderBy("id", "desc")->get()->count();
                        $receivfromHumanRightDepartment = Petition::Where('file_in_department', 'InteriorMinistry')->Where('received_from_department', 'HumanRightDepartment')->where('status','pending')->orderBy("id", "desc")->get()->count();
  
                        if (!empty(Auth::user()->confined_in_jail) && !empty(Auth::user()->province_id)) {

  $Accepted = Petition::where('confined_in_jail', '=', Auth::user()->confined_in_jail)->where('province_id', '=', Auth::user()->province_id)->Where('status', 'Accepted')->orderBy("id", "desc")->get()->count();

} elseif(!empty(Auth::user()->province_id)) {

  $Accepted = Petition::where('province_id', '=', Auth::user()->province_id)->Where('status', 'Accepted')->orderBy("id", "desc")->count();

}else{

  $Accepted = Petition::Where('status', 'Accepted')->orderBy("id", "desc")->count();

}
if (!empty(Auth::user()->confined_in_jail) && !empty(Auth::user()->province_id)) {
  $Rejected = Petition::where('confined_in_jail', '=', Auth::user()->confined_in_jail)->where('province_id', '=', Auth::user()->province_id)->Where('status', 'Rejected')->orderBy("id", "desc")->count();

} elseif(!empty(Auth::user()->province_id)) {

$Rejected = Petition::where('province_id', '=', Auth::user()->province_id)->Where('status', 'Rejected')->orderBy("id", "desc")->count();

}else{

  $Rejected = Petition::Where('status', 'Rejected')->orderBy("id", "desc")->count();

}
if (!empty(Auth::user()->confined_in_jail) && !empty(Auth::user()->province_id)) {
  
  $compromised = Petition::where('confined_in_jail', '=', Auth::user()->confined_in_jail)->where('province_id', '=', Auth::user()->province_id)->Where('status', 'Compromise')->orderBy("id", "desc")->get()->count();

} elseif(!empty(Auth::user()->province_id)) {

  $compromised = Petition::where('province_id', '=', Auth::user()->province_id)->Where('status', 'Compromise')->orderBy("id", "desc")->count();

}else{

  $compromised = Petition::Where('status', 'Compromise')->orderBy("id", "desc")->count();

}
if (!empty(Auth::user()->confined_in_jail) && !empty(Auth::user()->province_id)) {

  $death = Petition::where('confined_in_jail', '=', Auth::user()->confined_in_jail)->where('province_id', '=', Auth::user()->province_id)->Where('status', 'Prisoner death')->orderBy("id", "desc")->get()->count();
 
} elseif(!empty(Auth::user()->province_id)) {

  $death = Petition::where('province_id', '=', Auth::user()->province_id)->Where('status', 'Prisoner death')->orderBy("id", "desc")->count();

}else{

  $death = Petition::Where('status', 'Prisoner death')->orderBy("id", "desc")->count();

}
if (!empty(Auth::user()->confined_in_jail) && !empty(Auth::user()->province_id)) {

  $staypetition = Petition::where('confined_in_jail', '=', Auth::user()->confined_in_jail)->where('province_id', '=', Auth::user()->province_id)->Where('status', 'Stay')->orderBy("id", "desc")->get()->count();
 
} elseif(!empty(Auth::user()->province_id)) {

  $staypetition = Petition::where('province_id', '=', Auth::user()->province_id)->Where('status', 'Stay')->orderBy("id", "desc")->count();

}else{

  $staypetition = Petition::Where('status', 'Stay')->orderBy("id", "desc")->count();

}


?>
                        @include('layouts.navigation-portal',compact('InteriorMinistryDepartment','staypetition','death','compromised','recievefromhometotalpetitions','totalpetitions','HumanRightDepartment','HomeDepartment','InteriorMinistryDepartment','receivfromHumanRightDepartment'))

                    </div>



                </div>
            </div>


            <div role="main" class="main-content">
                <nav class="navbar navbar-sm navbar-expand-lg sidebar-dark navbar-fixed navbar-dark">
                    <div class="b-containers navbar-inner shadow-md sidebar-light"  >

                        <button type="button"
                            class="btn btn-burger align-self-center ml-25 mr-2 d-none d-xl-flex btn-h-lighter-blue"
                            data-toggle="sidebar" data-target="#sidebar" aria-controls="sidebar" aria-expanded="true"
                            aria-label="Toggle sidebar">
                            <span class="bars text-default"></span>
                        </button>

                        <div class="d-flex h-100 justify-content-xl-between align-items-center">
                            <button type="button"
                                class="btn btn-burger burger-arrowed static collapsed ml-2 d-flex d-xl-none btn-h-lighter-blue"
                                data-toggle-mobile="sidebar" data-target="#sidebar" aria-controls="sidebar"
                                aria-expanded="false" aria-label="Toggle sidebar">
                                <span class="bars text-default"></span>
                            </button>

                            {{-- <div class="d-none d-xl-inline-flex">
                  <div>
                    <ol class="breadcrumb breadcrumb-nosep align-items-center pl-1 text-nowrap mr-2">
                      <li class="breadcrumb-item active text-dark-tp4 text-105 text-600">
                        @hasSection('module')
                            @yield('module')
                        @else
                          Welcome to Dashboard
                        @endif
                      </li>
                    </ol>
                  </div>
                </div> --}}
                            {{-- START breadcrumb --}}
                            {{-- <div class="d-none d-xl-inline-flex">
                  <div>
                    <ol class="breadcrumb breadcrumb-nosep align-items-center pl-1 text-nowrap mr-2">
                      <li class="breadcrumb-item text-white text-500">
                        @hasSection('module')
                            @yield('module')
                        @else
                          Welcome
                        @endif
                      </li>
                      <li class="mx-15 text-grey-l4 text-110">></li>
                      <li class="breadcrumb-item active text-dark-tp4 text-105 text-300">
                        @hasSection('element')
                            @yield('element')
                        @endif
                      </li>
                    </ol>
                  </div>
                </div> --}}
                            {{-- END breadcrumb --}}

                            {{-- <a class="navbar-brand d-xl-none mx-1 text-dark-m3 text-130" href="{{route('portal.dashboard')}}" style="font-family: 'Pacifico';">{{config('app.name')}}</a> --}}
                            <div class="d-inline-flex">
                                <h2 class="d-none d-xl-inline-block text-140 text-dark-m2 mb-0 pb-1">
                                    {{ $template ?? '' }}</h2>
                            </div>
                        </div>




                        <div class="ml-auto mr-xl-3 navbar-menu collapse navbar-collapse navbar-backdrop"
                            id="navbarMenu">

                            <div class="navbar-nav">
                                <ul class="nav has-active-border">
                                    <li class="nav-item dropdown dropdown-mega">
                                        <a class="nav-link dropdown-toggle mr-1px text-white" data-toggle="dropdown"
                                            href="#" role="button" aria-haspopup="true" aria-expanded="false">
                                            <i class="fa fa-list-alt mr-2 d-lg-none"></i>
                                            @auth
                                                <img class="mr-2 radius-round border-2 brc-primary-tp3 p-1px"
                                                    src="{{ Auth::user()->picture ?? asset('..\assets\image\avatar\avatar4.png') }}"
                                                    width="36" alt="Natalie's Photo">
                                                {{ Auth::user()->name }}
                                            @endauth
                                            <i class="caret fa fa-angle-down d-none d-lg-block"></i>
                                            <i class="caret fa fa-angle-left d-block d-lg-none"></i>
                                        </a>
                                        <div class="p-0 dropdown-menu dropdown-animated brc-primary-m3 border-b-2 ml-1 mr-1px w-auto bgc-default-l4 dropdown-clickable"
                                            style="left:auto">
                                            <div class="d-flex flex-column">

                                                <div class="order-first order-lg-last ">
                                                    <hr class="d-none d-lg-block brc-default-l1 my-0">
                                                    <div class="row mx-0 bgc-primary-l4">
                                                        <div
                                                            class="col-lg-8 offset-lg-2 d-flex justify-content-center py-4 d-flex">
                                                            <a href="{{ route('portal.users.profile', [Auth::user()->id]) }}"
                                                                class="mx-2px btn btn-sm btn-app btn-outline-warning btn-h-outline-warning btn-a-outline-warning radius-1 border-2">
                                                                <i class="fa fa-user text-100 d-block mb-2 h-4"></i>
                                                                Profile
                                                            </a>
                                                            <a href="{{ route('portal.users.password') }}"
                                                                class="mx-2px btn btn-sm btn-app btn-outline-info btn-h-outline-info radius-1 border-2">
                                                                <i class="fa fa-key text-100 d-block mb-2 h-4"></i>
                                                                Password
                                                            </a>
                                                            <form id="logout-form" action="{{ route('logout') }}"
                                                                method="POST" class="d-inline-block">
                                                                @csrf
                                                                <button type="submit"
                                                                    class="mx-2px btn btn-sm btn-app btn-dark radius-1">
                                                                    <i
                                                                        class="fa fa-sign-out-alt text-100 d-block mb-2 h-4"></i>
                                                                    Logout
                                                                </button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                    <hr class="d-lg-none brc-default-l1 mt-0">
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>


                    </div>

                </nav>
                <nav aria-label="breadcrumb" class="bg-white">
                    <ol class="breadcrumb">

                        <div class="d-none d-xl-inline-flex">
                            <div>
                                <ol class="breadcrumb breadcrumb-nosep align-items-center pl-1 text-nowrap mr-2">
                                    <li class="breadcrumb-item text-dark text-500">
                                        @hasSection('module')
                                            @yield('module')
                                        @else
                                            Welcome
                                        @endif
                                    </li>
                                    <li class="mx-15 text-grey-l4 text-110">/</li>
                                    <li class="breadcrumb-item active text-dark-tp4 text-105 text-300">
                                        @hasSection('element')
                                            @yield('element')
                                        @endif
                                    </li>
                                </ol>
                            </div>
                        </div>
                    </ol>
                </nav>

                <div class="page-content container container-plus">
                    <!-- page header -->
                    <div class="d-lg-none page-header border-0 py-0">
                        <h1 class="text-dark-m3 pb-0 mb-0 text-125">{{ $template ?? '' }}</h1>
                    </div>
                    @yield('content')
                </div>
                @include('layouts.footer-portal')
            </div>
        </div>
    </div>
    @livewireScripts
    <script src="{{ asset('assets/js/jquery.min.js') }}"></script>
 
    <script src="{{ asset('assets/bootstrap-4.5.2/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/js/ace.min.js') }}"></script>
    <script src="{{ asset('assets/js/demo.min.js') }}"></script>
    


    <!-- include vendor scripts used in "Basic Tables" page. see "application/views/default/pages/partials/tables-basic/@vendor-scripts.hbs" -->
    {{-- <script src="{{ asset('assets\npm\basictable@1.0.9\jquery.basictable.min.js') }}"></script>
    <script src="{{ asset('assets\npm\sweetalert2@9.17.1\dist\sweetalert2.all.min.js') }}"></script> --}}
    <script src="{{ asset('assets\npm\select2@4.0.13\dist\js\select2.min.js') }}"></script>
    <!-- <script src="{{ asset('assets/js/lightbox-plus-jquery.min.js') }}"></script> -->


    {{-- <!-- include vendor scripts used in "Form Basic Elements" page. see "application/views/default/pages/partials/form-basic/@vendor-scripts.hbs" -->
    <script src="{{ asset('assets\npm\autosize@4.0.2\dist\autosize.min.js') }}"></script> --}}
    <script src="{{ asset('assets\npm\bootstrap-maxlength@1.10.0\dist\bootstrap-maxlength.min.js') }}"></script>
    <script src="{{ asset('assets\npm\inputmask@5.0.5\dist\jquery.inputmask.min.js') }}"></script>
    {{-- <script src="{{ asset('assets\npm\nouislider@14.6.1\distribute\nouislider.min.js') }}"></script>
    <script src="{{ asset('assets\npm\ion-rangeslider@2.3.1\js\ion.rangeSlider.min.js') }}"></script>
    <script src="{{ asset('assets\npm\bootstrap-touchspin@4.3.0\dist\jquery.bootstrap-touchspin.min.js') }}"></script> --}}
    <script src="{{ asset('assets\npm\tiny-date-picker@3.2.8\dist\date-range-picker.min.js') }}"></script>
    <script src="{{ asset('assets\npm\moment@2.27.0\moment.min.js') }}"></script>
    <script
        src="{{ asset('assets\npm\eonasdan-bootstrap-datetimepicker@4.17.47\src\js\bootstrap-datetimepicker.min.js') }}">
    </script>

    <script src="{{ asset('assets\npm\tiny-date-picker@3.2.8\dist\date-range-picker.min.js') }}"></script>
    <script src="{{ asset('assets\npm\summernote@0.8.18\dist\summernote-lite.min.js') }}"></script>
  
    



    <!-- include vendor scripts used in "Wizard & Validation" page. see "application/views/default/pages/partials/form-wizard/@vendor-scripts.hbs" -->
   


    <script src="{{ asset('assets\npm\jquery-validation@1.19.2\dist\jquery.validate.min.js')}}"></script>
   

   



   




  
    <script>
        $('#ace-file-input1').aceFileInput({
            // btnChooseClass: 'bgc-grey-l2 pt-15 px-2 my-1px mr-1px',
            // btnChooseText: 'SELEC',
            placeholderText: 'Application Attachment',
            // placeholderIcon: '<i class="fa fa-file bgc-warning-m1 text-white w-4 py-2 text-center"></i>'
        })
        $('#ace-file-input22').aceFileInput({
            // btnChooseClass: 'bgc-grey-l2 pt-15 px-2 my-1px mr-1px',
            // btnChooseText: 'SELECT FILE',
            placeholderText: 'Health Report Attachment',
            // placeholderIcon: '<i class="fa fa-file bgc-warning-m1 text-white w-4 py-2 text-center"></i>'
        })
        $('#ace-file-input12').aceFileInput({
            // btnChooseClass: 'bgc-grey-l2 pt-15 px-2 my-1px mr-1px',
            // btnChooseText: 'SELECT FILE',
            placeholderText: 'Prisoner Image',
            // placeholderIcon: '<i class="fa fa-file bgc-warning-m1 text-white w-4 py-2 text-center"></i>'
        })
        $('#ace-file-input13').aceFileInput({
            placeholderText: 'Warrent File Attachment',
            /**
            btnChooseClass: 'bgc-grey-l2 pt-15 px-2 my-1px mr-1px',
            btnChooseText: 'SELECT FILE',
            placeholderText: 'NO FILE YET',
            placeholderIcon: '<i class="fa fa-file bgc-warning-m1 text-white w-4 py-2 text-center"></i>'
            */
        })
        $('#ace-file-input23').aceFileInput({
            // btnChooseClass: 'bgc-grey-l2 pt-15 px-2 my-1px mr-1px',
            // btnChooseText: 'SELEC',
            placeholderText: 'Conviction Summary Attachment',
            // placeholderIcon: '<i class="fa fa-file bgc-warning-m1 text-white w-4 py-2 text-center"></i>'
        })
        $('#ace-file-input24').aceFileInput({
            // btnChooseClass: 'bgc-grey-l2 pt-15 px-2 my-1px mr-1px',
            // btnChooseText: 'SELECT FILE',
            placeholderText: 'Check List Attachment',
            // placeholderIcon: '<i class="fa fa-file bgc-warning-m1 text-white w-4 py-2 text-center"></i>'
        })
        $('#ace-file-input25').aceFileInput({
            // btnChooseClass: 'bgc-grey-l2 pt-15 px-2 my-1px mr-1px',
            // btnChooseText: 'SELECT FILE',
            placeholderText: 'Mercy Petition Roll In Prison ',
            // placeholderIcon: '<i class="fa fa-file bgc-warning-m1 text-white w-4 py-2 text-center"></i>'
        })
        $('#ace-file-input26').aceFileInput({
            placeholderText: ' Petition Certificate Attachment',
            /**
            btnChooseClass: 'bgc-grey-l2 pt-15 px-2 my-1px mr-1px',
            btnChooseText: 'SELECT FILE',
            placeholderText: 'NO FILE YET',
            placeholderIcon: '<i class="fa fa-file bgc-warning-m1 text-white w-4 py-2 text-center"></i>'
            */
        })
        $('#ace-file-input14').aceFileInput({
            placeholderText: ' Judgemnts Attachment',
            /**
            btnChooseClass: 'bgc-grey-l2 pt-15 px-2 my-1px mr-1px',
            btnChooseText: 'SELECT FILE',
            placeholderText: 'NO FILE YET',
            placeholderIcon: '<i class="fa fa-file bgc-warning-m1 text-white w-4 py-2 text-center"></i>'
            */
        })
        $('#ace-file-input27').aceFileInput({
            placeholderText: ' Mercy Petition Application in urdu Attachment',
            /**
            btnChooseClass: 'bgc-grey-l2 pt-15 px-2 my-1px mr-1px',
            btnChooseText: 'SELECT FILE',
            placeholderText: 'NO FILE YET',
            placeholderIcon: '<i class="fa fa-file bgc-warning-m1 text-white w-4 py-2 text-center"></i>'
            */
        })
        // multiple with image preview
        $('#ace-file-input2').aceFileInput({
                style: 'drop',
                droppable: true,
                container: 'border-1 border-dashed brc-grey-l1 brc-h-info-m2 shadow-sm',
                placeholderClass: 'text-125 text-600 text-grey-l1 my-2',
                placeholderText: 'Drop multiple file',
                placeholderIcon: '<i class="fa fa-cloud-upload-alt fa-3x text-info-m2 my-2"></i>',
                //previewSize: 64,
                thumbnail: 'large',
                allowExt: 'gif|jpg|jpeg|png|webp|svg|pdf',
                //allowMime: 'image/png|image/jpeg|pdf',
                //  allowMime: 'image/pdf/*',
                //maxSize: 100000,
            })
            .on('change', function() {
                // get dropped/selected files
                // console.log( $(this).data('ace_input_files') )
                // console.log( $(this).data('ace_input_method') )
                // or
                // console.log( $(this).aceFileInput('files') )
                // console.log( $(this).aceFileInput('method') )
            })
            .on('invalid.ace.file', function(e, errors) {
                // console.log(errors)
            })
            .on('preview_failed.ace.file', function(e, error) {
                // console.log(error)
                // if(error.code == 2) alert(error.filename + ' is not an image!')
            })
            .on('reset.ace.file', function(e) {
                // e.preventDefault()
            })
        // some available methods
        // $('#ace-file-input2').aceFileInput('disable')
        // $('#ace-file-input2').aceFileInput('startLoading')
        // $('#ace-file-input2').aceFileInput('showFileList', [{name: 'avatar3.jpg', type: 'image', path: 'assets/image/avatar/avatar3.jpg'} , {name: 'avatar2.jpg', type: 'image', path: 'assets/image/avatar/avatar2.jpg'}])
        // $('#ace-file-input1').aceFileInput('showFileList', [{name: '2.txt', type: 'document'}])
        // $('#ace-file-input1').aceFileInput('resetInput');
        $.extend($.summernote.options.icons, {
            'align': 'fa fa-align',
            'alignCenter': 'fa fa-align-center',
            'alignJustify': 'fa fa-align-justify',
            'alignLeft': 'fa fa-align-left',
            'alignRight': 'fa fa-align-right',
            'indent': 'fa fa-indent',
            'outdent': 'fa fa-outdent',
            'arrowsAlt': 'fa fa-arrows-alt',
            'bold': 'fa fa-bold',
            'caret': 'fa fa-caret-down text-grey-m2 ml-1',
            'circle': 'fa fa-circle',
            'close': 'fa fa fa-close',
            'code': 'fa fa-code',
            'eraser': 'fa fa-eraser',
            'font': 'fa fa-font',
            'italic': 'fa fa-italic',
            'link': 'fa fa-link text-success-m1',
            'unlink': 'fas fa-unlink',
            'magic': 'fa fa-magic text-brown-m1',
            'menuCheck': 'fa fa-check',
            'minus': 'fa fa-minus',
            'orderedlist': 'fa fa-list-ol text-blue',
            'pencil': 'fa fa-pencil',
            'picture': 'far fa-image text-purple-d1',
            'question': 'fa fa-question',
            'redo': 'fa fa-repeat',
            'square': 'fa fa-square',
            'strikethrough': 'fa fa-strikethrough',
            'subscript': 'fa fa-subscript',
            'superscript': 'fa fa-superscript',
            'table': 'fa fa-table text-danger-m2',
            'textHeight': 'fa fa-text-height',
            'trash': 'fa fa-trash',
            'underline': 'fa fa-underline',
            'undo': 'fa fa-undo',
            'unorderedlist': 'fa fa-list-ul text-blue',
            'video': 'far fa-file-video text-pink-m1'
        })
        $('#summernote').summernote({
            height: 250,
            minHeight: 150,
            maxHeight: 400
        })
    </script>
    <script>
        jQuery(function($) {
            var TinyDatePicker = DateRangePicker.TinyDatePicker;
            TinyDatePicker('#id-date-1', {
                    mode: 'dp-below',
                })
                .on('statechange', function(ev) {
                })
            // modal one
            TinyDatePicker('#id-date-2', {
                mode: 'dp-modal',
            }).on('statechange', function(ev) {
                // console.log(ev);
            })
            // third one
            // on mobile devices show native datepicker
            if ('ontouchstart' in window && window.matchMedia('(max-width: 600px)')) {
                document.querySelector('#id-date-3').setAttribute('type', 'date')
            } else {
                TinyDatePicker('#id-date-3', {
                    mode: 'dp-modal',
                })
            }
            //////
            // date range picker example
            var daterange_container = document.querySelector('#id-daterange-container')
            // Inject DateRangePicker into our container
            DateRangePicker.DateRangePicker(daterange_container, {
                    mode: 'dp-modal'
                })
                .on('statechange', function(_, rp) {
                    // Update the inputs when the state changes
                    var range = rp.state
                    $('#id-daterange-from').val(range.start ? range.start.toDateString() : '')
                    $('#id-daterange-to').val(range.end ? range.end.toDateString() : '')
                })
            $('#id-daterange-from, #id-daterange-to').on('focus', function() {
                daterange_container.classList.add('visible')
            })
            var daterange_wrapper = document.querySelector('#id-daterange-wrapper')
            var previousTimeout = null;
            $(daterange_wrapper).on('focusout', function() {
                if (previousTimeout) clearTimeout(previousTimeout)
                previousTimeout = setTimeout(function() {
                    if (!daterange_wrapper.contains(document.activeElement)) {
                        daterange_container.classList.remove('visible')
                    }
                }, 10)
            })
        })
    </script>
    <script type=text/javascript>
        $(document).ready(function() {
            $('body').on('click', '#humanrightview-user', function(event) {
                event.preventDefault();
                //  $("#getData").click(function() {
                //     var get = $(this).val();
                //     alert(get);
                var id = $(this).data('id');
                $.ajax({ //create an ajax request to display.php
                    type: "GET",
                    url: "{{ url('humanrightview') }}/" + id,
                    datatype: 'json',
                    success: function(data) {
                        $("#forward").empty();
                        $('#forward').append(
                                    "<a class='mx-2px btn radius-1 border-2 btn-xs btn-brc-tp btn-light-secondary btn-h-lighter-success btn-a-lighter-success bg-success text-white' style='margin-right:15px;'    href='{{ url('interior-forward/') }}/" +
                                    id + "'>" + ' Forward <i class="fa fa-forward"></i>'+
                                                                 '</a>');
                        $('#prisonerid').text(data.petitions.prisonerid);
                        $('#firstname').text(data.petitions.name);
                        $('#Fathername').text(data.petitions.f_name);
                        $('#Nationality').text(data.petitions.nationality);
                        $('#status').text(data.petitions.status);
                        $('#Physicalstatus').text(data.petitions.physicalstatus.PhysicalStatus);
                        $('#Confined_in_jail').text(data.petitions.confined_in_jail);
                        $('#Gender').text(data.petitions.gender);
                        $('#Dob').text(data.petitions.dob);
                        $('#marksofindentification').text(data.petitions.mark_of_identification);
                        $('#address').text(data.petitions.address);
                        $('#phone').text(data.petitions.phone);
                        $('#imediateheirs').text(data.petitions.imediate_heirs);
                        $('.firdate').text(data.petitions.fir_date);
                         $('.policestation').text(data.petitions.name_of_policestation);
                        $('#casetitle').text(data.petitions.case_title);
                        $('#casefirno').text(data.petitions.case_fir_no);
                        $('#caste').text(data.petitions.caste);
                        $('#cnic').text(data.petitions.cnic);
                        $('#age').text(data.petitions.age_of_petitioner);
                        $('#martialstatus').text(data.petitions.martial_status);
                        $('#religion').text(data.petitions.religion);
                        $('#education').text(data.petitions.education);
                        $('#occupation').text(data.petitions.Occupation);
                        $('#mentalhealth').text(data.petitions.mental_health);
                        $('#physicalhealth').text(data.petitions.physical_health);
                        $('#natureofcrime').text(data.petitions.nature_of_crime);
                        $('#prisonerconduct').text(data.petitions.prisoner_conduct);
                        $('#compoundableoffence').text(data.petitions.compoundable_offence);
                        $('#noncompoundableoffence').text(data.petitions.non_compoundable_offence);
                        $('#mitigatingcircumstances').text(data.petitions.mitigating_circumstances);
                        $('#petitionhistory').text(data.petitions.petition_history);
                        $('#Mercypetitiondate').text(data.petitions.mercypetitiondate);
                        $('#Section_id').text(data.petitions.section_id);
                        $('#Province').text(data.petitions.provinces.province_name);
                      
                        $('#Remarks').text(data.petitions.remarks);
                        $('#sentence_in_court').text(data.petitions.sentence_in_court);
                        $('#date_of_sentence').text(data.petitions.date_of_sentence);
                      
                        $("#pic").empty();
                        $("#picss").empty();
                        $.each(data.petitions.fileattachements, function(key, val) {
                            var fil = val.file
                            //  alert(val.file);
                            if (val.type == 'pdf') {
                                // alert(val.type=='pdf');
                                // $("#picss").empty();
                                // $('#picss').append("<a   href='{{ url('/assets/image/') }}/"+val.file+" data-lightbox='example-1''>"+"<img  class='example-image' alt='image-1'  style='height:100px;width:100pxborder-radius:50px' src='{{ url('/assets/image/') }}/"+val.file+"'>"+'</a>');
                                $('#picss').append(
                                    "<a   style='margin-right:15px;'  target='_blank'  href='{{ url('/assets/image/') }}/" +
                                    val.file + "'>" + "<img  class='example-image' alt='image-1'  style='height:100px;width:100px;margin-right:15px;' src='{{ url('/assets/image/pdf.png') }}'>" + '</a>');
                            } else {
                                // $('#pic').append("<img style='height:100px;width:100pxborder-radius:50px' src='{{ url('/assets/image/') }}/"+val.file+"'>");
                                $('#pic').append(
                                    "<a target='_blank'  data-lightbox='example-1' href='{{ url('/assets/image/') }}/" +
                                    val.file + " '>" +
                                    "<img  class='example-image' alt='image-1'  style='height:100px;width:100px;margin-right:15px;' src='{{ url('/assets/image/') }}/" +
                                    val.file + "'>" + '</a>');
                            }
                        });
                        $("#application_images").empty();
                        $("#application_image").empty();
                        var ap = data.petitions.application_image;
                        var finalap = ap.split(".");
                        if (finalap['1'] == "pdf") {
                            $('#application_images').append(
                                "<a  target='_blank'  href='{{ url('/assets/image/') }}/" +
                                data.petitions.application_image + "'>" + "<img  class='example-image' alt='image-1'  style='height:100px;width:100px;margin-right:15px;' src='{{ url('/assets/image/pdf.png') }}'>" + '</a>');
                        } else {
                            // $('#application_image').html("<img style='height:70;width:100px;' src=' {{ url('/assets/image/') }}/"+data.application_image+"'>");
                            $('#application_image').html(
                                "<a  target='_blank'  data-lightbox='example-1' href='{{ url('/assets/image/') }}/" +
                                data.petitions.application_image + " '>" +
                                "<img  class='example-image' alt='image-1'  style='height:100px;width:100px' src='{{ url('/assets/image/') }}/" +
                                data.petitions.application_image + "'>" + '</a>');
                        }
                        $("#health_papers").empty();
                        $("#health_paper").empty();
                        var ap = data.petitions.health_paper;
                        var finalap = ap.split(".");
                        if (finalap['1'] == "pdf") {
                            $('#health_papers').append(
                                "<a  target='_blank'  href='{{ url('/assets/image/') }}/" +
                                data.petitions.health_paper + "'>" + "<img  class='example-image' alt='image-1'  style='height:100px;width:100px;margin-right:15px;' src='{{ url('/assets/image/pdf.png') }}'>" + '</a>');
                        } else {
                            $('#health_paper').html(
                                "<a target='_blank'  data-lightbox='example-1' href='{{ url('/assets/image/') }}/" +
                                data.petitions.health_paper + " '>" +
                                "<img  class='example-image' alt='image-1'  style='height:100px;width:100pxborder-radius:50px' src='{{ url('/assets/image/') }}/" +
                                data.petitions.health_paper + "'>" + '</a>');
                            // $('#health_paper').html("<img style='height:70;width:100px;' src=' {{ url('/assets/image/') }}/"+data.health_paper+"'>");
                        }
                        $("#warrent_files").empty();
                        $("#warrent_file").empty();
                        var ap = data.petitions.warrent_file;
                        var finalap = ap.split(".");
                        if (finalap['1'] == "pdf") {
                            $('#warrent_files').append(
                                "<a target='_blank'   href='{{ url('/assets/image/') }}/" +
                                data.petitions.warrent_file + "'>" +"<img  class='example-image' alt='image-1'  style='height:100px;width:100px;margin-right:15px;' src='{{ url('/assets/image/pdf.png') }}'>" + '</a>');
                        } else {
                            $('#warrent_file').html(
                                "<a target='_blank'  data-lightbox='example-1' href='{{ url('/assets/image/') }}/" +
                                data.petitions.warrent_file + " '>" +
                                "<img  class='example-image' alt='image-1'  style='height:100px;width:100pxborder-radius:50px' src='{{ url('/assets/image/') }}/" +
                                data.petitions.warrent_file + "'>" + '</a>');
                            // $('#warrent_file').html("<img style='height:70;width:100px;' src=' {{ url('/assets/image/') }}/"+data.warrent_file+"'>");
                        }
                        //  $('#Prisonerimage').html("<img style='height:100px;width:100px;border-radius:50px;' src=' {{ url('/assets/image/') }}/"+data.prisoner_image+"'>");
                        $("#Prisonerimage").empty();
                        $('#Prisonerimage').html(
                            "<a target='_blank'  data-lightbox='example-1' href='{{ url('/assets/image/') }}/" +
                            data.petitions.prisoner_image + " '>" +
                            "<img  class='example-image' alt='image-1'  style='height:100px;width:100px;border-radius:50px' src='{{ url('/assets/image/') }}/" +
                            data.petitions.prisoner_image + "'>" + '</a>');

                            $("#convection_summarys").empty();
                        $("#convection_summary").empty();
                       
                        var ap = data.petitions.convection_summary;
                        var finalap = ap.split(".");
                        if (finalap['1'] == "pdf") {
                            $('#convection_summarys').append(
                                "<a  style='margin-right:15px;' target='_blank'   href='{{ url('/assets/image/') }}/" + data.petitions
                                .convection_summary + "'>" +"<img  class='example-image' alt='image-1'  style='height:100px;width:100px;margin-right:15px;' src='{{ url('/assets/image/pdf.png') }}'>" + '</a>');
                        } else {
                            $('#convection_summary').html(
                                "<a  target='_blank'  href='{{ url('/assets/image/') }}/" +
                                data.petitions.convection_summary + " '>" +
                                "<img  class='example-image' alt='image-1'  style='height:100px;width:100pxborder-radius:50px' src='{{ url('/assets/image/') }}/" +
                                data.petitions.convection_summary + "'>" + '</a>');
                            // $('#warrent_file').html("<img style='height:70;width:100px;' src=' {{ url('/assets/image/') }}/"+data.warrent_file+"'>");
                        }
                        $("#check_list_files").empty();
                        $("#check_list_file").empty();
                        var ap = data.petitions.check_list_file;
                        var finalap = ap.split(".");
                        if (finalap['1'] == "pdf") {
                            $('#check_list_files').append(
                                "<a  style='margin-right:15px;' target='_blank'   href='{{ url('/assets/image/') }}/" + data.petitions.check_list_file + "'>" +"<img  class='example-image' alt='image-1'  style='height:100px;width:100px;margin-right:15px;' src='{{ url('/assets/image/pdf.png') }}'>" + '</a>');
                        } else {
                            $('#check_list_file').html(
                                "<a  target='_blank'  href='{{ url('/assets/image/') }}/" +
                                data.petitions.check_list_file + " '>" +
                                "<img  class='example-image' alt='image-1'  style='height:100px;width:100pxborder-radius:50px' src='{{ url('/assets/image/') }}/" +
                                data.petitions.check_list_file + "'>" + '</a>');
                            // $('#warrent_file').html("<img style='height:70;width:100px;' src=' {{ url('/assets/image/') }}/"+data.warrent_file+"'>");
                        }

                        $("#petition_roll_files").empty();
                        $("#petition_roll_file").empty();
                        var ap = data.petitions.petition_roll_file;
                        var finalap = ap.split(".");
                        if (finalap['1'] == "pdf") {
                            $('#petition_roll_files').append(
                                "<a  style='margin-right:15px;' target='_blank'   href='{{ url('/assets/image/') }}/" + data.petitions.petition_roll_file + "'>" +"<img  class='example-image' alt='image-1'  style='height:100px;width:100px;margin-right:15px;' src='{{ url('/assets/image/pdf.png') }}'>" + '</a>');
                        } else {
                            $('#petition_roll_file').html(
                                "<a  target='_blank'  href='{{ url('/assets/image/') }}/" +
                                data.petitions.petition_roll_file + " '>" +
                                "<img  class='example-image' alt='image-1'  style='height:100px;width:100pxborder-radius:50px' src='{{ url('/assets/image/') }}/" +
                                data.petitions.petition_roll_file + "'>" + '</a>');
                            // $('#warrent_file').html("<img style='height:70;width:100px;' src=' {{ url('/assets/image/') }}/"+data.warrent_file+"'>");
                        }

                        $("#petition_certificates").empty();
                        $("#petition_certificate").empty();
                        var ap = data.petitions.petition_certificate;
                        var finalap = ap.split(".");
                        if (finalap['1'] == "pdf") {
                            $('#petition_certificates').append(
                                "<a  style='margin-right:15px;' target='_blank'   href='{{ url('/assets/image/') }}/" + data.petitions.petition_certificate + "'>" +"<img  class='example-image' alt='image-1'  style='height:100px;width:100px;margin-right:15px;' src='{{ url('/assets/image/pdf.png') }}'>" + '</a>');
                        } else {
                            $('#petition_certificate').html(
                                "<a  target='_blank'  href='{{ url('/assets/image/') }}/" +
                                data.petitions.petition_certificate + " '>" +
                                "<img  class='example-image' alt='image-1'  style='height:100px;width:100pxborder-radius:50px' src='{{ url('/assets/image/') }}/" +
                                data.petitions.petition_certificate + "'>" + '</a>');
                            // $('#warrent_file').html("<img style='height:70;width:100px;' src=' {{ url('/assets/image/') }}/"+data.warrent_file+"'>");
                        }
                        $("#judgments_files").empty();
                        $("#judgments_file").empty();
                        var ap = data.petitions.judgments_file;
                        var finalap = ap.split(".");
                        if (finalap['1'] == "pdf") {
                            $('#judgments_files').append(
                                "<a  style='margin-right:15px;' target='_blank'   href='{{ url('/assets/image/') }}/" + data.petitions.judgments_file + "'>" +"<img  class='example-image' alt='image-1'  style='height:100px;width:100px;margin-right:15px;' src='{{ url('/assets/image/pdf.png') }}'>" + '</a>');
                        } else {
                            $('#judgments_file').html(
                                "<a  target='_blank'  href='{{ url('/assets/image/') }}/" +
                                data.petitions.judgments_file + " '>" +
                                "<img  class='example-image' alt='image-1'  style='height:100px;width:100pxborder-radius:50px' src='{{ url('/assets/image/') }}/" +
                                data.petitions.judgments_file + "'>" + '</a>');
                            // $('#warrent_file').html("<img style='height:70;width:100px;' src=' {{ url('/assets/image/') }}/"+data.warrent_file+"'>");
                        }
                        $("#application_in_urdu_files").empty();
                        $("#application_in_urdu_file").empty();
                        var ap = data.petitions.application_in_urdu_file;
                        var finalap = ap.split(".");
                        if (finalap['1'] == "pdf") {
                            $('#application_in_urdu_files').append(
                                "<a  style='margin-right:15px;' target='_blank'   href='{{ url('/assets/image/') }}/" + data.petitions.application_in_urdu_file + "'>" +"<img  class='example-image' alt='image-1'  style='height:100px;width:100px;margin-right:15px;' src='{{ url('/assets/image/pdf.png') }}'>" + '</a>');
                        } else {
                            $('#application_in_urdu_file').html(
                                "<a  target='_blank'  href='{{ url('/assets/image/') }}/" +
                                data.petitions.application_in_urdu_file + " '>" +
                                "<img  class='example-image' alt='image-1'  style='height:100px;width:100pxborder-radius:50px' src='{{ url('/assets/image/') }}/" +
                                data.petitions.application_in_urdu_file + "'>" + '</a>');
                            // $('#warrent_file').html("<img style='height:70;width:100px;' src=' {{ url('/assets/image/') }}/"+data.warrent_file+"'>");
                        }

                        // home department file
                        $('#homeremarks').text(data.homepititions.remarks);
                        $("#homefilepdf").empty();
                        $("#homepic").empty();
                        $.each(data.homepititions.homefileattachements, function(key, val) {
                            var fil = val.file
                            //  alert(val.file);
                            if (val.type == 'pdf') {
                                // alert(val.type=='pdf');
                                // $("#picss").empty();
                                // $('#picss').append("<a   href='{{ url('/assets/image/') }}/"+val.file+" data-lightbox='example-1''>"+"<img  class='example-image' alt='image-1'  style='height:100px;width:100pxborder-radius:50px' src='{{ url('/assets/image/') }}/"+val.file+"'>"+'</a>');
                                $('#homefilepdf').append(
                                    "<a  style='margin-right:15px;'  target='_blank'  href='{{ url('/assets/image/') }}/" +
                                    val.file + "'>" +"<img  class='example-image' alt='image-1'  style='height:100px;width:100px;margin-right:15px;' src='{{ url('/assets/image/pdf.png') }}'>" + '</a>');
                            } else {
                                // $('#pic').append("<img style='height:100px;width:100pxborder-radius:50px' src='{{ url('/assets/image/') }}/"+val.file+"'>");
                                $('#homepic').append(
                                    "<a  target='_blank'  data-lightbox='example-1' href='{{ url('/assets/image/') }}/" +
                                    val.file + " '>" +
                                    "<img  class='example-image' alt='image-1'  style='height:100px;width:100px; margin-right:15px;' src='{{ url('/assets/image/') }}/" +
                                    val.file + "'>" + '</a>');
                            }
                        });
                        // interior ministry data show
                        $('#interiorremarks').text(data.interiorpititions.remarks);
                        $("#interiorfilepdf").empty();
                        $("#interiorpic").empty();
                        $.each(data.interiorpititions.interiorfileattachements, function(key,
                            val) {
                            var fil = val.file
                            //  alert(val.file);
                            if (val.type == 'pdf') {
                                // alert(val.type=='pdf');
                                // $("#picss").empty();
                                // $('#picss').append("<a   href='{{ url('/assets/image/') }}/"+val.file+" data-lightbox='example-1''>"+"<img  class='example-image' alt='image-1'  style='height:100px;width:100pxborder-radius:50px' src='{{ url('/assets/image/') }}/"+val.file+"'>"+'</a>');
                                $('#interiorfilepdf').append(
                                    "<a  style='margin-right:15px;'  target='_blank'  href='{{ url('/assets/image/') }}/" +
                                    val.file + "'>" + "<img  class='example-image' alt='image-1'  style='height:100px;width:100px;margin-right:15px;' src='{{ url('/assets/image/pdf.png') }}'>" + '</a>');
                            } else {
                                // $('#pic').append("<img style='height:100px;width:100pxborder-radius:50px' src='{{ url('/assets/image/') }}/"+val.file+"'>");
                                $('#interiorpic').append(
                                    "<a  target='_blank'  data-lightbox='example-1' href='{{ url('/assets/image/') }}/" +
                                    val.file + " '>" +
                                    "<img  class='example-image' alt='image-1'  style='height:100px;width:100px; margin-right:15px;' src='{{ url('/assets/image/') }}/" +
                                    val.file + "'>" + '</a>');
                            }
                        });
                    }
                });
            });
        });
    </script>

    <script type=text/javascript>
        $(document).ready(function() {
            $('body').on('click', '#interiorshow-user', function(event) {
                event.preventDefault();
                //  alert( $(this).data('id'));
                //  $("#getData").click(function() {
                //     var get = $(this).val();
                //     alert(get);
                var id = $(this).data('id');
                $.ajax({ //create an ajax request to display.php
                    type: "GET",
                    url: "{{ url('Interiorview') }}/" + id,
                    datatype: 'json',
                    success: function(data)
                    {
                        $("#interiorforward").empty();
                        $('#interiorforward').append(
                                    "<a class='mx-2px btn radius-1 border-2 btn-xs btn-brc-tp btn-light-secondary btn-h-lighter-success btn-a-lighter-success bg-success text-white' style='margin-right:15px;'    href='{{ url('interiorforward/') }}/" +
                                    id + "'>" + ' Decision/forward <i class="fa fa-forward"></i>'+
                                                                 '</a>');


                                                                 $("#decision").empty();
                        $('#interiorministryfinaldecisions').append(
                                    "<a class='mx-2px btn radius-1 border-2 btn-xs btn-brc-tp btn-light-secondary btn-h-lighter-success btn-a-lighter-success bg-success text-white' style='margin-right:15px;'    href='{{ url('interiorministryfinaldecisions/') }}/" +
                                    id + "'>" + ' Decision <i class="fa fa-forward"></i>'+
                                                                 '</a>');
                         $("#decision").empty();
                        $('#decision').append(
                                    "<a class='mx-2px btn radius-1 border-2 btn-xs btn-brc-tp btn-light-secondary btn-h-lighter-success btn-a-lighter-success bg-success text-white' style='margin-right:15px;'    href='{{ url('decision/') }}/" +
                                    id + "'>" + ' Decision <i class="fa fa-forward"></i>'+
                                                                 '</a>');
                                 $("#humangrightback").empty();
                                 $('#humangrightback').append(
                                    "<a class='mx-2px btn radius-1 border-2 btn-xs btn-brc-tp btn-light-secondary btn-h-lighter-success btn-a-lighter-success bg-success text-white' style='margin-right:15px;'    href='{{ url('humangrightback/') }}/" +
                                    id + "'>" + ' Decision/forward <i class="fa fa-forward"></i>'+
                                                                 '</a>');
                        $('#firstname').text(data.petitions.name);
                        $('#prisonerid').text(data.petitions.prisonerid);
                        $('#Fathername').text(data.petitions.f_name);
                        $('#Nationality').text(data.petitions.nationality);
                        $('#status').text(data.petitions.status);
                        $('#Physicalstatus').text(data.petitions.physicalstatus.PhysicalStatus);
                        $('#Confined_in_jail').text(data.petitions.confined_in_jail);
                        $('#Gender').text(data.petitions.gender);
                        $('#Dob').text(data.petitions.dob);
                        $('.firdate').text(data.petitions.fir_date);
                         $('.policestation').text(data.petitions.name_of_policestation);
                        $('#casetitle').text(data.petitions.case_title);
                        $('#casefirno').text(data.petitions.case_fir_no);
                        $('#caste').text(data.petitions.caste);
                        $('#cnic').text(data.petitions.cnic);
                        $('#age').text(data.petitions.age_of_petitioner);
                        $('#martialstatus').text(data.petitions.martial_status);
                        $('#religion').text(data.petitions.religion);
                        $('#education').text(data.petitions.education);
                        $('#marksofindentification').text(data.petitions.mark_of_identification);
                        $('#address').text(data.petitions.address);
                        $('#phone').text(data.petitions.phone);
                        $('#imediateheirs').text(data.petitions.imediate_heirs);
                        $('#occupation').text(data.petitions.Occupation);
                        $('#mentalhealth').text(data.petitions.mental_health);
                        $('#physicalhealth').text(data.petitions.physical_health);
                        $('#natureofcrime').text(data.petitions.nature_of_crime);
                        $('#prisonerconduct').text(data.petitions.prisoner_conduct);
                        $('#compoundableoffence').text(data.petitions.compoundable_offence);
                        $('#noncompoundableoffence').text(data.petitions.non_compoundable_offence);
                        $('#mitigatingcircumstances').text(data.petitions.mitigating_circumstances);
                        $('#petitionhistory').text(data.petitions.petition_history);
                        $('#Mercypetitiondate').text(data.petitions.mercypetitiondate);
                        $('#Section_id').text(data.petitions.section_id);
                        
                        $('#Province').text(data.petitions.provinces.province_name);
                        $('#Remarks').text(data.petitions.remarks);
                        $('#sentence_in_court').text(data.petitions.sentence_in_court);
                        $('#date_of_sentence').text(data.petitions.date_of_sentence);
                       
                        $("#pic").empty();
                        $("#picss").empty();
                        $.each(data.petitions.fileattachements, function(key, val) {
                            var fil = val.file
                            //  alert(val.file);
                            if (val.type == 'pdf') {
                                // alert(val.type=='pdf');
                                // $("#picss").empty();
                                // $('#picss').append("<a   href='{{ url('/assets/image/') }}/"+val.file+" data-lightbox='example-1''>"+"<img  class='example-image' alt='image-1'  style='height:100px;width:100pxborder-radius:50px' src='{{ url('/assets/image/') }}/"+val.file+"'>"+'</a>');
                                $('#picss').append(
                                    "<a   style='margin-right:15px;'  target='_blank'  href='{{ url('/assets/image/') }}/" +
                                    val.file + "'>" + "<img  class='example-image' alt='image-1'  style='height:100px;width:100px;margin-right:15px;' src='{{ url('/assets/image/pdf.png') }}'>" + '</a>');
                            } else {
                                // $('#pic').append("<img style='height:100px;width:100pxborder-radius:50px' src='{{ url('/assets/image/') }}/"+val.file+"'>");
                                $('#pic').append(
                                    "<a target='_blank'  data-lightbox='example-1' href='{{ url('/assets/image/') }}/" +
                                    val.file + " '>" +
                                    "<img  class='example-image' alt='image-1'  style='height:100px;width:100px;margin-right:15px;' src='{{ url('/assets/image/') }}/" +
                                    val.file + "'>" + '</a>');
                            }
                        });
                        $("#application_images").empty();
                        $("#application_image").empty();
                        var ap = data.petitions.application_image;
                        var finalap = ap.split(".");
                        if (finalap['1'] == "pdf") {
                            $('#application_images').append(
                                "<a  target='_blank'  href='{{ url('/assets/image/') }}/" +
                                data.petitions.application_image + "'>" + "<img  class='example-image' alt='image-1'  style='height:100px;width:100px;margin-right:15px;' src='{{ url('/assets/image/pdf.png') }}'>" + '</a>');
                        } else {
                            // $('#application_image').html("<img style='height:70;width:100px;' src=' {{ url('/assets/image/') }}/"+data.application_image+"'>");
                            $('#application_image').html(
                                "<a  target='_blank'  data-lightbox='example-1' href='{{ url('/assets/image/') }}/" +
                                data.petitions.application_image + " '>" +
                                "<img  class='example-image' alt='image-1'  style='height:100px;width:100px' src='{{ url('/assets/image/') }}/" +
                                data.petitions.application_image + "'>" + '</a>');
                        }
                        $("#health_papers").empty();
                        $("#health_paper").empty();
                        var ap = data.petitions.health_paper;
                        var finalap = ap.split(".");
                        if (finalap['1'] == "pdf") {
                            $('#health_papers').append(
                                "<a  target='_blank'  href='{{ url('/assets/image/') }}/" +
                                data.petitions.health_paper + "'>" + "<img  class='example-image' alt='image-1'  style='height:100px;width:100px;margin-right:15px;' src='{{ url('/assets/image/pdf.png') }}'>" + '</a>');
                        } else {
                            $('#health_paper').html(
                                "<a target='_blank'  data-lightbox='example-1' href='{{ url('/assets/image/') }}/" +
                                data.petitions.health_paper + " '>" +
                                "<img  class='example-image' alt='image-1'  style='height:100px;width:100pxborder-radius:50px' src='{{ url('/assets/image/') }}/" +
                                data.petitions.health_paper + "'>" + '</a>');
                            // $('#health_paper').html("<img style='height:70;width:100px;' src=' {{ url('/assets/image/') }}/"+data.health_paper+"'>");
                        }
                        $("#warrent_files").empty();
                        $("#warrent_file").empty();
                        var ap = data.petitions.warrent_file;
                        var finalap = ap.split(".");
                        if (finalap['1'] == "pdf") {
                            $('#warrent_files').append(
                                "<a target='_blank'   href='{{ url('/assets/image/') }}/" +
                                data.petitions.warrent_file + "'>" +"<img  class='example-image' alt='image-1'  style='height:100px;width:100px;margin-right:15px;' src='{{ url('/assets/image/pdf.png') }}'>" + '</a>');
                        } else {
                            $('#warrent_file').html(
                                "<a target='_blank'  data-lightbox='example-1' href='{{ url('/assets/image/') }}/" +
                                data.petitions.warrent_file + " '>" +
                                "<img  class='example-image' alt='image-1'  style='height:100px;width:100pxborder-radius:50px' src='{{ url('/assets/image/') }}/" +
                                data.petitions.warrent_file + "'>" + '</a>');
                            // $('#warrent_file').html("<img style='height:70;width:100px;' src=' {{ url('/assets/image/') }}/"+data.warrent_file+"'>");
                        }
                        //  $('#Prisonerimage').html("<img style='height:100px;width:100px;border-radius:50px;' src=' {{ url('/assets/image/') }}/"+data.prisoner_image+"'>");
                        $("#Prisonerimage").empty();
                        $('#Prisonerimage').html(
                            "<a target='_blank'  data-lightbox='example-1' href='{{ url('/assets/image/') }}/" +
                            data.petitions.prisoner_image + " '>" +
                            "<img  class='example-image' alt='image-1'  style='height:100px;width:100px;border-radius:50px' src='{{ url('/assets/image/') }}/" +
                            data.petitions.prisoner_image + "'>" + '</a>');

                        $("#convection_summarys").empty();
                        $("#convection_summary").empty();
                       
                        var ap = data.petitions.convection_summary;
                        var finalap = ap.split(".");
                        if (finalap['1'] == "pdf") {
                            $('#convection_summarys').append(
                                "<a  style='margin-right:15px;' target='_blank'   href='{{ url('/assets/image/') }}/" + data.petitions
                                .convection_summary + "'>" +"<img  class='example-image' alt='image-1'  style='height:100px;width:100px;margin-right:15px;' src='{{ url('/assets/image/pdf.png') }}'>" + '</a>');
                        } else {
                            $('#convection_summary').html(
                                "<a  target='_blank'  href='{{ url('/assets/image/') }}/" +
                                data.petitions.convection_summary + " '>" +
                                "<img  class='example-image' alt='image-1'  style='height:100px;width:100pxborder-radius:50px' src='{{ url('/assets/image/') }}/" +
                                data.petitions.convection_summary + "'>" + '</a>');
                            // $('#warrent_file').html("<img style='height:70;width:100px;' src=' {{ url('/assets/image/') }}/"+data.warrent_file+"'>");
                        }
                        $("#check_list_files").empty();
                        $("#check_list_file").empty();
                        var ap = data.petitions.check_list_file;
                        var finalap = ap.split(".");
                        if (finalap['1'] == "pdf") {
                            $('#check_list_files').append(
                                "<a  style='margin-right:15px;' target='_blank'   href='{{ url('/assets/image/') }}/" + data.petitions.check_list_file + "'>" +"<img  class='example-image' alt='image-1'  style='height:100px;width:100px;margin-right:15px;' src='{{ url('/assets/image/pdf.png') }}'>" + '</a>');
                        } else {
                            $('#check_list_file').html(
                                "<a  target='_blank'  href='{{ url('/assets/image/') }}/" +
                                data.petitions.check_list_file + " '>" +
                                "<img  class='example-image' alt='image-1'  style='height:100px;width:100pxborder-radius:50px' src='{{ url('/assets/image/') }}/" +
                                data.petitions.check_list_file + "'>" + '</a>');
                            // $('#warrent_file').html("<img style='height:70;width:100px;' src=' {{ url('/assets/image/') }}/"+data.warrent_file+"'>");
                        }

                        $("#petition_roll_files").empty();
                        $("#petition_roll_file").empty();
                        var ap = data.petitions.petition_roll_file;
                        var finalap = ap.split(".");
                        if (finalap['1'] == "pdf") {
                            $('#petition_roll_files').append(
                                "<a  style='margin-right:15px;' target='_blank'   href='{{ url('/assets/image/') }}/" + data.petitions.petition_roll_file + "'>" +"<img  class='example-image' alt='image-1'  style='height:100px;width:100px;margin-right:15px;' src='{{ url('/assets/image/pdf.png') }}'>" + '</a>');
                        } else {
                            $('#petition_roll_file').html(
                                "<a  target='_blank'  href='{{ url('/assets/image/') }}/" +
                                data.petitions.petition_roll_file + " '>" +
                                "<img  class='example-image' alt='image-1'  style='height:100px;width:100pxborder-radius:50px' src='{{ url('/assets/image/') }}/" +
                                data.petitions.petition_roll_file + "'>" + '</a>');
                            // $('#warrent_file').html("<img style='height:70;width:100px;' src=' {{ url('/assets/image/') }}/"+data.warrent_file+"'>");
                        }

                        $("#petition_certificates").empty();
                        $("#petition_certificate").empty();
                        var ap = data.petitions.petition_certificate;
                        var finalap = ap.split(".");
                        if (finalap['1'] == "pdf") {
                            $('#petition_certificates').append(
                                "<a  style='margin-right:15px;' target='_blank'   href='{{ url('/assets/image/') }}/" + data.petitions.petition_certificate + "'>" +"<img  class='example-image' alt='image-1'  style='height:100px;width:100px;margin-right:15px;' src='{{ url('/assets/image/pdf.png') }}'>" + '</a>');
                        } else {
                            $('#petition_certificate').html(
                                "<a  target='_blank'  href='{{ url('/assets/image/') }}/" +
                                data.petitions.petition_certificate + " '>" +
                                "<img  class='example-image' alt='image-1'  style='height:100px;width:100pxborder-radius:50px' src='{{ url('/assets/image/') }}/" +
                                data.petitions.petition_certificate + "'>" + '</a>');
                            // $('#warrent_file').html("<img style='height:70;width:100px;' src=' {{ url('/assets/image/') }}/"+data.warrent_file+"'>");
                        }
                        $("#judgments_files").empty();
                        $("#judgments_file").empty();
                        var ap = data.petitions.judgments_file;
                        var finalap = ap.split(".");
                        if (finalap['1'] == "pdf") {
                            $('#judgments_files').append(
                                "<a  style='margin-right:15px;' target='_blank'   href='{{ url('/assets/image/') }}/" + data.petitions.judgments_file + "'>" +"<img  class='example-image' alt='image-1'  style='height:100px;width:100px;margin-right:15px;' src='{{ url('/assets/image/pdf.png') }}'>" + '</a>');
                        } else {
                            $('#judgments_file').html(
                                "<a  target='_blank'  href='{{ url('/assets/image/') }}/" +
                                data.petitions.judgments_file + " '>" +
                                "<img  class='example-image' alt='image-1'  style='height:100px;width:100pxborder-radius:50px' src='{{ url('/assets/image/') }}/" +
                                data.petitions.judgments_file + "'>" + '</a>');
                            // $('#warrent_file').html("<img style='height:70;width:100px;' src=' {{ url('/assets/image/') }}/"+data.warrent_file+"'>");
                        }
                        $("#application_in_urdu_files").empty();
                        $("#application_in_urdu_file").empty();
                        var ap = data.petitions.application_in_urdu_file;
                        var finalap = ap.split(".");
                        if (finalap['1'] == "pdf") {
                            $('#application_in_urdu_files').append(
                                "<a  style='margin-right:15px;' target='_blank'   href='{{ url('/assets/image/') }}/" + data.petitions.application_in_urdu_file + "'>" +"<img  class='example-image' alt='image-1'  style='height:100px;width:100px;margin-right:15px;' src='{{ url('/assets/image/pdf.png') }}'>" + '</a>');
                        } else {
                            $('#application_in_urdu_file').html(
                                "<a  target='_blank'  href='{{ url('/assets/image/') }}/" +
                                data.petitions.application_in_urdu_file + " '>" +
                                "<img  class='example-image' alt='image-1'  style='height:100px;width:100pxborder-radius:50px' src='{{ url('/assets/image/') }}/" +
                                data.petitions.application_in_urdu_file + "'>" + '</a>');
                            // $('#warrent_file').html("<img style='height:70;width:100px;' src=' {{ url('/assets/image/') }}/"+data.warrent_file+"'>");
                        }

                        // home department file
                        $("#homefilepdf").empty();
                        $("#homepic").empty();
                       if( data.homepititions == null){
                        $(".homeDoc").addClass('d-none');
                       }else{
                        $(".homeDoc").removeClass('d-none');
                         $('#homeremarks').text(data.homepititions.remarks);
                        $.each(data.homepititions.homefileattachements, function(key, val) {
                            var fil = val.file
                            if (val.type == 'pdf') {
                                // alert(val.type=='pdf');
                                // $("#picss").empty();
                                // $('#picss').append("<a   href='{{ url('/assets/image/') }}/"+val.file+" data-lightbox='example-1''>"+"<img  class='example-image' alt='image-1'  style='height:100px;width:100pxborder-radius:50px' src='{{ url('/assets/image/') }}/"+val.file+"'>"+'</a>');
                                $('#homefilepdf').append(
                                    "<a  style='margin-right:15px;'  target='_blank'  href='{{ url('/assets/image/') }}/" +
                                    val.file + "'>" +"<img  class='example-image' alt='image-1'  style='height:100px;width:100px;margin-right:15px;' src='{{ url('/assets/image/pdf.png') }}'>" + '</a>');
                            } else {
                                // $('#pic').append("<img style='height:100px;width:100pxborder-radius:50px' src='{{ url('/assets/image/') }}/"+val.file+"'>");
                                $('#homepic').append(
                                    "<a  target='_blank'  data-lightbox='example-1' href='{{ url('/assets/image/') }}/" +
                                    val.file + " '>" +
                                    "<img  class='example-image' alt='image-1'  style='height:100px;width:100px; margin-right:15px;' src='{{ url('/assets/image/') }}/" +
                                    val.file + "'>" + '</a>');
                            }
                        });
                       }

                       if( data.homepititions.remarks == ""){
                        $(".homeremarks").addClass('d-none');
                        alert("here");
                       }else{
                        $(".homeremarks").removeClass('d-none');
                        //  $('#homeremarks').text(data.homepititions.remarks);

                       }
                       if( data.homepititions.homefileattachements == ""){
                        $(".homefile").addClass('d-none');
                       }else
                       {
                        $(".homefile").removeClass('d-none');
                    //    $.each(data.homepititions.homefileattachements, function(key, val) {
                    //         var fil = val.file
                    //         if (val.type == 'pdf') {
                    //             // alert(val.type=='pdf');
                    //             // $("#picss").empty();
                    //             // $('#picss').append("<a   href='{{ url('/assets/image/') }}/"+val.file+" data-lightbox='example-1''>"+"<img  class='example-image' alt='image-1'  style='height:100px;width:100pxborder-radius:50px' src='{{ url('/assets/image/') }}/"+val.file+"'>"+'</a>');
                    //             $('#homefilepdf').append(
                    //                 "<a  style='margin-right:15px;'  target='_blank'  href='{{ url('/assets/image/') }}/" +
                    //                 val.file + "'>" +"<img  class='example-image' alt='image-1'  style='height:100px;width:100px;margin-right:15px;' src='{{ url('/assets/image/pdf.png') }}'>" + '</a>');
                    //         } else {
                    //             // $('#pic').append("<img style='height:100px;width:100pxborder-radius:50px' src='{{ url('/assets/image/') }}/"+val.file+"'>");
                    //             $('#homepic').append(
                    //                 "<a  target='_blank'  data-lightbox='example-1' href='{{ url('/assets/image/') }}/" +
                    //                 val.file + " '>" +
                    //                 "<img  class='example-image' alt='image-1'  style='height:100px;width:100px; margin-right:15px;' src='{{ url('/assets/image/') }}/" +
                    //                 val.file + "'>" + '</a>');
                    //         }
                    //     });
                    }
                        // $("#homefilepdf").empty();
                        // $("#homepic").empty();
                        // //HomeDepartment
                        // $('#homeremarks').text(data.homepititions.remarks);
                        // $.each(data.homepititions.homefileattachements, function(key, val) {
                        //     var fil = val.file
                        //     //  alert(val.file);
                        //     if (val.type == 'pdf') {
                        //         // alert(val.type=='pdf');
                        //         // $("#picss").empty();
                        //         // $('#picss').append("<a   href='{{ url('/assets/image/') }}/"+val.file+" data-lightbox='example-1''>"+"<img  class='example-image' alt='image-1'  style='height:100px;width:100pxborder-radius:50px' src='{{ url('/assets/image/') }}/"+val.file+"'>"+'</a>');
                        //         $('#homefilepdf').append(
                        //             "<a  style='margin-right:15px;'  target='_blank'  href='{{ url('/assets/image/') }}/" +
                        //             val.file + "'>" +"<img  class='example-image' alt='image-1'  style='height:100px;width:100px;margin-right:15px;' src='{{ url('/assets/image/pdf.png') }}'>" + '</a>');
                        //     } else {
                        //         // $('#pic').append("<img style='height:100px;width:100pxborder-radius:50px' src='{{ url('/assets/image/') }}/"+val.file+"'>");
                        //         $('#homepic').append(
                        //             "<a  target='_blank'  data-lightbox='example-1' href='{{ url('/assets/image/') }}/" +
                        //             val.file + " '>" +
                        //             "<img  class='example-image' alt='image-1'  style='height:100px;width:100px; margin-right:15px;' src='{{ url('/assets/image/') }}/" +
                        //             val.file + "'>" + '</a>');
                        //     }
                        // });
                        //interior mintry
                        // $('#interiorremarks').text(data.interiorpititions.remarks);
                        // $("#interiorfilepdf").empty();
                        // $("#interiorpic").empty();
                        // $.each(data.interiorpititions.interiorfileattachements, function(key,
                        //     val) {
                        //     var fil = val.file
                        //     //  alert(val.file);
                        //     if (val.type == 'pdf') {
                        //         // alert(val.type=='pdf');
                        //         // $("#picss").empty();
                        //         // $('#picss').append("<a   href='{{ url('/assets/image/') }}/"+val.file+" data-lightbox='example-1''>"+"<img  class='example-image' alt='image-1'  style='height:100px;width:100pxborder-radius:50px' src='{{ url('/assets/image/') }}/"+val.file+"'>"+'</a>');
                        //         $('#interiorfilepdf').append(
                        //             "<a  style='margin-right:15px;'  target='_blank'  href='{{ url('/assets/image/') }}/" +
                        //             val.file + "'>" +"<img  class='example-image' alt='image-1'  style='height:100px;width:100px;margin-right:15px;' src='{{ url('/assets/image/pdf.png') }}'>" + '</a>');
                        //     } else {
                        //         // $('#pic').append("<img style='height:100px;width:100pxborder-radius:50px' src='{{ url('/assets/image/') }}/"+val.file+"'>");
                        //         $('#interiorpic').append(
                        //             "<a  target='_blank'  data-lightbox='example-1' href='{{ url('/assets/image/') }}/" +
                        //             val.file + " '>" +
                        //             "<img  class='example-image' alt='image-1'  style='height:100px;width:100px; margin-right:15px;' src='{{ url('/assets/image/') }}/" +
                        //             val.file + "'>" + '</a>');
                        //     }
                        // });
                        if( data.interiorpititions == null){
                                $(".interiorDoc").addClass('d-none');
                        }else{
                            $(".interiorDoc").removeClass('d-none');
                            $('#interiorremarks').text(data.interiorpititions.remarks);
                        $("#interiorfilepdf").empty();
                        $("#interiorpic").empty();
                        $.each(data.interiorpititions.interiorfileattachements, function(key,
                            val) {
                            var fil = val.file
                            //  alert(val.file);
                            if (val.type == 'pdf') {
                                // alert(val.type=='pdf');
                                // $("#picss").empty();
                                // $('#picss').append("<a   href='{{ url('/assets/image/') }}/"+val.file+" data-lightbox='example-1''>"+"<img  class='example-image' alt='image-1'  style='height:100px;width:100pxborder-radius:50px' src='{{ url('/assets/image/') }}/"+val.file+"'>"+'</a>');
                                $('#interiorfilepdf').append(
                                    "<a  style='margin-right:15px;'  target='_blank'  href='{{ url('/assets/image/') }}/" +
                                    val.file + "'>" +"<img  class='example-image' alt='image-1'  style='height:100px;width:100px;margin-right:15px;' src='{{ url('/assets/image/pdf.png') }}'>" + '</a>');
                            } else {
                                // $('#pic').append("<img style='height:100px;width:100pxborder-radius:50px' src='{{ url('/assets/image/') }}/"+val.file+"'>");
                                $('#interiorpic').append(
                                    "<a  target='_blank'  data-lightbox='example-1' href='{{ url('/assets/image/') }}/" +
                                    val.file + " '>" +
                                    "<img  class='example-image' alt='image-1'  style='height:100px;width:100px; margin-right:15px;' src='{{ url('/assets/image/') }}/" +
                                    val.file + "'>" + '</a>');
                            }
                        });
                        }
                        if( data.interiorpititions.remarks == ""){
                            $(".interiorremarks").addClass('d-none');
                        }else{
                            $(".interiorremarks").removeClass('d-none');
                            // $('#interiorremarks').text(data.interiorpititions.remarks);
                        }
                         if( data.interiorpititions.interiorfileattachements == ""){
                            $(".interiorfile").addClass('d-none');
                        }else{
                            $(".interiorfile").removeClass('d-none');
                        //     $.each(data.interiorpititions.interiorfileattachements, function(key,
                        //     val) {
                        //     var fil = val.file
                        //     //  alert(val.file);
                        //     if (val.type == 'pdf') {
                        //         // alert(val.type=='pdf');
                        //         // $("#picss").empty();
                        //         // $('#picss').append("<a   href='{{ url('/assets/image/') }}/"+val.file+" data-lightbox='example-1''>"+"<img  class='example-image' alt='image-1'  style='height:100px;width:100pxborder-radius:50px' src='{{ url('/assets/image/') }}/"+val.file+"'>"+'</a>');
                        //         $('#interiorfilepdf').append(
                        //             "<a  style='margin-right:15px;'  target='_blank'  href='{{ url('/assets/image/') }}/" +
                        //             val.file + "'>" +"<img  class='example-image' alt='image-1'  style='height:100px;width:100px;margin-right:15px;' src='{{ url('/assets/image/pdf.png') }}'>" + '</a>');
                        //     } else {
                        //         // $('#pic').append("<img style='height:100px;width:100pxborder-radius:50px' src='{{ url('/assets/image/') }}/"+val.file+"'>");
                        //         $('#interiorpic').append(
                        //             "<a  target='_blank'  data-lightbox='example-1' href='{{ url('/assets/image/') }}/" +
                        //             val.file + " '>" +
                        //             "<img  class='example-image' alt='image-1'  style='height:100px;width:100px; margin-right:15px;' src='{{ url('/assets/image/') }}/" +
                        //             val.file + "'>" + '</a>');
                        //     }
                        // });
                        }
                        //Human right department
                        // $('#humanrightremarks').text(data.humanrightpittions.remarks);
                        // $("#humanrightfilepdf").empty();
                        // $("#humanrightpic").empty();
                        // $.each(data.humanrightpittions.humanrightfileattachements, function(key,
                        //     val) {
                        //     var fil = val.file
                        //     //  alert(val.file);
                        //     if (val.type == 'pdf') {
                        //         // alert(val.type=='pdf');
                        //         // $("#picss").empty();
                        //         // $('#picss').append("<a   href='{{ url('/assets/image/') }}/"+val.file+" data-lightbox='example-1''>"+"<img  class='example-image' alt='image-1'  style='height:100px;width:100pxborder-radius:50px' src='{{ url('/assets/image/') }}/"+val.file+"'>"+'</a>');
                        //         $('#humanrightfilepdf').append(
                        //             "<a  style='margin-right:15px;'  target='_blank'  href='{{ url('/assets/image/') }}/" +
                        //             val.file + "'>" + "<img  class='example-image' alt='image-1'  style='height:100px;width:100px;margin-right:15px;' src='{{ url('/assets/image/pdf.png') }}'>" + '</a>');
                        //     } else {
                        //         // $('#pic').append("<img style='height:100px;width:100pxborder-radius:50px' src='{{ url('/assets/image/') }}/"+val.file+"'>");
                        //         $('#humanrightpic').append(
                        //             "<a  target='_blank'  data-lightbox='example-1' href='{{ url('/assets/image/') }}/" +
                        //             val.file + " '>" +
                        //             "<img  class='example-image' alt='image-1'  style='height:100px;width:100px; margin-right:15px;' src='{{ url('/assets/image/') }}/" +
                        //             val.file + "'>" + '</a>');
                        //     }
                        // });
                        if( data.humanrightpittions == null){
                                $(".humanDoc").addClass('d-none');
                            }else{
                                $(".humanDoc").removeClass('d-none');
                        $('#humanrightremarks').text(data.humanrightpittions.remarks);
                        $("#humanrightfilepdf").empty();
                        $("#humanrightpic").empty();
                        $.each(data.humanrightpittions.humanrightfileattachements, function(key,
                            val) {
                            var fil = val.file
                            //  alert(val.file);
                            if (val.type == 'pdf') {
                                // alert(val.type=='pdf');
                                // $("#picss").empty();
                                // $('#picss').append("<a   href='{{ url('/assets/image/') }}/"+val.file+" data-lightbox='example-1''>"+"<img  class='example-image' alt='image-1'  style='height:100px;width:100pxborder-radius:50px' src='{{ url('/assets/image/') }}/"+val.file+"'>"+'</a>');
                                $('#humanrightfilepdf').append(
                                    "<a  style='margin-right:15px;'  target='_blank'  href='{{ url('/assets/image/') }}/" +
                                    val.file + "'>" +"<img  class='example-image' alt='image-1'  style='height:100px;width:100px;margin-right:15px;' src='{{ url('/assets/image/pdf.png') }}'>" + '</a>');
                            } else {
                                // $('#pic').append("<img style='height:100px;width:100pxborder-radius:50px' src='{{ url('/assets/image/') }}/"+val.file+"'>");
                                $('#humanrightpic').append(
                                    "<a  target='_blank'  data-lightbox='example-1' href='{{ url('/assets/image/') }}/" +
                                    val.file + " '>" +
                                    "<img  class='example-image' alt='image-1'  style='height:100px;width:100px; margin-right:15px;' src='{{ url('/assets/image/') }}/" +
                                    val.file + "'>" + '</a>');
                            }
                        });
                            }
                            if( data.humanrightpittions.remarks == ""){
                            $(".humanremarks").addClass('d-none');
                        }else{
                            $(".humanremarks").removeClass('d-none');
                            // $('#humanrightremarks').text(data.humanrightpittions.remarks);
                        }
                        if(data.humanrightpittions.humanrightfileattachements==""){
                            $(".humanfile").addClass('d-none');
                        }else{
                            $(".humanfile").removeClass('d-none');
                        //     $.each(data.humanrightpittions.humanrightfileattachements, function(key,
                        //     val) {
                        //     var fil = val.file
                        //     //  alert(val.file);
                        //     if (val.type == 'pdf') {
                        //         // alert(val.type=='pdf');
                        //         // $("#picss").empty();
                        //         // $('#picss').append("<a   href='{{ url('/assets/image/') }}/"+val.file+" data-lightbox='example-1''>"+"<img  class='example-image' alt='image-1'  style='height:100px;width:100pxborder-radius:50px' src='{{ url('/assets/image/') }}/"+val.file+"'>"+'</a>');
                        //         $('#humanrightfilepdf').append(
                        //             "<a  style='margin-right:15px;'  target='_blank'  href='{{ url('/assets/image/') }}/" +
                        //             val.file + "'>" +"<img  class='example-image' alt='image-1'  style='height:100px;width:100px;margin-right:15px;' src='{{ url('/assets/image/pdf.png') }}'>" + '</a>');
                        //     } else {
                        //         // $('#pic').append("<img style='height:100px;width:100pxborder-radius:50px' src='{{ url('/assets/image/') }}/"+val.file+"'>");
                        //         $('#humanrightpic').append(
                        //             "<a  target='_blank'  data-lightbox='example-1' href='{{ url('/assets/image/') }}/" +
                        //             val.file + " '>" +
                        //             "<img  class='example-image' alt='image-1'  style='height:100px;width:100px; margin-right:15px;' src='{{ url('/assets/image/') }}/" +
                        //             val.file + "'>" + '</a>');
                        //     }
                        // });
                        }
                    }
                });
            });
        });
    </script>
    <script type=text/javascript>
        $(document).ready(function() {
            $('body').on('click', '#remarksview', function(event) {
                event.preventDefault();
                //  alert( $(this).data('id'));
                //  $("#getData").click(function() {
                //     var get = $(this).val();
                //     alert(get);
                var id = $(this).data('id');
                $.ajax({ //create an ajax request to display.php
                    type: "GET",
                    url: "{{ url('remarks') }}/" + id,
                    datatype: 'json',
                    success: function(data) {
                        $("#homeremarksedit").empty();
                        $('#homeremarksedit').append(
                                    "<a class='mx-2px btn radius-1 border-2 btn-xs btn-brc-tp btn-light-secondary btn-h-lighter-success btn-a-lighter-success bg-success text-white' style='margin-right:15px;'    href='{{ url('homeremarksedit/') }}/" +
                                    id + "'>" + ' Forward <i class="fa fa-forward"></i>'+
                                                                 '</a>');
                        $("#petitionrmarksedit").empty();
                        $('#petitionrmarksedit').append(
                                    "<a class='mx-2px btn radius-1 border-2 btn-xs btn-brc-tp btn-light-secondary btn-h-lighter-success btn-a-lighter-success bg-success text-white' style='margin-right:15px;'    href='{{ url('petitionrmarksedit/') }}/" +
                                    id + "'>" + ' Forward <i class="fa fa-forward"></i>'+
                                                                 '</a>');
                        $("#forward").empty();
                        $('#forward').append(
                                    "<a class='mx-2px btn radius-1 border-2 btn-xs btn-brc-tp btn-light-secondary btn-h-lighter-success btn-a-lighter-success bg-success text-white' style='margin-right:15px;'    href='{{ url('petitionforward/') }}/" +
                                    id + "'>" + ' Forward <i class="fa fa-forward"></i>'+
                                                                 '</a>');
                                                                 
                     $('#prisonerid').text(data.petitions.prisonerid);
                        $('#firstname').text(data.petitions.name);
                        $('#Fathername').text(data.petitions.f_name);
                        $('#Nationality').text(data.petitions.nationality);
                        $('#status').text(data.petitions.status);
                        $('#Physicalstatus').text(data.petitions.physicalstatus.PhysicalStatus);
                        $('#Confined_in_jail').text(data.petitions.confined_in_jail);
                        $('#Gender').text(data.petitions.gender);
                        $('#Dob').text(data.petitions.dob);
                        $('.firdate').text(data.petitions.fir_date);
                        $('#marksofindentification').text(data.petitions.mark_of_identification);
                        $('#address').text(data.petitions.address);
                        $('#phone').text(data.petitions.phone);
                        $('#imediateheirs').text(data.petitions.imediate_heirs);
                         $('.policestation').text(data.petitions.name_of_policestation);
                        $('#casetitle').text(data.petitions.case_title);
                        $('#casefirno').text(data.petitions.case_fir_no);
                        $('#caste').text(data.petitions.caste);
                        $('#cnic').text(data.petitions.cnic);
                        $('#age').text(data.petitions.age_of_petitioner);
                        $('#martialstatus').text(data.petitions.martial_status);
                        $('#religion').text(data.petitions.religion);
                        $('#education').text(data.petitions.education);
                        $('#occupation').text(data.petitions.Occupation);
                        $('#mentalhealth').text(data.petitions.mental_health);
                        $('#physicalhealth').text(data.petitions.physical_health);
                        $('#natureofcrime').text(data.petitions.nature_of_crime);
                        $('#prisonerconduct').text(data.petitions.prisoner_conduct);
                        $('#compoundableoffence').text(data.petitions.compoundable_offence);
                        $('#noncompoundableoffence').text(data.petitions.non_compoundable_offence);
                        $('#mitigatingcircumstances').text(data.petitions.mitigating_circumstances);
                        $('#petitionhistory').text(data.petitions.petition_history);
                        $('#Mercypetitiondate').text(data.petitions.mercypetitiondate);
                        $('#Section_id').text(data.petitions.section_id);
                        $('#Province').text(data.petitions.provinces.province_name);
                      
                        $('#Remarks').text(data.petitions.remarks);
                        $('#sentence_in_court').text(data.petitions.sentence_in_court);
                        $('#date_of_sentence').text(data.petitions.date_of_sentence);
                        
                        $("#pic").empty();
                        $("#picss").empty();
                        $.each(data.petitions.fileattachements, function(key, val) {
                            var fil = val.file
                                if (val.type == 'pdf') {
// alert(val.type=='pdf');
// $("#picss").empty();
// $('#picss').append("<a   href='{{ url('/assets/image/') }}/"+val.file+" data-lightbox='example-1''>"+"<img  class='example-image' alt='image-1'  style='height:100px;width:100pxborder-radius:50px' src='{{ url('/assets/image/') }}/"+val.file+"'>"+'</a>');
                        $('#picss').append(
                            "<a   style='margin-right:15px;'  target='_blank'  href='{{ url('/assets/image/') }}/" +
                            val.file + "'>" +"<img  class='example-image' alt='image-1'  style='height:100px;width:100px;margin-right:15px;' src='{{ url('/assets/image/pdf.png') }}'>" + '</a>');
                        } else {
                        // $('#pic').append("<img style='height:100px;width:100pxborder-radius:50px' src='{{ url('/assets/image/') }}/"+val.file+"'>");
                        $('#pic').append(
                            "<a target='_blank'  data-lightbox='example-1' href='{{ url('/assets/image/') }}/" +
                            val.file + " '>" +
                            "<img  class='example-image' alt='image-1'  style='height:100px;width:100px;margin-right:15px;' src='{{ url('/assets/image/') }}/" +
                            val.file + "'>" + '</a>');
}
                            //  alert(val.file);
                        });
                        $("#application_images").empty();
                        $("#application_image").empty();
                        var ap = data.petitions.application_image;
                        var finalap = ap.split(".");
                        if (finalap['1'] == "pdf") {
                            $('#application_images').append(
                                "<a  target='_blank'  href='{{ url('/assets/image/') }}/" +
                                data.petitions.application_image + "'>" +"<img  class='example-image' alt='image-1'  style='height:100px;width:100px;margin-right:15px;' src='{{ url('/assets/image/pdf.png') }}'>" + '</a>');
                        } else {
                            // $('#application_image').html("<img style='height:70;width:100px;' src=' {{ url('/assets/image/') }}/"+data.application_image+"'>");
                            $('#application_image').html(
                                "<a  target='_blank'  data-lightbox='example-1' href='{{ url('/assets/image/') }}/" +
                                data.petitions.application_image + " '>" +
                                "<img  class='example-image' alt='image-1'  style='height:100px;width:100px' src='{{ url('/assets/image/') }}/" +
                                data.petitions.application_image + "'>" + '</a>');
                        }
                        $("#health_papers").empty();
                        $("#health_paper").empty();
                        var ap = data.petitions.health_paper;
                        var finalap = ap.split(".");
                        if (finalap['1'] == "pdf") {
                            $('#health_papers').append(
                                "<a  target='_blank'  href='{{ url('/assets/image/') }}/" +
                                data.petitions.health_paper + "'>" + "<img  class='example-image' alt='image-1'  style='height:100px;width:100px;margin-right:15px;' src='{{ url('/assets/image/pdf.png') }}'>" + '</a>');
                        } else {
                            $('#health_paper').html(
                                "<a target='_blank'  data-lightbox='example-1' href='{{ url('/assets/image/') }}/" +
                                data.petitions.health_paper + " '>" +
                                "<img  class='example-image' alt='image-1'  style='height:100px;width:100pxborder-radius:50px' src='{{ url('/assets/image/') }}/" +
                                data.petitions.health_paper + "'>" + '</a>');
                            // $('#health_paper').html("<img style='height:70;width:100px;' src=' {{ url('/assets/image/') }}/"+data.health_paper+"'>");
                        }
                        $("#warrent_files").empty();
                        $("#warrent_file").empty();
                        var ap = data.petitions.warrent_file;
                        var finalap = ap.split(".");
                        if (finalap['1'] == "pdf") {
                            $('#warrent_files').append(
                                "<a target='_blank'   href='{{ url('/assets/image/') }}/" +
                                data.petitions.warrent_file + "'>" +"<img  class='example-image' alt='image-1'  style='height:100px;width:100px;margin-right:15px;' src='{{ url('/assets/image/pdf.png') }}'>"+ '</a>');
                        } else {
                            $('#warrent_file').html(
                                "<a target='_blank'  data-lightbox='example-1' href='{{ url('/assets/image/') }}/" +
                                data.petitions.warrent_file + " '>" +
                                "<img  class='example-image' alt='image-1'  style='height:100px;width:100pxborder-radius:50px' src='{{ url('/assets/image/') }}/" +
                                data.petitions.warrent_file + "'>" + '</a>');
                            // $('#warrent_file').html("<img style='height:70;width:100px;' src=' {{ url('/assets/image/') }}/"+data.warrent_file+"'>");
                        }
                        //  $('#Prisonerimage').html("<img style='height:100px;width:100px;border-radius:50px;' src=' {{ url('/assets/image/') }}/"+data.prisoner_image+"'>");
                        $("#Prisonerimage").empty();
                        $('#Prisonerimage').html(
                            "<a target='_blank'  data-lightbox='example-1' href='{{ url('/assets/image/') }}/" +
                            data.petitions.prisoner_image + " '>" +
                            "<img  class='example-image' alt='image-1'  style='height:100px;width:100px;border-radius:50px' src='{{ url('/assets/image/') }}/" +
                            data.petitions.prisoner_image + "'>" + '</a>');

                            $("#convection_summarys").empty();
                        $("#convection_summary").empty();
                       
                        var ap = data.petitions.convection_summary;
                        var finalap = ap.split(".");
                        if (finalap['1'] == "pdf") {
                            $('#convection_summarys').append(
                                "<a  style='margin-right:15px;' target='_blank'   href='{{ url('/assets/image/') }}/" + data.petitions
                                .convection_summary + "'>" +"<img  class='example-image' alt='image-1'  style='height:100px;width:100px;margin-right:15px;' src='{{ url('/assets/image/pdf.png') }}'>" + '</a>');
                        } else {
                            $('#convection_summary').html(
                                "<a  target='_blank'  href='{{ url('/assets/image/') }}/" +
                                data.petitions.convection_summary + " '>" +
                                "<img  class='example-image' alt='image-1'  style='height:100px;width:100pxborder-radius:50px' src='{{ url('/assets/image/') }}/" +
                                data.petitions.convection_summary + "'>" + '</a>');
                            // $('#warrent_file').html("<img style='height:70;width:100px;' src=' {{ url('/assets/image/') }}/"+data.warrent_file+"'>");
                        }
                        $("#check_list_files").empty();
                        $("#check_list_file").empty();
                        var ap = data.petitions.check_list_file;
                        var finalap = ap.split(".");
                        if (finalap['1'] == "pdf") {
                            $('#check_list_files').append(
                                "<a  style='margin-right:15px;' target='_blank'   href='{{ url('/assets/image/') }}/" + data.petitions.check_list_file + "'>" +"<img  class='example-image' alt='image-1'  style='height:100px;width:100px;margin-right:15px;' src='{{ url('/assets/image/pdf.png') }}'>" + '</a>');
                        } else {
                            $('#check_list_file').html(
                                "<a  target='_blank'  href='{{ url('/assets/image/') }}/" +
                                data.petitions.check_list_file + " '>" +
                                "<img  class='example-image' alt='image-1'  style='height:100px;width:100pxborder-radius:50px' src='{{ url('/assets/image/') }}/" +
                                data.petitions.check_list_file + "'>" + '</a>');
                            // $('#warrent_file').html("<img style='height:70;width:100px;' src=' {{ url('/assets/image/') }}/"+data.warrent_file+"'>");
                        }

                        $("#petition_roll_files").empty();
                        $("#petition_roll_file").empty();
                        var ap = data.petitions.petition_roll_file;
                        var finalap = ap.split(".");
                        if (finalap['1'] == "pdf") {
                            $('#petition_roll_files').append(
                                "<a  style='margin-right:15px;' target='_blank'   href='{{ url('/assets/image/') }}/" + data.petitions.petition_roll_file + "'>" +"<img  class='example-image' alt='image-1'  style='height:100px;width:100px;margin-right:15px;' src='{{ url('/assets/image/pdf.png') }}'>" + '</a>');
                        } else {
                            $('#petition_roll_file').html(
                                "<a  target='_blank'  href='{{ url('/assets/image/') }}/" +
                                data.petitions.petition_roll_file + " '>" +
                                "<img  class='example-image' alt='image-1'  style='height:100px;width:100pxborder-radius:50px' src='{{ url('/assets/image/') }}/" +
                                data.petitions.petition_roll_file + "'>" + '</a>');
                            // $('#warrent_file').html("<img style='height:70;width:100px;' src=' {{ url('/assets/image/') }}/"+data.warrent_file+"'>");
                        }

                        $("#petition_certificates").empty();
                        $("#petition_certificate").empty();
                        var ap = data.petitions.petition_certificate;
                        var finalap = ap.split(".");
                        if (finalap['1'] == "pdf") {
                            $('#petition_certificates').append(
                                "<a  style='margin-right:15px;' target='_blank'   href='{{ url('/assets/image/') }}/" + data.petitions.petition_certificate + "'>" +"<img  class='example-image' alt='image-1'  style='height:100px;width:100px;margin-right:15px;' src='{{ url('/assets/image/pdf.png') }}'>" + '</a>');
                        } else {
                            $('#petition_certificate').html(
                                "<a  target='_blank'  href='{{ url('/assets/image/') }}/" +
                                data.petitions.petition_certificate + " '>" +
                                "<img  class='example-image' alt='image-1'  style='height:100px;width:100pxborder-radius:50px' src='{{ url('/assets/image/') }}/" +
                                data.petitions.petition_certificate + "'>" + '</a>');
                            // $('#warrent_file').html("<img style='height:70;width:100px;' src=' {{ url('/assets/image/') }}/"+data.warrent_file+"'>");
                        }
                        $("#judgments_files").empty();
                        $("#judgments_file").empty();
                        var ap = data.petitions.judgments_file;
                        var finalap = ap.split(".");
                        if (finalap['1'] == "pdf") {
                            $('#judgments_files').append(
                                "<a  style='margin-right:15px;' target='_blank'   href='{{ url('/assets/image/') }}/" + data.petitions.judgments_file + "'>" +"<img  class='example-image' alt='image-1'  style='height:100px;width:100px;margin-right:15px;' src='{{ url('/assets/image/pdf.png') }}'>" + '</a>');
                        } else {
                            $('#judgments_file').html(
                                "<a  target='_blank'  href='{{ url('/assets/image/') }}/" +
                                data.petitions.judgments_file + " '>" +
                                "<img  class='example-image' alt='image-1'  style='height:100px;width:100pxborder-radius:50px' src='{{ url('/assets/image/') }}/" +
                                data.petitions.judgments_file + "'>" + '</a>');
                            // $('#warrent_file').html("<img style='height:70;width:100px;' src=' {{ url('/assets/image/') }}/"+data.warrent_file+"'>");
                        }
                        $("#application_in_urdu_files").empty();
                        $("#application_in_urdu_file").empty();
                        var ap = data.petitions.application_in_urdu_file;
                        var finalap = ap.split(".");
                        if (finalap['1'] == "pdf") {
                            $('#application_in_urdu_files').append(
                                "<a  style='margin-right:15px;' target='_blank'   href='{{ url('/assets/image/') }}/" + data.petitions.application_in_urdu_file + "'>" +"<img  class='example-image' alt='image-1'  style='height:100px;width:100px;margin-right:15px;' src='{{ url('/assets/image/pdf.png') }}'>" + '</a>');
                        } else {
                            $('#application_in_urdu_file').html(
                                "<a  target='_blank'  href='{{ url('/assets/image/') }}/" +
                                data.petitions.application_in_urdu_file + " '>" +
                                "<img  class='example-image' alt='image-1'  style='height:100px;width:100pxborder-radius:50px' src='{{ url('/assets/image/') }}/" +
                                data.petitions.application_in_urdu_file + "'>" + '</a>');
                            // $('#warrent_file').html("<img style='height:70;width:100px;' src=' {{ url('/assets/image/') }}/"+data.warrent_file+"'>");
                        }
                         $("#homefilepdf").empty();
                        $("#homepic").empty();
                       if( data.homepititions == null){
                        $(".homeDoc").addClass('d-none');
                       }else{
                        $(".homeDoc").removeClass('d-none');
                         $('#homeremarks').text(data.homepititions.remarks);
                        $.each(data.homepititions.homefileattachements, function(key, val) {
                            var fil = val.file
                            if (val.type == 'pdf') {
                                // alert(val.type=='pdf');
                                // $("#picss").empty();
                                // $('#picss').append("<a   href='{{ url('/assets/image/') }}/"+val.file+" data-lightbox='example-1''>"+"<img  class='example-image' alt='image-1'  style='height:100px;width:100pxborder-radius:50px' src='{{ url('/assets/image/') }}/"+val.file+"'>"+'</a>');
                                $('#homefilepdf').append(
                                    "<a  style='margin-right:15px;'  target='_blank'  href='{{ url('/assets/image/') }}/" +
                                    val.file + "'>" +"<img  class='example-image' alt='image-1'  style='height:100px;width:100px;margin-right:15px;' src='{{ url('/assets/image/pdf.png') }}'>" + '</a>');
                            } else {
                                // $('#pic').append("<img style='height:100px;width:100pxborder-radius:50px' src='{{ url('/assets/image/') }}/"+val.file+"'>");
                                $('#homepic').append(
                                    "<a  target='_blank'  data-lightbox='example-1' href='{{ url('/assets/image/') }}/" +
                                    val.file + " '>" +
                                    "<img  class='example-image' alt='image-1'  style='height:100px;width:100px; margin-right:15px;' src='{{ url('/assets/image/') }}/" +
                                    val.file + "'>" + '</a>');
                            }
                        });
                       
                        if( data.homepititions.remarks == ""){
                        $(".homeremarks").addClass('d-none');
                       }else{
                        $(".homeremarks").removeClass('d-none');
                        //  $('#homeremarks').text(data.homepititions.remarks);
                       }
                      
                       if( data.homepititions.homefileattachements == ""){
                        $(".homefile").addClass('d-none');
                       }else
                       {
                        $(".homefile").removeClass('d-none');
                    
                    }
                       }
                        // interior file
                        $("#interiorfilepdf").empty();
                        $("#interiorpic").empty();
                       
                        if( data.interiorpititions == null){
                         $(".interiorDoc").addClass('d-none');
                        }else{
                            $(".interiorDoc").removeClass('d-none');
                            $('#interiorremarks').text(data.interiorpititions.remarks);
                        $.each(data.interiorpititions.interiorfileattachements, function(key,
                            val) {
                            var fil = val.file
                            //  alert(val.file);
                            if (val.type == 'pdf') {
                                // alert(val.type=='pdf');
                                // $("#picss").empty();
                                // $('#picss').append("<a   href='{{ url('/assets/image/') }}/"+val.file+" data-lightbox='example-1''>"+"<img  class='example-image' alt='image-1'  style='height:100px;width:100pxborder-radius:50px' src='{{ url('/assets/image/') }}/"+val.file+"'>"+'</a>');
                                $('#interiorfilepdf').append(
                                    "<a  style='margin-right:15px;'  target='_blank'  href='{{ url('/assets/image/') }}/" +
                                    val.file + "'>" +"<img  class='example-image' alt='image-1'  style='height:100px;width:100px;margin-right:15px;' src='{{ url('/assets/image/pdf.png') }}'>" + '</a>');
                            } else {
                                // $('#pic').append("<img style='height:100px;width:100pxborder-radius:50px' src='{{ url('/assets/image/') }}/"+val.file+"'>");
                                $('#interiorpic').append(
                                    "<a  target='_blank'  data-lightbox='example-1' href='{{ url('/assets/image/') }}/" +
                                    val.file + " '>" +
                                    "<img  class='example-image' alt='image-1'  style='height:100px;width:100px; margin-right:15px;' src='{{ url('/assets/image/') }}/" +
                                    val.file + "'>" + '</a>');
                            }
                        });
                       
                        if( data.interiorpititions.remarks == ""){
                            $(".interiorremarks").addClass('d-none');
                        }else{
                            $(".interiorremarks").removeClass('d-none');
                            // $('#interiorremarks').text(data.interiorpititions.remarks);
                        }
                         if( data.interiorpititions.interiorfileattachements == ""){
                            $(".interiorfile").addClass('d-none');
                        }else{
                            $(".interiorfile").removeClass('d-none');
                        
                        }
                        }
                        $("#humanrightfilepdf").empty();
                        $("#humanrightpic").empty();
                        if( data.humanrightpittions == null){
                                $(".humanDoc").addClass('d-none');
                            }else{
                                $(".humanDoc").removeClass('d-none');
                        $('#humanrightremarks').text(data.humanrightpittions.remarks);
                        $.each(data.humanrightpittions.humanrightfileattachements, function(key,
                            val) {
                            var fil = val.file
                            //  alert(val.file);
                            if (val.type == 'pdf') {
                                
                                $('#humanrightfilepdf').append(
                                    "<a  style='margin-right:15px;'  target='_blank'  href='{{ url('/assets/image/') }}/" +
                                    val.file + "'>" +"<img  class='example-image' alt='image-1'  style='height:100px;width:100px;margin-right:15px;' src='{{ url('/assets/image/pdf.png') }}'>" + '</a>');
                            } else {
                                // $('#pic').append("<img style='height:100px;width:100pxborder-radius:50px' src='{{ url('/assets/image/') }}/"+val.file+"'>");
                                $('#humanrightpic').append(
                                    "<a  target='_blank'  data-lightbox='example-1' href='{{ url('/assets/image/') }}/" +
                                    val.file + " '>" +
                                    "<img  class='example-image' alt='image-1'  style='height:100px;width:100px; margin-right:15px;' src='{{ url('/assets/image/') }}/" +
                                    val.file + "'>" + '</a>');
                            }
                        });
                        if( data.humanrightpittions.remarks == ""){
                            $(".humanremarks").addClass('d-none');
                        }else{
                            $(".humanremarks").removeClass('d-none');
                            // $('#humanrightremarks').text(data.humanrightpittions.remarks);
                        }
                        if(data.humanrightpittions.humanrightfileattachements==""){
                            $(".humanfile").addClass('d-none');
                        }else{
                            $(".humanfile").removeClass('d-none');
                     
                        }
                            }
                    }
                });
            });
        });
    </script>

    <script type=text/javascript>
        $(document).ready(function() {
            $('body').on('click', '#show-user', function(event) {
                event.preventDefault();
                //  alert( $(this).data('id'));
                //  $("#getData").click(function() {
                //     var get = $(this).val();
                //     alert(get);
                var id = $(this).data('id');
                $.ajax({ //create an ajax request to display.php
                    type: "GET",
                    url: "{{ url('view') }}/" + id,
                    datatype: 'json',
                    success: function(data) {


                        $("#forward").empty();
                        $('#forward').append(
                                    "<a class='mx-2px btn radius-1 border-2 btn-xs btn-brc-tp btn-light-secondary btn-h-lighter-success btn-a-lighter-success bg-success text-white' style='margin-right:15px;'    href='{{ url('petitionforward/') }}/" +
                                    id + "'>" + ' Forward <i class="fa fa-forward"></i>'+
                                                                 '</a>');
                        $("#Homeforward").empty();
                        $('#Homeforward').append(
                                    "<a class='mx-2px btn radius-1 border-2 btn-xs btn-brc-tp btn-light-secondary btn-h-lighter-success btn-a-lighter-success bg-success text-white' style='margin-right:15px;'    href='{{ url('Homeforward/') }}/" +
                                    id + "'>" + ' Forward <i class="fa fa-forward"></i>'+
                                                                 '</a>');
                        $('#id').text(data.id);
                      
                        $('#firstname').text(data.name);
                        $('#Fathername').text(data.f_name);
                        $('#Nationality').text(data.nationality);
                        $('#Physicalstatus').text(data.physicalstatus.PhysicalStatus);
                        $('#Confined_in_jail').text(data.confined_in_jail);
                        $('#Gender').text(data.gender);
                        $('#Dob').text(data.dob);
                        $('#prisonerid').text(data.prisonerid);
                        $('#status').text(data.status);
                        $('.firdate').text(data.fir_date);
                        $('#marksofindentification').text(data.mark_of_identification);
                        $('#address').text(data.address);
                        $('#phone').text(data.phone);
                        $('#imediateheirs').text(data.imediate_heirs);
                        
                        $('.policestation').text(data.name_of_policestation);
                        $('#casetitle').text(data.case_title);
                        $('#casefirno').text(data.case_fir_no);
                        $('#caste').text(data.caste);
                        $('#cnic').text(data.cnic);
                        $('#age').text(data.age_of_petitioner);
                        $('#martialstatus').text(data.martial_status);
                        $('#religion').text(data.religion);
                        $('#education').text(data.education);
                        $('#occupation').text(data.Occupation);
                        $('#mentalhealth').text(data.mental_health);
                        $('#physicalhealth').text(data.physical_health);
                        $('#natureofcrime').text(data.nature_of_crime);
                        $('#prisonerconduct').text(data.prisoner_conduct);
                        $('#compoundableoffence').text(data.compoundable_offence);
                        $('#noncompoundableoffence').text(data.non_compoundable_offence);
                        $('#mitigatingcircumstances').text(data.mitigating_circumstances);
                        $('#petitionhistory').text(data.petition_history);
                       
                        $('#Mercypetitiondate').text(data.mercypetitiondate);
                      
                        $('#Section_id').text(data.section_id);
                        $('#Province').text(data.provinces.province_name);
                       
                        $('#Remarks').text(data.remarks);
                        $('#sentence_in_court').text(data.sentence_in_court);
                        $('#date_of_sentence').text(data.date_of_sentence);
                       
                        $("#pic").empty();
                        $("#picss").empty();
                        $.each(data.fileattachements, function(key, val) {
                            var fil = val.file
                            //  alert(val.file);
                            if (val.type == 'pdf') {
                                // alert(val.type=='pdf');
                                // $("#picss").empty();
                                // $('#picss').append("<a   href='{{ url('/assets/image/') }}/"+val.file+" data-lightbox='example-1''>"+"<img  class='example-image' alt='image-1'  style='height:100px;width:100pxborder-radius:50px' src='{{ url('/assets/image/') }}/"+val.file+"'>"+'</a>');
                                $('#picss').append(
                                    "<a  style='margin-right:15px;' target='_blank'  href='{{ url('/assets/image/') }}/" +
                                    val.file + "'>" + "<img  class='example-image' alt='image-1'  style='height:100px;width:100px;margin-right:15px;' src='{{ url('/assets/image/pdf.png') }}'>" + '</a>');
                            } else {
                                // $('#pic').append("<img style='height:100px;width:100pxborder-radius:50px' src='{{ url('/assets/image/') }}/"+val.file+"'>");
                                $('#pic').append(
                                    "<a  target='_blank'  href='{{ url('/assets/image/') }}/" +
                                    val.file + " '>" +
                                    "<img  class='example-image' alt='image-1'  style='height:100px;width:100px; margin-right:15px;' src='{{ url('/assets/image/') }}/" +
                                    val.file + "'>" + '</a>');
                            }
                        });
                        $("#application_images").empty();
                        $("#application_image").empty();
                        var ap = data.application_image;
                        var finalap = ap.split(".");
                        if (finalap['1'] == "pdf") {
                            $('#application_images').append(
                                "<a style='margin-right:15px;'' target='_blank'   href='{{ url('/assets/image/') }}/" + data
                                .application_image + "'download>" +"<img  class='example-image' alt='image-1'  style='height:100px;width:100px;margin-right:15px;' src='{{ url('/assets/image/pdf.png') }}'>"+ '</a>');
                        } else {
                            // $('#application_image').html("<img style='height:70;width:100px;' src=' {{ url('/assets/image/') }}/"+data.application_image+"'>");
                            $('#application_image').html(
                                "<a  target='_blank'  href='{{ url('/assets/image/') }}/" +
                                data.application_image + " 'download>" +
                                "<img  class='example-image' alt='image-1'  style='height:100px;width:100px;margin-right:15px;' src='{{ url('/assets/image/') }}/" +
                                data.application_image + "'>" + '</a>');
                        }
                        $("#health_papers").empty();
                        $("#health_paper").empty();
                        var ap = data.health_paper;
                        var finalap = ap.split(".");
                        if (finalap['1'] == "pdf") {
                            $('#health_papers').append(
                                "<a  style='margin-right:15px;' target='_blank'   href='{{ url('/assets/image/') }}/" + data
                                .health_paper + "'>" + "<img  class='example-image' alt='image-1'  style='height:100px;width:100px;margin-right:15px;' src='{{ url('/assets/image/pdf.png') }}'>" + '</a>');
                        } else {
                            $('#health_paper').html(
                                "<a  target='_blank'  href='{{ url('/assets/image/') }}/" +
                                data.health_paper + " '>" +
                                "<img  class='example-image' alt='image-1'  style='height:100px;width:100pxborder-radius:50px' src='{{ url('/assets/image/') }}/" +
                                data.health_paper + "'>" + '</a>');
                            // $('#health_paper').html("<img style='height:70;width:100px;' src=' {{ url('/assets/image/') }}/"+data.health_paper+"'>");
                        }
                        $("#warrent_files").empty();
                        $("#warrent_file").empty();
                        var ap = data.warrent_file;
                        var finalap = ap.split(".");
                        if (finalap['1'] == "pdf") {
                            $('#warrent_files').append(
                                "<a  style='margin-right:15px;' target='_blank'   href='{{ url('/assets/image/') }}/" + data
                                .warrent_file + "'>" +"<img  class='example-image' alt='image-1'  style='height:100px;width:100px;margin-right:15px;' src='{{ url('/assets/image/pdf.png') }}'>" + '</a>');
                        } else {
                            $('#warrent_file').html(
                                "<a  target='_blank'  href='{{ url('/assets/image/') }}/" +
                                data.warrent_file + " '>" +
                                "<img  class='example-image' alt='image-1'  style='height:100px;width:100pxborder-radius:50px' src='{{ url('/assets/image/') }}/" +
                                data.warrent_file + "'>" + '</a>');
                            // $('#warrent_file').html("<img style='height:70;width:100px;' src=' {{ url('/assets/image/') }}/"+data.warrent_file+"'>");
                        }


                        //  $('#Prisonerimage').html("<img style='height:100px;width:100px;border-radius:50px;' src=' {{ url('/assets/image/') }}/"+data.prisoner_image+"'>");
                        $("#Prisonerimage").empty();
                        $('#Prisonerimage').html(
                            "<a  target='_blank'  href='{{ url('/assets/image/') }}/" +
                            data.prisoner_image + " '>" +
                            "<img  class='example-image' alt='image-1'  style='height:100px;width:100px;border-radius:50px' src='{{ url('/assets/image/') }}/" +
                            data.prisoner_image + "'>" + '</a>');
                         $("#convection_summarys").empty();
                        $("#convection_summary").empty();
                        var ap = data.convection_summary;
                        var finalap = ap.split(".");
                        if (finalap['1'] == "pdf") {
                            $('#convection_summarys').append(
                                "<a  style='margin-right:15px;' target='_blank'   href='{{ url('/assets/image/') }}/" + data
                                .convection_summary + "'>" +"<img  class='example-image' alt='image-1'  style='height:100px;width:100px;margin-right:15px;' src='{{ url('/assets/image/pdf.png') }}'>" + '</a>');
                        } else {
                            $('#convection_summary').html(
                                "<a  target='_blank'  href='{{ url('/assets/image/') }}/" +
                                data.convection_summary + " '>" +
                                "<img  class='example-image' alt='image-1'  style='height:100px;width:100pxborder-radius:50px' src='{{ url('/assets/image/') }}/" +
                                data.convection_summary + "'>" + '</a>');
                            // $('#warrent_file').html("<img style='height:70;width:100px;' src=' {{ url('/assets/image/') }}/"+data.warrent_file+"'>");
                        }
                        $("#check_list_files").empty();
                        $("#check_list_file").empty();
                        var ap = data.check_list_file;
                        var finalap = ap.split(".");
                        if (finalap['1'] == "pdf") {
                            $('#check_list_files').append(
                                "<a  style='margin-right:15px;' target='_blank'   href='{{ url('/assets/image/') }}/" + data
                                .check_list_file + "'>" +"<img  class='example-image' alt='image-1'  style='height:100px;width:100px;margin-right:15px;' src='{{ url('/assets/image/pdf.png') }}'>" + '</a>');
                        } else {
                            $('#check_list_file').html(
                                "<a  target='_blank'  href='{{ url('/assets/image/') }}/" +
                                data.check_list_file + " '>" +
                                "<img  class='example-image' alt='image-1'  style='height:100px;width:100pxborder-radius:50px' src='{{ url('/assets/image/') }}/" +
                                data.check_list_file + "'>" + '</a>');
                            // $('#warrent_file').html("<img style='height:70;width:100px;' src=' {{ url('/assets/image/') }}/"+data.warrent_file+"'>");
                        }

                        $("#petition_roll_files").empty();
                        $("#petition_roll_file").empty();
                        var ap = data.petition_roll_file;
                        var finalap = ap.split(".");
                        if (finalap['1'] == "pdf") {
                            $('#petition_roll_files').append(
                                "<a  style='margin-right:15px;' target='_blank'   href='{{ url('/assets/image/') }}/" + data
                                .petition_roll_file + "'>" +"<img  class='example-image' alt='image-1'  style='height:100px;width:100px;margin-right:15px;' src='{{ url('/assets/image/pdf.png') }}'>" + '</a>');
                        } else {
                            $('#petition_roll_file').html(
                                "<a  target='_blank'  href='{{ url('/assets/image/') }}/" +
                                data.petition_roll_file + " '>" +
                                "<img  class='example-image' alt='image-1'  style='height:100px;width:100pxborder-radius:50px' src='{{ url('/assets/image/') }}/" +
                                data.petition_roll_file + "'>" + '</a>');
                            // $('#warrent_file').html("<img style='height:70;width:100px;' src=' {{ url('/assets/image/') }}/"+data.warrent_file+"'>");
                        }

                        $("#petition_certificates").empty();
                        $("#petition_certificate").empty();
                        var ap = data.petition_certificate;
                        var finalap = ap.split(".");
                        if (finalap['1'] == "pdf") {
                            $('#petition_certificates').append(
                                "<a  style='margin-right:15px;' target='_blank'   href='{{ url('/assets/image/') }}/" + data
                                .petition_certificate + "'>" +"<img  class='example-image' alt='image-1'  style='height:100px;width:100px;margin-right:15px;' src='{{ url('/assets/image/pdf.png') }}'>" + '</a>');
                        } else {
                            $('#petition_certificate').html(
                                "<a  target='_blank'  href='{{ url('/assets/image/') }}/" +
                                data.petition_certificate + " '>" +
                                "<img  class='example-image' alt='image-1'  style='height:100px;width:100pxborder-radius:50px' src='{{ url('/assets/image/') }}/" +
                                data.petition_certificate + "'>" + '</a>');
                            // $('#warrent_file').html("<img style='height:70;width:100px;' src=' {{ url('/assets/image/') }}/"+data.warrent_file+"'>");
                        }
                        $("#judgments_files").empty();
                        $("#judgments_file").empty();
                        var ap = data.judgments_file;
                        var finalap = ap.split(".");
                        if (finalap['1'] == "pdf") {
                            $('#judgments_files').append(
                                "<a  style='margin-right:15px;' target='_blank'   href='{{ url('/assets/image/') }}/" + data
                                .judgments_file + "'>" +"<img  class='example-image' alt='image-1'  style='height:100px;width:100px;margin-right:15px;' src='{{ url('/assets/image/pdf.png') }}'>" + '</a>');
                        } else {
                            $('#judgments_file').html(
                                "<a  target='_blank'  href='{{ url('/assets/image/') }}/" +
                                data.judgments_file + " '>" +
                                "<img  class='example-image' alt='image-1'  style='height:100px;width:100pxborder-radius:50px' src='{{ url('/assets/image/') }}/" +
                                data.judgments_file + "'>" + '</a>');
                            // $('#warrent_file').html("<img style='height:70;width:100px;' src=' {{ url('/assets/image/') }}/"+data.warrent_file+"'>");
                        }
                        $("#application_in_urdu_files").empty();
                        $("#application_in_urdu_file").empty();
                        var ap = data.application_in_urdu_file;
                        var finalap = ap.split(".");
                        if (finalap['1'] == "pdf") {
                            $('#application_in_urdu_files').append(
                                "<a  style='margin-right:15px;' target='_blank'   href='{{ url('/assets/image/') }}/" + data
                                .application_in_urdu_file + "'>" +"<img  class='example-image' alt='image-1'  style='height:100px;width:100px;margin-right:15px;' src='{{ url('/assets/image/pdf.png') }}'>" + '</a>');
                        } else {
                            $('#application_in_urdu_file').html(
                                "<a  target='_blank'  href='{{ url('/assets/image/') }}/" +
                                data.application_in_urdu_file + " '>" +
                                "<img  class='example-image' alt='image-1'  style='height:100px;width:100pxborder-radius:50px' src='{{ url('/assets/image/') }}/" +
                                data.application_in_urdu_file + "'>" + '</a>');
                            // $('#warrent_file').html("<img style='height:70;width:100px;' src=' {{ url('/assets/image/') }}/"+data.warrent_file+"'>");
                        }
                    }
                });
            });
        });
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.0/sweetalert.min.js"></script>
    <script type="text/javascript">
        $('.show_confirm').click(function(event) {
            var form = $(this).closest("form");
            var name = $(this).data("name");
            event.preventDefault();
            swal({
                    title: `Are you sure you want to  end stay of this petition?`,
                    icon: "warning",
                    buttons: true,
                    dangerMode: false,
                })
                .then((willDelete) => {
                    if (willDelete) {
                        form.submit();
                    }
                });
        });
        $('.inactive').click(function(event) {
            var form = $(this).closest("form");
            var name = $(this).data("name");
            event.preventDefault();
            swal({
                    title: "Are you sure you want to Delete this user?",
                    text: "If you delete this, it will be gone forever.",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete) {
                        form.submit();
                    }
                });
        });
    </script>

    <script>
        $(document).ready(function() {
            $('#roles').change(function() {
                var selected = $(this).val();
                if (selected == 'jail-supt') {
                    $('#province').removeClass("d-lg-none");
                    $('#provincehome').addClass("d-lg-none");
                }else if(selected == 'Homedept'){
                    $('#provincehome').removeClass("d-lg-none");
                    $('#confined_in_jail').addClass("d-lg-none");
                }else if(selected == 'Admin'){
                    $('#provincehome').removeClass("d-lg-none");
                    $('#confined_in_jail').addClass("d-lg-none");
                }
                else{
                    $('#province').addClass("d-lg-none");
                    $('#confined_in_jail').addClass("d-lg-none");
                    $('#provincehome').addClass("d-lg-none");
                }
                // else if(selected=='2'){
                //     $('#Edema').hide();
                //     $('#Fetalposition').hide();
                //     $('#Fundal').hide();
            });
        });
    </script>
   

     <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.22/pdfmake.min.js"></script>
     <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.4.1/html2canvas.min.js"></script>
     <script type="text/javascript"  src="https://cdn.rawgit.com/rainabba/jquery-table2excel/1.1.0/dist/jquery.table2excel.min.js"></script>

    <script type="text/javascript">
        function Export() {
            html2canvas(document.getElementsByClassName('tblCustomers'), {
                onrendered: function (canvas) {
                    var data = canvas.toDataURL();
                    var docDefinition = {
                        content: [{
                            image: data,
                            width: 500
                        }]
                    };
                    pdfMake.createPdf(docDefinition).download("Mercypetition_report.pdf");
                }
            });
        }

       
    </script>
    <script type="text/javascript">
    function printpayablebalanceexcel()  {

$('.nbsp').addClass("removenbsp");
  $("#forprint").removeAttr("style");
  
//   var datatoptint = "<div id='#repheader' style='text-align: center; margin-bottom: 5px;'><h5>Summary Report</h5><h5 style='text-align: center;'><span>For The Peroid </span>"+$("#payablestime").val()+"&nbsp;To&nbsp;"+$("#payableetime").val()+"</h5></div>";
  datatoptint = document.getElementById('forprint').outerHTML;
  

var a = document.createElement('a');
var data_type = 'data:application/vnd.ms-excel';
a.href = data_type + ', ' + encodeURIComponent(datatoptint);
//setting the file name
a.download = 'Mercypetition_report.xls';
//triggering the function
a.click();
//just in case, prevent default behaviour
e.preventDefault();
return true;

  } 
 </script>

     
     
     <script>
        $(document).ready(function() {
 $('#provincejail').change(function() {
    var selected = $(this).val();
    if (selected) {
        $('#confined_in_jail').removeClass("d-lg-none");
    }
    $.ajax({ //create an ajax request to display.php
type: "GET",
url: "{{ url('jailview') }}/" + selected,
datatype: 'json',
success: function(data) {
        $('#jailname').empty();
                    $('#jailname').append('<option disabled value="" selected hidden>Select jail</option>');
                    $.each(data, function(key, val) {
                        $('#jailname').append('<option value="'+ val.jail_name +'">'+val.jail_name+'</option>');
                        // $('#police_station_id_fk option[value='+value.police_station_id+']').attr('selected','selected');
    });
    }
});
});
});
</script>


    <script>
        document.getElementById("btnPrint").onclick = function() {
            document.getElementById("btnPrint").style.display = 'none';
            document.getElementById('btnhide1').style.display = 'none';
            printElement(document.getElementById("printThis"));
        }
        function printElement(elem) {
            var domClone = elem.cloneNode(true);
            document.getElementById("btnPrint").style.display = 'block';
            document.getElementById('btnhide1').style.display = 'block';
            var $printSection = document.getElementById("printSection");
            if (!$printSection) {
                var $printSection = document.createElement("div");
                $printSection.id = "printSection";
                document.body.appendChild($printSection);
            }
            $printSection.innerHTML = "";
            $printSection.appendChild(domClone);
            window.print();
        }
    </script>
    
    <script>
$(document).ready(function() {
        //////////////////////////////////
        // the small time picker inside popover
    var daterange_container = document.querySelector('#id-daterange-container')
        // Inject DateRangePicker into our container
        DateRangePicker.DateRangePicker(daterange_container, {
            mode: 'dp-modal'
          })
          .on('statechange', function(_, rp) {
            // Update the inputs when the state changes
            var range = rp.state
            $('#id-daterange-from').val(range.start ? range.start.toDateString() : '')
            $('#id-daterange-to').val(range.end ? range.end.toDateString() : '')
          })
        $('#id-daterange-from, #id-daterange-to').on('focus', function() {
          daterange_container.classList.add('visible')
        })
        var daterange_wrapper = document.querySelector('#id-daterange-wrapper')
        var previousTimeout = null;
        $(daterange_wrapper).on('focusout', function() {
          if (previousTimeout) clearTimeout(previousTimeout)
          previousTimeout = setTimeout(function() {
            if (!daterange_wrapper.contains(document.activeElement)) {
              daterange_container.classList.remove('visible')
            }
          }, 10)
        });
        $('#id-popover-timepicker')
          .popover({
            title: 'Choose Time',
            sanitize: false,
            content: function() {
              return $('#id-popover-timepicker-html').html()
            },
            html: true,
            placement: 'auto',
            trigger: 'manual',
            container: 'body',
            template: '<div class="popover popover-timepicker brc-primary-m3 border-1 radius-1 shadow-sm" role="tooltip"><div class="arrow brc-primary"></div><h3 class="popover-header bgc-primary-l3 brc-primary-l1 text-dark-tp4 text-600 text-center pb-25"></h3><div class="popover-body text-grey-d2 p-4"></div></div>'
          })
          .on('click', function() {
            // show popover when button is clicked
            $(this).popover('toggle')
            $(this).toggleClass('active')
            // get a reference to it
            var popover = $(document.body).find('.popover-timepicker').last()
            // hide popover if clicked outside of it
            if (popover.length > 0 && popover.hasClass('show')) {
              var This = this
              $(document).on('click.popover-time', function(ev) {
                if (popover.get(0).contains(ev.target) || ev.target == document.getElementById('id-popover-timepicker')) return
                $(This).popover('hide')
                $(This).removeClass('active')
                $(document).off('.popover-time')
              })
            }
          });
});
        </script>
<script>
    $('.select2').select2({
          allowClear: true,
          dropdownParent: $('#select2-parent'),
         
        })

      
    </script>
<script>
    $(document).ready(function() {
      $('.del-prov').on('click', function(e){
        e.preventDefault();
        if($(this).attr('id') > 0)
        {
          var del_route = "<?php echo 'province/destroy/';?>"+$(this).attr('id');
          Swal.fire({
          //html: true,
          title: 'Are you sure?',
          html: "You want to delete?",
          icon: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'Yes, delete it!'
          }).then((result) => {
            if (result.value) {
              window.location = del_route;
            }
          })
          return false;
        }
      });
    });
  </script>

    <script src="http://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
        crossorigin="anonymous"></script>
    <script>
        $(document).ready(function() {
            $('.del-PS').on('click', function(e) {
                e.preventDefault();
                if ($(this).attr('id') > 0) {
                    var del_route = "<?php echo 'physicalstatus/destroy/'; ?>" + $(this).attr('id');
                    Swal.fire({
                        //html: true,
                        title: 'Are you sure?',
                        html: "You want to delete?",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Yes, delete it!'
                    }).then((result) => {
                        if (result.value) {
                            window.location = del_route;
                        }
                    })
                    return false;
                }
            });
        });
        $("#selectAll").click(function() {
            $("input[type=checkbox]").prop("checked", $(this).prop("checked"));
        });
        $("input[type=checkbox]").click(function() {
            if (!$(this).prop("checked")) {
                $("#selectAll").prop("checked", false);
            }
        });
    </script>
<script>
$(document).ready(function() {
    $('#mytable').DataTable( {
        dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ]
    } );
} );
</script>
 
  

{{-- <script src="{{ asset('assets/js/jquery.steps.min.js') }}"></script>
<script src="{{ asset('assets/js/jquery.steps.js') }}"></script> --}}
  <script>
   
   var currentTab = 0; // Current tab is set to be the first tab (0)
showTab(currentTab); // Display the current tab

function showTab(n) {
  // This function will display the specified tab of the form ...
  var x = document.getElementsByClassName("tab");
  x[n].style.display = "block";
  // ... and fix the Previous/Next buttons:
  if (n == 0) {
    document.getElementById("prevBtn").style.display = "none";
  } else {
    document.getElementById("prevBtn").style.display = "inline";
  }
  if (n == (x.length - 1)) {
    document.getElementById("nextBtn").innerHTML = "Submit";
  } else {
    document.getElementById("nextBtn").innerHTML = "Next";
  }
  // ... and run a function that displays the correct step indicator:
  fixStepIndicator(n)
}

function nextPrev(n) {
  // This function will figure out which tab to display
  var x = document.getElementsByClassName("tab");
  // Exit the function if any field in the current tab is invalid:
  if (n == 1 && !validateForm()) return false;
  // Hide the current tab:
  x[currentTab].style.display = "none";
  // Increase or decrease the current tab by 1:
  currentTab = currentTab + n;
  // if you have reached the end of the form... :
  if (currentTab >= x.length) {
    //...the form gets submitted:
    document.getElementById("regForm").submit();

    return true;
  }
  // Otherwise, display the correct tab:
  showTab(currentTab);
}

function validateForm() {
  // This function deals with validation of the form fields
  var x, y, i, valid = true;
  x = document.getElementsByClassName("tab");
  y = x[currentTab].getElementsByTagName("input");
  // A loop that checks every input field in the current tab:
  for (i = 0; i < y.length; i++) {
    // If a field is empty...
    if (y[i].value == "") {
      // add an "invalid" class to the field:
      y[i].className += " invalid";
      // and set the current valid status to false:
      valid = false;
    }
  }
  // If the valid status is true, mark the step as finished and valid:
  if (valid) {
    document.getElementsByClassName("step")[currentTab].className += " finish";
  }
  return valid; // return the valid status
}

function fixStepIndicator(n) {
  // This function removes the "active" class of all steps...
  var i, x = document.getElementsByClassName("step");
  for (i = 0; i < x.length; i++) {
    x[i].className = x[i].className.replace(" active", "");
  }
  //... and adds the "active" class to the current step:
  x[n].className += " active";
}
</script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery.inputmask/4.0.9/jquery.inputmask.bundle.js"></script>
<script>
    $(":input").inputmask();

   </script>

    <style>
        .myclass {
            float: left;
            margin-top: 1px;
            margin-right: 6px;
        }
    </style>
    @yield('scripts')
</body>

</html>
