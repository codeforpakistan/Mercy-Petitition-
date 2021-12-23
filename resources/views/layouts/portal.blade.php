
<!doctype html>
<html lang="en">

  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, height=device-height, initial-scale=1">
    <title>@yield('title', 'Mercy Petition System')</title>
    <link rel="icon" type="image/png" href="{{asset('assets/favicon.png')}}" />

    <!-- include common vendor stylesheets & fontawesome -->
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600&display=swap">
    <link href="https://fonts.googleapis.com/css2?family=Pacifico&display=swap" rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="{{asset('assets/npm/bootstrap@4.5.2/dist/css/bootstrap.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/npm/fontawesome-5.14.0/css/fontawesome.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/npm/fontawesome-5.14.0/css/regular.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/npm/fontawesome-5.14.0/css/brands.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/npm/fontawesome-5.14.0/css/solid.min.css')}}">

    <link rel="stylesheet" type="text/css" href="{{asset('assets/npm/basictable@1.0.9/basictable.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/npm/summernote@0.8.18\dist/summernote-lite.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/npm/bootstrap-markdown@2.10.0/css/bootstrap-markdown.min.css')}}">
        <!-- include vendor stylesheets used in "Form Basic Elements" page. see "application/views/default/pages/partials/form-basic/@vendor-stylesheets.hbs" -->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/npm\nouislider@14.6.1\distribute\nouislider.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/npm\ion-rangeslider@2.3.1\css\ion.rangeSlider.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/combine\npm\tiny-date-picker@3.2.8\tiny-date-picker.min.css,npm\tiny-date-picker@3.2.8\date-range-picker.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/npm\eonasdan-bootstrap-datetimepicker@4.17.47\build\css\bootstrap-datetimepicker.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/npm\bootstrap-colorpicker@3.2.0\dist\css\bootstrap-colorpicker.min.css')}}">

    <link rel="stylesheet" type="text/css" href="{{asset('assets/npm\eonasdan-bootstrap-datetimepicker@4.17.47\build\css\bootstrap-datetimepicker.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/ace.min.css')}}">



  </head>

  <style>
    .b-container {
      background-image: linear-gradient(#1E2635, #1E2635);
      background-attachment: fixed;

      background-repeat: no-repeat;
    }

    .b-containers {
      background-image: linear-gradient(#1E2635, #1a1b1d);
      background-attachment: fixed;
      opacity: 16px;

      background-repeat: no-repeat;

    }
    </style>

  <body>
    <div class="body-container">
      <div class="main-container">
        <div  id="sidebar" class="b-container sidebar sidebar-dark sidebar-color sidebar-fixed sidebar-backdrop expandable" data-swipe="true" data-dismiss="true">
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
                     <span class="text-danger"><img src="{{ asset('assets/image/ig.png') }}" style="width: 50px" ;></span>
                    <span style="color:rgb(59, 59, 170)"> Mercy </span><span style ="color:rgb(160, 50, 50)">Petition</span>
                    </a>
                  </div>

                </div>
              </div><!-- /.sdebar-section-item  -->


              @include('layouts.navigation-portal')

            </div>



          </div>
        </div>


        <div role="main" class="main-content">
          <nav class="navbar navbar-sm navbar-expand-lg sidebar-dark navbar-fixed navbar-dark">
            <div class="b-containers navbar-inner shadow-md sidebar-light">

              <button type="button" class="btn btn-burger align-self-center ml-25 mr-2 d-none d-xl-flex btn-h-lighter-blue" data-toggle="sidebar" data-target="#sidebar" aria-controls="sidebar" aria-expanded="true" aria-label="Toggle sidebar">
                <span class="bars text-default"></span>
              </button>

              <div class="d-flex h-100 justify-content-xl-between align-items-center">
                <button type="button" class="btn btn-burger burger-arrowed static collapsed ml-2 d-flex d-xl-none btn-h-lighter-blue" data-toggle-mobile="sidebar" data-target="#sidebar" aria-controls="sidebar" aria-expanded="false" aria-label="Toggle sidebar">
                  <span class="bars text-default"></span>
                </button>

                {{-- <div class="d-none d-xl-inline-flex">
                  <div>
                    <ol class="breadcrumb breadcrumb-nosep align-items-center pl-1 text-nowrap mr-2">
                      <li class="breadcrumb-item active text-dark-tp4 text-105 text-600">
                        @hasSection ('module')
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
                        @hasSection ('module')
                            @yield('module')
                        @else
                          Welcome
                        @endif
                      </li>
                      <li class="mx-15 text-grey-l4 text-110">></li>
                      <li class="breadcrumb-item active text-dark-tp4 text-105 text-300">
                        @hasSection ('element')
                            @yield('element')
                        @endif
                      </li>
                    </ol>
                  </div>
                </div> --}}
                {{-- END breadcrumb  --}}

                {{-- <a class="navbar-brand d-xl-none mx-1 text-dark-m3 text-130" href="{{route('portal.dashboard')}}" style="font-family: 'Pacifico';">{{config('app.name')}}</a> --}}
                <div class="d-inline-flex">
                  <h2 class="d-none d-xl-inline-block text-140 text-dark-m2 mb-0 pb-1">{{$template ?? ''}}</h2>
                </div>
              </div>

              {{-- <div class="ml-auto navbar-menu collapse navbar-collapse navbar-backdrop" id="navbarMenu2">

                <div class="navbar-nav navbar-links">
                  <ul class="nav">
                    <li class="nav-item mx-2">
                      <a href="#" class="active btn bgc-h-primary-l4 btn-brc-tp btn-outline-secondary btn-h-lighter-secondary btn-a-outline-primary btn-a-bgc-tp btn-a-bold px-4 px-lg-2">
                       @hasSection ('topTitle')
                           @yield('topTitle')
                       @else
                          Welcome to Dashboard
                       @endif
                        <!--
                              Or use these along with `d-style` on parent 'A' for a different highlight color
                              <div class="d-none d-lg-block v-active position-bl w-100 border-t-3 brc-primary-m1 mb-n3px"></div>
                              <div class="d-lg-none v-active position-tl h-100 border-l-4 brc-primary-m1 ml-n3px"></div>
                              -->
                      </a>
                    </li>

                  </ul>
                </div>

              </div> --}}


              <div class="ml-auto mr-xl-3 navbar-menu collapse navbar-collapse navbar-backdrop" id="navbarMenu">

                <div class="navbar-nav">
                  <ul class="nav has-active-border">
                    <li class="nav-item dropdown dropdown-mega">
                      <a class="nav-link dropdown-toggle mr-1px text-white" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                        <i class="fa fa-list-alt mr-2 d-lg-none"></i>
                        @auth
                          <img class="mr-2 radius-round border-2 brc-primary-tp3 p-1px" src="{{ Auth::user()->picture ?? asset('..\assets\image\avatar\avatar4.png')}}" width="36" alt="Natalie's Photo">
                          {{ Auth::user()->name }}
                        @endauth
                        <i class="caret fa fa-angle-down d-none d-lg-block"></i>
                        <i class="caret fa fa-angle-left d-block d-lg-none"></i>
                      </a>
                      <div class="p-0 dropdown-menu dropdown-animated brc-primary-m3 border-b-2 ml-1 mr-1px w-auto bgc-default-l4 dropdown-clickable" style="left:auto">
                        <div class="d-flex flex-column">

                          <div class="order-first order-lg-last ">
                            <hr class="d-none d-lg-block brc-default-l1 my-0">
                            <div class="row mx-0 bgc-primary-l4">
                              <div class="col-lg-8 offset-lg-2 d-flex justify-content-center py-4 d-flex">
                                <a href="{{route('portal.users.profile')}}" class="mx-2px btn btn-sm btn-app btn-outline-warning btn-h-outline-warning btn-a-outline-warning radius-1 border-2">
                                  <i class="fa fa-user text-100 d-block mb-2 h-4"></i>
                                  Profile
                                </a>
                                <a href="{{route('portal.users.password')}}" class="mx-2px btn btn-sm btn-app btn-outline-info btn-h-outline-info radius-1 border-2">
                                  <i class="fa fa-key text-100 d-block mb-2 h-4"></i>
                                  Password
                                </a>
                                <form id="logout-form" action="{{route('logout')}}" method="POST" class="d-inline-block">
                                  @csrf
                                  <button type="submit" class="mx-2px btn btn-sm btn-app btn-dark radius-1">
                                    <i class="fa fa-sign-out-alt text-100 d-block mb-2 h-4"></i>
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
                      @hasSection ('module')
                          @yield('module')
                      @else
                        Welcome
                      @endif
                    </li>
                    <li class="mx-15 text-grey-l4 text-110">></li>
                    <li class="breadcrumb-item active text-dark-tp4 text-105 text-300">
                      @hasSection ('element')
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
              <h1 class="text-dark-m3 pb-0 mb-0 text-125">{{$template ?? ''}}</h1>
            </div>
            @yield('content')
          </div>
          @include('layouts.footer-portal')
        </div>
      </div>
    </div>

    <script src="{{asset('assets/js/jquery.min.js')}}"></script>
    <script src="{{asset('assets/js/popper.min.js')}}"></script>
    <script src="{{asset('assets/bootstrap-4.5.2/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('assets/js/ace.min.js')}}"></script>
    <script src="{{asset('assets/js/demo.min.js')}}"></script>


    <!-- include vendor scripts used in "Basic Tables" page. see "application/views/default/pages/partials/tables-basic/@vendor-scripts.hbs" -->
    <script src="{{asset('assets\npm\basictable@1.0.9\jquery.basictable.min.js')}}"></script>
    <script src="{{asset('assets\npm\sweetalert2@9.17.1\dist\sweetalert2.all.min.js')}}"></script>
    <script src="{{asset('assets\npm\select2@4.0.13\dist\js\select2.min.js')}}"></script>


    <!-- include vendor scripts used in "Form Basic Elements" page. see "application/views/default/pages/partials/form-basic/@vendor-scripts.hbs" -->
    <script src="{{asset('assets\npm\autosize@4.0.2\dist\autosize.min.js')}}"></script>
    <script src="{{asset('assets\npm\bootstrap-maxlength@1.10.0\dist\bootstrap-maxlength.min.js')}}"></script>
    <script src="{{asset('assets\npm\inputmask@5.0.5\dist\jquery.inputmask.min.js')}}"></script>
    <script src="{{asset('assets\npm\nouislider@14.6.1\distribute\nouislider.min.js')}}"></script>
    <script src="{{asset('assets\npm\ion-rangeslider@2.3.1\js\ion.rangeSlider.min.js')}}"></script>
    <script src="{{asset('assets\npm\bootstrap-touchspin@4.3.0\dist\jquery.bootstrap-touchspin.min.js')}}"></script>
    <script src="{{asset('assets\npm\tiny-date-picker@3.2.8\dist\date-range-picker.min.js')}}"></script>
    <script src="{{asset('assets\npm\moment@2.27.0\moment.min.js')}}"></script>
    <script src="{{asset('assets\npm\eonasdan-bootstrap-datetimepicker@4.17.47\src\js\bootstrap-datetimepicker.min.js')}}"></script>
    <script src="{{asset('assets\npm\bootstrap-colorpicker@3.2.0\dist\js\bootstrap-colorpicker.min.js')}}"></script>
    <script src="{{asset('assets\npm\es6-object-assign@1.1.0\dist\object-assign-auto.min.js')}}"></script>
    <script src="{{asset('assets\npm\@jaames\iro@5.2.0\dist\iro.min.js')}}"></script>
    <script src="{{asset('assets\npm\jquery-knob@1.2.11\dist\jquery.knob.min.js')}}"></script>
    <script src="{{asset('assets\npm\tiny-date-picker@3.2.8\dist\date-range-picker.min.js')}}"></script>
    <script src="{{asset('assets\npm\summernote@0.8.18\dist\summernote-lite.min.js')}}"></script>
    <script src="{{asset('assets\npm\bootstrap-wysiwyg@2.0.1\js\bootstrap-wysiwyg.min.js')}}"></script>
   <script>
       $('#ace-file-input1').aceFileInput({
          /**
          btnChooseClass: 'bgc-grey-l2 pt-15 px-2 my-1px mr-1px',
          btnChooseText: 'SELECT FILE',
          placeholderText: 'NO FILE YET',
          placeholderIcon: '<i class="fa fa-file bgc-warning-m1 text-white w-4 py-2 text-center"></i>'
          */
        })
        $('#ace-file-input22').aceFileInput({
          /**
          btnChooseClass: 'bgc-grey-l2 pt-15 px-2 my-1px mr-1px',
          btnChooseText: 'SELECT FILE',
          placeholderText: 'NO FILE YET',
          placeholderIcon: '<i class="fa fa-file bgc-warning-m1 text-white w-4 py-2 text-center"></i>'
          */
        })
        $('#ace-file-input12').aceFileInput({
          /**
          btnChooseClass: 'bgc-grey-l2 pt-15 px-2 my-1px mr-1px',
          btnChooseText: 'SELECT FILE',
          placeholderText: 'NO FILE YET',
          placeholderIcon: '<i class="fa fa-file bgc-warning-m1 text-white w-4 py-2 text-center"></i>'
          */
        })
        $('#ace-file-input13').aceFileInput({
          /**
          btnChooseClass: 'bgc-grey-l2 pt-15 px-2 my-1px mr-1px',
          btnChooseText: 'SELECT FILE',
          placeholderText: 'NO FILE YET',
          placeholderIcon: '<i class="fa fa-file bgc-warning-m1 text-white w-4 py-2 text-center"></i>'
          */
        })
        $('#ace-file-input14').aceFileInput({
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

              $('body').on('click','#show-user' , function(event){
                event.preventDefault();

                //  alert( $(this).data('id'));
                //  $("#getData").click(function() {

                //     var get = $(this).val();
                //     alert(get);
                var id = $(this).data('id');
                 $.ajax({  //create an ajax request to display.php

                  type: "GET",
                  url: "{{url('view')}}/"+id,
                  datatype: 'json',

                  success: function (data) {


                    console.log(data);
                    $('#firstname').text(data.name);
                    $('#Fathername').text(data.f_name);
                    $('#Nationality').text(data.nationality);
                    $('#Physicalstatus').text(data.physicalstatus);
                    $('#Confined_in_jail').text(data.confined_in_jail);
                    $('#Gender').text(data.gender);
                    $('#Dob').text(data.dob);
                    // $('#fir&date').text(data.fir&date);
                    $('#Mercypetitiondate').text(data.mercypetitiondate);
                    $('#Section_id').text(data.section_id);
                    $('#Remarks').text(data.remarks);

             $("#pic").empty();
            $("#picss").empty();
             $.each(data.fileattachements, function (key, val) {
            var fil=  val.file


          //  alert(val.file);
        if(val.type=='pdf'){

      // alert(val.type=='pdf');
      // $("#picss").empty();
      $('#picss').append("<a   href='{{url('/assets/image/')}}/"+val.file+"'>"+val.file+'</a>');

        }else{



         $('#pic').append("<img style='height:100px;width:100pxborder-radius:50px' src='{{url('/assets/image/')}}/"+val.file+"'>");
        //  $('#pic').append("<img style='height:100px;width:100pxborder-radius:50px' src='{{url('/assets/image/')}}/"+val.file+"'>");



        }


             });
                    $('#Prisonerimage').html("<img style='height:100px;width:100px;border-radius:50px;' src=' {{ url('/assets/image/') }}/"+data.prisoner_image+"'>");
                    $('#application_image').html("<img style='height:70;width:100px;' src=' {{ url('/assets/image/') }}/"+data.application_image+"'>");
                    $('#health_paper').html("<img style='height:70px;width:100px;' src=' {{ url('/assets/image/') }}/"+data.health_paper+"'>");
                    $('#warrent_file').html("<img style='height:70;width:100px;' src=' {{ url('/assets/image/') }}/"+data.prisoner_image+"'>");



                var peti =
                   "<tr>"+
                        "<td class='text-left'>Name:</td>"+
                        "<td class='font-w600 font-size-sm'>"+data.name+"</td>"+
                        "<td class='text-left'>FatherName:</td>"+
                        "<td class='font-w600 font-size-sm'>"+data.f_name+"</td>"+
                   "</tr>"
                   $('#show').text(peti);

                  }

                });

              });
              });

              $(function() {
	       	$('.pop').on('click', function() {
			$('.imagepreview').attr('src', $(this).find('img').attr('src'));
			$('#imagemodal').modal('show');
		});
});
              </script>


    @yield('scripts')
  </body>
</html>
