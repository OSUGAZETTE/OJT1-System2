@extends('layouts.home')

@section('title')
  <title>Admim Reset Password | USeP OSU</title>
@endsection

@section('content')
 <div>
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-8 d-flex flex-column align-items-center gradient-overlay" style="height: 100vh; background-image: url('../img/bg.jpg'); background-size: cover; background-position: center;">
          <div class="my-auto w-100 pl-4">
            <img class="img-fluid d-block mb-2" src="../img/useplogo.png" style="position:relative; height: 100%;">
            <h1 class="display-2 mt-1 text-white" style="position:relative;">OSU</h1>
            <hr class="m-0" style="background-color: snow; position:relative;">
            <p class="lead mt-1 text-white" style="font-size: 25px; position:relative;">Office of the Secretary of the University</p>
          </div>
        </div>
        <div class="col-md-4 d-flex flex-column align-items-center bg-white px-4" style="height:100vh; ">
          <div class="my-auto w-100 px-2">
            <h3 class="text-center text-dark mb-2">Reset Password</h3>
            <hr class="my-3">
            
            <form class="" method="POST" action="{{ route('password.request') }}"">
              {{ csrf_field() }}
              <div class="form-group"> <label class="text-dark">Email address</label>
                <input type="email" name="email" class="form-control" placeholder="" value="{{ old('email') }}" required>
                @if ($errors->has('email'))
                <p class="text-center" style="background-color: #a53131;color: white;padding: 5px;">
                    {{ $errors->first('email') }}
                </p>
                @endif 
              </div>

              <div class="form-group"> <label class="text-dark">Password</label>
                <input id="password" type="password" class="form-control" name="password" required>
                @if ($errors->has('password'))
                <p class="text-center" style="background-color: #a53131;color: white;padding: 5px;">
                    {{ $errors->first('password') }}
                </p>
                @endif 
              </div>

              <div class="form-group"> <label class="text-dark">Confirm Password</label>
                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                @if ($errors->has('password_confirmation'))
                <p class="text-center" style="background-color: #a53131;color: white;padding: 5px;">
                    {{ $errors->first('password_confirmation') }}
                </p>
                @endif 
              </div>

              <button type="submit" class="btn btn-danger btn-block w-100 btn-lg">Reset Password</button>
            </form>
            <br/>
            <small style="color: grey; font-size: 15px;">Want to go back? </small>
            <a href="{{ url('login') }}" >Login</a>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
