<!DOCTYPE html>
<html class="loading" lang="{{ app() -> getLocale() === 'ar' ? 'ar' : 'en'}}" data-textdirection="{{ app() -> getLocale() === 'ar' ? 'rtl' : 'ltr'}}">
<head>
    <title>@yield('title') | {{ trans('admin.title') }}</title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="description"
          content="trans('admin.title')">
    <meta name="keywords"
          content="trans('admin.title')">
    <meta name="author" content="PIXINVENT">
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('assets/admin/images/ico/favicon.ico')}}">
    
    <!-- BEGIN FONTS & VENDOR CSS-->

    <link rel="stylesheet" type="text/css" href="{{asset('assets/admin/fonts/line-awesome1.3.0/css/line-awesome.min.css')}}">

    <link rel="stylesheet" type="text/css" href="{{asset('assets/admin/fonts/fontawesome/css/all.min.css')}}">

    <link rel="stylesheet" type="text/css" href="{{asset('assets/admin/fonts/fontawesome/css/fontawesome.min.css')}}">

    <link rel="stylesheet" type="text/css" href="{{asset('assets/admin/css-rtl/plugins/animate/animate.css')}}">

    <link rel="stylesheet" type="text/css" href="{{asset('assets/admin/'.getFolder().'/vendors.css')}}">

    <link rel="stylesheet" type="text/css" href="{{asset('assets/admin/vendors/css/weather-icons/climacons.min.css')}}">

    <link rel="stylesheet" type="text/css" href="{{asset('assets/admin/fonts/meteocons/style.css')}}">

    <link rel="stylesheet" type="text/css" href="{{asset('assets/admin/vendors/css/forms/selects/select2.min.css')}}">
    
    <link rel="stylesheet" type="text/css"
          href="{{asset('assets/admin/vendors/css/forms/toggle/bootstrap-switch.min.css')}}">
    
          <link rel="stylesheet" type="text/css" href="{{asset('assets/admin/vendors/css/forms/toggle/switchery.min.css')}}">
    
    <link rel="stylesheet" type="text/css"
          href="{{asset('assets/admin/'.getFolder().'/core/menu/menu-types/vertical-menu.css')}}">
    
    <link rel="stylesheet" type="text/css" href="{{asset('assets/admin/'.getFolder().'/pages/chat-application.css')}}">

    <!--// END FONTS & VENDOR CSS-->

    <!-- BEGIN MODERN CSS-->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/admin/'.getFolder().'/app.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/admin/'.getFolder().'/custom-rtl.css')}}">
    <!-- END MODERN CSS-->
    <!-- BEGIN Page Level CSS-->
    <link rel="stylesheet" type="text/css"
          href="{{asset('assets/admin/'.getFolder().'/core/menu/menu-types/vertical-menu.css')}}">
    <!-- <link rel="stylesheet" type="text/css"
          href="{{asset('assets/admin/'.getFolder().'/core/colors/palette-gradient.css')}}"> -->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/admin/fonts/simple-line-icons/style.css')}}">
    <!-- <link rel="stylesheet" type="text/css"
          href="{{asset('assets/admin/'.getFolder().'/core/colors/palette-gradient.css')}}"> -->

    @yield('style')
     
    <link rel="stylesheet" type="text/css" href="{{asset('assets/admin/'.getFolder().'/pages/timeline.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/admin/vendors/css/cryptocoins/cryptocoins.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/admin/vendors/css/extensions/datedropper.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/admin/vendors/css/extensions/timedropper.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/admin/vendors/css/file-uploaders/dropzone.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/admin/css-rtl/plugins/file-uploaders/dropzone.css')}}">
    <!-- END Page Level CSS-->
    <!-- BEGIN Custom CSS-->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/admin/css/style.css')}}">
    <!-- END Custom CSS-->
</head>
<body class="vertical-layout vertical-menu 2-columns menu-expanded fixed-navbar"
      data-open="click" data-menu="vertical-menu" data-col="2-columns">
<!-- fixed-top-->

 <!--begain preloader-->
 <div class="preloader">
   <div class="preloader-status"></div>
 </div>
 <!--//begain preloader-->
 <div class="body-content-wrapper">

<!-- begin sidebar -->
@include('dashboard.includes.sidebare')
<!--// end sidebar -->
<!-- begin content -->
<div class="app-content">
   <div class="content"> 
   <!-- begin header -->
   @include('dashboard.includes.header')
   <!-- end header -->
   <div class="content-wrapper">     
   @yield('content')
  </div>
   <!-- begin footer html -->
  @include('dashboard.includes.footer')
  <!--// end footer -->
  </div>  
</div>
<!--// end content -->

