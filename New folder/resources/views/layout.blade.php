<!DOCTYPE html>
<html>

<!-- meta contains meta taga, css and fontawesome icons etc -->
@include('common.meta')
<!-- ./end of meta -->

<!-- <body class=" hold-transition skin-blue sidebar-mini"> -->
<body class="hold-transition sidebar-collapse layout-top-nav layout-fixed">

<!-- wrapper -->
<div class="wrapper">

  <!-- Preloader -->
  <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__wobble" src="{!! asset('img/p24-logo-white.png') !!}" alt="P24" height="60" width="60">
  </div>

  
    <!-- header contains top navbar -->
@include('common.header')
<!-- ./end of header -->

    <!-- left sidebar -->
@include('common.sidebar')
<!-- ./end of left sidebar -->

    <!-- dynamic content -->
@yield('content')
<!-- ./end of dynamic content -->

<!-- ./right sidebar -->
</div>
<!-- ./wrapper -->

<!-- The actual snackbar -->

<!-- all js scripts including custom js -->
@include('common.scripts')
<!-- ./end of js scripts -->

</body>
</html>
