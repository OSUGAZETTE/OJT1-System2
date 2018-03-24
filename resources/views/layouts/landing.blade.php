<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="USeP OSU - GAZETTE">
  <meta name="author" content="Moya, Anthony B.">

  <title>USEP OSU - GAZETTE</title>

  <!-- Bootstrap core CSS -->
  <link href="{{ asset('landing/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">

  <!-- Custom fonts for this template -->
  <script src="https://unpkg.com/feather-icons/dist/feather.min.js"></script>
  <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500" rel="stylesheet"  type='text/css'>
  <link href='https://fonts.googleapis.com/css?family=Cabin:700' rel='stylesheet' type='text/css'>

  <!-- Custom styles for this template -->
  @yield('css')
    
</head>
<body>
  <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
      <div class="container">
        <a class="navbar-brand js-scroll-trigger" href="#top">OSU</a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <i data-feather="menu"></i>
        </button>
      </div>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        @yield('navbar')
          
      </div>
    </nav>
    <!-- Intro Header -->
    <header class="masthead">
      <div class="intro-body">
        <div class="container-fluid">
          <div class="row">
             @yield('head')
            
          </div>
        </div>
      </div>
    </header>
    <hr class="my-0" style="background-color: #EEEEEE;" />

  @yield('content')
  <!-- Footer -->
    <footer class="">
      <div class="container text-center">
        <div class="row dflex justify-content-center">
          <div class=" col-sm-12 col-md-8 d-flex align-items-center">
            <p class="footer-txt">USeP - OSU | Design ~ Copyright &copy; Anthony Moya 2018</p>
          </div>
          <div class=" col-sm-12 col-md-4 footer-btn">
            <a href="#top" class="mr-0 btn btn-link text-white btn-lg active navbar-brand js-scroll-trigger" role="button" aria-pressed="true">
              <i data-feather = "chevrons-up" style="width: 40px; height: 40px;"></i>
            </a>
          </div>
        </div>
      </div>
    </footer>

  <!-- Bootstrap core JavaScript -->
  <script src="{{ asset('landing/jquery/jquery.min.js') }}"></script>
  <script src="{{ asset('landing/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <!-- Plugin JavaScript -->
  <script src="{{ asset('landing/jquery-easing/jquery.easing.min.js') }}"></script>
  <!-- Custom scripts for this template -->
  <script src="{{ asset('landing/js/osu.js') }}"></script>
  @yield('script')


</body>
</html>