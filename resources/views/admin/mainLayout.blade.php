<!DOCTYPE html>
<html lang="en" data-theme="dark">
  
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="@yield('meta_title')" content="@yield('meta_title')">
    <meta name="@yield('meta_description')" content="@yield('meta_description')">
    <meta name="@yield('meta_keywords')" content="@yield('meta_keywords')">





    <title>@yield('title')</title>


    <link
      rel="icon"
      type="image/png"
      href="{{asset('frontend/assets/img/favicon.png')}}"
      sizes="16x16"
    />

    <!-- remix icon font css  -->
    <link rel="stylesheet" href="{{asset('admin/assets/css/remixicon.css')}}" />
    <!-- BootStrap css -->
    <link rel="stylesheet" href="{{asset('admin/assets/css/lib/bootstrap.min.css')}}" />
    <!-- Apex Chart css -->
    <link rel="stylesheet" href="{{asset('admin/assets/css/lib/apexcharts.css')}}" />
    <!-- Data Table css -->
    <link rel="stylesheet" href="{{asset('admin/assets/css/lib/dataTables.min.css')}}" />
    <!-- Text Editor css -->
    <link rel="stylesheet" href="{{asset('admin/assets/css/lib/editor-katex.min.css')}}" />
    <link rel="stylesheet" href="{{asset('admin/assets/css/lib/editor.atom-one-dark.min.css')}}" />
    <link rel="stylesheet" href="{{asset('admin/assets/css/lib/editor.quill.snow.css')}}" />
    <!-- Date picker css -->
    <link rel="stylesheet" href="{{asset('admin/assets/css/lib/flatpickr.min.css')}}" />
    <!-- Calendar css -->
    <link rel="stylesheet" href="{{asset('admin/assets/css/lib/full-calendar.css')}}" />
    <!-- Vector Map css -->
    <link rel="stylesheet" href="{{asset('admin/assets/css/lib/jquery-jvectormap-2.0.5.css')}}" />
    <!-- Popup css -->
    <link rel="stylesheet" href="{{asset('admin/assets/css/lib/magnific-popup.css')}}" />
    <!-- Slick Slider css -->
    <link rel="stylesheet" href="{{asset('admin/assets/css/lib/slick.css')}}" />
    <!-- prism css -->
    <link rel="stylesheet" href="{{asset('admin/assets/css/lib/prism.css')}}" />
    <!-- file upload css -->
    <link rel="stylesheet" href="{{asset('admin/assets/css/lib/file-upload.css')}}" />

    <link rel="stylesheet" href="{{asset('admin/assets/css/lib/audioplayer.css')}}" />
    <!-- main css -->
    <link rel="stylesheet" href="{{asset('admin/assets/css/style.css')}}" />

    
    @yield('styles')

  </head>


  <body>



    <!---------- BEGIN: nav Content ----------->
    @include('admin.layouts.nav')
    <!---------- END: nav Content ------------->


    <main class="dashboard-main">



        <!---------- BEGIN: header Content ----------->
        @include('admin.layouts.header')
        <!---------- END: header Content ------------->

    

        <!---------- BEGIN: Main Content ----------->
        @yield('content')
        <!---------- END: Main Content ------------->


        <!---------- BEGIN: Footer Content ----------->
        @include('admin.layouts.footer')
        <!---------- END: Footer Content ------------->


    </main>



  
  <!-- jQuery library js -->
  <script src="{{asset('admin/assets/js/lib/jquery-3.7.1.min.js')}}"></script>
  <!-- Bootstrap js -->
  <script src="{{asset('admin/assets/js/lib/bootstrap.bundle.min.js')}}"></script>
  <!-- Apex Chart js -->
  <script src="{{asset('admin/assets/js/lib/apexcharts.min.js')}}"></script>
  <!-- Data Table js -->
  <script src="{{asset('admin/assets/js/lib/dataTables.min.js')}}"></script>
  <!-- Iconify Font js -->
  <script src="{{asset('admin/assets/js/lib/iconify-icon.min.js')}}"></script>
  <!-- jQuery UI js -->
  <script src="{{asset('admin/assets/js/lib/jquery-ui.min.js')}}"></script>
  <!-- Vector Map js -->
  <script src="{{asset('admin/assets/js/lib/jquery-jvectormap-2.0.5.min.js')}}"></script>
  <script src="{{asset('admin/assets/js/lib/jquery-jvectormap-world-mill-en.js')}}"></script>
  <!-- Popup js -->
  <script src="{{asset('admin/assets/js/lib/magnifc-popup.min.js')}}"></script>
  <!-- Slick Slider js -->
  <script src="{{asset('admin/assets/js/lib/slick.min.js')}}"></script>
  <!-- prism js -->
  <script src="{{asset('admin/assets/js/lib/prism.js')}}"></script>
  <!-- file upload js -->
  <script src="{{asset('admin/assets/js/lib/file-upload.js')}}"></script>
  <!-- audioplayer -->
  <script src="{{asset('admin/assets/js/lib/audioplayer.js')}}"></script>

  <!-- main js -->
  <script src="{{asset('admin/assets/js/app.js')}}"></script>

  <script src="{{asset('admin/assets/js/homeOneChart.js')}}"></script>

     @yield('scripts')


</body>
</html>