<!--scroll-to-top-->
  <div class="top-up">
      <a class="auto-scroll-to-top">
         <i class="las la-chevron-up la-lg" aria-hidden="true"></i>
      </a>
  </div>
<!--//scroll-to-top-->


</div>


<!-- BEGIN PUSHER JS-->
<!-- <script src="//js.pusher.com/3.1/pusher.min.js"></script> -->
<!--// END PUSHER JS-->

<!-- BEGIN VENDOR JS-->
<script src="{{asset('assets/admin/vendors/js/vendors.min.js')}}" type="text/javascript"></script>

<!-- BEGIN VENDOR JS-->
<script src="{{asset('assets/admin/vendors/js/tables/datatable/datatables.min.js')}}"
        type="text/javascript"></script>
<script src="{{asset('assets/admin/vendors/js/tables/datatable/dataTables.buttons.min.js')}}"
        type="text/javascript"></script>
<script src="{{asset('assets/admin/vendors/js/forms/toggle/bootstrap-switch.min.js')}}"
        type="text/javascript"></script>
<script src="{{asset('assets/admin/vendors/js/forms/toggle/bootstrap-checkbox.min.js')}}"
        type="text/javascript"></script>
<script src="{{asset('assets/admin/vendors/js/forms/toggle/switchery.min.js')}}" type="text/javascript"></script>
<script src="{{asset('assets/admin/js/scripts/forms/switch.js')}}" type="text/javascript"></script>
<script src="{{asset('assets/admin/vendors/js/forms/select/select2.full.min.js')}}" type="text/javascript"></script>
<script src="{{asset('assets/admin/js/scripts/forms/select/form-select2.js')}}" type="text/javascript"></script>
<script src="{{asset('assets/admin/vendors/js/extensions/datedropper.min.js')}}" type="text/javascript"></script>
<script src="{{asset('assets/admin/vendors/js/extensions/timedropper.min.js')}}" type="text/javascript"></script>
<script src="{{asset('assets/admin/vendors/js/forms/icheck/icheck.min.js')}}" type="text/javascript"></script>
<script src="{{asset('assets/admin/js/scripts/pages/chat-application.js')}}" type="text/javascript"></script>
<script src="{{asset('assets/admin/vendors/js/extensions/dropzone.min.js')}}" type="text/javascript"></script>
<!-- END PAGE VENDOR JS-->

<!-- BEGIN MODERN JS-->
<script src="{{asset('assets/admin/js/core/app-menu.js')}}" type="text/javascript"></script>
<script src="{{asset('assets/admin/js/core/app.js')}}" type="text/javascript"></script>

<script src="{{asset('assets/admin/js/scripts/customizer.js')}}" type="text/javascript"></script>
<!-- END MODERN JS-->

<!-- BEGIN PAGE LEVEL JS-->
<script src="{{asset('assets/admin/js/scripts/tables/datatables/datatable-basic.js')}}"
        type="text/javascript"></script>
<script src="{{asset('assets/admin/js/scripts/extensions/date-time-dropper.js')}}" type="text/javascript"></script>
<script src="{{asset('assets/admin/vendors/js/ui/prism.min.js')}}" type="text/javascript"></script>
<script src="{{asset('assets/admin/js/scripts/pages/email-application.js')}}" type="text/javascript"></script>
<script src="{{asset('assets/admin/js/scripts/forms/checkbox-radio.js')}}" type="text/javascript"></script>
<script src="{{asset('assets/admin/js/scripts/modal/components-modal.js')}}" type="text/javascript"></script>

<!-- END PAGE LEVEL JS-->

<!-- BEGIN CUSTOM JS-->
<script src="{{asset('assets/admin/js/scripts/custom/bs-custom-file-input.min.js')}}" type="text/javascript"></script>
<script src="{{asset('assets/admin/js/scripts/custom/lazyload.min.js')}}" type="text/javascript"></script>
<script src="{{asset('assets/admin/js/scripts/custom/preloader.js')}}" type="text/javascript"></script>
<script src="{{asset('assets/admin/js/scripts/custom/main.js')}}" type="text/javascript"></script>
<!--// END CUSTOM JS-->

@yield('script')



<!-- <script>
    var previousCounter = $('.notification-counter').text(); //8
    var notificationsCount = parseInt(previousCounter);
    // Enable pusher logging - don't include this in production
    var pusher = new Pusher('2203df2757e00ac59e6d', {
        encrypted: true
    });
    //Pusher.logToConsole = true;
    // Subscribe to the channel we specified in our Laravel Event
    var channel = pusher.subscribe('order');
    // Bind a function to a Our Event
    channel.bind('App\\Events\\NewOrder', function(data) {
        notificationsCount += 1;
        $('.notification-counter').text(notificationsCount)
    });


   </script> -->
 

  </body>
 </html>

