<html>

<head>
    @yield('title')
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <link rel="shortcut icon" href="{{ asset('img/useplogo.png') }}" type="image/x-icon" />


    <!-- Google fonts - Roboto -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,700">
    <!-- Bootstrap CSS-->
    <link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}">
    <!-- theme stylesheet-->
    <link rel="stylesheet" href="{{ asset('css/style.default.css') }}" id="theme-stylesheet">
    <!-- Custom stylesheet - for your changes-->
    <link rel="stylesheet" href="{{ asset('css/custom.css') }}">
    <!-- Font Awesome CDN-->
    <!-- you can replace it by local Font Awesome-->
    <script src="https://use.fontawesome.com/99347ac47f.js"></script>
    <!-- Font Icons CSS-->
    <link rel="stylesheet" href="https://file.myfontastic.com/da58YPMQ7U5HY8Rb6UxkNf/icons.css">
    <!-- Tweaks for older IEs--><!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
</head>

<body>
  <div class="page home-page">
  <!-- Main Navbar-->
    <header class="header">
      <nav class="navbar">
        <div class="container-fluid">
          <div class="navbar-holder d-flex align-items-center justify-content-between">
            <!-- Navbar Header-->
            <div class="navbar-header">
                <!-- Navbar Brand -->
                <a href="" class="navbar-brand">
                  <div class="brand-text brand-big hidden-lg-down">
                    <span>OSU </span><strong> Dashboard</strong>
                  </div>
                  <div class="brand-text brand-small">
                    <strong>OSU</strong>
                  </div>
                </a>
                <!-- Toggle Button-->
              <a id="toggle-btn" href="" class="menu-btn active"><span></span><span></span><span></span></a>
            </div>
            <!-- Navbar Menu -->
            <ul class="nav-menu list-unstyled d-flex flex-md-row align-items-md-center">
              <!-- Logout    -->
              <li class="nav-item">
                <a href="{{ route('logout') }}" class="nav-link logout"
                   onclick="event.preventDefault();
                   document.getElementById('logout-form').submit();">
                   Logout<i class="fa fa-sign-out"></i>
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                  {{ csrf_field() }}
                </form>
              </li>
            </ul>
          </div>
        </div>
      </nav>
    </header>
    <div class="page-content d-flex align-items-stretch" style=" min-height: calc(100vh - 70px); max-height: fit-content;">
      <!-- Side Navbar -->
      <nav class="side-navbar">
        <!-- Sidebar Header-->
        <div class="sidebar-header d-flex align-items-center">
          <div class="avatar"><img alt="..." class="img-fluid rounded-circle" src="{{asset('img/avatar-1.jpg')}}"></div>
          <div class="title ml-2">
            <h1 class="h4 mb-1">{{Auth::user()->u_fname}} {{Auth::user()->u_lname}}</h1>
            
          </div>
        </div><!-- Sidebar Navidation Menus <a href="" style="vertical-align: middle;"><i class="fa fa-cog mr-1"></i>Edit</a>  -->
        <span class="heading">Main</span>
        <ul class="list-unstyled">
          <li @yield('a1') >
            <a href="{{route('Home')}}"><i class="icon-home"></i>Dashboard</a>
          </li>
          <li @yield('a2') >
            <a aria-expanded="false" data-toggle="collapse" href="#dashvariants1"><i class="icon-form"></i>Meetings</a>
              <ul class="collapse list-unstyled" id="dashvariants1">
                <li>
                  <a href="{{route('Upload')}}">Upload Option</a>
                </li>
                <li>
                  <a href="{{route('Edit&Delete')}}">Edit and Delete Option</a>
                </li>
              </ul>
          </li>
          <li @yield('a3') >
            <a href="{{route('History')}}"><i class="icon-clock"></i>History</a>
          </li>    
        </ul>
      </nav>
      @yield('content')
    </div>
  </div>

  @yield('modal')

    
    <script src="{{ asset('js/jquery.js') }}"></script>
    <script src="{{ asset('js/parsley.js') }}"></script>
    <script src="{{ asset('js/tether.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.js') }}"></script>
    

    <script >
    function alphaOnly(event) {
      var key = event.keyCode;
      return ((key >= 65 && key <= 90) || key == 8);
    };


    $('.list-unstyled>li>a').on('click', function(){
        $('.list-unstyled').collapse('hide');
    });

    $('#toggle-btn').on('click', function (e) {
        e.preventDefault();
        $(this).toggleClass('active');

        $('.side-navbar').toggleClass('shrinked');
        $('.content-inner').toggleClass('active');

        if ($(window).outerWidth() > 1183) {
            if ($('#toggle-btn').hasClass('active')) {
                $('.navbar-header .brand-small').hide();
                $('.navbar-header .brand-big').show();
            } else {
                $('.navbar-header .brand-small').show();
                $('.navbar-header .brand-big').hide();
            }
        }

        if ($(window).outerWidth() < 1183) {
            $('.navbar-header .brand-small').show();
        }
    });
    </script>
    @yield('script')
</body>
</html>