<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Creative Tim">
    <title> :: @yield('title')</title>
    <!-- Favicon -->
    
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
    <!-- Icons -->
    <link href="{{asset('app-assets/css/nucleo.css')}}" rel="stylesheet">
    <link href="{{asset('app-assets/css/custom-style.css')}}" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.2/css/all.css" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.10/css/bootstrap-select.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/1.3.1/css/toastr.css">
    <!-- Argon CSS -->
    <link type="text/css" href="{{asset('app-assets/css/argon.css?v=1.0.0')}}" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('css/application.css')}}">
    @yield('style')
    </head>

<body>
   @csrf

  <!-- Sidenav -->
  @include('layouts.admin.header')
  <!-- side menu end -->
  <div class="main-content">
    <!-- Top navbar -->
   
   </div>
    <!-- breadcrumb -->
    <div class="header pb-6">
       <div class="container-fluid">
          <div class="header-body">

             <div class="row align-items-center py-4">
                <div class="col-lg-6 col-7">
                   <nav aria-label="breadcrumb" class="d-none d-md-inline-block mb-3">
                      @yield('breadcrumbs')
                      {{-- <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                         <li class="breadcrumb-item"> data-toggle="tooltip" data-placement="top" title="Click Here"><a href="index.html">Dashboard</a></a></li>
                         <li class="breadcrumb-item active" aria-current="page">MyApp</li>

                      </ol> --}}
                   </nav>
                </div>
             </div>
          </div>
       </div>
    </div>
    <div class="container-fluid mt--7">
  

      @yield('content')
      @include('layouts.admin.footer')
    </div>
  </div>


  <!-- Argon Scripts -->
  <!-- Core -->
  <script>

    var script_url = "{{url('/')}}";

  </script>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/js/bootstrap.bundle.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/js-cookie/2.2.1/js.cookie.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.js"></script>
  <script src="{{ asset('app-assets/js/jquery.scrollbar.min.js') }}"></script>
  <script src="{{ asset('app-assets/js/jquery-scrollLock.min.js') }}"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/1.3.1/js/toastr.js"></script>
  <!-- Optional JS -->

  <script src="{{ asset('js/application.js') }}"></script>
  <script src="{{asset('app-assets/js/argon.js?v=1.0.0')}}"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/mouse0270-bootstrap-notify/3.1.7/bootstrap-notify.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-notify/0.2.0/css/bootstrap-notify.css">
  @yield('script')
   @stack('module-script')

</body>
</html>
