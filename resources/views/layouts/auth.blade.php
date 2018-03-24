<!DOCTYPE html>
<html lang="en">
<head>
  <title>OSU | LOGIN</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="{{ asset('auth/bootstrap/css/bootstrap.min.css') }}">
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="{{ asset('auth/fonts/font-awesome-4.7.0/css/font-awesome.min.css') }}">
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="{{ asset('auth/animsition/css/animsition.min.css') }}">
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="{{ asset('auth/css/util.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('auth/css/main.css') }}">
<!--===============================================================================================-->
</head>
<body style="background-color: #666666;">
  
  <div class="limiter">
    <div class="container-login100">
      <div class="wrap-login100">
        <form class="login100-form validate-form" @yield('formsubmit')>
          {{ csrf_field() }}
          <div class="mb-0 d-flex justify-content-center  ">
            <img class="mb-3 rounded-circle align-self-center " width="125" 
                 src="{{ asset('auth/images/useplogo.png') }}"
                 style="box-shadow: 0 3px 6px rgba(0,0,0,0.16), 0 3px 6px rgba(0,0,0,0.23);"/>
            </div>
          <span class="login100-form-title p-b-0">
            @yield('formtitle')
          </span>
          <hr class="mb-3 mt-3"/>
          @yield('formcontent')

        </form>
        <div class="login100-more" style="background-image: url('{{ asset('auth/images/bg.jpg') }}');">
        </div>
      </div>
    </div>
  </div>

<!--===============================================================================================-->
  <script src="{{ asset('auth/jquery/jquery-3.2.1.min.js') }}"></script>
<!--===============================================================================================-->
  <script src="{{ asset('auth/animsition/js/animsition.min.js') }}"></script>
<!--===============================================================================================-->
  <script src="{{ asset('auth/bootstrap/js/popper.js') }}"></script>
  <script src="{{ asset('auth/bootstrap/js/bootstrap.min.js') }}"></script>
<!--===============================================================================================-->
  <script src="{{ asset('auth/js/main.js') }}"></script>

</body>
</html>
