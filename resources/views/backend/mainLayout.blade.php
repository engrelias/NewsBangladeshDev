<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">

<!-- BEGIN: Head-->
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="author" content="ThemeSelect">

    <title>@yield('title')</title>

    <link rel="apple-touch-icon" href="{{ asset('backend/app-assets/images/ico/apple-icon-120.png')}}">
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('backend/app-assets/images/ico/favicon.ico') }}">
    <link href="https://fonts.googleapis.com/css?family=Muli:300,300i,400,400i,600,600i,700,700i%7CComfortaa:300,400,700" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> 
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

    <!-- BEGIN: Vendor CSS-->
    <link rel="stylesheet" href="{{asset('backend/app-assets/vendors/css/vendors.min.css')}}">
    <link rel="stylesheet" href="{{asset('backend/app-assets/vendors/css/charts/chartist.css')}}">
    <link rel="stylesheet" href="{{asset('backend/app-assets/vendors/css/charts/chartist-plugin-tooltip.css')}}">
    <!-- END: Vendor CSS-->

    <!-- BEGIN: Theme CSS-->
    <link rel="stylesheet" href="{{asset('backend/app-assets/css/bootstrap.css')}}">
    <link rel="stylesheet" href="{{asset('backend/app-assets/css/bootstrap-extended.css')}}">
    <link rel="stylesheet" href="{{asset('backend/app-assets/css/colors.css')}}">
    <link rel="stylesheet" href="{{asset('backend/app-assets/css/components.css')}}">
    <!-- END: Theme CSS-->

    <!-- BEGIN: Page CSS-->
    <link rel="stylesheet" href="{{asset('backend/app-assets/css/core/menu/menu-types/vertical-menu.css')}}">
    <link rel="stylesheet" href="{{asset('backend/app-assets/css/core/colors/palette-gradient.css')}}">
    <link rel="stylesheet" href="{{asset('backend/app-assets/css/pages/chat-application.csss')}}">
    <link rel="stylesheet" href="{{asset('backend/app-assets/css/pages/backend-analytics.css')}}">

    <!-- END: Page CSS-->

    <!-- BEGIN: Custom CSS-->
    <link rel="stylesheet" type="text/css" href=" {{ asset('backend/assets/css/style.css')}}">
    <!-- END: Custom CSS-->

    @yield('styles')

</head>
<!-- END: Head-->


<!------- BEGIN: Body --------->
<body class="vertical-layout vertical-menu 2-columns   fixed-navbar" data-open="click" data-menu="vertical-menu" data-color="bg-gradient-x-purple-blue" data-col="2-columns">

    <!--------- BEGIN: Header / topbar-------->
    @include('backend.layouts.header')
    <!--------- END: Header / topbar --------->


    <!---------- BEGIN: Navbar Menu ------------>
    @include('backend.layouts.nav')
    <!---------- END: Navbar Menu -------------->

    <!---------- BEGIN: Main Content ----------->
    @yield('content')
    <!---------- END: Main Content ------------->


    <!--------- BEGIN: Footer ----------------->
    @include('backend.layouts.footer')
    <!--------- END: Footer ------------------>


    <!-- BEGIN: Vendor JS-->
    <script src="{{asset('backend/app-assets/vendors/js/vendors.min.js')}}" type="text/javascript"></script>
    <!-- BEGIN Vendor JS-->

    <!-- BEGIN: Page Vendor JS-->
    <script src="{{asset('backend/app-assets/vendors/js/charts/chartist.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('backend/app-assets/vendors/js/charts/chartist-plugin-tooltip.min.js')}}" type="text/javascript"></script>
    <!-- END: Page Vendor JS-->


    <!-- BEGIN: Theme JS-->
    <script src="{{asset('backend/app-assets/js/core/app-menu.js')}}" type="text/javascript"></script>
    <script src="{{asset('backend/app-assets/js/core/app.js')}}" type="text/javascript"></script>
    <!-- END: Theme JS-->

    <!-- BEGIN: Page JS-->
    <script src="{{asset('backend/app-assets/js/scripts/pages/backend-analytics.js')}}" type="text/javascript"></script>
    <!-- END: Page JS-->

    

    @yield('scripts')


</body>
<!------- END: Body --------->
</html>