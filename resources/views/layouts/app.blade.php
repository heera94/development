<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>{{config('app.name')}} :: @yield('page-title')</title>
  <!-- Favicon -->

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
  <!-- Google -->
  <script src="https://www.google.com/recaptcha/api.js" async defer></script>
  <!-- CSS Files -->
  <link href="{{asset('app-assets/css/argon.css?v=1.0.0')}}" rel="stylesheet" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body style="background-color: #197896!important;">
  <div class="main-content">
    <!-- Navbar -->

    <!-- Header -->
    <div class="header bg-primary py-7 py-lg-8">
      <div class="container">
        <div class="header-body text-center mb-7">
          <div class="row justify-content-center">
            <div class="col-lg-5 col-md-6">
              <h1 class="text-white">
                 
              </h1>
             
            </div>
          </div>
        </div>
      </div>
      <div class="separator separator-bottom separator-skew zindex-100">
        <svg x="0" y="0" viewBox="0 0 2560 100" preserveAspectRatio="none" version="1.1" xmlns="http://www.w3.org/2000/svg">
          <polygon class="fill-default" points="2560 0 2560 100 0 100" style="fill: #197896;"></polygon>
        </svg>
      </div>
    </div>
    <!-- Page content -->
    <div class="container mt--8 pb-5">
        <div class="row justify-content-center">
          <div class="col-lg-5 col-md-7">
            <div class="card bg-secondary shadow border-0">
              <div class="card-body px-lg-5 py-lg-5">
                <div class="text-center text-muted mb-4">
                
                  <small>@yield('page-title')</small>
                </div>


                  @yield('content')


                </div>
              </div>
              @if(isset($hideForgotPassword))
                <div class="row mt-3">
                    <div class="col-12 text-center">
                      <a href="{{ url('/register') }}" class="text-light"><small>Not a member?Register Now</small></a>
                    </div>
                    <!-- <div class="col-6 text-right">
                      <a href="#" class="text-light"><small>Create new account</small></a>
                    </div> -->
                  </div>
              @endif
            </div>
          </div>
        </div>
      <footer class="py-5">
          <div class="container">
            <div class="row align-items-center justify-content-xl-between">
              <div class="col-xl-12">
                <div class="copyright text-center text-xl-center text-muted small">
                  © {{date('Y')}} <a href="#" class="font-weight-bold ml-1 text-white" target="_blank">MyApp</a>
                </div>
              </div>
            </div>
          </div>
        </footer>
      </div>
    <!--   Core   -->
    <!-- <script src="{{asset('app-assets/js/plugins/jquery/dist/jquery.min.js')}}"></script>
    <script src="{{asset('app-assets/js/plugins/bootstrap/dist/js/bootstrap.bundle.min.js')}}"></script> -->
  </body>

  </html>
