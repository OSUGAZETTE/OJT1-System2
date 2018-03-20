<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  @yield('title')
  <!-- Favicon-->
    @if(App::isLocal())
      <link rel="shortcut icon" href="{{ asset('img/useplogo.png') }}" type="image/x-icon" />
      <link rel="stylesheet" href="https://ozugazette.herokuapp.com/css/home.css" type="text/css">
    @elseif(Request::server('HTTP_X_FORWARDED_PROTO') == 'https')
      <link rel="shortcut icon" href="{{ asset('img/useplogo.png') }}" type="image/x-icon" />
      <link rel="stylesheet" href="https://ozugazette.herokuapp.com/css/home.css" type="text/css">
    @else
      <link rel="shortcut icon" href="{{ asset('img/useplogo.png') }}" type="image/x-icon" />
      <link rel="stylesheet" href="https://ozugazette.herokuapp.com/css/home.css" type="text/css">
    @endif

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" type="text/css">
  <meta name="google-site-verification" content="eJvi-tHl8d6htk0ubDU8GKhrvf6ECuNtUHsej-8K8KU" />
</head>
<body>
	@yield('content')
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" ></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js"></script>
</body>
</html>