
<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="{{ app() -> getLocale() === 'ar' ? 'rtl' : 'ltr'}}">
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

    <link rel="stylesheet" type="text/css" href="{{asset('assets/admin/fonts/meteocons/style.css')}}">

    <link rel="stylesheet" type="text/css" href="{{asset('assets/admin/vendors/css/forms/toggle/bootstrap-switch.min.css')}}">
    
    <!--// END FONTS & VENDOR CSS-->

    <!-- BEGIN MODERN CSS-->

    <link rel="stylesheet" type="text/css" href="{{asset('assets/admin/'.getFolder().'/app.css')}}">

    <link rel="stylesheet" type="text/css" href="{{asset('assets/admin/'.getFolder().'/custom-rtl.css')}}">
    
    <!--// END MODERN CSS-->

    <!-- BEGIN Page Level CSS-->

     <link rel="stylesheet" type="text/css" href="{{asset('assets/admin/fonts/simple-line-icons/style.css')}}">

    <!--// End Page Level CSS-->

    <!-- BEGIN Custom CSS-->
     
     <link rel="stylesheet" type="text/css" href="{{asset('assets/admin/css/style.css')}}">

     <!--// END Custom CSS-->      
</head>
<body class="login-pg blank-page blank-page">

 <!--begain preloader-->
 <div class="preloader">
   <div class="preloader-status"></div>
 </div>
 <!--//begain preloader-->
 <div class="body-content-wrapper">

    @yield('content')

  </div> 

   <!-- BEGIN VENDOR JS-->
   <script src="{{asset('assets/admin/vendors/js/vendors.min.js')}}" type="text/javascript"></script>
   <!--// END VENDOR JS-->
   <!-- BEGIN FORM JS-->
   <script src="{{asset('assets/admin/vendors/js/forms/icheck/icheck.min.js')}}" type="text/javascript"></script>
   <script src="{{asset('assets/admin/vendors/js/forms/validation/jqBootstrapValidation.js')}}"
        type="text/javascript"></script>
   <script src="{{asset('assets/admin/js/scripts/forms/form-login-register.js')}}" type="text/javascript"></script>
   <script src="{{asset('assets/admin/js/scripts/forms/form-valid.js')}}" type="text/javascript"></script>
   <!--// END FORM LEVEL JS-->
   <script src="{{asset('assets/admin/js/scripts/custom/preloader.js')}}" type="text/javascript"></script>
   <!--// END CUSTOM JS-->

   @yield('script')

 </body>
</html>
