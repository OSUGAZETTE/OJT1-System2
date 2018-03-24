@extends('layouts.auth')

@section('formsubmit')
  method="POST" action="{{ route('password.email') }}"
@endsection

@section('formtitle')
  OSU - Forgot Password
@endsection

@section('formcontent')
  @if (count($errors))
              <ul>
                  @foreach($errors->all() as $error)
                  <div class="alert alert-danger" role="alert">
                    {{ $error }}
                  </div>
                  @endforeach
              </ul>
          @endif
          <div class="wrap-input100 validate-input" data-validate = "Valid email is required">
            <input class="input100" value="{{ old('email') }}"  type="text" name="email" autocomplete="off">
            <span class="focus-input100"></span>
            <span class="label-input100">Email</span>
          </div>

          <div class="flex-sb-m w-full p-t-3 p-b-32">
            <div>
              <a href="{{ route('login') }}" class="txt1">
                Want to Go Back?
              </a>
            </div>
          </div>
      
          <div class="container-login100-form-btn">
            <button type="submit" class="login100-form-btn">
              Submit
            </button>
          </div>
@endsection
